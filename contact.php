<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <title>Nous contacter - SG2D</title>

    <style>
        /* Contact info */
        .contact-item {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .contact-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .contact-item i {
            margin-right: 10px;
        }

        /* Formulaire */
        .contact-form input,
        .contact-form textarea {
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border 0.3s, box-shadow 0.3s;
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            border-color: #6f42c1;
            box-shadow: 0 0 5px rgba(111, 66, 193, 0.3);
            outline: none;
        }

        /* Bouton */
        .contact-btn {
            background-color: #6f42c1;
            color: #fff;
            padding: 10px 25px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .contact-btn:hover {
            background-color: #5936a0;
        }

        .section-title {
            margin-bottom: 40px;
        }

        .underline {
            width: 50px;
            height: 3px;
            background-color: #6f42c1;
            margin: 20px auto 0;
        }

        .contact-section {
            display: flex;
            justify-content: space-between;
            gap: 40px;
        }

        .contact-item h4 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .contact-item p {
            font-size: 1rem;
        }

        .contact-form {
            max-width: 500px;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <div id="header-placeholder">
        <?php include 'header.php'; ?>
    </div>

    <!-- Section : Contact -->
    <div class="container py-5">
        <div class="section-title text-center">
            <h1>Nous contacter</h1>
            <div class="underline"></div>
        </div>

        <section class="contact p-4 contact-section">
            <!-- Infos de contact -->
            <div class="col-md-5">
                <div class="contact-item">
                    <h4><i class="fas fa-map-marker-alt"></i> Adresse</h4>
                    <p>
                        Muncup 004/001 Cokrowati<br>
                        Kec Tambakboyo Tuban, Jatim
                    </p>
                </div>
                <div class="contact-item">
                    <h4><i class="fas fa-envelope"></i> E-mail</h4>
                    <p><a href="mailto:mr.danangharissetiawan@gmail.com">mr.danangharissetiawan@gmail.com</a></p>
                </div>
                <div class="contact-item">
                    <h4><i class="fas fa-phone"></i> Téléphone</h4>
                    <p><a href="tel:+628817043533">+62 881 7043 533</a></p>
                </div>
            </div>

            <!-- Formulaire -->
            <div class="col-md-7">
                <h3>Envoyez-nous un message</h3>
                <form method="POST" action="submit-form.php">
                    <div class="mb-3">
                        <input type="text" placeholder="Nom" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" placeholder="E-mail" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <textarea placeholder="Votre message" class="form-control" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="contact-btn">Envoyer</button>
                </form>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <div id="footer-placeholder">
        <?php include 'footer.php'; ?>
    </div>

    <script src="./js/popper.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>
