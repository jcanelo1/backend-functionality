# backend-functionality
a lightweight full-stack notes application built using php, SQLite, HTML, and JavaScript. 

This project demonstrates a simple REST-style backend API that accepts form submissions from froentend interface and stores the data in a local SQLite database.

Features
-Submit notes through a frontend form
-Send data asynchronously using JavaScript fetch()
PHP API endpoint for processing requests
-SQLite database integration
-Automatic database/table creation on first run
-Prepared SQL statements for safer database inserts

Tech Stack

Front End 
-HTML5
-Vanilla JavaScript

Backend
-PHP

Database
-SQLite

How it works
1. User submits a note through the frontend form
2. JavaScript captures the form submission
3. A POST request is sent to the PHP API endpoint
4. PHP validates and processes the request
5. Data is inserted into the SQLite database
6. API returns a JSON response to the frontend

Example Request Payload
{
      "order": "12345",
      "author": "Jair",
      "message": "Test note"
}

API Endpoint
POST / api.php
Stores a note in the SQLite database.

Request Body
{
     "Status": "Success",
     "message": "Note saved"
}

Database Schema

CREATE TABLE notes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    order_number TEXT,
    author TEXT,
    message TEXT,
    created_at TEXT DEFAULT CURRENT_TIMESTAMP
);

Running the project locally
Requirements
-PHP installed locally
-SQLite enabled in PHP
-Web browser

Start local PHP Server
Bash
php -S localhost:8000

Open in browser
http://localhost:8000/index.html

Notes
-The SQLite database file in automatically generated on first run
-The database table is created automatically if it does not exist
-Uses prepared statements to help prevent SQL injection
-Built without frameworks to focus on core backend fundamentals

Future Improvements
-GET endpoints to retrieve all notes
-Frontend note rendering
-Input validation improvements
-Better error handling
-Laravel implementation version
-Authentication / session handling

Learning Goals:
This project was built to practice for:
-REST API fundamentals
-PHP backend development
-SQLite integration
-Frontend <-> Backend coomunication
-Debugging full-stack request flow
