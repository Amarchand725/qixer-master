# paymentgateway

> General information about this package.
## Installation For laravel 8x

##### Configure Your Composer.json file to install this package
add below code to your ``composer.json`` file

````shell
 "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/Sharifur/paymentgateway.git"
        }
    ],
````

run below command to install this package from your command promt or terminal
````shell
composer require xgenious/paymentgateway 
````

if this payment package asked you for username and password here is it or generate your own token.
```apacheconf
username: sharifur
password: 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
```


Information about the installation procedure for this package.


## Supported Payment Gateway List

* Paytm
* PayPal
* Stripe
* Midtrans
* Razorpay
* Mollie
* FlutterwaveRave
* Paystack
* Payfast
* Cashfree
* Instamojo
* Mercado pago
* PayU (upcoming) 
* Billiplz (upcoming)
* PerfectMoney (upcoming)
* payumoney (upcoming)
* Paytr (upcoming)
* Authorized.net (upcoming)
* Pagseguro (upcoming)


## Payment Request Function With params
here is an example of a ``Controller`` method to charge a customer, this is same for all of avilable payment gateway in this package

```php
 public function payment(Request $request)
    {
         return XgPaymentGateway::payfast()->charge_customer([ 
            //payfast is an example you can added all of payment gateawy name in lowercase
            'amount' => 10, // amount you want to charge from customer
            'title' => 'this is test title', // payment title
            'description' => 'this is test description', // payment description
            'ipn_url' => route('stripe.ipn'), //you will get payment response in this route
            'order_id' => 5, // your order number
            'track' => 'asdfasdfsdf', // a random number to keep track of your payment 
            'cancel_url' => route('payment.failed'), //payment gateway will redirect here if the payment is failed
            'success_url' => route('payment.success'), // payment gateway will redirect here after success
            'email' => 'dvrobin4@gmail.com', // user email
            'name' => 'sharifur rhamna', // user name
            'payment_type' => 'order', // which kind of payment your are receving from customer
        ]);
    }
 ```



## Payment Ipn Function

here is an example of a ``Controller`` method to ipn response, this is same for all of available payment gateway in this package

```php
    public function payfast_ipn()
    {
        dd(XgPaymentGateway::payfast()->ipn_response());
    }
 ```


## Paytm

[Checkout Paytm Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/paytm/)

Here is Test Credentials For Paytm
````dotenv
PAYTM_ENVIRONMENT=local // local|production
PAYTM_MERCHANT_ID=Digita57697814558795
PAYTM_MERCHANT_KEY="dv0XtmsPYpewNag&"
PAYTM_MERCHANT_WEBSITE="WEBSTAGING"
PAYTM_CHANNEL=""
PAYTM_INDUSTRY_TYPE=""
PAYTM_ENVIRONMENT="local" // values : (local | production)
````


#### Paytm ipn route example
````php
Route::post('/paytm-ipn', [\App\Http\Controllers\PaymentLogController::class,'paytm_ipn'] )->name('payment.paytm.ipn');
````
you must have to excluded paytm ipn route from csrf token verify, go to `app/Http/Middleware` ``VerifyCsrfToken`` Middleware add your route path here in ``$except`` array

````php
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'paytm-ipn'
    ];
}
````



## PayPal

[Checkout Paypal Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/paypal/)

Here is Test Credentials For Paypal
````dotenv
PAYPAL_MODE=sandbox
PAYPAL_SANDBOX_CLIENT_ID='AUP7AuZMwJbkee-2OmsSZrU-ID1XUJYE-YB-2JOrxeKV-q9ZJZYmsr-UoKuJn4kwyCv5ak26lrZyb-gb'
PAYPAL_SANDBOX_CLIENT_SECRET='EEIxCuVnbgING9EyzcF2q-gpacLneVbngQtJ1mbx-42Lbq-6Uf6PEjgzF7HEayNsI4IFmB9_CZkECc3y'
PAYPAL_SANDBOX_APP_ID="641651651958"
PAYPAL_LIVE_CLIENT_ID=""
PAYPAL_LIVE_CLIENT_SECRET=""
PAYPAL_LIVE_APP_ID=""
PAYPAL_PAYMENT_ACTION=""
PAYPAL_CURRENCY="USD"
PAYPAL_NOTIFY_URL="http://gateway.test/paypal/ipn"
PAYPAL_LOCALE="en_GB"
PAYPAL_VALIDATE_SSL="false"
````

#### Paypal ipn route example
````php
Route::get('/paypal-ipn', [\App\Http\Controllers\PaymentLogController::class,'paypal_ipn'] )->name('payment.paypal.ipn');
````


## Stripe

[Checkout Stripe Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/stripe/)


