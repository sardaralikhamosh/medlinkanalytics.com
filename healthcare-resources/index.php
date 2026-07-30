<?php
// ============================================================
// Healthcare Resources - Main Index Page
// ============================================================

// Page specific variables
$page_title = "Healthcare Resources | Medical Billing & Coding Guides | MedLink Analytics";
$page_description = "Comprehensive healthcare resources including CPT codes, ICD-10 codes, claim types, medical billing guidelines, and more. Educational content for healthcare providers.";
$page_keywords = "healthcare resources, medical billing, CPT codes, ICD-10 codes, healthcare guides, medical reference";

// Include header
include __DIR__ . '/includes/header.php';
?>

<main id="main-content">
    <!-- ============================================================ -->
    <!-- Hero Section -->
    <!-- ============================================================ -->
    <section class="hero-section" aria-labelledby="hero-title">
        <div class="container">
            <span class="hero-badge">📚 Free Resources</span>
            <h1 id="hero-title">Healthcare Resources</h1>
            <p class="hero-subtitle">
                Comprehensive educational resources for healthcare providers, medical billers, and coders. 
                Find information on <strong>CPT codes</strong>, <strong>claim types</strong>, 
                <strong>medical conditions</strong>, <strong>provider types</strong>, and more.
            </p>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- Resource Grid -->
    <!-- ============================================================ -->
    <section class="resource-section" aria-labelledby="resources-title">
        <div class="container">
            <div class="section-header">
                <span class="section-eyebrow">Knowledge Base</span>
                <h2 id="resources-title">Explore Our Healthcare Resources</h2>
                <p>Expert-curated information to support your healthcare practice and billing operations</p>
            </div>

            <div class="resource-grid">
                <!-- CPT Codes -->
                <a href="/healthcare-resources/cpt-codes/" class="resource-card">
                    <span class="card-icon">📋</span>
                    <h3>CPT Codes</h3>
                    <p>Comprehensive guide to Current Procedural Terminology (CPT) codes for medical billing and coding.</p>
                    <div class="card-meta">
                        <span>Updated Monthly</span>
                        <span class="card-link">View Resources</span>
                    </div>
                </a>

                <!-- ICD-10 Codes -->
                <a href="/healthcare-resources/icd-10-codes/" class="resource-card">
                    <span class="card-icon">🏥</span>
                    <h3>ICD-10 Codes</h3>
                    <p>Complete ICD-10-CM diagnosis code reference with guidelines and coding tips for medical billing.</p>
                    <div class="card-meta">
                        <span>Updated Quarterly</span>
                        <span class="card-link">View Resources</span>
                    </div>
                </a>

                <!-- Claim Types -->
                <a href="/healthcare-resources/claim-types/" class="resource-card">
                    <span class="card-icon">📄</span>
                    <h3>Claim Types</h3>
                    <p>Understanding different types of medical claims: professional, institutional, and specialty claims.</p>
                    <div class="card-meta">
                        <span>Comprehensive Guide</span>
                        <span class="card-link">View Resources</span>
                    </div>
                </a>

                <!-- Medical Conditions -->
                <a href="/healthcare-resources/diseases/" class="resource-card">
                    <span class="card-icon">🩺</span>
                    <h3>Medical Conditions</h3>
                    <p>Common diseases, conditions, and their ICD-10 codes with documentation guidelines for providers.</p>
                    <div class="card-meta">
                        <span>Growing Library</span>
                        <span class="card-link">View Resources</span>
                    </div>
                </a>

                <!-- Provider Types -->
                <a href="/healthcare-resources/providers/" class="resource-card">
                    <span class="card-icon">👨‍⚕️</span>
                    <h3>Provider Types</h3>
                    <p>Guide to healthcare provider types, specialties, taxonomy codes, and credentialing information.</p>
                    <div class="card-meta">
                        <span>Updated Annually</span>
                        <span class="card-link">View Resources</span>
                    </div>
                </a>

                <!-- CPT Modifiers -->
                <a href="/healthcare-resources/modifiers/" class="resource-card">
                    <span class="card-icon">🔧</span>
                    <h3>CPT Modifiers</h3>
                    <p>Complete reference for CPT and HCPCS modifiers with usage guidelines and examples for billing.</p>
                    <div class="card-meta">
                        <span>Updated Quarterly</span>
                        <span class="card-link">View Resources</span>
                    </div>
                </a>

                <!-- Billing Guidelines -->
                <a href="/healthcare-resources/billing-guidelines/" class="resource-card">
                    <span class="card-icon">📖</span>
                    <h3>Billing Guidelines</h3>
                    <p>Essential medical billing guidelines, regulations, and best practices for healthcare providers.</p>
                    <div class="card-meta">
                        <span>Updated Regularly</span>
                        <span class="card-link">View Resources</span>
                    </div>
                </a>

                <!-- Medical Glossary -->
                <a href="/healthcare-resources/glossary/" class="resource-card">
                    <span class="card-icon">📚</span>
                    <h3>Medical Glossary</h3>
                    <p>Comprehensive glossary of medical billing, coding, and healthcare terms and definitions.</p>
                    <div class="card-meta">
                        <span>Growing Library</span>
                        <span class="card-link">View Resources</span>
                    </div>
                </a>

                <!-- Payer Information -->
                <a href="/healthcare-resources/payers/" class="resource-card">
                    <span class="card-icon">🏛️</span>
                    <h3>Payer Information</h3>
                    <p>Guide to Medicare, Medicaid, commercial payers, and insurance plans with coverage information.</p>
                    <div class="card-meta">
                        <span>Updated Quarterly</span>
                        <span class="card-link">View Resources</span>
                    </div>
                </a>

                <!-- Denial Codes -->
                <a href="/healthcare-resources/denial-codes/" class="resource-card">
                    <span class="card-icon">🚫</span>
                    <h3>Denial Codes</h3>
                    <p>Complete reference for claim denial codes, reasons, and resolution strategies for medical billing.</p>
                    <div class="card-meta">
                        <span>Updated Monthly</span>
                        <span class="card-link">View Resources</span>
                    </div>
                </a>

                <!-- Revenue Cycle -->
                <a href="/healthcare-resources/revenue-cycle/" class="resource-card">
                    <span class="card-icon">💰</span>
                    <h3>Revenue Cycle</h3>
                    <p>Understanding the healthcare revenue cycle: from patient registration to final payment and reporting.</p>
                    <div class="card-meta">
                        <span>Comprehensive Guide</span>
                        <span class="card-link">View Resources</span>
                    </div>
                </a>

                <!-- Compliance Resources -->
                <a href="/healthcare-resources/compliance/" class="resource-card">
                    <span class="card-icon">🛡️</span>
                    <h3>Compliance Resources</h3>
                    <p>HIPAA, OIG, CMS compliance guidelines and regulatory updates for healthcare providers.</p>
                    <div class="card-meta">
                        <span>Updated Regularly</span>
                        <span class="card-link">View Resources</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- Stats Section -->
    <!-- ============================================================ -->
    <section class="stats-section" aria-labelledby="stats-title">
        <div class="container">
            <div class="section-header">
                <span class="section-eyebrow">Impact</span>
                <h2 id="stats-title">Our Resources at a Glance</h2>
                <p>Trusted by healthcare professionals seeking reliable information</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">CPT Code Guides</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">100+</span>
                    <span class="stat-label">ICD-10 Code References</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">30+</span>
                    <span class="stat-label">Claim Type Explanations</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">40+</span>
                    <span class="stat-label">Medical Condition Guides</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- Features Section -->
    <!-- ============================================================ -->
    <section class="features-section" aria-labelledby="features-title">
        <div class="container">
            <div class="section-header">
                <span class="section-eyebrow">Why Use Our Resources</span>
                <h2 id="features-title">Your Trusted Healthcare Information Hub</h2>
                <p>Reliable, up-to-date, and professionally curated content</p>
            </div>

            <div class="features-grid">
                <div class="feature-item">
                    <span class="feature-icon">✅</span>
                    <h4>Accurate Information</h4>
                    <p>Professionally curated and verified healthcare information</p>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">🔄</span>
                    <h4>Regular Updates</h4>
                    <p>Content updated to reflect latest coding and billing changes</p>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">🔍</span>
                    <h4>Easy to Navigate</h4>
                    <p>Organized structure for quick reference and learning</p>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">📱</span>
                    <h4>Mobile Friendly</h4>
                    <p>Access all resources from any device, anywhere</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- FAQ Section -->
    <!-- ============================================================ -->
    <section class="faq-section" aria-labelledby="faq-title">
        <div class="container">
            <div class="section-header">
                <span class="section-eyebrow">FAQ</span>
                <h2 id="faq-title">Frequently Asked Questions</h2>
                <p>Common questions about our healthcare resources</p>
            </div>

            <div class="faq-list">
                <details class="faq-item">
                    <summary>What healthcare resources are available?</summary>
                    <p class="faq-answer">We offer comprehensive resources including CPT codes, ICD-10 codes, claim types, medical conditions, provider types, CPT modifiers, billing guidelines, medical glossary, payer information, denial codes, revenue cycle guides, and compliance resources. All content is professionally curated and regularly updated.</p>
                </details>

                <details class="faq-item">
                    <summary>How often are the resources updated?</summary>
                    <p class="faq-answer">Our resources are updated regularly to reflect the latest coding changes, regulatory updates, and industry best practices. CPT and ICD-10 codes are updated quarterly, while other resources are reviewed and updated monthly or as needed.</p>
                </details>

                <details class="faq-item">
                    <summary>Are these resources free to use?</summary>
                    <p class="faq-answer">Yes, all our healthcare resources are completely free to access and use. We believe in making healthcare information accessible to providers, billers, and coders to support better patient care and billing accuracy.</p>
                </details>

                <details class="faq-item">
                    <summary>Can I suggest a new resource topic?</summary>
                    <p class="faq-answer">Absolutely! We welcome suggestions for new resources. Please contact us with your suggestions, and we'll consider adding them to our library. We're committed to providing the information our users need.</p>
                </details>

                <details class="faq-item">
                    <summary>Are the coding references compliant with current guidelines?</summary>
                    <p class="faq-answer">Yes, all coding references are reviewed and updated to comply with current CPT, ICD-10, and HCPCS guidelines. However, we always recommend verifying codes with official sources for billing and compliance purposes.</p>
                </details>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- CTA Section -->
    <!-- ============================================================ -->
    <section class="cta-section" aria-labelledby="cta-title">
        <div class="container">
            <div class="cta-box">
                <h2 id="cta-title">Need Professional Medical Billing Support?</h2>
                <p>Our expert team can help you with medical billing, credentialing, RCM, and more. Get a free consultation today.</p>
                <div class="cta-buttons">
                    <a href="/contact" class="btn btn-primary">Schedule Free Consultation</a>
                    <a href="tel:+17207803128" class="btn btn-secondary">
                        <i class="fas fa-phone" aria-hidden="true"></i> +1 720-780-3128
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
// Include footer
include __DIR__ . '/includes/footer.php';
?>