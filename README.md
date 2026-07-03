# AutoPyaw

AutoPyaw is a production-ready MVP for an AI-powered Facebook Messenger assistant built for Myanmar small and medium businesses. It combines Laravel, Tailwind, Blade, and a dark-rich dashboard theme with the foundations for Facebook Page connection, knowledge management, and AI reply automation.

## What AutoPyaw does

- Private beta onboarding for invited businesses.
- Multi-tenant business isolation via `business_id` on core models.
- Facebook Page management and webhook-ready page connection flows.
- CRUD for Products, FAQs, Delivery details, and Policies.
- A polished dark admin UI with a SaaS dashboard layout.
- Future-ready AI / RAG pipeline integration points.

## Tech stack

- Backend: Laravel 12, PHP 8.2
- Frontend: Blade + TailwindCSS
- UI/UX: Dark theme, gradient cards, modern dashboard layout
- Authentication: Clerk (planned)
- Database: Supabase PostgreSQL (planned)
- Storage: Cloudflare R2 (planned)
- AI: Ollama cloud models (planned)
- Queue: Laravel Queue

## Installed UI setup

- Tailwind CSS via `@tailwindcss/vite`
- Custom dark theme in `resources/css/app.css`
- Shared layout in `resources/views/layouts/app.blade.php`
- Dashboard, product, and FAQ pages styled for a SaaS admin experience

## Local setup

1. Install PHP dependencies:
   ```bash
   composer install
   ```
2. Install JavaScript dependencies:
   ```bash
   npm install
   ```
3. Copy environment file and generate app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Configure your database and Supabase/Postgres credentials in `.env`.
5. Build assets:
   ```bash
   npm run build
   ```
6. Run migrations:
   ```bash
   php artisan migrate
   ```
7. Start the local server:
   ```bash
   php artisan serve
   ```

## Recommended environment variables

- `APP_URL`
- `APP_ENV`
- `DB_DATABASE`
- `DB_USERNAME`
- `DB_PASSWORD`
- `SUPABASE_URL`
- `SUPABASE_KEY`
- `CLOUDFLARE_R2_KEY`
- `CLOUDFLARE_R2_SECRET`
- `CLOUDFLARE_R2_BUCKET`
- `OLLAMA_API_KEY`

## UI pages included

- `resources/views/welcome.blade.php`
- `resources/views/dashboard.blade.php`
- `resources/views/products/*.blade.php`
- `resources/views/faqs/*.blade.php`
- `resources/views/layouts/app.blade.php`
- `resources/views/partials/flash.blade.php`

## Next MVP steps

1. Implement Clerk authentication and private beta invite flow.
2. Add Facebook OAuth and page token storage.
3. Build webhook controller + Messenger event queue jobs.
4. Add file upload, embedding, and retrieval service.
5. Add AI prompt orchestration with Ollama.

## License

This project is licensed under the MIT License.
