<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\CategoryManager;
    use Model\Managers\PostManager;
    use Model\Managers\UserManager;
    
    class SecurityController extends AbstractController implements ControllerInterface{


        public function index(){

        }

        // function qui renvoi la view login.php
        public function registerForm(){

            return [
                "view" => VIEW_DIR."security/login.php",
                "data" => null,
            ];

        }

        // function pour enregistrer un compte en BDD
        public function register(){

            // Si $_POST n'est pas vide alors SANITIZE 
            if(!empty($_POST))
            {


                $nickname = filter_input(INPUT_POST , "pseudo" , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $password = filter_input(INPUT_POST , "password" , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $confirmPassword = filter_input(INPUT_POST , "confirmPassword" , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST , "email" , FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);

                // Si les 3 variables sont valide
                if($nickname && $password && $email ){

                    // On verifie que $password correspond au $confirmPassword et que le password fait minimum 8 caract.
                    if(($password == $confirmPassword) and strlen($password) >= 8) {

                        // On instancie la classe UserManager
                        $manager = new UserManager() ;

                        // On cherche dans la BDD si le pseudo est déjà enregistré ?? 
                        $user = $manager->findOneByPseudo($nickname);

                        // Si c'est OK
                        if(!$user){

                            // Alors on HASH le password via la fonction native de php (On aurais pu utiliser BCRYPT aussi)
                            $hash = password_hash($password, PASSWORD_DEFAULT );

                            // On fait appel a la fonction ADD du manager pour inserer dans la BDD les données suivantes 
                            if($manager->add([
                                    "pseudo" => $nickname,
                                    "mail" => $email,
                                    "password" => $hash,
                            ])){
                                // Return un qu'on est bien inscrit et la vue du login.php
                                return [
                                    var_dump("vous êtes bien inscrit"),
                                    "view" => VIEW_DIR."security/login.php",
                                    "data" => null,
                                ];
                    
                            }
                        }
    
                    }
                }

            }
            // Deuxième redirection sinon erreur 
            return [
                "view" => VIEW_DIR."security/login.php",
                "data" => null,
            ];
        }
    }
