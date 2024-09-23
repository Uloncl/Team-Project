<div align="center">

# 🕹️ Sahara: Price Tracker for Video Games and PC Components

<p>Track prices and discover deals on video games and PC components. Browse a wide range of products, manage your wishlist, and stay updated on upcoming discounts.</p>

<a href="#-introduction">Introduction</a>
<span>&nbsp;&nbsp;✦&nbsp;&nbsp;</span>
<a href="#-features">Features</a>
<span>&nbsp;&nbsp;✦&nbsp;&nbsp;</span>
<a href="#-tech-stack">Tech Stack</a>
<span>&nbsp;&nbsp;✦&nbsp;&nbsp;</span>
<a href="#-directory-structure">Directory Structure</a>
<span>&nbsp;&nbsp;✦&nbsp;&nbsp;</span>
<a href="#-getting-started">Getting Started</a>
<span>&nbsp;&nbsp;✦&nbsp;&nbsp;</span>
<a href="#-roadmap">Roadmap</a>

</div>

## 📝 Introduction

Sahara is a price tracker for video games and PC components, allowing users to browse, filter, and wishlist their favorite items. Built on the Laravel framework, the platform scrapes prices from multiple sources and aims to introduce real-time pricing soon.

## ✨ Features

-   🛒 **Browse Products**: Discover a wide range of video games and PC parts, with detailed categories.
-   🔎 **Search and Filter**: Easily find the products you’re interested in using search and advanced filters.
-   📋 **Wishlist**: Save your favorite games and PC components to your wishlist for future reference.
-   🚀 **Coming Soon** - Live Pricing: Stay updated with real-time price changes (in development).
-   🔔 **Notifications**: Get notified about price drops (coming soon).
-   🛠️ **Admin Controls**: Manage product listings and data efficiently through an admin panel.

## 🛠️ Tech Stack

-   [Laravel](https://laravel.com/) - Backend framework for robust and scalable applications.
-   [Blade](https://laravel.com/docs/11.x/blade) - Templating engine for dynamic UI generation.
-   [MySQL](https://www.mysql.com/) - Database for storing products, users, and price data.
-   [PHPUnit](https://phpunit.de/index.html) - Testing framework for ensuring code quality.
-   [Bootstrap CSS](https://getbootstrap.com/) - Used for Blade templating and responsive design.
-   [Tailwind CSS](https://tailwindcss.com/) - Utility-first CSS framework for rapid UI development.

## 📂 Project Structure

```
.
├── app                   # Application logic and controllers
├── bootstrap             # Application bootstrap files
├── config                # Configuration files for Laravel services and packages
├── database              # Migrations, seeders, and factories for database interactions
│   ├── factories         # Model factories for seeding data
│   ├── migrations        # Database migrations for creating schema
│   └── seeders           # Seeders for populating the database with initial data
├── public                # Publicly accessible files like assets
├── resources             # Blade templates and static assets (CSS, JS)
├── routes                # API and web routes definitions
├── storage               # Compiled Blade templates, logs, and file storage
├── tests                 # Unit and feature tests using PHPUnit
├── composer.json         # Composer dependencies and scripts
├── package.json          # Node.js dependencies for frontend assets and scripts
├── webpack.mix.js        # Laravel Mix configuration for compiling assets
└── .env.example          # Environment variable example file
```

## 🚀 Getting Started

### Prerequisites

-   PHP 7.3 or higher
-   MySQL database
-   Composer
-   Node.js

### Installation

1.  Clone the repository:

```bash
git clone https://github.com/SaharaApp/sahara.git
cd sahara
```

    2.	Install Composer dependencies:

```bash
composer install
```

    3.	Install NPM dependencies:

```bash
npm install
```

4. Set up environment variables by copying `.env.example` to `.env` and adding your credentials:

```bash
cp .env.example .env
```

5. Generate an application key:

```bash
php artisan key:generate
```

6. Applying database migrations to the database:

```bash
php artisan migrate
```

7. Seed the database with initial data:

```bash
php artisan db:seed
```

8. Run the local development server:

```bash
php artisan serve
```

9. Visit `http://localhost:8000` in your browser to view the application.

## ✌️ Team

-   [Aryan Prince](https://x.com/aryxnprince)
-   [Andrea La Fauci De Leo](https://github.com/Bosurgi)
-   [Lewis Mann](https://github.com/LEDMann)
-   [Lewis Johnson](https://github.com/lewisj576)

## 🎯 Roadmap

-   [ ] Add live pricing for products.
-   [ ] Implement user notifications for price drops.
-   [ ] Improve admin panel functionality.
-   [ ] Add support for price history visualization.
-   [ ] See GitHub Issues for more details.

## 🔑 License

-   [MIT License](https://github.com/Uloncl/Team-Project/blob/main/LICENSE).
