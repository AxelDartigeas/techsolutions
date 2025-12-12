<?php
session_start();

/* ===== CONFIG ===== */
$admin_user = "admin";
$admin_pass = "admin123";

$pages = [
    "accueil"     => "accueil.php",
    "service"     => "service.php",
    "actualites"  => "actualites.php",
    "contact"     => "contact.php"
];

/* ===== FONCTIONS ===== */
function loadPage($file, $defaultTitle) {
    if (!file_exists($file)) {
        $default = [
            "title" => $defaultTitle,
            "content" => "Contenu par défaut de la page " . $defaultTitle
        ];
        file_put_contents($file, json_encode($default, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        return $default;
    }
    return json_decode(file_get_contents($file), true);
}

function savePage($file, $data) {
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

/* ===== LOGIN ===== */
if (isset($_POST["login"])) {
    if ($_POST["user"] === $admin_user && $_POST["pass"] === $admin_pass) {
        $_SESSION["admin"] = true;
    } else {
        $error = "Identifiants incorrects";
    }
}

/* ===== LOGOUT ===== */
if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: admin.php");
    exit;
}

/* ===== PAGE SÉLECTIONNÉE ===== */
$current = $_GET["page"] ?? "accueil";
if (!isset($pages[$current])) {
    $current = "accueil";
}

/* ===== SAUVEGARDE ===== */
if (isset($_POST["save"]) && isset($_SESSION["admin"])) {
    $data = [
        "title"   => $_POST["title"],
        "content" => $_POST["content"]
    ];
    savePage($pages[$current], $data);
}

/* ===== CHARGEMENT ===== */
$data = loadPage($pages[$current], ucfirst($current));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin - Gestion des pages</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        input, textarea, button, select { width: 100%; padding: 10px; margin: 5px 0; }
        .box { max-width: 700px; margin: auto; background: #f5f5f5; padding: 20px; }
        .nav a { margin-right: 10px; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<div class="box">

<?php if (!isset($_SESSION["admin"])): ?>

    <!-- ===== LOGIN ===== -->
    <h2>Connexion Administrateur</h2>
    <?php if (!empty($error)) echo "<p style='color:red'>$error</p>"; ?>
    <form method="post">
        <input type="text" name="user" placeholder="Utilisateur" required>
        <input type="password" name="pass" placeholder="Mot de passe" required>
        <button type="submit" name="login">Connexion</button>
    </form>

<?php else: ?>

    <!-- ===== ADMIN PANEL ===== -->
    <h2>Panneau d'administration</h2>
    <a href="?logout=1">Déconnexion</a>

    <div class="nav" style="margin:15px 0;">
        <a href="accueil.php">Accueil</a>
        <a href="services.php">Service</a>
        <a href="actualites.php">Actualités</a>
        <a href="contact.php">Contact</a>
    </div>

    <h3>Modifier la page : <?= ucfirst($current) ?></h3>

    <form method="post">
        <input type="text" name="title" value="<?= htmlspecialchars($data["title"]) ?>" required>
        <textarea name="content" rows="10"><?= htmlspecialchars($data["content"]) ?></textarea>
        <button type="submit" name="save">Enregistrer</button>
    </form>

<?php endif; ?>

</div>

</body>
</html>