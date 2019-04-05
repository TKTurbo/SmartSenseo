<?php
session_start();

// if(!isset($_SESSION['id'])) {
//     $_SESSION['error'] = 'U moet eerst inloggen om toegang te krijgen!';
//     header('Location: login.php');
//     exit(0);
// }

?>

<!-- BEGIN ERROR -->
<div class="container">
    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION['error']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- TODO: geschikt voor refactoring -->
        <?php unset($_SESSION['error']) ?>
    <?php endif; ?>
<!-- EINDE ERROR -->

<!-- BEGIN SUCCES -->
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['success']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- TODO: geschikt voor refactoring -->
        <?php unset($_SESSION['success']) ?>
    <?php endif; ?>
</div>
<!-- EINDE SUCCES -->

<div class="container">
    <h1 class="page-header mt-2">
        Admin
    </h1>
    <p>Hier kan ik alle gebruikers aanmaken</p>
</div>

<div id="registreren" class="mb-5">
    <form method="post" action="register/register_user.php" name="register">
        <label class="mt-3">Gebruiksnaam:</label>
        <input type="text" name="username" class="col-12" placeholder="Gebruikersnaam" required><br>
        <label>Email:</label>
        <input type="email" name="email" class="col-12" placeholder="someone@gmail.com" required><br>
        <label>Wachtwoord</label>
        <input type="password" name="password" class="col-12" placeholder="Wachtwoord" required><br>
        <button class="btn btn-success col-12">Registreren</button>
    </form>
</div>

<?php 
session_unset();