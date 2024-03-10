<?php
session_start();
$session_token = $_GET['token']; 
if (isset($_POST['creer'])) {
    header("Location: CvMakers_ar.php?token=$session_token");}
if (isset($_POST['deconnexion'])) {
    session_unset();
    session_destroy();
    header("Location: Accueil_ar.php");}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الرئيسية</title>
    <link rel="icon" href="logo.png">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap');
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Open Sans', sans-serif;
    line-height: 1.6;
    color: #333;
    direction: rtl; 
}

a {
    text-decoration: none;
    color: #333;
}

.container {
    max-width: 1100px;
    margin: auto;
    overflow: hidden;
    padding: 0px 20px;
}

.navbar {
    background-color: #444;
    height: 80px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.navbar a {
    color: #fff;
    padding: 0 20px;
}

.hero {
    background-image: url('hero-background.jpg');
    background-size: cover;
    background-position: center;
    height: 60vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: #000000;
}

.hero h1 {
    font-size: 4rem;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 20px;
}

.hero p {
    font-size: 1.5rem;
    font-weight: 300;
    max-width: 500px;
    margin: 0 auto 40px auto;
}

.cta-button {
    display: inline-block;
    background-color: #4CAF50;
    color: #fff;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    margin: 0;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.cta-button:hover {
    background-color: #3e8e41;
}

.features {
    padding: 80px 0;
}

.features h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 60px;
    text-align: center;
}

.feature-item {
    background-color: #f9f9f9;
    padding: 40px;
    border-radius: 50px;

    margin-bottom: 40px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.feature-item .icon {
    background-color: #444;
    color: #fff;
    width: 80px;
    height: 80px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    font-size: 2rem;
    margin-right: 30px;
}

.feature-item h4 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 15px;
    margin-top: 13px;

}

.feature-item p {
    font-size: 1.1rem;
    font-weight: 300;
    max-width: 400px;

}
select{
    background-color: #c5c5c5;
    color: rgb(0, 0, 0) !important;
    border-color:#c5c5c5;
    color: #c5c5c5;
    float: left;
    cursor: pointer;
    outline: none;
    align-items: left;
    width: max-content;
    margin-top:4px;
}
.navbar a:hover {
    color: #4CAF50 ;
}
.con-button {
    color: #fff;
    border-radius: 5px;
    align-items: center;
    background-color: #444;
    width: 110px; 
    height: 35px;
}
.con-button:hover {
    color: #4CAF50 ;
}
.img{
    position: relative;
    display: inline-block;
}

.image {
    display: block;
    width: 98%;
}

.image-button {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 10px 20px; 
    background-color: #4CAF50;
    color: #fff; 
    border: none;
    border-radius: 5px; 
    cursor: pointer;
    width: 150px; 
    height: 45px;
}
    </style>
</head>
<body>
    <header class="navbar">
        <div class="container">
            <a href="CvMakers_ar.php">أنشئ سيرتك الذاتية</a>
            <a href="#section2">القالب</a>
            <a href="#util">كيفية إنشاء سيرتك الذاتية</a>
        </div>
        <form action="" method="POST">
        <button class="con-button" name="deconnexion">سجيل الخروج</button>
    </header>
    <select id="language-switch">
                <option value="fr">Français</option>
                <option value="en">English</option>
                <option value="ar" selected>عربي</option>
    </select>
    <section id="section" class="hero">
        <div class="container">
            <h1>قم بإنشاء سيرتك الذاتية المهنية</h1>
            <p>املأ النموذج، اختر قالبًا، وحمل سيرتك الذاتية في غضون دقائق قليلة.</p>
            <button class="cta-button" name="creer">إنشاء سيرة ذاتية</button>
        </div>
    </section>
    <section class="img" id="section2">
        <img src="template0.png" class="image"/>
        <button class="image-button" name="creer">انقر هنا</button>
    </section>
    <section class="img" id="section2">
        <img src="template2.png" class="image"/>
        <button class="image-button" name="creer">انقر هنا</button>
    </section>
    <section class="img" id="section2">
        <img src="template3.png" class="image"/>
        <button class="image-button" name="creer">انقر هنا</button>
    </section>
</form>
    <section id="util" class="features">
        <div class="container">
            <h1>كيف يعمل؟</h1>
            <div class="feature-item">
                <div class="icon"><i class="fas fa-user"></i></div>
                <h4>١. قم بملء معلوماتك</h4>
                <br>
                <p>ابدأ بإدخال معلوماتك التي تشكل محتوى سيرتك الذاتية.</p>
            </div>
            <div class="feature-item">
                <div class="icon"><i class="fas fa-palette"></i></div>
                <h4>٢. اختر قالبًا</h4>
                <br>
                <p>اختر قالبًا للسيرة الذاتية وقم بتخصيصه حسب شخصيتك وأسلوبك.</p>
            </div>
            <div class="feature-item">
                <div class="icon"><i class="fas fa-download"></i></div>
                <h4>٣. حمل السيرة الذاتية</h4>
                <br>
                <p>حمل سيرتك الذاتية على الفور وقم بتعديلها في أي وقت. بسيطة للغاية!</p>
            </div>
        </div>
    </section>
    <script>
        const languageSwitch = document.getElementById("language-switch");
        const currentLanguage = localStorage.getItem("currentLanguage") || "fr";
        languageSwitch.value = currentLanguage;

        languageSwitch.addEventListener("change", (event) => {
            localStorage.setItem("currentLanguage", event.target.value);
            window.location.href = `Connexion_${event.target.value}.php`;
        });
    </script>
</body>
<footer>
    <div class="">
    </div>
</footer>
</html>
