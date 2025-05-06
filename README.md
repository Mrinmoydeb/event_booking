Event Booking System

A simple event booking system where users can log in, book events, and view their booking history.
Prerequisites

Before you begin, ensure you have met the following requirements:

    PHP: 7.4 or higher.

    Composer: For PHP dependency management.

    MySQL: For database.

    Git: To clone the repository.

Installation

Follow these steps to set up the project locally:
1. Clone the Repository

Clone the project from GitHub:

git clone https://github.com/Mrinmoydeb/event_booking.git

2. Navigate to the Project Directory

Go to the project folder:

cd event_booking

3. Install PHP Dependencies

Install all the required dependencies using Composer:

composer install

4. Set Up Environment File

Create a .env file based on the provided .env.example:

cp .env.example .env

Edit the .env file and configure the database connection:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=event_booking
DB_USERNAME=root
DB_PASSWORD=

5. Set Up the Database

Run the migration command to create the necessary database tables:

php artisan migrate

You can also populate the database with sample data (optional):

php artisan db:seed

6. Start the Local Development Server

Run the following command to start the development server:

php artisan serve

Your application should now be running at http://localhost:8000.
User Login
1. Register an Account

    On the homepage, click Register to create a new user account.

    Provide the necessary details like name, email, and password to create an account.

2. Login

    Once registered, click Login to log in to the application.

    Enter your email and password, then click Login.

Booking an Event
1. View Available Events

    After logging in, navigate to the Events page where you will see a list of available events.

    Each event will display details like date, time, available seats, etc.

2. Select an Event

    Click on the event you want to book.

    You will be redirected to the event's page, where you can select available seats.

3. Complete the Booking

    Once you've selected your seats, click Book Now to complete the booking process.

    You will be asked to confirm your booking details, including payment and personal information.

4. Booking Confirmation

    After a successful booking, you will see a confirmation message with your booking details.

View Booking History
1. Access Your Profile

    Once logged in, click on your Profile icon at the top-right corner of the page.

    A dropdown menu will appear with an option to view Booking History.

2. View Booking History

    Click Booking History from the dropdown menu.

    You will see a list of all the events you’ve booked, along with details like event name, booking date, and status.
