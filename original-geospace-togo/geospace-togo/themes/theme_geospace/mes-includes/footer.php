 <!-- Footer -->
 <footer class="newsletter">
   <div class="container newsletter-center">
     <h2 style="color: var(--blanc-lunaire); margin-bottom: 1.5rem;">Rejoignez Notre Communauté</h2>

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
       &copy; <span id="date"></span> GEOSPACE TOGO. Tous droits réservés. |
       <span class="devise">"La Terre est notre demeure, l'Espace est notre avenir"</span>
     </p>

   </div>
 </footer>
 <!-- ============================================
         SCRIPTS JAVASCRIPT
         ============================================ -->

 <!-- Mise à jour automatique de l'année -->
 <script>
   document.getElementById("date").textContent = new Date().getFullYear();
 </script>



  <!-- Bouton Retour en Haut -->
  <a href="#" class="btn-top" title="Retour en haut">⌃</a>
  <script>
    const btnTop = document.querySelector('.btn-top');
    window.addEventListener('scroll', () => {
      btnTop.style.display = window.scrollY > 200 ? 'flex' : 'none';
    });
  </script>
  <style>
    .btn-top {
      position: fixed;
      bottom: 25px;
      right: 25px;
      background: rgba(255, 255, 255, 0.15);
      /* translucide adaptable */
      backdrop-filter: blur(6px);
      /* effet verre/futuriste */
      -webkit-backdrop-filter: blur(6px);

      color: var(--blanc-lunaire);
      border: 1px solid rgba(199, 14, 14, 0.25);

      font-size: 2rem;
      text-decoration: none;
      padding: 10px 14px;
      border-radius: 50%;

      box-shadow: 0 0 10px rgba(250, 3, 3, 0.3);

      display: flex;
      align-items: center;
      justify-content: center;

      transition: 0.3s ease;
      z-index: 999;
      font-weight: bold;
    }

    /* Hover : contraste automatique selon ton thème bleu/espace */
    .btn-top:hover {
      background: var(--bleu-espace);
      color: var(--blanc-lunaire);
      border-color: var(--bleu-espace);
      transform: scale(1.12);
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
    }
  </style>




 <!-- Screen reader text pour menu responsive -->
 <script>
   var screenReaderText = {
     "expand": "expand child menu",
     "collapse": "collapse child menu"
   };
 </script>