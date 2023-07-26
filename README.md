<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Indian Gold PTL - Laravel Project

Indian Gold PTL is a Laravel-based web application that aims to provide a user-friendly platform for managing employee data and performing CRUD operations. It uses modern front-end technologies such as HTML, CSS, Bootstrap, and JavaScript for the user interface. The application also utilizes MySQL as its database backend for data storage and retrieval.

## Features

1. **Authentication:** The application provides a built-in authentication system, allowing users to register, log in, and log out securely. It employs session management to ensure restricted access to certain pages when the user is not logged in.

2. **Admin Dashboard:** The project includes an admin dashboard that enables authorized users to manage employee data and perform CRUD operations.

3. **Employee CRUD Operations:** The application provides the capability to Create, Read, Update, and Delete employee records using AJAX for a seamless user experience.

4. **Data Table with AJAX:** Employee records are displayed using a data table powered by AJAX, offering real-time updates and a responsive interface.

## Prerequisites

Before running the Indian Gold PTL project, make sure you have the following software installed:

- PHP (>= 7.2.5)
- Composer
- MySQL Database
- Web Server (Apache, Nginx, etc.)

## Installation

1. Clone the repository to your local development environment using Git or download the ZIP file and extract it.

```bash
git clone <repository-url>
```

2. Install project dependencies using Composer.

```bash
cd indian-gold-ptl
composer install
```

3. Create a new database in MySQL to store the application data.

4. Copy the `.env.example` file to `.env` and set your database credentials in the `.env` file.

```bash
cp .env.example .env
```

5. Generate a new application key.

```bash
php artisan key:generate
```

6. Run the database migrations and seed the database with initial data.

```bash
php artisan migrate --seed
```

7. Start the development server.

```bash
php artisan serve
```

8. Access the application in your web browser by visiting `http://localhost:8000`.

## Usage

- Use the provided registration and login forms to create a new user account and log in as an authenticated user.

- After logging in, the user will have access to the admin dashboard, where they can manage employee data.

- The dashboard will display a data table with all the employee records. Users can perform CRUD operations (Create, Read, Update, Delete) using the appropriate buttons in the data table.

## Contributing

We welcome contributions to improve the Indian Gold PTL project. If you find any issues or have suggestions for new features, feel free to open an issue or submit a pull request.

## License

The Indian Gold PTL project is open-source and released under the [MIT License](LICENSE). You are free to use, modify, and distribute the code as per the terms of the license.

## Acknowledgments

We would like to express our gratitude to the Laravel community and the developers of various libraries and packages that have made this project possible.

---

Note: This README file serves as a general guide to set up and use the Indian Gold PTL project. For more in-depth documentation, please refer to the project's official documentation or any specific instructions provided by the developers.

## Images
![image](https://github.com/developerMaurya/laravel-front-backend-admindashbord-login-logout-curd-ajax-loginrestrication/assets/137375643/a58b77d9-5e13-4bd7-a63b-24a362207133)

![image](https://github.com/developerMaurya/laravel-front-backend-admindashbord-login-logout-curd-ajax-loginrestrication/assets/137375643/be7b923d-a1c6-46a6-8eff-e3e9d5a2d3ae)

![image](https://github.com/developerMaurya/laravel-front-backend-admindashbord-login-logout-curd-ajax-loginrestrication/assets/137375643/bcfcc707-46d4-4df2-9eec-065428d61efd)






