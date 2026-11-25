# Agrani Bank PLC — Resignation, Clearance & Settlement (Laravel)

Initial Laravel 12 application foundation implementing the confirmed resignation recovery policy and effective-dated salary foundation.

## Confirmed policy configuration

- Pay Scale-2026 effective date: **1 July 2026** (`2026-07-01`).
- Salary basis: **Basic Salary** for both service groups.
- Completed service of at least one year: 3 months' Basic Salary recovery if the required 3 months' notice is not served; otherwise no recovery.
- Service under one year: 1 month's Basic Salary recovery if the required 1 month's notice is not served; otherwise no recovery.
- One year is tested on the proposed last working date. Exactly one year belongs to the `one_year_or_more` group.

Policy defaults are seeded in `policy_parameters`; effective dates and historical salary records must be retained. Do not update or delete old salary history to apply a new scale. The included calculator accepts the applicable Basic Salary as of the last working date; salary-history resolution and central HR integration remain deployment work.

## Requirements and local setup

- PHP 8.2+
- Composer 2
- MySQL 8+ (or another Laravel-supported database configured in `.env`)

```sh
composer install
cp .env.example .env
php artisan key:generate
# Create the configured database and set DB_* values in .env
php artisan migrate --seed
php artisan test
php artisan serve
```

The API calculation endpoint is `POST /api/v1/resignation-calculations` and accepts `joining_date`, `notice_date`, `last_working_date`, and `basic_salary`. It returns a transparent calculation breakdown. This endpoint is an initial implementation foundation, not a production authorization boundary; configure SSO, RBAC, approval controls, audit logging, private document storage, and security review before real employee or financial data is used.

## Scope and next implementation modules

This commit establishes a runnable Laravel foundation, core schema, configurable policy seed, calculation service, JSON endpoint, and policy-boundary tests. It does **not** yet deliver the complete enterprise workflow specified in the project brief. Remaining modules include authentication/permissions, HR directory and service-history sync, effective-dated salary resolution and Pay Scale-2026 rates, branch routing/clearance and certificates, liability items and payment/voucher verification, Head Office approvals, PDF/Excel output, notifications, dashboards, audit/event history, deployment hardening, and end-to-end tests. Implement those before treating the system as production-ready.

All Pay Scale-2026 salary table values and approved salary policy must be supplied by Agrani Bank; none are invented here.
