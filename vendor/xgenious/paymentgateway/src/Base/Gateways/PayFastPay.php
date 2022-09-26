<?php

namespace Xgenious\Paymentgateway\Base\Gateways;
use Xgenious\Paymentgateway\Base\PaymentGatewayBase;


class PayFastPay extends PaymentGatewayBase
{

    /**
     * @inheritDoc
     *
     * this payment gateway will not work without this package
     * @ https://github.com/kingflamez/laravelrave
     *
     */
    public function charge_amount($amount)
    {
        if (in_array(self::global_currency(), $this->supported_currency_list())){
            return $amount;
        }
        return self::get_amount_in_zar($amount);
    }

    /**
     * @inheritDoc
     *  * @param array $args
     * @required param list
     * request
     *
     * @return array
     */
    public function ipn_response(array $args = [])
    {
        $payfast = new \Billow\Payfast();
        $status = $payfast->verify( request(),  request()->amount_gross,  request()->m_payment_id)->status();
        $return_val = ['status' => 'failed'];
        // Handle the result of the transaction.
        switch( $status )
        {
            case 'COMPLETE': // Things went as planned, update your order status and notify the customer/admins.
                $return_val = $this->verified_data([
                    'status' => 'complete',
                    'order_id' =>  substr( request()->m_payment_id,5,-5) ,
                    'transaction_id' =>  request()->pf_payment_id,
                ]);
                break;
            case 'FAILED': // We've got problems, notify admin and contact Payfast Support.
                $return_val = $this->verified_data([
                    'status' => 'failed',
                    'order_id' => substr( request()->m_payment_id,5,-5)
                ]);
                break;
            case 'PENDING': // We've got problems, notify admin and contact Payfast Support.
                break;
            default: // We've got problems, notify admin to check logs.
                break;
        }

        return $return_val;
    }

    /**
     * @inheritDoc
     */
    public function charge_customer(array $args)
    {
        
        if($this->charge_amount($args['amount']) > 500000){
            return back()->with(['msg' => __('We could not process your request due to your amount is higher than the maximum.'),'type' => 'danger']);
        }

        $order_id =  random_int(12345,99999).$args['order_id'].random_int(12345,99999);

        $payfast = new \Billow\Payfast();
        $payfast->setBuyer( $args['name'], null, $args['email']);
        $payfast->setAmount($this->charge_amount($args['amount']));
        $payfast->setItem( $args['description'] , null);
        $payfast->setMerchantReference($order_id);
        $payfast->setCancelUrl($args['cancel_url']);
        $payfast->setReturnUrl($args['success_url']);
        $payfast->setNotifyUrl($args['ipn_url']);
        $submit_form =  $payfast->paymentForm(__('Pay Now'));

        return view('paymentgateway::payfast',compact('submit_form'));
    }

    /**
     * @inheritDoc
     */
    public function supported_currency_list()
    {
        return ['ZAR'];
    }

    /**
     * @inheritDoc
     */
    public function charge_currency()
    {
        if (in_array(self::global_currency(), $this->supported_currency_list())) {
            return self::global_currency();
        }
        return "ZAR";
    }

    /**
     * @inheritDoc
     */
    public function gateway_name()
    {
        return 'payfast';
    }
}
