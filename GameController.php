   <?php
/**
 * Created by PhpStorm.
 * User: joffrey
 * Date: 25/10/14
 * Time: 15:13
 */

namespace App\Controller;


use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use App\Model\Table\GameTable;
use Cake\ORM\Behavior;


class GameController extends AppController{


public function liste()
    {


        if (isset($_GET['query'])) {
            // Mot tapé par l'utilisateur
            $q = htmlentities($_GET['query']);

            // Connexion à la base de données
            try {
                $bdd = ConnectionManager::get('default');
            } catch (Exception $e) {
                exit('Impossible de se connecter à la base de données.');
            }

            // Requête SQL
            $requete = "SELECT * FROM Game WHERE t_name_game LIKE'" . $q . "%' LIMIT 0, 10";

            // Exécution de la requête SQL
            $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

            // On parcourt les résultats de la requête SQL
            while ($donnees = $resultat->fetch(\PDO::FETCH_ASSOC)) {
                // On ajoute les données dans un tableau
                $suggestions['suggestions'][] = $donnees['t_name_game'];
            }

            // On renvoie le données au format JSON pour le plugin
            echo json_encode($suggestions);

        }


    }
    }
