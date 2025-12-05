<!DOCTYPE html>
<html lang="fr-en">

<body>
    <!-- Section Nous Contacter -->
    <section id="contact-section" class="contact-section">
        <!-- Formulaire de contact -->
        <div class="contact-form">
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
                    <input type="tel" id="telephone" name="telephone"
                        placeholder="Votre numéro de téléphone (ex: +228 12-34-56-78)" required>
                </div>

                <div class="form-group">
                    <label for="message-select">Choisissez un sujet</label>
                    <select id="message-select" name="message" required>
                        <option value="" disabled selected>-- Veuillez choisir un sujet --</option>
                        <option value="Demande d'information">Demande d'information</option>
                        <option value="Question sur la disponibilité">Question sur la disponibilité</option>
                        <option value="Conseils pour peau sèche">Conseils pour peau sèche</option>
                        <option value="Demande d'aide pour commande">Demande d'aide pour commande</option>
                        <option value="Demande de promotions">Demande de promotions</option>
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
        </div>

    </section>

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

    <!-- Fin Section Nous Contacter -->
</body>

</html>