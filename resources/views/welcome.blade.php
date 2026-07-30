<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Swapify</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#CDD9C3;
}

/* NAVBAR */

nav{
background:#455947;
display:flex;
justify-content:space-between;
align-items:center;
padding:18px 60px;
}

.logo{
color:white;
font-size:30px;
font-weight:bold;
}

nav ul{
display:flex;
list-style:none;
}

nav ul li{
margin-left:25px;
}

nav ul li a{

text-decoration:none;
color:white;
font-size:17px;
padding:10px 18px;
border-radius:8px;
transition:.3s;

}

nav ul li a:hover{

background:#864622;

}

/* HERO */

.hero{

height:85vh;

display:flex;

justify-content:center;

align-items:center;

flex-direction:column;

text-align:center;

}

.hero h1{

font-size:60px;

color:#383330;

margin-bottom:15px;

}

.hero p{

font-size:22px;

color:#455947;

margin-bottom:35px;

}

.btn{

text-decoration:none;

background:#864622;

color:white;

padding:15px 35px;

border-radius:10px;

transition:.3s;

font-size:18px;

}

.btn:hover{

background:#C78853;

transform:scale(1.05);

}

/* FOOTER */

footer{

background:#383330;

color:white;

height:60px;

display:flex;

justify-content:center;

align-items:center;

}

</style>

</head>

<body>

<nav>

<div class="logo">
Swapify
</div>

<ul>

<li><a href="/">Home</a></li>

<li><a href="#">Products</a></li>

<li><a href="{{ url('/about') }}">About</a></li>
<li><a href="{{ url('/contact') }}">Contact</a></li>



<li><a href="{{ route('login') }}">Login</a></li>

</ul>

</nav>

<section class="hero">

<h1>Welcome to Swapify</h1>

<p><Wbr>Where Every Skill Finds a Learner.</Wbr></p>

<a href="{{ route('login') }}" class="btn">

Get Started

</a>

</section>

<footer>

©️ 2026 Swapify. All Rights Reserved.

</footer>

</body>

</html>