Here is Test Credentials For Stripe
````dotenv
STRIPE_PUBLIC_KEY=pk_test_51GwS1SEmGOuJLTMsIeYKFtfAT3o3Fc6IOC7wyFmmxA2FIFQ3ZigJ2z1s4ZOweKQKlhaQr1blTH9y6HR2PMjtq1Rx00vqE8LO0x
STRIPE_SECRET_KEY=sk_test_51GwS1SEmGOuJLTMs2vhSliTwAGkOt4fKJMBrxzTXeCJoLrRu8HFf4I0C5QuyE3l3bQHBJm3c0qFmeVjd0V9nFb6Z00VrWDJ9Uw
````


#### Stripe ipn route example
````php
Route::get('/stripe-ipn', [\App\Http\Controllers\PaymentLogController::class,'stripe_ipn'] )->name('payment.stripe.ipn');
````



## Midtrans

[Checkout Midtrans Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/midtrans/)


Here is Test Credentials For Midtrans

````dotenv
MIDTRANS_MERCHANT_ID="G770543580"
MIDTRANS_SERVER_KEY="SB-Mid-server-9z5jztsHyYxEdSs7DgkNg2on"
MIDTRANS_CLIENT_KEY="SB-Mid-client-iDuy-jKdZHkLjL_I"
MIDTRANS_ENVAIRONTMENT="false"
````

#### Midtrans ipn route example
````php
Route::get('/midtrans-ipn', [\App\Http\Controllers\PaymentLogController::class,'midtrans_ipn'] )->name('payment.midtrans.ipn');
````

#### Midtrans Test Cards
```
VISA                                        Description
4811 1111 1111 1114                         3DS Enabled
4911 1111 1111 1113                         3DS Enabled. Transaction Denied by Bank

4411 1111 1111 1118                         3DS Disabled
4511 1111 1111 1117                         3DS Disabled. Challenged by Fraud Detection
4611 1111 1111 1116                         3DS Disabled. Denied by Fraud Detection
4711 1111 1111 1115                         3DS Disabled. Transaction Denied by Bank

MASTERCARD                                  Description
5211 1111 1111 1117                         3DS Enabled
5111 1111 1111 1118                         3DS Enabled. Transaction Denied by Bank

5410 1111 1111 1116                         3DS Disabled
5510 1111 1111 1115                         3DS Disabled. Challenged by Fraud Detection
5411 1111 1111 1115                         3DS Disabled. Denied by Fraud Detection
5511 1111 1111 1114                         3DS Disabled. Transaction Denied by Bank
```

## Razorpay

[Checkout Razorpay Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/razorpay/)


Here is Test Credentials For Razorpay

````dotenv
RAZORPAY_API_KEY="rzp_test_SXk7LZqsBPpAkj"
RAZORPAY_API_SECRET="Nenvq0aYArtYBDOGgmMH7JNv"
````
#### Razorpay ipn route example
````php
Route::post('/razorpay-ipn', [\App\Http\Controllers\PaymentLogController::class,'razorpay_ipn'] )->name('payment.razorpay.ipn');
````

## Mollie
[Checkout Mollie Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/mollie/)

Here is Test Credentials For Mollie

````dotenv
MOLLIE_KEY=test_fVk76gNbAp6ryrtRjfAVvzjxSHxC2v
````
#### Mollie ipn route example
````php
Route::get('/mollie-ipn', [\App\Http\Controllers\PaymentLogController::class,'mollie_ipn'] )->name('payment.razorpay.ipn');
````

## FlutterwaveRave

[Checkout Flutterwave Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/flutterwave/)


Here is Test Credentials For Flutterwave

````dotenv
FLW_PUBLIC_KEY=FLWPUBK_TEST-86cce2ec43c63e09a517290a8347fcab-X
FLW_SECRET_KEY=FLWSECK_TEST-d37a42d8917db84f1b2f47c125252d0a-X
FLW_SECRET_HASH="fundorex"
````

#### FlutterwaveRave ipn route example
````php
Route::get('/flutterwave-ipn', [\App\Http\Controllers\PaymentLogController::class,'flutterwave_ipn'] )->name('payment.flutterwave.ipn');
````

## Paystack

[Checkout Paystack Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/paystack/)

Here is Test Credentials For Paystack

````dotenv
PAYSTACK_PUBLIC_KEY=pk_test_a7e58f850adce9a73750e61668d4f492f67abcd9
PAYSTACK_SECRET_KEY=sk_test_2a458001d806c878aba51955b962b3c8ed78f04b
PAYSTACK_PAYMENT_URL=https://api.paystack.co
MERCHANT_EMAIL=sopnilsohan03@gmail.com
````

