Event Booking System..

A simple event booking system built with Laravel. Users can log in, book events, and view their booking history.
Prerequisites

Before you begin, ensure you have the following installed:

    PHP 8.2

    Composer (for PHP dependency management)

    XAMPP (includes Apache, MySQL, and phpMyAdmin)

    Git (for cloning the repository)

Installation Steps
1. Install XAMPP

If you haven’t already installed XAMPP, download and install it from XAMPP’s official website. XAMPP comes with Apache, MySQL, PHP, and phpMyAdmin, which are necessary for running the Laravel application.
2. Start XAMPP Services

    Open the XAMPP Control Panel.

    Start Apache and MySQL services by clicking on the Start buttons next to them.

3. Clone the Repository

Clone the project repository from GitHub:

git clone https://github.com/Mrinmoydeb/event_booking.git

4. Move the Project to XAMPP's htdocs

Move your event_booking project folder into the htdocs directory of XAMPP. By default, this is located at:

C:\xampp\htdocs\

So, the project should be located at:

C:\xampp\htdocs\event_booking

5. Set Up the Database

    Open phpMyAdmin by going to http://localhost/phpmyadmin.


6. Configure Environment Variables

Edit the .env file located in the root of your project (C:\xampp\htdocs\event_booking\.env). Update the database configuration to match your XAMPP setup:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=event_booking 
DB_USERNAME=root         
DB_PASSWORD=            

7. Install PHP Dependencies

Open a terminal and navigate to your project directory:

cd C:\xampp\htdocs\event_booking

Then run the following command to install the PHP dependencies:

composer install

8. Generate Application Key

Run the following command to generate a new application key:

php artisan key:generate

9. Run Database Migrations

Run the database migrations to create the necessary tables in your MySQL database:

php artisan migrate

You can also populate the database with sample data:

php artisan db:seed

10. Start the Application

Run the Laravel development server by using the following command:

php artisan serve

By default, this will start the application at:

http://localhost:8000

However, since we are using XAMPP, it's better to access the application via Apache. You can now open your browser and visit:

http://localhost/event_booking/public

Booking an Event
1. View Available Events

    After logging in, navigate to the Events page where you will see a list of available events.

    Each event will display details like date, time, available seats, etc.

2. Select an Event
   

    Click on the event you want to book.
    Only logged in user can book the event make sure login first.
    You will be redirected to the event's available seats.

4. Complete the Booking

    Once you've selected your seats, click Book  to complete the booking process.

    You will get a success message.


View Booking History
1. Access Your Profile

    Once logged in, click on your Profile icon at the top-right corner of the page.

    A dropdown menu will appear with an option to view Booking History.

2. View Booking History
 
    Click Booking History from the dropdown menu. ( Only logged in user can see the booking history)

    You will see a list of all the events you’ve booked

Admin Panel
Accessing the Admin Dashboard

    Admin users can log in using their credentials.
    user: admin@gmail.com
    password: 123456

    After logging in, they will be redirected to the Admin Dashboard.

🔗 Admin URL: http://localhost/event_booking/public/admin
Manage Events

    From the dashboard, admins can:

        Create new events

        Edit existing events

        Delete events

    Manage details such as:

        Event title

        Date & time

        Venue/location

  
