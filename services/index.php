<title>About Us | MedLink Analytics - Medical Billing & Revenue Cycle Experts</title>
<meta name="description" content="MedLink Analytics LLC is a Denver-based medical billing company helping healthcare providers nationwide optimize revenue, reduce administrative burden, and focus on patient care.">
<meta name="keywords" content="medical billing company, revenue cycle management, healthcare analytics, Denver Colorado, medical billing experts">
<meta property="og:title" content="About Us | MedLink Analytics">
<meta property="og:description" content="Denver-based medical billing and healthcare analytics company serving providers nationwide with integrity, excellence, and compliance.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://medlinkanalytics.com/about">
<meta property="og:image" content="https://medlinkanalytics.com/assets/media/images/og-image.jpg">

<!-- Header -->
<?php include 'assets/header.php'; ?>

<style>
/* About Page Specific Styles - Matching medlinkanalytics.com theme */
.about-hero {
    padding: 60px 0 40px;
    background: transparent;
    position: relative;
    z-index: 10;
    text-align: center;
}

.about-hero h1 {
    font-size: 3.2rem;
    font-weight: 800;
    color: #fff;
    margin-bottom: 1.2rem;
    letter-spacing: -0.5px;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.about-hero .hero-subtitle {
    font-size: 1.2rem;
    color: rgba(255,255,255,0.9);
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.6;
    font-weight: 400;
}

/* Company Overview */
.about-overview {
    padding: 60px 0;
    background: transparent;
    position: relative;
    z-index: 10;
}

.overview-grid {
    display: grid;
    grid-template-columns: 1.2fr 0.8fr;
    gap: 50px;
    align-items: start;
    background: rgba(255,255,255,0.03);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    border: 1px solid rgba(255,255,255,0.05);
    border-radius: 20px;
    padding: 40px;
}

.overview-content h2 {
    font-size: 2.2rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 0.5rem;
    letter-spacing: -0.5px;
}

.overview-content h3 {
    font-size: 1.3rem;
    color: #31ADDE;
    font-weight: 500;
    margin-bottom: 1.5rem;
    letter-spacing: 0.3px;
}

.overview-content p {
    color: rgba(255,255,255,0.8);
    line-height: 1.8;
    margin-bottom: 1.5rem;
    font-size: 1.05rem;
}

.overview-content p:last-of-type {
    margin-bottom: 0;
}

.overview-highlight {
    background: rgba(49, 173, 222, 0.1);
    border-left: 4px solid #31ADDE;
    padding: 20px 25px;
    border-radius: 0 10px 10px 0;
    margin-top: 25px;
}

.overview-highlight p {
    margin-bottom: 0;
    font-style: italic;
    color: rgba(255,255,255,0.9);
}

/* Stats Cards */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 25px;
}

.stat-card {
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    border: 1px solid rgba(255,255,255,0.05);
    border-radius: 12px;
    padding: 25px 20px;
    text-align: center;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    border-color: #31ADDE;
    background: rgba(49, 173, 222, 0.1);
}

.stat-number {
    display: block;
    font-size: 2.5rem;
    font-weight: 800;
    color: #31ADDE;
    line-height: 1;
    margin-bottom: 8px;
}

