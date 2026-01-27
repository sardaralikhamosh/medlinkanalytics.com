<?php
// contact.php
require_once 'init.php'; // Add this line

include '../assets/header.php';
?>

 <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="section-header">
            <h2>Get Started Today</h2>
            <p>Schedule a free revenue assessment and discover how much more you could be collecting</p>
        </div>
        <div class="contact-container">
            <div class="contact-info">
                <h3>Contact Information</h3>
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h4>Email</h4>
                        <p><a href="mailto:contact@medlinkanalytics.com">contact@medlinkanalytics.com</a></p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h4>Office Address</h4>
                        <p>MedLink Analytics<br>
                        1500 N Grant St STE 28340<br>
                        Denver, Colorado CO 80203<br>
                        United States</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h4>Business Hours</h4>
                        <p>Monday - Friday: 8:00 AM - 6:00 PM MST<br>
                        Saturday - Sunday: Closed</p>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <div class="success-message" id="successMessage">
                    Thank you! Your message has been sent successfully. We'll get back to you within 24 hours.
                </div>
                <h3>Request a Consultation</h3>
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" id="name" name="name" required placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="email"></label>
                        <input type="email" id="email" name="email" required placeholder="email">
                    </div>
                    <div class="form-group">
                        <label for="practice"></label>
                        <input type="text" id="practice" name="practice" placeholder="Practice Name">
                    </div>
                    <div class="form-group">
                        <label for="phone"></label>
                        <input type="tel" id="phone" name="phone" placeholder="phone">
                    </div>
                    <div class="form-group">
                        <label for="message"></label>
                        <textarea id="message" name="message" required placeholder="message"></textarea>
                    </div>
                    <div class="loading" id="loading">
                        <i class="fas fa-spinner fa-spin"></i> Sending your message...
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Schedule Free Assessment</button>
                </form>
            </div>
        </div>
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3067.486732916832!2d-104.98758708462406!3d39.73917197944752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876c78c4276a76ef%3A0x6d9e89e6e8a4c5a!2s1500%20N%20Grant%20St%2C%20Denver%2C%20CO%2080203!5e0!3m2!1sen!2sus!4v1234567890" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

    <!-- Footer -->
    <?php include '../assets/footer.php'; ?>
