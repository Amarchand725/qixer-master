<?php

namespace Xgenious\Paymentgateway\Base\Gateways;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use Illuminate\Support\Str;
use Xgenious\Paymentgateway\Base\PaymentGatewayBase;

class PaytmPay extends PaymentGatewayBase
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
     * $args['amount']
     * $args['description']
     * $args['item_name']
     * $args['ipn_url']
     * $args['cancel_url']
     * $args['payment_track']
     * return redirect url for paypal
     *
     * @throws \Exception
     */

    public function charge_customer($args)
    {
        $charge_amount = $this->charge_amount($args['amount']);
        $order_id =  random_int(01234,99999).$args['order_id'].random_int(01234,99999);
        $payment = $this->createReceiveDriver();
        $payment->prepare([
            'order' => $order_id,
            'user' => Str::slug($args['name']),
            'mobile_number' => random_int(99999999, 99999999),
            'email' => $args['email'],
            'amount' => number_format((float) $charge_amount, 2, '.', ''),
            'callback_url' => $args['ipn_url']
        ]);
        return $payment->receive();
    }
    protected function createReceiveDriver(){
        return $this->buildProvider(
            'Anand\LaravelPaytmWallet\Providers\ReceivePaymentProvider',
            config('paymentgateway.paytm')
        );
    }
    public function buildProvider($provider, $config){
        return new $provider(
            request(),
            $config
        );
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

        $order_id = request()->get('ORDERID');
        $transaction = $this->createReceiveDriver();
        $response = $transaction->response(); // To get raw response as array
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm
        if ($transaction->isSuccessful()) {

            return $this->verified_data([
                'transaction_id' => $response['TXNID'],
                'order_id' => substr($order_id,5,-5)
            ]);

        }
        return ['status' => 'failed'];
    }

    /**
     * geteway_name();
     * return @string
     * */
    public function gateway_name(){
        return 'paytm';
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
     * it will return all of supported currency for the payment gateway
     * return array
     * */
    public function supported_currency_list(){
        return ['INR'];
    }

}
