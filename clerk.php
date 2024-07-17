<?php

include('db.php');

// Form in add patient with portal process 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $guardian = $_POST['guardian'];
    $address = $_POST['address'];
    $contactnum = $_POST['contactnum'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $civil_status = $_POST['civil_status'];
    $dob = $_POST['dob'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $bloodpressure = $_POST['bloodpressure'];
    $heartrate = $_POST['heartrate'];

    $query = mysqli_query($con, "INSERT INTO patient_info (username, password, name, guardian, address, contactnum, age, sex, civil_status, dob, weight, height, bloodpressure, heartrate) VALUES ('$username', '$password', '$name', '$guardian', '$address', '$contactnum', '$age', '$sex', '$civil_status', '$dob', '$weight', '$height', '$bloodpressure', '$heartrate')");

    if ($query) {
        echo "<script>alert('Data inserted successfully')</script>";
    } else {
        echo "<script>alert('There was an error')</script>";
    }
}

// Fetch counts for dashboard
$sqlDoctors = "SELECT COUNT(*) as count FROM doctor_log";
$resultDoctors = mysqli_query($con, $sqlDoctors);
$countDoctors = mysqli_fetch_assoc($resultDoctors)['count'];

$sqlPatients = "SELECT COUNT(*) as count FROM patient_info";
$resultPatients = mysqli_query($con, $sqlPatients);
$countPatients = mysqli_fetch_assoc($resultPatients)['count'];

$sqlClerks = "SELECT COUNT(*) as count FROM clerk_log";
$resultClerks = mysqli_query($con, $sqlClerks);
$countClerks = mysqli_fetch_assoc($resultClerks)['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPD Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-vhPu1A2e9WaEfcjw+QYVKXokEEGHRUDM8JMiHMKNJ2ckb9bEo5OEqHbAm5GtMupR+SVkSWglKbWiEM3TFQsM0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* General styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            background-color: #f9f9f9;
        }

        /* Sidebar styles */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 250px;
            background-color: #34495e;
            color: #ecf0f1;
            padding-top: 20px;
            transition: width 0.3s ease;
        }

        .sidebar.hidebar {
            width: 0;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.8em;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }

        .sidebar ul li {
            padding: 15px;
            font-size: 1.2em;
        }

        .sidebar ul li a {
            color: #ecf0f1;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.3s ease;
        }

        .sidebar ul li a:hover {
            color: #3498db;
        }

        .sidebar ul li a i {
            margin-right: 10px;
        }

        .sidebar ul hr {
            margin: 0 20px;
            border: 0;
            border-top: 1px solid #ecf0f1;
        }

        /* Profile section */
        .profile-section {
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 250px;
            background-color: #2c3e50;
            padding: 10px 0;
        }

        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #fff;
            padding: 5px;
            display: inline-block;
            vertical-align: middle;
        }

        .profile-pic img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }

        .profile-section p {
            display: inline-block;
            margin: 0;
            color: #ecf0f1;
            vertical-align: middle;
            cursor: pointer;
            margin-left: 10px;
            transition: color 0.3s ease;
        }

        .profile-section p:hover {
            color: #3498db;
        }

        /* Content container styles */
        .content-container {
            margin-left: 250px;
            padding-top: 80px;
            transition: margin-left 0.3s ease;
            width: calc(100% - 250px);
        }

        .content-header {
            position: fixed;
            top: 0;
            left: 250px;
            width: calc(100% - 250px);
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            z-index: 1000;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .content-header h2 {
            color: #34495e;
            margin: 0;
        }

        .logout-button {
            background-color: #3498db;
            color: #ecf0f1;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 4px;
        }

        .logout-button:hover {
            background-color: #2980b9;
        }

        /* Card styles */
        .cards {
            display: flex;
            justify-content: space-around;
            padding: 20px;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #ecf0f1;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
            width: 30%;
        }

        .card h3 {
            color: #34495e;
            margin-bottom: 10px;
        }

        .card p {
            color: #7f8c8d;
            font-size: 1.5em;
        }

        /* Form styles */
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form input {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            width: 80%;
            max-width: 400px;
        }

        form button {
            background-color: #3498db;
            color: #ecf0f1;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 4px;
            margin-top: 10px;
        }

        form button:hover {
            background-color: #2980b9;
        }

        /* Step navigation styles */
        .step {
            display: none;
            flex-direction: column;
            align-items: center;
        }

        .step.active {
            display: flex;
        }

        .step-navigation {
            display: flex;
            justify-content: space-between;
            width: 80%;
            max-width: 400px;
        }

        .step-navigation button {
            background-color: #34495e;
        }

        .step-navigation button:hover {
            background-color: #2c3e50;
        }

        .content {
            display: none;
            padding: 20px;
        }

        .content.active {
            display: block;
        }
         /* Table styles */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #3498db;
        color: white;
    }

    td {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) td {
        background-color: #e5e5e5;
    }

    /* Link styles */
    a {
        color: #3498db;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #2980b9;
    }

    /* Responsive table */
    @media (max-width: 768px) {
        table {
            overflow-x: auto;
        }
    }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <img src="./assets/opd.png" alt="OPD Logo" style="width: 80%; display: block; margin: 0 auto; padding-bottom: 20px;">
        
        <ul>
            <li><a href="#dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li><hr>
            <li><a href="#add-patient"><i class="fas fa-user-plus"></i> Add Patient</a></li><hr>
            <li><a href="#patient-list"><i class="fas fa-users"></i> Patient List</a></li><hr>
            
        </ul>
        <div class="profile-section">
            <div class="profile-pic">
                <img src="./assets/profile-pic.jpg" alt="Profile Picture">
            </div>
            <p>Dr. John Doe</p>
        </div>
    </div>
    <div class="content-container" id="content-container">
        <div class="content-header">
            <h2>OPD Management System</h2>
            <button class="logout-button" onclick="logout()">Logout</button>
        </div>
        <div class="content active" id="dashboard">
            <div class="cards">
                <div class="card">
                    <h3>Total Doctors</h3>
                    <p><?php echo $countDoctors; ?></p>
                </div>
                <div class="card">
                    <h3>Total Patients</h3>
                    <p><?php echo $countPatients; ?></p>
                </div>
                <div class="card">
                    <h3>Total Clerks</h3>
                    <p><?php echo $countClerks; ?></p>
                </div>
            </div>
        </div>

        <div class="content" id="add-patient">
            <h2>Add Patient Information</h2>
            <form action="" method="post">
                <div class="step active" id="step1">
                    <h3>Step 1: Login Information</h3>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <div class="step-navigation">
                        <button type="button" onclick="nextStep(1)">Next</button>
                    </div>
                </div>
                <div class="step" id="step2">
                    <h3>Step 2: Personal Information</h3>
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="text" name="guardian" placeholder="Guardian" required>
                    <input type="text" name="address" placeholder="Address" required>
                    <input type="text" name="contactnum" placeholder="Contact Number" required>
                    <input type="text" name="age" placeholder="Age" required>
                    <input type="text" name="sex" placeholder="Sex" required>
                    <input type="text" name="civil_status" placeholder="Civil Status" required>
                    <input type="date" name="dob" placeholder="Date of Birth" required>
                    <div class="step-navigation">
                        <button type="button" onclick="prevStep(2)">Previous</button>
                        <button type="button" onclick="nextStep(2)">Next</button>
                    </div>
                </div>
                <div class="step" id="step3">
                    <h3>Step 3: Health Information</h3>
                    <input type="text" name="weight" placeholder="Weight" required>
                    <input type="text" name="height" placeholder="Height" required>
                    <input type="text" name="bloodpressure" placeholder="Blood Pressure" required>
                    <input type="text" name="heartrate" placeholder="Heart Rate" required>
                    <div class="step-navigation">
                        <button type="button" onclick="prevStep(3)">Previous</button>
                        <button type="submit" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="content" id="patient-list">
            <h2>Patient List</h2>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Guardian</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Civil Status</th>
                    <th>Date of Birth</th>
                    
                </tr>
                <?php
                $query = mysqli_query($con, "SELECT * FROM patient_info");
                while ($row = mysqli_fetch_array($query)) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['guardian']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['contactnum']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['sex']}</td>
                        <td>{$row['civil_status']}</td>
                        <td>{$row['dob']}</td>
                        
                        
                    </tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <script>
        function logout() {
            // Perform logout action (you need to implement this)
        }

        function nextStep(currentStep) {
            document.getElementById('step' + currentStep).classList.remove('active');
            document.getElementById('step' + (currentStep + 1)).classList.add('active');
        }

        function prevStep(currentStep) {
            document.getElementById('step' + currentStep).classList.remove('active');
            document.getElementById('step' + (currentStep - 1)).classList.add('active');
        }

        document.querySelectorAll('.sidebar ul li a').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelectorAll('.content').forEach(content => {
                    content.classList.remove('active');
                });
                document.querySelector(this.getAttribute('href')).classList.add('active');
            });
        });
    </script>
</body>
</html>