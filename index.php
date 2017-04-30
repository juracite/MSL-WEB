<?php
    define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
    define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

    require(ROOT.'core/modele/model.php');
    require(ROOT.'core/controleur/controller.php');
    include(ROOT.'core/modele/dbconnect.php');
    if(isset($_GET['p']) && !empty($_GET['p'])){
        $params = explode('/', $_GET['p']);
    } else {
        header( "refresh:0;url=personnel/connect" ); 
        return false;
    }
    $controller = $params[0];
    
    $action = isset($params[1]) ? $params[1] : 'index';
    if(file_exists('controleurs/'.$controller.'.php')){
        require('controleurs/'.$controller.'.php');
        $controller = new $controller();
        if(method_exists($controller, $action)){
            //$controller->$action();
            unset($params[0]); unset($params[1]);
            call_user_func_array(array($controller, $action), $params);
        }
        else {
            echo 'Erreur 401';
        }
    } else {
        echo 'Erreur 406';
        var_dump($controller);
        var_dump($_GET['p']);
    }
?>