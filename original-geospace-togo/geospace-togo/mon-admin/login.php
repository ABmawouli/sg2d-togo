<?php
session_start();

// Charger config.php une seule fois
require_once __DIR__ . '/../mon_config/config.php'; // Ajuster selon ton arborescence
// Ensuite, utiliser BASE_PATH pour tous les autres includes
require_once BASE_PATH . 'mon_config/connection_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $query = "SELECT * FROM utilisateurs WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $utilisateur = $stmt->fetch();

    if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
        if ($utilisateur['role'] == 'admin') {
            $_SESSION['admin'] = true;
            if (isset($_SESSION['redirect_after_login'])) {
                $redirectUrl = $_SESSION['redirect_after_login'];
                unset($_SESSION['redirect_after_login']);
                header("Location: $redirectUrl");
            } else {
                header("Location: dashboard_principal/dashboard_principal.php");
            }
            exit();
        } else {
            $message = "Vous n'avez pas les droits administrateur.";
        }
    } else {
        $message = "Email ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion Administrateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('../images/Background.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(5px);
            text-align: center;
        }

        .form-container img.logo {
            width: 80px;
            margin-bottom: 15px;
        }

        h2 {
            color: #333;
            margin-bottom: 25px;
            font-size: 1.5em;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1em;
            transition: border 0.3s;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .lien-boutique {
            display: block;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }

        .lien-boutique:hover {
            text-decoration: underline;
        }

        .error-message {
            margin-top: 15px;
            color: #dc3545;
            font-weight: bold;
            text-align: center;
        }

        @media screen and (max-width: 480px) {
            .form-container {
                padding: 20px;
            }

            h2 {
                font-size: 1.2em;
            }
        }
    </style>

    <div class="form-container">
        <img src="logo-1.jpeg" alt="admin icon" class="logo">
        <h2>Connexion</h2>

        <form action="login.php" method="post">
            <label for="email">Adresse e-mail :</label>
            <input type="email" name="email" id="email" required>

            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" required>

            <button type="submit">Se connecter</button>

            <a href="../index.php" class="lien-boutique">← Retour à la boutique</a>
        </form>

        <?php if (isset($message)) : ?>
            <p class="error-message"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
    </div>

</body>

</html>