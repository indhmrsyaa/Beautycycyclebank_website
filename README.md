# 🌸 BeautyCycleBank Website

**BeautyCycleBank** is a web-based application developed to provide a digital platform for beauty product management and services. The website is designed with a user-friendly interface and supports dynamic data management through PHP and MySQL.

This project was developed as part of a web development project and is intended to demonstrate the implementation of a dynamic website using a PHP backend and MySQL database.

---

## 📌 Project Overview

BeautyCycleBank is a website that provides information and services related to beauty products. The system combines a web interface with a database to manage and display dynamic information.

The project was developed using **PHP, MySQL, HTML, CSS, and JavaScript** and can be run locally using **XAMPP**.

---

## ✨ Features

The BeautyCycleBank website includes several features, such as:

- 🏠 **Homepage**  
  Provides an overview of the BeautyCycleBank website and its main content.

- 👤 **User Management**  
  Supports user registration and login functionality.

- 💄 **Beauty Product Information**  
  Displays information related to beauty products.

- 🛍️ **Product Management**  
  Provides functionality for managing product-related data.

- 📋 **Data Management**  
  Uses a MySQL database to store and manage website data.

- 🔐 **Authentication**  
  Provides login functionality for accessing features that require authentication.

- 📱 **Responsive Interface**  
  Designed to provide a comfortable experience across different screen sizes.

> *Note: The features above can be adjusted according to the final functionality implemented in the current version of the project.*

---

## 🛠️ Tech Stack

| Technology | Purpose |
|------------|---------|
| **PHP** | Backend and server-side logic |
| **MySQL** | Database management |
| **HTML** | Website structure |
| **CSS** | Website styling and layout |
| **JavaScript** | Client-side interaction |
| **XAMPP** | Local development environment |
| **phpMyAdmin** | MySQL database management |
| **Git & GitHub** | Version control and project repository |

---

## 📂 Project Structure

The project contains the main website files, backend logic, styling, scripts, and database-related components.

```text
Beautycycyclebank_website/
│
├── *.php
├── css/
├── js/
├── images/
├── assets/
├── database/
└── README.md
```

> The exact folder structure may vary depending on the current version of the project.

---

## ⚙️ Requirements

Before running this project, make sure the following software is installed:

- [XAMPP](https://www.apachefriends.org/)
- PHP
- MySQL
- phpMyAdmin
- Web browser
- Git (optional, if cloning the repository)

---

## 🚀 Installation & Setup

### 1. Clone the Repository

Clone this repository into your local machine:

```bash
git clone https://github.com/indhmrsyaa/Beautycycyclebank_website.git
```

Or download the repository as a ZIP file from GitHub.

---

### 2. Move the Project to XAMPP

Move the project folder into the XAMPP `htdocs` directory.

For example:

```text
C:\xampp\htdocs\Beautycycyclebank_website
```

---

### 3. Start XAMPP

Open the **XAMPP Control Panel** and start:

- Apache
- MySQL

Both services need to be running before accessing the website.

---

### 4. Setup the Database

Open phpMyAdmin through:

```text
http://localhost/phpmyadmin
```

Create a new database according to the database configuration used by the project.

If the repository contains an SQL/database file, import that file into the newly created database using phpMyAdmin.

---

### 5. Configure Database Connection

Check the PHP file responsible for the database connection.

Update the database configuration according to your local MySQL setup.

A typical configuration looks like:

```php
$host = "localhost";
$username = "root";
$password = "";
$database = "your_database_name";
```

Make sure the database name matches the database that was created in phpMyAdmin.

---

### 6. Run the Website

After Apache and MySQL are running, open the website through:

```text
http://localhost/Beautycycyclebank_website/
```

The website should now be accessible through your local browser.

---

## 🗄️ Database

BeautyCycleBank uses **MySQL** as its database management system.

The database is used to store and manage dynamic information required by the website.

Database management can be performed using:

```text
http://localhost/phpmyadmin
```

Make sure the database configuration in the PHP files matches your local MySQL configuration.

---

## 🖥️ Website Preview

### Homepage

![BeautyCycleBank Homepage](screenshots/homepage.png)

### Login Page

![BeautyCycleBank Login](screenshots/login.png)

### Product Page

![BeautyCycleBank Product](screenshots/product.png)

> Add your actual website screenshots to a `screenshots/` folder in the repository and update the filenames above.

---

## 🎯 Project Objectives

The main objectives of developing BeautyCycleBank are:

- To implement a dynamic website using PHP.
- To implement database integration using MySQL.
- To develop a functional web-based application.
- To implement user authentication.
- To practice frontend and backend web development.
- To demonstrate the integration between a web interface and a relational database.

---

## 📚 Learning Outcomes

Through this project, several web development concepts were implemented, including:

- PHP programming
- CRUD operations
- MySQL database integration
- User authentication
- HTML and CSS implementation
- JavaScript interaction
- Local server configuration using XAMPP
- Database management using phpMyAdmin
- Version control using Git and GitHub

---

## 🔮 Future Improvements

Some potential improvements for future versions include:

- Improving the user interface and user experience.
- Adding more advanced product filtering and search functionality.
- Improving security and input validation.
- Adding additional user account features.
- Implementing online deployment.
- Optimizing the website for mobile devices.
- Improving database structure and performance.

---

## 👩‍💻 Author

**Indah Marsya**

GitHub:  
[https://github.com/indhmrsyaa](https://github.com/indhmrsyaa)

---
