# EnergyHub Services — Premium Service-Based Website

A complete, premium, modern frontend for an electrical monitoring, energy management, and IoT device service company. Built with PHP, HTML5, CSS3, vanilla JavaScript, and Bootstrap 5.

## Project Goal

Professional, service-based technical support for electrical equipment, energy-monitoring devices, and related work:
- Electrical Troubleshooting & Fault Diagnosis
- Equipment Installation & Commissioning
- Preventive Maintenance & Servicing
- Repair, Replacement & Component Support (subject to assessment and availability)
- On-Site Technical Assistance (subject to location and scheduling)
- Custom Technical Tasks & Project Support (subject to scope and approval)

EnergyHub does not promise ready-stock products or instant parts delivery. Scope, material sourcing, site visits, costs, and timelines require review and confirmation.

## Features

- Premium dark technology design (deep navy, cyan accents, glass-style cards)
- Responsive: 1440px, 1024px, 768px, 375px, 320px
- Sticky header with mobile hamburger menu
- Smooth scrolling and scroll-reveal animations (respects `prefers-reduced-motion`)
- Working FAQ accordion (vanilla JS)
- Six shared service categories across the homepage, services page, request form, and footer
- Editorial blog page with three practical equipment-support guides
- Service detail sections with matching image, anchor, request link, required information, and availability notes
- Footer app download area with inactive Android and iOS placeholders
- Contact and service-request forms with server-side validation and MySQL persistence
- Responsive WebP image delivery with PNG fallback, lazy-loaded below-the-fold media, and a compressed hero video
- Search/social metadata and Organization structured data on all pages
- Back-to-top button
- Reusable PHP includes (header, footer, head, service data)
- Dynamic copyright year in footer
- No admin dashboard, authentication, or payments

## Folder Structure

```
energyhubwebsite/
├── index.php              # Homepage (sections A–J)
├── services.php           # Services page
├── about.php              # About Us page
├── blog.php               # Practical technical guides and insights
├── contact.php            # Contact page (form UI)
├── request-service.php    # Service request page (form UI)
├── includes/
│   ├── head.php           # Shared HTML head
│   ├── header.php         # Sticky navigation + logo
│   ├── footer.php         # Footer with links + dynamic year
│   ├── service-data.php     # Central editable service data
│   ├── database.php         # PDO MySQL connection
│   └── form-handler.php     # CSRF protection, validation, and form inserts
├── database/
│   └── schema.sql           # MySQL database and form tables
├── .htaccess                # Apache directory, include, and file-access rules
├── assets/
│   ├── css/style.css      # All styles (CSS variables, components, responsive)
│   ├── js/main.js         # All interactions (menu, scroll, FAQ, validation)
│   └── images/            # Site images and backgrounds
├── README.md
└── .gitignore
```

## Pages

| Page | File | Description |
|------|------|-------------|
| Home | `index.php` | Hero, trust highlights, six service cards, why us, how it works, featured diagnosis CTA, about preview, FAQ, final CTA |
| Services | `services.php` | Six detailed service sections, request links, how it works, FAQs, CTA |
| About Us | `about.php` | Intro, mission, values, service approach, why choose us, CTA |
| Blog | `blog.php` | Editorial blog listing with featured post, category/search filters, and individual article views; currently uses sample PHP-array content |
| Contact Us | `contact.php` | Contact details, message form, and service-location placeholder |
| Request Service | `request-service.php` | Server-validated service request form |

## Image Placeholders

Add your own images to `assets/images/` using the exact filenames:

| File | Section |
|------|---------|
| `photo1.1.png`, `photo1.2.png`, `photo1.3.png` | Homepage hero slideshow images (wide photos with open space for text) |
| `photo2.png` | Fault diagnosis |
| `photo3.png` | Reserved for future use |
| `photo4.png` | Equipment installation |
| `photo5.png` | Preventive maintenance |
| `photo6.mp4` | Why Choose Us video |
| `photo7.png` | About Us |
| `photo8.png` | Custom technical tasks |
| `photo9.png` | On-site technical assistance / final CTA |
| `photo10.png` | Component support |
| `photo11.1.png` | Contact and final CTA backgrounds |
| `photo12.png` | Request a Service hero background |
| `photo13.png` | Blog journal masthead background |

## How to Run Locally

This is a PHP project. You need PHP installed to run it.

### Option 1: PHP Built-in Server (recommended for testing)

From the project root:

```bash
php -S localhost:8000
```

Then open: http://localhost:8000/index.php

