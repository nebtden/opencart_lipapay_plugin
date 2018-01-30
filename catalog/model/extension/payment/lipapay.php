<?php
class ModelExtensionPaymentLipapay extends Model {

    private $logFileName = "lipapay.log";
    private $merchantKey;
    private $merchantId;
    private $notifyUrl;
    private $returnUrl;
    private $signType;
    private $goodsType;


    private $apiParas = array();

    public function getMethod($address, $total) {
//        $this->load->language('extension/payment/lipapay');
        $method_data = array(
            'code'       => 'lipapay',
            'title'      => $this->language->get('text_title'),
            'terms'      => '',

        );
        return $method_data;

        //不处理
        $this->load->language('extension/payment/lipapay');

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('payment_lipapay_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");

        if ($this->config->get('payment_lipapay_total') > 0 && $this->config->get('payment_lipapay_total') > $total) {
            $status = false;
        } elseif (!$this->config->get('payment_lipapay_geo_zone_id')) {
            $status = true;
        } elseif ($query->num_rows) {
            $status = true;
        } else {
            $status = false;
        }

        $method_data = array();

        if ($status) {
            $method_data = array(
                'code'       => 'lipapay',
                'title'      => $this->language->get('text_title'),
                'terms'      => '',
                'sort_order' => $this->config->get('payment_lipapay_sort_order')
            );
        }

        return $method_data;

    }

    private function setParams($lipapay_config){
        $this->merchantId = $lipapay_config['payment_lipapay_app_id'];
        $this->merchantKey = $lipapay_config['payment_lipapay_merchant_private_key'];
        $this->notifyUrl = $lipapay_config['notifyUrl'];
        $this->returnUrl = $lipapay_config['returnUrl'];


    }

    function pagePay($config) {
        $this->setParams($config);
        $response = $this->pageExecute($this, "post");
        $log = new Log($this->logFileName);
        $log->write("response: ".var_export($response,true));

        return $response;
    }

    function check($arr, $config){
        $this->setParams($config);

        $result = $this->rsaCheckV1($arr, $this->signtype);

        return $result;
    }

    public function pageExecute($request, $httpmethod = "POST") {

        $sysParams["merchantId"] = $this->merchantId;
        $sysParams["merchantOrderNo"] = $request->merchantOrderNo;
        $sysParams["goodsName"] = $this->goodsName;
        $sysParams["goodsType"] = $this->goodsType;
        $sysParams["signType"] = $this->signType;

        $sysParams["notifyUrl"] = $this->notifyUrl;
        $sysParams["returnUrl"] = $this->returnUrl;
        $sysParams["returnUrl"] = $this->currency;
        $sysParams["returnUrl"] = $this->currency;

        $apiParams = $this->apiParas;

        $totalParams = array_merge($apiParams, $sysParams);

        $totalParams["sign"] = $this->generateSign($totalParams, $this->private_key);

        if ("GET" == strtoupper($httpmethod)) {
            $preString=$this->getSignContentUrlencode($totalParams);
            $requestUrl = $this->gateway_url."?".$preString;

            return $requestUrl;
        } else {
            foreach ($totalParams as $key => $value) {
                if (false === $this->checkEmpty($value)) {
                    $value = str_replace("\"", "&quot;", $value);
                    $totalParams[$key] = $value;
                } else {
                    unset($totalParams[$key]);
                }
            }
            return $totalParams;
        }
    }

    protected function checkEmpty($value) {
        if (!isset($value))
            return true;
        if ($value === null)
            return true;
        if (trim($value) === "")
            return true;

        return false;
    }

    public function rsaCheckV1($params, $signType='RSA') {
        $sign = $params['sign'];
        $params['sign_type'] = null;
        $params['sign'] = null;
        return $this->verify($this->getSignContent($params), $sign, $signType);
    }

    function verify($data, $sign, $signType = 'RSA') {
        $pubKey= $this->lipapay_public_key;
        $res = "-----BEGIN PUBLIC KEY-----\n" .
            wordwrap($pubKey, 64, "\n", true) .
            "\n-----END PUBLIC KEY-----";

        (trim($pubKey)) or die('Alipay public key error!');

        if ("RSA2" == $signType) {
            $result = (bool)openssl_verify($data, base64_decode($sign), $res, OPENSSL_ALGO_SHA256);
        } else {
            $result = (bool)openssl_verify($data, base64_decode($sign), $res);
        }

        return $result;
    }


    public function generateSign($data, $LipaPay_key) {
        //检测参数是否在这个列表，排除其他参数
        $fields = [
            'merchantId',
            'signType',
            'returnUrl',
            'notifyUrl',
            'merchantOrderNo',
            'amount',
            'buyerId',
            'goodsName',
            'goodsType',
            'orderId',
            'orgTransId',
            'paymentChannel',
            'expirationTime',
            'paymentMethod',
            'sourceType',
            'signType',
            'status',
            'currency'];

        ksort($data);
        $str = '';
        foreach ($data as $key => $value) {
            if(!in_array($key,$fields)){
                continue;
            }
            $str = $str . $key . '=' . $value . '&';
        }
        $str = substr($str, 0, strlen($str) - 1);

        $sign = md5($str . $LipaPay_key);
        return $sign;
    }

    function getPostCharset(){
        return trim($this->postCharset);
    }

    public function addOrder($order_info, $pas_ref, $auth_code, $account, $order_ref) {
        if ($this->config->get('payment_globalpay_auto_settle') == 1) {
            $settle_status = 1;
        } else {
            $settle_status = 0;
        }

        $this->db->query("INSERT INTO `" . DB_PREFIX . "globalpay_order` SET `order_id` = '" . (int)$order_info['order_id'] . "', `settle_type` = '" . (int)$this->config->get('payment_globalpay_auto_settle') . "', `order_ref` = '" . $this->db->escape($order_ref) . "', `order_ref_previous` = '" . $this->db->escape($order_ref) . "', `date_added` = now(), `date_modified` = now(), `capture_status` = '" . (int)$settle_status . "', `currency_code` = '" . $this->db->escape($order_info['currency_code']) . "', `pasref` = '" . $this->db->escape($pas_ref) . "', `pasref_previous` = '" . $this->db->escape($pas_ref) . "', `authcode` = '" . $this->db->escape($auth_code) . "', `account` = '" . $this->db->escape($account) . "', `total` = '" . $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], false) . "'");

        return $this->db->getLastId();
    }

    public function addTransaction($globalpay_order_id, $type, $order_info) {
        $this->db->query("INSERT INTO `" . DB_PREFIX . "globalpay_order_transaction` SET `globalpay_order_id` = '" . (int)$globalpay_order_id . "', `date_added` = now(), `type` = '" . $this->db->escape($type) . "', `amount` = '" . $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], false) . "'");
    }

    public function addHistory($order_id, $order_status_id, $comment) {
        $this->db->query("INSERT INTO " . DB_PREFIX . "order_history SET order_id = '" . (int)$order_id . "', order_status_id = '" . (int)$order_status_id . "', notify = '0', comment = '" . $this->db->escape($comment) . "', date_added = NOW()");
    }

    public function logger($message) {
        if ($this->config->get('payment_globalpay_debug') == 1) {
            $log = new Log('globalpay.log');
            $log->write($message);
        }
    }
}
