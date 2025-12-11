<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedLink Analytics - Professional Medical Billing Services</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   
</head>
<body>
    <canvas id="particleCanvas"></canvas>

    <!-- Header -->
    <?php include './assets/header.php'; ?>

    <!-- Services Section -->
    <section id="services">
        <div class="section-header">
            <h2>Comprehensive Billing Solutions</h2>
            <p>End-to-end revenue cycle management tailored to your practice's unique needs</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <h3>Claims Processing</h3>
                <p>Streamlined submission with 98% first-pass acceptance rate</p>
                <ul>
                    <li>Accurate coding (ICD-10, CPT)</li>
                    <li>Electronic submission</li>
                    <li>Real-time tracking</li>
                    <li>Quick turnaround (24-48h)</li>
                </ul>
                <a href="/contact" class="btn btn-primary" style="margin-top: 1rem; width: 100%; text-align: center;">Learn More</a>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-ban"></i>
                </div>
                <h3>Denial Management</h3>
                <p>Proactive strategies to prevent and resolve claim denials</p>
                <ul>
                    <li>Root cause analysis</li>
                    <li>Appeal preparation</li>
                    <li>Trend monitoring</li>
                    <li>Revenue recovery</li>
                </ul>
                <a href="/contact" class="btn btn-primary" style="margin-top: 1rem; width: 100%; text-align: center;">Learn More</a>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Patient Billing</h3>
                <p>Clear, compassionate patient financial experience</p>
                <ul>
                    <li>Transparent statements</li>
                    <li>Payment plan options</li>
                    <li>Patient portal access</li>
                    <li>Billing inquiries support</li>
                </ul>
                <a href="/contact" class="btn btn-primary" style="margin-top: 1rem; width: 100%; text-align: center;">Learn More</a>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>A/R Management</h3>
                <p>Accelerate cash flow with expert receivables recovery</p>
                <ul>
                    <li>Aging analysis</li>
                    <li>Follow-up protocols</li>
                    <li>Collection strategies</li>
                    <li>Financial reporting</li>
                </ul>
                <a href="/contact" class="btn btn-primary" style="margin-top: 1rem; width: 100%; text-align: center;">Learn More</a>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <h3>Credentialing</h3>
                <p>Seamless provider enrollment and verification</p>
                <ul>
                    <li>Insurance enrollment</li>
                    <li>License verification</li>
                    <li>Re-credentialing support</li>
                    <li>Database maintenance</li>
                </ul>
                <a href="/contact" class="btn btn-primary" style="margin-top: 1rem; width: 100%; text-align: center;">Learn More</a>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h3>Analytics & Reporting</h3>
                <p>Data-driven insights for informed decisions</p>
                <ul>
                    <li>Custom dashboards</li>
                    <li>KPI tracking</li>
                    <li>Revenue forecasting</li>
                    <li>Actionable insights</li>
                </ul>
                <a href="/contact" class="btn btn-primary" style="margin-top: 1rem; width: 100%; text-align: center;">Learn More</a>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <h3>Digital Marketing</h3>
                <p>Grow your practice with strategic online presence</p>
                <ul>
                    <li>SEO optimization</li>
                    <li>Social media management</li>
                    <li>Content marketing</li>
                    <li>Online reputation management</li>
                </ul>
                <a href="/contact" class="btn btn-primary" style="margin-top: 1rem; width: 100%; text-align: center;">Learn More</a>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3>System Automation</h3>
                <p>Streamline workflows with intelligent automation</p>
                <ul>
                    <li>Practice management integration</li>
                    <li>Automated appointment reminders</li>
                    <li>Electronic health records sync</li>
                    <li>Workflow optimization</li>
                </ul>
                <a href="/contact" class="btn btn-primary" style="margin-top: 1rem; width: 100%; text-align: center;">Learn More</a>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php include 'assets/footer.php'; ?>
    <script>
        // Magnetic Field Effect
        class InteractiveBackground {
            constructor() {
                this.canvas = document.getElementById('particleCanvas');
                this.ctx = this.canvas.getContext('2d');
                
                this.mouse = { x: 0, y: 0, vx: 0, vy: 0, px: 0, py: 0 };
                this.particles = [];
                this.particleCount = 500;
                this.intensity = 1.0;
                this.influence = 1.0;
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
                for (let i = 0; i < this.particleCount; i++) {
                    this.particles.push({
                        x: Math.random() * this.canvas.width,
                        y: Math.random() * this.canvas.height,
                        vx: Math.random() * 2 - 1,
                        vy: Math.random() * 2 - 1,
                        size: Math.random() * 2.5 + 0.5,
                        hue: 180 + Math.sin(i * 0.08) * 40,
                        alpha: Math.random() * 0.5 + 0.5
                    });
                }
            }
            
            updateParticles() {
                this.time += 0.01;
                
                // Clear canvas
                this.ctx.fillStyle = 'rgba(17, 17, 17, 0.05)';
                this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);
                
                this.particles.forEach((p, i) => {
                    // Magnetic field effect
                    const centerX = this.canvas.width / 2;
                    const centerY = this.canvas.height / 2;
                    const angle = Math.atan2(p.y - centerY, p.x - centerX);
                    p.vx = Math.cos(angle + this.time) * 0.3;
                    p.vy = Math.sin(angle + this.time) * 0.3;
                    
                    // Mouse influence
                    if (this.mouse.x && this.mouse.y) {
                        const dx = this.mouse.x - p.x;
                        const dy = this.mouse.y - p.y;
                        const distance = Math.sqrt(dx * dx + dy * dy);
                        const maxDist = 250 * this.influence;
                        
                        if (distance < maxDist) {
                            const force = (maxDist - distance) / maxDist;
                            const angle = Math.atan2(dy, dx);
                            p.vx += Math.cos(angle) * force * this.intensity * 3;
                            p.vy += Math.sin(angle) * force * this.intensity * 3;
                        }
                    }
                    
                    // Apply velocity and damping
                    p.vx *= 0.95;
                    p.vy *= 0.95;
                    p.x += p.vx;
                    p.y += p.vy;
                    
                    // Bounce off edges
                    if (p.x < 0 || p.x > this.canvas.width) p.vx *= -0.8;
                    if (p.y < 0 || p.y > this.canvas.height) p.vy *= -0.8;
                    p.x = Math.max(0, Math.min(this.canvas.width, p.x));
                    p.y = Math.max(0, Math.min(this.canvas.height, p.y));
                    
                    // Update color
                    p.hue = (180 + Math.sin(this.time + i * 0.08) * 40) % 360;
                    
                    // Draw particle
                    this.ctx.beginPath();
                    this.ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
                    this.ctx.fillStyle = `hsla(${p.hue}, 70%, 60%, ${p.alpha})`;
                    this.ctx.fill();
                    
                    // Draw connections
                    this.particles.slice(i + 1, i + 6).forEach((p2) => {
                        const dx = p.x - p2.x;
                        const dy = p.y - p2.y;
                        const distance = Math.sqrt(dx * dx + dy * dy);
                        
                        if (distance < 120) {
                            const opacity = (1 - distance / 120) * 0.4 * this.intensity;
                            this.ctx.beginPath();
                            this.ctx.moveTo(p.x, p.y);
                            this.ctx.lineTo(p2.x, p2.y);
                            this.ctx.strokeStyle = `rgba(49, 173, 222, ${opacity})`;
                            this.ctx.lineWidth = 1;
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
        function handleSubmit(event) {
            event.preventDefault();
            
            const loading = document.getElementById('loading');
            const successMessage = document.getElementById('successMessage');
            const form = document.getElementById('contactForm');
            
            loading.classList.add('active');
            
            const formData = new FormData(form);
            const data = {
                name: formData.get('name'),
                email: formData.get('email'),
                practice: formData.get('practice') || 'Not provided',
                phone: formData.get('phone') || 'Not provided',
                message: formData.get('message')
            };
            
            // Create mailto link
            const subject = encodeURIComponent('Service Inquiry from ' + data.name);
            const body = encodeURIComponent(
                `Name: ${data.name}\n` +
                `Email: ${data.email}\n` +
                `Practice: ${data.practice}\n` +
                `Phone: ${data.phone}\n\n` +
                `Message:\n${data.message}`
            );
            
            // Simulate sending delay
            setTimeout(() => {
                loading.classList.remove('active');
                successMessage.classList.add('active');
                form.reset();
                
                // Open email client
                window.location.href = `mailto:contact@medlinkanalytics.com?subject=${subject}&body=${body}`;
                
                // Hide success message after 5 seconds
                setTimeout(() => {
                    successMessage.classList.remove('active');
                }, 5000);
            }, 1000);
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