### Option 2: XAMPP / WAMP / MAMP

Place the project folder in your web server's document root (e.g., `htdocs`) and access via `http://localhost/energyhubwebsite/index.php`.

## Database and Form Setup

The Contact Us and Request a Service forms save submissions to MySQL/MariaDB using PDO prepared statements and send email notifications to `gravityhubautomation@gmail.com` through PHP's configured mail transport. They validate input on the server and use CSRF tokens. If notification delivery cannot be handed to the mail transport, the submission remains saved and the form tells the customer to contact the email address directly.

Set `ENERGYHUB_SITE_URL` to the production HTTPS site root (for example, `https://www.example.com`) so pages emit correct canonical and social-sharing URLs. Do not set it to `localhost`. The public domain is needed before a production sitemap and search-engine registration can be finalized.

Configure PHP mail delivery on the hosting server before accepting live submissions. For XAMPP, configure its Sendmail settings to use a mail provider (for Gmail SMTP, use an app password, not the account password). Optionally set `ENERGYHUB_NOTIFICATION_EMAIL` to override the notification recipient and `ENERGYHUB_MAIL_FROM` to a sender address accepted by your mail provider. Do not commit mail credentials; keep them in the server's private mail configuration.

1. Create/import the database schema with the MySQL command line or phpMyAdmin:

   ```bash
   mysql -u root -p < database/schema.sql
   ```

2. Create a dedicated runtime database user after importing the schema. For example, run the following as a database administrator, replacing the example password with a strong unique secret:

   ```sql
   CREATE USER 'energyhub_app'@'localhost' IDENTIFIED BY 'replace-with-a-strong-unique-password';
   GRANT INSERT ON energyhub.contact_messages TO 'energyhub_app'@'localhost';
   GRANT INSERT ON energyhub.service_requests TO 'energyhub_app'@'localhost';
   ```

3. Copy `includes/config.local.example.php` to `includes/config.local.php` and enter the database host, port, database name, runtime user, and password. The local config is ignored by Git. Alternatively, set `ENERGYHUB_DB_HOST`, `ENERGYHUB_DB_PORT`, `ENERGYHUB_DB_NAME`, `ENERGYHUB_DB_USER`, and `ENERGYHUB_DB_PASSWORD` in the PHP/web-server environment.
4. Ensure PHP has `pdo_mysql` enabled and the web-server account can read the application files.
5. Submit a test contact message and service request, then verify the `contact_messages` and `service_requests` tables in phpMyAdmin or your database console.
6. On production, use HTTPS and do not upload or commit `config.local.php`. The root `.htaccess` rules protect project documentation and database files on Apache; configure equivalent access restrictions if using Nginx or another server.

Database connection errors are written to the PHP error log; the form displays a generic save error without exposing credentials or server details.

## What Is Functional Now

- All navigation links work across pages (Home, About Us, Services, Blog, Contact Us)
- Blog page uses sample in-file post data for now; superadmin/database publishing is not yet connected
- Sticky header with scroll shadow
- Mobile hamburger menu (open/close)
- Smooth scroll for anchor links
- Six service cards, detail anchors, matching request-form preselection, and footer service links driven by shared PHP data
- FAQ accordion (open/close)
- Back-to-top button
- Scroll-reveal animations
- Client-side and server-side form validation on contact and request-service pages
- CSRF-protected contact and service-request submissions stored in MySQL/MariaDB
- Dynamic footer year
- Missing-image-safe containers

## Remaining Backend Work

- Configure database credentials on the target server and import `database/schema.sql` before accepting submissions.
- An authenticated admin dashboard for reviewing submissions is not included.

## Design System

- Background: `#060a12` (deep navy)
- Cards and panels: `#0a0f18` / `#0e1726`
- Primary accent: `#00d2ff` (cyan)
- Text: `#f3f4f6` headings and `#a1aebf` supporting text
- Hero: full-width slideshow using `photo1.1.png`, `photo1.2.png`, and `photo1.3.png`, with matching text and a dark overlay; the floating services hint links to the services page
- Icons: Bootstrap Icons (CDN)
- CSS framework: Bootstrap 5 (CDN)

## Publishing Notes

The contact email is `gravityhubautomation@gmail.com`; configure and test the hosting server's mail transport before publishing. Address and business hours are placeholders and must be confirmed before publishing. The displayed phone and WhatsApp number are retained from the existing project. Confirm service coverage, site availability, material sourcing, costs, and timing for each request before committing to work.#   G r a v i t y h u b  
 