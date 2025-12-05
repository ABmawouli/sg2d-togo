<?php
// === CONFIGURATION UTF-8 ===
mb_internal_encoding("UTF-8");
mb_http_output("UTF-8");

// En-tête HTTP JSON avec charset UTF-8
header('Content-Type: application/json; charset=UTF-8');

// === CHARGEMENT DES LIBRAIRIES ===
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/mon-vendor/vendor/autoload.php';
require_once __DIR__ . '/../../../mon_config/config.php';

session_start();

// === MESSAGE DE CONTACT ===
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    try {
        if (!isset($_POST['nom'], $_POST['telephone'], $_POST['message'], $_POST['details'])) {
            echo json_encode(["success" => false, "message" => "Formulaire incomplet."]);
            exit;
        }

        $nom = htmlspecialchars($_POST['nom']);
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $telephone = htmlspecialchars($_POST['telephone']);
        $sujet = htmlspecialchars($_POST['message']);
        $details = nl2br(htmlspecialchars($_POST['details']));

        // === EMAIL ADMIN ===
        $mailAdmin = new PHPMailer(true);
        $mailAdmin->CharSet = 'UTF-8'; // 🔥 Important
        $mailAdmin->isSMTP();
        $mailAdmin->Host = 'smtp.gmail.com';
        $mailAdmin->SMTPAuth = true;
        $mailAdmin->Username = MAIL_USERNAME;
        $mailAdmin->Password = MAIL_PASSWORD;
        $mailAdmin->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mailAdmin->Port = 587;

        $mailAdmin->setFrom(MAIL_USERNAME, 'Message Site Web GEOSPACE TOGO');
        $mailAdmin->addAddress(ADMIN_EMAIL);
        if (!empty($email)) $mailAdmin->addReplyTo($email, $nom);

        $mailAdmin->isHTML(true);
        $mailAdmin->Subject = 'Nouveau message de contact';
        $mailAdmin->Body = "
            <h3>Message de $nom</h3>
            <p><strong>Email :</strong> " . (!empty($email) ? $email : 'Non fourni') . "</p>
            <p><strong>Téléphone :</strong> $telephone</p>
            <p><strong>Sujet :</strong><br>$sujet</p>
            <p><strong>Message :</strong><br>$details</p>
        ";
        $mailAdmin->send();

        // === EMAIL CLIENT ===
        if (!empty($email)) {
            $mailClient = new PHPMailer(true);
            $mailClient->CharSet = 'UTF-8'; // 🔥 Important
            $mailClient->isSMTP();
            $mailClient->Host = 'smtp.gmail.com';
            $mailClient->SMTPAuth = true;
            $mailClient->Username = MAIL_USERNAME;
            $mailClient->Password = MAIL_PASSWORD;
            $mailClient->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mailClient->Port = 587;

            $mailClient->setFrom(MAIL_USERNAME, 'GEOSPACE TOGO');
            $mailClient->addAddress($email, $nom);
            $mailClient->isHTML(true);
            $mailClient->Subject = 'Confirmation de réception de votre message';
            $mailClient->Body = "
                <p>Bonjour <strong>$nom</strong>,</p>
                <p>Votre message a bien été envoyé.</p>
                <p><strong>Sujet :</strong><br>$sujet</p>
                <p><strong>Message :</strong><br>$details</p>
                <p>Cordialement,<br>L’équipe GEOSPACE TOGO</p>
            ";
            $mailClient->send();
        }

        echo json_encode(["success" => true, "message" => "Votre message a bien été envoyé."]);
        exit;

    } catch (Exception $e) {
        echo json_encode(["success" => false, "message" => "Une erreur est survenue : " . $e->getMessage()]);
        exit;
    }
}

// === ACTION NON RECONNUE ===
echo json_encode(["success" => false, "message" => "Aucune donnée valide reçue."]);
