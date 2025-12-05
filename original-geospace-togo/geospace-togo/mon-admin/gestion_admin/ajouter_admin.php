<?php
session_start();
include('../../config/connection_db.php');

// 🔐 Accès admin seulement
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../login.php");
    exit;
}

$message = "";

// --- AJOUT ADMIN ---
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';
    $confirmation = $_POST['confirmer'] ?? '';
    $role = 'admin';

    if (empty($nom) || empty($email) || empty($mot_de_passe) || empty($confirmation)) {
        $message = "❌ Tous les champs sont requis.";
    } elseif ($mot_de_passe !== $confirmation) {
        $message = "❌ Les mots de passe ne correspondent pas.";
    } else {
        // Limite à 2 admins (change le 2 ici si besoin)
        $stmt = $pdo->query("SELECT COUNT(*) FROM utilisateurs WHERE role = 'admin'");
        $nbAdmins = $stmt->fetchColumn();

        if ($nbAdmins >= 2) {
            $message = "❌ Limite de 2 administrateurs atteinte.";
        } else {
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $exists = $stmt->fetchColumn();

            if ($exists > 0) {
                $message = "⚠️ Cet email est déjà utilisé.";
            } else {
                $hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe, role)
                                       VALUES (:nom, :email, :mot_de_passe, :role)");
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':mot_de_passe', $hash);
                $stmt->bindParam(':role', $role);

                if ($stmt->execute()) {
                    $message = "✅ Administrateur ajouté avec succès.";
                } else {
                    $message = "❌ Une erreur est survenue lors de l'ajout.";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un administrateur</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 40px; }
        .container { background: white; padding: 20px; max-width: 500px; margin: auto;
            border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,.1); }
        label { display: block; margin-top: 10px; }
        input, button {
            width: 100%; padding: 10px; margin-top: 5px;
            border-radius: 4px; border: 1px solid #ccc;
        }
        button {
            background-color: #007bff; color: white; border: none;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message { margin-top: 15px; color: #333; font-weight: bold; text-align: center; }
    </style>
</head>
<body>
<div class="container">
    <h2>Ajouter un administrateur</h2>

    <form method="post">
        <label>Nom :</label>
        <input type="text" name="nom" required>

        <label>Email :</label>
        <input type="email" name="email" required>

        <label>Mot de passe :</label>
        <input type="password" name="mot_de_passe" required>

        <label>Confirmer le mot de passe :</label>
        <input type="password" name="confirmer" required>

        <button type="submit">Ajouter</button>
        <a href="../dashboard_principal/dashboard_principal.php">Accueil</a>
        <a href="../gestion_admin/liste_admins.php">Liste admin</a>
    </form>

    <?php if (!empty($message)): ?>
        <p class="message"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
</div>
</body>
</html>
