<form action="action.php?name=edit_account" method="post" autocomplete="off">
    <input type="hidden" name="id" value="<?php $_GET["id"]?>">
    <div class="form-group">
        <label for="username">Gebruikersnaam</label>
        <input type="text" class="form-control" name="username" value="Omar" required>
    </div>
    <div class="form-group">
        <label for="oldPassword">Oude wachtwoord</label>
        <input type="password" class="form-control" name="oldPassword" required>
    </div>
    <div class="form-group">
        <label for="newPassword">Nieuwe wachtwoord</label>
        <input type="password" class="form-control" name="newPassword" required>
    </div>
    <br>
    <div class="row">
        <div class="col-md-8">
            <button type="submit" class="btn btn-primary btn-block">Opslaan</button>
        </div>
        <div class="col-md-4">
            <a href="index.php?view=account&page=info" class="btn btn-danger btn-block"><i class="fas fa-sign-out-alt"></i> Terug</a>
        </div>
    </div>
</form>