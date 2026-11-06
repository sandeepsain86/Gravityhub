<?php
// Page-specific settings
$page_title = 'EnergyHub Services | Electrical & Technical Support';
$page_description = 'Technical services for electrical equipment and energy-monitoring devices, including fault diagnosis, installation, maintenance, and component support.';
$page_social_image = 'assets/images/photo1.1.png';
$body_class = 'page-home';

// Load shared service data
require_once __DIR__ . '/includes/service-data.php';

include 'includes/head.php';
include 'includes/header.php';
?>

<main id="main-content">
<!-- Section A: Hero -->
<section class="hero" id="home">
    <div class="hero-background" aria-hidden="true">
        <img class="hero-slide is-active" src="assets/images/photo1.1.png" srcset="<?php echo webp_image_srcset('assets/images/photo1.1.png'); ?>" alt="" aria-hidden="false" fetchpriority="high" decoding="async"
             data-eyebrow="Electrical &amp; technical services"
             data-title="Make sense of"
             data-highlight="the technical issue."
             data-description="Tell us what equipment you have, what is happening, and what support you need. We review the details and explain practical options before any work is agreed."
             data-highlight-one="Fault assessment"
             data-highlight-two="Device support"
             data-highlight-three="Clear next steps">
        <img class="hero-slide" src="assets/images/photo1.2.png" srcset="<?php echo webp_image_srcset('assets/images/photo1.2.png'); ?>" alt="" aria-hidden="true" loading="lazy" decoding="async"
             data-eyebrow="Equipment installation &amp; commissioning"
             data-title="Get equipment"
             data-highlight="set up with care."
             data-description="Discuss installation, configuration, and connection requirements for your supported device. We review the setup and confirm the scope and availability before arranging work."
             data-highlight-one="Installation planning"
             data-highlight-two="Configuration support"
             data-highlight-three="Operational checks">
        <img class="hero-slide" src="assets/images/photo1.3.png" srcset="<?php echo webp_image_srcset('assets/images/photo1.3.png'); ?>" alt="" aria-hidden="true" loading="lazy" decoding="async"
             data-eyebrow="On-site &amp; project support"
             data-title="Technical support"
             data-highlight="for real-world sites."
             data-description="From a site assessment to an agreed technical task, share the location and requirement. Visits, scope, scheduling, and any applicable costs are confirmed case by case."
             data-highlight-one="Site assistance"
             data-highlight-two="Scope reviewed first"
             data-highlight-three="Availability confirmed">
    </div>
    <div class="hero-bg-overlay" aria-hidden="true"></div>
    <div class="container hero-container">
        <div class="hero-content reveal">
            <span class="hero-eyebrow"><span class="hero-status-dot"></span><span data-hero-copy="eyebrow">Electrical &amp; technical services</span></span>
            <h1><span class="hero-title-main" data-hero-copy="title">Make sense of</span><br><span class="hero-title-highlight" data-hero-copy="highlight">the technical issue.</span></h1>
            <p class="lead" data-hero-copy="description">Tell us what equipment you have, what is happening, and what support you need. We review the details and explain practical options before any work is agreed.</p>

            <div class="hero-cta">
                <a href="request-service.php" class="btn btn-primary btn-lg">Request a Service <i class="bi bi-arrow-up-right"></i></a>
                <a href="services.php" class="btn btn-outline btn-lg">Explore Our Services</a>
                <a href="https://wa.me/919983498888" class="btn btn-outline btn-lg" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i> WhatsApp Us</a>
            </div>

            <div class="trust-indicators">
                <div class="trust-item"><i class="bi bi-tools"></i> <span data-hero-copy="highlight-one">Fault diagnosis</span></div>
                <div class="trust-item"><i class="bi bi-lightning-charge"></i> <span data-hero-copy="highlight-two">Equipment installation</span></div>
                <div class="trust-item"><i class="bi bi-headset"></i> <span data-hero-copy="highlight-three">Maintenance support</span></div>
            </div>
        </div>
        <a class="hero-image-hint" href="services.php" aria-label="Explore our services for energy devices">
            <span class="hero-image-hint-icon"><i class="bi bi-arrow-up-right"></i></span>
            <span><strong>Explore our services</strong><small>Support for your energy devices</small></span>
        </a>
    </div>
</section>

