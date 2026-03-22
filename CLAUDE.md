# CLAUDE.md — Neon Zen (Bangalore)

> **Role:** You are a WordPress theme developer building a single-page landing site for Neon Zen, an electric yoga studio startup in Bangalore. Every line of code must be clean, performant, accessible, and match the Google Stitch design pixel-for-pixel.

---

## 1. PROJECT OVERVIEW

- **Business:** Neon Zen — electric yoga studio startup, Bangalore (exact location TBD)
- **Website:** Single-page landing site (custom WordPress theme)
- **Goal:** Lead generation — WhatsApp button + contact form → walk-ins
- **Design source:** Google Stitch (link to be provided per section)
- **Hosting:** Live WordPress hosting (already provisioned)
- **Theme name:** `zen-yoga`
- **Theme location:** `zen-yoga/` directory in project root

---

## 2. BRAND ESSENCE

- **Name:** Neon Zen
- **Icon:** Lightning bolt (⚡) — used with logo
- **Vibe:** Dark, electric, futuristic, high-energy. Ancient discipline meets neon-lit modernity.
- **Tagline:** "The Electric Sanctuary"
- **Values:** Intensity, transformation, immersion, flow
- **USP:** High-intensity Vinyasa fueled by immersive electronic soundscapes

### Color Palette
| Element | Hex | Usage |
|---------|-----|-------|
| Neon green (primary) | #CCFF00 | CTAs, accents, highlights, subheadings |
| Dark background | #0A0A0A | Page background, sections |
| Dark overlay | #0D0D0D | Hero overlay, card backgrounds |
| White | #FFFFFF | Body text, headings |
| Light gray | #AAAAAA | Secondary text, descriptions |
| WhatsApp green | #25D366 | WhatsApp floating button |

### Typography
- **Headlines:** Bold condensed italic (e.g., Bebas Neue, Anton, or similar — match Stitch)
- **Subheadings:** Uppercase, letter-spaced, neon green
- **Body:** Clean sans-serif (Inter, system stack)
- **Style:** ALL CAPS for headlines, sentence case for body

### What Neon Zen Is NOT
- Not calm/pastel/minimal — this is ELECTRIC
- Not a traditional yoga studio aesthetic
- No corporate buzzwords: never "state-of-the-art," "world-class," "premier"
- No stock photo energy — dark, moody, real

---

## 3. CODING STANDARDS

### PHP / WordPress
- WordPress coding standards: https://developer.wordpress.org/coding-standards/
- PHP 8.0+ compatible
- Prefix ALL functions, constants, and hooks with `zen_`
- Escape all output: `esc_html()`, `esc_attr()`, `esc_url()`, `wp_kses_post()`
- Sanitize all input: `sanitize_text_field()`, `absint()`
- Use `wp_enqueue_script()` and `wp_enqueue_style()` — NEVER hardcode `<script>` or `<link>`
- Use `get_template_directory_uri()` for asset paths
- No `query_posts()` — use `WP_Query` or `get_posts()`
- No `@import` in CSS — enqueue with dependencies instead

### CSS
- Mobile-first responsive (min-width breakpoints)
- BEM naming: `.block__element--modifier`
- CSS custom properties for all colors/fonts/spacing (defined in `variables.css`)
- Breakpoints: 480px (phone-lg), 768px (tablet), 1024px (desktop), 1280px (wide)
- No CSS frameworks (no Bootstrap, no Tailwind) — hand-written
- Use `clamp()` for fluid typography
- No `!important` unless overriding third-party plugin styles

### JavaScript
- Vanilla JS only — no jQuery
- ES6+ syntax (const/let, arrow functions, template literals)
- Intersection Observer for scroll animations
- No build step — keep it simple
- All scripts loaded in footer with `defer`

### Files
- One section = one template part in `template-parts/`
- Keep `functions.php` clean — split into `inc/` files if it exceeds 100 lines
- Assets organized: `assets/css/`, `assets/js/`, `assets/images/`, `assets/fonts/`

---

## 4. THEME FILE STRUCTURE

