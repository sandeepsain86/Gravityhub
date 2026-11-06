<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Company Info -->
            <div class="footer-col footer-about">
                <img class="site-logo footer-logo" src="assets/images/gravity-hub-logo.png" srcset="<?php echo webp_image_srcset('assets/images/gravity-hub-logo.png'); ?>" alt="Gravity Hub" width="1520" height="652" loading="lazy" decoding="async">
                <p class="footer-desc">Practical technical services for electrical equipment, energy-monitoring devices, installation, maintenance, and related tasks.</p>
                <div class="footer-social">
                    <a href="#!" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#!" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#!" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    <a href="https://www.instagram.com/zypli_" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                </div>
                <div class="footer-app-downloads" aria-label="App download options">
                    <span class="footer-app-title">Get the app</span>
                    <div class="footer-app-links">
                        <span class="footer-app-link" aria-disabled="true">
                            <i class="bi bi-android2" aria-hidden="true"></i>
                            <span><strong>Android</strong><small>Coming soon</small></span>
                        </span>
                        <span class="footer-app-link" aria-disabled="true">
                            <i class="bi bi-apple" aria-hidden="true"></i>
                            <span><strong>iOS</strong><small>Coming soon</small></span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-col footer-links">
                <h6 class="footer-title">Quick Links</h6>
                <ul class="footer-list">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="request-service.php">Request a Service</a></li>
                </ul>
            </div>

            <!-- Services Links -->
            <div class="footer-col footer-services">
                <h6 class="footer-title">Our Services</h6>
                <ul class="footer-list">
                    <?php foreach ($services ?? [] as $service): ?>
                    <li><a href="services.php#<?php echo htmlspecialchars($service['id']); ?>" class="footer-link-soft"><?php echo htmlspecialchars($service['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-col footer-contact">
                <h6 class="footer-title">Contact Information</h6>
                <ul class="footer-list contact-list">
                    <li><i class="bi bi-telephone"></i> <span>Phone: <a href="tel:+919983498888">+91 99834 98888</a></span></li>
<li><i class="bi bi-whatsapp"></i> <span>WhatsApp: <a href="https://wa.me/919983498888" target="_blank">+91 99834 98888</a></span></li>
                    <li><i class="bi bi-envelope"></i> <span>Email: <a href="mailto:gravityhubautomation@gmail.com">gravityhubautomation@gmail.com</a></span></li>
                    <li><i class="bi bi-geo-alt"></i> <span>Address: To be confirmed</span></li>
                    <li><i class="bi bi-clock"></i> <span>Hours: Contact us to confirm availability</span></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="footer-copyright">&copy; <?php echo date('Y'); ?> EnergyHub Services. All rights reserved.</p>
            <p class="footer-disclaimer small text-muted">Service scope and availability are confirmed case by case.</p>
        </div>
    </div>
</footer>

<!-- WhatsApp Floating Button -->
<a href="https://wa.me/919983498888?text=Hello%20EnergyHub%2C%20I%20need%20help%20with%20my%20device"
   class="whatsapp-float"
   target="_blank"
   rel="noopener"
   aria-label="Chat with us on WhatsApp">
    <svg viewBox="0 0 24 24" width="26" height="26" fill="currentColor" aria-hidden="true">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
    </svg>
    <span class="whatsapp-tooltip">Chat with us</span>
</a>