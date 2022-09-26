<?php

namespace Xgenious\Paymentgateway\Base\Gateways;

use Xgenious\Paymentgateway\Base\PaymentGatewayBase;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalPay extends PaymentGatewayBase
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
        // TODO: Implement charge_amount() method.
        if (in_array(self::global_currency(), $this->supported_currency_list())){
            return $amount;
        }
        return self::get_amount_in_usd($amount);
    }

    protected function getPaymentProvider($args){
        $provider = new PayPalClient;
        $config = [
            'mode'    => config('paymentgateway.paypal.mode'),
            'sandbox' => [
                'client_id'         => config('paymentgateway.paypal.sandbox.client_id'),
                'client_secret'     => config('paymentgateway.paypal.sandbox.client_secret'),
                'app_id'            => config('paymentgateway.paypal.sandbox.app_id'),
            ],
            'live' => [
                'client_id'         => config('paymentgateway.paypal.live.client_id'),
                'client_secret'     => config('paymentgateway.paypal.live.client_secret'),
                'app_id'            => config('paymentgateway.paypal.live.app_id'),
            ],

            'payment_action' => 'Sale',
            'currency'       => $this->charge_currency(),
            'notify_url'     => $args['ipn_url'],
            'locale'         => app()->getLocale(),
            'validate_ssl'   => true,
        ];

        $provider->setApiCredentials($config);
        $access_token = $provider->getAccessToken();

        abort_if(isset($access_token['type'])  && $access_token['type'] === 'error',405,$access_token['message'] ?? '');
        $provider->setAccessToken($access_token);
        return $provider;
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
     * */

    public function charge_customer($args)
    {
       $provider = $this->getPaymentProvider($args);

        $order = $provider->createOrder([
            "intent"=> "CAPTURE",
            "purchase_units"=> [
                0 => [
                    "amount"=> [
                        "currency_code"=> $this->charge_currency(),
                        "value"=> number_format($args['amount'], 2, ".", "")
                    ]
                ]
            ],
            'application_context' => [
                'cancel_url' => $args['cancel_url'],
                'return_url' => $args['ipn_url']
            ]
        ]);

        // throw exception
        abort_if(isset($order['type'])  && $order['type'] === 'error',405,$order['message'] ?? '');
        $order_id = $order['id'];
        session()->put('paypal_order_id',$order_id);
        session()->put('paypal_ipn_url',$args['ipn_url']);
        session()->put('paypal_cancel_url',$args['cancel_url']);
        session()->put('script_order_id', $args['order_id']);
        $redirect_url = $order['links'][1]['href'];
        return redirect($redirect_url)->send();
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

        /** Get the payment ID before session clear **/
        $payment_id = session()->get('paypal_order_id');
        $script_order_id = session()->get('script_order_id');
        $paypal_ipn_url = session()->get('paypal_ipn_url');
        $paypal_cancel_url = session()->get('paypal_cancel_url');
        $request = request();
        /** clear the session payment ID **/
        session()->forget(['paypal_order_id','script_order_id','paypal_cancel_url','paypal_ipn_url']);

        if (empty($request->get('PayerID')) || empty($request->get('token'))) {
            return abort(404);
        }

        $provider = $this->getPaymentProvider(['ipn_url' => $paypal_ipn_url]);
        $order_details = $provider->capturePaymentOrder($payment_id);
        if (isset($order_details['status']) && $order_details['status'] === 'COMPLETED') {
            return $this->verified_data([
                'transaction_id' => $payment_id,
                'order_id' => $script_order_id
            ]);
        }
        return redirect()->to($paypal_cancel_url);
    }

    /**
     * geteway_name();
     * return @string
     * */
    public function gateway_name(){
        return 'paypal';
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
        return  "USD";
    }
    /**
     * supported_currency_list();
     * it will returl all of supported currency for the payment gateway
     * return array
     * */
    public function supported_currency_list(){
        return ['AUD', 'BRL', 'CAD', 'CNY', 'CZK', 'DKK', 'EUR', 'HKD', 'HUF', 'INR', 'ILS', 'JPY', 'MYR', 'MXN', 'TWD', 'NZD', 'NOK', 'PHP', 'PLN', 'GBP', 'RUB', 'SGD', 'SEK', 'CHF', 'THB', 'USD'];
    }
}