.stat-label {
    color: rgba(255,255,255,0.7);
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.location-card {
    background: rgba(0,0,0,0.3);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    border: 1px solid rgba(255,255,255,0.05);
    border-radius: 12px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 15px;
}

.location-icon {
    width: 50px;
    height: 50px;
    background: rgba(49, 173, 222, 0.15);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.location-icon i {
    font-size: 1.5rem;
    color: #31ADDE;
}

.location-info h4 {
    color: #fff;
    font-size: 1rem;
    margin-bottom: 5px;
    font-weight: 600;
}

.location-info p {
    color: rgba(255,255,255,0.7);
    font-size: 0.9rem;
    margin: 0;
    line-height: 1.4;
}

/* Mission Section */
.mission-section {
    padding: 60px 0;
    background: transparent;
    position: relative;
    z-index: 10;
}

.mission-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
}

.mission-card {
    background: rgba(255,255,255,0.03);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    border: 1px solid rgba(255,255,255,0.05);
    border-radius: 16px;
    padding: 35px;
    text-align: center;
    transition: all 0.3s ease;
}

.mission-card:hover {
    border-color: #31ADDE;
}

.mission-icon {
    width: 70px;
    height: 70px;
    background: rgba(49, 173, 222, 0.15);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
}

.mission-icon i {
    font-size: 2rem;
    color: #31ADDE;
}

.mission-card h3 {
    color: #fff;
    font-size: 1.5rem;
    margin-bottom: 15px;
    font-weight: 600;
}

.mission-card p {
    color: rgba(255,255,255,0.7);
    line-height: 1.7;
    margin: 0;
}

/* Values Section */
.values-section {
    padding: 60px 0;
    background: transparent;
    position: relative;
    z-index: 10;
}

.section-header {
    text-align: center;
    margin-bottom: 40px;
}

.section-header h2 {
    font-size: 2.2rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 1rem;
    letter-spacing: -0.5px;
}

.section-header p {
    color: rgba(255,255,255,0.7);
    font-size: 1.1rem;
    max-width: 700px;
    margin: 0 auto;
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.value-item {
    background: rgba(255,255,255,0.03);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    border: 1px solid rgba(255,255,255,0.05);
    border-radius: 16px;
    padding: 30px 25px;
    transition: all 0.3s ease;
}

.value-item:hover {
    border-color: #31ADDE;
    transform: translateY(-5px);
    background: rgba(49, 173, 222, 0.05);
}

.value-icon {
    width: 55px;
    height: 55px;
    background: rgba(49, 173, 222, 0.15);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}

.value-icon i {
    font-size: 1.8rem;
    color: #31ADDE;
}

.value-item h3 {
    color: #fff;
    font-size: 1.3rem;
    margin-bottom: 12px;
    font-weight: 600;
}

.value-item p {
    color: rgba(255,255,255,0.7);
    line-height: 1.6;
    margin-bottom: 15px;
    font-size: 0.95rem;
}

.value-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.value-tag {
    background: rgba(49, 173, 222, 0.15);
    color: #31ADDE;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
}

/* Why Partner Section */
.why-partner {
    padding: 60px 0;
    background: transparent;
    position: relative;
    z-index: 10;
}

.partner-grid {
    display: grid;
    grid-template-columns: 1fr 0.9fr;
    gap: 40px;
    background: rgba(255,255,255,0.03);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    border: 1px solid rgba(255,255,255,0.05);
    border-radius: 20px;
    padding: 40px;
}

.partner-content h2 {
    font-size: 2rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 25px;
    letter-spacing: -0.5px;
}

.reason-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.reason-item {
    display: flex;
    gap: 15px;
    align-items: flex-start;
}

.reason-item i {
    color: #31ADDE;
    font-size: 1.3rem;
    margin-top: 3px;
}

.reason-text h4 {
    color: #fff;
    font-size: 1.1rem;
    margin-bottom: 5px;
    font-weight: 600;
}

.reason-text p {
    color: rgba(255,255,255,0.7);
    line-height: 1.6;
    margin: 0;
    font-size: 0.95rem;
}

.partner-card {
    background: rgba(0,0,0,0.3);
    border-radius: 16px;
    padding: 30px;
    border: 1px solid rgba(255,255,255,0.05);
}

.partner-card h3 {
    color: #fff;
    font-size: 1.3rem;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.info-row {
    display: flex;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid rgba(255,255,255,0.05);
}

.info-label {
    color: rgba(255,255,255,0.6);
    font-size: 0.9rem;
}

.info-value {
    color: #fff;
    font-weight: 500;
    text-align: right;
}

/* CTA Section */
.about-cta {
    padding: 60px 0 80px;
    background: transparent;
    position: relative;
    z-index: 10;
}

.cta-box {
    background: rgba(49, 173, 222, 0.1);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid #31ADDE;
    border-radius: 24px;
    padding: 50px;
    text-align: center;
    max-width: 900px;
    margin: 0 auto;
}

.cta-box h2 {
    font-size: 2.2rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 1rem;
    letter-spacing: -0.5px;
}

.cta-box p {
    color: rgba(255,255,255,0.8);
    font-size: 1.1rem;
    margin-bottom: 2rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.cta-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.btn-outline-light {
    background: transparent;
    border: 2px solid rgba(255,255,255,0.3);
    color: #fff;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-outline-light:hover {
    border-color: #fff;
    background: rgba(255,255,255,0.1);
}

/* Responsive */
@media (max-width: 992px) {
    .overview-grid,
    .partner-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .values-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .about-hero h1 {
        font-size: 2.5rem;
    }
    
    .mission-grid {
        grid-template-columns: 1fr;
    }
    
    .values-grid {
        grid-template-columns: 1fr;
    }
    
    .cta-box {
        padding: 30px 20px;
    }
    
    .cta-buttons {
        flex-direction: column;
    }
    
    .overview-grid,
    .partner-grid {
        padding: 25px;
    }
}

@media (max-width: 480px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- About Page Content -->
<section class="about-hero">
    <div class="container">
        <h1>About MedLink Analytics</h1>
        <p class="hero-subtitle">A premier healthcare revenue cycle management firm providing end-to-end medical billing, credentialing, virtual support, and digital solutions to healthcare practices across the United States.</p>
    </div>
</section>

<section class="about-overview">
    <div class="container">
        <div class="overview-grid">
            <div class="overview-content">
                <h2>MedLink Analytics LLC</h2>
                <h3>Smarter Analytics. Stronger Revenue.</h3>
                
                <p>Founded in 2024 and headquartered in Denver, Colorado, we combine deep domain expertise with technology-driven processes to help providers optimize their financial performance and reduce administrative burden.</p>
                
                <p>Our team stays current with CMS updates, payer policy changes, and ICD-10/CPT revisions—so you don't have to. We handle the complexities of revenue cycle management while you focus on delivering exceptional patient care.</p>
                
                <p>We believe healthcare professionals should never have to struggle with the complexities of medical billing. That's why we built MedLink Analytics: to simplify revenue cycle management so providers can focus fully on what matters most—their patients.</p>
                
                <div class="overview-highlight">
                    <p>"We offer a complimentary practice analysis to all prospective clients—a no-obligation audit of your current billing processes, coding accuracy, and revenue cycle health, so you can see the opportunity before making any commitment."</p>
                </div>
            </div>
            
            <div class="overview-stats">
                <div class="stats-grid">
                    <div class="stat-card">
                        <span class="stat-number">2024</span>
                        <span class="stat-label">Founded</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Specialties</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-number">7+</span>
                        <span class="stat-label">Services</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-number">50</span>
                        <span class="stat-label">States</span>
                    </div>
                </div>
                
                <div class="location-card">
                    <div class="location-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="location-info">
                        <h4>Headquarters</h4>
                        <p>1500 N Grant St STE 28340<br>Denver, Colorado CO 80203<br>United States</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mission-section">
    <div class="container">
        <div class="mission-grid">
            <div class="mission-card">
                <div class="mission-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3>Our Mission</h3>
                <p>To simplify revenue cycle management so healthcare providers can focus fully on delivering high-quality patient care. We achieve this through expert billing services, transparent reporting, and a commitment to continuous improvement.</p>
            </div>
            
            <div class="mission-card">
                <div class="mission-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <h3>Our Vision</h3>
                <p>To be the most trusted revenue cycle partner for healthcare practices nationwide—recognized for our integrity, expertise, and unwavering commitment to our clients' financial success.</p>
            </div>
        </div>
    </div>
</section>

<section class="values-section">
    <div class="container">
        <div class="section-header">
            <h2>Our Core Values</h2>
            <p>The principles that guide every interaction and decision at MedLink Analytics</p>
        </div>
        
        <div class="values-grid">
            <div class="value-item">
                <div class="value-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Integrity</h3>
                <p>Honest, ethical practices in every interaction. We believe transparency builds trust, and trust is the foundation of lasting partnerships.</p>
                <div class="value-tags">
                    <span class="value-tag">Transparency</span>
                    <span class="value-tag">Honesty</span>
                    <span class="value-tag">Trust</span>
                </div>
            </div>
            
            <div class="value-item">
                <div class="value-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h3>Excellence</h3>
                <p>Commitment to accuracy and continuous improvement. We never stop learning, adapting, and refining our processes to achieve 98% clean claims rate.</p>
                <div class="value-tags">
                    <span class="value-tag">Accuracy</span>
                    <span class="value-tag">Quality</span>
                    <span class="value-tag">Growth</span>
                </div>
            </div>
            
            <div class="value-item">
                <div class="value-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Partnership</h3>
                <p>Your success is our success. We treat every client relationship as a long-term partnership, not just a transaction.</p>
                <div class="value-tags">
                    <span class="value-tag">Collaboration</span>
                    <span class="value-tag">Support</span>
                    <span class="value-tag">Success</span>
                </div>
            </div>
            
            <div class="value-item">
                <div class="value-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h3>Compliance</h3>
                <p>100% HIPAA compliant, always. We maintain the highest standards of data security and regulatory adherence.</p>
                <div class="value-tags">
                    <span class="value-tag">HIPAA</span>
                    <span class="value-tag">Security</span>
                    <span class="value-tag">Privacy</span>
                </div>
            </div>
            
            <div class="value-item">
                <div class="value-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Accountability</h3>
                <p>We take ownership of results. Clear, regular reporting ensures full visibility into your revenue cycle performance.</p>
                <div class="value-tags">
                    <span class="value-tag">Reporting</span>
                    <span class="value-tag">Metrics</span>
                    <span class="value-tag">Results</span>
                </div>
            </div>
            
            <div class="value-item">
                <div class="value-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Client-Centered</h3>
                <p>We measure success by our clients' financial outcomes, operational efficiency, and overall satisfaction.</p>
                <div class="value-tags">
                    <span class="value-tag">Responsive</span>
                    <span class="value-tag">Personalized</span>
                    <span class="value-tag">Care</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="why-partner">
    <div class="container">
        <div class="partner-grid">
            <div class="partner-content">
                <h2>Why Healthcare Providers Choose Us</h2>
                
                <div class="reason-list">
                    <div class="reason-item">
                        <i class="fas fa-check-circle"></i>
                        <div class="reason-text">
                            <h4>U.S.-Based & Registered</h4>
                            <p>Headquartered in Denver, Colorado, we're a fully U.S.-registered company accountable to American standards and regulations.</p>
                        </div>
                    </div>
                    
                    <div class="reason-item">
                        <i class="fas fa-check-circle"></i>
                        <div class="reason-text">
                            <h4>Complimentary Practice Analysis</h4>
                            <p>No-obligation assessment of your current billing processes, coding accuracy, and revenue cycle health.</p>
                        </div>
                    </div>
                    
                    <div class="reason-item">
                        <i class="fas fa-check-circle"></i>
                        <div class="reason-text">
                            <h4>Personalized Partnership</h4>
                            <p>Hands-on approach with dedicated account managers who know your practice and understand your unique needs.</p>
                        </div>
                    </div>
                    
                    <div class="reason-item">
                        <i class="fas fa-check-circle"></i>
                        <div class="reason-text">
                            <h4>Technology-Driven</h4>
                            <p>Combining human expertise with modern healthcare technology to maximize efficiency and accuracy.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="partner-card">
                <h3>Company at a Glance</h3>
                
                <div class="info-row">
                    <span class="info-label">Legal Name</span>
                    <span class="info-value">MedLink Analytics LLC</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Structure</span>
                    <span class="info-value">Limited Liability Company</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Year Established</span>
                    <span class="info-value">2024</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Coverage</span>
                    <span class="info-value">United States (Nationwide)</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Clean Claims Rate</span>
                    <span class="info-value">98% Target</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Core Services</span>
                    <span class="info-value">7+ Divisions</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-cta">
    <div class="container">
        <div class="cta-box">
            <h2>Ready to Transform Your Revenue Cycle?</h2>
            <p>Join the growing number of healthcare providers who trust MedLink Analytics to optimize their financial performance and reduce administrative burden.</p>
            <div class="cta-buttons">
                <a href="/contact" class="btn btn-primary">Schedule Free Assessment</a>
                <a href="tel:+17204454634" class="btn-outline-light"><i class="fas fa-phone"></i> +1 720-445-4634</a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include 'assets/footer.php'; ?>