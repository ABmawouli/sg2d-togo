<?php
session_start();
include('../../config/connection_db.php');

// 🔐 Accès admin seulement
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../login.php");
    exit;
}

$message = "";

// --- SUPPRIMER ADMIN ---
if (isset($_GET['supprimer']) && is_numeric($_GET['supprimer'])) {
    $id = (int) $_GET['supprimer'];
    $stmt = $pdo->prepare("DELETE FROM utilisateurs WHERE id = :id AND role = 'admin'");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $message = "🗑️ Administrateur supprimé.";
}

// --- MODIFIER MOT DE PASSE ---
if (isset($_POST['change_password']) && isset($_POST['admin_id'])) {
    $adminId = (int) $_POST['admin_id'];
    $newPass = $_POST['new_password'] ?? '';
    $confirmPass = $_POST['confirm_password'] ?? '';

    if (empty($newPass) || empty($confirmPass)) {
        $message = "❌ Tous les champs sont requis.";
    } elseif ($newPass !== $confirmPass) {
        $message = "❌ Les mots de passe ne correspondent pas.";
    } else {
        $hash = password_hash($newPass, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE utilisateurs SET mot_de_passe = :mot_de_passe WHERE id = :id AND role = 'admin'");
        $stmt->bindParam(':mot_de_passe', $hash);
        $stmt->bindParam(':id', $adminId);
        if ($stmt->execute()) {
            $message = "✅ Mot de passe modifié avec succès.";
        } else {
            $message = "❌ Erreur lors de la modification du mot de passe.";
        }
    }
}

// --- RÉCUPÉRER LA LISTE DES ADMINS ---
$admins = $pdo->query("SELECT id, nom, email FROM utilisateurs WHERE role = 'admin' ORDER BY id ASC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des administrateurs</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 40px; }
        .container {
            background: white; padding: 20px; max-width: 800px;
            margin: auto; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,.1);
        }
        table { width: 100%; margin-top: 30px; border-collapse: collapse; }
        th, td { padding: 10px; border-bottom: 1px solid #ddd; text-align: left; }
        .supprimer, .modifier {
            color: red; text-decoration: none; font-weight: bold;
        }
        .supprimer:hover, .modifier:hover { text-decoration: underline; }
        .form-inline {
            display: flex; flex-direction: row; gap: 10px;
            margin-top: 5px;
        }
        input[type=password] {
            padding: 8px; border: 1px solid #ccc; border-radius: 4px; flex: 1;
        }
        button {
            padding: 8px 12px; background-color: #007bff; color: #fff; border: none;
            border-radius: 4px; cursor: pointer;
        }
        button:hover { background-color: #0056b3; }
        .message { margin-top: 15px; font-weight: bold; text-align: center; }
    </style>
</head>
<body>
<div class="container">
    <h2>Liste des administrateurs</h2>

    <?php if (!empty($message)): ?>
        <p class="message"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <table>
        <thead>
            <tr><th>Nom</th><th>Email</th><th>Actions</th></tr>
        </thead>
        <tbody>
        <?php foreach ($admins as $admin): ?>
            <tr>
                <td><?= htmlspecialchars($admin['nom']) ?></td>
                <td><?= htmlspecialchars($admin['email']) ?></td>
                <td>
                    <a href="?supprimer=<?= $admin['id'] ?>" class="supprimer"
                       onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>

                    <form method="post" class="form-inline">
                        <input type="hidden" name="admin_id" value="<?= $admin['id'] ?>">
                        <input type="password" name="new_password" placeholder="Nouveau mot de passe" required>
                        <input type="password" name="confirm_password" placeholder="Confirmer" required>
                        <button type="submit" name="change_password">Changer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
