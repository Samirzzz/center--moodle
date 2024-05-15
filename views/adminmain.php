<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
  
 

    <title>Dashboard</title>

    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

    <link rel="stylesheet" href="../public/css/admin.css">

    
    <title>Manaseti</title>
</head>
<?php
include_once '..\includes\navbar.php';

    $db = Database::getInstance();
	$conn = $db->getConnection();	



?>
<style>
    
  </style>
  
<body >


              
            </div><!-- dropdown-menu -->
          </div>
        </div><!-- az-header-right -->
      </div><!-- container -->
    </div><!-- az-header -->

    <div class="az-content az-content-dashboard " style="margin-left:50px;">
      <div class="container" >
        <div class="az-content-body">
          <div class="az-dashboard-one-title">
            <div>
              <h2 class="az-dashboard-title">Hi, welcome back! <?php  echo $_SESSION["email"] ?></h2>
              <p class="az-dashboard-text">Your Admin dashboard .</p>
            </div>
            <div class="az-content-header-right">
              <div class="media">
                <div class="media-body">
                 
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media">
                
              </div><!-- media -->
             
            </div>
          </div><!-- az-dashboard-one-title -->

          <div class="az-dashboard-nav"> 
            <nav class="nav">
              <a class="nav-link active" data-toggle="tab" href="#">Overview</a>
              
            </nav>

          
          </div>

          <div class="row row-sm mg-b-20">
            <div class="col-lg-7 ht-lg-100p">
              <div class="card card-dashboard-one">
                <div class="card-header">
                  <div>
                    <h6 class="card-title">Website Audience Metrics</h6>
                    <p class="card-text">Audience to which the users belonged while on the current date range.</p>
                  </div>
                 
                </div><!-- card-header -->
                <div class="card-body">
                  <div class="card-body-top">
                    <div>
                      <label class="mg-b-0">Centers</label>
                      <h2><?php $sql = "SELECT * from center";
                    if ($result = mysqli_query($conn, $sql)) {

                        $rowcount = mysqli_num_rows( $result );
                    }
                    echo "$rowcount";    ?> </i></h2>
                    </div>
                    <div>
                      <label class="mg-b-0">Teachers</label>
                      <h2><?php $sql = "SELECT * from teacher";
                    if ($result = mysqli_query($conn, $sql)) {

                        $rowcount = mysqli_num_rows( $result );
                    }
                    echo "$rowcount";    ?> </i></h2>
                    </div>
                    <div>
                      <label class="mg-b-0">Students</label>
                      <h2><?php $sql = "SELECT * from student";
                    if ($result = mysqli_query($conn, $sql)) {

                        $rowcount = mysqli_num_rows( $result );
                    }
                    echo "$rowcount";    ?> </i></h2>
                    </div>
                   
                  </div><!-- card-body-top -->
                  <div class="flot-chart-wrapper">
                    <div id="flotChart" class="flot-chart"></div>
                  </div><!-- flot-chart-wrapper -->
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col -->
            <div class="col-lg-5 mg-t-20 mg-lg-t-0">
              <div class="row row-sm">
                <div class="col-sm-6">
                  <div class="card card-dashboard-two">
                    <div class="card-header">
                      <h6>33.50% <i class="icon ion-md-trending-up tx-success"></i> <small>18.02%</small></h6>
                      <p>Bounce Rate</p>
                    </div><!-- card-header -->
                    <div class="card-body">
                      <div class="chart-wrapper">
                        <div id="flotChart1" class="flot-chart"></div>
                      </div><!-- chart-wrapper -->
                    </div><!-- card-body -->
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-6 mg-t-20 mg-sm-t-0">
                  <div class="card card-dashboard-two">
                    <div class="card-header">
                      <h6>  
                         <?php

    $sql_student = "SELECT COUNT(*) AS student_count FROM student;";
    $result_student = mysqli_query($conn, $sql_student);
    $row_student = mysqli_fetch_assoc($result_student);
    $student_count = $row_student['student_count'];

    $sql_teacher = "SELECT COUNT(*) AS teacher_count FROM teacher;";
    $result_teacher = mysqli_query($conn, $sql_teacher);
    $row_teacher = mysqli_fetch_assoc($result_teacher);
    $teacher_count = $row_teacher['teacher_count'];

    $sql_center = "SELECT COUNT(*) AS center_count FROM center;";
    $result_center = mysqli_query($conn, $sql_center);
    $row_center = mysqli_fetch_assoc($result_center);
    $center_count = $row_center['center_count'];

    $total_users = $student_count + $teacher_count + $center_count;

    
                    echo "$total_users";    ?> </i> <i class="icon ion-md-trending-down tx-danger"></i> </h6>
                      <p>Total Users</p>
                    </div><!-- card-header -->
                    <div class="card-body">
                      <div class="chart-wrapper">
                        <div id="flotChart2" class="flot-chart"></div>
                      </div><!-- chart-wrapper -->
                    </div><!-- card-body -->
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-12 mg-t-20">
                  <div class="card card-dashboard-three">
                    <div class="card-header">
                      <p>All Sessions</p>
                      <h6><?php $sql = "SELECT * from sessions";
                    if ($result = mysqli_query($conn, $sql)) {

                        $rowcount = mysqli_num_rows( $result );
                    }
                    echo "$rowcount";    ?> </i> <small class="tx-success"><i class="icon ion-md-arrow-up"></small></h6>
                      <small>The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc.</small>
                    </div><!-- card-header -->
                    <div class="card-body">
                      <div class="chart"><canvas id="chartBar5"></canvas></div>
                    </div>
                  </div>
                </div>
              </div><!-- row -->
            </div><!--col -->
          </div><!-- row -->

          <div class="row row-sm mg-b-20">
            <div class="col-lg-4">
              <div class="card card-dashboard-pageviews">
                <div class="card-header">
                </div><!-- card-header -->
                <div class="card-body">
                   
                   <span>Date:  <?php echo date("F j, Y"); ?></span>
                 
                   
                 
                    
                </div><!-- card-body -->
              </div><!-- card -->

            </div><!-- col -->
            <div class="col-lg-8 mg-t-20 mg-lg-t-0">
              <div class="card card-dashboard-four">
                <div class="card-header">
                  <h6 class="card-title">Sessions by Channel</h6>
                </div><!-- card-header -->
                <div class="card-body row">
                  <div class="col-md-6 d-flex align-items-center">
                    <div class="chart"><canvas id="chartDonut"></canvas></div>
                  </div><!-- col -->
                  <div class="col-md-6 col-lg-5 mg-lg-l-auto mg-t-20 mg-md-t-0">
                    <div class="az-traffic-detail-item">
                      <div>
                        <span>Organic Search</span>
                        <span>1,320 <span>(25%)</span></span>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-purple wd-25p" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div><!-- progress -->
                    </div>
                    <div class="az-traffic-detail-item">
                      <div>
                        <span>Email</span>
                        <span>987 <span>(20%)</span></span>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-primary wd-20p" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                      </div><!-- progress -->
                    </div>
                    <div class="az-traffic-detail-item">
                      <div>
                        <span>Referral</span>
                        <span>2,010 <span>(30%)</span></span>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-info wd-30p" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                      </div><!-- progress -->
                    </div>
                    <div class="az-traffic-detail-item">
                      <div>
                        <span>Social</span>
                        <span>654 <span>(15%)</span></span>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-teal wd-15p" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                      </div><!-- progress -->
                    </div>
                    <div class="az-traffic-detail-item">
                      <div>
                        <span>Other</span>
                        <span>400 <span>(10%)</span></span>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-gray-500 wd-10p" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                      </div><!-- progress -->
                    </div>
                  </div><!-- col -->
                </div><!-- card-body -->
              </div><!-- card-dashboard-four -->
            </div><!-- col -->
          </div><!-- row -->

         
 
</body>
</html>