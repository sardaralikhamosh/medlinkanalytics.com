<?php include 'assets/header.php'; ?>
<style>
    /* Ensure body background doesn't interfere */
    body {
        position: relative;
        min-height: 100vh;
        background: linear-gradient(-45deg, #f5f7fa, #c3cfe2, #a1c4fd, #f5f7fa);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
        margin: 0;
        padding: 0;
    }
    
    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    /* Add a pseudo-element to ensure content area is properly separated */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: inherit;
        z-index: -1;
    }
    
    .container {
        max-width: 1200px;
        margin: 3rem auto;
        padding: 0 20px;
        position: relative; /* Ensure it's above the animated background */
        z-index: 1;
    }
    
    .content-box {
        background: white !important;
        padding: 3rem;
        border-radius: 10px;
        box-shadow: 0 5px 30px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
        position: relative;
        z-index: 2; /* Ensure it's above everything */
    }
    
    /* Rest of your existing styles remain the same */
    .last-updated {
        background: #e6f5fc;
        border-left: 4px solid #31ADDE;
        padding: 1rem 1.5rem;
        margin-bottom: 2rem;
        border-radius: 5px;
    }
    
    .last-updated p {
        color: #111111 !important;
    }
    
    h2 {
        color: #1a3a5f;
        font-size: 1.8rem;
        margin: 2rem 0 1rem 0;
        padding-top: 1rem;
        border-top: 2px solid #e6f5fc;
    }
    
    h2:first-of-type {
        margin-top: 0;
        padding-top: 0;
        border-top: none;
    }
    
    h3 {
        color: #2c5c8a;
        font-size: 1.3rem;
        margin: 1.5rem 0 0.8rem 0;
    }
    
    p {
        margin-bottom: 1rem;
        color: #444;
    }
    
    ul, ol {
        margin: 1rem 0 1rem 2rem;
    }
    
    li {
        margin-bottom: 0.5rem;
        color: #444;
    }
    
    .highlight-box {
        background: #fff8e6;
        border-left: 4px solid #ffa726;
        padding: 1.5rem;
        margin: 1.5rem 0;
        border-radius: 5px;
    }
    
    .highlight-box h4 {
        color: #e65100;
        margin-bottom: 0.5rem;
    }
    
    .contact-section {
        background: #e6f5fc;
        padding: 2rem;
        border-radius: 8px;
        margin-top: 2rem;
    }
    
    .contact-section h3 {
        color: #0C7AA7;
        margin-top: 0;
    }
    
    .contact-section a {
        color: #31ADDE;
        text-decoration: none;
        font-weight: 600;
    }
    
    .contact-section a:hover {
        text-decoration: underline;
    }
    
    .footer {
        background: #1a3a5f;
        color: white;
        text-align: center;
        padding: 2rem;
        margin-top: 3rem;
    }
    
    .footer a {
        color: #31ADDE;
        text-decoration: none;
    }
    
    .footer a:hover {
        text-decoration: underline;
    }
    
    @media (max-width: 768px) {
        .header h1 {
            font-size: 2rem;
        }
        
        .content-box {
            padding: 1.5rem;
        }
        
        h2 {
            font-size: 1.5rem;
        }
        
        h3 {
            font-size: 1.2rem;
        }
    }
</style>
    
