# User Records System

A simple web application to manage user records with status toggling.

## Features
- Add users (name and age)
- View all records in a table
- Toggle status between 0 and 1
- Simple PHP/MySQL implementation

## Requirements
- XAMPP (or any PHP/MySQL server)
- MySQL database

## Installation
1. Create database:
   ```sql
   CREATE DATABASE simple_records;
   USE simple_records;
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(50),
       age INT,
       status TINYINT DEFAULT 0
   );
   ```
2. Place `index.php` in your htdocs folder
3. Access via `http://localhost/index.php`

## How to Use
1. Enter name and age
2. Click "Submit"
3. Toggle status using the "ON/OFF" button
