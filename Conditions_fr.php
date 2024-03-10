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
    <title>Conditions d’utilisation</title>
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
                <option value="fr" selected>Français</option>
                <option value="en">English</option>
                <option value="ar">عربي</option>
    </select>
    <section id="section" class="hero">
        <div class="container">
        <h1>Conditions d’utilisation</h1>    
        <h3>Dernière mise à jour le 01/03/2024 </h3>
            <p>Bienvenue! Les présentes Conditions d'Utilisation et tous les autres documents juridiques incorporés par référence (collectivement, les "Conditions") établissent un accord juridique entre BOLD LLC (352385) ou Auxiliant S.à.r.l. (B199343) (collectivement "Fournisseur" ou "nous") et l'utilisateur final individuel ("Utilisateur" ou "vous") en ce qui concerne l'accès et l'utilisation de nos propriétés Internet affiliées, liées et offertes par nous, nos filiales et sociétés affiliées, ainsi que tout logiciel que nous vous fournissons pour téléchargement sur vos dispositifs mobiles (collectivement, le "Site"). Sauf indication contraire, toutes les références au "Site" s'appliquent également à l'utilisation de notre plateforme en ligne, des documents, du contenu dont nous sommes propriétaires, des outils, des logiciels et des services disponibles par le biais du Site (collectivement, tout ce qui précède et le Site sont désignés par le terme "Service").

VEUILLEZ LIRE ATTENTIVEMENT CES CONDITIONS AVANT D’UTILISER LE SERVICE CAR ELLES CONCERNENT VOS DROITS ET OBLIGATIONS. SI VOUS N'ACCEPTEZ PAS CES CONDITIONS OU SI, À UN MOMENT, VOUS ESTIMEZ QU'ELLES NE SONT PLUS ACCEPTABLES POUR VOUS, CESSEZ IMMÉDIATEMENT D'UTILISER LE SERVICE. SI VOUS N'ÊTES PAS RÉSIDENT AMÉRICAIN, NOUS VOUS INVITONS À CONSULTER NOS SITES LOCALISÉS CORRESPONDANTS À VOTRE LIEU DE RÉSIDENCE OU À VOTRE LANGUE DE PRÉDILECTION.</p>
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