<div class="container">
    <div class="content-box">
        <div class="last-updated">
            <p><strong>Terms & Conditions</strong></p>
            <p><strong>Last Updated:</strong> Dec 11, 2025</p><br>
        </div>
        
       <p>Welcome to MedLink Analytics. These Terms of Service ("Terms") constitute a legally binding agreement between MedLink Analytics ("Company," "we," "us," or "our") and you or the healthcare entity you represent ("Client," "you," or "your") regarding your use of our medical billing, revenue cycle management, and related healthcare administrative services.</p>
            
            <p>By engaging our services, accessing our website, or executing a service agreement with MedLink Analytics, you acknowledge that you have read, understood, and agree to be bound by these Terms.</p>
            
            <h2>1. Services Provided</h2>
            
            <h3>1.1 Scope of Services</h3>
            <p>MedLink Analytics provides comprehensive medical billing and revenue cycle management services, including but not limited to:</p>
            <ul>
                <li>Medical claims processing and submission</li>
                <li>Denial management and appeals</li>
                <li>Patient billing and payment processing</li>
                <li>Accounts receivable management</li>
                <li>Provider credentialing and enrollment</li>
                <li>Analytics, reporting, and business intelligence</li>
                <li>Practice management consulting</li>
                <li>System automation and integration services</li>
                <li>Digital marketing services for healthcare practices</li>
            </ul>
            
            <h3>1.2 Service Customization</h3>
            <p>Specific services, deliverables, timelines, and fees will be outlined in individual Service Agreements or Statements of Work executed between MedLink Analytics and the Client. In the event of any conflict between these Terms and a Service Agreement, the Service Agreement shall prevail.</p>
            
            <h3>1.3 Service Modifications</h3>
            <p>We reserve the right to modify, suspend, or discontinue any aspect of our services with reasonable notice to clients. We will work collaboratively with affected clients to ensure continuity of care and minimal disruption to operations.</p>
            
            <h2>2. Client Responsibilities</h2>
            
            <h3>2.1 Information Accuracy</h3>
            <p>Client agrees to provide accurate, complete, and timely information necessary for MedLink Analytics to perform services effectively. This includes but is not limited to:</p>
            <ul>
                <li>Patient demographic and insurance information</li>
                <li>Clinical documentation and medical records</li>
                <li>Provider credentials and licensing information</li>
                <li>Fee schedules and contractual agreements with payers</li>
                <li>Updates to practice information, policies, or procedures</li>
            </ul>
            
            <h3>2.2 System Access</h3>
            <p>Client shall provide MedLink Analytics with necessary access to practice management systems, electronic health records, and other relevant platforms required to deliver services. Client is responsible for maintaining system functionality and notifying us of any technical issues that may affect service delivery.</p>
            
            <h3>2.3 Compliance with Laws</h3>
            <p>Client warrants that their healthcare practice operates in compliance with all applicable federal, state, and local laws, including but not limited to healthcare licensure requirements, anti-kickback statutes, Stark Law, and False Claims Act provisions.</p>
            
            <h2>3. Fees and Payment Terms</h2>
            
            <h3>3.1 Fee Structure</h3>
            <p>Fees for services are established in the applicable Service Agreement and may be structured as:</p>
            <ul>
                <li>Percentage of collections</li>
                <li>Fixed monthly retainer</li>
                <li>Per-transaction fees</li>
                <li>Hybrid models combining the above</li>
            </ul>
            
            <h3>3.2 Payment Terms</h3>
            <p>Unless otherwise specified in the Service Agreement, invoices are due within thirty (30) days of the invoice date. Late payments may be subject to interest charges at the rate of 1.5% per month or the maximum rate permitted by law, whichever is lower.</p>
            
            <h3>3.3 Collections on Behalf of Client</h3>
            <p>When MedLink Analytics collects payments on behalf of Client, we will remit funds to Client according to the schedule outlined in the Service Agreement, typically within five (5) to ten (10) business days of receipt, minus our applicable service fees.</p>
            
            <h2>4. Confidentiality and Data Security</h2>
            
            <h3>4.1 Protected Health Information (PHI)</h3>
            <p>MedLink Analytics acknowledges that it may create, receive, maintain, or transmit Protected Health Information (PHI) as defined under the Health Insurance Portability and Accountability Act (HIPAA) and its implementing regulations. We maintain comprehensive policies and procedures to ensure the confidentiality, integrity, and availability of all PHI.</p>
            
            <h3>4.2 Business Associate Agreement</h3>
            <p>A separate HIPAA Business Associate Agreement (BAA) shall be executed between MedLink Analytics and Client, which shall govern the use and disclosure of PHI. The BAA is incorporated into these Terms by reference.</p>
            
            <h3>4.3 Data Security Measures</h3>
            <p>We implement industry-standard security measures including:</p>
            <ul>
                <li>Bank-level encryption for data transmission and storage</li>
                <li>Multi-factor authentication for system access</li>
                <li>Regular security audits and vulnerability assessments</li>
                <li>Employee training on HIPAA compliance and data security</li>
                <li>Secure backup and disaster recovery procedures</li>
                <li>Incident response and breach notification protocols</li>
            </ul>
            
            <h3>4.4 Proprietary Information</h3>
            <p>Both parties agree to maintain the confidentiality of each other's proprietary business information, including pricing structures, operational procedures, client lists, and strategic plans.</p>
            
            <div class="highlight-box">
                <h4>Important: Data Breach Notification</h4>
                <p>In the event of a suspected or confirmed data breach involving PHI, MedLink Analytics will notify the Client within the timeframes required by applicable law, typically within sixty (60) days of discovery, and will cooperate fully in any required investigations or notifications to affected individuals.</p>
            </div>
            
            <h2>5. Compliance and Regulatory Matters</h2>
            
            <h3>5.1 HIPAA Compliance</h3>
            <p>MedLink Analytics maintains full compliance with HIPAA Privacy Rule, Security Rule, and Breach Notification Rule requirements. We conduct regular risk assessments and update our policies to reflect changes in healthcare regulations.</p>
            
            <h3>5.2 Coding and Billing Compliance</h3>
            <p>We adhere to current coding guidelines including ICD-10-CM, CPT, and HCPCS coding standards. Our billing practices comply with Medicare and Medicaid regulations, as well as commercial payer requirements.</p>
            
            <h3>5.3 Anti-Fraud Commitment</h3>
            <p>MedLink Analytics is committed to preventing healthcare fraud, waste, and abuse. We do not knowingly submit false or fraudulent claims and have established compliance protocols to identify and prevent potential violations.</p>
            
            <h3>5.4 Regulatory Changes</h3>
            <p>We monitor changes to healthcare regulations and update our practices accordingly. Clients will be notified of significant regulatory changes that may affect their billing practices or require action.</p>
            
            <h2>6. Representations and Warranties</h2>
            
            <h3>6.1 Company Warranties</h3>
            <p>MedLink Analytics warrants that:</p>
            <ul>
                <li>Services will be performed in a professional and workmanlike manner consistent with industry standards</li>
                <li>We maintain appropriate licenses, certifications, and insurance coverage</li>
                <li>Our personnel are trained and qualified to perform medical billing services</li>
                <li>We will comply with all applicable laws and regulations</li>
            </ul>
            
            <h3>6.2 Client Warranties</h3>
            <p>Client warrants that:</p>
            <ul>
                <li>All information provided to MedLink Analytics is accurate and complete</li>
                <li>Client has legal authority to engage our services and share necessary information</li>
                <li>Medical services billed were actually provided and medically necessary</li>
                <li>Client maintains appropriate malpractice insurance coverage</li>
            </ul>
            
            <h3>6.3 Disclaimer of Warranties</h3>
            <p>EXCEPT AS EXPRESSLY SET FORTH IN THESE TERMS, MEDLINK ANALYTICS PROVIDES SERVICES "AS IS" WITHOUT ANY WARRANTIES, EXPRESS OR IMPLIED, INCLUDING WARRANTIES OF MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE. We do not guarantee specific collection amounts or reimbursement rates, as these are dependent on multiple factors outside our control.</p>
            
            <h2>7. Limitation of Liability</h2>
            
            <h3>7.1 Liability Cap</h3>
            <p>TO THE MAXIMUM EXTENT PERMITTED BY LAW, MEDLINK ANALYTICS' TOTAL LIABILITY ARISING OUT OF OR RELATED TO THESE TERMS OR THE SERVICES PROVIDED SHALL NOT EXCEED THE TOTAL FEES PAID BY CLIENT TO MEDLINK ANALYTICS IN THE TWELVE (12) MONTHS PRECEDING THE EVENT GIVING RISE TO LIABILITY.</p>
            
            <h3>7.2 Consequential Damages</h3>
            <p>IN NO EVENT SHALL MEDLINK ANALYTICS BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, OR PUNITIVE DAMAGES, INCLUDING LOST PROFITS, LOST REVENUE, OR LOSS OF DATA, WHETHER IN CONTRACT, TORT, OR OTHERWISE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.</p>
            
            <h3>7.3 Exceptions</h3>
            <p>The limitations in this section do not apply to:</p>
            <ul>
                <li>Breaches of confidentiality obligations</li>
                <li>Violations of applicable healthcare laws or regulations</li>
                <li>Gross negligence or willful misconduct</li>
                <li>Claims covered by insurance</li>
            </ul>
            
            <h2>8. Indemnification</h2>
            
            <h3>8.1 Mutual Indemnification</h3>
            <p>Each party agrees to indemnify, defend, and hold harmless the other party from and against any claims, damages, losses, or expenses arising from:</p>
            <ul>
                <li>Breach of these Terms or any Service Agreement</li>
                <li>Violation of applicable laws or regulations</li>
                <li>Negligent or willful acts or omissions</li>
                <li>Infringement of third-party intellectual property rights</li>
            </ul>
            
            <h3>8.2 Client-Specific Indemnification</h3>
            <p>Client specifically indemnifies MedLink Analytics for claims arising from:</p>
            <ul>
                <li>Inaccurate or incomplete information provided by Client</li>
                <li>Medical malpractice or quality of care issues</li>
                <li>Client's violation of healthcare laws or regulations</li>
                <li>Actions taken by MedLink Analytics at Client's direction</li>
            </ul>
            
            <h2>9. Term and Termination</h2>
            
            <h3>9.1 Initial Term</h3>
            <p>The initial term of service shall be as specified in the Service Agreement, typically ranging from twelve (12) to thirty-six (36) months.</p>
            
            <h3>9.2 Termination for Convenience</h3>
            <p>Either party may terminate the agreement for convenience with ninety (90) days written notice. Client shall remain responsible for payment of all fees earned through the termination date.</p>
            
            <h3>9.3 Termination for Cause</h3>
            <p>Either party may terminate immediately upon written notice if the other party:</p>
            <ul>
                <li>Materially breaches these Terms and fails to cure within thirty (30) days of notice</li>
                <li>Becomes insolvent or files for bankruptcy</li>
                <li>Engages in fraudulent or illegal conduct</li>
                <li>Violates HIPAA or other healthcare regulations</li>
            </ul>
            
            <h3>9.4 Transition Assistance</h3>
            <p>Upon termination, MedLink Analytics will provide reasonable transition assistance for up to sixty (60) days to facilitate transfer of billing operations. Client agrees to pay for such assistance at our standard rates.</p>
            
            <h3>9.5 Return of Information</h3>
            <p>Upon termination, each party shall return or securely destroy all confidential information and PHI belonging to the other party, in accordance with HIPAA requirements and the Business Associate Agreement.</p>
            
            <h2>10. Intellectual Property</h2>
            
            <h3>10.1 Ownership</h3>
            <p>MedLink Analytics retains all rights, title, and interest in our proprietary systems, software, processes, templates, and methodologies. Client receives a limited, non-exclusive license to use such materials solely in connection with the services provided.</p>
            
            <h3>10.2 Client Data</h3>
            <p>Client retains all rights to their patient data, clinical information, and practice-specific information. We claim no ownership interest in such data.</p>
            
            <h3>10.3 Aggregated Data</h3>
            <p>MedLink Analytics may use de-identified, aggregated data derived from services for benchmarking, analytics, and service improvement purposes, provided such use does not violate HIPAA or other privacy laws.</p>
            
            <h2>11. Insurance</h2>
            
            <p>MedLink Analytics maintains the following insurance coverage:</p>
            <ul>
                <li>Professional Liability Insurance (Errors & Omissions)</li>
                <li>Cyber Liability Insurance</li>
                <li>General Commercial Liability Insurance</li>
                <li>Workers' Compensation Insurance</li>
            </ul>
            <p>Certificates of insurance are available upon request.</p>
            
            <h2>12. Force Majeure</h2>
            
            <p>Neither party shall be liable for failure to perform obligations due to causes beyond reasonable control, including natural disasters, pandemics, government actions, telecommunications failures, or cyberattacks. The affected party shall notify the other party promptly and make reasonable efforts to resume performance.</p>
            
            <h2>13. Dispute Resolution</h2>
            
            <h3>13.1 Good Faith Negotiations</h3>
            <p>Any disputes arising from these Terms shall first be addressed through good faith negotiations between senior representatives of both parties.</p>
            
            <h3>13.2 Mediation</h3>
            <p>If negotiations do not resolve the dispute within thirty (30) days, the parties agree to participate in mediation before pursuing other remedies.</p>
            
            <h3>13.3 Arbitration</h3>
            <p>If mediation is unsuccessful, disputes shall be resolved through binding arbitration in Denver, Colorado, in accordance with the Commercial Arbitration Rules of the American Arbitration Association.</p>
            
            <h3>13.4 Governing Law</h3>
            <p>These Terms shall be governed by and construed in accordance with the laws of the State of Colorado, without regard to conflict of law principles.</p>
            
            <h2>14. General Provisions</h2>
            
            <h3>14.1 Entire Agreement</h3>
            <p>These Terms, together with any Service Agreements and the Business Associate Agreement, constitute the entire agreement between the parties and supersede all prior agreements, whether written or oral.</p>
            
            <h3>14.2 Amendments</h3>
            <p>MedLink Analytics may update these Terms periodically. Material changes will be communicated to clients with at least thirty (30) days notice. Continued use of services after notice constitutes acceptance of updated Terms.</p>
            
            <h3>14.3 Severability</h3>
            <p>If any provision of these Terms is found to be invalid or unenforceable, the remaining provisions shall remain in full force and effect.</p>
            
            <h3>14.4 Waiver</h3>
            <p>Failure to enforce any provision of these Terms shall not constitute a waiver of that provision or any other provision.</p>
            
            <h3>14.5 Assignment</h3>
            <p>Neither party may assign these Terms or any Service Agreement without prior written consent of the other party, except that MedLink Analytics may assign to a successor entity in connection with a merger or acquisition.</p>
            
            <h3>14.6 Independent Contractor</h3>
            <p>MedLink Analytics is an independent contractor and not an employee, partner, or joint venturer of Client. Nothing in these Terms creates an employment relationship.</p>
            
            <h3>14.7 Notices</h3>
            <p>All notices required under these Terms shall be in writing and delivered via email, certified mail, or overnight courier to the addresses provided in the Service Agreement.</p>
            
            <h3>14.8 Survival</h3>
            <p>Provisions relating to confidentiality, indemnification, limitation of liability, and intellectual property shall survive termination of these Terms.</p>
            
            <div class="contact-section">
                <h3>Questions About These Terms?</h3>
                <p>If you have questions about these Terms of Service or need clarification on any provision, please contact us:</p>
                <p><strong>MedLink Analytics</strong><br>
                1500 N Grant St STE 28340<br>
                Denver, Colorado CO 80203<br>
                United States</p>
                <p><strong>Email:</strong> <a href="mailto:contact@medlinkanalytics.com">contact@medlinkanalytics.com</a></p>
                <p><strong>Website:</strong> <a href="https://medlinkanalytics.com" target="_blank">www.medlinkanalytics.com</a></p>
        </div>
    </div>
</div>

<?php include 'assets/footer.php'; ?>