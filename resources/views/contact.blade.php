<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact - Swapify</title>

<style>
body{
    margin:0;
    font-family:Arial,sans-serif;
    background:#F4E8D8;
}

.container{
    width:60%;
    margin:50px auto;
    background:white;
    padding:30px;
    border-radius:12px;
    box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

h1{
    text-align:center;
    color:#455947;
}

p{
    text-align:center;
    color:#555;
}

label{
    font-weight:bold;
    color:#455947;
}

input, textarea{
    width:100%;
    padding:12px;
    margin-top:8px;
    margin-bottom:18px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:16px;
}

button{
    width:100%;
    padding:12px;
    background:#C78853;
    color:white;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#864622;
}
</style>
</head>

<body>

<div class="container">

<h1>Contact Us</h1>

<p>We'd love to hear from you! Send us a message.</p>

<form>

<label>Full Name</label>
<input type="text" placeholder="Enter your name">

<label>Email Address</label>
<input type="email" placeholder="Enter your email">

<label>Subject</label>
<input type="text" placeholder="Enter subject">

<label>Message</label>
<textarea rows="5" placeholder="Write your message..."></textarea>

<button type="submit">Send Message</button>

</form>
<div style="margin-top:20px; text-align:left;">
    <a href="{{ url('/') }}" style="
        display:inline-block;
        background:#C78853;
        color:white;
        padding:10px 20px;
        text-decoration:none;
        border-radius:8px;
        font-weight:bold;
    ">
        Back to Home
    </a>
</div> 
</div>

<style>
.btn-home{
    display:inline-block;
    background:#C78853;
    color:white;
    padding:12px 25px;
    text-decoration:none;
    border-radius:8px;
    font-weight:bold;
    transition:0.3s;
}

.btn-home:hover{
    background:#864622;
}
</style>

</div>

</body>
</html>
