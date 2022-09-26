<?php

namespace Xgenious\Paymentgateway\Base\Gateways;

use Xgenious\Paymentgateway\Base\PaymentGatewayBase;

class MarcadoPagoPay extends PaymentGatewayBase
{

    public function charge_amount($amount)
    {
        if (in_array(self::global_currency(), $this->supported_currency_list(), true)){
            return $amount;
        }
        return self::get_amount_in_brl($amount);
    }

    public function ipn_response(array $args = [])
    {
        $this->setAccessToken();
        $request = request();
        $return_status = $request->status;
        $return_merchant_order_id = $request->merchant_order_id;
        $return_payment_id = $request->payment_id;
        $payment_details = \MercadoPago\Payment::find_by_id($return_payment_id);
        $order_id = $payment_details->order->id;
        $payment_status = $payment_details->status;
        $payment_metadata =$payment_details->metadata;
        $payment_metadata_order_id =$payment_details->metadata->order_id;

        if ($return_status === $payment_status && $return_merchant_order_id === $order_id){
            return $this->verified_data([
                'transaction_id' => $return_payment_id,
                'order_id' => substr($payment_metadata_order_id,5,-5)
            ]);
        }
        return ['status' => 'failed'];
    }

    public function charge_customer(array $args)
    {

        $charge_amount = $this->charge_amount($args['amount']);
        $order_id =  random_int(01234,99999).$args['order_id'].random_int(01234,99999);
        $this->setAccessToken();
        $preference = new \MercadoPago\Preference();
        # Building an item
        $item = new \MercadoPago\Item();
        $item->id = $order_id;
        $item->title = $args['title'];
        $item->quantity = 1;
        $item->unit_price = $charge_amount;

        $preference->items = array($item);

        $preference->back_urls = array(
            "success" => $args['ipn_url'],
            "failure" => $args['cancel_url'],
            "pending" => $args['cancel_url']
        );
        $preference->auto_return = "approved";
        $preference->metadata = array(
            "order_id" => $order_id,
        );
        $preference->save(); # Save the preference and send the HTTP Request to create

        return  redirect()->away($preference->init_point);

    }
    protected function setAccessToken(){
        return \MercadoPago\SDK::setAccessToken(config('paymentgateway.mercadopago.client_secret'));
    }

    public function supported_currency_list()
    {
        return ['BRL'];
    }

    public function charge_currency()
    {
        if (in_array(self::global_currency(), $this->supported_currency_list())){
            return self::global_currency();
        }
        return  "BRL";
    }

    public function gateway_name()
    {
       return 'mercadopago';
    }
}
