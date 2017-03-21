<?php
    if (isset($_COOKIE['id_con']) or isset($_COOKIE['id_user'])) {
        unset($_COOKIE['id_con']);
        unset($_COOKIE['id_user']);
        setcookie('id_con', null, -1, '/');
        setcookie('id_user', null, -1, '/');
        var_dump($_COOKIE);
        if(isset($username[0])){
            header("Location: connect?username="+$username[0]);
        }else{
            header("Location: connect");
        }
        return true;
    } else {
        if(isset($username[0])){
            header("Location: connect?username="+$username[0]);
        }else{
            header("Location: connect");
        }
        return false;
    }
?>