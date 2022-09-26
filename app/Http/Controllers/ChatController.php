<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\ProjectDetails;
use App\Message;
use Auth;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $all_chat = Chat::orderby('id', 'asc')
                    /* ->where('sender_id', Auth::user()->id)
                    ->where('reciever_id', $request->reciever_id)

                    ->orWhere('sender_id', $request->reciever_id)
                    ->where('reciever_id', Auth::user()->id) */
                    ->where('project_details_id', $request->project_details_id)
                    ->get();
        
            return (string) view('frontend.user.seller.activity.chat-message', compact('all_chat'));
    }
    public function store(Request $request)
    {
        $project_detial = ProjectDetails::where('id', $request->project_details_id)->first();

        $sendto_users = [];
        if(Auth::check() && Auth::user()->user_type==0){ //seller
            $sendto_users[] = $project_detial->hasProject->hasRequirement->project_manager_id;
            $sendto_users[] = $project_detial->hasProject->client_id;
        }elseif(Auth::check() && Auth::user()->user_type==1){ //buyer means client
            $sendto_users[] = $project_detial->hasProject->hasRequirement->project_manager_id;
            $sendto_users[] = $project_detial->hasProject->service_provider_id;
        }else{ //manager
            $sendto_users[] = $project_detial->hasProject->client_id;
            $sendto_users[] = $project_detial->hasProject->service_provider_id;
        }
        
        $session_id = uniqid();
        foreach($sendto_users as $user){
            $chat = Chat::create([
                'session_id' => $session_id,
                'project_details_id' => $request->project_details_id,
                'sender_id' => Auth::user()->id,
                'reciever_id' => $user,
            ]);
        }

        if($chat){
            $model = new Message();
            $model->session_id = $chat->session_id;

            if($request->file('attachment')) {
                $mime = $request->file('attachment')->getClientMimeType();
                if(strstr($mime, "video/")){
                    $mime = 'video';
                }else if(strstr($mime, "image/")){
                    $mime = 'image';
                }
    
                $attachment = date('d-m-Y-His').'.'.$request->file('attachment')->getClientOriginalExtension();
                $request->attachment->move(public_path('/assets/chat/attachments'), $attachment);
                $model->attachment = $attachment;
                $model->mime_type = $mime;
            }

            $model->message = $request->message;
            $model->save();

            $all_chat = Chat::orderby('id', 'asc')
                    /* ->where('sender_id', Auth::user()->id)
                    ->where('reciever_id', $request->reciever_id)

                    ->orWhere('sender_id', $request->reciever_id)
                    ->where('reciever_id', Auth::user()->id) */
                    ->where('project_details_id', $request->project_details_id)
                    ->groupby('session_id')
                    ->get();
        
            return (string) view('frontend.user.seller.activity.chat-message', compact('all_chat'));
        }
    }
}
