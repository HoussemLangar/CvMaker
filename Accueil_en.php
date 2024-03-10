<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
}

a {
    text-decoration: none;
    color: #333;
}

.container {
    max-width: 1100px;
    margin: auto;
    overflow: hidden;
    padding: 0 20px;
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
    float: right;
    cursor: pointer;
    outline: none;
    align-items: right;
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
            <a href="Connexion_en.php">Create your CV</a>
            <a href="#section2">Template</a>
            <a href="#util">How to create your CV</a>
        </div>
        <a href="Connexion_en.php"><button class="con-button">Login</button></a><a href="Signup_en.php"><button class="con-button">Sign up</button></a>
    </header>
    <select id="language-switch">
                <option value="fr">Français</option>
                <option value="en" selected>English</option>
                <option value="ar">عربي</option>
    </select>
    <section id="section" class="hero">
        <div class="container">
            <h1>Create Your Professional Resume</h1>
            <p>Fill out the form, choose a template, and download your resume in just a few minutes.</p>
            <a href="Connexion_en.php" class="cta-button">Create a Resume</a>
        </div>
    </section>
    <section class="img" id="section2">
        <img src="template0.png" class="image"/>
        <a href="Connexion_en.php" class="image-button">Click here</a>
    </section>
    <section class="img" id="section2">
        <img src="template2.png" class="image"/>
        <a href="Connexion_en.php" class="image-button">Click here</a>
    </section>
    <section class="img" id="section2">
        <img src="template3.png" class="image"/>
        <a href="Connexion_en.php" class="image-button">Click here</a>
    </section>
    <section id="util" class="features">
        <div class="container">
            <h1>How does it work?</h1>
            <div class="feature-item">
                <div class="icon"><i class="fas fa-user"></i></div>
                <h4>1. Enter your information</h4>
                <p>Start by entering your information that will make up the content of your resume.</p>
            </div>
            <div class="feature-item">
                <div class="icon"><i class="fas fa-palette"></i></div>
                <h4>2. Choose a template</h4>
                <p>Choose a resume template and customize it according to your personality and style.</p>
            </div>
            <div class="feature-item">
                <div class="icon"><i class="fas fa-download"></i></div>
                <h4>3. Download the Resume</h4>
                <p>Download your resume immediately and edit it anytime. Simplissime!</p>
            </div>
        </div>
    </section>
    <script>
        const languageSwitch = document.getElementById("language-switch");
        const currentLanguage = localStorage.getItem("currentLanguage") || "fr";
        languageSwitch.value = currentLanguage;

        languageSwitch.addEventListener("change", (event) => {
            localStorage.setItem("currentLanguage", event.target.value);
            window.location.href = `Accueil_${event.target.value}.php`;
        });
    </script>
</body>
</html>
