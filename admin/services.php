<?php
require("lib/header.php");
if (!isset($_SESSION['loggedin'])) {
    echo "<script>window.location='../../logout.php';</script>";
}
@require("../lib/drive.php");

$con = $pdo; 
$responseMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $serviceName = $_POST['serviceName'] ?? '';
    $serviceDescription = $_POST['serviceDescription'] ?? '';
    $serviceStatus = 1 ?? 0;
    $dateCreated = date("Y-m-d H:i:s");

    $iconPath = null;

    if (isset($_FILES['serviceIcon']) && $_FILES['serviceIcon']['error'] == UPLOAD_ERR_OK) {
        $uploadsDir = "../img/images/services/";
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        $iconTmpName = $_FILES['serviceIcon']['tmp_name'];
        $iconName = time() . "_" . uniqid();
        $iconPath = $uploadsDir . $iconName;

        if (!move_uploaded_file($iconTmpName, $iconPath)) {
            $iconPath = null;
        }
    }

    $stmt = $con->prepare("INSERT INTO Services (ServiceName, ServiceDescription, ServiceIcon, ServiceStatus, DateCreated) VALUES (:name, :description, :icon, :status, :created)");
    $stmt->bindParam(':name', $serviceName);
    $stmt->bindParam(':description', $serviceDescription);
    $stmt->bindParam(':icon', $iconName);
    $stmt->bindParam(':status', $serviceStatus, PDO::PARAM_INT);
    $stmt->bindParam(':created', $dateCreated);

    if ($stmt->execute()) {
        $_SESSION['responseMessage'] = '<div class="alert alert-success">Service successfully added!</div>';
    } else {
        $_SESSION['responseMessage'] = '<div class="alert alert-danger">Failed to add service.</div>';
    }

    // header("Location: " . $_SERVER['PHP_SELF']);
    // echo "<script>windows.location=$_SERVER['PHP_SELF']</script>";
    echo "<script>window.location = '{$_SERVER['PHP_SELF']}';</script>";


    exit;
}

if (isset($_SESSION['responseMessage'])) {
    $responseMessage = $_SESSION['responseMessage'];
    unset($_SESSION['responseMessage']);
}
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Service</h4>
                        <?php if (!empty($responseMessage)) echo $responseMessage; ?>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-row row">
                                <div class="form-group col-md-3">
                                    <label for="serviceName">Service Name</label>
                                    <input type="text" class="form-control" id="serviceName" name="serviceName" placeholder="Enter service name" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="serviceDescription">Service Description</label>
                                    <textarea class="form-control" id="serviceDescription" name="serviceDescription" rows="3" placeholder="Enter description" required></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="serviceIcon">Service Icon</label>
                                    <input type="file" class="form-control" id="serviceIcon" name="serviceIcon" accept="image/*" required>
                                </div>
                                <div class="form-group col-md-1 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="table-responsive pt-3">
                        <table class="table table-striped project-orders-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Service Name</th>
                                    <th>Service Description</th>
                                    <th>Service Icon</th>
                                    <th>Service Status</th>
                                    <th>Date Recorded</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cnt = 1;
                                $stmt = $con->query("SELECT * FROM Services ORDER BY DateCreated DESC");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $status = $row['ServiceStatus'] == 1 ? 'Active' : 'Inactive';
                                    echo "<tr>
                                            <td>{$cnt}</td>
                                            <td>{$row['ServiceName']}</td>
                                            <td>{$row['ServiceDescription']}</td>
                                            <td><img src='../img/images/services/{$row['ServiceIcon']}' alt='icon' style='width: 50px; height: 50px;'></td>
                                            <td>{$status}</td>
                                            <td>{$row['DateCreated']}</td>
                                          </tr>";
                                          $cnt++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="https://www.bootstrapdash.com/" class="text-muted" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">Hand-crafted & made with <i class="typcn typcn-heart-full-outline text-danger"></i></span>
                </div>
            </div>    
        </div>        
    </footer>
</div>

<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/vendors/chart.js/chart.umd.js"></script>
<script src="assets/js/jquery.cookie.js"></script>
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/template.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<script src="assets/js/dashboard.js"></script>
</body>
</html>


<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/vendors/chart.js/chart.umd.js"></script>
<script src="assets/js/jquery.cookie.js"></script>
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/template.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<script src="assets/js/dashboard.js"></script>
</body>
</html>
