<!DOCTYPE html>
<html>
<head>

<title>Video Classes</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#F8F2E9;
}

header{
background:#455947;
color:white;
padding:18px 60px;
display:flex;
justify-content:space-between;
align-items:center;
}

header h2{
font-size:28px;
}

.back{
text-decoration:none;
background:white;
color:#455947;
padding:10px 20px;
border-radius:10px;
font-weight:bold;
}

.container{
max-width:1100px;
margin:50px auto;
}

.hero{
background:white;
padding:40px;
border-radius:20px;
box-shadow:0 10px 30px rgba(0,0,0,.08);
text-align:center;
margin-bottom:35px;
}

.hero h1{
color:#455947;
font-size:40px;
margin-bottom:15px;
}

.hero p{
font-size:18px;
color:#666;
line-height:1.8;
}

.badge{
display:inline-block;
margin-top:20px;
background:#C9DDC3;
color:#455947;
padding:12px 25px;
border-radius:30px;
font-weight:bold;
}

.grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
gap:25px;
}

.card{
background:white;
padding:30px;
border-radius:20px;
box-shadow:0 10px 20px rgba(0,0,0,.08);
transition:.3s;
}

.card:hover{
transform:translateY(-8px);
}

.icon{
font-size:45px;
margin-bottom:15px;
}

.card h3{
color:#455947;
margin-bottom:12px;
}

.card p{
color:#666;
line-height:1.7;
}

.footer-box{
margin-top:45px;
background:#455947;
color:white;
padding:35px;
border-radius:20px;
text-align:center;
}

.footer-box h2{
margin-bottom:15px;
}

.footer-box p{
line-height:1.8;
}

</style>

</head>

<body>

<header>

<h2>🎥 Video Classes</h2>

<a href="{{ url()->previous() }}" class="back">
 Back
</a>

</header>

<div class="container">

<div class="hero">

<h1>Future Video Learning</h1>

<p>

This module is reserved for the future version of Swapify.

Users will be able to attend live classes, watch recorded sessions,
and learn skills directly from expert instructors.

</p>

<div class="badge">
🚀 Coming Soon
</div>

</div>

<div class="grid">

<div class="card">

<div class="icon">🎥</div>

<h3>Live Classes</h3>

<p>

Students can join live interactive sessions with teachers.

</p>

</div>

<div class="card">

<div class="icon">📺</div>

<h3>Recorded Videos</h3>

<p>

Missed a class?

Watch recorded lessons anytime.

</p>

</div>

<div class="card">

<div class="icon">📅</div>

<h3>Class Schedule</h3>

<p>

Upcoming classes with reminders and calendar integration.

</p>

</div>

<div class="card">

<div class="icon">📝</div>

<h3>Assignments</h3>

<p>

Teachers can upload notes and assignments after every class.

</p>

</div>

<div class="card">

<div class="icon">🏆</div>

<h3>Certificates</h3>

<p>

Students will receive certificates after completing courses.

</p>

</div>

<div class="card">

<div class="icon">💬</div>

<h3>Discussion</h3>

<p>

Students and teachers can discuss lessons and ask questions.

</p>

</div>

</div>

<div class="footer-box">

<h2>Why this feature?</h2>

<p>

This feature is planned for the next version of Swapify.

Our current project focuses on Skill Matching, Scheduling,
Messaging, Notifications and Reviews.

Video Classes will make learning more interactive in future updates.

</p>

</div>

</div>

</body>
</html>