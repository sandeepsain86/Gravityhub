/* ==========================================================================
   EnergyHub Services — Main JavaScript
   ========================================================================== */

document.addEventListener('DOMContentLoaded', function () {
  initHeaderScroll();
  initMobileMenu();
  initSmoothScroll();
  initBackToTop();
  initScrollReveal();
  initFaqAccordion();
  initFaqCompactDisplay();
  initFormValidation();
  initActiveNav();
  initHeroSlideshow();
  initServiceSlider();
  initBlogFilters();
});

/* ------------------------------------------------------------------ */
/*  Homepage hero slideshow
   ------------------------------------------------------------------ */
function initHeroSlideshow() {
  const slides = document.querySelectorAll('.hero-background .hero-slide');
  if (slides.length < 2) return;

  const heroContent = document.querySelector('.hero-content');
  if (!heroContent) return;

  const copyFields = {};
  heroContent.querySelectorAll('[data-hero-copy]').forEach(function (field) {
    copyFields[field.getAttribute('data-hero-copy')] = field;
  });

  let activeIndex = 0;

  window.setInterval(function () {
    slides[activeIndex].classList.remove('is-active');
    slides[activeIndex].setAttribute('aria-hidden', 'true');

    activeIndex = (activeIndex + 1) % slides.length;

    slides[activeIndex].classList.add('is-active');
    slides[activeIndex].setAttribute('aria-hidden', 'false');

    Object.keys(copyFields).forEach(function (key) {
      const value = slides[activeIndex].getAttribute('data-' + key);
      if (value) copyFields[key].textContent = value;
    });

    if (Object.keys(copyFields).length && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      heroContent.classList.remove('is-changing');
      void heroContent.offsetWidth;
      heroContent.classList.add('is-changing');
    }
  }, 5000);
}

/* ------------------------------------------------------------------ */
/*  Homepage service slider
   ------------------------------------------------------------------ */
function initServiceSlider() {
  const slider = document.querySelector('[data-service-slider]');
  if (!slider) return;

  const viewport = slider.querySelector('.service-slider-viewport');
  const track = slider.querySelector('.service-slider-track');
  const cards = Array.from(slider.querySelectorAll('.service-card'));
  const previousButton = slider.querySelector('[data-service-previous]');
  const nextButton = slider.querySelector('[data-service-next]');
  const status = slider.querySelector('.service-slider-status');

  if (!viewport || !track || !cards.length || !previousButton || !nextButton || !status) return;

  let autoSlideTimer = null;
  let nextSlideDelay = 5000;
  let isHovered = false;
  const autoSlideEnabled = !window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function getCurrentIndex() {
    const viewportLeft = viewport.getBoundingClientRect().left;
    let closestIndex = 0;
    let closestDistance = Infinity;

    cards.forEach(function (card, index) {
      const cardLeft = card.getBoundingClientRect().left - viewportLeft;
      const distance = Math.abs(cardLeft);
      if (distance < closestDistance) {
        closestDistance = distance;
        closestIndex = index;
      }
    });

    return closestIndex;
  }

  function updateControls() {
    const index = getCurrentIndex();
    const maxScroll = viewport.scrollWidth - viewport.clientWidth;
    const gap = parseFloat(getComputedStyle(track).gap) || 0;
    const visibleCount = Math.max(1, Math.floor((viewport.clientWidth + gap) / (cards[0].offsetWidth + gap)));
    const lastVisible = Math.min(cards.length, index + visibleCount);

    previousButton.disabled = viewport.scrollLeft <= 1;
    nextButton.disabled = viewport.scrollLeft >= maxScroll - 1;
    status.textContent = 'Showing services ' + (index + 1) + '–' + lastVisible + ' of ' + cards.length;
  }

  function moveSlider(direction) {
    const index = getCurrentIndex();
    const maxScroll = viewport.scrollWidth - viewport.clientWidth;
    const targetIndex = direction > 0 && viewport.scrollLeft >= maxScroll - 1
      ? 0
      : Math.max(0, Math.min(cards.length - 1, index + direction));
    const viewportLeft = viewport.getBoundingClientRect().left;
    const targetLeft = cards[targetIndex].getBoundingClientRect().left - viewportLeft + viewport.scrollLeft;
    viewport.scrollTo({ left: targetLeft, behavior: 'smooth' });
  }

  function stopAutoSlide() {
    if (autoSlideTimer !== null) {
      window.clearTimeout(autoSlideTimer);
      autoSlideTimer = null;
    }
  }

  function startAutoSlide(delay) {
    if (delay) nextSlideDelay = delay;
    stopAutoSlide();
    if (!autoSlideEnabled
      || viewport.scrollWidth <= viewport.clientWidth
      || isHovered
      || slider.contains(document.activeElement)
      || document.hidden) return;

    autoSlideTimer = window.setTimeout(function () {
      moveSlider(1);
      nextSlideDelay = 5000;
      startAutoSlide();
    }, nextSlideDelay);
  }

  previousButton.addEventListener('click', function () {
    stopAutoSlide();
    moveSlider(-1);
    startAutoSlide(10000);
  });
  nextButton.addEventListener('click', function () {
    stopAutoSlide();
    moveSlider(1);
    startAutoSlide(10000);
  });
  viewport.addEventListener('scroll', updateControls, { passive: true });
  window.addEventListener('resize', updateControls);
  slider.addEventListener('mouseenter', function () {
    isHovered = true;
    stopAutoSlide();
  });
  slider.addEventListener('mouseleave', function () {
    isHovered = false;
    startAutoSlide();
  });
  slider.addEventListener('focusin', stopAutoSlide);
  slider.addEventListener('focusout', function (event) {
    if (!slider.contains(event.relatedTarget)) startAutoSlide();
  });
  document.addEventListener('visibilitychange', function () {
    if (document.hidden) {
      stopAutoSlide();
    } else {
      startAutoSlide();
    }
  });
  updateControls();
  startAutoSlide();
}

