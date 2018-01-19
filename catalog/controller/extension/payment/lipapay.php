<?php
class ControllerExtensionPaymentLipapay extends Controller {
    public function index() {
        $data['button_confirm'] = $this->language->get('button_confirm');

        $this->load->model('checkout/order');

        $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
        $out_trade_no = trim($order_info['order_id']);
        $total_amount = trim($this->currency->format($order_info['total'], $this->config->get('payment_lipapay_monetary_unit'), '', false));
        $config = array (
            'merchantId'          => $this->config->get('payment_lipapay_app_id'),
            'merchantKey'         => $this->config->get('payment_lipapay_app_id'),
            'notifyUrl'           => HTTP_SERVER . "payment_callback/lipapay",
            'returnUrl'           => $this->url->link('checkout/success'),

            'signType'            => "MD5",
//            'goodsName'            => $order_info['goods'][0],
            'goodsName'           => 'test',
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

    public function callback() {
        $this->log->write('LipaPay pay notify:');
        $arr = $_POST;
        $config = array (
            'app_id'               => $this->config->get('payment_lipapay_app_id'),
            'merchant_private_key' => $this->config->get('payment_lipapay_merchant_private_key'),
            'notify_url'           => HTTP_SERVER . "payment_callback/lipapay",
            'return_url'           => $this->url->link('checkout/success', 'language=' . $this->config->get('config_language')),
            'charset'              => "UTF-8",
            'sign_type'            => "MD%",
            'gateway_url'          => $this->config->get('payment_lipapay_test') == "sandbox" ? "http://sandbox.lipapay.com/api/excashier.html" : "https://www.lipapay.com/api/excashier.html",
            'LipaPay_public_key'    => $this->config->get('payment_lipapay_lipapay_public_key'),
        );
        $this->load->model('extension/payment/LipaPay');
        $this->log->write('POST' . var_export($_POST,true));
        $result = $this->model_extension_payment_lipapay->check($arr, $config);

        if($result) {//check successed
            $this->log->write('LipaPay check successed');
            $order_id = $_POST['out_trade_no'];
            if($_POST['trade_status'] == 'TRADE_FINISHED') {
            }
            else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
                $this->load->model('checkout/order');
                $this->model_checkout_order->addOrderHistory($order_id, $this->config->get('payment_lipapay_order_status_id'));
            }
            echo "success";	//Do not modified or deleted
        }else {
            $this->log->write('LipaPay check failed');
            //chedk failed
            echo "fail";

        }
    }
}