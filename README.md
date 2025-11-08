Expense Tracker
Project Description

Expense Tracker is a web application for managing personal expenses.
It allows users to add, edit, and delete expenses, filter them by category or date, view total spending, and set a monthly budget.

Features
Core Functionality

Full CRUD operations for expenses.

Expense categories:
food, transport, entertainment, utilities, shopping, other.

View all expenses with sorting by date.

Display total amount of expenses.

Filter expenses by category or time period (week or month).

Validation rules:

amount must be a positive number.

category must be one of the predefined values.

Additional Features

Set a monthly budget.

Display a warning when the budget limit is exceeded.

Visualize expenses by category using Chart.js.

Export expenses to CSV.

Technologies Used

Backend: Laravel

Database: MySQL

Frontend (optional): Blade / Vue.js / Chart.js

Language: PHP 8+

Installation & Setup

Clone the repository:

git clone https://github.com/username/expense-tracker.git


Navigate to the project directory:

cd expense-tracker


Install dependencies:

composer install


Create the environment file:

cp .env.example .env


Generate the application key:

php artisan key:generate


Configure your database connection in the .env file:

DB_DATABASE=expense_tracker
DB_USERNAME=root
DB_PASSWORD=


Run migrations:

php artisan migrate


(Optional) Seed sample data:

php artisan db:seed


Start the local development server:

php artisan serve


Then visit the app at http://localhost:8000
.

API Endpoints
Method	Endpoint	Description
GET	/api/expenses	Get all expenses
POST	/api/expenses	Add a new expense
GET	/api/expenses/{id}	Get a specific expense
PUT	/api/expenses/{id}	Update an expense
DELETE	/api/expenses/{id}	Delete an expense
GET	/api/expenses/filter	Filter expenses by category or date
POST	/api/budget	Set a monthly budget
Validation Rules

amount — required, must be a positive number.

category — required, must match one of the predefined categories.

date — required, must be a valid date format (YYYY-MM-DD).
