# Mortgage calculator

Clone into the current folder and remove all unnecessary (one command):

    git clone https://github.com/Devilkas/Mortgage-calculator.git .; rm -rf trunk .gitignore readme.md .git

Or **[Download](https://github.com/Devilkas/Mortgage-calculator/archive/refs/heads/main.zip)** **Mortgage-calculator** from GitHub

# How to start Mortgage calculator
All commands run in the project folder
 1. Run `composer install` to install all dependencies
 2. Create `.env` in application root `cp .env.example .env`
 3. Run `php artisan key:generate` to generate key
 4. Run `php artisan serv` 
 5. Open link [http://127.0.0.1:8000](http://127.0.0.1:8000) (by default)