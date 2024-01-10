<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Appointment System</title>
    <!-- Add any additional head elements, stylesheets, or scripts here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h1>Welcome to the Hospital Appointment System</h1>
            <p>Manage your appointments efficiently with our system.</p>
            <p>Get started by logging in or registering.</p>
            <a href="{{ route('auth.login') }}" class="btn btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-success">Register</a>
        </div>
    </div>
</div>

<!-- Add any additional scripts or footers here -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
