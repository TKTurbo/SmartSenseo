<?php
session_start();

include_once('../helpers/db.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $wachtwoord = $_POST['password'];

    if(dbConnect()) {
        dbQuery( "SELECT * FROM gebruikers 
        WHERE email = :email", [':email' => $email]
        );

        if(dbCount() == 0) {
            // User bestaat niet, dus we kunnen niet inloggen
            $_SESSION['error'] = 'Email en/of wachtwoord combinatie is fout!';
            header('Location: ../login.php');
            exit(0);
        //anders gaan wij de de else in 
        }

        $user = dbGet();

        dbQuery( "SELECT id FROM gebruikers 
        WHERE username = :username", [':username' => $username]
        );

        if(){
            // hier gaat hij naar de admin page
            header('Location: admin.php');
            exit(0);
        }else{
            if(password_verify($wachtwoord, $user['password'])) {
                // Gebruiker bestaat al
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['users'];
                // $_SESSION['success_inloggen'] = 'U bent correct ingelogd';
                header('Location: ../home.php');
                exit(0);//invoegen als je een header hebt, want wij willen dan dat onze code niet verder gaat
            } else {
                //nier goed ingevoerd dan gaan wij naar de login pagina
                // User bestaat niet, dus we kunnen niet inloggen
                $_SESSION['error'] = 'Gebruiker niet gevonden!';
                header('Location: ../login.php');
                exit(0);
            }
        }
    }
}