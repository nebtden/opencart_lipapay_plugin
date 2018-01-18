<?php
/**
 * Class ControllerExtensionPaymentlipapay
 * author:zhanghzen
 * 
 */
class ControllerExtensionPaymentLipaPay extends Controller {
    private $error = array();

    public function index() {
        $this->load->language('extension/payment/lipapay');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('payment_lipapay', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment'));
        }

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->error['app_id'])) {
            $data['error_app_id'] = $this->error['app_id'];
        } else {
            $data['error_app_id'] = '';
        }

        if (isset($this->error['merchant_private_key'])) {
            $data['error_merchant_private_key'] = $this->error['merchant_private_key'];
        } else {
            $data['error_merchant_private_key'] = '';
        }

        if (isset($this->error['lipapay_public_key'])) {
            $data['error_lipapay_public_key'] = $this->error['lipapay_public_key'];
        } else {
            $data['error_lipapay_public_key'] = '';
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment')
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/payment/lipapay', 'user_token=' . $this->session->data['user_token'])
        );

        $data['action'] = $this->url->link('extension/payment/lipapay', 'user_token=' . $this->session->data['user_token']);

        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment');

        if (isset($this->request->post['payment_lipapay_app_id'])) {
            $data['payment_lipapay_app_id'] = $this->request->post['payment_lipapay_app_id'];
        } else {
            $data['payment_lipapay_app_id'] = $this->config->get('payment_lipapay_app_id');
        }

        if (isset($this->request->post['payment_lipapay_merchant_private_key'])) {
            $data['payment_lipapay_merchant_private_key'] = $this->request->post['payment_lipapay_merchant_private_key'];
        } else {
            $data['payment_lipapay_merchant_private_key'] = $this->config->get('payment_lipapay_merchant_private_key');
        }

        if (isset($this->request->post['payment_lipapay_lipapay_public_key'])) {
            $data['payment_lipapay_lipapay_public_key'] = $this->request->post['payment_lipapay_lipapay_public_key'];
        } else {
            $data['payment_lipapay_lipapay_public_key'] = $this->config->get('payment_lipapay_lipapay_public_key');
        }

        if (isset($this->request->post['payment_lipapay_total'])) {
            $data['payment_lipapay_total'] = $this->request->post['payment_lipapay_total'];
        } else {
            $data['payment_lipapay_total'] = $this->config->get('payment_lipapay_total');
        }

        if (isset($this->request->post['payment_lipapay_order_status_id'])) {
            $data['payment_lipapay_order_status_id'] = $this->request->post['payment_lipapay_order_status_id'];
        } else {
            $data['payment_lipapay_order_status_id'] = $this->config->get('payment_lipapay_order_status_id');
        }

        $this->load->model('localisation/order_status');

        $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

        if (isset($this->request->post['payment_lipapay_geo_zone_id'])) {
            $data['payment_lipapay_geo_zone_id'] = $this->request->post['payment_lipapay_geo_zone_id'];
        } else {
            $data['payment_lipapay_geo_zone_id'] = $this->config->get('payment_lipapay_geo_zone_id');
        }

        $this->load->model('localisation/geo_zone');

        $data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

        if (isset($this->request->post['payment_lipapay_test'])) {
            $data['payment_lipapay_test'] = $this->request->post['payment_lipapay_test'];
        } else {
            $data['payment_lipapay_test'] = $this->config->get('payment_lipapay_test');
        }

        if (isset($this->request->post['payment_lipapay_status'])) {
            $data['payment_lipapay_status'] = $this->request->post['payment_lipapay_status'];
        } else {
            $data['payment_lipapay_status'] = $this->config->get('payment_lipapay_status');
        }

        if (isset($this->request->post['payment_lipapay_sort_order'])) {
            $data['payment_lipapay_sort_order'] = $this->request->post['payment_lipapay_sort_order'];
        } else {
            $data['payment_lipapay_sort_order'] = $this->config->get('payment_lipapay_sort_order');
        }

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/payment/lipapay', $data));
    }

    private function validate() {
        if (!$this->user->hasPermission('modify', 'extension/payment/lipapay')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!$this->request->post['payment_lipapay_app_id']) {
            $this->error['app_id'] = $this->language->get('error_app_id');
        }

        if (!$this->request->post['payment_lipapay_merchant_private_key']) {
            $this->error['merchant_private_key'] = $this->language->get('error_merchant_private_key');
        }



        return !$this->error;
    }
}