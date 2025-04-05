# Table to Form

This project demonstrates how to dynamically convert a table into a form using Laravel livewire.

## Features

- Converts table rows into editable form fields.
- Supports dynamic updates to the table.
- Lightweight and easy to integrate.
- Built with Laravel Livewire for real-time interactivity.
- Utilizes Blade components for reusable UI elements.
- Leverages Alpine.js for lightweight JavaScript interactions.
- Includes Tailwind CSS for modern and responsive styling.

## Getting Started

To get started with this project, follow these steps:

1. Clone the repository:
    ```bash
    git clone https://github.com/NabilMasud/interactive-edit-table.git
    ```

2. Navigate to the project directory:
    ```bash
    cd your-repo
    ```

3. Install dependencies:
    ```bash
    composer install
    npm install
    ```

4. Set up your `.env` file:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. Run migrations:
    ```bash
    php artisan migrate
    ```

6. Start the development server:
    ```bash
    php artisan serve
    ```

7. Compile assets:
    ```bash
    npm run dev
    ```

Now you can access the application at `http://localhost:8000`.

## Prerequisites

Ensure you have the following installed on your system:
- PHP >= 8.1
- Composer >= 2.0
- PHP >= 8.2
- Composer >= 2.0
- Node.js >= 16.x and npm >= 8.x (refer to the `engines` field in `package.json` for exact versions)
- Laravel >= 12.x
- A database (e.g., MySQL >= 8.0, PostgreSQL >= 13)
