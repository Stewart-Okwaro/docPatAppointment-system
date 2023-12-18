<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment System</title>
    <!-- Add any additional head elements, stylesheets, or scripts here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Appointment System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('reception.index') }}">Patients</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('doctor.index') }}">Doctors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <!-- Add more navigation links as needed -->

        </ul>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<!-- Add any additional scripts or footers here -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
