<?php
require_once "utilities/Securite.class.php";
require_once "models/Admin.dao.class.php";

class BackendController
{

    private $adminManager;

    public function __construct()
    {
        $this->adminManager = new AdminManager();
    }

    public function getPageLogin()
    {
        $title = "Page de login du site";
        $description = "Page de login";

        if (isset($_SESSION['acces']) && !empty($_SESSION['acces']) && $_SESSION['acces'] === "admin") {

            session_destroy();
            header("Location: accueil");
        }

        $alert = "";
        if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])) {

            $login = Securite::secureHTML($_POST['login']);
            $password = Securite::secureHTML($_POST['password']);

            // On vérifie le mot de passe (hash) et
            // on génère une session (initialisée dans index.php)
            if ($this->adminManager->isConnexionValid($login, $password)) {

                $_SESSION['acces'] = "admin";

                // Pour sécuriser la variable de session, 
                // on génère un tiket (cookie)
                Securite::genereCookiePassword();

                // Route ?
                if (isset($_SESSION['view']) && $_SESSION['view'] === "accueil") {
                    header("Location: accueil");
                }

                if (isset($_SESSION['view']) && $_SESSION['view'] === "auteurs") {
                    header("Location: auteurs");
                }

                if (isset($_SESSION['view']) && $_SESSION['view'] === "livres") {
                    header("Location: livres");
                }
            } else $alert = "Mot de passe invalide";
        }
        require_once "views/login.view.php";
    }
}
