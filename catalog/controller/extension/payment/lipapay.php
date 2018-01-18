<?php
class ControllerExtensionPaymentLipapay extends Controller {
    public function index() {
        $data['button_confirm'] = $this->language->get('button_confirm');

        $this->load->model('checkout/order');

        $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

        $config = array (
            'app_id'               => $this->config->get('payment_lipapay_app_id'),
            'merchant_private_key' => $this->config->get('payment_lipapay_merchant_private_key'),
            'notify_url'           => HTTP_SERVER . "payment_callback/LipaPay",
            'return_url'           => $this->url->link('checkout/success', 'language=' . $this->config->get('config_language')),
            'charset'              => "UTF-8",
            'sign_type'            => "MD%",
            'gateway_url'          => $this->config->get('payment_lipapay_test') == "sandbox" ? "http://sandbox.lipapay.com/api/excashier.html" : "https://www.lipapay.com/api/excashier.html",
            'LipaPay_public_key'    => $this->config->get('payment_lipapay_lipapay_public_key'),
        );
        $out_trade_no = trim($order_info['order_id']);
        $subject = trim($this->config->get('config_name'));
        $total_amount = trim($this->currency->format($order_info['total'], 'CNY', '', false));
        $body = '';//trim($_POST['WIDbody']);

        $payRequestBuilder = array(
            'body'         => $body,
            'subject'      => $subject,
            'total_amount' => $total_amount,
            'out_trade_no' => $out_trade_no,
            'product_code' => 'FAST_INSTANT_TRADE_PAY'
        );

        $this->load->model('extension/payment/lipapay');

        $response = $this->model_extension_payment_lipapay->pagePay($payRequestBuilder,$config);
        $data['action'] = $config['gateway_url'] . "?charset=" . $this->model_extension_payment_lipapay->getPostCharset();
        $data['form_params'] = $response;

        return $this->load->view('extension/payment/lipapay', $data);
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