<?php  
error_reporting(E_ALL); // Report all PHP errors
ini_set('display_errors', 1); // Display errors on the page
include("header.php");  ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

        <?php include("sidebar.php");   ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-12">
                <div class="home-tab">
                  <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                      </li>
                    
                    </ul>
                  
                  </div>
                  <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="statistics-details d-flex align-items-center justify-content-between">


                          <?php
include("dbcon.php");
// Count total trips
$sqlTrips = "SELECT COUNT(*) AS total FROM registrations where status='pending'";
$resultTrips = $conn->query($sqlTrips);
$totalpending = $resultTrips->fetch_assoc()['total'];

// Count total customers
$sqlCustomers = "SELECT COUNT(*) AS total_approved FROM registrations where status='approved'";
$resultCustomers = $conn->query($sqlCustomers);
$totalapproved = $resultCustomers->fetch_assoc()['total_approved'];


?>


<div>
    <p class="statistics-title">Total Pending </p>
    <h3 class="rate-percentage"><?php echo htmlspecialchars($totalpending); ?></h3>
</div>
<div>
    <p class="statistics-title">Total Approved</p>
    <h3 class="rate-percentage"><?php echo htmlspecialchars($totalapproved); ?></h3>
</div>

                           
                           
                          </div>
                        </div>
                      </div>
                      <div class="row">
                     
                        <div class="col-lg-12 d-flex flex-column">
                          <div class="row flex-grow">
                            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                              <div class="card bg-primary card-rounded">
                                <div class="card-body pb-0">
                                  <h4 class="card-title card-title-dash text-white mb-4">WELCOME TO FIRST CLASS TOURS MANAGMENT INFORMATION SYSTEM</h4>
                                  <div class="row">
                                
                                    <div class="col-sm-8">
                                      <div class="status-summary-chart-wrapper pb-4">
                                        <canvas id="status-summary"></canvas>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                        
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-8 d-flex flex-column">
                     
                          
                          
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
          <?php include("footer.php"); ?>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets/js/dashboard.js"></script>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
  </body>
</html>