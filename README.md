# African Executive Feature Summit

PHP application for the African Executive Feature Summit.

## Requirements

- PHP with PDO and either the `pdo_sqlite` or `pdo_mysql` extension
- Composer
- Apache with `mod_rewrite` and `.htaccess` enabled
- `rsync` for cPanel deployment

## cPanel deployment

The `.cpanel.yml` deployment task installs Composer dependencies and copies the application to `$HOME/taef.africa`. In cPanel, create or connect the repository using Git Version Control and run its deployment task. The cPanel account must provide Composer and `rsync` on its command line.

The target directory should be configured as the domain's document root. The deployment excludes local SQLite data, environment files, caches, scratch files, and repository metadata. Keep database credentials out of Git and configure them in the hosting environment.

The application defaults to SQLite. Its database file is runtime data and is intentionally not committed; the hosting account must allow PHP to write to `database/`. For MySQL, configure `DB_CONNECTION=mysql`, `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER`, and `DB_PASS` in the hosting environment, then provision the database schema separately. `database/mysql_schema.sql` contains destructive `DROP TABLE` statements and must only be used on a new/empty database unless those statements are removed first. Do not deploy a default admin password; create an admin account with a securely generated password hash.
