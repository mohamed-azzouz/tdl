<?php

    class user extends bdd
    {

        private $id = NULL;
        private $login = NULL;
        private $password = NULL;

        public function inscription($login, $password, $confirmPassword, $bdd)
        {
            if (strlen($login) != 0 && strlen($password) != 0 && strlen($confirmPassword) != 0) 
            {
                if ($password == $confirmPassword ) 
                {

                    $user = $bdd->execute("SELECT login FROM user WHERE login = '$login'");
                    

                    if (empty($user)) 
                    {
                        $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

                        $newUser = $bdd->executeonly("INSERT INTO user (login, password) VALUES ('$login', '$password')");
                       
                        return "userCheck";

                    }
                    else
                    {
                        return "userExist";
                    }
                    
                    
                }
                else
                {
                   return "mdpFaux"; 
                }
               
            }
            else
            {
               return "logVide";  
            }
        }

        public function connexion($login,$password, $bdd)
        {
           
            $log = $bdd->execute("SELECT * FROM user WHERE login = '$login'");
            
            

            if(!empty($log))
            {
                if($login == $log[0][1])
                {
                    if(password_verify($password,$log[0][2]))
                    {
                        $_SESSION['id'] = $log[0][0];
                        $_SESSION['login'] = $log[0][1] ; 

                        header('Location:todolist.php');
                    }
                    else
                    {
                        echo "<span class='erreur'>Mot de passe incorrect</span>";
                    }
                }
                
            }
            else
            {
               echo "<span class='erreur'>Ce login n'existe pas</span>";
            }
        }

        public function newTdl($idUser, $nom, $dateCreation, $dateAccompli, $etat, $bdd)
        {
            $ajout = $bdd->execute("SELECT * FROM tdl WHERE nom = '$nom'");

            if (empty($ajout)) 
            {
                $newTache = $bdd->execute("INSERT INTO tdl (id_utilisateur, nom, dateCreation, dateAccompli, etat) VALUES ('$idUser', '$nom', '$dateCreation', '$dateAccompli', 'etat')");
            }
        }
    }
?>