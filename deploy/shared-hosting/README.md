# Shared Hosting Deploy Notes

Use this for free PHP/MySQL hosts where the web root is fixed to `htdocs` or `public_html`.

1. Upload the Laravel project contents into the host web root.
2. Copy `deploy/shared-hosting/index.php` to the web root, replacing the default `public/index.php` layout.
3. Copy `deploy/shared-hosting/.htaccess` to the web root.
4. Copy every file and folder from `public/` into the web root, next to `index.php`.
5. Copy `deploy/shared-hosting/.env.byethost.example` to `.env` and fill in the host database values.
6. Import `db.sql` in phpMyAdmin.
7. Make `storage/` and `bootstrap/cache/` writable if the panel exposes permissions.

If the host lets you set the document root to `public/`, prefer that instead and use the original `public/index.php`.
