This application is designed to manage user tasks.

It has a registration module, which performs data validation for email and password, such as:

- The user must be a valid email.
- The minimum password of 7 characters.
- The password must have at least one number.
- The password must have at least one capital letter.

Additionally, error messages are shown according to the validations, and the user can and must register in the application before entering the dashboard.

It was made with a responsive design and with the client's institutional colors, the user enters the "tasks" view by default.

In the content of the user model, a list of registered users is shown, although the data is sorted by id in the JSON, it is shown sorted by name (asc) and it shows the fields full name, phone, email and status.

The user can execute CRUD of tasks in the view of this module, he can create tasks for himself and assign tasks to other registered users, a notification system was also implemented which notifies the assignment of tasks by other users and the creation of tasks by the user. Username.

Access to the different application modules are aligned to the requirements of:

- The home, user and task modules are only displayed by logged in users.
- If the user has an active session, he cannot enter the login page.
- The user module can only be seen by the administrator.
- The tasks can only be viewed by the user who owns the activity and by the administrator.

In addition to the initial requirements, a CRUD system was implemented for users, tasks and roles.

The repository management flow used was Git Flow, using only the main and develop branch, in which all the development was carried out.

The entire application was made with responsive design.

In the tasks module, the functionality of assigning tasks to other users was implemented, and users can accept or reject the task, tasks also have status management.

It was implemented:

phpLaravel.
JavascriptJQuery.
MySQL.
HTML.
CSS.

Libraries:

Laravel permission.
Laravel collective HTML.
Laravel UI Stisla.
Laravel DataTables.

For the execution of the application, the db must be created in phpMyAdmin and named "torrens".

Run the migrations and seeders:

- php artisan migrate.
- php artisan db:seed.