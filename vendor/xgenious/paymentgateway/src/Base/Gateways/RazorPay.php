<?php

namespace Xgenious\Paymentgateway\Base\Gateways;

use Xgenious\Paymentgateway\Base\PaymentGatewayBase;
use Razorpay\Api\Api;

class RazorPay extends PaymentGatewayBase
{
    /*
    * charge_amount();
    * @required param list
    * $amount
    *
    *
    * */
    public function charge_amount($amount)
    {
        if (in_array(self::global_currency(), $this->supported_currency_list())){
            return $amount;
        }
        return self::get_amount_in_inr($amount);
    }


    /**
     * @required param list
     * */

    public function charge_customer($args)
    {
        $order_id =  random_int(12345,99999).$args['order_id'].random_int(12345,99999);
        $razorpay_data['currency'] =  $this->charge_currency();
        $razorpay_data['price'] = $this->charge_amount($args['amount']);
        $razorpay_data['title'] = $args['title'];
        $razorpay_data['description'] = $args['description'];
        $razorpay_data['route'] = $args['ipn_url'];
        $razorpay_data['order_id'] = $order_id;
        session()->put('razorpay_last_order_id',$order_id);

        abort_if(is_null(config('paymentgateway.razorpay.api_key')),405,'razorpay api key is missing');

        return view('paymentgateway::razorpay')->with('razorpay_data', $razorpay_data);
    }


    /**
     * @required param list
     * $args['request']
     * $args['cancel_url']
     * $args['success_url']
     *
     * return @void
     * */
    public function ipn_response($args = []){

        $request = request();
        $razorpay_payment_id = request()->razorpay_payment_id;

        abort_if(is_null(config('paymentgateway.razorpay.api_key')),405,'razorpay api key is missing');
        abort_if(is_null(config('paymentgateway.razorpay.api_secret')),405,'razorpay api secret is missing');
        //get API Configuration
        $api = new Api(config('paymentgateway.razorpay.api_key'), config('paymentgateway.razorpay.api_secret'));

        //Fetch payment information by razorpay_payment_id
        $payment = $api->payment->fetch($request->razorpay_payment_id);

        try {
            $response = $api->payment->fetch($razorpay_payment_id)->capture(array('amount' => $payment['amount']));
            return $this->verified_data([
                'status' => 'complete',
                'transaction_id' =>  $payment->id,
                'order_id' => substr( request()->order_id,5,-5)
            ]);
        } catch (\Exception $e) {
            return ['status' => 'failed'];
        }
    }

    /**
     * geteway_name();
     * return @string
     * */
    public function gateway_name(){
        return 'razorpay';
    }
    /**
     * charge_currency();
     * return @string
     * */
    public function charge_currency()
    {
        if (in_array(self::global_currency(), $this->supported_currency_list())){
            return self::global_currency();
        }
        return  "INR";
    }
    /**
     * supported_currency_list();
     * it will returl all of supported currency for the payment gateway
     * return array
     * */
    public function supported_currency_list(){
        return ['INR'];
    }


}
