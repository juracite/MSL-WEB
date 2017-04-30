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
            if($id_con_user == $id_con[0]){
                $a['nom_prenom_user'] = $this->Personnels->getPersonnelNomPrenomById($id_con[0]);
                $a['infos_user'] = $personnel_info;
                $a['user_vehicule'] = $personnel_vehicule;
                $a['user_vehicule_infos'] = $personnel_vehicule_info;
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

    function test(){
        $this->loadModel('Test');
        $a = $this->Test->setImma();
        var_dump($a);
    }
}
?>