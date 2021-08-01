<?php
function connecter_db()
{
    try {

        $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $cnx;
    } catch (PDOException $e) {
        // header("location:index.php?m=uniq");
        echo "  erreur  de connexion   " . $e->getMessage();
    }
}
// checker('admin','nimda')
function checker($login, $passe)
{
    try {
        $cnx = connecter_db();
        $r = $cnx->prepare("select * from user  where login=? and passe =? ");

        $r->execute([$login, $passe]);
        $user = $r->fetch();

        if (!empty($user)) {
            demarrer_session();
            if ($user['activation'] == 1) {
                $_SESSION['login'] = $login;
                $_SESSION['passe'] = $passe;
                $_SESSION['pseudo'] = $user['pseudo'];
                return true;
            }else {
                header("location:login.php?cn=act");
                die();
            }
        } else {
            return false;
        }
    } catch (PDOException $e) {
        // header("location:index.php?m=uniq");
        echo "  erreur checker  " . $e->getMessage();
    }
}

function demarrer_session()
{
    if (!isset($_SESSION)) {
        session_start();
        session_regenerate_id();
    }
}
function fermer_session()
{  demarrer_session();
   session_destroy();
}
//set_flash('erreur,...)
function set_flash($message)
{
    demarrer_session();
    $_SESSION['notice'] = $message;
}
function get_flash()
{
    demarrer_session();
    if (isset($_SESSION['notice'])) {
        echo    $_SESSION['notice'];
        unset($_SESSION['notice']);
    }
}
