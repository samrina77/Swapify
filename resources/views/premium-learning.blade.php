<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Premium Learning | Swapify</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,Helvetica,sans-serif;
}

body{
background:#F8F2E9;
color:#3B3330;
}
{
text-decoration:none;
}

.top-bar{
    max-width:1200px;
    margin:25px 0 0 10px;
    padding:0;
}

.back-btn{
    display:inline-block;
    background:linear-gradient(135deg,#864622,#C78B53);
    color:#fff;
    padding:12px 24px;
    border-radius:30px;
    text-decoration:none;
    font-weight:700;
    box-shadow:0 8px 20px rgba(134,70,34,.25);
    transition:.3s;
}

.back-btn:hover{
    background:#455947;
    color:#fff;
    transform:translateY(-3px);
}
.hero{
background:linear-gradient(135deg,#455947,#864622,#C78B53);
padding:80px 10%;
color:white;
text-align:center;
}

.badge{
display:inline-block;
background:#FFD54F;
color:#3B3330;
padding:10px 22px;
border-radius:30px;
font-size:14px;
font-weight:bold;
margin-bottom:20px;
}

.hero h1{
font-size:48px;
margin-bottom:10px;
}

.hero p{
font-size:18px;
line-height:1.8;
max-width:800px;
margin:auto;
opacity:.95;
}

.hero-btn{
display:inline-block;
margin-top:35px;
background:white;
color:#455947;
padding:16px 38px;
border-radius:40px;
font-size:17px;
font-weight:bold;
transition:.3s;
}

.hero-btn:hover{
background:#C9DDC3;
transform:translateY(-3px);
}

.container{
width:90%;
max-width:1200px;
margin:70px auto;
}

.section-title{
text-align:center;
font-size:38px;
color:#455947;
margin-bottom:50px;
}

.features{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
gap:30px;
}

.card{
background:white;
padding:35px;
border-radius:20px;
box-shadow:0 10px 25px rgba(0,0,0,.08);
transition:.3s;
border-top:6px solid #864622;
}

.card:hover{
transform:translateY(-8px);
}

.icon{
font-size:48px;
margin-bottom:20px;
}

.card h3{
color:#455947;
margin-bottom:15px;
font-size:24px;
}

.card p{
line-height:1.8;
color:#666;
font-size:16px;
}

.price-section{
margin-top:90px;
text-align:center;
}

.price-card{
display:inline-block;
background:white;
padding:45px;
border-radius:25px;
box-shadow:0 15px 35px rgba(0,0,0,.1);
width:380px;
max-width:100%;
}

.price-card h2{
color:#455947;
margin-bottom:15px;
}

.price{
font-size:55px;
font-weight:bold;
color:#864622;
margin:20px 0;
}

.price span{
font-size:18px;
color:#777;
}

.plan{
list-style:none;
text-align:left;
margin:30px 0;
}

.plan li{
padding:12px 0;
font-size:17px;
border-bottom:1px solid #eee;
}

.plan li:last-child{
border:none;
}

.join-btn{
display:block;
background:#864622;
color:white;
padding:15px;
border-radius:12px;
font-size:18px;
font-weight:bold;
transition:.3s;
}
.join-btn:hover{
background:#455947;
transform:translateY(-3px);
}

.coming-soon{
margin-top:90px;
background:linear-gradient(135deg,#C9DDC3,#F8F2E9,#D4BDA1);
padding:60px;
border-radius:25px;
text-align:center;
box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.coming-soon h2{
color:#455947;
font-size:38px;
margin-bottom:20px;
}

.coming-soon p{
font-size:18px;
line-height:1.8;
color:#555;
max-width:850px;
margin:auto;
}

footer{
margin-top:80px;
background:#455947;
color:white;
text-align:center;
padding:25px;
font-size:15px;
}

@media(max-width:768px){

.hero{
padding:60px 20px;
}

.hero h1{
font-size:34px;
}

.hero p{
font-size:16px;
}

.section-title{
font-size:30px;
}

.price-card{
width:100%;
}

}

</style>
</head>

<body>
<div class="top-bar">
    <a href="{{ route('dashboard') }}" class="back-btn">
        Back 
    </a>
</div>
<section class="hero">

<div class="badge">
👑 Premium Learning
</div>

<h1>Unlock Unlimited Learning</h1>

<p>
Upgrade to Premium and access unlimited recorded courses,
exclusive masterclasses, premium mentors, certificates,
and future AI-powered learning features.
</p>

<a href="#" class="hero-btn">
🚀 Go Premium
</a>

</section>

<div class="container">

<h2 class="section-title">
Why Choose Premium?
</h2>

<div class="features">

<div class="card">
<div class="icon">🎥</div>
<h3>Unlimited Video Courses</h3>
<p>
Watch every premium class anytime without limits.
</p>
</div>

<div class="card">
<div class="icon">📜</div>
<h3>Certificates</h3>
<p>
Receive verified certificates after completing courses.
</p>
</div>

<div class="card">
<div class="icon">👨‍🏫</div>
<h3>Expert Mentors</h3>
<p>
Learn directly from experienced instructors.
</p>
</div>

<div class="card">
<div class="icon">💬</div>
<h3>Priority Support</h3>
<p>
Premium users receive faster help and guidance.
</p>
</div>

<div class="card">
<div class="icon">📈</div>
<h3>Skill Tracking</h3>
<p>
Monitor your learning progress and achievements.
</p>
</div>

<div class="card">
<div class="icon">🤖</div>
<h3>Future AI Learning</h3>
<p>
Access upcoming AI-powered personalized learning.
</p>
</div>

</div>
<div class="price-section">

    <div class="price-card">

        <h2>Premium Membership</h2>

        <div class="price">
            Rs. 999
            <span>/month</span>
        </div>

        <ul class="plan">
            <li>✅ Unlimited Premium Courses</li>
            <li>✅ Live Expert Sessions</li>
            <li>✅ Course Completion Certificates</li>
            <li>✅ Priority Support</li>
            <li>✅ Future AI Learning Features</li>
            <li>✅ No Advertisements</li>
        </ul>

        <a href="#" class="join-btn">
            🌟 Join Premium
        </a>

    </div>

</div>

<div class="coming-soon">

    <h2>🚀 Future Roadmap</h2>

    <p>
        Premium Learning is one of the upcoming features of Swapify.
        In future versions, learners will be able to purchase premium
        subscriptions, access exclusive recorded courses, join live
        masterclasses, earn certificates, and enjoy personalized
        AI-powered learning recommendations.
    </p>

</div>

</div>

<footer>
    ©️ {{ date('Y') }} Swapify | Where Every Skill Finds a Learner.
</footer>

</body>
</html>