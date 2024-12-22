<?php
require("lib/header.php");
if (!isset($_SESSION['loggedin'])) {
    echo "<script>window.location = '../../logout.php';</script>";

}
@require("../lib/drive.php");

$con = $pdo; 
$responseMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $partnerName = $_POST['partnerName'] ?? '';
    $partnerLink = $_POST['partnerLink'] ?? '';
    $partnerAddress = $_POST['partnerAddress'] ?? '';
    $partnerStatus = 1 ?? 0;
    $dateCreated = date("Y-m-d H:i:s");

    $logoPath = null;

    if (isset($_FILES['partnerLogo']) && $_FILES['partnerLogo']['error'] == UPLOAD_ERR_OK) {
        $uploadsDir = "../img/images/partners/";
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        $logoTmpName = $_FILES['partnerLogo']['tmp_name'];
        $logoName = time() . "_" . uniqid();
        $logoPath = $uploadsDir . $logoName;

        if (!move_uploaded_file($logoTmpName, $logoPath)) {
            $logoPath = null;
        }
    }

    $stmt = $con->prepare("INSERT INTO Partners (PartnerName, PartnerLogo, PartnerLink, PartnerAddress, PartnerStatus, PartnerCreatedTime) VALUES (:name, :logo, :link, :address, :status, :created)");
    $stmt->bindParam(':name', $partnerName);
    $stmt->bindParam(':logo', $logoName);
    $stmt->bindParam(':link', $partnerLink);
    $stmt->bindParam(':address', $partnerAddress);
    $stmt->bindParam(':status', $partnerStatus, PDO::PARAM_INT);
    $stmt->bindParam(':created', $dateCreated);

    if ($stmt->execute()) {
        $_SESSION['responseMessage'] = '<div class="alert alert-success">Partner successfully added!</div>';
    } else {
        $_SESSION['responseMessage'] = '<div class="alert alert-danger">Failed to add partner.</div>';
    }

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
                        <h4 class="card-title">Add New Partner</h4>
                        <?php if (!empty($responseMessage)) echo $responseMessage; ?>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-row row">
                                <div class="form-group col-md-3">
                                    <label for="partnerName">Partner Name</label>
                                    <input type="text" class="form-control" id="partnerName" name="partnerName" placeholder="Enter partner name" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="partnerLink">Partner Link</label>
                                    <input type="url" class="form-control" id="partnerLink" name="partnerLink" placeholder="Enter partner link" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="partnerAddress">Partner Address</label>
                                    <textarea class="form-control" id="partnerAddress" name="partnerAddress" rows="3" placeholder="Enter partner address" required></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="partnerLogo">Partner Logo</label>
                                    <input type="file" class="form-control" id="partnerLogo" name="partnerLogo" accept="image/*" required>
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
                                    <th>Partner Name</th>
                                    <th>Partner Link</th>
                                    <th>Partner Address</th>
                                    <th>Partner Logo</th>
                                    <th>Partner Status</th>
                                    <th>Date Recorded</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cnt = 1;
                                $stmt = $con->query("SELECT * FROM Partners ORDER BY PartnerCreatedTime DESC");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $status = $row['PartnerStatus'] == 1 ? 'Active' : 'Inactive';
                                    echo "<tr>
                                            <td>{$cnt}</td>
                                            <td>{$row['PartnerName']}</td>
                                            <td><a href='{$row['PartnerLink']}' target='_blank'>{$row['PartnerLink']}</a></td>
                                            <td>{$row['PartnerAddress']}</td>
                                            <td><img src='../img/images/partners/{$row['PartnerLogo']}' alt='logo' style='width: 50px; height: 50px;'></td>
                                            <td>{$status}</td>
                                            <td>{$row['PartnerCreatedTime']}</td>
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
