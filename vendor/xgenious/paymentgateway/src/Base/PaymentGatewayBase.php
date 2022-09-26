<?php

namespace  Xgenious\Paymentgateway\Base;

abstract class PaymentGatewayBase
{
    protected $config;

    /**
     * @since 1.0.0
     * return how them amount need to charge
     * */
    abstract public function charge_amount($amount);
    /**
     * @since 1.0.0
     * handle payment gateway ipn response
     * */
    abstract public function ipn_response(array $args);
    /**
     * @since 1.0.0
     * return customer payment verified data
     * */

    public function verified_data($args) : array
    {
        return array_merge(['status' => 'complete'],$args);
    }
    /**
     * @since 1.0.0
     * charge customer account by this method
     * */
    abstract public function charge_customer(array $args);
    /**
     * @since 1.0.0
     * list of all supported currency by payment gateway
     * */
    abstract public function supported_currency_list();
    /**
     * charge_currency()
     * @since 1.0.0
     * get charge currency for payment gateway
     * */
    abstract public function charge_currency();
    /**
     * gateway_name()
     * @since 1.0.0
     * add payment gateway name
     * */
    abstract public function gateway_name();
    /**
     * global_currency()
     * @since 1.0.0
     * get global currency
     * */
    protected static function global_currency(){
        return config('paymentgateway.global_currency');
    }

    /**
     * get_amount_in_usd()
     * @since 1.0.0
     * this function return any amount to usd based on user given currency conversation value,
     * it will not work if admin did not give currency conversation rate
     * */
    protected static function get_amount_in_usd($amount){
        if (empty(self::global_currency())){
            report("you have not yet set your global currency");
        }
        if (self::global_currency() === 'USD'){
            return $amount;
        }
        $payable_amount = self::make_amount_in_usd($amount, self::global_currency());
        if ($payable_amount < 1) {
            $called_class_name = static::class;
            $instance = new $called_class_name();

            return $payable_amount . __('USD amount is not supported by '.$instance->gateway_name());
        }
        return $payable_amount;
    }
    protected static function make_amount_in_usd($amount,$currency){
        $output = 0;
        $all_currency = GlobalCurrency::script_currency_list();
        foreach ($all_currency as $cur => $symbol) {
            if ($cur === 'USD') {
                continue;
            }
            if ($cur === $currency) {
                $exchange_rate = config('paymentgateway.usd_exchange_rate'); // exchange rate
                $output = $amount * $exchange_rate;
            }
        }

        return $output;
    }
    /**
     * get_amount_in_inr()
     * @since 1.0.0
     * this function return any amount to usd based on user given currency conversation value,
     * it will not work if admin did not give currency conversation rate
     * */
    protected static function get_amount_in_inr($amount){
        if (self::global_currency() === 'INR'){
            return $amount;
        }
        $payable_amount = self::make_amount_in_inr($amount, self::global_currency());
        if ($payable_amount < 1) {
            $called_class_name = get_called_class();
            $instance = new $called_class_name();

            return $payable_amount . __('USD amount is not supported by '.$instance->gateway_name());
        }
        return $payable_amount;
    }
    /**
     * convert amount to ngn currency base on conversation given by admin
     * */
   private static function make_amount_in_inr($amount, $currency)
    {
        $output = 0;
        $all_currency = GlobalCurrency::script_currency_list();
        foreach ($all_currency as $cur => $symbol) {
            if ($cur === 'INR') {
                continue;
            }
            if ($cur == $currency) {
                $exchange_rate = config('paymentgateway.inr_exchange_rate');
                $output = $amount * $exchange_rate;
            }
        }

        return $output;
    }

    /**
     * get_amount_in_usd()
     * @since 1.0.0
     * this function return any amount to usd based on user given currency conversation value,
     * it will not work if admin did not give currency conversation rate
     * */
    protected static function get_amount_in_ngn($amount){
        if (self::global_currency() === 'NGN'){
            return $amount;
        }
        $payable_amount = self::make_amount_in_ngn($amount, self::global_currency());
        if ($payable_amount < 1) {
            $called_class_name = static::class;
            $instance = new $called_class_name();

            return $payable_amount . __('USD amount is not supported by '.$instance->gateway_name());
        }
        return $payable_amount;
    }

