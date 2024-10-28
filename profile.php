<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adharpsych";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function getInitials($name) {
    $nameParts = explode(' ', $name);
    $initials = '';

    foreach ($nameParts as $part) {
        $initials .= strtoupper(substr($part, 0, 1));
    }
    return $initials;
}
?>
<html>
    <head>
        <style>
              .avatar {
        width: 30px;
        height: 30px;
        background-color: #007bff;
        color: #ffffff;
        font-size: 20px;
        font-weight: bold;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
    }
            body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
            </style>
        </head>
        <?php
        session_start();
        ?>
    <body>
    <div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                  <?php
                                   if (isset($_SESSION['user_data'])) {
                                         $userName = $_SESSION['user_data']['username'];
                                          $userInitials = getInitials($userName);
                                        echo '<div class="avatar" style="width:50px;height:50px;font-size:35;">' . $userInitials . '</div>';
                                      }
                                     ?>
                    <div class="mt-3">
                      <h4> <?php
                                                if (isset($_SESSION['user_data'])) {
                                                  echo $_SESSION['user_data']['firstname'];
                                             }
                                              ?></h4>
                     
                      <p class="text-muted font-size-sm"> <?php
                                                if (isset($_SESSION['user_data'])) {
                                                  echo $_SESSION['user_data']['phone'];
                                             }
                                              ?></p>
                     
                      <button class="btn btn-outline-primary">My Application status</button>
                      <?php
                if($_SESSION==true)
                {

                   echo '<a href="logout.php" class="btn">Log out </a>';

                }
                
            ?>
            
                     
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php
                                                if (isset($_SESSION['user_data'])) {
                                                  echo $_SESSION['user_data']['firstname'];
                                             }
                                              ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php
                                                if (isset($_SESSION['user_data'])) {
                                                  echo $_SESSION['user_data']['email'];
                                             }
                                              ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php
                                                if (isset($_SESSION['user_data'])) {
                                                  echo $_SESSION['user_data']['phone'];
                                             }
                                              ?>
                    </div>
                  </div>
                  <hr>
                  
                
                 
                </div>
              </div>

              
                
                </div>
              </div>



            </div>
          </div>

        </div>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css'>

<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js'></script>
    </div>
        </body>
        </html>