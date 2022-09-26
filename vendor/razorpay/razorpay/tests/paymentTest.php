<?php

namespace Razorpay\Tests;

use Razorpay\Api\Request;

class PaymentTest extends TestCase
{
    /**
     * Specify unique order id & payment id d
     * for example order_IEcrUMyevZFuCS & pay_IEczPDny6uzSnx
     */

    private $orderId = "";

    private $paymentId = "";

    public function setUp()
    {
        parent::setUp();
    }    

    /**
     * Fetch all payment
     */
    public function testFetchAllPayment()
    {
        $data = $this->api->payment->all();

        $this->assertTrue(is_array($data->toArray()));

        $this->assertTrue(is_array($data['items']));
    }
    
    /**
     * Fetch a payment
     */
    public function testFetchPayment()
    {
        $payment = $this->api->payment->all();
        
        if($payment['count'] !== 0){
             
            $data = $this->api->payment->fetch($payment['items'][0]['id']);

            $this->assertTrue(is_array($data->toArray()));

            $this->assertTrue(in_array('payment',$data->toArray()));
        }
    } 
    
    /**
     * Fetch a payment
     */
    public function testFetchOrderPayment()
    {
        $data = $this->api->order->fetch($this->orderId)->payments();

        $this->assertTrue(is_array($data->toArray()));
        
        $this->assertTrue(is_array($data['items']));
    }

    /**
     * Update a payment
     */
    public function testUpdatePayment()
    {
        $data = $this->api->payment->fetch($this->paymentId)->edit(array('notes'=> array('key_1'=> 'value1','key_2'=> 'value2')));

        $this->assertTrue(is_array($data->toArray()));
        
        $this->assertTrue(in_array('payment',$data->toArray()));
    }

    /**
     * Fetch card details with paymentId
     */
    public function testFetchCardWithPaymentId()
    {
        $data = $this->api->payment->fetch($this->paymentId)->fetchCardDetails();
        
        $this->assertTrue(is_array($data->toArray()));
        
        $this->assertTrue(in_array('card',$data->toArray())); 
    }

    /**
     * Fetch Payment Downtime Details
     */
    public function testfetchPaymentDowntime()
    {
        $data = $this->api->payment->fetchPaymentDowntime();

        $this->assertTrue(is_array($data->toArray()));
       
        $this->assertTrue(in_array('count',$data->toArray())); 
    }

    /**
     * Fetch Payment Downtime Details
     */
    public function testfetchPaymentDowntimeById()
    {
        $downtime = $this->api->payment->fetchPaymentDowntime();
 
        $data = $this->api->payment->fetchPaymentDowntimeById($downtime['items'][0]['id']);

        $this->assertTrue(is_array($data->toArray()));
        
    }

}