    /**
     * get_amount_in_idr()
     * @since 1.0.0
     * this function return any amount to usd based on user given currency conversation value,
     * it will not work if admin did not give currency conversation rate
     * */
    protected static function get_amount_in_idr($amount){
        if (self::global_currency() === 'IDR'){
            return $amount;
        }
        $payable_amount = self::make_amount_in_idr($amount, self::global_currency());
        if ($payable_amount < 1) {
            $called_class_name = static::class;
            $instance = new $called_class_name();

            return $payable_amount . __('amount is not supported by '.$instance->gateway_name());
        }
        return $payable_amount;
    }
    /**
     * get_amount_in_brl()
     * @since 1.0.0
     * this function return any amount to usd based on user given currency conversation value,
     * it will not work if admin did not give currency conversation rate
     * */
    protected static function get_amount_in_brl($amount){
        if (self::global_currency() === 'BRL'){
            return $amount;
        }
        $payable_amount = self::make_amount_in_brl($amount, self::global_currency());
        if ($payable_amount < 1) {
            $called_class_name = get_called_class();
            $instance = new $called_class_name();

            return $payable_amount . __('amount is not supported by '.$instance->gateway_name());
        }
        return $payable_amount;
    }

    /**
     * get_amount_in_zar()
     * @since 1.0.0
     * this function return any amount to usd based on user given currency conversation value,
     * it will not work if admin did not give currency conversation rate
     * */
    protected static function get_amount_in_zar($amount){
        if (self::global_currency() === 'ZAR'){
            return $amount;
        }
        $payable_amount = self::make_amount_in_zar($amount, self::global_currency());
        if ($payable_amount < 1) {
            $called_class_name = get_called_class();
            $instance = new $called_class_name();

            return $payable_amount . __('amount is not supported by '.$instance->gateway_name());
        }
        return $payable_amount;
    }

    /**
     * convert amount to idr currency base on conversation given by admin
     * */
    private static function make_amount_in_idr($amount, $currency)
    {
        $output = 0;
        $all_currency = GlobalCurrency::script_currency_list();
        foreach ($all_currency as $cur => $symbol) {
            if ($cur == 'IDR') {
                continue;
            }
            if ($cur == $currency) {
                $exchange_rate = config('paymentgateway.idr_exchange_rate');
                $output = $amount * $exchange_rate;
            }
        }

        return $output;
    }

    /**
     * convert amount to ngn currency base on conversation given by admin
     * */
    private static function make_amount_in_ngn($amount, $currency)
    {
        $output = 0;
        $all_currency = GlobalCurrency::script_currency_list();
        foreach ($all_currency as $cur => $symbol) {
            if ($cur === 'NGN') {
                continue;
            }
            if ($cur === $currency) {
                $exchange_rate = config('paymentgateway.ngn_exchange_rate');
                $output = $amount * $exchange_rate;
            }
        }

        return $output;
    }
    /**
     * convert amount to zar currency base on conversation given by admin
     * */
    protected static function make_amount_in_zar($amount,$currency){
        $output = 0;
        $all_currency = GlobalCurrency::script_currency_list();
        foreach ($all_currency as $cur => $symbol) {
            if ($cur === 'ZAR') {
                continue;
            }
            if ($cur == $currency) {
                $exchange_rate = config('paymentgateway.zar_exchange_rate');
                $output = $amount * $exchange_rate ;
            }
        }

        return $output;
    }
    /**
     * convert amount to brl currency base on conversation given by admin
     * */
    protected static function make_amount_in_brl($amount,$currency){
        $output = 0;
        $all_currency = GlobalCurrency::script_currency_list();
        foreach ($all_currency as $cur => $symbol) {
            if ($cur === 'BRL') {
                continue;
            }
            if ($cur == $currency) {
                $exchange_rate = config('paymentgateway.brl_exchange_rate');
                $output = $amount * $exchange_rate ;
            }
        }

        return $output;
    }

}
