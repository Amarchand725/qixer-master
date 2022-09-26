<?php

namespace Xgenious\Paymentgateway\Base\Gateways;
use Xgenious\Paymentgateway\Base\PaymentGatewayBase;

class CashFreePay extends PaymentGatewayBase
{

    /**
     * @inheritDoc
     */
    public function charge_amount($amount)
    {
        if (in_array(self::global_currency(), $this->supported_currency_list())){
            return $amount;
        }
        return self::get_amount_in_inr($amount);
    }

    /**
     * @inheritDoc
     */
    public function ipn_response(array $args = [])
    {
        $secretKey = config('paymentgateway.cashfree.secret_key');
        $orderId = request()->get('orderId');
        $orderAmount = request()->get('orderAmount');
        $referenceId = request()->get('referenceId');
        $txStatus = request()->get('txStatus');
        $paymentMode = request()->get('paymentMode');
        $txMsg = request()->get('txMsg');
        $txTime = request()->get('txTime');
        $signature = request()->get('signature');

        $data = $orderId . $orderAmount . $referenceId . $txStatus . $paymentMode . $txMsg . $txTime;
        $hash_hmac = hash_hmac('sha256', $data, $secretKey, true);
        $computedSignature = base64_encode($hash_hmac);

        if ($computedSignature === $signature && request()->txStatus === 'SUCCESS'){
            return $this->verified_data([
                'status' => 'complete',
                'transaction_id' => request()->referenceId,
                'order_id' => substr( request()->get('orderId'),5,-5) ,
            ]);
        }
        return  ['status' => 'failed'];
    }

    /**
     * @inheritDoc
     */
    public function charge_customer(array $args)
    {
        $config_data = $this->setConfig();
        $order_id =  random_int(12345,99999).$args['order_id'].random_int(12345,99999);
        $postData = array(
            "appId" => $config_data['app_id'],
            "orderId" => $order_id,
            "orderAmount" => round($this->charge_amount($args['amount']),2),
            "orderCurrency" => "INR",
            "orderNote" => $order_id,
            "customerName" => $args['name'],
            "customerPhone" => random_int(9999999999999,9999999999999),
            "customerEmail" => $args['email'],
            "returnUrl" => $args['ipn_url'],
            "notifyUrl" => null,
        );

        ksort($postData);

        $signatureData = "";
        foreach ( $postData  as $key => $value) {
            $signatureData .= $key . $value;
        }
        $signature = hash_hmac('sha256', $signatureData, $config_data['secret_key'], true);
        $signature = base64_encode($signature);
        $data = [
            'action' => $config_data['action'],
            'app_id' => $config_data['app_id'],
            'order_id' => $order_id,
            'amount' => round($this->charge_amount($args['amount']),2),
            'currency' => "INR",
            'name' => $args['name'],
            'email' => $args['email'],
            'phone' => random_int(9999999999999,9999999999999),
            'signature' => $signature,
            "return_url" => $args['ipn_url'],
            "notify_url" => null,
        ];
        return view('paymentgateway::cashfree',['payment_data' => $data]);
    }

    /**
     * @inheritDoc
     */
    public function supported_currency_list()
    {
        return ['INR'];
    }

    /**
     * @inheritDoc
     */
    public function charge_currency()
    {
        if (in_array(self::global_currency(), $this->supported_currency_list())){
            return self::global_currency();
        }
        return  "INR";
    }

    /**
     * @inheritDoc
     */
    public function gateway_name()
    {
        return 'cashfree';
    }

    protected function setConfig() : array
    {
        return [
          'app_id' => config('paymentgateway.cashfree.app_id'),
          'secret_key' => config('paymentgateway.cashfree.secret_key'),
          'order_currency' => 'INR',
          'action' => $this->get_api_url()
        ];
    }

    public function get_api_url(){
        return config('paymentgateway.cashfree.test_mode') ?
            'https://test.cashfree.com/billpay/checkout/post/submit' :
            'https://www.cashfree.com/checkout/post/submit';
    }

}
