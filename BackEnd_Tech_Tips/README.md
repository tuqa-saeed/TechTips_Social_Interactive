# Tech Tips – Social Platform API for Tech Knowledge
# Project Overview

Tech Tips is a social-media–style platform designed for sharing technical tips and knowledge.
Users can post Tips, interact with content through comments, likes, ratings, and bookmarks, follow discussions, and receive notifications — creating an engaging community focused on technology and learning.

The project is built as a RESTful API using Laravel and follows a clean, scalable backend architecture suitable for modern web and mobile applications.

# Features

- User authentication and authorization
- User profiles and account management
- Share and manage tech tips (CRUD)
- Categories for organizing technical content
- Comments and discussions on tips
- Like and bookmark functionality
- Rating system for tips
- Notifications for user interactions
- Secure API endpoints using token-based authentication

# Technologies Used
Laravel-PHP-MySQL-Laravel Sanctum-RESTful API architecture

# Getting Started (Run Locally)
1️⃣ Clone the Repository
git clone https://github.com/your-username/TechTips_Social_Interactive.git
cd BackEnd_Tech_Tips

2️⃣ Install Dependencies
composer install

3️⃣ Environment Setup
cp .env.example .env

Update your database configuration in .env:

DB_DATABASE=
DB_USERNAME=root
DB_PASSWORD=

4️⃣ Generate Application Key
php artisan key:generate

5️⃣ Run Migrations
php artisan migrate
(Optional)
php artisan db:seed

6️⃣ Start the Server
php artisan serve

API Base URL:

http://127.0.0.1:8000/api

# Authentication

The API uses Laravel Sanctum for authentication.

Include the token in request headers:

Authorization: Bearer YOUR_ACCESS_TOKEN


# Project Scope
- Backend-focused project
- API-first design
- Built to support web or mobile front-end clients
- Designed as a scalable social platform for technical content
