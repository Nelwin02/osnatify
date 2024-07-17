<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Interface - OPD Management System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f9;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
            padding: 15px;
        }
        .sidebar .nav-link {
            color: white;
            margin: 10px 0;
        }
        .sidebar .nav-link.active {
            background-color: #495057;
        }
        .content {
            margin-left: 200px;
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <h2 class="text-center">Doctor Panel</h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-user-md"></i> Patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-calendar-alt"></i> Appointments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-file-medical"></i> Medical Records</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="container-fluid">
                <h1 class="my-4">Dashboard</h1>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-user-md"></i> Total Patients</h5>
                                <p class="card-text">1234</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-calendar-alt"></i> Upcoming Appointments</h5>
                                <p class="card-text">567</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-file-medical"></i> Pending Reports</h5>
                                <p class="card-text">89</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Recent Patients
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Condition</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>45</td>
                                    <td>Diabetes</td>
                                    <td>
                                        <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> View</button>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jane Smith</td>
                                    <td>30</td>
                                    <td>Hypertension</td>
                                    <td>
                                        <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> View</button>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
                                    </td>
                                </tr>
                                <!-- More patient rows here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
