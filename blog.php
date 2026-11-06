<?php
$blog_posts = [
    [
        'slug' => 'prepare-for-technical-support',
        'category' => 'Service preparation',
        'category_slug' => 'service-preparation',
        'title' => 'What to share when requesting technical support',
        'excerpt' => 'A few clear details about your equipment, symptoms, and site can make the first service conversation more useful.',
        'image' => 'photo1.2.png',
        'image_alt' => 'Technician reviewing an energy-monitoring device and its readings',
        'published' => '2026-10-28',
        'author' => 'EnergyHub Editorial',
        'read_time' => '4 min read',
        'featured' => true,
        'content' => [
            ['type' => 'intro', 'text' => 'A clear description helps a service team understand what you are experiencing and what information may still be needed. You do not need to diagnose the fault yourself.'],
            ['type' => 'heading', 'text' => 'Start with the equipment'],
            ['type' => 'paragraph', 'text' => 'Note the equipment type and, if easy to find, its manufacturer and model. Mention where it is used and what it is connected to. A photo of the outside label or display can be useful when it is safe to take one.'],
            ['type' => 'heading', 'text' => 'Describe what changed'],
            ['type' => 'paragraph', 'text' => 'Explain what the device was doing before the issue, what it is doing now, when you first noticed the change, and whether it happens all the time or only in certain conditions. Include any message or indicator shown on the display.'],
            ['type' => 'heading', 'text' => 'Include context, not guesses'],
            ['type' => 'paragraph', 'text' => 'Share any checks already completed and relevant recent changes, such as a new installation or a change in how the equipment is used. It is fine to say that you are unsure about the cause.'],
            ['type' => 'callout', 'text' => 'Do not remove covers or handle wiring to collect information. Keep clear of damaged or exposed electrical equipment and contact a qualified professional for inspection.'],
        ],
        'faqs' => [
            ['q' => 'What details should I share when requesting support?', 'a' => 'Share the equipment type and model if known, what changed, when it started, any display messages, and checks already completed.'],
            ['q' => 'Do I need to identify the fault before contacting a service team?', 'a' => 'No. Describe what you observe in your own words; you do not need to diagnose the cause.'],
            ['q' => 'Is it safe to open the equipment to get more details?', 'a' => 'No. Do not remove covers or handle wiring. Keep clear of damaged or exposed electrical equipment and contact a qualified professional.'],
        ],
    ],
    [
        'slug' => 'reviewing-energy-monitor-readings',
        'category' => 'Energy monitoring',
        'category_slug' => 'energy-monitoring',
        'title' => 'A simple guide to reviewing energy-monitor readings',
        'excerpt' => 'Use consistent time periods, operating context, and device details to describe what the readings show.',
        'image' => 'photo7.png',
        'image_alt' => 'Energy-use charts displayed in a monitoring workspace',
        'published' => '2026-10-21',
        'author' => 'EnergyHub Editorial',
        'read_time' => '5 min read',
        'featured' => false,
        'content' => [
            ['type' => 'intro', 'text' => 'A reading becomes more useful when you can explain when it was recorded and what the equipment was doing at the time. This simple review is a way to organise your observations—not a substitute for a technical assessment.'],
            ['type' => 'heading', 'text' => 'Check the time period and units'],
            ['type' => 'paragraph', 'text' => 'Note the date range, time interval, and units shown by the monitor. When comparing readings, use similar periods and make sure you are comparing the same measurement.'],
            ['type' => 'heading', 'text' => 'Add operating context'],
            ['type' => 'paragraph', 'text' => 'Record whether equipment was running, idle, or following a different schedule during the period. Note unusual events or changes that may help explain why two time periods look different.'],
            ['type' => 'heading', 'text' => 'Keep the original details'],
            ['type' => 'paragraph', 'text' => 'Write down the monitor model if known and save a screenshot or export with its date range visible. Avoid drawing conclusions from one reading alone; configuration, measurement points, and operating conditions all matter.'],
        ],
        'faqs' => [
            ['q' => 'What should I check first when reviewing monitor readings?', 'a' => 'Check the date range, time interval, and units so you know exactly what the monitor is showing.'],
            ['q' => 'Why should I compare similar time periods?', 'a' => 'Using similar periods and the same measurement makes comparisons clearer and reduces confusion from different operating schedules.'],
            ['q' => 'Can one unusual reading confirm an equipment fault?', 'a' => 'Not by itself. Configuration, measurement points, and operating conditions matter; preserve the reading details and seek a technical review when needed.'],
        ],
    ],
    [
        'slug' => 'equipment-maintenance-records',
        'category' => 'Maintenance',
        'category_slug' => 'maintenance',
        'title' => 'Keep a useful equipment maintenance record',
        'excerpt' => 'A simple record of models, service dates, and observations can make future equipment reviews easier.',
        'image' => 'photo5.png',
        'image_alt' => 'Technician reviewing equipment as part of a maintenance check',
        'published' => '2026-10-14',
        'author' => 'EnergyHub Editorial',
        'read_time' => '4 min read',
        'featured' => false,
        'content' => [
            ['type' => 'intro', 'text' => 'A consistent record gives you a quick reference for service conversations and helps keep equipment information together. It can be a simple document or log kept by the people responsible for the equipment.'],
            ['type' => 'heading', 'text' => 'What to include'],
            ['type' => 'list', 'items' => [
                'Equipment name, location, manufacturer, and model where known.',
                'Installation or service dates and the work that was agreed and completed.',
                'Observations such as display messages, unusual behaviour, or visible changes.',
                'Relevant photos, reports, and contact details for the responsible site team.',
            ]],
            ['type' => 'heading', 'text' => 'Keep checks within the right scope'],
            ['type' => 'paragraph', 'text' => 'Follow the equipment manufacturer’s guidance and your site’s safety procedures. Visual record-keeping does not replace inspection by a qualified professional; do not open electrical enclosures or perform work beyond your training and authorisation.'],
        ],
        'faqs' => [
            ['q' => 'What information should an equipment maintenance record include?', 'a' => 'Keep equipment names, locations, models where known, service dates, completed work, observations, and relevant reports or photos.'],
            ['q' => 'How often should I update the maintenance record?', 'a' => 'Update it whenever equipment is installed, serviced, checked, or when a relevant issue or visible change is observed.'],
            ['q' => 'Does a maintenance log replace a professional inspection?', 'a' => 'No. A log helps organise information but does not replace inspection by a qualified professional or your site’s safety procedures.'],
        ],
    ],
];

