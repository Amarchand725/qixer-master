<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xgenious\Paymentgateway\Facades\XgPaymentGateway;
use Illuminate\Support\Facades\Mail;
use App\Helpers\FlashMsg;
use App\Mail\OrderMail;
use App\Order;
use App\User;
use Str;

class ServicePaymentController extends Controller
{
    protected function cancel_page()
    {
        return redirect()->route('frontend.order.payment.cancel.static');
    }

    public function paypal_ipn(Request $request)
    {
        $payment_data = XgPaymentGateway::paypal()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($payment_data['order_id'], $payment_data['transaction_id']);
            $this->send_order_mail($payment_data['order_id']);
            $order_id = $payment_data['order_id'];
            $random_order_id_1 = Str::random(30);
            $random_order_id_2 = Str::random(30);
            $new_order_id = $random_order_id_1.$order_id.$random_order_id_2;
            return redirect()->route('frontend.order.payment.success',$new_order_id);
        }
        return $this->cancel_page();
    }

    public function razorpay_ipn(Request $request)
    {
        $payment_data = XgPaymentGateway::razorpay()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($payment_data['order_id'], $payment_data['transaction_id']);
            $this->send_order_mail($payment_data['order_id']);
            $order_id = $payment_data['order_id'];
            $random_order_id_1 = Str::random(30);
            $random_order_id_2 = Str::random(30);
            $new_order_id = $random_order_id_1.$order_id.$random_order_id_2;
            return redirect()->route('frontend.order.payment.success',$new_order_id);
        }
        return $this->cancel_page();
    }

    public function paytm_ipn(Request $request)
    {
        $payment_data = XgPaymentGateway::paytm()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($payment_data['order_id'], $payment_data['transaction_id']);
            $this->send_order_mail($payment_data['order_id']);
            $order_id = $payment_data['order_id'];
            $random_order_id_1 = Str::random(30);
            $random_order_id_2 = Str::random(30);
            $new_order_id = $random_order_id_1.$order_id.$random_order_id_2;
            return redirect()->route('frontend.order.payment.success',$new_order_id);
        }
        return $this->cancel_page();
    }

    public function mollie_ipn()
    {
        $payment_data = XgPaymentGateway::mollie()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($payment_data['order_id'], $payment_data['transaction_id']);
            $this->send_order_mail($payment_data['order_id']);
            $order_id = $payment_data['order_id'];
            $random_order_id_1 = Str::random(30);
            $random_order_id_2 = Str::random(30);
            $new_order_id = $random_order_id_1.$order_id.$random_order_id_2;
            return redirect()->route('frontend.order.payment.success',$new_order_id);
        }
        return self::cancel_page();
    }

    public function stripe_ipn(Request $request){
        $payment_data = XgPaymentGateway::stripe()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($payment_data['order_id'], $payment_data['transaction_id']);
            $this->send_order_mail($payment_data['order_id']);
            $order_id = $payment_data['order_id'];
            $random_order_id_1 = Str::random(30);
            $random_order_id_2 = Str::random(30);
            $new_order_id = $random_order_id_1.$order_id.$random_order_id_2;
            return redirect()->route('frontend.order.payment.success',$new_order_id);
        }
        return $this->cancel_page();
    }

    public function flutterwave_ipn(Request $request)
    {
        $payment_data = XgPaymentGateway::flutterwave()->ipn_response();

        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($payment_data['order_id'], $payment_data['transaction_id']);
            $this->send_order_mail($payment_data['order_id']);
            $order_id = $payment_data['order_id'];
            $random_order_id_1 = Str::random(30);
            $random_order_id_2 = Str::random(30);
            $new_order_id = $random_order_id_1.$order_id.$random_order_id_2;
            return redirect()->route('frontend.order.payment.success',$new_order_id);
        }
        return $this->cancel_page();
    }


    public function paystack_ipn(Request $request)
    {
        $payment_data = XgPaymentGateway::paystack()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($payment_data['order_id'], $payment_data['transaction_id']);
            $this->send_order_mail($payment_data['order_id']);
            $order_id = $payment_data['order_id'];
            $random_order_id_1 = Str::random(30);
            $random_order_id_2 = Str::random(30);
            $new_order_id = $random_order_id_1.$order_id.$random_order_id_2;
            return redirect()->route('frontend.order.payment.success',$new_order_id);
        }
        return $this->cancel_page();
    }

    public function midtrans_ipn()
    {
        $payment_data = XgPaymentGateway::midtrans()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($payment_data['order_id'], $payment_data['transaction_id']);
            $this->send_order_mail($payment_data['order_id']);
            $order_id = $payment_data['order_id'];
            $random_order_id_1 = Str::random(30);
            $random_order_id_2 = Str::random(30);
            $new_order_id = $random_order_id_1.$order_id.$random_order_id_2;
            return redirect()->route('frontend.order.payment.success',$new_order_id);
        }
        return $this->cancel_page();
    }

    public function payfast_ipn()
    {
        $payment_data = XgPaymentGateway::payfast()->ipn_response();

        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($payment_data['order_id'], $payment_data['transaction_id']);
            $this->send_order_mail($payment_data['order_id']);
            $order_id = $payment_data['order_id'];
            $random_order_id_1 = Str::random(30);
            $random_order_id_2 = Str::random(30);
            $new_order_id = $random_order_id_1.$order_id.$random_order_id_2;
            return redirect()->route('frontend.order.payment.success',$new_order_id);
        }
        return $this->cancel_page();
    }

    public function cashfree_ipn(Request $request)
    {
        $payment_data = XgPaymentGateway::cashfree()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($payment_data['order_id'], $payment_data['transaction_id']);
            $this->send_order_mail($payment_data['order_id']);
            $order_id = $payment_data['order_id'];
            $random_order_id_1 = Str::random(30);
            $random_order_id_2 = Str::random(30);
            $new_order_id = $random_order_id_1.$order_id.$random_order_id_2;
            return redirect()->route('frontend.order.payment.success',$new_order_id);
        }
        return $this->cancel_page();

    }

    public function instamojo_ipn(Request $request)
    {
        $payment_data = XgPaymentGateway::instamojo()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($payment_data['order_id'], $payment_data['transaction_id']);
            $this->send_order_mail($payment_data['order_id']);
            $order_id = $payment_data['order_id'];
            $random_order_id_1 = Str::random(30);
            $random_order_id_2 = Str::random(30);
            $new_order_id = $random_order_id_1.$order_id.$random_order_id_2;
            return redirect()->route('frontend.order.payment.success',$new_order_id);
        }
        return $this->cancel_page();
    }


    public function marcadopago_ipn(Request $request)
    {
        $payment_data = XgPaymentGateway::marcadopago()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($payment_data['order_id'], $payment_data['transaction_id']);
            $this->send_order_mail($payment_data['order_id']);
            $order_id = $payment_data['order_id'];
            $random_order_id_1 = Str::random(30);
            $random_order_id_2 = Str::random(30);
            $new_order_id = $random_order_id_1.$order_id.$random_order_id_2;
            return redirect()->route('frontend.order.payment.success',$new_order_id);
        }
        return $this->cancel_page();
    }

    public function send_order_mail($order_id)
    {
        if(empty($order_details)){
            return redirect()->route('homepage');    
        }
        
        $order_details = Order::find($order_id);
        $seller_email = User::select('email')->where('id',$order_details->seller_id)->first();
        //Send order email to buyer
        try {
            $subject = __('You have successfully placed an order');
            Mail::to($order_details->email)->send(new OrderMail($subject,$order_details));
            Mail::to($seller_email->email)->send(new OrderMail(__('you have a new order #').$order_details->id,$order_details));
            Mail::to(get_static_option('site_global_email'))->send(new OrderMail(__('you have a new order #').$order_details->id,$order_details));
        } catch (\Exception $e) {
            return redirect()->back()->with(FlashMsg::error($e->getMessage()));
        }

    }

    private function update_database($order_id, $transaction_id)
    {
        Order::where('id', $order_id)->update([
            'payment_status' => 'complete',
            'transaction_id' => $transaction_id,
        ]);

    }
}