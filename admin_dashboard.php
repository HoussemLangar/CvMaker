<?php
$token = $_GET['token'];
class Dashboard {
    private $db;

    public function __construct($servername, $username, $password, $dbname) {
        $this->db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getRows() {
        $stmt = $this->db->query("SELECT * FROM cv");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_cv_maker";

$dashboard = new Dashboard($servername, $username, $password, $dbname);

$rows = $dashboard->getRows();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord administrateur</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord administrateur</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Tableau de bord administrateur</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Description du Profil</th>
            <th>Nom et Prénom</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>LinkedIn</th>
            <th>Compétences</th>
            <th>Nom de l'Entreprise</th>
            <th>Poste Occupé</th>
            <th>Date de Début</th>
            <th>Date de Fin</th>
            <th>Description de l'Expérience</th>
            <th>Nom de l'École</th>
            <th>Diplôme Obtenu</th>
            <th>Année de Début</th>
            <th>Année de Fin</th>
            <th>Domaine d'Étude</th>
            <th>Langues</th>
            <th>Photo</th>
            <th>Token</th>
            <th>Action</th>
        </tr>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['description_profil']; ?></td>
                <td><?php echo $row['nom_prenom']; ?></td>
                <td><?php echo $row['adresse']; ?></td>
                <td><?php echo $row['telephone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['linkedin']; ?></td>
                <td><?php echo $row['competences']; ?></td>
                <td><?php echo $row['nom_entreprise']; ?></td>
                <td><?php echo $row['poste_occupe']; ?></td>
                <td><?php echo $row['date_debut']; ?></td>
                <td><?php echo $row['date_fin']; ?></td>
                <td><?php echo $row['description_exp']; ?></td>
                <td><?php echo $row['nom_ecole']; ?></td>
                <td><?php echo $row['diplome_obtenu']; ?></td>
                <td><?php echo $row['annee_debut']; ?></td>
                <td><?php echo $row['annee_fin']; ?></td>
                <td><?php echo $row['domaine_etude']; ?></td>
                <td><?php echo $row['langues']; ?></td>
                <td><?php echo $row['photo']; ?></td>
                <td><?php echo $row['token']; ?></td>
                <td>
                <a href="#" onclick="redirectWithToken('supprimer.php?id=<?php echo $row['id']; ?>')">Supprimer</a> |
                <a href="#" onclick="redirectWithToken('modifier.php?id=<?php echo $row['id']; ?>')">Modifier</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script>
        function getParamByName(name) {
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(window.location.href);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }
        var tokenValue = getParamByName('token');

        function addTokenToURL(url) {
            if (url.indexOf('?') !== -1) {
                url += '&token=' + tokenValue;
            } else {
                url += '?token=' + tokenValue;
            }
            return url;
        }

        function redirectWithToken(url) {
            window.location.href = addTokenToURL(url);
        }
    </script>
</body>
</html>
