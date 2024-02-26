<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #343a40;
            color: #ffffff;
            padding-top: 60px;
        }
        .sidebar img {
            width: 200px; /* Adjust as needed */
            margin: 20px auto; /* Center the image */
            display: block;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px;
            border-bottom: 1px solid #ffffff;
        }
        .sidebar ul li a {
            color: #ffffff;
            text-decoration: none;
        }
        .sidebar ul li a:hover {
            color: #ffffff;
            background-color: #007bff;
        }
        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .summary-card {
            background-color: #ffffff;
            padding: 20px;
            margin-top: 50px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="sidebar">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbUOJye6SYiYCKVTYeYLzUme9zrc59H1SnzE0B6cK58V1al9bwlhP6-fwqjZ0kpp1mWnk&usqp=CAU" alt="Library Logo">
    <ul>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                Book Management
            </button>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item active" href="/create">Add Book</a></li>
                <li><a class="dropdown-item" href="#">View Books</a></li>
                <li><a class="dropdown-item" href="#">Update Book Details</a></li>
                <li><a class="dropdown-item" href="#">Destroy</a></li>
            </ul>
        </div>

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">Member Management
            </button>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item active" href="/create">Add Member</a></li>
                <li><a class="dropdown-item" href="# >View Members</a></li>
                <li><a class="dropdown-item" href="#">Update Member and Delete Details</a></li>
            </ul>
        </div>

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">Book Lending Details</button>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">

            </ul>
        </div>
    </ul>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">

            <!-- Summary Cards -->
            <div class="col-md-4 mt-5">
                <div class="summary-card">
                    <h5>Total Books</h5>
                    <!-- Add your content here -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="summary-card">
                    <h5>Total Members</h5>
                    <!-- Add your content here -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="summary-card">
                    <h5>Books Lent Out</h5>
                    <!-- Add your content here -->
                </div>
            </div>
        </div>
        <!-- Other sections can be added here -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-w55S7rnuH+OsRnLG3B/O6z0zfOMf8kX55mFFslvON9g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.3/umd/popper.min.js"></script>
<!-- Bootstrap JS (optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<!-- Font Awesome JS (optional) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

</body>
</html>
