<?php require_once "global_components/success.php" ?>
<h2>Log in</h2>
<form action="" onsubmit="return false" method="post">
    <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control" id="email" name="usrn" placeholder="Enter email" required type="email">
        <div class="invalid-feedback">Ongeldig email</div>
    </div>
    <div class="form-group">
        <label for="pwd">Wachtwoord:</label>
        <input class="form-control" id="pwd" name="pswd" placeholder="Enter password" required type="password">
        <div class="invalid-feedback">Wachtwoord en email komen niet overeen</div>
    </div>
    <div class="form-group form-check">
        <label class="form-check-label">
            <input class="form-check-input" name="remember" type="checkbox"> Blijf ingelogd
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <button class="btn btn-primary">Wachtwoord vergeten?</button>
</form>
<p>Heeft u nog geen account? <a href="index.php?view=register">Registreer hier</a>.</p>