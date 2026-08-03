<!DOCTYPE html>
<html>
<head>
    <title>Swapify Messages</title>
<<<<<<< HEAD

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f5f3ef;
        }

        .container{
            display:flex;
            height:100vh;
        }

        .sidebar{
            width:30%;
            background:#5D4037;
            color:white;
            overflow-y:auto;
        }

        .sidebar h2{
            padding:20px;
            border-bottom:1px solid rgba(255,255,255,.2);
        }

        .user{
            padding:15px 20px;
            border-bottom:1px solid rgba(255,255,255,.1);
            cursor:pointer;
        }

        .user:hover{
            background:#6D4C41;
        }

        .chat{
            width:70%;
            display:flex;
            flex-direction:column;
            background:white;
        }

        .chat-header{
            padding:20px;
            background:#8D6E63;
            color:white;
            font-size:22px;
        }

        .messages{
            flex:1;
            padding:20px;
            overflow-y:auto;
            background:#f7f7f7;
        }

        .my-message{
            background:#8D6E63;
            color:white;
            padding:10px 15px;
            border-radius:12px;
            width:fit-content;
            margin-left:auto;
            margin-bottom:10px;
            max-width:70%;
        }

        .other-message{
            background:#ddd;
            padding:10px 15px;
            border-radius:12px;
            width:fit-content;
            margin-bottom:10px;
            max-width:70%;
        }

        .send-box{
            padding:15px;
            border-top:1px solid #ddd;
        }

        textarea{
            width:100%;
            height:80px;
            padding:10px;
            resize:none;
            border-radius:10px;
        }

        button{
            margin-top:10px;
            background:#5D4037;
            color:white;
            border:none;
            padding:12px 25px;
            border-radius:8px;
            cursor:pointer;
        }

        a{
            text-decoration:none;
            color:white;
        }
    </style>


=======
>>>>>>> 6378cab11d2a9b3cc0ebe042ac325dbefc294ca0
</head>

<body>

<<<<<<< HEAD
<div class="container">

<div class="sidebar">

<h2>Swapify Chat</h2>

@foreach($users as $u)

<a href="{{ route('messages.chat',$u->id) }}">

<div class="user">

{{ $u->name }}

</div>

</a>

@endforeach

</div>

<div class="chat">

<div class="chat-header">

@if(isset($user))

{{ $user->name }}

@else

Select User

@endif

</div>

<div class="messages">

@foreach($messages as $message)

@if($message->sender_id==Auth::id())

<div class="my-message">

{{ $message->message }}

</div>

@else

<div class="other-message">

{{ $message->message }}

</div>

@endif

@endforeach

</div>

<div class="send-box">

<form action="{{ route('messages.send') }}" method="POST">

@csrf

<input type="hidden"
name="receiver_id"
value="{{ $user->id ?? '' }}">
<textarea
    name="message"
    placeholder="Type your message..."
    required></textarea>

<button type="submit">
    Send Message
</button>

</form>

</div>

</div>

</div>

</body>
</html>

=======
<h1>Swapify Messages</h1>

<p>Message page working</p>

</body>
</html>
>>>>>>> 6378cab11d2a9b3cc0ebe042ac325dbefc294ca0
