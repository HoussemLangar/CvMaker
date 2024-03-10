<?php
require('connect.php');
class CvManager
{
    private $descriptionprofil;
    private $nomprenom;
    private $adresse;
    private $telephone;
    private $email;
    private $lienlinkedin;
    private $descriptioncompetences;
    private $nomentreprise;
    private $poste;
    private $datedebut;
    private $datefin;
    private $a;
    private $ecole;
    private $diplome;
    private $datedeb;
    private $datef;
    private $domaineetude;
    private $langues;
    private $photo;
    private $token;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    public function getDescriptionProfil()
    {
        return $this->descriptionprofil;
    }
    public function setDescriptionProfil($value)
    {
        $this->descriptionprofil = $value;
    }
    public function getNomPrenom()
    {
        return $this->nomprenom;
    }

    public function setNomPrenom($value)
    {
        $this->nomprenom = $value;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($value)
    {
        $this->adresse = $value;
    }
    public function getTelephone()
    {
        return $this->telephone;
    }
    public function setTelephone($value)
    {
        $this->telephone = $value;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($value)
    {
        $this->email = $value;
    }
    public function getLienLinkedin()
    {
        return $this->lienlinkedin;
    }
    public function setLienLinkedin($value)
    {
        $this->lienlinkedin = $value;
    }
    public function getDescriptionCompetences()
    {
        return $this->descriptioncompetences;
    }
    public function setDescriptionCompetences($value)
    {
        $this->descriptioncompetences = $value;
    }
    public function getNomEntreprise()
    {
        return $this->nomentreprise;
    }
    public function setNomEntreprise($value)
    {
        $this->nomentreprise = $value;
    }
    public function getPoste()
    {
        return $this->poste;
    }
    public function setPoste($value)
    {
        $this->poste = $value;
    }
    public function getDateDebut()
    {
        return $this->datedebut;
    }
    public function setDateDebut($value)
    {
        $this->datedebut = $value;
    }
    public function getDateFin()
    {
        return $this->datefin;
    }
    public function setDateFin($value)
    {
        $this->datefin = $value;
    }
    public function geta()
    {
        return $this->a;
    }
    public function seta($value)
    {
        $this->a = $value;
    }
    public function getEcole()
    {
        return $this->ecole;
    }
    public function setEcole($value)
    {
        $this->ecole = $value;
    }
    public function getDiplome()
    {
        return $this->diplome;
    }
    public function setDiplome($value)
    {
    $this->diplome = $value;
    }
    public function getDomaineEtude()
    {
        return $this->domaineetude;
    }
    public function setDomaineEtude($value)
    {
    $this->domaineetude = $value;
    }
    public function getLangues()
    {
        return $this->langues;
    }
    public function setLangues($value)
    {
        $this->langues = $value;
    }
    public function getPhoto()
    {
        return $this->photo;
    }
    public function setPhoto($value)
    {
        $this->photo = $value;
    }
    public function getDateDeb()
    {
        return $this->datedeb;
    }
    public function setDateDeb($value)
    {
        $this->datedeb = $value;
    }
    public function getDateF()
    {
        return $this->datef;
    }
    public function setDateF($value)
    {
        $this->datef = $value;
    }
    public function getToken()
    {
        return $this->token;
    }
    public function setToken($value)
    {
        $this->token = $value;
    }
}
class CvManagers
{
    private $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function addCv(CvManager $cv)
{
    try {
        $stmt = $this->conn->prepare("INSERT INTO cv (description_profil, nom_prenom, adresse, telephone, email, linkedin, competences, nom_entreprise, poste_occupe, date_debut, date_fin, description_exp, nom_ecole, diplome_obtenu, annee_debut, annee_fin, domaine_etude, langues, photo, token) 
        VALUES (:descriptionprofil, :nomprenom, :adresse, :telephone, :email, :lienlinkedin, :descriptioncompetences, :nomentreprise, :poste, :datedebut, :datefin, :a, :ecole, :diplome, :datedeb, :datef, :domaineetude, :langues, :photo, :token)");

        $stmt->bindValue(':descriptionprofil', $cv->getDescriptionProfil());
        $stmt->bindValue(':nomprenom', $cv->getNomPrenom());
        $stmt->bindValue(':adresse', $cv->getAdresse());
        $stmt->bindValue(':telephone',$cv->getTelephone());
        $stmt->bindValue(':email',$cv->getEmail());
        $stmt->bindValue(':lienlinkedin',$cv->getLienLinkedin());
        $stmt->bindValue(':descriptioncompetences',$cv->getDescriptionCompetences());
        $stmt->bindValue(':nomentreprise',$cv->getNomEntreprise());
        $stmt->bindValue(':poste',$cv->getPoste());
        $stmt->bindValue(':datedebut',$cv->getDateDebut());
        $stmt->bindValue(':datefin',$cv->getDateFin());
        $stmt->bindValue(':a',$cv->geta());
        $stmt->bindValue(':ecole',$cv->getEcole());
        $stmt->bindValue(':diplome', $cv->getDiplome());
        $stmt->bindValue(':datedeb', $cv->getDateDeb());
        $stmt->bindValue(':datef', $cv->getDateF());
        $stmt->bindValue(':domaineetude',$cv->getDomaineEtude());
        $stmt->bindValue(':langues',$cv->getLangues());
        $stmt->bindValue(':photo',$cv->getPhoto());
        $stmt->bindValue(':token', $cv->getToken());
        $stmt->execute();
        $session_token = $_GET['token']; 
        header("Location: Page_mod.php?token=$session_token");
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

}
?>