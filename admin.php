<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/header.php';

session_start();


// ---- CONFIG ----
$PASSWORD = "admin123";
$PAGES = [
"index.php" => "Accueil",
"actualites.php" => "Actualités",
"services.php" => "Services",
"contact.php" => "Contact"
];


// ---- LOGIN HANDLING ----
if (isset($_POST['password'])) {
if ($_POST['password'] === $PASSWORD) {
$_SESSION['admin'] = true;
} else {
$error = "Mot de passe incorrect";
}
}


// ---- SAVE CHANGES ----
if (isset($_SESSION['admin'], $_POST['page'], $_POST['content'])) {
$page = $_POST['page'];
if (array_key_exists($page, $PAGES)) {
file_put_contents($page, $_POST['content']);
$message = "Page mise à jour avec succès";
}
}

// ---- LOGOUT ----
if (isset($_GET['logout'])) {
session_destroy();
header("Location: admin.php");
exit;
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Administration</title>
<style>
body { font-family: Arial, sans-serif; margin: 0px; }
textarea { width: 100%; height: 500px; }
.login-box { width: 300px; margin: 150px auto; }
</style>
</head>
<body>


<?php if (!isset($_SESSION['admin'])): ?>


<div class="login-box">
<h2>Connexion Admin</h2>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST">
<label>Mot de passe :</label><br>
<input type="password" name="password" required><br><br>
<button type="submit">Se connecter</button>
</form>
</div>


<?php else: ?>


<h1>Panneau d'administration</h1>
<p><a href="?logout=1">Se déconnecter</a></p>


<?php if (!empty($message)) echo "<p style='color:green;'>$message</p>"; ?>


<form method="POST">
<label>Choisir une page à modifier :</label><br>
<select name="page" onchange="this.form.submit()">
<option value="">-- Sélectionner --</option>
<?php
foreach ($PAGES as $file => $label) {
$selected = (isset($_POST['page']) && $_POST['page'] === $file) ? 'selected' : '';
echo "<option value='$file' $selected>$label ($file)</option>";
}
?>
</select>
</form>


<?php if (isset($_POST['page']) && array_key_exists($_POST['page'], $PAGES)): ?>
<?php $content = htmlspecialchars(file_get_contents($_POST['page'])); ?>


<h2>Modifier : <?= $PAGES[$_POST['page']] ?></h2>


<form method="POST">
<input type="hidden" name="page" value="<?= $_POST['page'] ?>">
<textarea name="content"><?= $content ?></textarea>
<br><br>
<button type="submit">Enregistrer</button>
</form>
<?php endif; ?>


<?php endif; ?>


</body>
</html>