<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\ProjectDetails;
use App\Payment;
use Session;
use Stripe;
use Auth;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $project_details = ProjectDetails::where('id', $request->project_details_id)->first();

        if($request->ajax()){
            if($project_details){
                if(isset($request->type) && $request->type=='paypal'){
                    $payment = Payment::create([
                        'buyer_id' => Auth::user()->id,
                        'project_id' => $project_details->project_id,
                        'project_details_id' => $request->project_details_id,
                        'transaction_id' => $request->transaction_id,
                        'amount' => $project_details->total_cost,
                        'payment_gateway' => 'paypal',
                        'type' => 1,
                        'username' => Auth::user()->username,
                        'status' => $request->transaction_status,
                    ]);
                }elseif(isset($request->type) && $request->type=='razorpay'){
                    $input = $request->all();
  
                    $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            
                    $payment = $api->payment->fetch($input['razorpay_payment_id']);
            
                    if(count($input)  && !empty($input['razorpay_payment_id'])) {
                        try {
                            $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
            
                        } catch (Exception $e) {
                            return  $e->getMessage();
                            Session::put('error',$e->getMessage());
                            return redirect()->back();
                        }
                    }
        
                    if($payment){
                        $inserted = Payment::create([
                            'buyer_id' => Auth::user()->id,
                            'project_id' => $project_details->project_id,
                            'project_details_id' => $request->project_details_id,
                            'transaction_id' => $request->razorpay_payment_id,
                            'amount' => $project_details->total_cost,
                            'payment_gateway' => 'razorpay',
                            'type' => 1,
                            'username' => Auth::user()->username,
                            'status' => $request->razorpay_status,
                        ]);
                    }
                }

                return response()->json(['status' => 'You have paid succesfully.']);
            }
        }else{
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripe_payment = Stripe\Charge::create ([
                    "amount" => 100 * $project_details->total_cost,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Test payment." 
            ]);

            if($stripe_payment){
                $payment = Payment::create([
                    'buyer_id' => Auth::user()->id,
                    'project_id' => $project_details->project_id,
                    'project_details_id' => $request->project_details_id,
                    'amount' => $project_details->total_cost,
                    'payment_gateway' => 'stripe',
                    'type' => 1,
                    'username' => Auth::user()->username,
                    'status' => $stripe_payment->status,
                ]);
            }
    
            Session::flash('success', 'Payment successful!');
            
            return back();
        }
    }
}