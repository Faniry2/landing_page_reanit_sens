# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Landing page for **Renaît-Sens90**, a personal transformation coaching program. The core feature is a registration form that captures leads, stores them in a database, and triggers a sequence of Brevo (email marketing API) calls: confirmation email to the subscriber, contact addition to a segmented Brevo list, and admin notification.

## Commands

**Full dev environment (server + queue + Vite hot reload in parallel):**
```bash
composer run dev
```

**First-time setup:**
```bash
composer run setup
```

**Build frontend assets:**
```bash
npm run build
```

**Run tests:**
```bash
composer run test
# or a single test file:
php artisan test --filter TestClassName
```

**Lint (Laravel Pint):**
```bash
./vendor/bin/pint
```

**Database migrations:**
```bash
php artisan migrate
php artisan migrate:fresh  # reset + re-run all
```

**Clear config cache after .env changes:**
```bash
php artisan config:clear
```

## Architecture

### Request lifecycle for form submission

`POST /inscription` → `InscriptionRequest` (validates + sanitizes) → `InscriptionController::store` → `Inscription::create` → `BrevoService` (3 async calls).

The controller responds as **JSON** when the request includes `Accept: application/json` or `X-Requested-With: XMLHttpRequest` (used by the frontend AJAX handler in `resources/js/index.js`), and as a **redirect** otherwise. This dual-mode pattern is in `InscriptionController::respond()`.

Rate limiting is applied manually at 3 attempts per IP per hour using Laravel's `RateLimiter` facade (not the route-level throttle middleware, which is commented out in `routes/web.php`).

### Brevo integration

`app/Services/BrevoService.php` wraps all Brevo API calls. It uses `config/brevo.php` which maps to `.env` variables. Required env variables:

```
BREVO_API_KEY=
BREVO_SENDER_EMAIL=
BREVO_ADMIN_EMAIL=
BREVO_REPLY_TO=
BREVO_CALENDLY_URL=
BREVO_LIST_CARTE=
BREVO_LIST_DIAGNOSTIC=
BREVO_LIST_FONDATEUR=
```

The service constructs and sends the confirmation HTML email inline (`buildConfirmationHtml`) — no Blade template is used for the transactional email sent via Brevo (the file `resources/views/emails/confirmation-carte.blade.php` exists but the active code uses the inline builder).

### Inscription types

The `Inscription` model supports `type` values: `carte_traversee`, `diagnostic_sahara`, `fondateur`. The form currently hardcodes `carte_traversee` via a hidden input. Brevo list routing in `BrevoService::ajouterContact` uses a `match` on this type.

### Frontend

- CSS: `resources/css/index.css` (page-specific, loaded via `@vite` in a `@push('styles')` stack)
- JS: `resources/js/index.js` — handles burger menu, scroll reveal with `IntersectionObserver`, smooth scroll, canvas flame animation, nav carousel for tablet breakpoint (769–1476px), Video.js player init, and the AJAX form submission
- The layout (`resources/views/layouts/app.blade.php`) always loads `app.css` and `app.js` via Vite, plus page-specific assets pushed via `@stack`
- Video.js 8.10.0 is loaded from CDN in the layout head

### Views

- `resources/views/landing/index.blade.php` — main landing page, uses `<x-nav/>` and `<x-form/>` Blade components
- `resources/views/components/nav.blade.php` — navbar + mobile menu
- `resources/views/components/form.blade.php` — registration form (CSRF protected)
- `resources/views/inscription/merci.blade.php` — thank-you page after non-AJAX submission