/* ------------------------------------------------------------------ */
/*  Blog category and search filters
   ------------------------------------------------------------------ */
function initBlogFilters() {
  const entries = Array.from(document.querySelectorAll('[data-blog-entry]'));
  const filterButtons = Array.from(document.querySelectorAll('[data-blog-filter]'));
  const searchInput = document.querySelector('[data-blog-search]');
  const emptyState = document.querySelector('[data-blog-empty]');
  const count = document.querySelector('[data-blog-count]');

  if (!entries.length || !filterButtons.length || !searchInput || !emptyState || !count) return;

  let activeCategory = 'all';

  function updateEntries() {
    const searchTerm = searchInput.value.trim().toLocaleLowerCase();
    let visibleCount = 0;

    entries.forEach(function (entry) {
      const matchesCategory = activeCategory === 'all' || entry.getAttribute('data-category') === activeCategory;
      const matchesSearch = (entry.getAttribute('data-search') || '').includes(searchTerm);
      const isVisible = matchesCategory && matchesSearch;

      entry.hidden = !isVisible;
      if (isVisible) visibleCount += 1;
    });

    count.textContent = visibleCount + (visibleCount === 1 ? ' article' : ' articles');
    emptyState.hidden = visibleCount !== 0;
  }

  filterButtons.forEach(function (button) {
    button.addEventListener('click', function () {
      activeCategory = button.getAttribute('data-blog-filter') || 'all';

      filterButtons.forEach(function (filterButton) {
        const isActive = filterButton === button;
        filterButton.classList.toggle('is-active', isActive);
        filterButton.setAttribute('aria-pressed', isActive ? 'true' : 'false');
      });

      updateEntries();
    });
  });

  searchInput.addEventListener('input', updateEntries);
}

/* ------------------------------------------------------------------ */
/*  Header scroll effect
   ------------------------------------------------------------------ */
function initHeaderScroll() {
  const header = document.getElementById('siteHeader');
  if (!header) return;

  window.addEventListener('scroll', function () {
    if (window.scrollY > 40) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });
}

/* ------------------------------------------------------------------ */
/*  Mobile hamburger menu
   ------------------------------------------------------------------ */
function initMobileMenu() {
  const toggler = document.querySelector('.navbar-toggler');
  const collapse = document.getElementById('mainNav');
  const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

  if (!toggler || !collapse) return;

  toggler.addEventListener('click', function () {
    const isExpanded = toggler.getAttribute('aria-expanded') === 'true';
    toggler.setAttribute('aria-expanded', !isExpanded);
    collapse.classList.toggle('show');
  });

  navLinks.forEach(function (link) {
    link.addEventListener('click', function () {
      toggler.setAttribute('aria-expanded', 'false');
      collapse.classList.remove('show');
    });
  });
}

/* ------------------------------------------------------------------ */
/*  Smooth scroll for anchor links
   ------------------------------------------------------------------ */
function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const targetId = this.getAttribute('href');
      if (targetId === '#') return;

      const target = document.querySelector(targetId);
      if (!target) return;

      e.preventDefault();

      const headerOffset = 80;
      const elementPosition = target.getBoundingClientRect().top;
      const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

      window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
    });
  });
}

/* ------------------------------------------------------------------ */
/*  Back to top button
   ------------------------------------------------------------------ */
function initBackToTop() {
  const btn = document.querySelector('.back-to-top');
  if (!btn) return;

  window.addEventListener('scroll', function () {
    if (window.scrollY > 400) {
      btn.classList.add('visible');
    } else {
      btn.classList.remove('visible');
    }
  });

  btn.addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}

/* ------------------------------------------------------------------ */
/*  Scroll reveal animation
   ------------------------------------------------------------------ */
