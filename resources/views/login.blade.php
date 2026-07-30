<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Swapify Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>


*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}


body{

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    background:

    linear-gradient(
        135deg,
        #CDD9C3,
        #D4BDA1,
        #C78853
    );

    position:relative;

    overflow:hidden;

}


/* soft background circles */

body::before{

    content:"";

    position:absolute;

    width:400px;

    height:400px;

    background:#455947;

    opacity:.15;

    border-radius:50%;

    top:-120px;

    left:-120px;

}


body::after{

    content:"";

    position:absolute;

    width:350px;

    height:350px;

    background:#864622;

    opacity:.15;

    border-radius:50%;

    bottom:-100px;

    right:-100px;

}



/* Login Container */


.login-box{


    width:420px;


    padding:40px;


    background:rgba(255,255,255,.25);


    backdrop-filter:blur(18px);

    -webkit-backdrop-filter:blur(18px);



    border-radius:25px;



    border:2px solid rgba(255,255,255,.45);



    box-shadow:

    0 20px 40px rgba(56,51,48,.25);



    position:relative;

    z-index:2;


}



/* Heading */


.login-box h2{


    text-align:center;


    color:#455947;


    font-size:34px;


    font-weight:900;


    margin-bottom:30px;


    text-shadow:

    1px 2px 5px rgba(0,0,0,.15);


}


/* Input */


.form-control{


    height:52px;


    margin-bottom:18px;


    border-radius:12px;


    border:1px solid #455947;


    background:rgba(255,250,245,.9);


    font-size:16px;


}


.form-control:focus{


    border-color:#864622;


    box-shadow:

    0 0 10px rgba(134,70,34,.35);


}
<!-- Features Section -->
<section class="features">
    <div class="container">
        <h2>Why Choose Swapify?</h2>

        <div class="feature-box">

            <div class="card">
                <h3>🔄 Skill Exchange</h3>
                <p>
                    Exchange your skills with others and learn something new
                    without spending money.
                </p>
            </div>

            <div class="card">
                <h3>🌎 Community</h3>
                <p>
                    Connect with people who want to share knowledge and
                    improve together.
                </p>
            </div>

            <div class="card">
                <h3>🚀 Easy Learning</h3>
                <p>
                    Find skills, share your talent, and grow through a simple
                    platform.
                </p>
            </div>

        </div>
    </div>
</section>


<!-- About Section -->
<section class="about">
    <div class="container">
        <h2>About Swapify</h2>
        <p>
            Swapify is a skill exchange platform where users can share their
            knowledge and learn new skills from others. Our goal is to create
            a community where learning becomes accessible and affordable.
        </p>
    </div>
</section>


<style>

.features{
    padding:60px 20px;
    background:#f8f9fa;
    text-align:center;
}

.features h2,
.about h2{
    font-size:35px;
    margin-bottom:30px;
    color:#333;
}

.feature-box{
    display:flex;
    justify-content:center;
    gap:25px;
    flex-wrap:wrap;
}

.card{
    background:white;
    width:300px;
    padding:30px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    transition:0.3s;
}

.card:hover{
    transform:translateY(-10px);
}

.card h3{
    color:#6c63ff;
    margin-bottom:15px;
}

.card p{
    color:#555;
    line-height:1.6;
}

.about{
    padding:60px 20px;
    text-align:center;
}

.about p{
    max-width:800px;
    margin:auto;
    font-size:18px;
    color:#555;
    line-height:1.8;
}

@media(max-width:768px){

.feature-box{
    flex-direction:column;
    align-items:center;
}

.card{
    width:90%;
}

}

</style>
<!-- Call To Action Section -->

<section class="cta">

    <div class="container">
        <h2>Ready to Share Your Skills?</h2>

        <p>
            Join Swapify today and start exchanging knowledge with people
            around you.
        </p>

        <a href="/register" class="btn">
            Join Swapify
        </a>

    </div>

</section>


<!-- Footer -->

<footer>

    <div class="footer-container">

        <div class="footer-section">
            <h3>Swapify</h3>
            <p>
                A platform where skills connect, knowledge grows,
                and communities learn together.
            </p>
        </div>


        <div class="footer-section">

            <h3>Quick Links</h3>

            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/login">Login</a>
            <a href="/register">Register</a>

        </div>


        <div class="footer-section">

            <h3>Contact</h3>

            <p>Email: support@swapify.com</p>
            <p>Location: Nepal</p>

        </div>


    </div>


    <div class="copyright">

        ©️ 2026 Swapify. All Rights Reserved.

    </div>


</footer>



<style>

.cta{

    background:linear-gradient(135deg,#6c63ff,#8f94fb);
    color:white;
    text-align:center;
    padding:70px 20px;

}


.cta h2{

    font-size:35px;
    margin-bottom:15px;

}


.cta p{

    font-size:18px;
    margin-bottom:30px;

}


.btn{

    background:white;
    color:#6c63ff;
    padding:14px 35px;
    border-radius:30px;
    text-decoration:none;
    font-weight:bold;
    transition:0.3s;

}


.btn:hover{

    background:#eee;

}



footer{

    background:#222;
    color:white;
    padding:50px 20px 20px;

}


.footer-container{

    display:flex;
    justify-content:space-around;
    flex-wrap:wrap;
    gap:30px;

}


.footer-section{

    width:250px;

}


.footer-section h3{

    margin-bottom:20px;
    color:#8f94fb;

}


.footer-section a{

    display:block;
    color:white;
    text-decoration:none;
    margin:10px 0;

}


.footer-section a:hover{

    color:#8f94fb;

}


.footer-section p{

    color:#ccc;
    line-height:1.6;

}


.copyright{

    text-align:center;
    margin-top:30px;
    padding-top:20px;
    border-top:1px solid #444;
    color:#aaa;

}



@media(max-width:768px){

.footer-container{

    flex-direction:column;
    align-items:center;
    text-align:center;

}

}

</style>s