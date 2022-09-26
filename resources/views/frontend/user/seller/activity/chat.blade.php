<style>
    .container{max-width:1170px; margin:auto;}
    img{ max-width:100%;}
    .inbox_people {
    background: #f8f8f8 none repeat scroll 0 0;
    float: left;
    overflow: hidden;
    width: 40%; border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
    border: 1px solid #c4c4c4;
    clear: both;
    overflow: hidden;
    }
    .top_spac{ margin: 20px 0 0;}


    .recent_heading {float: left; width:40%;}
    .srch_bar {
    display: inline-block;
    text-align: right;
    width: 60%;
    }
    .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

    .recent_heading h4 {
    color: #05728f;
    font-size: 21px;
    margin: auto;
    }
    .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
    .srch_bar .input-group-addon button {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    padding: 0;
    color: #707070;
    font-size: 18px;
    }
    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:13px; float:right;}
    .chat_ib p{ font-size:14px; color:#989898; margin:auto}
    .chat_img {
    float: left;
    width: 11%;
    }
    .chat_ib {
    float: left;
    padding: 0 0 0 15px;
    width: 88%;
    }

    .chat_people{ overflow:hidden; clear:both;}
    .chat_list {
    border-bottom: 1px solid #c4c4c4;
    margin: 0;
    padding: 18px 16px 10px;
    }
    .inbox_chat { height: 550px; overflow-y: scroll;}

    .active_chat{ background:#ebebeb;}

    .incoming_msg_img {
    display: inline-block;
    width: 6%;
    }
    .received_msg {
    display: inline-block;
    padding: 0 0 0 10px;
    vertical-align: top;
    width: 92%;
    }
    .received_withd_msg p {
    background: #ebebeb none repeat scroll 0 0;
    border-radius: 3px;
    color: #646464;
    font-size: 14px;
    margin: 0;
    padding: 5px 10px 5px 12px;
    width: 100%;
    }
    .time_date {
    color: #747474;
    display: block;
    font-size: 12px;
    margin: 8px 0 0;
    }
    .received_withd_msg { width: 57%;}
    .mesgs {
    float: left;
    padding: 30px 15px 0 0px;
    width: 100%;
    }

    .sent_msg p {
    background: #05728f none repeat scroll 0 0;
    border-radius: 3px;
    font-size: 14px;
    margin: 0; color:#fff;
    padding: 5px 10px 5px 12px;
    width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
    float: right;
    width: 46%;
    }
    .input_msg_write input {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    color: #4c4c4c;
    font-size: 15px;
    min-height: 48px;
    width: 80%;
    }

    .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
    .msg_send_btn {
    background: #05728f none repeat scroll 0 0;
    border: medium none;
    /* border-radius: 50%; */
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 53px;
    position: absolute;
    right: -15px;
    top: -2px;
    width: 92px;
    }
    .messaging { padding: 0 0 50px 0;}
    .msg_history {
    height: 516px;
    overflow-y: auto;
    }
    .btn-bs-file{
    position:relative;
}
.btn-bs-file input[type="file"]{
    position: absolute;
    top: -9999999;
    filter: alpha(opacity=0);
    opacity: 0;
    width:0;
    height:0;
    outline: none;
    cursor: inherit;
}
.btn-bs-file i{
    font-size: 25px;
    padding-top: 8px;
    padding-left: 24px;
    color: #1dbf73;
}

/* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="dashboard-settings margin-top-40">
            <h2 class="dashboards-title"> {{__('Activity')}} </h2>
            <h5 style="text-align: center">Current Project <span class="text-danger"> (In Progress)</span></h5>
            @if($milestone->hasProject->convert_type=='single-project')
                Single Project ({{ Str::ucfirst($milestone->hasProject->hasRequirement->requirement_name) }})
            @else 
                <h5 style="text-align: center">Milestone ({{ Str::ucfirst($milestone->name) }})</h5>
            @endif
        </div>
    </div>
</div>

<div class="mt-5"> <x-msg.error/> </div>
<div class="dashboard-service-single-item border-1 margin-top-40">
    <div class="row">
        <div class="container">
            <h3 class=" text-center">Messaging</h3>
            <div class="messaging">
                <div class="inbox_msg">
                    <div class="mesgs">
                        <div class="msg_history" id="msg_history">
                            @foreach ($all_chat as $chat)
                                @if($chat->sender_id==Auth::user()->id)
                                    <div class="outgoing_msg">
                                        <div class="sent_msg">
                                            @if(!empty($chat->hasMessage->attachment))
                                            <div>
                                                @if( $chat->hasMessage->mime_type=='image')
                                                <img src="{{ asset('assets/chat/attachments') }}/{{ $chat->hasMessage->attachment }}" width="150px" alt="">
                                                <a href="{{ asset('assets/chat/attachments') }}/{{ $chat->hasMessage->attachment }}" download=""><i class="fa fa-download"></i> Download </a>
                                                @else 
                                                    <a href="{{ asset('assets/chat/attachments') }}/{{ $chat->attachment }}" download=""><i class="fa fa-download"></i> Download </a>
                                                @endif
                                            </div>
                                            @endif
                                        <p>{{ $chat->hasMessage->message }}</p>
                                        <span class="time_date">{{ $chat->updated_at->diffForHumans(); }}</span> </div>
                                    </div>
                                @else 
                                    <div class="incoming_msg pt-3">
                                        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                        <div class="received_msg">
                                            <div class="received_withd_msg">
                                                <h4>
                                                    @if(!empty($chat->hasUser))
                                                        {{ Str::ucfirst($chat->hasUser->name) }} 
                                                        @if($chat->hasUser->user_type==0)
                                                            (Seller)
                                                        @else 
                                                            (Client)
                                                        @endif
                                                    @else 
                                                        {{ Str::ucfirst($chat->hasManager->name) }}  (Project Manager)
                                                    @endif
                                                </h4>
                                                @if( !empty($chat->hasMessage->attachment))
                                                    <div>
                                                        @if( $chat->hasMessage->mime_type=='image')
                                                        <img src="{{ asset('assets/chat/attachments') }}/{{ $chat->hasMessage->attachment }}" width="150px" alt="">
                                                        <a href="{{ asset('assets/chat/attachments') }}/{{ $chat->hasMessage->attachment }}" download=""><i class="fa fa-download"></i> Download </a>
                                                        @else 
                                                            <a href="{{ asset('assets/chat/attachments') }}/{{ $chat->attachment }}" download=""><i class="fa fa-download"></i> Download </a>
                                                        @endif
                                                    </div>
                                                @endif
                                                <p>{{ $chat->hasMessage->message }}</p>
                                                <span class="time_date">{{ $chat->updated_at->diffForHumans(); }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="type_msg">
                    <form id="send-msg-form" enctype="multipart/form-data">
                        <div class="input_msg_write p-0">
                            <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                                alt="avatar 3" style="width: 40px; height: 100%;">
                                <input type="text" class="form-control form-control-lg" name="write_msg" id="write_msg"
                                placeholder="Type message">
                                <div class="row ">
                                    <div class="col-6">
                                        <label class="btn-bs-file">
                                            <i class="fa fa-paperclip" aria-hidden="true"></i>
                                            <input id="attachment" name="attachment" type="file" />
                                        </label>
                                    </div>

                                    <div class="col-6">  
                                        <button type="button" value="{{ $milestone->id }}" class="btn btn-primary send-msg-btn" style="background-color: #05728f;
                                            border-color: #05728f;">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>