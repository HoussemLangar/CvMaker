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
    </style>
    <title>شروط الاستخدام</title>
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
                <option value="en">English</option>
                <option value="ar" selected>عربي</option>
    </select>
    <section id="section" class="hero">
    <div class="container">
    <h1>شروط الاستخدام</h1>    
    <h3>آخر تحديث في 01/03/2024</h3>
    <p>مرحبًا! تحدد هذه الشروط وأية وثائق قانونية أخرى تم إدراجها بالإشارة (جماعيًا "الشروط") اتفاقًا قانونيًا بين BOLD LLC (352385) أو Auxiliant S.à.r.l. (B199343) (بالجمع "المزود" أو "نحن") والمستخدم النهائي الفردي ("المستخدم" أو "أنت") بشأن الوصول والاستخدام لخصائصنا على الإنترنت المرتبطة والمقدمة من قبلنا، وشركاتنا التابعة والشركات التابعة، فضلاً عن أي برامج نقدمها للتنزيل على أجهزتك المحمولة (جماعيًا "الموقع"). ما لم يُشار إلى خلاف ذلك، تنطبق جميع الإشارات إلى "الموقع" أيضًا على استخدام منصتنا عبر الإنترنت والوثائق والمحتوى الذي نملكه والأدوات والبرمجيات والخدمات المتاحة من خلال الموقع (جماعيًا، كل ما سبق والموقع يُشار إليه باسم "الخدمة").

    يرجى قراءة هذه الشروط بعناية قبل استخدام الخدمة لأنها تتعلق بحقوقك والتزاماتك. إذا لم تقبل هذه الشروط أو إذا كنت تعتقد في أي وقت أنها لم تعد مقبولة بالنسبة لك، يرجى التوقف عن استخدام الخدمة على الفور. إذا كنت لا تزال لا تعيش في الولايات المتحدة، فنحن نشجعك على زيارة مواقعنا الموجودة باللغة المحلية المتوافقة مع مكان إقامتك أو اللغة المفضلة لديك.</p>
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