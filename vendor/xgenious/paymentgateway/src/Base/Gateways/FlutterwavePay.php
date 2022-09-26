<?php

namespace Xgenious\Paymentgateway\Base\Gateways;
use Xgenious\Paymentgateway\Base\PaymentGatewayBase;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class FlutterwavePay extends PaymentGatewayBase
{

    /**
     * @inheritDoc
     *  /**
     * this payment gateway will not work without this package
     * @ https://github.com/kingflamez/laravelrave
     * */
    public function charge_amount($amount)
    {
        if (in_array(self::global_currency(), $this->supported_currency_list())){

            return $amount;
        }
        return self::get_amount_in_usd($amount);
    }

    /**
     * @inheritDoc
     * @param ['status','transaction_id','order_id' ]
     */
    public function ipn_response(array $args = [])
    {
        $response = Flutterwave::verifyTransaction(request()->transaction_id);
        $status = $response['status'] ?? '';

        if ( $status === 'success'){
            $txRef = $response['data']['tx_ref'];
            $order_id = $response['data']['meta']['metavalue'];

            return $this->verified_data([
                'status' => 'complete',
                'transaction_id' => $txRef,
                'order_id' => substr( $order_id,5,-5) ,
            ]);
        }

        return ['status' => 'failed'];
    }

    /**
     * @inheritDoc
     * @param ['amount','title','description' ,'ipn_url','order_id','track','cancel_url', 'success_url' ,'email','name','payment_type']
     */
    public function charge_customer(array $args)
    {
        if($this->charge_amount($args['amount']) > 1000){
            abort(405,__('We could not process your request due to your amount is higher than the maximum.'));
        }

        //This generates a payment reference
        $reference = Flutterwave::generateReference();
        $order_id =  random_int(12345,99999).$args['order_id'].random_int(12345,99999);
        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' =>$this->charge_amount($args['amount']),
            'email' => $args['email'],
            'tx_ref' => $reference,
            'currency' => $this->charge_currency(),
            'redirect_url' => $args['ipn_url'],
            'customer' => [
                'email' => $args['email'],
                "name" => $args['name']
            ],
            "customizations" => [
                "title" => null,
                "description" => $args['description']
            ],
            'meta' =>  [
                'metaname' => 'order_id', 'metavalue' => $order_id,
            ]
        ];

        $payment = Flutterwave::initializePayment($data);
        if ($payment['status'] !== 'success') {
            abort(405,$payment['message']);
        }
        return redirect($payment['data']['link']);
    }

    /**
     * @inheritDoc
     */
    public function supported_currency_list()
    {
        return ['BIF', 'CAD', 'CDF', 'CVE', 'EUR', 'GBP', 'GHS', 'GMD', 'GNF', 'KES', 'LRD', 'MWK', 'MZN', 'NGN', 'RWF', 'SLL', 'STD', 'TZS', 'UGX', 'USD', 'XAF', 'XOF', 'ZMK', 'ZMW', 'ZWD'];
    }

    /**
     * @inheritDoc
     */
    public function charge_currency()
    {
        if (in_array(self::global_currency(), $this->supported_currency_list())) {
            return self::global_currency();
        }
        return "USD";
    }

    /**
     * @inheritDoc
     */
    public function gateway_name()
    {
        return 'flutterwaverave';
    }

    protected function get_visitor_country()
    {
        $return_val = 'NG';
        $ip = getVisIpAddr();
        $update = @json_decode(file_get_contents(
            "http://www.geoplugin.net/json.gp?ip=" . $ip));

        $update = (array)$update;
        $return_val = isset($update['geoplugin_countryCode']) ? $update['geoplugin_countryCode'] : $return_val;

        return $return_val;
    }
}
