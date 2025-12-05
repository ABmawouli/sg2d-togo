<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <title>Contact - GEOSPACE TOGO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <?php echo head_contents(); ?>
  <?php echo $metatags; ?>

  <!-- Polices Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Exo+2:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
  <!-- FontAwesome pour les icônes -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <link href="<?php echo theme_path(); ?>css/barlow.css" rel="stylesheet">
  <link rel="stylesheet" id="genericons-css" href="<?php echo theme_path(); ?>genericons/genericons.css" type="text/css" media="all" />
  <link rel="stylesheet" href="<?php echo theme_path(); ?>css/style.css" type="text/css" media="all">
  <!-- CSS GEOSPACE TOGO - Charte Graphique -->
  <link rel="stylesheet" href="<?php echo theme_path(); ?>css/maison/mon_style.css">
  <link rel="stylesheet" href="<?php echo theme_path(); ?>css/maison/autrepage_style.css">

  <!-- Mon favicon personnalisé -->
  <link rel="icon" href="<?php echo theme_path(); ?>mes-includes/images/logo-2.jpeg" type="image/jpeg">
  <link rel="shortcut icon" href="<?php echo theme_path(); ?>mes-includes/images/logo-2.jpeg" type="image/jpeg">

  <!-- Forcer le favicon après head_contents() -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var link = document.querySelector("link[rel~='icon']");
      if (link) {
        link.href = "<?php echo theme_path(); ?>mes-includes/images/logo-2.jpeg";
      } else {
        link = document.createElement('link');
        link.rel = 'icon';
        link.href = "<?php echo theme_path(); ?>mes-includes/images/logo-2.jpeg";
        document.head.appendChild(link);
      }
    });
  </script>

  <script type="text/javascript" src="<?php echo theme_path(); ?>js/jquery.js" id="jquery-core-js"></script>
 
</head>

