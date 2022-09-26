<?php

namespace Xgenious\Paymentgateway\Base\Gateways;

use  Xgenious\Paymentgateway\Base\PaymentGatewayBase;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\StripeClient;
use Stripe\Checkout\Session;

class StripePay extends PaymentGatewayBase
{

   /**
     * this payment gateway will not work without this package
     * @https://github.com/stripe/stripe-php
     * @since .0.01
     * */
    public function charge_amount($amount)
    {
        $return_amount = $amount;
        if (in_array(self::global_currency(), $this->supported_currency_list(), true)){
            if(in_array(self::global_currency(), $this->zero_decimal_currencies())){
                return $return_amount;
            }
            return $amount * 100;
        }
    }
    private function zero_decimal_currencies(){
        return [
            'BIF','CLP','DJF','GNF','JPY', 'KMF','KRW', 'MGA', 'PYG','RWF','UGX','VND','VUV', 'XAF','XOF', 'XPF'
        ];
    }

    /**
     *
     * @param array $args
     * required param list
     *
     * @return string[]
     * @throws \Stripe\Exception\ApiErrorException
     * @since 0.0.1
     */
    public function ipn_response(array $args = []) : array
    {
        $stripe_session_id = session()->get('stripe_session_id');
        session()->forget('stripe_session_id');
        $stripe_order_id = session()->get('stripe_order_id');
        session()->forget('stripe_order_id');

        $stripe = new StripeClient(config('paymentgateway.stripe.secret_key'));
        $response = $stripe->checkout->sessions->retrieve($stripe_session_id, []);
        $payment_intent = $response['payment_intent'] ?? '';
        $payment_status = $response['payment_status'] ?? '';

        $capture = $stripe->paymentIntents->retrieve($payment_intent);
        if (!empty($payment_status) && $payment_status === 'paid') {
            $transaction_id = $capture !== null && isset($capture['charges']['data'][0]) ? $capture['charges']['data'][0]['balance_transaction'] : '';
            if (!empty($transaction_id)) {
                return $this->verified_data([
                    'transaction_id' => $transaction_id,
                    'order_id' => $stripe_order_id
                ]);
            }
        }

        return ['status' => 'failed'];
    }

    /**
     *
     * @param array $args
     * required param list
     *
     * product_name
     * amount
     * description
     * ipn_url
     * cancel_url
     * order_id
     *
     * @return array
     * @throws \Stripe\Exception\ApiErrorException
     * @since 0.0.1
     */
    public function charge_customer(array $args)
    {
       return $this->stripe_view($args);
    }

    public function stripe_view($args){
        return view('paymentgateway::stripe', ['stripe_data' => $args]);
    }

    public function charge_customer_from_controller(array $args){
        Stripe::setApiKey(config('paymentgateway.stripe.secret_key'));
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => $this->charge_currency(),
                    'product_data' => [
                        'name' => $args['title'],
                    ],
                    'unit_amount' => $this->charge_amount($args['amount']),
                ],
                'quantity' => 1,
                'description' => $args['description']
            ]],
            'mode' => 'payment',
            'success_url' => $args['ipn_url'],
            'cancel_url' => $args['cancel_url'],
        ]);

        session()->put('stripe_session_id', $session->id);
        session()->put('stripe_order_id', $args['order_id']);

        return ['id' => $session->id];
    }

    /**
     * this will refund payment gateway charge currency
     * @since 0.0.1
     * */
    public function supported_currency_list() : array
    {
        return [
            'USD',
            'EUR',
            'INR',
            'IDR',
            'AUD',
            'SGD',
            'JPY',
            'GBP',
            'MYR',
            'PHP',
            'THB',
            'KRW',
            'NGN',
            'GHS',
            'BRL',
            'BIF',
            'CAD',
            'CDF',
            'CVE',
            'GHP',
            'GMD',
            'GNF',
            'KES',
            'LRD',
            'MWK',
            'MZN',
            'RWF',
            'SLL',
            'STD',
            'TZS',
            'UGX',
            'XAF',
            'XOF',
            'ZMK',
            'ZMW',
            'ZWD',
            'AED',
            'AFN',
            'ALL',
            'AMD',
            'ANG',
            'AOA',
            'ARS',
            'AWG',
            'AZN',
            'BAM',
            'BBD',
            'BDT',
            'BGN',
            'BMD',
            'BND',
            'BOB',
            'BSD',
            'BWP',
            'BZD',
            'CHF',
            'CNY',
            'CLP',
            'COP',
            'CRC',
            'CZK',
            'DJF',
            'DKK',
            'DOP',
            'DZD',
            'EGP',
            'ETB',
            'FJD',
            'FKP',
            'GEL',
            'GIP',
            'GTQ',
            'GYD',
            'HKD',
            'HNL',
            'HRK',
            'HTG',
            'HUF',
            'ILS',
            'ISK',
            'JMD',
            'KGS',
            'KHR',
            'KMF',
            'KYD',
            'KZT',
            'LAK',
            'LBP',
            'LKR',
            'LSL',
            'MAD',
            'MDL',
            'MGA',
            'MKD',
            'MMK',
            'MNT',
            'MOP',
            'MRO',
            'MUR',
            'MVR',
            'MXN',
            'NAD',
            'NIO',
            'NOK',
            'NPR',
            'NZD',
            'PAB',
            'PEN',
            'PGK',
            'PKR',
            'PLN',
            'PYG',
            'QAR',
            'RON',
            'RSD',
            'RUB',
            'SAR',
            'SBD',
            'SCR',
            'SEK',
            'SHP',
            'SOS',
            'SRD',
            'SZL',
            'TJS',
            'TRY',
            'TTD',
            'TWD',
            'UAH',
            'UYU',
            'UZS',
            'VND',
            'VUV',
            'WST',
            'XCD',
            'XPF',
            'YER',
            'ZAR'
        ];
    }
    /**
     * this will refund payment gateway charge currency
     * */
    public function charge_currency()
    {
        return self::global_currency();
    }
    /**
     * this will refund payment gateway name
     * */
    public function gateway_name() : string
    {
        return 'stripe';
    }
}
