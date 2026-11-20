# Staging (upgrade QA)

Local Docker stack that mirrors production and runs against a copy of the
production database.

## Prerequisites

- Docker daemon running
- A production database dump (`.sql` or `.sql.gz`)
- PHP **>= 8.4.1** on the host (the lock is pinned to 8.4.1)

## Usage

```bash
mkdir -p docker/staging/db-init
cp /path/to/fourislands.sql.gz docker/staging/db-init/

docker compose -f docker-compose.yml -f docker-compose.staging.yml down -v
docker compose -f docker-compose.yml -f docker-compose.staging.yml up -d --build
```

Open http://localhost:8080 (front) and http://localhost:8080/panel/login.

If the dump contains `CREATE DATABASE`/`USE` statements that do not match
`DB_DATABASE`, either adjust those statements or set `DB_DATABASE` in the
environment before starting the stack.

## Notes

- The import runs only when the `dbdata` volume is created, hence `down -v`.
- `docker/staging/db-init/` is ignored by git; never commit a database dump.
- `.env` is excluded from the image; every setting must come from the
  environment block in the compose files.
- Set `APP_KEY` to the real production key if you need the staged sessions,
  password-reset tokens and encrypted cookies to match production.

## Smoke check

```bash
for u in / /about /services /products /blog /faq /contacts /ar /panel/login /sitemap.xml /up; do
  printf "%-16s %s\n" "$u" "$(curl -s -o /dev/null -w '%{http_code}' "http://localhost:8080$u")"
done
```

All should be `200`, except `/quote-request` which currently returns `500`
because `resources/views/frontend/quote-request.blade.php` calls
`Faq::active()` and that scope does not exist (pre-existing issue, unrelated
to the framework upgrade).
