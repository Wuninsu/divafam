# Divafam Website — Project Plan & CMS Specification

**Project summary**

Divafam is a nonprofit focused on empowering women and youth through sustainable vegetable farming. The website will serve three purposes: (1) public-facing information and storytelling, (2) program management and content updates by staff (simple CMS), and (3) a small admin dashboard for tracking trainings, beneficiaries, and media.

---

## Goals

- Provide a clean, professional public site that communicates Divafam's mission, programs, impact, and ways to get involved or donate.
- Give non-technical staff the ability to edit pages, post updates, and upload photos/videos without developer intervention.
- Track trainings, participants, and basic impact metrics in a lightweight admin dashboard.
- Make the site accessible, mobile-friendly, and easy to maintain.

---

## Target audience

- Local community members and farmers
- Potential donors and partners
- Volunteers and trainees
- Media and supporters

---

## Core features (public-facing)

- Home page with hero, key stats, featured program, and latest news
- About page (mission, vision, team, partners)
- Programs & Trainings listing with detail pages
- Stories / Blog / News section with categories and tags
- Events / Upcoming training calendar (basic list or Google Calendar embed)
- Media gallery (images & videos)
- Contact page with contact form and Google Map embed (optional)
- Donation link / Call-to-action (integration with external payment provider or simple instructions)

---

## Admin / CMS features (for staff)

- Authentication & roles (Admin, Editor)
- Simple WYSIWYG editor for pages and posts (Quill suggested — user already indicated liking Quill in past)
- Media library (upload, browse, delete)
- CRUD for Programs, Trainings, Events, Stories
- Participant/Beneficiary registration (manual entry + CSV import)
- Dashboard with simple stats: total trainings, participants, published posts, recent uploads
- Seeding command and ability to seed initial content (example pages: Terms, Privacy, About)

---

## Suggested tech stack

- **Backend:** Laravel 11 (already used in your projects)
- **Frontend:** Blade + Bootstrap 5.3 for rapid, familiar styling (or Bootstrap-styled Tailwind look if preferred)
- **Auth:** Laravel Breeze or Jetstream (Breeze for simplicity)
- **Editor:** Quill (already in your context) or Trix for simple editing
- **Media:** Laravel filesystem (public disk) with `uploads/` folder and `is_dir`/`mkdir` checks (per your preference)
- **DB:** MySQL / MariaDB
- **Optional:** Livewire for reactive admin UI if you want no-SPA but better interactivity

---

## Data model (table suggestions)

- `users` (id, name, email, password, role, profile_image, created_at, updated_at)
- `pages` (id, title, slug, type [terms|privacy|page], content, is_active)
- `posts` (id, title, slug, excerpt, content, published_at, is_active, author_id)
- `programs` (id, title, slug, description, cover_image, is_active)
- `trainings` (id, program_id, title, description, start_date, end_date, location, capacity)
- `participants` (id, training_id, name, phone, gender, age, notes, created_at)
- `media` (id, filename, type [image|video], path, alt_text, uploaded_by)
- `events` (id, title, date, location, description)
- `settings` (id, key, value) — for site-wide options like contact details, donation link

---

## Routes (examples)

- Public: `/`, `/about`, `/programs`, `/programs/{slug}`, `/trainings`, `/posts`, `/posts/{slug}`, `/contact`
- Admin (prefix `/admin`): `/admin`, `/admin/pages`, `/admin/posts`, `/admin/programs`, `/admin/trainings`, `/admin/participants`, `/admin/media`, `/admin/settings`

---

## Admin UI / Wireframe notes

- Keep the admin simple: a left sidebar with sections (Dashboard, Pages, Posts, Programs, Trainings, Participants, Media, Settings, Logout).
- Use cards on dashboard to show counts and recent items.
- Media library grid with modal preview & delete option.
- Page editor: title, slug (auto-generate but editable), WYSIWYG content, publish toggle.

---

## Seeders & initial content

Seed the following to help non-technical staff get started:
- Pages: Home, About, Programs, Contact, Terms & Conditions (type: terms), Privacy Policy (type: privacy) — each as plain text.
- Example Program: "Sustainable Vegetable Farming" with short description.
- Example Post: "Opening of community training" with sample content.

**Command suggestion**
- Add artisan commands `php artisan db:seed --class=InitialContentSeeder` and additional specific seeders like `PageSeeder` so you can seed a single type when needed.

---

## Accessibility & SEO

- Use semantic HTML and proper headings (H1 only once per page).
- Add meta title and meta description fields for pages/posts and generate sitemap.xml.
- Ensure images have `alt` text; lazy-load heavy images.

---

## Media & performance

- Store uploads on `public/uploads` and generate responsive image sizes if possible.
- Use caching for frequently requested public pages (Laravel route/cache or simple view caching).

---

## Deployment recommendations

- Host on a provider that supports Laravel (shared hosting can work but VPS/managed Laravel host recommended for queue/cron and supervisor if you need queues).
- Use `.env` for configuration and store files in `storage` linked to `public/storage`.
- Set up a backup process for database and `uploads` folder.

---

## Next steps I can do for you right now

- Scaffold a Laravel 11 project structure (routes, controllers, models, migrations) for the features above.
- Create blade templates for the public pages and admin layout using Bootstrap 5.3.
- Provide seeders for pages, programs, and a sample post (plain text content).
- Build the admin CRUD for Pages and Posts + media uploader.

**Tell me which of these you want me to start with and I will scaffold it.**

---

*Prepared for: Divafam — cultivating futures through sustainable farming.*

