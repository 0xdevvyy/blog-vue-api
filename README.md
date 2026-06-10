# Personal Tech Blog Api

A simple personal tech blog built with **Laravel**.  
It uses Laravel for the backend (admin + API) and Vue.js for fetching blog data on the frontend.

---

## Tech Stack

- Laravel (Backend)
- MySQL
<!-- - Laravel Session Auth (Dashboard) -->
- Laravel API (v1)

## API Endpoints

### Posts

- `GET /api/v1/posts` → Get all posts
- `GET /api/v1/posts/{slug}` → Get single post
- `GET /api/v1/posts?tag=laravel` → Get post with a tag of laravel

### Tags

- `GET /api/v1/tags` → Get all tags
<!-- - `GET /api/v1/tags/{id}` → Get single tag -->

---


### Posts

- `GET /post/create`
- `POST /post/store`
- `GET /post/{post:id}/edit`
- `PATCH /post/{post:id}/update`
- `DELETE /post/{post:id}/delete`

### Tags

- `POST /tag/store`
- `PUT /tag/{tag}/update`
- `DELETE /tag/{tag}/delete`

---


## Installation

```bash
# Clone repository
git clone https://github.com/0xdevvyy/blog-vue-api.git

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env

# Generate app key
php artisan key:generate

# Run migrations
php artisan migrate

# Start development server
composer run dev