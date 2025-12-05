<?php
define('BASE_PATH', dirname(__DIR__) . '/');
define('IMAGES_PATH', BASE_PATH . 'themes/theme_geospace/mes-includes/images/');
define('BASE_URL', '/geospace-togo/');
define('IMAGES_URL', BASE_URL . 'themes/theme_geospace/mes-includes/images/');

// Mettre le fuseau horaire du Togo
date_default_timezone_set('Africa/Lome');

// Configuration globale erreurs/logs (à adapter si déjà configuré ailleurs)
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../fichiers/php_error.log');

// Gestion personnalisée des erreurs
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    error_log("Erreur PHP [$errno] : $errstr dans $errfile à la ligne $errline");
});

// Gestion des exceptions non capturées
set_exception_handler(function ($exception) {
    error_log(
        "Exception non capturée : " . $exception->getMessage() .
        " dans " . $exception->getFile() .
        " à la ligne " . $exception->getLine()
    );
});

// 3. Définition des constantes (exemple)
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'test_geospace_db');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

define('ADMIN_NAME', 'mawouli');
define('ADMIN_EMAIL', 'abalomawouli15@gmail.com');
define('ADMIN_PASSWORD', 'mawouli1234');
define('ADMIN_ROLE', 'admin');

define('MAIL_USERNAME', 'mawouliabalo.dclic.dev24@gmail.com');
define('MAIL_PASSWORD', 'ufazhopotspahzpx');


// Configuration PDO (exemple — adapte selon ta config)
$host = DB_HOST;
$db   = DB_NAME;
$user = DB_USER;
$pass = DB_PASSWORD;
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Connexion à la base avec gestion des erreurs friendly pour utilisateur
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // L'erreur est loggée automatiquement par set_exception_handler

    // Message simple côté utilisateur
    http_response_code(503);
    echo "<h1>Site en maintenance</h1>";
    echo "<p>merci de revenir plus tard.</p>";

    exit();
}


// 4. Gestion des erreurs fatales (ex: erreurs de syntaxe ou constantes non définies)
register_shutdown_function(function () {
    $error = error_get_last();
    if ($error !== null) {
        error_log("Erreur fatale : {$error['message']} dans {$error['file']} à la ligne {$error['line']}");
    }
});
