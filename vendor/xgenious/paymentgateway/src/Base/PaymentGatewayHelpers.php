<?php

namespace Xgenious\Paymentgateway\Base;

use Xgenious\Paymentgateway\Base\Gateways\CashFreePay;
use Xgenious\Paymentgateway\Base\Gateways\FlutterwavePay;
use Xgenious\Paymentgateway\Base\Gateways\InstamojoPay;
use Xgenious\Paymentgateway\Base\Gateways\MidtransPay;
use Xgenious\Paymentgateway\Base\Gateways\MolliePay;
use Xgenious\Paymentgateway\Base\Gateways\PayFastPay;
use Xgenious\Paymentgateway\Base\Gateways\PaypalPay;
use Xgenious\Paymentgateway\Base\Gateways\PaystackPay;
use Xgenious\Paymentgateway\Base\Gateways\PaytmPay;
use Xgenious\Paymentgateway\Base\Gateways\PayUmoneyPay;
use Xgenious\Paymentgateway\Base\Gateways\RazorPay;
use Xgenious\Paymentgateway\Base\Gateways\StripePay;
use Xgenious\Paymentgateway\Base\Gateways\MarcadoPagoPay;

class PaymentGatewayHelpers
{

    public function stripe() : StripePay
    {
        return new StripePay();
    }
    public function paypal() : PaypalPay
    {
        return new PaypalPay();
    }
    public function midtrans() : MidtransPay
    {
        return new MidtransPay();
    }
    public function paytm() : PaytmPay
    {
        return new PaytmPay();
    }
    public function razorpay() : RazorPay
    {
        return new RazorPay();
    }
    public function mollie() : MolliePay
    {
        return new MolliePay();
    }
    public function flutterwave() : FlutterwavePay
    {
        return new FlutterwavePay();
    }
    public function paystack() : PaystackPay
    {
        return new PaystackPay();
    }

    public function payfast() : PayFastPay
    {
        return new PayFastPay();
    }
    public function cashfree() : CashFreePay
    {
        return new CashFreePay();
    }
    public function instamojo() : InstamojoPay
    {
        return new InstamojoPay();
    }
    public function marcadopago() : MarcadoPagoPay
    {
        return new MarcadoPagoPay();
    }
    public function payumoney() : PayUmoneyPay
    {
        return new PayUmoneyPay();
    }
    public function script_currency_list(){
        return GlobalCurrency::script_currency_list();
    }
}
