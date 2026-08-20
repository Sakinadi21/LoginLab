

# 🔐 LoginLab — Login System Testing Lab

A simple **Login System Testing Lab** built with **HTML, CSS, JavaScript, PHP, and MySQL**.
The project demonstrates a basic authentication workflow, database connectivity, login validation, login-attempt tracking, result handling, and API-based login testing.

## 📌 Overview

**LoginLab** is a small web-based authentication project designed for learning and practicing **web application development and software testing**.

Users can log in using either their **username or email address** along with a password. The system validates the credentials against a MySQL database and reports whether the login was successful or failed.

The project also records login attempts and provides a separate management page for viewing those attempts.

---

## ✨ Features

* 🔑 Username/email-based login
* 🔒 Password validation
* 🗄️ MySQL database integration
* 📊 Login attempt tracking
* ✅ Successful login detection
* ❌ Failed login detection
* 📋 Login-attempt management page
* 🔄 Login result page
* 🌐 JSON-based login API endpoint
* 🧪 Separate testing files for login functionality
* 🎨 Simple and clean user interface
* 🛡️ Prepared SQL statements for database queries

The main login form sends credentials to `login.php`, where the username/email is checked against the `users` table using a prepared statement. ([GitHub][2])

---

## 🛠️ Technologies Used

| Technology     | Purpose                                          |
| -------------- | ------------------------------------------------ |
| **HTML5**      | Login form and page structure                    |
| **CSS3**       | User interface styling                           |
| **JavaScript** | Client-side scripting/testing                    |
| **PHP**        | Server-side authentication and application logic |
| **MySQL**      | User and login-attempt data storage              |
| **JSON**       | API response format                              |

---

## 📂 Project Structure

```text
LoginLab/
│
├── index.html          # Login interface
├── login.php           # Login authentication logic
├── db.php              # MySQL database connection
├── result.php          # Displays login result
├── manage.php          # Displays login attempts
│
├── script.js            # Client-side JavaScript
├── style.css            # Login page styling
│
├── test.html            # Login/testing interface
├── test_api.php         # JSON API login testing
├── test                 # Additional testing resource
│
└── .hintrc             # Hint/linting configuration
```

The repository currently contains these application, styling, and testing files, including `index.html`, `login.php`, `db.php`, `manage.php`, `result.php`, `script.js`, `style.css`, `test.html`, and `test_api.php`. ([GitHub][1])

---

## 🔄 System Workflow

```text
                ┌──────────────────┐
                │   Login Page     │
                │    index.html    │
                └────────┬─────────┘
                         │
                    Username/Email
                     + Password
                         │
                         ▼
                ┌──────────────────┐
                │    login.php     │
                │ Authentication   │
                └────────┬─────────┘
                         │
                         ▼
                ┌──────────────────┐
                │     MySQL DB     │
                │     users        │
                └────────┬─────────┘
                         │
                  Credentials Match?
                    /           \
                  Yes            No
                   │             │
                   ▼             ▼
             ┌──────────┐   ┌──────────┐
             │Successful│   │  Failed  │
             └────┬─────┘   └────┬─────┘
                  │              │
                  └──────┬───────┘
                         ▼
                ┌──────────────────┐
                │ login_attempts   │
                │     Table        │
                └────────┬─────────┘
                         │
                         ▼
                ┌──────────────────┐
                │   result.php     │
                └──────────────────┘
```

---

## 🧩 How It Works

### 1. Login Interface

The `index.html` file provides a login form with:

* Username / Email field
* Password field
* Login button
* Link to the login-attempt management page

The form submits the credentials to `login.php` using the `POST` method. ([GitHub][2])

### 2. Authentication

`login.php` receives the submitted username/email and password.

It searches the database using:

```sql
SELECT * FROM users
WHERE username = ? OR email = ?
```

A prepared statement is used to bind the login identifier before executing the query. ([GitHub][3])

If the credentials match, the login status becomes:

```text
Successful
```

Otherwise:

```text
Failed
```

### 3. Login Attempt Logging

Every login attempt is stored in the `login_attempts` table with:

* Username/email
* Password
* Login status

The system then redirects the user to `result.php`. ([GitHub][3])

