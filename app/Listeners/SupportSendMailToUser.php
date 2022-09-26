<?php

namespace App\Listeners;

use App\Events\SupportMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SupportMail;
use App\SupportTicket;
use Illuminate\Support\Facades\Mail;

class SupportSendMailToUser
{

    public function __construct()
    {
        //
    }

    public function handle(SupportMessage $event)
    {
        $ticket_info = $event->message;
        if ($ticket_info->notify === 'on' && $ticket_info->type === 'admin'){
            $subject = __('your have a new message in ticket').' #'.$ticket_info->id;
            $ticket_details = SupportTicket::findOrFail($ticket_info->support_ticket_id);
            $user_email = optional($ticket_details->ticket_user)->email ?? '';
            $message = '<p>'.__('Hello').'<br>';
            $message .= __('you have a new message in ticket no').' #'.$ticket_info->id.'. ';
            $message .= '<div class="btn-wrap"><a class="anchor-btn" href="'.route('seller.support.ticket.view',$ticket_info->support_ticket_id).'">'.__('check messages').'</a></div>';
            $message .= '</p>';

            if (!empty($user_email)){
                try {
                    Mail::to($user_email)->send(new SupportMail([
                        'message' => $message,
                        'subject' => $subject
                    ]));
                }catch (\Exception $e){
                    //show eerror message
                }
            }
        }
    }
}
