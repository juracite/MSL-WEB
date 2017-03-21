<?php
    class Test extends Model{
        function setImma(){
            include(ROOT.'core/modele/dbconnect.php');
            $letters = chr(65+rand(0,25)).chr(65+rand(0,25));
            $letters1 = chr(65+rand(0,25)).chr(65+rand(0,25));
            $numbers = rand(100, 999);
            $query = $dbh->prepare("SELECT immatriculation FROM salarie WHERE immatriculation!=''");
            $query->execute();
            for($i = 1; $i <= $query->rowCount(); $i++){
                $letters = chr(65+rand(0,25)).chr(65+rand(0,25));
                $numbers = rand(100, 999);
                $letters1 = chr(65+rand(0,25)).chr(65+rand(0,25));
                $dbh->exec("UPDATE salarie SET immatriculation='". $letters . $numbers . $letters1 ."' WHERE id_salarie='". $i ."'");
            }
            
            return $letters . ' - ' . $numbers . ' - ' . $letters1;
        }
    }
?>