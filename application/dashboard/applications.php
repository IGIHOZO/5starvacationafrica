<?php  include("header.php");  ?>
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
 <?php
include 'dbcon.php';

// Fetch registrations from the database
$sql = "SELECT * FROM registrations ORDER BY applicant_id DESC";
$result = $conn->query($sql);
?>

<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Recorded Registrations</h4>
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <?php
                            // Display column headers dynamically
                            if ($result->num_rows > 0) {
                                $firstRow = $result->fetch_assoc();
                                foreach ($firstRow as $column => $value) {
                                    echo "<th>" . htmlspecialchars($column) . "</th>";
                                }
                                // Add new headers for the "Action," "CV," and "Request Letter" columns
                                echo "<th>Action</th>";
                                echo "<th>CV</th>";
                                echo "<th>Request Letter</th>";
                                $result->data_seek(0);
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            $counter = 1;
                            while ($row = $result->fetch_assoc()) {
                                // Assign colors based on some conditions
                                $colorClass = '';
                                if ($counter % 3 == 0) {
                                    $colorClass = 'table-danger'; // Red
                                } elseif ($counter % 3 == 1) {
                                    $colorClass = 'table-info'; // Blue
                                } else {
                                    $colorClass = 'table-success'; // Green
                                }
                                ?>
                                <tr class="<?php echo $colorClass; ?>">
                                    <td><?php echo $counter; ?></td>
                                    <?php
                                    foreach ($row as $field => $value) {
                                        if ($field == 'additional_info') {
                                            // Handle line breaks in the additional_info field
                                            echo "<td>" . nl2br(htmlspecialchars($value)) . "</td>";
                                        } else {
                                            echo "<td>" . htmlspecialchars($value) . "</td>";
                                        }
                                    }
                                    ?>
                                    <td>
                                        <?php if ($row['status'] == 'approved') { ?>
                                            <span class="badge bg-success">Approved</span>
                                        <?php } elseif ($row['status'] == 'rejected') { ?>
                                            <span class="badge bg-danger">Rejected</span>
                                        <?php } else { ?>
                                            <form method="POST" action="../approve.php" style="display:inline;">
                                                <input type="hidden" name="applicant_id" value="<?php echo $row['applicant_id']; ?>">
                                                <input type="hidden" name="action" value="approve">
                                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                            </form>
                                            <form method="POST" action="reject.php" style="display:inline;">
                                                <input type="hidden" name="applicant_id" value="<?php echo $row['applicant_id']; ?>">
                                                <input type="hidden" name="action" value="reject">
                                                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                            </form>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($row['cv_path'])) { ?>
                                            <a href="../<?php echo htmlspecialchars($row['cv_path']); ?>" target="_blank" class="btn btn-primary btn-sm" style="color:white;">View CV</a>
                                        <?php } else { ?>
                                            <span class="text-muted">No CV</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($row['request_letter_path'])) { ?>
                                            <a href="../<?php echo htmlspecialchars($row['request_letter_path']); ?>" target="_blank" class="btn btn-secondary btn-sm">View Request Letter</a>
                                        <?php } else { ?>
                                            <span class="text-muted">No Request Letter</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php
                                $counter++;
                            }
                        } else {
                            echo '<tr><td colspan="100%" class="text-center">No registrations found.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
// Close the connection
$conn->close();
?>


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