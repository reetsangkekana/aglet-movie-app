Reetsang Aglet Movie App

Overview

This project was developed as part of the Aglet Technical Assessment.

The application allows users to browse popular movies using The Movie Database (TMDb) API, authenticate with a secure login system, and manage a personal list of favourite movies. The application is responsive and built using PHP, MySQL and Bootstrap.

---

Technologies Used

- PHP 8
- MySQL
- HTML5
- CSS3
- Bootstrap 5
- JavaScript
- TMDb REST API
- XAMPP
- Git & GitHub

---

Why I Chose These Technologies

PHP

PHP was chosen because it is a reliable server-side scripting language that integrates well with MySQL. It is widely used for web application development and allows dynamic content generation and session management.

MySQL

MySQL was selected because it provides a simple and efficient way to store user accounts and favourite movie information. It integrates seamlessly with PHP and is easy to manage using phpMyAdmin.

Bootstrap

Bootstrap was used to create a responsive and consistent user interface without writing large amounts of custom CSS. This helped produce a professional-looking application that works across different screen sizes.

TMDb API

The Movie Database (TMDb) API provides reliable movie information, including titles, posters, release dates and other metadata. Using the API allowed the application to display real-time movie information without maintaining a local movie database.
---

Project Structure

```
aglet-movie-app/

assets/
includes/
index.php
login.php
logout.php
favourites.php
addFavourite.php
removeFavourite.php
contact.php
database.sql
README.md
```

---

Setup Instructions

Requirements

- PHP 8 or later
- MySQL
- XAMPP
- Web browser
- TMDb API Key

---

Installation

### 1. Clone the repository

```bash
git clone https://github.com/reetsangkekana/aglet-movie-app.git
```

or download the ZIP file from GitHub.

---

### 2. Move the project

Copy the project folder into:

```
xampp/htdocs/
```

---

### 3. Start XAMPP

Open XAMPP Control Panel and start:

- Apache
- MySQL

---

### 4. Import the database

Open:

```
http://localhost/phpmyadmin
```

Create a database (for example `movie_app`).

Click **Import**.

Select:

```
database.sql
```

Click **Go**.

---

6. Run the project

Open your browser and navigate to:

```
http://localhost/aglet-movie-app/
```

---

# Default Login

Username

```
jointheteam
```

Password

```
@TeamAglet
```

---

# My Approach

I approached this assessment by first setting up the project structure before implementing functionality.

The first step was integrating the TMDb API to display popular movies. Once movie data was successfully retrieved, I focused on creating a clean and responsive user interface using Bootstrap.

Next, I implemented user authentication using PHP sessions and password hashing to ensure secure login functionality.

After authentication was complete, I developed the favourites feature using MySQL. Prepared statements were used throughout the application to protect against SQL injection and improve security.

Finally, I added a contact page and organised the project into reusable components using header and footer includes to reduce code duplication and improve maintainability.

This incremental approach allowed each feature to be tested individually before moving on to the next one, resulting in a stable and maintainable application.

---

# Security

The application includes basic security practices:

- Passwords are stored using PHP's `password_hash()`.
- User authentication is managed using PHP Sessions.
- SQL queries use prepared statements to reduce SQL injection risks.
- Users can only view and modify their own favourites.