function initScrollReveal() {
  const elements = document.querySelectorAll('.reveal');
  if (!elements.length) return;

  const observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('revealed');
        }
      });
    },
    { threshold: 0.1, rootMargin: '0px 0px -50px 0px' }
  );

  elements.forEach(function (el) {
    observer.observe(el);
  });
}

/* ------------------------------------------------------------------ */
/*  FAQ accordion (vanilla JS, accessible)
   ------------------------------------------------------------------ */
function initFaqAccordion() {
  const buttons = document.querySelectorAll('.faq-button');

  buttons.forEach(function (btn) {
    btn.addEventListener('click', function () {
      const isExpanded = btn.getAttribute('aria-expanded') === 'true';
      const targetId = btn.getAttribute('aria-controls');
      const content = document.getElementById(targetId);

      const group = btn.closest('.faq-grid');
      if (group) {
        group.querySelectorAll('.faq-button').forEach(function (otherBtn) {
          if (otherBtn !== btn) {
            otherBtn.setAttribute('aria-expanded', 'false');
            const otherContent = document.getElementById(otherBtn.getAttribute('aria-controls'));
            if (otherContent) {
              otherContent.style.maxHeight = '0';
              otherContent.style.padding = '0';
            }
          }
        });
      }

      btn.setAttribute('aria-expanded', !isExpanded);
      if (content) {
        if (!isExpanded) {
          content.style.maxHeight = content.scrollHeight + 'px';
          content.style.padding = 'var(--space-4) 0 var(--space-5)';
        } else {
          content.style.maxHeight = '0';
          content.style.padding = '0';
        }
      }
    });
  });
}

/* ------------------------------------------------------------------ */
/*  Compact FAQ list
   ------------------------------------------------------------------ */
function initFaqCompactDisplay() {
  const page = document.querySelector('.page-home, .page-services');
  const grid = page && page.querySelector('#faq .faq-grid');
  const toggle = page && page.querySelector('.faq-more-toggle');
  if (!grid || !toggle) return;

  const items = grid.querySelectorAll('.faq-item');
  const initiallyVisible = 4;
  if (items.length <= initiallyVisible) return;

  grid.classList.add('is-compact');
  toggle.hidden = false;
  toggle.textContent = 'Show all ' + items.length + ' FAQs';

  toggle.addEventListener('click', function () {
    const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
    toggle.setAttribute('aria-expanded', isExpanded ? 'false' : 'true');
    grid.classList.toggle('is-expanded', !isExpanded);
    toggle.textContent = isExpanded ? 'Show all ' + items.length + ' FAQs' : 'Show fewer FAQs';
  });
}

/* ------------------------------------------------------------------ */
/*  Active navigation state on scroll
   ------------------------------------------------------------------ */
function initActiveNav() {
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.navbar-nav .nav-link[href^="#"]');
  if (!sections.length || !navLinks.length) return;

  window.addEventListener('scroll', function () {
    let current = '';
    const headerHeight = 100;

    sections.forEach(function (section) {
      const sectionTop = section.offsetTop - headerHeight;
      const sectionBottom = sectionTop + section.offsetHeight;
      if (window.scrollY >= sectionTop && window.scrollY < sectionBottom) {
        current = section.getAttribute('id');
      }
    });

    navLinks.forEach(function (link) {
      link.classList.remove('active');
      if (link.getAttribute('href') === '#' + current) {
        link.classList.add('active');
      }
    });
  });
}

/* ------------------------------------------------------------------ */
/*  Client-side form validation before server submission
   ------------------------------------------------------------------ */
function initFormValidation() {
  const forms = document.querySelectorAll('form[data-validate]');

  forms.forEach(function (form) {
    function validateField(field, showError) {
      const errorEl = field.parentElement.querySelector('.invalid-feedback');
      const isEmpty = field.required && !field.value.trim();
      const hasTypeError = field.type === 'email' && field.value.trim() && field.validity.typeMismatch;
      const isInvalid = isEmpty || hasTypeError;

      field.classList.toggle('is-invalid', showError && isInvalid);
      if (errorEl) errorEl.style.display = showError && isInvalid ? 'block' : 'none';
      return !isInvalid;
    }

    form.addEventListener('submit', function (e) {
      let isValid = true;
      const requiredFields = form.querySelectorAll('[required]');

      requiredFields.forEach(function (field) {
        if (!validateField(field, true)) isValid = false;
      });

      if (!isValid) {
        e.preventDefault();
        e.stopPropagation();
      }
    });

    form.querySelectorAll('input, select, textarea').forEach(function (field) {
      field.addEventListener('blur', function () {
        validateField(field, true);
      });

      field.addEventListener('input', function () {
        if (field.classList.contains('is-invalid')) {
          validateField(field, true);
        }
      });

      field.addEventListener('change', function () {
        if (field.classList.contains('is-invalid')) {
          validateField(field, true);
        }
      });
    });
  });
}