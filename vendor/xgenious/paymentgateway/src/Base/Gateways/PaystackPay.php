<?php

namespace Xgenious\Paymentgateway\Base\Gateways;

use Xgenious\Paymentgateway\Base\PaymentGatewayBase;
use Unicodeveloper\Paystack\Facades\Paystack;


class PaystackPay extends PaymentGatewayBase
{

    /**
     * @inheritDoc
     * @ https://github.com/unicodeveloper/laravel-paystack
     * @param int|float $amount
     */
    public function charge_amount($amount)
    {
        if (in_array(self::global_currency(), $this->supported_currency_list())){
            return $amount;
        }
        return self::get_amount_in_ngn($amount);
    }

    /**
     * @inheritDoc
     * @param array $args;
     * @return array ['status','type','order_id','transaction_id'];
     */
    public function ipn_response(array $args = [])
    {
        $this->setConfig();
        // $paystack_ipn_url = session()->get('paystack_ipn_url');
        // abort_unless(!empty($paystack_ipn_url),405,__('ipn route not found'));
        $paymentDetails = Paystack::getPaymentData();
        if ($paymentDetails['status']) {
            $meta_data = $paymentDetails['data']['metadata'];
            return $this->verified_data([
                'transaction_id' =>  $paymentDetails['data']['reference'],
                'type' => $meta_data['type'],
                'order_id' => substr( $meta_data['order_id'],5,-5),
                // 'ipn_url' => $paystack_ipn_url,
            ]);
        }
        return ['status' => 'failed'];
    }

    /**
     * @inheritDoc
     */
    public function charge_customer(array $args)
    {
        if($args['amount'] > 25000){
            return back()->with(['msg' => __('We could not process your request due to your amount is higher than the maximum.'),'type' => 'danger']);
        }
        $order_id =  random_int(12345,99999).$args['order_id'].random_int(12345,99999);
        $paystack_data['currency'] = $this->charge_currency();
        $paystack_data['price'] = $this->charge_amount($args['amount']);
        $paystack_data['package_name'] =  $args['title'];
        $paystack_data['name'] = $args['name'];
        $paystack_data['email'] = $args['email'];
        $paystack_data['order_id'] = $order_id;
        $paystack_data['track'] = $args['track'];
        $paystack_data['route'] = route('xg.payment.gateway.paystack');
        $paystack_data['type'] = $args['payment_type'] ?? 'random';

        return view('paymentgateway::paystack')->with(['paystack_data' => $paystack_data]);
    }

    /**
     * @inheritDoc
     */
    public function supported_currency_list()
    {
        return ['GHS','NGN'];
    }

    /**
     * @inheritDoc
     */
    public function charge_currency()
    {
        if (in_array(self::global_currency(), $this->supported_currency_list())){
            return self::global_currency();
        }
        return  "NGN";
    }

    /**
     * @inheritDoc
     */
    public function gateway_name()
    {
        return 'paystack';
    }

    public function setConfig(){
        config([
            'paystack.merchantEmail' => config('paymentgateway.paystack.merchant_email'),
            'paystack.secretKey' => config('paymentgateway.paystack.secret_key'),
            'paystack.publicKey' => config('paymentgateway.paystack.public_key'),
            'paystack.paymentUrl' =>config('paymentgateway.paystack.payment_url'),
        ]);
    }
}
