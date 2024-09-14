# RazinSoft: Simple Task Management System

## Overview

RazinSoft is a task management system built with [Laravel](https://laravel.com/), designed to streamline task tracking from creation to completion. The system allows admins and employees to manage tasks with role-based permissions, ensuring efficient task delegation and execution. With real-time updates and built-in search functionality, RazinSoft helps users stay on top of their task inventory with ease.

## Features

- **Task Creation & Assignment**: Admins can create, assign, edit, and delete tasks.
- **Role-Based Access Control**: Managed using Laravel's Gate system. Admins have full control, while employees have specific permissions based on their role.
- **Authentication**: Handled using [Laravel Breeze](https://laravel.com/docs/8.x/starter-kits#laravel-breeze).
- **Real-Time Updates**: Dynamic and interactive UI powered by [Livewire 3](https://laravel-livewire.com/docs/3.x) with no need for page reloads.
- **Task Permissions**:
  - Employees with task creation permissions can create tasks.
  - Employees with assignment permissions can assign tasks but cannot create them.
  - Only admins can edit or delete tasks.
  - Tasks cannot be assigned if their status is "Pending."
- **Search Functionality**: Built-in search for better task management and organization.
- **Task Inventory**: Employees can view their assigned tasks and mark them as "Complete" when done.

## Installation

To set up and run RazinSoft locally, follow these steps:

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

5. Set up environment variables:
    - Copy `.env.example` to `.env`
    - Configure your database settings in the `.env` file

6. Run database migrations and seed the admin user:
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

Once the server is running, you can access RazinSoft via [http://localhost:8000](http://localhost:8000).

### Admin Users:
- Create, assign, edit, and delete tasks.
- Manage employee roles and permissions.
- Control the flow of tasks by updating their statuses.
- Only admins can change task statuses, and tasks cannot be assigned unless they are marked as "Pending."

### Employee Users:
- Can create or assign tasks depending on their role and permissions.
- View assigned tasks and mark them as "Complete" when finished.

## Technologies Used

- **[Laravel](https://laravel.com/)**: Backend framework for robust task management and routing.
- **[Livewire 3](https://laravel-livewire.com/docs/3.x)**: Provides real-time UI updates without page reloads.
- **[Laravel Breeze](https://laravel.com/docs/8.x/starter-kits#laravel-breeze)**: Simplified authentication and registration system.
- **[Boostrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/)**: Utility-first CSS framework for responsive and clean UI design.

## Contributing

Contributions to RazinSoft are welcome! To contribute:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and submit a pull request.
4. For major changes, please open an issue first to discuss the changes.