<!-- Section B: Trust / Service Highlights -->
<section class="trust-section" id="trust">
    <div class="container">
        <div class="trust-grid">
            <?php foreach ($trust_highlights as $highlight): ?>
            <div class="trust-card reveal">
                <div class="trust-icon"><i class="bi bi-<?php echo htmlspecialchars($highlight['icon']); ?>"></i></div>
                <div class="trust-card-content">
                    <h4><?php echo htmlspecialchars($highlight['title']); ?></h4>
                    <p><?php echo htmlspecialchars($highlight['text']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section C: Our Services -->
<section class="services-section" id="services">
    <div class="container">
        <div class="section-header reveal">
            <span class="section-eyebrow">How we can help</span>
            <h2>Technical services for your requirements</h2>
            <p>Choose a service category or describe a custom task. We review the equipment, location, scope, and availability before agreeing on next steps.</p>
        </div>

        <div class="service-slider" data-service-slider>
            <div class="service-slider-viewport" id="service-slider-viewport" tabindex="0"
                 role="region" aria-label="Technical services"
                 aria-describedby="service-slider-status">
                <div class="services-grid service-slider-track">
                    <?php $index = 1; foreach ($services as $service): ?>
                    <article class="service-card reveal">
                        <div class="service-image">
                            <img src="assets/images/<?php echo htmlspecialchars($service['image']); ?>" srcset="<?php echo webp_image_srcset('assets/images/' . $service['image']); ?>" alt="<?php echo htmlspecialchars($service['title']); ?>" loading="lazy" decoding="async">
                            <span class="service-badge"><?php echo $index; ?></span>
                            <span class="service-icon" aria-hidden="true"><i class="bi bi-<?php echo htmlspecialchars($service['icon']); ?>"></i></span>
                        </div>
                        <div class="service-card-body">
                            <h3><a href="services.php#<?php echo htmlspecialchars($service['id']); ?>"><?php echo htmlspecialchars($service['title']); ?></a></h3>
                            <p><?php echo htmlspecialchars($service['short']); ?></p>
                            <a href="services.php#<?php echo htmlspecialchars($service['id']); ?>" class="service-details-link">View service details</a>
                            <a href="request-service.php?service=<?php echo urlencode($service['id']); ?>" class="service-cta">
                                <?php echo htmlspecialchars($service['cta']); ?> <i class="bi bi-arrow-up-right"></i>
                            </a>
                        </div>
                    </article>
                    <?php $index++; endforeach; ?>
                </div>
            </div>
            <div class="service-slider-controls">
                <p class="service-slider-status" id="service-slider-status" aria-live="polite"></p>
                <div class="service-slider-buttons">
                    <button class="service-slider-button" type="button" data-service-previous
                            aria-label="Show previous services" aria-controls="service-slider-viewport" disabled>
                        <i class="bi bi-arrow-left" aria-hidden="true"></i>
                    </button>
                    <button class="service-slider-button" type="button" data-service-next
                            aria-label="Show next services" aria-controls="service-slider-viewport">
                        <i class="bi bi-arrow-right" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section D: Why Choose Us -->
<section class="why-section" id="why-us">
    <div class="container">
        <div class="why-grid">
            <div class="why-image reveal apple-blend-dark">
                <video src="assets/images/photo6-optimized.mp4" poster="assets/images/photo6.webp" autoplay muted loop playsinline preload="none" aria-hidden="true" tabindex="-1">
                    Your browser does not support background video.
                </video>
            </div>
            <div class="why-content reveal">
                <span class="section-eyebrow">What to expect</span>
                <h2>Why Choose Us</h2>
                <p class="why-intro">We review each request before discussing a suitable scope, availability, materials, and applicable costs.</p>
                <ul class="why-list">
                    <li>
                        <i class="bi bi-headset"></i>
                        <div>
                            <h4>Practical Technical Support</h4>
                            <p>Share the issue and equipment details to help us assess feasible support options.</p>
                        </div>
                    </li>
                    <li>
                        <i class="bi bi-chat-right-text"></i>
                        <div>
                            <h4>Clear Communication</h4>
                            <p>Understand the proposed scope, relevant requirements, and next steps before work begins.</p>
                        </div>
                    </li>
                    <li>
                        <i class="bi bi-tablet"></i>
                        <div>
                            <h4>Device-Focused Service</h4>
                            <p>Support options are considered in relation to your equipment and task.</p>
                        </div>
                    </li>
                    <li>
                        <i class="bi bi-shield-check"></i>
                        <div>
                            <h4>Reliable Assistance</h4>
                            <p>Scope, parts, site availability, and costs are confirmed case by case.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Section E: How Our Service Works -->
<section class="process-section" id="how-it-works">
    <div class="container">
        <div class="section-header reveal">
            <span class="process-eyebrow">How It Works</span>
            <h2>A clear path to the right support</h2>
            <p>Share the equipment, symptoms, location, and work required so the team can review feasible next steps.</p>
        </div>
        <div class="process-grid reveal">
            <div class="process-connector"></div>
            <?php $stepNum = 1; foreach ($process_steps as $step): ?>
            <div class="process-step">
                <svg class="process-card-outline" viewBox="0 0 400 300" preserveAspectRatio="none" aria-hidden="true" focusable="false">
                    <path d="M54 1 L390 1 L399 52 C399 81 396 107 386 135 C382 151 380 168 380 183 C380 198 383 215 389 231 L399 256 C399 280 376 299 346 299 L8 299 L20 190 C20 188 20 185 20 183 C20 168 17 151 14 135 L1 43 C1 20 24 1 54 1 Z"/>
                </svg>
                <div class="step-number"><span><?php echo htmlspecialchars($step['step']); ?></span></div>
                <h4><?php echo htmlspecialchars($step['title']); ?></h4>
                <p><?php echo htmlspecialchars($step['text']); ?></p>
            </div>
            <?php $stepNum++; endforeach; ?>
        </div>
    </div>
</section>

<!-- Section F: Featured Service / Promotional CTA -->
<section class="featured-section" id="featured">
    <div class="container">
        <div class="featured-grid featured-split">
            <div class="featured-visual reveal apple-blend-dark">
                <img src="assets/images/photo2.png" srcset="<?php echo webp_image_srcset('assets/images/photo2.png'); ?>" alt="Technical inspection of an electronic equipment component" loading="lazy" decoding="async">
                <div class="featured-stat">
                    <strong>Start with the details</strong>
                    <span>Equipment details help us review the reported fault</span>
                </div>
            </div>
            <div class="featured-content reveal">
                <span class="eyebrow featured-eyebrow">Fault Diagnosis</span>
                <h2>Electrical Troubleshooting &amp; Fault Diagnosis</h2>
                <p>Share the equipment type, make and model if known, symptoms, and checks already completed. The team can review the issue and discuss possible next steps for supported equipment.</p>
                <ul class="featured-points">
                    <li><i class="bi bi-check2-circle"></i> Describe the fault and equipment involved</li>
                    <li><i class="bi bi-check2-circle"></i> Include symptoms and checks already completed</li>
                    <li><i class="bi bi-check2-circle"></i> Discuss feasible support options after review</li>
                </ul>
                <a href="request-service.php?service=diagnosis" class="btn btn-primary">Request Fault Diagnosis</a>
            </div>
        </div>
    </div>
</section>

<!-- Section G: About the Company -->
<section class="about-preview-section" id="about-preview">
    <div class="container">
        <div class="about-panel reveal">
            <div class="about-panel-head">
                <span class="about-eyebrow">Who We Are</span>
                <h2>About EnergyHub Services</h2>
            </div>
            <div class="about-panel-body">
                <div class="about-panel-text">
                    <div class="about-panel-image">
                        <img src="assets/images/photo7.png" srcset="<?php echo webp_image_srcset('assets/images/photo7.png'); ?>" alt="EnergyHub company overview" loading="lazy" decoding="async">
                    </div>
                    <p><?php echo htmlspecialchars($about['intro']); ?></p>
                    <a href="about.php" class="btn btn-outline">Learn About Us</a>
                </div>
                <div class="about-panel-side">
                    <div class="about-fact">
                        <i class="bi bi-award"></i>
                        <div>
                            <strong>Service First</strong>
                            <span>Understand the issue before recommending a next step</span>
                        </div>
                    </div>
                    <div class="about-fact">
                        <i class="bi bi-people"></i>
                        <div>
                            <strong>Customer Focused</strong>
                            <span>Know what information to share and what happens next</span>
                        </div>
                    </div>
                    <div class="about-fact">
                        <i class="bi bi-lightning-charge"></i>
                        <div>
                            <strong>Practical Solutions</strong>
                            <span>Guidance based on your equipment and issue</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section H: FAQ -->
<section class="faq-section" id="faq">
    <div class="container">
        <div class="section-header reveal">
            <span class="section-eyebrow">FAQs</span>
            <h2>Quick answers</h2>
            <p>What to know before requesting device support.</p>
        </div>
        <div class="faq-grid" id="faq-grid">
            <?php foreach ($faqs as $index => $faq): 
                $btnId = 'faq-btn-' . $index;
                $collapseId = 'faq-collapse-' . $index;
            ?>
            <div class="faq-item reveal">
                <button class="faq-button" type="button" aria-expanded="false" aria-controls="<?php echo $collapseId; ?>" id="<?php echo $btnId; ?>">
                    <?php echo htmlspecialchars($faq['q']); ?>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="faq-answer" id="<?php echo $collapseId; ?>">
                    <p><?php echo htmlspecialchars($faq['a']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="faq-more-wrap">
            <button class="btn btn-outline faq-more-toggle" type="button"
                    aria-expanded="false" aria-controls="faq-grid" hidden>
                Show all FAQs
            </button>
        </div>
    </div>
</section>

<!-- Section I: Final CTA -->
<section class="final-cta-section" id="cta">
    <div class="final-cta-bg" aria-hidden="true">
        <img src="assets/images/photo11.1.png" srcset="<?php echo webp_image_srcset('assets/images/photo11.1.png'); ?>" alt="" loading="lazy" decoding="async">
    </div>
    <div class="container final-cta-content reveal">
        <h2>Not sure which support you need?</h2>
        <p>Share the equipment details and what you are trying to resolve. We will review your request and discuss the available next steps.</p>
        <div class="final-cta-buttons">
            <a href="request-service.php" class="btn btn-white">Request a Service</a>
            <a href="contact.php" class="btn btn-white-outline">Contact Us</a>
            <a href="https://wa.me/919983498888" class="btn btn-white-outline" target="_blank"><i class="bi bi-whatsapp"></i> WhatsApp</a>
        </div>
    </div>
</section>
</main>

<?php include 'includes/footer.php'; ?>

<!-- Local JavaScript -->
<script src="assets/js/main.js?v=<?php echo filemtime(__DIR__ . '/assets/js/main.js'); ?>" defer></script>
</body>
</html>