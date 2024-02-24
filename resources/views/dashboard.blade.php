@include('design.heading');

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
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
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <ul>
        <li><a href="#"><i class="fas fa-user"></i> New User Register</a></li>
        <li><a href="#"><i class="fas fa-book"></i> Book Management</a></li>
        <li><a href="#"><i class="fas fa-user"></i> Member Management</a></li>
        <li><a href="#"><i class="fas fa-exchange-alt"></i> Book Lending Details</a></li>
        <!-- Add more navigation links as needed -->
    </ul>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <!-- Summary Cards -->
            <div class="col-md-4">
                <div class="summary-card">
                    <h5>Total Books</h5>
                    <p>1000</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="summary-card">
                    <h5>Total Members</h5>
                    <p>500</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="summary-card">
                    <h5>Books Lent Out</h5>
                    <p>300</p>
                </div>
            </div>
        </div>
        <!-- Other sections can be added here -->
    </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Font Awesome JS (optional) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

</body>
</html>
