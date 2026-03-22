-- ============================================
-- Online Flight Ticketing System - Database Schema
-- ============================================
-- Run this script in MySQL/MariaDB to set up the database.
-- Prerequisites: MySQL 5.7+ or MariaDB 10.3+

CREATE DATABASE IF NOT EXISTS pbl;
USE pbl;

-- Customers table: stores passenger booking information
CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    dob DATE NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    contactNumber VARCHAR(15) NOT NULL,
    email VARCHAR(150) NOT NULL,
    passportNo VARCHAR(20),
    aadhaarNo VARCHAR(12),
    mealPreferences VARCHAR(50),
    flightTiming VARCHAR(50),
    fileUpload VARCHAR(255),
    nationality VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
