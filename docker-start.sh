#!/usr/bin/env bash
set -e

# Prepare storage
php artisan storage:link || true

# Database: migrate and seed demo data (SQLite file created at build time)
php artisan migrate --seed --force

# Create the demo admin account (idempotent: ignore failure if it exists)
php artisan make:filament-user --name="Demo Admin" --email="demo@damashotel.com" --password="Demo1234!" || true

# Cache configuration for production
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Serve the application on the platform-assigned port
php artisan serve --host=0.0.0.0 --port="${PORT:-10000}"
