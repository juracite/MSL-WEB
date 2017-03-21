<?php

    class Personnels extends Model{
        function getPersonnelLogin(){
            include(ROOT.'core/modele/dbconnect.php');
            $list_perso_login = array('0');
            foreach($dbh->query('SELECT * from salarie') as $row) {

                // echo '<td>'.$row["id_salarie"].'</td>';
                // echo '<td>'.$row["nom"].'</td>';
                // echo '<td>'.$row["prenom"].'</td>';
                // echo '<td>'.$row["mobile"].'</td>';
                // echo '<td>'.$row["type_service"].'</td>';
                // echo '<td>'.$row["mail"].'</td>';
                // echo '<td>'.$row["responsable"].'</td>';
                // echo '<td>'.$row["login"].'</td>';
                // echo '<td>'.$row["password"].'</td>';
                // echo '<td>'.$row["id_con"].'</td>';

                array_push($list_perso_login, $row['login']);
            }
            return $list_perso_login;
        }
        function getPersonnelPassword(){
            include(ROOT.'core/modele/dbconnect.php');
            $list_perso_password = array('0');
            foreach($dbh->query('SELECT * from salarie') as $row) {

                // echo '<td>'.$row["id_salarie"].'</td>';
                // echo '<td>'.$row["nom"].'</td>';
                // echo '<td>'.$row["prenom"].'</td>';
                // echo '<td>'.$row["mobile"].'</td>';
                // echo '<td>'.$row["type_service"].'</td>';
                // echo '<td>'.$row["mail"].'</td>';
                // echo '<td>'.$row["responsable"].'</td>';
                // echo '<td>'.$row["login"].'</td>';
                // echo '<td>'.$row["password"].'</td>';
                // echo '<td>'.$row["id_con"].'</td>';

                array_push($list_perso_password, $row['password']);
            }
            return $list_perso_password;
        }
        function getPersonnelConnectionId($id){
            include(ROOT.'core/modele/dbconnect.php');
            $connection_id = array();
            foreach($dbh->query('SELECT * from salarie WHERE id_salarie="'.$id.'"') as $row) {

                // echo '<td>'.$row["id_salarie"].'</td>';
                // echo '<td>'.$row["nom"].'</td>';
                // echo '<td>'.$row["prenom"].'</td>';
                // echo '<td>'.$row["mobile"].'</td>';
                // echo '<td>'.$row["type_service"].'</td>';
                // echo '<td>'.$row["mail"].'</td>';
                // echo '<td>'.$row["responsable"].'</td>';
                // echo '<td>'.$row["login"].'</td>';
                // echo '<td>'.$row["password"].'</td>';
                // echo '<td>'.$row["id_con"].'</td>';

                array_push($connection_id, $row['id_con']);
            }
            return $connection_id;
        }
        function getPersonnelNomPrenomById($id_con){
            include(ROOT.'core/modele/dbconnect.php');
            $nom_prenom_user = array();
            foreach($dbh->query('SELECT * from salarie WHERE id_con="'.$id_con.'"') as $row) {

                // echo '<td>'.$row["id_salarie"].'</td>';
                // echo '<td>'.$row["nom"].'</td>';
                // echo '<td>'.$row["prenom"].'</td>';
                // echo '<td>'.$row["mobile"].'</td>';
                // echo '<td>'.$row["type_service"].'</td>';
                // echo '<td>'.$row["mail"].'</td>';
                // echo '<td>'.$row["responsable"].'</td>';
                // echo '<td>'.$row["login"].'</td>';
                // echo '<td>'.$row["password"].'</td>';
                // echo '<td>'.$row["id_con"].'</td>';

                array_push($nom_prenom_user, $row['nom']." ".$row['prenom']);
            }
            return $nom_prenom_user;
        }
        function updatePersonnelPassword($id_con, $pass) {  
            include(ROOT.'core/modele/dbconnect.php');
            $result = $dbh->query('SELECT * from salarie WHERE id_con="'.$id_con.'"');
            $row = $result->fetch();
            $login_user = $row[8];
            $id_con = $row[10];
            $new_id_con = md5($pass + $login_user);
            $dbh->exec("UPDATE salarie SET password=md5('". $pass ."'), id_con='" . $new_id_con . "' WHERE id_con='".$id_con."'");
            $returnit = $login_user+" / "+$pass;
            return $returnit;
        }
        function getInformationPersonnel($id_con){
            include(ROOT.'core/modele/dbconnect.php');
            $result = $dbh->query('SELECT * from salarie WHERE id_con="'.$id_con.'"');
            $row = $result->fetch();
            return $row;
        }
        function getPmPersonnel($id_salarie){
            include(ROOT.'core/modele/dbconnect.php');
            $query=$dbh->prepare('SELECT mp_lu, mp_id, mp_expediteur, mp_titre, mp_time, id_salarie, login
            FROM mp
            LEFT JOIN salarie ON mp.mp_expediteur = salarie.id_salarie
            WHERE mp_receveur = :id ORDER BY mp_id DESC');
            $query->bindValue(':id',$id_salarie,PDO::PARAM_INT);
            $query->execute();
            if ($query->rowCount()>0){
                $data = $query->fetchAll();
                $query->CloseCursor();
                return $data;
            }
            else{
                return false;
            }
        }
        function getAllPersonnelLogin(){
            include(ROOT.'core/modele/dbconnect.php');
            $query=$dbh->prepare('SELECT login FROM salarie WHERE login!=""');
            $query->execute();
            $data = $query->fetchAll();
            $query->CloseCursor();
            return $data;
        }
    }
?>