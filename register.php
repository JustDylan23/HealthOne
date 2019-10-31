<?php
$errorMsg = "";

$REQUEST_IS_POST = $_SERVER["REQUEST_METHOD"] == "POST";
if ($REQUEST_IS_POST) {
    $email = filter_input(INPUT_POST, "email");

    if (!empty($username)) {
        $db = DBConnection::getConnection();
        if ($query = $db->prepare("SELECT id FROM users WHERE email = :email")) {
            $query->bindParam("email", $email);
            $query->execute();
            if ($query->rowCount() == 1) {
                $errorMsg = "Er bestaat al een gebruiker met dit email";
            } else {
                $password = filter_input(INPUT_POST, "pswd");
                if (!empty($password)) {

                }
            }
        }
    }
}
?>

<h2>Registreer</h2>
<p>Please fill this form to create an account.</p>
<form action="" method="post" autocomplete="off">
    <div class="form-group">
        <label>Gebruikersnaam</label>
        <input class="form-control <?= null ?? "" ?>"
               name="usrn"
               required
               type="text"
               value="<?= $_POST["usrn"] ?? "" ?>"
        >
        <span class="invalid-feedback">Gebruikersnaam word al gebruikt</span>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input class="form-control"
               name="email"
               required
               type="text"
               value="<?= $_POST["email"] ?? "" ?>"
        >
        <span class="invalid-feedback">Email word al gebruikt</span>
    </div>
    <div class="form-group">
        <label>Voornaam</label>
        <input class="form-control"
               name="first_name"
               required
               type="text"
               value="<?= $_POST["first_name"] ?? "" ?>"
        >
    </div>
    <div class="form-group">
        <label>Tussenvoegsels</label>
        <input class="form-control"
               name="middle_name"
               required
               type="text"
               value="<?= $_POST["middle_name"] ?? "" ?>"
        >
    </div>
    <div class="form-group">
        <label>Achternaam</label>
        <input class="form-control"
               name="last_name"
               required
               type="text"
               value="<?= $_POST["last_name"] ?? "" ?>"
        >
    </div>
    <div class="form-group">
        <label>Telefoon nummer</label>
        <input class="form-control"
               name="tel"
               required
               type="text"
               value="<?= isset($_POST["tel"]) ?? "" ?>"
        >
    </div>
    <div class="form-group">
        <label>Password</label>
        <input class="form-control"
               name="pswd"
               required
               type="password"
               value="<?= $_POST["pswd"] ?? "" ?>"
        >
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password"
               name="pswc"
               required
               class="form-control"
               value="<?= $_POST["pswc"] ?? "" ?>"
        >
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" value="Submit">Verstuur</button>
        <button type="reset" class="btn btn-default" value="Reset">Reset</button>
    </div>
</form>
<p>Heeft u al een account? <a href="index.php">Login hier in</a>.</p>
