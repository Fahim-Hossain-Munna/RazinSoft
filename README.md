# RazinSoft: Simple Task Management System

## Overview

RazinSoft is a task management system built with [Laravel](https://laravel.com/). It enables admins and employees to manage tasks with role-based access control. Admins have full authority over task management, while employees have limited permissions depending on their roles.

## Features

- **Task Creation & Assignment**: Admins can create, assign, edit, and delete tasks.
- **Role-based Access Control**: Managed via Laravel Gates to ensure proper permission levels for admins and employees.
- **Authentication**: Secure login and registration using [Laravel Breeze](https://laravel.com/docs/8.x/starter-kits#laravel-breeze).
- **Real-Time Updates**: Integrated with [Livewire 3](https://laravel-livewire.com/docs/3.x) to provide dynamic user interface updates without page reloads.
- **Task Permissions**:
  - Employees with task creation permissions can only create tasks.
  - Employees with assignment permissions can assign tasks but not create them.
  - Only admins can edit or delete tasks.
  - Tasks cannot be assigned if their status is pending.
- **Task Search**: A built-in search functionality for easy task management.
- **Task Inventory**: Employees can view their assigned tasks and mark them as complete.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Technologies](#technologies)
- [Contributing](#contributing)
- [License](#license)

## Installation

To get started with RazinSoft, follow the steps below:

1. Clone the repository:
    ```bash
    git clone https://github.com/Fahim-Hossain-Munna/RazinSoft.git
    ```

2. Navigate to the project directory:
    ```bash
    cd RazinSoft
    ```

3. Install PHP dependencies:
    ```bash
    composer install
    ```

4. Install JavaScript dependencies:
    ```bash
    npm install
    ```

5. Set up the environment variables:
    - Copy `.env.example` to `.env`
    - Configure your database credentials in the `.env` file

6. Run database migrations and seeders:
    ```bash
    php artisan migrate
    php artisan db:seed --class=AdminSeeder
    ```

7. The seeded admin account credentials are:
    - **Email**: admin@dev.com
    - **Password**: 12345678

8. Start the development server:
    ```bash
    php artisan serve
    ```

## Usage

Once the server is running, follow these steps to use RazinSoft:

1. Open [http://localhost:8000](http://localhost:8000) in your web browser.
2. Log in using the seeded admin credentials or register a new account.
   
### Admin Capabilities:
- Create, assign, and manage tasks.
- Manage employee roles and permissions.
- Update task statuses and oversee task workflows.

### Employee Capabilities:
- Create tasks if they have permission.
- Assign tasks if they have assignment rights.
- View their assigned tasks and mark them as complete.

## Technologies

- **[Laravel](https://laravel.com/)**: Backend framework for handling routing, tasks, and authentication.
- **[Livewire 3](https://laravel-livewire.com/docs/3.x)**: Enables dynamic user interfaces without the need for page reloads.
- **[Laravel Breeze](https://laravel.com/docs/8.x/starter-kits#laravel-breeze)**: Simple, lightweight authentication scaffolding.
- **[Tailwind CSS](https://tailwindcss.com/)**: Utility-first CSS framework for responsive and clean UI design.

## Contributing

Contributions are welcome! If you'd like to help improve RazinSoft:

- Open an issue for bugs or feature suggestions.
- Submit a pull request with bug fixes or improvements.

Please ensure your pull request is well-tested and follows the project's coding standards.

## License

This project is licensed under the MIT License. For more details, refer to the `LICENSE` file in the repository.

