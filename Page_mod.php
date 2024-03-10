<?php
session_start();
$session_token = $_GET['token']; 
if (isset($_POST['creer1'])) {
    header("Location: Modele_1.php?token=$session_token");}
if (isset($_POST['creer2'])) {
    header("Location: Modele_3.php?token=$session_token");}
if (isset($_POST['creer3'])) {
    header("Location: Modele_2.php?token=$session_token");}
if (isset($_POST['deconnexion'])) {
    session_unset();
    session_destroy();
    header("Location: Accueil_fr.php");}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <title>CV</title>
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

.navbar .a {
    color: #fff;
    padding: 0 15px;
    align-items: center;
    background-color: transparent;
    border: none;
}
.navbar .a:hover {
    color: #4CAF50 ;
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
.cv{
  font-size: 1.8rem;
    font-weight: 300;
    max-width: 500px;
    margin: 0 auto 40px auto;
    margin-top:17px;
    color:white;
}
    </style>
</head>
<body>
    <header class="navbar">
        <div class="container">
        <p class="cv">Choisissez votre Template !</p>
        </div>
        <form action="#" method="POST">
            <button type="submit" class="con-button" name="deconnexion">Déconnexion</button>
        </form>
    </header>
    <form action="#" method="POST">
    <section class="img" id="section2">
        <img src="template0.png" class="image"/>
        <button class="image-button" name="creer1">Cliquez ici</button>
    </section>
    <section class="img" id="section2">
        <img src="template2.png" class="image"/>
        <button class="image-button" name="creer2">Cliquez ici</button>
    </section>
    <section class="img" id="section2">
        <img src="template3.png" class="image"/>
        <button class="image-button" name="creer3">Cliquez ici</button>
    </section>
</form>
</body>
</html>