<!DOCTYPE html>
<html>
<head>
    <title>Swapify Messages</title>


    <style>
       *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f4f7fc;
}

.chat-container{
    display:flex;
    height:100vh;
}

/* Sidebar */

.sidebar{
    width:300px;
    background:linear-gradient(180deg,#6C63FF,#4F46E5);
    color:white;
    padding:20px;
    display:flex;
    flex-direction:column;
}

.sidebar h2{
    font-size:28px;
    margin-bottom:5px;
}

.sidebar p{
    color:#ddd;
    margin-bottom:30px;
}

.user{
    display:flex;
    align-items:center;
    gap:12px;
    background:rgba(255,255,255,.15);
    padding:12px;
    border-radius:12px;
    margin-bottom:12px;
    cursor:pointer;
    transition:.3s;
}

.user:hover{
    background:white;
    color:#333;
}

.avatar{
    width:45px;
    height:45px;
    border-radius:50%;
    background:white;
    color:#6C63FF;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
}

/* Chat */

.chat-box{
    flex:1;
    display:flex;
    flex-direction:column;
    background:white;
}

.chat-header{
    padding:20px;
    border-bottom:1px solid #eee;
    font-size:24px;
    font-weight:600;
    color:#444;
}
.back-arrow{
    text-decoration:none;
    color:#6C63FF;
    font-size:28px;
    font-weight:bold;
    margin-right:15px;
}

.back-arrow:hover{
    color:#4F46E5;
}

.messages{
    flex:1;
    overflow-y:auto;
    padding:30px;
    background:#fafbff;
}

/* Chat Bubble */

.message{
    width:fit-content;
    max-width:70%;
    padding:10px 16px;
    border-radius:18px;
    margin-bottom:15px;
    font-size:15px;
    word-wrap:break-word;
}


.sent{
    margin-left:auto;
    background:#6C63FF;
    color:white;
    border-bottom-right-radius:5px;
}


.received{
    background:#ececff;
    color:#333;
    border-bottom-left-radius:5px;
}



/* Input */

.chat-input{
    display:flex;
    padding:18px;
    border-top:1px solid #eee;
    background:white;
}

.chat-input textarea{
    flex:1;
    height:55px;
    border:1px solid #ddd;
    border-radius:30px;
    padding:15px;
    resize:none;
    outline:none;
    font-size:15px;
}

.chat-input button{
    margin-left:15px;
    background:#6C63FF;
    color:white;
    border:none;
    padding:0 30px;
    border-radius:30px;
    cursor:pointer;
    font-size:16px;
    transition:.3s;
}

.chat-input button:hover{
    background:#4F46E5;
}
.dashboard-back{
    padding:15px;
    text-align:center;
    background:#fff;
    border-top:1px solid #eee;
}

.dashboard-back a{
    display:inline-block;
    text-decoration:none;
    background:#6C63FF;
    color:white;
    padding:10px 22px;
    border-radius:25px;
    font-size:15px;
    font-weight:600;
    transition:.3s;
}

.dashboard-back a:hover{
    background:#4F46E5;
}
    </style>



</head>

<body>

<div class="chat-container">

    <div class="sidebar">

        <h2>Swapify Chat</h2>
       

        @foreach($users as $u)

<a href="{{ route('messages.chat', ['user' => $u->id]) }}" style="text-decoration:none;color:white;">

    <div class="user">

        <div class="avatar">
            {{ strtoupper(substr($u->name,0,1)) }}
        </div>

        <div>
            <strong>{{ $u->name }}</strong><br>
            <small>🟢 Online</small>
        </div>

    </div>

</a>

@endforeach
    </div>

    <div class="chat-box">

        

        <div class="chat-header">

@if(isset($selectedUser))

<a href="{{ route('messages.index') }}" class="back-arrow">
    ←
</a>

<span>Chat with {{ $selectedUser->name }}</span>

@else

Welcome to Swapify Chat

@endif

</div>

<div class="messages">


@if(isset($selectedUser))


@foreach($messages as $message)

@if($message->sender_id == auth()->id())

<div class="message sent">
    {{ $message->message }}
</div>

@else

<div class="message received">
    {{ $message->message }}
</div>

@endif


@endforeach


@else


<div id="welcome" style="text-align:center;margin-top:120px;">

<h2>
Welcome to Swapify Chat
</h2>

<p style="color:gray">
Select a user from the sidebar to start chatting.
</p>

</div>


@endif


</div>

        <form class="chat-input" method="POST" action="{{ route('messages.send') }}">

@csrf


<textarea 
name="message"
placeholder="Type your message..."
></textarea>


@if(isset($selectedUser))

<input type="hidden" 
name="receiver_id" 
value="{{ $selectedUser->id }}">

@endif


<button type="submit">
Send
</button>


</form>

        </form>
        <div class="dashboard-back">
    <a href="{{ route('dashboard') }}"> Back to Dashboard</a>
</div>

    </div>

</div>

</body>
</html>

