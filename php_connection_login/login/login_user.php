<?php 
session_start();

if(isset($_SESSION['error'])): ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['error'] ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
    
    <div id="login">
        <form method="post" action="login/login.php" name="login">
            <label class="mt-2">Email:</label>
            <input type="email" name="email" class="col-12" placeholder="someone@gmail.com" required><br>
            <label>Wachtwoord</label>
            <input type="password" name="password" class="col-12" placeholder="Wachtwoord" required><br>
            <button class="btn btn-success col-12">Login</button>
        </form>
    </div>
</body>
</html>

<?php
if(isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}