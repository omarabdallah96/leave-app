
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

## Setup

1. Clone the repository.
2. Install dependencies:
   ```bash
   composer install
   ```
3. Run migrations:
   ```bash
   php artisan migrate:fresh --seed
   ```

## Admin credentials

- Email: `admin@admin.com`
- Password: `Admin512#`

## User credentials

- Email: `user@user.com`
- Password: `User512#`



## License

This project is open-source and available under the [MIT License](LICENSE).
