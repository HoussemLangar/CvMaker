<?php
function chargerClass($classname)
{
    require $classname.'.php';
}
spl_autoload_register("chargerClass");
session_start();
$con = new PDO('mysql:host=localhost;dbname=bd_cv_maker;', 'root', '');
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$manager = new Inscription($con); 
    if (isset($_POST['ajout'])) { 
        $donnees = array(
        'nomPrenom'=>$_POST["nomp"],
        'nomUtilisateur'=>$_POST["username"],
        'motDePasse'=>$_POST["password"]);
        $user = new Inscriptions($donnees); 
        $lang = "ar";
        $manager->addUser($user,$lang);
    }
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التسجيل</title>
    <link rel="icon" href="logo.png">
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}
a {
    text-decoration: none;
    color: #333;
}

.container1 {
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
.container {
    display: flex;
    justify-content: center;
    align-items: center;

}
h2 {
    color: #333;
}

#form-group {
    margin-bottom: 10px;
}

label {
    display: inline-block;
    width: 150px;
}

input[type="text"],
input[type="password"] {
    width: calc(100% - 170px);
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 5px;
}
button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
    margin: 0px;
}

button:hover {
    background-color: #45a049;
}
.side{
    display: inline-block;
    width: 450px;
    float: center;
    margin: 20px;
    background-color: #d1d1d1;
    flex: 1;
    padding: 60px;
    border-radius: 4px;
    direction: rtl;
}
h1 {
    font-family: cursive;
    font-size: 4rem;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 15px;
    margin-top: 80px;
    margin-bottom: 60;
    text-align: center;
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
    margin-top: 5px;
}
#titre{
        font-size: 1.5rem;
        font-weight: 300;
        max-width: 500px;
        margin: 0 auto 40px auto;
        text-align: center;
        font-family: cursive;
        margin-bottom: 50px;
}
p{
    font-size: 0.8rem;
    margin-bottom: 30px;
    margin-top: 30px;
}
.alert {
    padding: 15px;
    background-color: #f44336;
    color: white;
    margin-bottom: 15px;
}
.navbar a:hover {
    color: #4CAF50 ;
}
</style>
</head>
<body>
<header class="navbar">
    <div class="container1">
        <a href="accueil_fr.php">الصفحة الرئيسية</a>
        <a href="#section2">القالب</a>
        <a href="accueil_fr.php">كيفية إنشاء سيرتك الذاتية</a>
    </div>
</header>
<select id="language-switch">
  <option value="fr">Français</option>
  <option value="en">Anglais</option>
  <option value="ar" selected>العربية</option>
</select>
    <h1>التسجيل</h1>
    <div class="container">
        <form action="" method="post">
            <div class="side">
                <p id="titre">املأ تفاصيلك</p>
                <div id="form-group">
                    <label for="nomp">الاسم الكامل:</label>
                    <input type="text" id="nomp" name="nomp" placeholder="الاسم الكامل" required>
                </div>
                <div id="form-group">
                    <label for="username">اسم المستخدم:</label>
                    <input type="text" id="username" name="username" placeholder="مثال@gmail.com" required>
                </div>
                <div id="form-group">
                    <label for="password">كلمة المرور:</label>
                    <input type="password" id="password" name="password" placeholder="***********" required>
                </div>
                <?php
                if (isset($_GET['error']) && $_GET['error'] == 1) {
                echo '<div class="alert">لديك حساب بالفعل!</div>';
                }
                ?>
                <p><input type="checkbox" id="check" name="check" required> قرأت وأوافق على <a href="Conditions_ar.php" target="_blank">شروط الاستخدام</a></p>
                <div>
                    <h4>هل لديك حساب بالفعل؟ <a href="Connection_ar.php">تسجيل الدخول!</a></h4>
                </div>
                <button type="submit" value="ajout" name="ajout">تسجيل</button>
            </div>
        </form>
    </div>
    <script>
        const languageSwitch = document.getElementById("language-switch");
        const currentLanguage = localStorage.getItem("currentLanguage") || "ar";
        languageSwitch.value = currentLanguage;

        languageSwitch.addEventListener("change", (event) => {
            localStorage.setItem("currentLanguage", event.target.value);
            window.location.href = `Signup_${event.target.value}.php`;
        });
    </script>
</body>
</html>
