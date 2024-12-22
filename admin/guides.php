<?php
require("lib/header.php");
if (!isset($_SESSION['loggedin'])) {
    echo "<script>window.location = '../../logout.php';</script>";

}
@require("../lib/drive.php");

$con = $pdo; 
$responseMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guideFname = $_POST['guideFname'] ?? '';
    $guideLname = $_POST['guideLname'] ?? '';
    $guideSpecialization = $_POST['guideSpecialization'] ?? '';
    $guideFacebook = $_POST['guideFacebook'] ?? '';
    $guideTwitter = $_POST['guideTwitter'] ?? '';
    $guideInstagram = $_POST['guideInstagram'] ?? '';
    $guideStatus = 1; // Active by default
    $dateCreated = date("Y-m-d H:i:s");

    $picturePath = null;

    if (isset($_FILES['guidePicture']) && $_FILES['guidePicture']['error'] == UPLOAD_ERR_OK) {
        $uploadsDir = "../img/images/guides/";
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        $pictureTmpName = $_FILES['guidePicture']['tmp_name'];
        $pictureName = time() . "_" . uniqid() . ".jpg";
        $picturePath = $uploadsDir . $pictureName;

        if (!move_uploaded_file($pictureTmpName, $picturePath)) {
            $picturePath = null;
        }
    }

    $stmt = $con->prepare("INSERT INTO Guides (GuideFname, GuideLname, GuideSpecialization, GuidePicture, GuideFacebook, GuideTwitter, GuideInstagram, GuideStatus, GuideDateCreated) VALUES (:fname, :lname, :specialization, :picture, :facebook, :twitter, :instagram, :status, :created)");
    $stmt->bindParam(':fname', $guideFname);
    $stmt->bindParam(':lname', $guideLname);
    $stmt->bindParam(':specialization', $guideSpecialization);
    $stmt->bindParam(':picture', $pictureName);
    $stmt->bindParam(':facebook', $guideFacebook);
    $stmt->bindParam(':twitter', $guideTwitter);
    $stmt->bindParam(':instagram', $guideInstagram);
    $stmt->bindParam(':status', $guideStatus, PDO::PARAM_INT);
    $stmt->bindParam(':created', $dateCreated);

    if ($stmt->execute()) {
        $_SESSION['responseMessage'] = '<div class="alert alert-success">Guide successfully added!</div>';
    } else {
        $_SESSION['responseMessage'] = '<div class="alert alert-danger">Failed to add guide.</div>';
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
                        <h4 class="card-title">Add New Guide</h4>
                        <?php if (!empty($responseMessage)) echo $responseMessage; ?>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-row row">
                                <div class="form-group col-md-2">
                                    <label for="guideFname">First Name</label>
                                    <input type="text" class="form-control" id="guideFname" name="guideFname" placeholder="Enter first name" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="guideLname">Last Name</label>
                                    <input type="text" class="form-control" id="guideLname" name="guideLname" placeholder="Enter last name" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="guideSpecialization">Specialization</label>
                                    <input type="text" class="form-control" id="guideSpecialization" name="guideSpecialization" placeholder="Enter specialization" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="guidePicture">Picture</label>
                                    <input type="file" class="form-control" id="guidePicture" name="guidePicture" accept="image/*">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="guideFacebook">Facebook</label>
                                    <input type="url" class="form-control" id="guideFacebook" name="guideFacebook" placeholder="Facebook link">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="guideTwitter">Twitter</label>
                                    <input type="url" class="form-control" id="guideTwitter" name="guideTwitter" placeholder="Twitter link">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="guideInstagram">Instagram</label>
                                    <input type="url" class="form-control" id="guideInstagram" name="guideInstagram" placeholder="Instagram link">
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
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Specialization</th>
                                    <th>Picture</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Instagram</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cnt = 1;
                                $stmt = $con->query("SELECT * FROM Guides ORDER BY GuideDateCreated DESC");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $status = $row['GuideStatus'] == 1 ? 'Active' : 'Inactive';
                                    $picturePath = $row['GuidePicture'] ? "../img/images/guides/{$row['GuidePicture']}" : '../img/default-profile.png';
                                    $id = $row['GuideID'];
                                    echo "<tr>
                                            <td>{$cnt}</td>
                                            <td>{$row['GuideFname']}</td>
                                            <td>{$row['GuideLname']}</td>
                                            <td>{$row['GuideSpecialization']}</td>
                                            <td><img src='{$picturePath}' alt='Picture' style='width: 50px; height: 50px;'></td>
                                            <td><a href='{$row['GuideFacebook']}' target='_blank'>Facebook</a></td>
                                            <td><a href='{$row['GuideTwitter']}' target='_blank'>Twitter</a></td>
                                            <td><a href='{$row['GuideInstagram']}' target='_blank'>Instagram</a></td>
                                            <td>{$status}</td>
                                            <td>".substr($row['GuideDateCreated'], 0, 10)."</td>
                                            <td><a href='delete-guides.php?id=$id' style='text-decoration:none;color:#F00;font-size:30px;'><i class='typcn typcn-delete'></i></a></td>
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