<body>
  <div id="header-placeholder">
    <?php include 'mes-includes/header.php'; ?>
  </div>
  <!-- Hero Section -->
  <section class="hero-contact">
    <div class="container">
      <h1>Contactez-Nous</h1>
      <p>Nous sommes à votre écoute pour toute question ou collaboration</p>
    </div>
  </section>

  <section id="contact-section" class="contact-section">
    <div class="container" style="display: flex; flex-wrap: wrap; gap: 2rem;">

      <!-- FORMULAIRE À GAUCHE -->
      <div class="contact-form" style="flex: 1 1 450px; min-width: 300px;">
        <h3>Envoyez-nous un message</h3>
        <form id="contactForm">
          <div class="form-group">
            <label for="nom">Nom complet</label>
            <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Votre email">
          </div>
          <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="tel" id="telephone" name="telephone" placeholder="Votre numéro" required>
          </div>
          <div class="form-group">
            <label for="message-select">Choisissez un sujet</label>
            <select id="message-select" name="message" required>
              <option value="" disabled selected>-- Veuillez choisir un sujet --</option>
              <option value="Demande d'information générale">Demande d'information générale</option>
              <option value="Demande d’adhésion / Rejoindre l'organisation">Demande d’adhésion / Rejoindre l'organisation</option>
              <option value="Information sur nos événements / soirées d’observation">Information sur nos événements</option>
              <option value="Questions sur les observations astronomiques">Questions sur les observations astronomiques</option>
              <option value="Conseils sur le matériel astronomique">Conseils sur le matériel astronomique</option>
              <option value="Demande de collaboration ou partenariat scientifique">Demande de collaboration</option>
              <option value="Informations sur nos ateliers / formations en astronomie">Formations / Ateliers</option>
              <option value="Demande d’intervention pour écoles / institutions">Intervention écoles / institutions</option>
              <option value="Autre demande">Autre demande</option>
            </select>
          </div>
          <div class="form-group">
            <label for="details">Message complémentaire</label>
            <textarea id="details" name="details" placeholder="Votre message" rows="5" required></textarea>
          </div>

          <div id="loading-indicator" style="display:none; color: #007bff;">Envoi en cours...</div>
          <div id="notification" style="display:none; color:#fff; background:#28a745; padding:10px; margin-top:10px;"></div>

          <button type="reset">Tout supprimer</button>
          <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
      </div>

      <!-- INFOS À DROITE -->
      <div class="contact-info" style="flex: 1 1 300px; min-width: 250px;">
        <h3>Nos Coordonnées</h3>
        <p><i class="fas fa-map-marker-alt"></i> Adresse : Rue de l’Observatoire, Lomé, Togo</p>
        <p><i class="fas fa-phone"></i> Téléphone : +228 90 12 34 56</p>
        <p><i class="fas fa-envelope"></i> Email : contact@geospacetogo.tg</p>
        <h4>Horaires d'ouverture</h4>
        <p>Lundi - Vendredi : 08h00 - 17h00</p>
        <p>Samedi : 09h00 - 13h00</p>
        <p>Observatoire : Mercredi - Dimanche : 14h00 - 22h00</p>
        <p style="font-size:0.85rem;">(Séances nocturnes jusqu'à minuit le samedi)</p>
        <h4>Réseaux sociaux</h4>
        <p>
          <a href="#"><i class="fab fa-facebook-square fa-lg"></i></a>
          <a href="#"><i class="fab fa-twitter-square fa-lg"></i></a>
          <a href="#"><i class="fab fa-instagram-square fa-lg"></i></a>
        </p>
      </div>

    </div>
  </section>


  <!-- Section Horaires -->
  <section class="hours-section">
    <div class="container">
      <div class="section-title">
        <h2>Horaires d'Ouverture</h2>
        <div class="underline"></div>
      </div>

      <div class="hours-grid">
        <div class="hours-card">
          <i class="fas fa-building"></i>
          <h3>Bureau Administratif</h3>
          <p><span class="highlight">Lundi - Vendredi</span></p>
          <p>8h00 - 17h00</p>
          <p><span class="highlight">Samedi</span></p>
          <p>9h00 - 13h00</p>
        </div>

        <div class="hours-card">
          <i class="fas fa-telescope"></i>
          <h3>Observatoire</h3>
          <p><span class="highlight">Mercredi - Dimanche</span></p>
          <p>14h00 - 22h00</p>
          <p style="font-size: 0.85rem; margin-top: 0.5rem;">(Séances nocturnes jusqu'à minuit le samedi)</p>
        </div>

        <div class="hours-card">
          <i class="fas fa-chalkboard-teacher"></i>
          <h3>Formations & Ateliers</h3>
          <p><span class="highlight">Sur réservation</span></p>
          <p>Tous les jours</p>
          <p style="font-size: 0.85rem; margin-top: 0.5rem;">(Groupes scolaires, étudiants, grand public)</p>
        </div>

        <div class="hours-card">
          <i class="fas fa-star"></i>
          <h3>Événements Spéciaux</h3>
          <p><span class="highlight">Nuits des Étoiles</span></p>
          <p>Premier samedi du mois</p>
          <p><span class="highlight">Conférences</span></p>
          <p>Dernier vendredi du mois</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Section FAQ -->
  <section class="faq-section">
    <div class="container">
      <div class="section-title">
        <h2>Questions Fréquentes</h2>
        <div class="underline"></div>
      </div>

      <div class="faq-container">
        <div class="faq-item">
          <div class="faq-question">
            <h4>Comment puis-je visiter l'observatoire ?</h4>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">
            <p>Les visites de l'observatoire sont ouvertes au public du mercredi au dimanche de 14h à 22h. Nous recommandons de réserver à l'avance, surtout pour les groupes. Les visites guidées durent environ 2 heures et incluent une présentation théorique et une séance d'observation aux télescopes.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h4>Proposez-vous des formations pour les enseignants ?</h4>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">
            <p>Oui ! Nous organisons régulièrement des formations pour les enseignants du primaire et du secondaire. Ces formations couvrent l'astronomie de base, les méthodes pédagogiques pour enseigner les sciences spatiales, et l'utilisation d'outils d'observation. Contactez-nous pour connaître les prochaines dates.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h4>Quels sont les tarifs pour les activités ?</h4>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">
            <p>Les tarifs varient selon l'activité : visite simple (2000 FCFA), visite guidée avec observation (3500 FCFA), ateliers pour enfants (5000 FCFA), formations professionnelles (sur devis). Les écoles publiques bénéficient de tarifs préférentiels. Certaines activités publiques comme les Nuits des Étoiles sont gratuites.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h4>Peut-on organiser un événement privé dans vos locaux ?</h4>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">
            <p>Absolument ! Nous accueillons des événements privés : anniversaires thématiques, soirées d'entreprise, team building scientifique, etc. Notre équipe peut personnaliser l'expérience selon vos besoins. Contactez-nous pour discuter de votre projet et obtenir un devis.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h4>Comment devenir bénévole ou membre de GEOSPACE TOGO ?</h4>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">
            <p>Nous accueillons toujours des passionnés d'astronomie ! Pour devenir bénévole, remplissez le formulaire de contact en précisant vos compétences et votre disponibilité. Pour l'adhésion comme membre, nous proposons différentes formules (étudiant, individuel, famille) avec des avantages exclusifs. Plus d'informations sur notre page "À Propos".</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <div id="footer-placeholder">
    <?php include __DIR__ . '/mes-includes/footer.php'; ?>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const contactForm = document.getElementById('contactForm');
      const loadingIndicator = document.getElementById('loading-indicator');
      const notification = document.getElementById('notification');

      if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
          e.preventDefault();

          const nom = document.getElementById('nom').value.trim();
          const email = document.getElementById('email').value.trim();
          const telephone = document.getElementById('telephone').value.trim();
          const message = document.getElementById('message-select').value.trim();
          const details = document.getElementById('details').value.trim();

          if (!nom || !telephone || !message || !details) {
            alert("Veuillez remplir tous les champs obligatoires.");
            return;
          }

          loadingIndicator.style.display = 'block';

          const formData = new FormData();
          formData.append('nom', nom);
          formData.append('email', email);
          formData.append('telephone', telephone);
          formData.append('message', message);
          formData.append('details', details);

          const baseURL = document.body.getAttribute("data-base-url") || "";
          fetch("/geospace-togo/themes/theme_geospace/mes-includes/traitement-contact.php", {
              method: 'POST',
              body: formData
            })

            .then(res => res.json())
            .then(data => {
              loadingIndicator.style.display = 'none';
              notification.style.display = 'block';

              if (data.success) {
                notification.style.background = '#28a745';
                notification.innerText = data.message || "✅ Message envoyé avec succès.";
                contactForm.reset();
              } else {
                notification.style.background = '#dc3545';
                notification.innerText = "❌ " + (data.message || "Une erreur est survenue.");
              }

              setTimeout(() => {
                notification.style.display = 'none';
              }, 6000);
            })
            .catch(error => {
              loadingIndicator.style.display = 'none';
              notification.style.display = 'block';
              notification.style.background = '#dc3545';
              notification.innerText = "Erreur d'envoi, veuillez réessayer plus tard.";
              console.error("Fetch error:", error); // Pour debug côté console, optionnel
            });

        });
      }
    });
  </script>

  <script>
    // Gestion FAQ accordéon
    document.querySelectorAll('.faq-question').forEach(question => {
      question.addEventListener('click', function() {
        const faqItem = this.parentElement;
        const isActive = faqItem.classList.contains('active');

        // Fermer tous les autres items
        document.querySelectorAll('.faq-item').forEach(item => {
          item.classList.remove('active');
        });

        // Toggle l'item cliqué
        if (!isActive) {
          faqItem.classList.add('active');
        }
      });
    });
  </script>

</body>

</html>