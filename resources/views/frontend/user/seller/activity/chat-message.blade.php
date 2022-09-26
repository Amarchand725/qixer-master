<div class="msg_history" id="msg_history">
    @foreach ($all_chat as $chat)
        @if($chat->sender_id==Auth::user()->id)
            <div class="outgoing_msg">
                <div class="sent_msg">
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