> ⚠️ **Security note:** This implementation currently stores the submitted password in the login-attempt table. For a real-world application, passwords should never be stored in plaintext. Password hashing such as PHP's `password_hash()` and `password_verify()` should be used.

### 4. Result Page

`result.php` displays either:

**Login Successful**

or

**Login Failed**

and provides navigation back to the login page and the login-attempt management page. ([GitHub][4])

### 5. Login Attempt Management

`manage.php` retrieves login attempts from the database and displays them in a table, ordered by ID in descending order so recent attempts appear first. ([GitHub][5])

### 6. API Testing

The project also includes `test_api.php`, which provides a JSON-based login endpoint.

It accepts:

```text
username
password
```

and returns a JSON response containing the submitted username and authentication status. ([GitHub][6])

Example response:

```json
{
    "username": "example",
    "status": "Successful"
}
```

---

## 🗄️ Database Configuration

The project connects to a local MySQL database named:

```text
login_system
```

The current database configuration uses:

```text
Host: localhost
Username: root
Password: empty
Database: login_system
```

This configuration is defined in `db.php`. ([GitHub][7])

### Suggested Database Tables

The application expects at least the following tables:

### `users`

| Field      | Description     |
| ---------- | --------------- |
| `id`       | User identifier |
| `username` | Username        |
| `email`    | User email      |
| `password` | User password   |

### `login_attempts`

| Field               | Description         |
| ------------------- | ------------------- |
| `id`                | Attempt identifier  |
| `username_or_email` | Login identifier    |
| `password`          | Submitted password  |
| `status`            | Successful / Failed |

---

## ⚙️ Installation & Setup

### Prerequisites

Install the following:

* **XAMPP** or another PHP development server
* **PHP**
* **MySQL**
* **Web browser**

## 🧪 Testing

The project contains dedicated testing resources such as:

```text
test.html
test_api.php
```

These can be used to test login functionality and the JSON API independently. ([GitHub][6])

### Test Cases

| Test Case                 | Input               | Expected Result    |
| ------------------------- | ------------------- | ------------------ |
| Valid username + password | Correct credentials | Login Successful   |
| Valid email + password    | Correct credentials | Login Successful   |
| Invalid username          | Unknown username    | Login Failed       |
| Invalid email             | Unknown email       | Login Failed       |
| Wrong password            | Incorrect password  | Login Failed       |
| Empty username            | No username         | Browser validation |
| Empty password            | No password         | Browser validation |
| API login                 | Valid API request   | JSON response      |
| API invalid login         | Invalid credentials | `"Failed"` status  |

---

## 🔐 Security Considerations

This project is primarily a **learning/testing project**. Before using a similar system in production, consider implementing:

* Password hashing with `password_hash()`
* Password verification with `password_verify()`
* Session-based authentication
* CSRF protection
* Input validation and sanitization
* Rate limiting
* Account lockout after repeated failures
* Secure cookies
* HTTPS
* Generic authentication error messages
* Removal of plaintext password logging
* Proper authorization for the login-attempt management page

The project already uses prepared statements for the main credential lookup, which is a good foundation for reducing SQL injection risk. ([GitHub][3])

---

## 🎯 Learning Objectives

This project can be used to understand:

* Basic web authentication
* Client-server communication
* PHP form processing
* MySQL database connectivity
* SQL queries
* Prepared statements
* Login validation
* Authentication testing
* API testing
* Login-attempt monitoring
* Basic web security concepts

---

## 🚀 Future Improvements

Possible improvements include:

* [ ] Secure password hashing
* [ ] User registration system
* [ ] PHP sessions
* [ ] Logout functionality
* [ ] Forgot-password functionality
* [ ] Account lockout
* [ ] Login rate limiting
* [ ] CAPTCHA after repeated failures
* [ ] CSRF protection
* [ ] Admin authentication for `manage.php`
* [ ] Improved API authentication
* [ ] Automated test cases
* [ ] Responsive UI
* [ ] Better error handling
* [ ] HTTPS deployment

---

## 👩‍💻 Author

**Sakina D.**

GitHub:
[https://github.com/Sakinadi21](https://github.com/Sakinadi21)

---

## 📄 License

This project is intended for **educational and testing purposes**.

You are free to modify and extend the project for learning and academic purposes.

