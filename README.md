# Appointment Management System

This is an Appointment Management System built with Inertia.js, React, and Laravel. It provides a platform for patients to schedule and manage appointments with doctors.

/admin for adming panel 
login with user a@a.com 12345678 for patient experience amr2010mohamd2010@gmail.com for dodctor experience 

## Tech Stack

- **Frontend:**
  - Inertia.js
  - React
  - material ui


- **Backend:**
  - Laravel
  - MySQL (or your chosen database)
  - laravel admin

## Project Setup

To get the project up and running, follow these steps:

### Prerequisites

- [Node.js](https://nodejs.org/) and [NPM](https://www.npmjs.com/)
- [Composer](https://getcomposer.org/)
- PHP 7.3+ (for Laravel)
- MySQL database

### Frontend Setup

1. Navigate to the `frontend` directory.
2. Run `npm install` to install the necessary frontend dependencies.
3. Configure your API endpoints in the `.env` file.

### Backend Setup

1. Navigate to the `backend` directory.
2. Run `composer install` to install the Laravel dependencies.
3. Create a `.env` file and configure your database connection.
4. Run `php artisan migrate` to set up the database.
5. Run `php artisan serve` to start the Laravel development server.

## How I Approached the Project

In building this Appointment Management System, I followed these steps:

1. **Frontend Development:** I used Inertia.js with React to create a seamless, single-page application (SPA) that enhances the user experience.

2. **Backend Development:** Laravel was chosen for the backend due to its robust features and excellent support for building RESTful APIs.

3. **Database Design:** I designed the database schema to support the user types (Admin, Doctor, Patients) and appointment management.

4. **Authentication and Validation:** Proper form validation and authentication mechanisms, including Captcha for security, were implemented as per the requirements.

5. **User Management:** Admins can manage Doctor, Patients, and appointments, while Doctors and Patients have access to their own appointment information.

6. **User Experience:** I focused on providing a clean and user-friendly design to improve the user experience. Tailwind CSS was used for styling.

7. **Appointment Creation:** Both Admins and Patients can create appointments, with restrictions on the number of appointments they can create in a one-hour time slot.

## What I Liked

- I enjoyed working with the Inertia.js and React stack to create a dynamic and modern frontend.
- Laravel made backend development efficient with its built-in features and tools.



## Pending Tasks

- captch log in 
- guest registration 


Feel free to explore the code, test the application, and provide your feedback.

Thank you for considering my submission!

[Your Name]
[Your Contact Information]
