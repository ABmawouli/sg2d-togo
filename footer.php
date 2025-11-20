<footer class="section newsletter" id="newsletter">
  <div class="container section-center newsletter-center">
    
    <!-- Liens utiles -->
    <ul class="footer-links" style="list-style:none; padding:0; margin-bottom:20px; display:flex; flex-wrap:wrap; justify-content:center; gap:20px;">
      <li><a href="index.php" style="color:#fff; text-decoration:none;">Accueil</a></li>
      <li><a href="about.php" style="color:#fff; text-decoration:none;">À propos</a></li>
      <li><a href="contact.php" style="color:#fff; text-decoration:none;">Contact</a></li>
      <li><a href="blog.php" style="color:#fff; text-decoration:none;">Blog</a></li>
      <li><a href="galerie.php" style="color:#fff; text-decoration:none;">Galerie</a></li>
    </ul>

    <!-- Icônes sociales -->
    <ul class="social-icons" style="list-style:none; padding:0; display:flex; justify-content:center; gap:15px; margin-bottom:10px;">
      <li><a href="https://www.facebook.com" class="social-icon" style="color:#fff;"><i class="fab fa-facebook"></i></a></li>
      <li><a href="https://www.linkedin.com" class="social-icon" style="color:#fff;"><i class="fab fa-linkedin"></i></a></li>
      <li><a href="https://www.instagram.com" class="social-icon" style="color:#fff;"><i class="fab fa-instagram"></i></a></li>
    </ul>

    <!-- Numéros de téléphone -->
    <div class="footer-contacts" style="margin-bottom:15px;">
      <p style="margin:0;">Téléphone : <a href="tel:+22891234567" style="color:#fff; text-decoration:none;">+228 91 23 45 67</a> | <a href="tel:+22890123456" style="color:#fff; text-decoration:none;">+228 90 12 34 56</a></p>
    </div>

    <!-- Copyright -->
    <p style="margin-top:10px;">&copy; <span id="date"></span> GEOSPACE TOGO. Tous droits réservés.</p>
  </div>
</footer>

<script>
  // Mettre à jour automatiquement l'année
  document.getElementById("date").textContent = new Date().getFullYear();
</script>
