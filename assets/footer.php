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
                  <a href="tel:+17204454634">
                 <p><i class="fas fa-phone" style="margin-right:6px;"></i>+1 720 445 4634</p>
                </a>
                <a href="https://wa.me/+923165116612" target="_blank">
                    <p><i class="fas fa-message" style="margin-right:6px;"></i>Whatsapp</p>
                </a>

            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#why-us">Why Choose Us</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contact">Contact</a></li> 
                </ul>
            </div>
            <div class="footer-section">
                <h3>Our Services</h3>
                <ul class="footer-links">
                    <li><a href="#services">Claims Processing</a></li>
                    <li><a href="#services">Denial Management</a></li>
                    <li><a href="#services">Patient Billing</a></li>
                    <li><a href="#services">A/R Management</a></li>
                    <li><a href="#services">Credentialing</a></li>
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
                <p><i class="fas fa-map-marker-alt"></i> 1500 N Grant St STE 28340<br>Denver, CO 80203, US</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 MedLinkAnalysis LLC | Development <a href="https://digicellinternational.github.io/" target="_blank">Digicells</a> | <a href="<?php echo $base_url; ?>privacy-policy.php">Privacy Policy</a> | <a href="<?php echo $base_url; ?>terms-and-conditions.php">Terms of Service</a></p>
        </div>
    </footer>
    
     <script>
    // Magnetic Field Effect
    class InteractiveBackground {
        constructor() {
            this.canvas = document.getElementById('particleCanvas');
            this.ctx = this.canvas.getContext('2d');
            
            this.mouse = { x: 0, y: 0, vx: 0, vy: 0, px: 0, py: 0 };
            this.particles = [];
            this.particleCount = 300; // Reduced for better performance
            this.intensity = 0.8; // Reduced intensity
            this.influence = 0.8; // Reduced influence
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
            const baseHue = 200; // Blue base hue
            const hueVariation = 20; // Limited variation for consistent blue
            
            for (let i = 0; i < this.particleCount; i++) {
                this.particles.push({
                    x: Math.random() * this.canvas.width,
                    y: Math.random() * this.canvas.height,
                    vx: Math.random() * 1.5 - 0.75, // Slower movement
                    vy: Math.random() * 1.5 - 0.75,
                    size: Math.random() * 2 + 0.5, // Slightly smaller
                    hue: baseHue + Math.sin(i * 0.08) * hueVariation, // Blue range
                    saturation: 70, // Your logo's saturation
                    lightness: 50, // Your logo's lightness
                    alpha: Math.random() * 0.4 + 0.3 // More transparent
                });
            }
        }
        
        updateParticles() {
            this.time += 0.008; // Slower animation
            
            // Clear canvas with darker background
            this.ctx.fillStyle = 'rgba(10, 10, 10, 0.1)';
            this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);
            
            this.particles.forEach((p, i) => {
                // Magnetic field effect
                const centerX = this.canvas.width / 2;
                const centerY = this.canvas.height / 2;
                const angle = Math.atan2(p.y - centerY, p.x - centerX);
                p.vx = Math.cos(angle + this.time) * 0.25; // Slower movement
                p.vy = Math.sin(angle + this.time) * 0.25;
                
                // Mouse influence
                if (this.mouse.x && this.mouse.y) {
                    const dx = this.mouse.x - p.x;
                    const dy = this.mouse.y - p.y;
                    const distance = Math.sqrt(dx * dx + dy * dy);
                    const maxDist = 200 * this.influence; // Reduced influence radius
                    
                    if (distance < maxDist) {
                        const force = (maxDist - distance) / maxDist;
                        const angle = Math.atan2(dy, dx);
                        p.vx += Math.cos(angle) * force * this.intensity * 2; // Reduced force
                        p.vy += Math.sin(angle) * force * this.intensity * 2;
                    }
                }
                
                // Apply velocity and damping
                p.vx *= 0.97; // More damping
                p.vy *= 0.97;
                p.x += p.vx;
                p.y += p.vy;
                
                // Bounce off edges
                if (p.x < 0 || p.x > this.canvas.width) p.vx *= -0.7;
                if (p.y < 0 || p.y > this.canvas.height) p.vy *= -0.7;
                p.x = Math.max(0, Math.min(this.canvas.width, p.x));
                p.y = Math.max(0, Math.min(this.canvas.height, p.y));
                
                // Update color - keeping in blue range
                p.hue = (200 + Math.sin(this.time * 0.5 + i * 0.02) * 15) % 360;
                
                // Adjust lightness for dark/light blue variations
                let lightness = 40 + Math.sin(this.time * 0.3 + i * 0.05) * 15;
                lightness = Math.max(30, Math.min(65, lightness)); // Keep in blue range
                
                // Draw particle with blue shades
                this.ctx.beginPath();
                this.ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
                
                // Choose between dark blue and your logo blue
                if (Math.random() > 0.7) {
                    // Dark blue particles (30% of particles)
                    this.ctx.fillStyle = `hsla(210, 80%, ${lightness * 0.7}%, ${p.alpha * 0.6})`;
                } else {
                    // Your logo blue particles (70% of particles)
                    this.ctx.fillStyle = `hsla(200, 72%, 52%, ${p.alpha * 0.8})`; // Your logo color #31ADDE = hsl(200, 72%, 52%)
                }
                
                this.ctx.fill();
                
                // Draw connections with your brand blue
                this.particles.slice(i + 1, i + 8).forEach((p2) => {
                    const dx = p.x - p2.x;
                    const dy = p.y - p2.y;
                    const distance = Math.sqrt(dx * dx + dy * dy);
                    
                    if (distance < 100) { // Reduced connection distance
                        const opacity = (1 - distance / 100) * 0.3 * this.intensity;
                        this.ctx.beginPath();
                        this.ctx.moveTo(p.x, p.y);
                        this.ctx.lineTo(p2.x, p2.y);
                        // Use your exact brand blue color with gradient opacity
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
    
    // Initialize effect
    new InteractiveBackground();

    // Mobile Menu Toggle
    function toggleMenu() {
        const navLinks = document.getElementById('navLinks');
        navLinks.classList.toggle('active');
    }

    function closeMenu() {
        const navLinks = document.getElementById('navLinks');
        navLinks.classList.remove('active');
    }

    // Form Submission
    // Form Submission
function handleSubmit(event) {
    event.preventDefault();
    
    const loading = document.getElementById('loading');
    const successMessage = document.getElementById('successMessage');
    const form = document.getElementById('contactForm');
    
    loading.classList.add('active');
    
    const formData = new FormData(form);
    
    // Determine if this is homepage or contact page
    const isHomepage = window.location.pathname === '/' || 
                       window.location.pathname.includes('index');
    formData.append('source', isHomepage ? 'homepage' : 'contact_page');
    
    // Send to submit_contact.php via AJAX
    fetch('submit_contact.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        loading.classList.remove('active');
        
        if (data.success) {
            successMessage.classList.add('active');
            form.reset();
            
            // Hide success message after 5 seconds
            setTimeout(() => {
                successMessage.classList.remove('active');
            }, 5000);
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        loading.classList.remove('active');
        alert('An error occurred. Please try again.');
        console.error('Error:', error);
    });
}

    // Smooth Scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>
</body>
</html