$requested_slug = isset($_GET['slug']) && is_string($_GET['slug']) ? $_GET['slug'] : '';
$active_post = null;
foreach ($blog_posts as $post) {
    if ($post['slug'] === $requested_slug) {
        $active_post = $post;
        break;
    }
}

$categories = [];
foreach ($blog_posts as $post) {
    $categories[$post['category_slug']] = $post['category'];
}

$featured_post = null;
foreach ($blog_posts as $post) {
    if (!empty($post['featured'])) {
        $featured_post = $post;
        break;
    }
}

if ($active_post !== null) {
    $page_title = $active_post['title'] . ' | EnergyHub Blog';
    $page_description = $active_post['excerpt'];
    $page_social_image = 'assets/images/' . $active_post['image'];
} else {
    $page_title = 'Technical Guides & Insights | EnergyHub Services';
    $page_description = 'Practical guides to preparing for technical support, understanding energy-monitor readings, and keeping useful equipment maintenance records.';
    $page_social_image = $featured_post !== null
        ? 'assets/images/' . $featured_post['image']
        : 'assets/images/photo1.1.png';
}
$body_class = 'page-blog';

require_once __DIR__ . '/includes/service-data.php';

include 'includes/head.php';
include 'includes/header.php';
?>

<main class="blog-page" id="main-content">
    <?php if ($active_post !== null): ?>
    <section class="blog-article-hero">
        <div class="container">
            <div class="blog-article-heading">
                <span class="blog-category"><?php echo htmlspecialchars($active_post['category']); ?></span>
                <h1><?php echo htmlspecialchars($active_post['title']); ?></h1>
                <p class="blog-article-deck"><?php echo htmlspecialchars($active_post['excerpt']); ?></p>
                <div class="blog-meta">
                    <span><?php echo htmlspecialchars($active_post['author']); ?></span>
                    <span aria-hidden="true">·</span>
                    <time datetime="<?php echo htmlspecialchars($active_post['published']); ?>"><?php echo date('M j, Y', strtotime($active_post['published'])); ?></time>
                    <span aria-hidden="true">·</span>
                    <span><?php echo htmlspecialchars($active_post['read_time']); ?></span>
                </div>
            </div>
        </div>
        <div class="container blog-article-image-wrap">
            <img class="blog-article-cover" src="assets/images/<?php echo htmlspecialchars($active_post['image']); ?>" srcset="<?php echo webp_image_srcset('assets/images/' . $active_post['image']); ?>" alt="<?php echo htmlspecialchars($active_post['image_alt']); ?>" fetchpriority="high" decoding="async">
        </div>
    </section>

    <section class="blog-reading-section">
        <div class="container blog-reading-layout">
            <article class="blog-reading-content">
                <?php foreach ($active_post['content'] as $block): ?>
                    <?php if ($block['type'] === 'intro'): ?>
                        <p class="blog-article-intro"><?php echo htmlspecialchars($block['text']); ?></p>
                    <?php elseif ($block['type'] === 'heading'): ?>
                        <h2><?php echo htmlspecialchars($block['text']); ?></h2>
                    <?php elseif ($block['type'] === 'list'): ?>
                        <ul>
                            <?php foreach ($block['items'] as $item): ?>
                            <li><?php echo htmlspecialchars($item); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php elseif ($block['type'] === 'callout'): ?>
                        <aside class="blog-safety-note"><i class="bi bi-shield-exclamation" aria-hidden="true"></i><p><?php echo htmlspecialchars($block['text']); ?></p></aside>
                    <?php else: ?>
                        <p><?php echo htmlspecialchars($block['text']); ?></p>
                    <?php endif; ?>
                <?php endforeach; ?>
            </article>
            <aside class="blog-reading-sidebar">
                <span class="blog-sidebar-label">About this article</span>
                <p><?php echo htmlspecialchars($active_post['category']); ?></p>
                <hr>
                <a href="blog.php">Browse all guides <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                <a href="services.php">Explore our services <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                <div class="blog-article-cta">
                    <h2>Need help with your equipment?</h2>
                    <p>Share what you know about the device and what you need help with. The team can review your request and discuss possible next steps.</p>
                    <a class="btn btn-primary" href="request-service.php">Request a Service <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a>
                </div>
            </aside>
        </div>
    </section>

    <section class="faq-section blog-article-faq" id="article-faq">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-eyebrow">Article FAQs</span>
                <h2>Questions about this topic</h2>
                <p>Answers related to this guide.</p>
            </div>
            <div class="faq-grid">
                <?php foreach ($active_post['faqs'] as $index => $faq):
                    $collapseId = 'article-faq-' . $active_post['slug'] . '-' . $index;
                ?>
                <div class="faq-item reveal">
                    <button class="faq-button" type="button" aria-expanded="false" aria-controls="<?php echo htmlspecialchars($collapseId); ?>">
                        <?php echo htmlspecialchars($faq['q']); ?>
                        <i class="bi bi-chevron-down" aria-hidden="true"></i>
                    </button>
                    <div class="faq-answer" id="<?php echo htmlspecialchars($collapseId); ?>">
                        <p><?php echo htmlspecialchars($faq['a']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section blog-related-section">
        <div class="container">
            <div class="blog-section-heading">
                <div><span class="section-eyebrow">Keep exploring</span><h2>More practical guides</h2></div>
                <a class="blog-view-all" href="blog.php">All articles <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            </div>
            <div class="blog-grid blog-grid-related">
                <?php $related_count = 0; foreach ($blog_posts as $post): ?>
                    <?php if ($post['slug'] === $active_post['slug'] || $related_count >= 2) continue; ?>
                    <article class="blog-card">
                        <a class="blog-card-image" href="blog.php?slug=<?php echo urlencode($post['slug']); ?>">
                            <img src="assets/images/<?php echo htmlspecialchars($post['image']); ?>" srcset="<?php echo webp_image_srcset('assets/images/' . $post['image']); ?>" alt="<?php echo htmlspecialchars($post['image_alt']); ?>" loading="lazy" decoding="async">
                        </a>
                        <div class="blog-card-content">
                            <span class="blog-category"><?php echo htmlspecialchars($post['category']); ?></span>
                            <h3><a href="blog.php?slug=<?php echo urlencode($post['slug']); ?>"><?php echo htmlspecialchars($post['title']); ?></a></h3>
                            <p><?php echo htmlspecialchars($post['excerpt']); ?></p>
                            <a class="blog-read-link" href="blog.php?slug=<?php echo urlencode($post['slug']); ?>">Read article <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a>
                        </div>
                    </article>
                    <?php $related_count++; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php else: ?>
    <section class="blog-masthead">
        <div class="container">
            <div class="blog-masthead-copy">
                <span class="section-eyebrow">The EnergyHub journal</span>
                <h1>Ideas for keeping<br><span>your equipment moving.</span></h1>
                <p>Practical notes on energy monitoring, equipment care, and getting the right technical support—written to make complex topics easier to approach.</p>
            </div>
            <div class="blog-masthead-bottom">
                <span><i class="bi bi-lightning-charge" aria-hidden="true"></i> Technical knowledge, made practical</span>
                <span><?php echo count($blog_posts); ?> articles <i class="bi bi-arrow-down" aria-hidden="true"></i></span>
            </div>
        </div>
    </section>

    <section class="blog-library" aria-labelledby="blog-library-title">
        <div class="container">
            <?php if ($featured_post !== null): ?>
            <article class="blog-featured" data-blog-entry data-category="<?php echo htmlspecialchars($featured_post['category_slug']); ?>" data-search="<?php echo htmlspecialchars(strtolower($featured_post['title'] . ' ' . $featured_post['excerpt'] . ' ' . $featured_post['category'])); ?>">
                <a class="blog-featured-image" href="blog.php?slug=<?php echo urlencode($featured_post['slug']); ?>">
                    <img src="assets/images/<?php echo htmlspecialchars($featured_post['image']); ?>" srcset="<?php echo webp_image_srcset('assets/images/' . $featured_post['image']); ?>" alt="<?php echo htmlspecialchars($featured_post['image_alt']); ?>" fetchpriority="high" decoding="async">
                    <span class="blog-featured-image-label"><i class="bi bi-stars" aria-hidden="true"></i> Editor’s pick</span>
                </a>
                <div class="blog-featured-content">
                    <span class="blog-category"><?php echo htmlspecialchars($featured_post['category']); ?></span>
                    <h2><a href="blog.php?slug=<?php echo urlencode($featured_post['slug']); ?>"><?php echo htmlspecialchars($featured_post['title']); ?></a></h2>
                    <p><?php echo htmlspecialchars($featured_post['excerpt']); ?></p>
                    <div class="blog-meta">
                        <span><?php echo htmlspecialchars($featured_post['author']); ?></span>
                        <span aria-hidden="true">·</span>
                        <time datetime="<?php echo htmlspecialchars($featured_post['published']); ?>"><?php echo date('M j, Y', strtotime($featured_post['published'])); ?></time>
                        <span aria-hidden="true">·</span>
                        <span><?php echo htmlspecialchars($featured_post['read_time']); ?></span>
                    </div>
                    <a class="blog-featured-link" href="blog.php?slug=<?php echo urlencode($featured_post['slug']); ?>">Read the article <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a>
                </div>
            </article>
            <?php endif; ?>

            <div class="blog-section-heading">
                <div><span class="section-eyebrow">Explore the journal</span><h2 id="blog-library-title">Latest articles</h2></div>
                <span class="blog-results-count" data-blog-count><?php echo count($blog_posts); ?> articles</span>
            </div>

            <div class="blog-toolbar">
                <div class="blog-filters" role="group" aria-label="Filter articles by topic">
                    <button class="blog-filter is-active" type="button" data-blog-filter="all" aria-pressed="true">All articles</button>
                    <?php foreach ($categories as $category_slug => $category_name): ?>
                    <button class="blog-filter" type="button" data-blog-filter="<?php echo htmlspecialchars($category_slug); ?>" aria-pressed="false"><?php echo htmlspecialchars($category_name); ?></button>
                    <?php endforeach; ?>
                </div>
                <label class="blog-search">
                    <i class="bi bi-search" aria-hidden="true"></i>
                    <span class="visually-hidden">Search articles</span>
                    <input type="search" data-blog-search placeholder="Search the journal..." autocomplete="off">
                </label>
            </div>

            <div class="blog-grid">
                <?php foreach ($blog_posts as $post): ?>
                    <?php if ($featured_post !== null && $post['slug'] === $featured_post['slug']) continue; ?>
                    <article class="blog-card" data-blog-entry data-category="<?php echo htmlspecialchars($post['category_slug']); ?>" data-search="<?php echo htmlspecialchars(strtolower($post['title'] . ' ' . $post['excerpt'] . ' ' . $post['category'])); ?>">
                        <a class="blog-card-image" href="blog.php?slug=<?php echo urlencode($post['slug']); ?>">
                            <img src="assets/images/<?php echo htmlspecialchars($post['image']); ?>" srcset="<?php echo webp_image_srcset('assets/images/' . $post['image']); ?>" alt="<?php echo htmlspecialchars($post['image_alt']); ?>" loading="lazy" decoding="async">
                            <span class="blog-card-image-arrow" aria-hidden="true"><i class="bi bi-arrow-up-right"></i></span>
                        </a>
                        <div class="blog-card-content">
                            <span class="blog-category"><?php echo htmlspecialchars($post['category']); ?></span>
                            <h3><a href="blog.php?slug=<?php echo urlencode($post['slug']); ?>"><?php echo htmlspecialchars($post['title']); ?></a></h3>
                            <p><?php echo htmlspecialchars($post['excerpt']); ?></p>
                            <div class="blog-card-footer">
                                <span><?php echo date('M j, Y', strtotime($post['published'])); ?> <span aria-hidden="true">·</span> <?php echo htmlspecialchars($post['read_time']); ?></span>
                                <a class="blog-read-link" href="blog.php?slug=<?php echo urlencode($post['slug']); ?>" aria-label="Read <?php echo htmlspecialchars($post['title']); ?>"><i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
            <p class="blog-empty-state" data-blog-empty hidden>No articles match that search. Try another word or topic.</p>
        </div>
    </section>

    <section class="blog-newsletter-band">
        <div class="container">
            <div><span class="section-eyebrow">Have a question?</span><h2>Let’s talk about your equipment.</h2><p>Tell us what you are working with and what support you need. We will review your request and discuss possible next steps.</p></div>
            <a class="btn btn-primary btn-lg" href="contact.php">Talk to our team <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php include 'includes/footer.php'; ?>

<script src="assets/js/main.js?v=<?php echo filemtime(__DIR__ . '/assets/js/main.js'); ?>" defer></script>
</body>
</html>
