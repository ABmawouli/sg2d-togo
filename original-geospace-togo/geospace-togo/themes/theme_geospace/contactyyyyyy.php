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
	<link rel="stylesheet" href="/geospace-togo/css/mon_style.css">
  	<link rel="stylesheet" href="/geospace-togo/css/autrepage_style.css">

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

  <!-- Section Contact Principale -->
  <section class="contact-section">
    <div class="container">
      <div class="contact-container">
        
        <!-- Informations de contact -->
        <div class="contact-info">
          <h2>Nos Coordonnées</h2>
          
          <div class="info-item">
            <i class="fas fa-map-marker-alt"></i>
            <div class="info-content">
              <h4>Adresse</h4>
              <p>123 Avenue de l'Indépendance<br>Quartier Administratif<br>Lomé, Togo</p>
            </div>
          </div>

          <div class="info-item">
            <i class="fas fa-phone"></i>
            <div class="info-content">
              <h4>Téléphone</h4>
              <p><a href="tel:+22890123456">+228 90 12 34 56</a></p>
              <p><a href="tel:+22891234567">+228 91 23 45 67</a></p>
            </div>
          </div>

          <div class="info-item">
            <i class="fas fa-envelope"></i>
            <div class="info-content">
              <h4>Email</h4>
              <p><a href="mailto:info@geospace-togo.org">info@geospace-togo.org</a></p>
              <p><a href="mailto:contact@geospace-togo.org">contact@geospace-togo.org</a></p>
            </div>
          </div>

          <div class="info-item">
            <i class="fas fa-globe"></i>
            <div class="info-content">
              <h4>Réseaux Sociaux</h4>
              <p>
                <a href="#" style="margin-right: 1rem;"><i class="fab fa-facebook"></i> Facebook</a>
                <a href="#" style="margin-right: 1rem;"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
              </p>
            </div>
          </div>

          <!-- Carte -->
          <div class="map-container">
            <div class="map-placeholder">
              <i class="fas fa-map-marked-alt"></i>
              <p>Carte interactive<br>(Google Maps / OpenStreetMap)</p>
            </div>
          </div>
        </div>

        <!-- Formulaire de contact -->
        <div class="contact-form-container">
          <h2>Envoyez-nous un Message</h2>
          
          <form id="contactForm">
            <div class="form-row">
              <div class="form-group">
                <label for="prenom">Prénom *</label>
                <input type="text" id="prenom" name="prenom" required />
              </div>
              <div class="form-group">
                <label for="nom">Nom *</label>
                <input type="text" id="nom" name="nom" required />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required />
              </div>
              <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="tel" id="telephone" name="telephone" />
              </div>
            </div>

            <div class="form-group">
              <label for="sujet">Sujet *</label>
              <select id="sujet" name="sujet" required>
                <option value="">-- Sélectionnez un sujet --</option>
                <option value="information">Demande d'information</option>
                <option value="visite">Visite du centre</option>
                <option value="formation">Programmes de formation</option>
                <option value="partenariat">Partenariat</option>
                <option value="événement">Organisation d'événement</option>
                <option value="école">Collaboration scolaire</option>
                <option value="autre">Autre</option>
              </select>
            </div>

            <div class="form-group">
              <label for="message">Votre Message *</label>
              <textarea id="message" name="message" required></textarea>
            </div>

            <button type="submit" class="submit-btn">
              <i class="fas fa-paper-plane"></i> Envoyer le Message
            </button>

            <div class="success-message" id="successMessage">
              <i class="fas fa-check-circle"></i> 
              Merci ! Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.
            </div>
          </form>
        </div>

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
  <footer class="newsletter">
    <div class="container newsletter-center">
      <h2 style="color: var(--blanc-lunaire); margin-bottom: 1.5rem;">Restez Connectés</h2>
      
      <ul class="footer-links">
        <li><a href="index.html">Accueil</a></li>
        <li><a href="apropos.html">À Propos</a></li>
        <li><a href="galerie.html">Galerie</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>

      <ul class="social-icons">
        <li><a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#" class="social-icon"><i class="fab fa-twitter"></i></a></li>
        <li><a href="#" class="social-icon"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a></li>
        <li><a href="#" class="social-icon"><i class="fab fa-youtube"></i></a></li>
      </ul>

      <div class="footer-contacts">
        <p><i class="fas fa-map-marker-alt"></i> Lomé, Togo</p>
        <p><i class="fas fa-phone"></i> <a href="tel:+22890123456">+228 90 12 34 56</a></p>
        <p><i class="fas fa-envelope"></i> <a href="mailto:info@geospace-togo.org">info@geospace-togo.org</a></p>
      </div>

      <p style="margin-top: 2rem; border-top: 1px solid rgba(255,255,255,0.2); padding-top: 1rem;">
        &copy; 2025 GEOSPACE TOGO. Tous droits réservés. | <span class="devise">"La Terre est notre demeure, l'Espace est notre avenir"</span>
      </p>
    </div>
  </footer>

  <script>
    // Gestion du formulaire de contact
    document.getElementById('contactForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Simulation d'envoi (à remplacer par une vraie requête AJAX/fetch vers PHP)
      const successMsg = document.getElementById('successMessage');
      successMsg.classList.add('show');
      
      // Reset du formulaire après 2 secondes
      setTimeout(() => {
        this.reset();
      }, 2000);
      
      // Cacher le message après 5 secondes
      setTimeout(() => {
        successMsg.classList.remove('show');
      }, 5000);
    });

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