# Invoice Ninja cPanel Deployment Runbook

Target release: Invoice Ninja `v5.13.26`

Local files prepared:

- `deploy/invoice-ninja/invoiceninja-v5.13.26.tar`
- `deploy/invoice-ninja/extracted/`
- `deploy/invoice-ninja/env.cpanel.example`
- `deploy/invoice-ninja/cpanel-preflight.php`
- `deploy/invoice-ninja/deploy-manifest.json`
- `deploy/invoice-ninja/ftp-upload-template.lftp`
- `deploy/invoice-ninja/REMOTE_EXECUTION_CHECKLIST.md`

Verified release checksum:

```text
be344fc3977394b7defda1bf636f33d42108b4045bb310e5aa91176749666dbc  invoiceninja-v5.13.26.tar
```

Local verification:

- `VERSION.txt` reports `5.13.26`.
- `php artisan --version` reports Laravel `12.62.0`.
- The archive is `192M`; extracted files are about `850M`.
- The release includes `vendor/` and compiled assets under `public/`.

## Required cPanel Access

Send these details before remote deployment:

- cPanel URL, username, and password, or hosting panel access.
- FTP/SFTP host, username, password, port, and remote path.
- Domain or subdomain for Invoice Ninja, for example `invoices.example.com`.
- Whether cPanel can set the document root to `/path/to/invoiceninja/public`.
- MySQL database name, username, password, host, and port.
- SMTP host, port, username, password, encryption, from address, and from name.
- PHP binary path if known, for example `/usr/local/bin/php` or `/opt/cpanel/ea-php82/root/usr/bin/php`.

## Server Requirements

Invoice Ninja self-hosted currently needs:

- PHP 8.2+.
- Extensions: `bcmath`, `ctype`, `imagick`, `soap`, `gd`, `mbstring`, `openssl`, `tokenizer`, `xml`, `curl`, `zip`, `gmp`, `iconv`, `mysqli`, `intl`; `saxon` is needed for e-invoice validation.
- MySQL 5.7+ or MariaDB 10.3+.
- HTTPS enabled.
- Shared hosting must allow `proc_open`, `exec`, `open_basedir`, and `fpassthru`.

## Preferred cPanel Layout

Use a separate subdomain/app root, not the existing Fourislands app.

```text
/home/USER/invoiceninja/
/home/USER/invoiceninja/public/
```

Set the cPanel document root for the invoice domain/subdomain to:

```text
/home/USER/invoiceninja/public
```

If cPanel cannot point the document root to `public`, use a dedicated folder and an `.htaccess` rewrite only as a fallback.

Do not deploy this into the current Fourislands Laravel application root. It should be isolated under its own subdomain or cPanel application directory.

## Deployment Steps

1. Create the domain/subdomain in cPanel.
2. Create a MySQL database and user, then grant all privileges on that database.
3. Upload `cpanel-preflight.php` to the target app root after extracting a test copy, visit it in the browser, and confirm the verdict is `PASS`.
4. Delete `cpanel-preflight.php` from the server after the check.
5. Upload `invoiceninja-v5.13.26.tar` to the target app root.
6. Extract the tar in cPanel File Manager or terminal.
7. Copy `.env.example` to `.env` and apply the values from `env.cpanel.example`.
8. Generate a unique app key if the browser installer does not do it:

```bash
php artisan key:generate --force
```

9. Confirm these folders are writable by PHP:

```text
storage/
bootstrap/cache/
public/logo/
```

10. Run the installer in the browser at the invoice domain, or run the artisan commands below if terminal access is available:

```bash
php artisan optimize:clear
php artisan migrate --force
php artisan db:seed --force
php artisan optimize
```

11. Add cPanel cron jobs:

```cron
* * * * * cd /home/USER/invoiceninja && /usr/local/bin/php artisan schedule:run >> /dev/null 2>&1
*/5 * * * * cd /home/USER/invoiceninja && /usr/local/bin/php -d register_argc_argv=On artisan queue:work --stop-when-empty >> /dev/null 2>&1
```

Replace `/home/USER/invoiceninja` and `/usr/local/bin/php` with the actual cPanel paths.

## Stability Checks

After deployment:

- Confirm `https://invoice-domain/setup` or the app login loads over HTTPS.
- Confirm `APP_URL` exactly matches the HTTPS domain.
- Confirm `REQUIRE_HTTPS=true`.
- Send a test email from Invoice Ninja.
- Create a test client and draft invoice.
- Generate/download an invoice PDF.
- Confirm `storage/logs/laravel.log` has no fresh fatal errors.
- Confirm cPanel cron ran at least once.
- Confirm queues are not stuck by checking email delivery and scheduled reminder behavior.
- Delete any temporary installer/preflight files from the public web path.

## FTP Notes

FTP upload of the extracted app is possible but slow and more failure-prone because the extracted release is about `850M` and contains many files. Prefer uploading `invoiceninja-v5.13.26.tar` once and extracting it through cPanel File Manager or terminal. If the host only allows FTP and no server-side extraction, upload the extracted directory and verify file counts before running setup.

Use `ftp-upload-template.lftp` only as a template. Keep any credential-filled copy outside the repository.

## Sources Checked

- Official Invoice Ninja self-host install docs.
- Official GitHub release `v5.13.26`.