#### Paystack ipn route example
````php
Route::get('/paystack-ipn', [\App\Http\Controllers\PaymentLogController::class,'paystack_ipn'] )->name('payment.paystack.ipn');
````

> Note: paystack does not support multiple ipn route, it supports only one webhook you can add in paystack dashboard. you can use $arg['payment_type'] data for check which kind of payment processed

## Payfast
[Checkout Payfast Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/payfast/)

Here is Test Credentials For Payfast

````dotenv
PF_MERCHANT_ID=10024000
PF_MERCHANT_KEY=77jcu5v4ufdod
PAYFAST_PASSPHRASE=testpayfastsohan
PF_MERCHANT_ENV=true
PF_ITN_URL="https://fundorex.test/donation-payfast"
````

#### Payfast ipn route example
````php
Route::post('/payfast-ipn', [\App\Http\Controllers\PaymentLogController::class,'payfast_ipn'] )->name('payment.payfast.ipn');
````
you must have to excluded Payfast ipn route from csrf token verify, go to `app/Http/Middleware` ``VerifyCsrfToken`` Middleware add your route path here in ``$except`` array

````php
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'payfast-ipn'
    ];
}
````


## Cashfree
[Checkout Cashfree Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/cashfree/)

Here is Test Credentials For Cashfree

````dotenv
CASHFREE_TEST_MODE=true
CASHFREE_APP_ID="94527832f47d6e74fa6ca5e3c72549"
CASHFREE_SECRET_KEY="ec6a3222018c676e95436b2e26e89c1ec6be2830"
````

#### Cashfree ipn route example
````php
Route::post('/cashfree-ipn', [\App\Http\Controllers\PaymentLogController::class,'cashfree_ipn'] )->name('payment.cashfree.ipn');
````
you must have to excluded Cashfree ipn route from csrf token verify, go to `app/Http/Middleware` ``VerifyCsrfToken`` Middleware add your route path here in ``$except`` array

````php
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'cashfree-ipn'
    ];
}
````


## Instamojo
[Checkout Instamojo Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/instamojo)

Here is Test Credentials For Instamojo

````dotenv
INSTAMOJO_CLIENT_ID=test_nhpJ3RvWObd3uryoIYF0gjKby5NB5xu6S9Z
INSTAMOJO_CLIENT_SECRET=test_iZusG4P35maQVPTfqutbCc6UEbba3iesbCbrYM7zOtDaJUdbPz76QOnBcDgblC53YBEgsymqn2sx3NVEPbl3b5coA3uLqV1ikxKquOeXSWr8Ruy7eaKUMX1yBbm
INSTAMOJO_USERNAME=""
INSTAMOJO_PASSWORD=""
INSTAMOJO_TEST_MODE="true"
````
>> Instamojo Pago only works with INR currency

#### Instamojo ipn route example
````php
Route::get('/instamojo-ipn', [\App\Http\Controllers\PaymentLogController::class,'instamojo_ipn'] )->name('payment.instamojo.ipn');
````

##### Test Credentials for Instamojo
````
mobile number 919090213229
For payments use the following card details:
Number: 4242 4242 4242 4242
Date: Any valid future date
CVV: 111
Name: abc
3D-secure password: 1221
````


## Mercadopago

[Checkout Mercadopago Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/mercadopago/)

Here is Test Credentials For Mercadopago 

````dotenv
MERCADO_PAGO_CLIENT_ID=TEST-0a3cc78a-57bf-4556-9dbe-2afa06347769
MERCADO_PAGO_CLIENT_SECRET=TEST-4644184554273630-070813-7d817e2ca1576e75884001d0755f8a7a-786499991
MERCADO_PAGO_TEST_MODE=true
````
>> Mercado Pago only works with BRL currency 

#### Mercado ipn route example
````php
Route::get('/mercadopago-ipn', [\App\Http\Controllers\PaymentLogController::class,'mercadopago_ipn'] )->name('payment.mercadopago.ipn');
````

##### Test Credentials for Mercadopago
````
For payments use the following card details:
Number: 5031 4332 1540 6351
Date: 11/25
CVV: 123
Name: abc
````



## Currency Conversation For This Package

>you must have to add this currency value to work all the payment gateway properly, make sure you have make this rate update able from admin panel

````dotenv
IDR_EXCHANGE_RATE="14365.30"
INR_EXCHANGE_RATE="74.85"
NGN_EXCHANGE_RATE="409.91"
ZAR_EXCHANGE_RATE="15.86"
BRL_EXCHANGE_RATE="5.70"
SITE_GLOBAL_CURRENCY=USD
````

## Using this package

Information about using this package

## Contributing
Information about contributing to this package.

