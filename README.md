# Website-only extract

This folder is a copy-only extract of the landing/website parts from `script/`.
The original project was not cut or moved.

Included:

- `resources/views/landing/` - website pages
- `resources/views/layouts/landing.blade.php` - landing layout
- `resources/views/sections/` and selected layout/component partials used by the landing layout
- `routes/web.php` - only public website routes
- `app/Http/Controllers/` - website controllers
- `app/Models/` and `app/Enums/` - models/enums referenced by the website controller
- `public/landing/`, `public/img/`, `public/css/`, `public/build/` - website assets
- `resources/css/`, `resources/js/`, `package.json`, `vite.config.js`, `tailwind.config.js`, `postcss.config.js` - frontend build sources
- `lang/` - translations used by landing Blade files

Note:

This is not a complete standalone Laravel app. It is the separated website code/assets bundle. To run it independently, place these files into a Laravel project with the same helper functions/components/packages, or convert the Blade pages to static HTML.
