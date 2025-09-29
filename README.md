# 📑 CvMaker

**CvMaker** is a PHP Object-Oriented (OOP) application that allows users to create, customize, and export professional resumes (CVs).  
It provides a simple interface to enter personal information, education, work experience, and skills, then generates a formatted CV.

---

## 📂 Project Structure

```
CvMaker/
├── Accueil_ar.php             # Home page (Arabic)
├── Accueil_ar_sess.php        # Home page with session (Arabic)
├── Accueil_en.php             # Home page (English)
├── Accueil_en_sess.php        # Home page with session (English)
├── Accueil_fr.php             # Home page (French)
├── Accueil_fr_sess.php        # Home page with session (French)
├── Conditions_ar.php          # Terms & Conditions (Arabic)
├── Conditions_en.php          # Terms & Conditions (English)
├── Conditions_fr.php          # Terms & Conditions (French)
├── Connexion_ar.php           # Login page (Arabic)
├── Connexion_en.php           # Login page (English)
├── Connexion_fr.php           # Login page (French)
├── CvMakers_ar.php            # CV creation page (Arabic)
├── CvMakers_en.php            # CV creation page (English)
├── CvMakers_fr.php            # CV creation page (French)
├── CvManagers.php             # CV manager/dashboard
├── Inscription.php            # Registration page
├── Modele_1.php               # CV Template 1
├── Modele_2.php               # CV Template 2
├── Modele_3.php               # CV Template 3
├── Page_mod.php               # Page modification script
├── Signup_ar.php              # Signup form (Arabic)
├── Signup_en.php              # Signup form (English)
├── Signup_fr.php              # Signup form (French)
├── Tokens.php                 # Token management (sessions, security)
├── admin_dashboard.php        # Admin dashboard
├── bd_cv_maker.sql            # Database schema (MySQL)
├── composer.json              # Composer configuration
├── composer.lock              # Composer lock file
├── composer.phar              # Composer binary
├── connect.php                # Database connection
├── debug.log                  # Debug log file
├── logo.png                   # Application logo
├── modifier.php               # Script for modifying CV entries
├── presentation cvmaker.pdf   # Project presentation (documentation)
├── supprimer.php              # Script to delete CV entries
├── template0.png              # Preview of Template 0
├── template1.png              # Preview of Template 1
├── template2.png              # Preview of Template 2
└── template3.png              # Preview of Template 3
└── README.md
```

---

## 🛠️ Technologies Used
- **PHP 8+** (Object-Oriented Programming)
- **HTML5 / CSS3 / JavaScript**
- [Composer](https://getcomposer.org/) *(if dependencies are managed)*
- [TCPDF / Dompdf](https://github.com/dompdf/dompdf) *(optional – for PDF export)*

---

## ⚙️ Installation & Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/HoussemLangar/CvMaker.git
   cd CvMaker
   ```

2. **Set up a local server**
   - If you are using **XAMPP**, move the project folder into `htdocs/`.
   - If you are using **Laravel Valet**, simply link the project directory.
   - Or run a built-in PHP server:
     ```bash
     php -S localhost:8000 -t CvMaker
     ```

3. **Access the application**
   Open [http://localhost:8000](http://localhost:8000) in your browser.

---

## 🚀 Features
- [x] Add personal information, education, and work experience
- [x] Object-Oriented PHP structure (Models, Controllers, Views)
- [ ] Generate CV in PDF format
- [ ] Different CV templates and themes
- [ ] Export/Save CV online

---

## 📄 License

This project is licensed under the MIT License – feel free to modify and use it.  

---

## 👤 Author

Developed by **Houssem LANGAR**  
📧 Email: houssemlangar3@gmail.com  
