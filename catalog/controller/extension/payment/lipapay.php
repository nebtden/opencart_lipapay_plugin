<?php
class ControllerExtensionPaymentLipapay extends Controller {
    public function index() {
        $data['button_confirm'] = $this->language->get('button_confirm');

        $this->load->model('checkout/order');

        $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
        $out_trade_no = trim($order_info['order_id']);
        $total_amount = trim($this->currency->format($order_info['total'], $this->config->get('payment_lipapay_monetary_unit'), '', false));

        $ordered_products = $this->model_checkout_order->getOrderProducts($this->session->data['order_id']);
        $config = array (
            'merchantId'          => $this->config->get('payment_lipapay_app_id'),
            'merchantKey'         => $this->config->get('payment_lipapay_merchant_private_key'),
            'notifyUrl'           => HTTP_SERVER . 'index.php?route=extension/payment/lipapay/notify',
            'returnUrl'           => $this->url->link('checkout/success'),

            'signType'            => "MD5",
            'goodsName'            => $ordered_products[0]['name'],
//            'goodsName'           => 'test',
            'goodsType'           => "2",
            'expirationTime'      => "10000",
            'sourceType'          => "B",
            'buyerId'             => $order_info['customer_id'],
            'amount'              => $total_amount*100,
            'merchantOrderNo'     => $out_trade_no,
            'currency'            => $this->config->get('payment_lipapay_monetary_unit'),
        );

        //加密方法获取
        $this->load->model('extension/payment/lipapay');

        $sign = $this->model_extension_payment_lipapay->generateSign($config,$this->config->get('payment_lipapay_merchant_private_key'));
        $config['sign'] = $sign;

        //判断action
        $env = $this->config->get('payment_lipapay_test');
        if($env=='sandbox'){
             $url = 'http://sandbox.lipapay.com/api/excashier.html';
        }else{
             $url =  'https://www.lipapay.com/api/excashier.html';
        }
        $config['action'] = $url;

        return $this->load->view('extension/payment/lipapay', $config);
    }

    public function notify() {
        $this->log->write('LipaPay pay notify:');
        $arr = $_POST;
        $sign = $arr['sign'];
        unset($arr['sign']);
        $this->load->model('extension/payment/lipapay');
        $this->log->write('POST' . var_export($_POST,true));
        $result = $this->model_extension_payment_lipapay->generateSign($arr, $this->config->get('payment_lipapay_merchant_private_key'));

        if($result==$sign) {//check successed
            $this->log->write('lipapay check successed');
            $order_id = $arr['merchantOrderNo'];
            if($_POST['status'] == 'SUCCESS') {
                $return = [];
                $return['status'] = 'SUCCESS';
                $return['errorCode'] = '100';
                $return['merchantId'] = $arr['merchantId'];
                $return['signType'] = 'MD5';
                $return['merchantOrderNo'] = $arr['merchantOrderNo'];
                $return['orderId'] = $arr['orderId'];
                $this->load->model('checkout/order');
                $mysign = $this->model_extension_payment_lipapay->generateSign($return, $this->config->get('payment_lipapay_merchant_private_key'));
                $return['sign'] =$mysign;

                $this->model_checkout_order->addOrderHistory($order_id, $this->config->get('payment_lipapay_order_status_id'));

                echo json_encode($return);
            }


        }else {
            $this->log->write('lipapay check failed');
            echo "fail";
        }
    }
}