```
zen-yoga/
├── style.css                     # Theme metadata + base styles
├── functions.php                 # Theme setup, enqueues, includes
├── index.php                     # Fallback template
├── front-page.php                # Landing page (main template)
├── header.php                    # <head>, nav, opening <body>
├── footer.php                    # Footer, WhatsApp button, closing tags
├── screenshot.png                # Theme thumbnail (1200×900)
├── template-parts/
│   ├── section-hero.php
│   ├── section-about.php
│   ├── section-classes.php
│   ├── section-schedule.php
│   ├── section-testimonials.php
│   ├── section-contact.php
│   └── section-cta.php
├── assets/
│   ├── css/
│   │   ├── variables.css         # CSS custom properties
│   │   ├── base.css              # Reset, typography, global
│   │   ├── sections.css          # Section-specific styles
│   │   └── responsive.css        # Media queries
│   ├── js/
│   │   ├── navigation.js         # Mobile menu
│   │   ├── smooth-scroll.js      # Anchor smooth scrolling
│   │   └── animations.js         # Scroll reveal animations
│   ├── images/
│   └── fonts/
└── inc/
    ├── theme-setup.php           # add_theme_support(), menus
    └── enqueue.php               # wp_enqueue_script/style
```

---

## 5. WORDPRESS CONVENTIONS

- Landing page uses `front-page.php` (WP auto-selects this for static front page)
- WP Admin setup: Settings → Reading → "A static page" → select front page
- No page builders. No Elementor. No Divi. No Gutenberg blocks for layout.
- **Contact Form 7** for the contact form — embed via shortcode
- **WhatsApp CTA:** `<a href="https://wa.me/91XXXXXXXXXX?text=Hi%20I%27d%20like%20to%20know%20about%20classes">` — no plugin needed
- No pricing on the website. Price discussion happens in-person/WhatsApp only.

---

## 6. LEAD GENERATION

### Primary: WhatsApp
- Floating WhatsApp button in `footer.php` — always visible on mobile
- Link format: `https://wa.me/91XXXXXXXXXX?text=...`
- Phone number: [TBD — user to provide]

### Secondary: Contact Form
- Plugin: Contact Form 7
- Fields: Name (required), Phone (required), Email (optional), "Which class interests you?" (dropdown)
- Form in `section-contact.php`

### Rules
- No pricing anywhere on the site
- No free trial offers
- Goal: get them to message or walk in

---

## 7. PERFORMANCE

- Images: WebP format, `<picture>` element with JPEG fallback
- Lazy loading: `loading="lazy"` on all below-fold images
- Fonts: Self-hosted or system font stack — no Google Fonts CDN
- Scripts: All in footer, deferred
- Target: Lighthouse 90+ on Performance and Accessibility

---

## 8. BEHAVIORAL INSTRUCTIONS

**When writing theme code:** Follow WordPress coding standards. Escape output. Prefix with `zen_`. Match the Stitch design exactly.

**When creating sections:** One section at a time. Create the PHP template part + matching CSS. Test responsive. Commit.

**When asked about pricing:** Never include pricing in any page content. Deflect to WhatsApp/in-person.

**When optimizing:** Lazy-load images, minimize HTTP requests, defer JS, use system fonts where possible.

**When committing:** One logical change per commit. Descriptive messages. Never commit `.env` or credentials.

---

## 9. TOKEN EFFICIENCY RULES

These rules help the developer use Claude Code efficiently:

1. **Plan mode before implementation** — think first, code second
2. **One section per conversation turn** — never "build the whole page"
3. **Give explicit file paths** — "Edit `zen-yoga/assets/css/sections.css`" not "update the CSS"
4. **Use `/compact` every 3-4 operations** — biggest token saver
5. **Screenshot-driven development** — share one Stitch section screenshot per prompt
6. **Git commit after each section** — checkpoints for cheap rollback
7. **Subagents for parallel independent work** — CSS + JS in parallel, not dependent tasks

---

*Single source of truth for Zen yoga website development.*
