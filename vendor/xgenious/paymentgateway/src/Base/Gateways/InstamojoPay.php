<?php

namespace Xgenious\Paymentgateway\Base\Gateways;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Instamojo\Instamojo;
use Xgenious\Paymentgateway\Base\PaymentGatewayBase;

class InstamojoPay extends PaymentGatewayBase
{

    public function charge_amount($amount)
    {
        if (in_array(self::global_currency(), $this->supported_currency_list())) {
            return $amount;
        }
        return self::get_amount_in_inr($amount);
    }

    public function ipn_response(array $args = [])
    {
        $payment_id = request()->get('payment_id');
        $payment_request_id = request()->get('payment_request_id');
        $api_token = $this->setConfig();
        $result = Http::asForm()
            ->withToken($api_token)
            ->acceptJson()
            ->get($this->base_url() . 'v2/payment_requests/' . $payment_request_id);
        $response = $result->object();

        if ($result->ok() && property_exists($response, 'status') && $response->status === 'Completed') {
            $order_id = Str::of($response->purpose)->after('_ID_')->trim()->__toString();
            return $this->verified_data([
                'transaction_id' => $payment_id,
                'order_id' => substr($order_id,5,-5)
            ]);
        }
        return ['status' => 'failed'];
    }

    /**
     * @throws \Exception
     */
    public function charge_customer(array $args)
    {
        $api_token = $this->setConfig();
        $charge_amount = $this->charge_amount($args['amount']);
        $order_id = random_int(01234, 99999) . $args['order_id'] . random_int(01234, 99999); // not required to mask order for this payment gateway
        $response = Http::asForm()
            ->acceptJson()
            ->withToken($api_token)
            ->post($this->base_url() . 'v2/payment_requests/', [
                'purpose' => $args['payment_type'] . '_ID_' . $order_id,
                'amount' => $charge_amount,
                'buyer_name' => $args['name'],
                'email' => $args['email'],
//                'phone' => $args['phone'] ?? random_int(123456789,999999999), //mobile number support will be available in future
                'redirect_url' => $args['ipn_url'],
                'send_email' => 'True',
                'send_sms' => 'False', //mobile number support will be available in future
//                'webhook' => '', //webhook option will be avilable in future
                'allow_repeated_payments' => 'False',
            ]);
        $res_body = $response->object();
        if (property_exists($res_body, 'longurl')) {
            return redirect()->away($response->object()->longurl);
        } else {
            abort(405, 'something went wrong! , check your instamojo credentials were correct or not.');
        }
    }

    public function supported_currency_list()
    {
        return ['INR'];
    }

    public function charge_currency()
    {
        if (in_array(self::global_currency(), $this->supported_currency_list())) {
            return self::global_currency();
        }
        return "INR";
    }

    public function gateway_name()
    {
        return 'instamojo';
    }

    protected function base_url()
    {
        $prefix = config('paymentgateway.instamojo.test_mode') ? 'test' : 'api';
        return 'https://' . $prefix . '.instamojo.com/';
    }

    protected function setConfig()
    {

        $response = Http::asForm()
            ->withBasicAuth(config('paymentgateway.instamojo.client_id'), config('paymentgateway.instamojo.client_secret'))
            ->post($this->base_url() . 'oauth2/token/', [
                'grant_type' => 'client_credentials',
            ]);
        if ($response->ok()) {
            return $response->object()->access_token;
        }
        $response->throw();
    }
}
