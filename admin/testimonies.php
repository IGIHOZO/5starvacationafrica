<?php
require("lib/header.php");
if (!isset($_SESSION['loggedin'])) {
    echo "<script>window.location = '../../logout.php';</script>";

}
@require("../lib/drive.php");

$con = $pdo;
$responseMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $personName = $_POST['personName'] ?? '';
    $personLocation = $_POST['personLocation'] ?? '';
    $testimonyBody = $_POST['testimonyBody'] ?? '';
    $testimonyStatus = isset($_POST['testimonyStatus']) ? 1 : 0;
    $dateCreated = date("Y-m-d H:i:s");

    $picturePath = null;

    if (isset($_FILES['personPicture']) && $_FILES['personPicture']['error'] == UPLOAD_ERR_OK) {
        $uploadsDir = "../img/images/testimonies/";
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        $pictureTmpName = $_FILES['personPicture']['tmp_name'];
        $pictureName = time() . "_" . uniqid() . ".jpg";
        $picturePath = $uploadsDir . $pictureName;

        if (!move_uploaded_file($pictureTmpName, $picturePath)) {
            $picturePath = null;
        }
    }

    $stmt = $con->prepare("INSERT INTO Testimony (TestimonyPerson, PersonPicture, TestimonyLocation, TestimonyBody, TestimonyStatus, TestimonyCreatedAt) VALUES (:name, :picture, :location, :body, :status, :created)");
    $stmt->bindParam(':name', $personName);
    $stmt->bindParam(':picture', $pictureName);
    $stmt->bindParam(':location', $personLocation);
    $stmt->bindParam(':body', $testimonyBody);
    $stmt->bindParam(':status', $testimonyStatus, PDO::PARAM_INT);
    $stmt->bindParam(':created', $dateCreated);

    if ($stmt->execute()) {
        $_SESSION['responseMessage'] = '<div class="alert alert-success">Testimony successfully added!</div>';
    } else {
        $_SESSION['responseMessage'] = '<div class="alert alert-danger">Failed to add testimony.</div>';
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
                        <h4 class="card-title">Add New Testimony</h4>
                        <?php if (!empty($responseMessage)) echo $responseMessage; ?>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-row row">
                                <div class="form-group col-md-4">
                                    <label for="personName">Person's Name</label>
                                    <input type="text" class="form-control" id="personName" name="personName" placeholder="Enter person's name" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="personLocation">Location</label>
                                    <input type="text" class="form-control" id="personLocation" name="personLocation" placeholder="Enter location" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="testimonyBody">Testimony</label>
                                    <textarea class="form-control" id="testimonyBody" name="testimonyBody" rows="3" placeholder="Enter testimony" required></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="personPicture">Picture</label>
                                    <input type="file" class="form-control" id="personPicture" name="personPicture" accept="image/*" required>
                                </div>
                                <div class="form-group col-md-2 d-flex align-items-end">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="testimonyStatus" name="testimonyStatus">
                                        <label class="form-check-label" for="testimonyStatus">Active</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 d-flex align-items-end">
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
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Testimony</th>
                                    <th>Picture</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cnt = 1;
                                $stmt = $con->query("SELECT * FROM Testimony ORDER BY TestimonyCreatedAt DESC");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $status = $row['TestimonyStatus'] == 1 ? 'Active' : 'Inactive';
                                    echo "<tr>
                                            <td>{$cnt}</td>
                                            <td>{$row['TestimonyPerson']}</td>
                                            <td>{$row['TestimonyLocation']}</td>
                                            <td>{$row['TestimonyBody']}</td>
                                            <td><img src='../img/images/testimonies/{$row['PersonPicture']}' alt='Person Picture' style='width: 50px; height: 50px;'></td>
                                            <td>{$status}</td>
                                            <td>{$row['TestimonyCreatedAt']}</td>
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
