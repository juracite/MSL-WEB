<?php
class personnel extends Controller{
    function connect(){
        $this->loadModel('Personnels');
        $a['perso_username'] = $this->Personnels->getPersonnelLogin();
        $this->set($a);
        $b['perso_password'] = $this->Personnels->getPersonnelPassword();
        $this->set($b);
        
        
        if(isset($_POST['username']) && isset($_POST['password'])){
            $username_user = $_POST['username'];
            $password_user = md5($_POST['password']);
            $cpt = 0;
            
            foreach($a['perso_username'] as $key=>$username){
                if($username != $username_user){
                    $cpt++;
                }
                elseif($username == $username_user) {
                    if($password_user == $b['perso_password'][$key]){
                        
                        //Dans la BDD il y a un id 0 en plus, donc $key-1 pour retrouver le bon salarie par rapport à la bdd et non par rapport à la liste
                        $id_con = $this->Personnels->getPersonnelConnectionId($key);
                        
                        setcookie('id_con', $id_con[0], (time() + 3600), "/");
                        setcookie('id_user', $key, (time() + 3600), "/");
                        $c['id_con'] = $id_con;
                        
                        $c['message'] = 'Connecté, redirection vers la page d\'administration... ';
                        
                        $this->set($c);
                    }
                    else {
                        $c['message'] = 'Erreur de mot de passe';
                        $this->set($c);
                    }
                }
                else{
                    $c['message'] = 'Compte introuvable';
                    $this->set($c);
                }
            }
        }
        
        $this->render('connexion');
    }
    function administration(){
        $this->loadModel('Personnels');
        
        if(isset($_COOKIE['id_con']) && isset($_COOKIE['id_user'])){
            $id_user = $_COOKIE['id_user'];
            $id_con_user = $_COOKIE['id_con'];
            $id_con = $this->Personnels->getPersonnelConnectionId($id_user);
            if($id_con_user == $id_con[0]){
                $a['nom_prenom_user'] = $this->Personnels->getPersonnelNomPrenomById($id_con[0]);
                $this->set($a);
                $this->render('membre');
            }
            else{
                echo 'Erreur les informations sont erronées';
            }
        }
        if(!isset($_COOKIE['id_con']) or !isset($_COOKIE['id_user'])){
            header("Location: connect");
            //echo 'error';
        }
    }
    function compte(){
        $this->loadModel('Personnels');
        
        if(isset($_COOKIE['id_con']) && isset($_COOKIE['id_user'])){
            $id_user = $_COOKIE['id_user'];
            $id_con_user = $_COOKIE['id_con'];
            $id_con = $this->Personnels->getPersonnelConnectionId($id_user);
            $personnel_info = $this->Personnels->getInformationPersonnel($id_con_user);
            if($id_con_user == $id_con[0]){
                $a['nom_prenom_user'] = $this->Personnels->getPersonnelNomPrenomById($id_con[0]);
                $a['infos_user'] = $personnel_info;
                $this->set($a);
                $this->render('compte');
            }
            else{
                echo 'Erreur les informations sont erronées';
            }
        }
        if(!isset($_COOKIE['id_con']) or !isset($_COOKIE['id_user'])){
            header("Location: connect");
        }
    }
    function disconnect(){
        if (isset($_COOKIE['id_con']) or isset($_COOKIE['id_user'])) {
            unset($_COOKIE['id_con']);
            unset($_COOKIE['id_user']);
            setcookie('id_con', null, -1, '/');
            setcookie('id_user', null, -1, '/');
            var_dump($_COOKIE);
            header("Location: connect");
            return true;
        } else {
            header("Location: connect");
            return false;
        }
    }
    function courriel(){
        $this->loadModel('Personnels');
        if(isset($_COOKIE['id_con']) && isset($_COOKIE['id_user'])){
            $id_user = $_COOKIE['id_user'];
            $id_con_user = $_COOKIE['id_con'];
            $id_con = $this->Personnels->getPersonnelConnectionId($id_user);
            if($id_con_user == $id_con[0]){
                $a['nom_prenom_user'] = $this->Personnels->getPersonnelNomPrenomById($id_con[0]);
                $a['messages_info'] = $this->Personnels->getPmPersonnel($id_user);
                $a['all_login_personnel'] = $this->Personnels->getAllPersonnelLogin();
                $this->set($a);
                $this->render('courriel');
            }
            else{
                echo 'Erreur les informations sont erronées';
            }
        }
        if(!isset($_COOKIE['id_con']) or !isset($_COOKIE['id_user'])){
            header("Location: connect");
            //echo 'error';
        }
    }
    
