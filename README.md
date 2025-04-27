
# Laravel Routes for Leave Management System

This repository contains the Laravel routes for a leave management system, which includes functionalities for user profiles, leave requests, and administrative controls such as managing roles, permissions, and users.

## Overview

This application provides a set of routes for authenticated users and admins. It includes the following:

- **Dashboard**: Accessible by authenticated users to view general information.
- **Profile Management**: Allows users to update, edit, or delete their profiles.
- **Leave Requests**: Users can manage their leave requests.
- **Leave Types**: Admins can manage leave types.
- **Roles and Permissions**: Admins can manage roles and permissions.
- **User Management**: Admins can manage users in the system.

## Features

- **User Dashboard**: Displays user-specific information and statistics.
- **Leave Request Form**: Allows users to submit and track their leave requests.
- **Leave Approval**: Admins can approve or deny user leave requests.
- **Role-Based Access Control**: Admins manage permissions and user roles.
- **Audit Logs**: Tracks leave requests, approvals, and user actions.

## Setup

### 1. Clone the Repository

Clone the repository to your local machine:

```bash
git clone https://github.com/your-repository-name.git
```

### 2. Create the Database

Create a database called `leave_app` in your MySQL server (or other database management system):

```sql
CREATE DATABASE leave_app;
```

### 3. Configure Environment File

Create and configure your `.env` file by copying the example provided:

```bash
cp .env.example .env
```

Update the `.env` file with your database credentials:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=leave_app
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Install Dependencies

Run the following command to install all the required dependencies:

```bash
composer install
```

### 5. Generate Application Key

Generate a unique application key:

```bash
php artisan key:generate
```

### 6. Run Migrations and Seed Database

Run the migrations and seed the database to set up the necessary tables:

```bash
php artisan migrate:fresh --seed
```

### 7. Set Permissions

Make sure the following directories have the correct permissions for Laravel to write logs and cache data:

```bash
chmod -R 775 storage bootstrap/cache
```

## Admin Credentials

Use these credentials to log in as an administrator:

- **Email**: `admin@admin.com`
- **Password**: `Admin512#`

## User Credentials

Use these credentials to log in as a regular user:

- **Email**: `user@user.com`
- **Password**: `User512#`


## License

This project is open-source and available under the [MIT License](LICENSE).
