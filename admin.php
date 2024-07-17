<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  <?php
  session_start();
  include 'db.php'; 
  ?>

  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f6f9; /* Light background */
      margin: 0;
      padding: 0;
    }

    /* Sidebar */
    .sidebar {
      height: 100%;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #343a40; /* Dark background */
      overflow-x: hidden;
      padding-top: 20px;
      transition: width 0.3s;
      z-index: 1000; /* Ensure sidebar overlays content */
    }

    .sidebar a {
      padding: 15px;
      text-decoration: none;
      font-size: 18px;
      color: #f1f1f1; /* Light text color */
      display: block;
      transition: background 0.3s, color 0.3s;
    }

    .sidebar a:hover {
      background-color: #007bff; /* Primary color hover background */
      color: #fff; /* White text on hover */
    }

    .sidebar .closebtn {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 24px;
      color: #f1f1f1; /* Light close button color */
      cursor: pointer;
    }

    /* Main content */
    #main {
      margin-left: 250px; /* Sidebar width */
      padding: 20px;
      transition: margin-left 0.3s;
    }

    .openbtn {
      font-size: 30px;
      cursor: pointer;
      color: #343a40; /* Dark text color */
      position: fixed;
      z-index: 1001; /* Ensure button overlays sidebar */
      left: 10px;
      top: 10px;
      display: none;
    }

    /* Content containers */
    .content {
      display: none;
      margin-top: 20px;
    }

    .content.active {
      display: block;
    }

    /* Card styles */
    .card {
      background: #fff;
      padding: 20px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      margin-bottom: 20px;
      
    }

    .card i {
      font-size: 48px;
      margin-bottom: 10px;
      color: #007bff; /* Primary color */
    }

    /* Table styles */
    .table-container {
      overflow-x: auto;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    .table {
      width: 100%;
      border-collapse: collapse;
    }

    .table th, .table td {
      padding: 12px;
      text-align: left;
    }

    .table th {
      background-color: #007bff; /* Primary color */
      color: white;
      position: sticky; /* Sticky header */
      top: 0;
      z-index: 1; /* Ensure header overlays content */
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: rgba(0, 0, 0, 0.05);
    }

    /* Button styles */
    .btn {
      padding: 8px 16px;
      font-size: 16px;
      cursor: pointer;
      border-radius: 4px;
      transition: background-color 0.3s, color 0.3s;
    }

    .btn-primary {
      background-color: #007bff;
      color: white;
      border: none;
    }

    .btn-primary:hover {
      background-color: #0056b3; /* Darker shade of primary color */
    }

    .btn-danger {
      background-color: #dc3545;
      color: white;
      border: none;
    }

    .btn-danger:hover {
      background-color: #c82333; /* Darker shade of danger color */
    }

    .search-container {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      padding: 10px;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    #searchInput {
      padding: 10px;
      margin-right: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
      flex: 1; /* Take remaining space */
    }

    /* Responsive adjustments */
    @media screen and (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .sidebar a {
        float: left;
      }
      #main {
        margin-left: 0;
      }
      .openbtn {
        display: block;
      }
    }

    @media screen and (max-width: 576px) {
      .sidebar a {
        text-align: center;
        float: none;
        display: block;
      }
      .btn {
        width: 100%; /* Full width buttons */
        margin-bottom: 10px;
      }
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="javascript:void(0)" onclick="showContent('dashboard')"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="javascript:void(0)" onclick="showContent('patient')"><i class="fas fa-users"></i> Patient List</a>
    <a href="javascript:void(0)" onclick="showContent('department')"><i class="fas fa-building"></i> Department</a>
    <a href="javascript:void(0)" onclick="showContent('doctor')"><i class="fas fa-user-md"></i> Doctor Assigned</a>
    <a href="javascript:void(0)" onclick="showContent('reports')"><i class="fas fa-file-alt"></i> Reports</a>
    <a href="javascript:void(0)" onclick="showContent('logout')"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>

  <!-- Main content -->
  <div id="main">
    <span class="openbtn" onclick="openNav()">☰</span>
    
    <div id="content-container">
      <!-- Dashboard content -->
      <div id="dashboard" class="content">
        <h3>Dashboard</h3>
        <div class="row">
          <!-- PHP code to fetch and display counts -->
          <?php
            // Query to count doctors
            $sqlDoctors = "SELECT COUNT(*) as count FROM doctor_log";
            $resultDoctors = mysqli_query($con, $sqlDoctors);
            $countDoctors = mysqli_fetch_assoc($resultDoctors)['count'];

            // Query to count patients
            $sqlPatients = "SELECT COUNT(*) as count FROM patient_info";
            $resultPatients = mysqli_query($con, $sqlPatients);
            $countPatients = mysqli_fetch_assoc($resultPatients)['count'];

            // Query to count clerks (nurses)
            $sqlClerks = "SELECT COUNT(*) as count FROM clerk_log";
            $resultClerks = mysqli_query($con, $sqlClerks);
            $countClerks = mysqli_fetch_assoc($resultClerks)['count'];
          ?>

          <!-- Display counts in cards -->
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <i class="fas fa-user-md"></i>
              <h4>Doctors</h4>
              <p><?php echo $countDoctors; ?></p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <i class="fas fa-users"></i>
              <h4>Patients</h4>
              <p><?php echo $countPatients; ?></p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <i class="fas fa-user-nurse"></i>
              <h4>Clerks</h4>
              <p><?php echo $countClerks; ?></p>
            </div>
          </div>
        </div>
      </div>

      <!-- Patient list content -->
      <div id="patient" class="content">
        <h3>Patient List</h3>
        
        <div class="table-container">
          <table id="patientTable" class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Guardian</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Age</th>
                <th>Sex</th>
                <th>Civil Status</th>
                <th>Date of Birth</th>
                <th>Weight</th>
                <th>Height</th>
                <th>Blood Pressure</th>
                <th>Heart Rate</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql = "SELECT * FROM patient_info";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>".$row['id']."</td>";
                  echo "<td>".$row['username']."</td>";
                  echo "<td>".$row['name']."</td>";
                  echo "<td>".$row['guardian']."</td>";
                  echo "<td>".$row['address']."</td>";
                  echo "<td>".$row['contactnum']."</td>";
                  echo "<td>".$row['age']."</td>";
                  echo "<td>".$row['sex']."</td>";
                  echo "<td>".$row['civil_status']."</td>";
                  echo "<td>".$row['dob']."</td>";
                  echo "<td>".$row['weight']."</td>";
                  echo "<td>".$row['height']."</td>";
                  echo "<td>".$row['bloodpressure']."</td>";
                  echo "<td>".$row['heartrate']."</td>";
                  echo '<td>
                          <button class="btn btn-primary">Edit</button>
                          <button class="btn btn-danger">Delete</button>
                        </td>';
                  echo "</tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Department content -->
      <div id="department" class="content">
        <h3>Department</h3>
        <!-- Add department content here -->
      </div>

      <!-- Doctor assigned content -->
      <div id="doctor" class="content">
        <h3>Doctor Assigned</h3>
        <!-- Add doctor assigned content here -->
      </div>

      <!-- Reports content -->
      <div id="reports" class="content">
        <h3>Reports</h3>
        <!-- Add reports content here -->
      </div>

      <!-- Logout content -->
      <div id="logout" class="content">
        <h3>Logout</h3>
        <!-- Add logout content here -->
      </div>
    </div>
  </div>

  <!-- jQuery and DataTables JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <script>
    function openNav() {
      document.getElementById("sidebar").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
      document.querySelector('.openbtn').style.display = 'none';
    }

    function closeNav() {
      document.getElementById("sidebar").style.width = "0";
      document.getElementById("main").style.marginLeft = "0";
      document.querySelector('.openbtn').style.display = 'block';
    }

    function showContent(contentId) {
      var contents = document.querySelectorAll('.content');
      contents.forEach(content => content.classList.remove('active'));
      document.getElementById(contentId).classList.add('active');
    }

    $(document).ready(function() {
      $('#patientTable').DataTable();
    });

    window.onload = function() {
      showContent('dashboard'); 
    };
    
  

    
  </script>
</body>
</html>
