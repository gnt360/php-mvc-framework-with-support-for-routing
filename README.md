# php-mvc-framework-with-support-for-routing

1. run "composer install"
Create database in phpMyAdmin and add the credentials to the .env file
run this sql in the created database 
--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


run "php -S localhost:8080 in the public directory to start the project"

API end points:

Login : http://localhost:8080/api/login
params[
'email',
'password',
]

Logout : http://localhost:8080/api/logout

Create : http://localhost:8080/api/register
params[
'firstname',
'lastname',
'email',
'password',
'confirmPassword
]

