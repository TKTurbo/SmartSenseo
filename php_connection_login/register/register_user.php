<?php
    // session engine
    session_start();

    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        // echo "niet toegestaan!";
        header('Location: ../index.php');
        die();
    } else {
        // hier de data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        /*eerst connectie(met db)
        verplicht try catch*/
        try {
            // probeer connectie te maken
            $db_connectie = new PDO(
                    'mysql:host=127.0.0.1;
                     dbname=scn',
                    'root','');//connectie is klaar
            
            // query samenstellen
            $db_query = $db_connectie->prepare(
                "SELECT * FROM gebruikers 
                    WHERE username = :gebruikersnaam
                    AND email = :email"
            );

            // uitvoeren query van de db-server
            $db_query->execute([//vervangen placeholders
                ':gebruikersnaam' => $username,
                ':email' => $email
            ]);

            //controleren of die al bestaat ||met de rowcount telt hij het
        //    $found_user = $db_query->fetch(PDO::FETCH_ASSOC);
        //    echo empty($found_user);
        //    echo ($db_query->rowCount() > 0 ? 'Gevonden' : 'Leeg');
        //    die();
            if($db_query->rowCount() > 0){
                /* hier wordt eerst getoond dat de gebruiker een fout heeft.
                   dus eerst tonen */ 
                $_SESSION['error'] = 'Gebruiker en/of email bestaat al!';
                header('Location: ../admin.php');
                exit(0);//hier wordt de code gestopt, anders wordt mijn website/server trager
            }
    
            /*hier bestaat de user niet
            daarna breng ik de user naar de login page*/
            try{
                $db_query = $db_connectie->prepare(
                    "INSERT INTO gebruikers(username, email, password) VALUES(:gebruikersnaam, :email, :password)"
                );

                // hier de gehashed wachtwoord
                $password = password_hash($password, PASSWORD_DEFAULT);//een hash password

                $result = $db_query->execute([
                    ':gebruikersnaam'=> $username,
                    ':email' => $email,
                    ':password' => $password//de gehashte password
                ]);

                // hier wordt getoond als de result niet goed en/of niet bestaat dit uitvoeren
                if(!$result){
                    echo "\nPDO::errorInfo():\n";
                    print_r($db_query->errorInfo());
                } else {
                    // anders wordt dit uitgevoerd
                    $_SESSION['success'] = 'De gebruikers-account is succesvol aangemaakt';
                    header('Location: ../admin.php');
                    exit(0);
                }

            }catch(PDOExecption $error){
                echo 'ERROR: ' . $error->getMessage();
                die();
            }
            

        } catch(PDOException $error){//dan vang je hem anders op || error voor de error
            echo 'ERROR: ' . $error->getMessage();
            die();
        }

        // header('Location: ../../login.php');

    }