<?php
// ============================================================
// Healthcare Resources - Footer Include
// ============================================================

// Define base URL if not already defined
$base_url = $base_url ?? (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . '/';
?>

    <!-- ============================================================ -->
    <!-- Site Footer -->
    <!-- ============================================================ -->
    <style>
        .footer-section a {
            text-decoration: none !important;
        }
    </style>
    
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>MedLink Analytics</h3>
                <p>Professional medical billing services designed to maximize your revenue and minimize your administrative burden.</p>
                <p><i class="fas fa-envelope"></i> contact@medlinkanalytics.com</p>
                <a href="tel:+17207803128">
                    <p><i class="fas fa-phone" style="margin-right:6px;"></i>+1 (720) 780-3128</p>
                </a>
                <a href="https://wa.me/+923165116612" target="_blank">
                    <p><i class="fas fa-message" style="margin-right:6px;"></i>Whatsapp</p>
                </a>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="<?php echo $base_url; ?>">Home</a></li>
                    <li><a href="<?php echo $base_url; ?>services">Services</a></li>
                    <li><a href="<?php echo $base_url; ?>#why-us">Why Choose Us</a></li>
                    <li><a href="<?php echo $base_url; ?>about">About Us</a></li>
                    <li><a href="<?php echo $base_url; ?>contact">Contact</a></li>
                    <li><a href="<?php echo $base_url; ?>healthcare-resources/">Healthcare Resources</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Our Services</h3>
                <ul class="footer-links">
                    <li><a href="<?php echo $base_url; ?>services/rcm/medical-billing">Claims Processing</a></li>
                    <li><a href="<?php echo $base_url; ?>services/rcm/denial-management">Denial Management</a></li>
                    <li><a href="<?php echo $base_url; ?>services/rcm">Patient Billing</a></li>
                    <li><a href="<?php echo $base_url; ?>services/rcm/ar-management">A/R Management</a></li>
                    <li><a href="<?php echo $base_url; ?>services/rcm/credentialing">Credentialing</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact Us</h3>
                <a href="https://www.linkedin.com/company/medlinkanalytics" target="_blank" style="text-decoration:none; color:inherit;">
                    <p><i class="fab fa-linkedin" style="margin-right:6px;"></i>@medlinkanalytics</p>
                </a>
                <a href="https://www.facebook.com/medlinkanalytics/" target="_blank" style="text-decoration:none; color:inherit;">
                    <p><i class="fab fa-facebook" style="margin-right:6px;"></i>@medlinkanalytics</p>
                </a>
                <a href="https://www.instagram.com/medlinkanalytics" target="_blank" style="text-decoration:none; color:inherit;">
                    <p><i class="fab fa-instagram" style="margin-right:6px;"></i>@medlinkanalytics</p>
                </a>
                <a href="https://www.youtube.com/@medlinkanalytics" target="_blank" style="text-decoration:none; color:inherit;">
                    <p><i class="fab fa-youtube" style="margin-right:6px;"></i>@medlinkanalytics</p>
                </a>
                <p><i class="fas fa-map-marker-alt"></i> 1500 N Grant St 28340<br>Denver, CO 80203, US</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© <?php echo date('Y'); ?> MedLinkAnalysis LLC | Development <a href="https://digicellinternational.github.io/" target="_blank">Digicells</a> | <a href="<?php echo $base_url; ?>privacy-policy.php">Privacy Policy</a> | <a href="<?php echo $base_url; ?>terms-and-conditions.php">Terms of Service</a></p>
        </div>
    </footer>

    <!-- ============================================================ -->
    <!-- JavaScript - Background Effect & Mobile Menu -->
    <!-- ============================================================ -->
    <script>
        // Magnetic Field Effect
        class InteractiveBackground {
            constructor() {
                this.canvas = document.getElementById('particleCanvas');
                this.ctx = this.canvas.getContext('2d');
                
                this.mouse = { x: 0, y: 0, vx: 0, vy: 0, px: 0, py: 0 };
                this.particles = [];
                this.particleCount = 300;
                this.intensity = 0.8;
                this.influence = 0.8;
                this.time = 0;
                
                this.init();
                this.createParticles();
                this.animate();
            }
            
            init() {
                this.resize();
                window.addEventListener('resize', () => this.resize());
                this.canvas.addEventListener('mousemove', (e) => this.handleMouseMove(e));
            }
            
            resize() {
                this.canvas.width = window.innerWidth;
                this.canvas.height = window.innerHeight;
                this.createParticles();
            }
            
            handleMouseMove(e) {
                this.mouse.px = this.mouse.x;
                this.mouse.py = this.mouse.y;
                this.mouse.x = e.clientX;
                this.mouse.y = e.clientY;
                this.mouse.vx = this.mouse.x - this.mouse.px;
                this.mouse.vy = this.mouse.y - this.mouse.py;
            }
            
            createParticles() {
                this.particles = [];
                const baseHue = 200;
                const hueVariation = 20;
                
                for (let i = 0; i < this.particleCount; i++) {
                    this.particles.push({
                        x: Math.random() * this.canvas.width,
                        y: Math.random() * this.canvas.height,
                        vx: Math.random() * 1.5 - 0.75,
                        vy: Math.random() * 1.5 - 0.75,
                        size: Math.random() * 2 + 0.5,
                        hue: baseHue + Math.sin(i * 0.08) * hueVariation,
                        saturation: 70,
                        lightness: 50,
                        alpha: Math.random() * 0.4 + 0.3
                    });
                }
            }
            
            updateParticles() {
                this.time += 0.008;
                
                this.ctx.fillStyle = 'rgba(10, 10, 10, 0.1)';
                this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);
                
                this.particles.forEach((p, i) => {
                    const centerX = this.canvas.width / 2;
                    const centerY = this.canvas.height / 2;
                    const angle = Math.atan2(p.y - centerY, p.x - centerX);
                    p.vx = Math.cos(angle + this.time) * 0.25;
                    p.vy = Math.sin(angle + this.time) * 0.25;
                    
                    if (this.mouse.x && this.mouse.y) {
                        const dx = this.mouse.x - p.x;
                        const dy = this.mouse.y - p.y;
                        const distance = Math.sqrt(dx * dx + dy * dy);
                        const maxDist = 200 * this.influence;
                        
                        if (distance < maxDist) {
                            const force = (maxDist - distance) / maxDist;
                            const angle = Math.atan2(dy, dx);
                            p.vx += Math.cos(angle) * force * this.intensity * 2;
                            p.vy += Math.sin(angle) * force * this.intensity * 2;
                        }
                    }
                    
                    p.vx *= 0.97;
                    p.vy *= 0.97;
                    p.x += p.vx;
                    p.y += p.vy;
                    
                    if (p.x < 0 || p.x > this.canvas.width) p.vx *= -0.7;
                    if (p.y < 0 || p.y > this.canvas.height) p.vy *= -0.7;
                    p.x = Math.max(0, Math.min(this.canvas.width, p.x));
                    p.y = Math.max(0, Math.min(this.canvas.height, p.y));
                    
                    p.hue = (200 + Math.sin(this.time * 0.5 + i * 0.02) * 15) % 360;
                    
                    let lightness = 40 + Math.sin(this.time * 0.3 + i * 0.05) * 15;
                    lightness = Math.max(30, Math.min(65, lightness));
                    
                    this.ctx.beginPath();
                    this.ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
                    
                    if (Math.random() > 0.7) {
                        this.ctx.fillStyle = `hsla(210, 80%, ${lightness * 0.7}%, ${p.alpha * 0.6})`;
                    } else {
                        this.ctx.fillStyle = `hsla(200, 72%, 52%, ${p.alpha * 0.8})`;
                    }
                    
                    this.ctx.fill();
                    
                    this.particles.slice(i + 1, i + 8).forEach((p2) => {
                        const dx = p.x - p2.x;
                        const dy = p.y - p2.y;
                        const distance = Math.sqrt(dx * dx + dy * dy);
                        
                        if (distance < 100) {
                            const opacity = (1 - distance / 100) * 0.3 * this.intensity;
                            this.ctx.beginPath();
                            this.ctx.moveTo(p.x, p.y);
                            this.ctx.lineTo(p2.x, p2.y);
                            this.ctx.strokeStyle = `rgba(49, 173, 222, ${opacity * 0.7})`;
                            this.ctx.lineWidth = 0.8;
                            this.ctx.stroke();
                        }
                    });
                });
            }
            
            animate() {
                this.updateParticles();
                requestAnimationFrame(() => this.animate());
            }
        }

        // Initialize effect only if canvas exists
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('particleCanvas')) {
                new InteractiveBackground();
            }
        });

        // Mobile Menu Toggle
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            if (navLinks) {
                navLinks.classList.toggle('active');
            }
        }

        function closeMenu() {
            const navLinks = document.getElementById('navLinks');
            if (navLinks) {
                navLinks.classList.remove('active');
            }
        }

        // Smooth Scrolling for anchor links
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const targetId = this.getAttribute('href');
                    if (targetId && targetId !== '#') {
                        const target = document.querySelector(targetId);
                        if (target) {
                            e.preventDefault();
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>