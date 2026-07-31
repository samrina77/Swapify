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
    font-family:Arial, sans-serif;
}

body{
    overflow-x:hidden;
    background:#CDD9C3;
}

/* =======================
   Background Video
======================= */

#bg-video{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    object-fit:cover;
    z-index:-2;
}

.overlay{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,.20);
    z-index:-1;
}

/* =======================
   Navbar
======================= */

nav{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:18px 60px;
    background:rgba(69,89,71,.85);
    backdrop-filter:blur(12px);
    z-index:100;
}

.logo{
    color:white;
    font-size:32px;
    font-weight:bold;
    letter-spacing:1px;
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

/* =======================
   Hero Section
======================= */

.hero{
    width:100%;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
    position:relative;
    z-index:2;
}

.hero-box{
    background: transparent;
    border: none;
    box-shadow: none;
    padding: 55px;
}

.hero h1{
    font-size:72px;
    font-weight:900;
    color:#FFFFFF;
    text-shadow:3px 3px 12px rgba(0,0,0,0.8);
    margin-bottom:20px;
}

.hero p{
    font-size:26px;
    font-weight:700;
    color:#FFFFFF;
    text-shadow:2px 2px 8px rgba(0,0,0,0.8);
    margin-bottom:35px;
}

.btn{
    display:inline-block;
    text-decoration:none;
    background:#455947;
    color:white;
    padding:16px 42px;
    border-radius:10px;
    font-size:19px;
    font-weight:800;
    transition:.3s;
}

.btn:hover{

    background:#864622;

    transform:scale(1.05);

}
/* =======================
   Footer
======================= */

footer{
    position:relative;
    z-index:2;
    background:#383330;
    color:white;
    text-align:center;
    padding:18px;
}

/* =======================
   Responsive
======================= */

@media(max-width:768px){

nav{
    flex-direction:column;
    padding:20px;
}

nav ul{
    margin-top:15px;
    flex-wrap:wrap;
    justify-content:center;
}

nav ul li{
    margin:8px;
}

.hero h1{
    font-size:42px;
}

.hero p{
    font-size:18px;
}

.hero-box{
    width:90%;
    padding:35px;
}

}

</style>

</head>

<body>

<!-- Background Video -->

<video autoplay muted loop playsinline id="bg-video">
    <source src="/videos/hero.mp4" type="video/mp4">
</video>

<div class="overlay"></div>

<!-- Navbar -->

<nav>

<div class="logo">
Swapify
</div>

<ul>
<li><a href="/">Home</a></li>


<li><a href="{{ url('/about') }}">About</a></li>
<li><a href="{{ route('contact') }}">Contact</a></li>






<li><a href="{{ route('login') }}">Login</a></li>
</ul>

</nav>

<!-- Hero -->

<section class="hero">

<div class="hero-box">

<h1>Welcome to Swapify</h1>

<p>
Where Every Skill Finds a Learner.
</p>

<a href="{{ route('login') }}" class="btn">
Get Started
</a>

</div>

</section>
<!-- Footer -->

<footer>

    ©️ 2026 Swapify. All Rights Reserved.

</footer>

</body>

</html>