# UNEP Information Technology Section Assessment using laravel.
## Note: Make sure you have git, composer and laravel installed locally on your computer first.
open a folder with an IDE of your choice and run the following:

## 1. Clone GitHub repo for this project locally
```
git clone https://github.com/Stewart-Okwaro/docPatAppointment-system.git
```

### 2. cd into your project
```
cd docPatAppointment-system
```

### 3. Install Composer Dependencies
```
composer install
```

### 4. Create a copy of your .env file
```
cp .env.example .env
```
### 5. Generate an app encryption key
```
php artisan key:generate
```
### 6. In the .env file, add the following database information to allow Laravel to connect to the database:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3406
DB_DATABASE=docpatappointment
DB_USERNAME=root
DB_PASSWORD=StewartMySQL@101
### 7.Run the application
```
php artisan serve
```
### 8.Login into app
For the email address you can use:
Reception@appointment.com  
password: 1234567
### 9.You can also register new users
### 10. For API endpoints you can use the following:
api/v1/appointments,
api/v1/doctors,
api/v1/patients



