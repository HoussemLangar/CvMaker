<?php
function chargerClass($classname)
{
    require $classname.'.php';
}
spl_autoload_register("chargerClass");
session_start();
$con = new PDO('mysql:host=localhost;dbname=bd_cv_maker;', 'root', '');
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$manager = new Tokens($con); 
if (isset($_POST['submit'])) {
    $donnees = array(
        'nomUtilisateur'=>$_POST["username"],
        'motDePasse'=>$_POST["password"]);
        
        $user = new Token($donnees);
        $jwt = $manager->addUser($user);
    
    if ($jwt) {
        header("Location: Accueil_ar_sess.php?token=$jwt&id=$id");
        exit();
    } else {
        header("Location: Connexion_fr.php?error=2");    
    }
}
?>
<!DOCTYPE html> 
<html lang="ar">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>قم بإنشاء سيرتك الذاتية</title> 
    <link rel="icon" href="logo.png">
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    direction: ltr;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    direction: rtl;
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
}
h2 {
    color: #333;
}

#form-group {
    margin-bottom: 10px;
    direction: rtl;
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

input[type="file"] {
    margin-top: 10px;
}

button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: left;
    margin-top: 10px;
}

button:hover {
    background-color: #45a049;
}

a {
    text-decoration: none;
    color: #333;
}

.container1 {
    max-width: 1100px;
    margin: auto;
    overflow: hidden;
    padding: 0px 20px;
    direction: ltr;
}
h1, h2 {
    direction: rtl;
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
h1 {
    font-family: cursive;
    font-size: 4rem;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 15px;
    margin-top: 80px;
    text-align: center;
}
.titre{
        font-size: 1.5rem;
        font-weight: 300;
        max-width: 500px;
        margin: 0 auto 40px auto;
        text-align: center;
        font-family: cursive;
        margin-bottom: 50px;
}
select{
    background-color: #c5c5c5;
    color: rgb(0, 0, 0) !important;
    border-color:#c5c5c5;
    color: #c5c5c5;
    float: left;
    cursor: pointer;
    outline: none;
    align-items: right;
    width: max-content;
    margin-top: 5px;
}
h3 {
    margin-top: 50px;
}
.reussi {
    padding: 15px;
    background-color: #4CAF50;
    color: white;
    margin-bottom: 15px;
    direction: ltr;
}
.alert {
    padding: 15px;
    background-color: #f44336;
    color: white;
    margin-bottom: 15px;
    direction: ltr;
}
.navbar a:hover {
    color: #4CAF50 ;
}
</style>
</head>
<body>
  <header class="navbar">
    <div class="container1">
        <a href="accueil_ar.php">الصفحة الرئيسية</a>
        <a href="#section2">النموذج</a>
        <a href="accueil_ar.php">كيفية إنشاء سيرتك الذاتية</a>
    </div>
</header>
<select id="language-switch">
  <option value="fr">Français</option>
  <option value="en">Anglais</option>
  <option value="ar" selected>العربية</option>
</select>
    <h1>تسجيل الدخول</h1> 
    <div class="container">
        <form action="" method='post'>
            <div class="side">
                <?php
                if (isset($_GET['success']) && $_GET['success'] == 1) {
                echo '<div class="reussi">تم إنشاء الحساب بنجاح!</div>';
                }
                ?>
            <p class="titre">املأ تفاصيلك</p>
            <div id="form-group">
                <label for="username">اسم المستخدم:</label>
                <input type="text" id="username" name="username" placeholder="مثال@gmail.com" required>
            </div>
            <div id="form-group">
                <label for="password">كلمة المرور:</label>
                <input type="password" id="password" name="password" placeholder="**********" required>
            </div>
            <br>
            <br>
            <?php
            if (isset($_GET['error']) && $_GET['error'] == 2) {
            echo '<div class="alert">عنوان البريد الإلكتروني أو كلمة المرور غير صحيحة!</div>';
            }
            ?>
            <h3>لا تملك حساباً؟</h3>
            <p><a href="Signup_ar.php">اشترك الآن!</a></p>
            <button type="submit" name="submit" id="submit">إرسال</button>
            </div>
        </form>    
    </div>
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
</html>
