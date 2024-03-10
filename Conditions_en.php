<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    margin-bottom: 130px;
    margin-top:120px;
}

.hero p {
    font-size: 1.3rem;
    font-weight: 300;
    max-width: 900px;
    margin: 0 auto 40px auto;
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
    </style>
    <title>Terms of Use.</title>
    <link rel="icon" href="logo.png">
</head>
<body>
    <header class="navbar">
        <div class="container">
            <a href="Accueil_fr.php">Créez votre CV</a>
            <a href="#section2">Template</a>
            <a href="#util">Comment créez votre CV</a>
        </div>
    </header>
    <select id="language-switch">
                <option value="fr">Français</option>
                <option value="en" selected>English</option>
                <option value="ar">عربي</option>
    </select>
    <section id="section" class="hero">
    <div class="container">
    <h1>Terms of Use</h1>    
    <h3>Last Updated on 01/03/2024</h3>
    <p>Welcome! These Terms of Use and any other legal documents incorporated by reference (collectively, the "Terms") establish a legal agreement between BOLD LLC (352385) or Auxiliant S.à.r.l. (B199343) (collectively "Provider" or "we") and the individual end user ("User" or "you") regarding the access and use of our affiliated, linked, and offered Internet properties by us, our subsidiaries and affiliates, as well as any software we provide for download on your mobile devices (collectively, the "Site"). Unless otherwise indicated, all references to the "Site" also apply to the use of our online platform, documents, content owned by us, tools, software, and services available through the Site (collectively, all of the foregoing and the Site are referred to as the "Service").

    PLEASE READ THESE TERMS CAREFULLY BEFORE USING THE SERVICE AS THEY CONCERN YOUR RIGHTS AND OBLIGATIONS. IF YOU DO NOT ACCEPT THESE TERMS OR IF, AT ANY TIME, YOU BELIEVE THEY ARE NO LONGER ACCEPTABLE TO YOU, IMMEDIATELY CEASE USING THE SERVICE. IF YOU ARE NOT A RESIDENT OF THE UNITED STATES, WE ENCOURAGE YOU TO VISIT OUR CORRESPONDING LOCALIZED SITES FOR YOUR PLACE OF RESIDENCE OR PREFERRED LANGUAGE.</p>
</div>

    </section>
    <script>
        const languageSwitch = document.getElementById("language-switch");
        const currentLanguage = localStorage.getItem("currentLanguage") || "fr";
        languageSwitch.value = currentLanguage;

        languageSwitch.addEventListener("change", (event) => {
            localStorage.setItem("currentLanguage", event.target.value);
            window.location.href = `Conditions_${event.target.value}.php`;
        });
    </script>
</body>
</html>