    function changePass(){
        $this->loadModel('Personnels');
        if(isset($_POST['new_password']) && isset($_POST['new_password_confirm']) && isset($_COOKIE['id_con']) && isset($_COOKIE['id_user'])){
            $new_password = $_POST['new_password'];
            $new_password_confirm = $_POST['new_password_confirm'];
            if($new_password == $new_password_confirm){
                $username['username'] = $this->Personnels->updatePersonnelPassword($_COOKIE['id_con'], $new_password);
                $this->set($username);
                unset($_COOKIE['id_con']);
                unset($_COOKIE['id_user']);
                setcookie('id_con', null, -1, '/');
                setcookie('id_user', null, -1, '/');
                header("Location: connect");
            } else {
                header("Location: compte");
            }
        } else {
            header("Location: connect");
        }
    }
    
    function param(){
        $this->loadModel('Personnels');
        
        if(isset($_COOKIE['id_con']) && isset($_COOKIE['id_user'])){
            $id_user = $_COOKIE['id_user'];
            $id_con_user = $_COOKIE['id_con'];
            $id_con = $this->Personnels->getPersonnelConnectionId($id_user);
            $personnel_info = $this->Personnels->getInformationPersonnel($id_con_user);
            $personnel_vehicule = $this->Personnels->getVehiculePersonnel($id_con_user);
            $personnel_vehicule_info = $this->Personnels->getVehiculeAllPersonnel($id_con_user);
            $personnel_avatar = $this->Personnels->getAvatarPersonnel($id_con_user);
            if($id_con_user == $id_con[0]){
                $a['nom_prenom_user'] = $this->Personnels->getPersonnelNomPrenomById($id_con[0]);
                $a['infos_user'] = $personnel_info;
                $a['user_vehicule'] = $personnel_vehicule;
                $a['user_vehicule_infos'] = $personnel_vehicule_info;
                $a['user_avatar'] = $personnel_avatar;
                $this->set($a);
                $this->render('param/general');
            }
            else{
                echo 'Erreur les informations sont erronées';
            }
        }
        if(!isset($_COOKIE['id_con']) || !isset($_COOKIE['id_user'])){
            header("Location: connect");
        }
    }
    
    function change_prof(){
        $this->loadModel('Personnels');
        
        if(isset($_COOKIE['id_con']) && isset($_COOKIE['id_user'])){
            $id_user = $_COOKIE['id_user'];
            $id_con_user = $_COOKIE['id_con'];
            $id_con = $this->Personnels->getPersonnelConnectionId($id_user);
            $personnel_info = $this->Personnels->getInformationPersonnel($id_con_user);
            $personnel_vehicule = $this->Personnels->getVehiculePersonnel($id_con_user);
            $personnel_vehicule_info = $this->Personnels->getVehiculeAllPersonnel($id_con_user);
            
            if($id_con_user == $id_con[0]){
                $a['nom_prenom_user'] = $this->Personnels->getPersonnelNomPrenomById($id_con[0]);
                $a['infos_user'] = $personnel_info;
                $a['user_vehicule'] = $personnel_vehicule;
                $a['user_vehicule_infos'] = $personnel_vehicule_info;
                
                if(isset($_FILES) && !empty($_FILES)){
                    $dossier = 'C:/wamp64/www/MSL-WEB/vues/app/img/utilisateurs/'.$a['infos_user'][9].'/';
                    $fichier = basename($_FILES['avatar']['name']);
                    $taille_maxi = 1000000; // ~1 Mb
                    $taille = filesize($_FILES['avatar']['tmp_name']);
                    $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.JPG', '.PNG', '.GIF', '.JPEG');
                    $extension = strrchr($_FILES['avatar']['name'], '.');
                    //Début des vérifications de sécurité...
                    if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
                    {
                       $a['msg'] = 'Vous devez uploader un fichier image de type png, gif, jpg ou jpeg';
                    }
                    if($taille>$taille_maxi)
                    {
                        $a['msg'] = 'Le fichier est trop gros...';
                    }
                    if(!isset($a['msg'])) //S'il n'y a pas d'erreur, on upload
                    {
                        //On formate le nom du fichier ici...
                        $fichier = strtr($fichier,
                        'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                        if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                        {
                            $a['msg_1'] = "Image changée avec succès...";

                            $this->Personnels->updatePersonnelAvatar($id_con_user, $fichier);
                        }
                        else //Sinon (la fonction renvoie FALSE).
                        {
                            $a['msg_2'] = "Echec de l'envoi";
                            
                        }
                    }
                }
                $personnel_avatar = $this->Personnels->getAvatarPersonnel($id_con_user);
                $a['user_avatar'] = $personnel_avatar;
                $this->set($a);
                $this->render('param/change_prof');
            }
            else{
                echo 'Erreur les informations sont erronées';
            }
        }
        if(!isset($_COOKIE['id_con']) || !isset($_COOKIE['id_user'])){
            header("Location: connect");
        }
    }
    
    function test(){
        $this->loadModel('Test');
        $a = $this->Test->setImma();
        var_dump($a);
    }
}
?>