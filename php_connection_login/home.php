<?php
session_start();

if(!isset($_SESSION['id'])) {
    $_SESSION['error'] = 'U moet eerst inloggen om toegang te krijgen!';
    header('Location: login.php');
    exit(0);
}

include_once('templates/header.html');
?>

    <!-- <h1>Home</h1> -->

    <!-- <p>U bent ingelogd onder de naam:</p> -->

    <div class="container-fluid">
        <div class="row">
            <div class="home-page-content1 col-lg-9 col-md-9 col-sm-12 pb-5">
                <h1 class="header mt-5">Hallo <?= //$_SESSION['username'] ?></h1>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem beatae iste omnis explicabo quibusdam eligendi. Facilis nostrum repellat repellendus eum quasi, similique quos accusantium minima voluptatem facere a sit vitae.
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus natus, voluptatum error sit deleniti ipsa, enim assumenda in fuga delectus, eveniet cum quam. Neque, placeat quas autem id architecto totam!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum aperiam quia laboriosam voluptatibus provident a dolorem, quisquam rem recusandae voluptatem ducimus, voluptates repellat, sequi vero consequatur iure animi corporis magni!
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi necessitatibus quibusdam voluptatem pariatur corporis nam quod, aliquid ducimus excepturi voluptas, quo autem libero illum ea tempora, voluptatibus doloremque natus ullam?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis ab non minus cupiditate voluptate numquam. Dolor quasi, corrupti, adipisci, fuga iste sapiente nulla blanditiis nihil quos quisquam necessitatibus possimus! Eligendi.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, natus molestias ullam suscipit quasi fugiat sunt vitae nulla reiciendis doloremque alias maiores tempora inventore, unde eum voluptatem numquam eligendi quo.
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga inventore numquam atque consectetur cupiditate ratione ipsam exercitationem nam nihil aspernatur. Totam adipisci hic cupiditate autem nihil, odit numquam maxime facere!
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit voluptatem mollitia assumenda! In dolorum, quia harum nam consequuntur eum ipsum blanditiis, quis officiis corporis rem. Sint modi quisquam molestiae dolores?
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi necessitatibus quibusdam voluptatem pariatur corporis nam quod, aliquid ducimus excepturi voluptas, quo autem libero illum ea tempora, voluptatibus doloremque natus ullam?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis ab non minus cupiditate voluptate numquam. Dolor quasi, corrupti, adipisci, fuga iste sapiente nulla blanditiis nihil quos quisquam necessitatibus possimus! Eligendi.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, natus molestias ullam suscipit quasi fugiat sunt vitae nulla reiciendis doloremque alias maiores tempora inventore, unde eum voluptatem numquam eligendi quo.
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga inventore numquam atque consectetur cupiditate ratione ipsam exercitationem nam nihil aspernatur. Totam adipisci hic cupiditate autem nihil, odit numquam maxime facere!            
            </div>
            <div class="home-page-content2 col-lg-3 col-md-3 col-sm-12">
                <h1 class="header mt-5">Saldo</h1>
                    Uw saldo is: &euro;15,33<?php //hier komt de session saldo ?>
                    <br><br>Wilt u opwaarderen neem dan contact op met de Admin.
             </div>
        </div>
    </div>

<?php
    include_once('templates/footer.php');
?>