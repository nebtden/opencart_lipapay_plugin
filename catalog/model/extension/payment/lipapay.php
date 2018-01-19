<?php
class ModelExtensionPaymentLipapay extends Model {
    private $apiMethodName="lipapay.trade.page.pay";
    private $logFileName = "lipapay.log";
    private $merchantKey;
    private $merchantId;
    private $notifyUrl;
    private $returnUrl;
    private $signType;
    private $goodsType;
    private $format = "json";

    private $apiParas = array();

    public function getMethod($address, $total) {
        $this->load->language('extension/payment/lipapay');


        $method_data = array(
            'code'       => 'lipapay',
            'title'      => $this->language->get('text_title'),
            'terms'      => '',

        );


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
            'expirationTime',
            'sourceType',
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
}
