# Remote Execution Checklist

Use this checklist when the cPanel/FTP credentials are available.

## 1. Confirm Target Isolation

- Invoice Ninja has its own subdomain or domain.
- The document root points to the Invoice Ninja `public/` directory.
- The deployment path is not the Fourislands Laravel application root.

## 2. Upload

Preferred FTP upload files:

```text
invoiceninja-v5.13.26.tar
cpanel-preflight.php
env.cpanel.example
deploy-manifest.json
CPANEL_DEPLOYMENT.md
```

If `lftp` is available locally, copy `ftp-upload-template.lftp` to a private scratch file, fill in credentials, and run:

```bash
lftp -f /private/path/invoice-ninja-upload.lftp
```

Do not save the credential-filled file in the repository.

## 3. Extract

Use cPanel File Manager extraction or terminal:

```bash
cd /home/USER/invoiceninja
tar -xf invoiceninja-v5.13.26.tar
```

If the archive extracts into the current directory, continue. If it extracts into a nested directory, move the contents so `artisan`, `public/`, `storage/`, and `vendor/` are directly under the app root.

## 4. Preflight

Temporarily place `cpanel-preflight.php` in the extracted app root, then open:

```text
https://INVOICE_DOMAIN/cpanel-preflight.php
```

If the document root is correctly set to `public/`, the helper may not be web-accessible from the app root. In that case, temporarily copy it into `public/`, run the check, then delete it immediately:

```bash
cp cpanel-preflight.php public/cpanel-preflight.php
rm public/cpanel-preflight.php
```

The preflight verdict must be `PASS` before setup.

## 5. Environment

Create `.env` from `.env.example` and apply the production values:

```bash
cp .env.example .env
```

Required edits:

- `APP_URL=https://INVOICE_DOMAIN`
- `REACT_URL=https://INVOICE_DOMAIN`
- `REQUIRE_HTTPS=true`
- `APP_KEY=` generated uniquely for this installation.
- `DB_*` values from cPanel MySQL.
- `MAIL_*` values from SMTP provider.
- `QUEUE_CONNECTION=database`

## 6. Permissions

Set writable directories:

```bash
chmod -R 755 storage bootstrap/cache public/logo
```

If cPanel requires group-write permissions, use `775` only for the folders that fail write checks.

## 7. Application Setup

With terminal:

```bash
php artisan key:generate --force
php artisan optimize:clear
php artisan migrate --force
php artisan db:seed --force
php artisan optimize
```

Without terminal, use the browser installer and complete database, mail, and first admin user setup.

## 8. Cron

Add these in cPanel Cron Jobs after replacing paths:

```cron
* * * * * cd /home/USER/invoiceninja && /usr/local/bin/php artisan schedule:run >> /dev/null 2>&1
*/5 * * * * cd /home/USER/invoiceninja && /usr/local/bin/php -d register_argc_argv=On artisan queue:work --stop-when-empty >> /dev/null 2>&1
```

## 9. Functional Verification

- Login works over HTTPS.
- Dashboard loads without asset errors.
- Test email sends successfully.
- Test client can be created.
- Draft invoice can be created.
- Invoice PDF can be generated/downloaded.
- Queue cron processes queued email within five minutes.
- Scheduler cron has no errors.
- `storage/logs/laravel.log` has no fresh fatal errors.
- Any `cpanel-preflight.php` copies are deleted.
