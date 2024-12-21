<?php
require("lib/header.php");
if (!isset($_SESSION['loggedin'])) {
    echo "<script>window.location='../../logout.php';</script>";
}
@require("../lib/drive.php");

$con = $pdo;
$responseMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $testimonyPerson = $_POST['testimonyPerson'] ?? '';
    $testimonyLocation = $_POST['testimonyLocation'] ?? '';
    $testimonyBody = $_POST['testimonyBody'] ?? '';
    $testimonyStatus = 1; // Active by default
    $dateCreated = date("Y-m-d H:i:s");
    $personPicture = '';

    // Handle file upload
    if (isset($_FILES['personPicture']) && $_FILES['personPicture']['error'] == UPLOAD_ERR_OK) {
        $uploadsDir = "img/images/testimonies/";
        $fileName = time() . "_" . basename($_FILES['personPicture']['name']);
        $filePath = $uploadsDir . $fileName;

        if (move_uploaded_file($_FILES['personPicture']['tmp_name'], $filePath)) {
            $personPicture = $filePath;
        }
    }

    // Insert data into Testimony table
    $stmt = $con->prepare("INSERT INTO Testimony (TestimonyPerson, PersonPicture, TestimonyLocation, TestimonyBody, TestimonyStatus, TestimonyCreatedAt, TestimonyUpdatedAt) 
    VALUES (:person, :picture, :location, :body, :status, :created, :updated)");
    $stmt->bindParam(':person', $testimonyPerson);
    $stmt->bindParam(':picture', $personPicture);
    $stmt->bindParam(':location', $testimonyLocation);
    $stmt->bindParam(':body', $testimonyBody);
    $stmt->bindParam(':status', $testimonyStatus, PDO::PARAM_INT);
    $stmt->bindParam(':created', $dateCreated);
    $stmt->bindParam(':updated', $dateCreated); // Use the same timestamp for creation and update initially

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
                                <div class="form-group col-md-3">
                                    <label for="testimonyPerson">Person</label>
                                    <input type="text" class="form-control" id="testimonyPerson" name="testimonyPerson" placeholder="Enter person's name" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="personPicture">Picture</label>
                                    <input type="file" class="form-control" id="personPicture" name="personPicture" accept="image/*">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="testimonyLocation">Location</label>
                                    <input type="text" class="form-control" id="testimonyLocation" name="testimonyLocation" placeholder="Enter location" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="testimonyBody">Testimony</label>
                                    <textarea class="form-control" id="testimonyBody" name="testimonyBody" placeholder="Enter testimony" rows="3" required></textarea>
                                </div>
                                <div class="form-group col-md-2 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Table to display testimonies -->
                <div class="card mt-4">
                    <div class="table-responsive pt-3">
                        <table class="table table-striped project-orders-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Picture</th>
                                    <th>Person</th>
                                    <th>Location</th>
                                    <th>Testimony</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cnt = 1;
                                $stmt = $con->query("SELECT * FROM Testimony ORDER BY TestimonyCreatedAt DESC");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $status = $row['TestimonyStatus'] == 1 ? 'Active' : 'Inactive';
                                    $id = $row['TestimonyID'];
                                    $picture = $row['PersonPicture'] ?: 'path/to/default-image.jpg';

                                    echo "<tr>
                                        <td>{$cnt}</td>
                                        <td><img src='../{$picture}' alt='Person Picture' style='width:50px;height:50px;border-radius:50%;'></td>
                                        <td>{$row['TestimonyPerson']}</td>
                                        <td>{$row['TestimonyLocation']}</td>
                                        <td>" . substr($row['TestimonyBody'], 0, 50) . "...</td>
                                        <td>{$status}</td>
                                        <td>" . substr($row['TestimonyCreatedAt'], 0, 10) . "</td>
                                        <td><a href='delete-testimony.php?id=$id' style='text-decoration:none;color:#F00;font-size:30px;'><i class='typcn typcn-delete'></i></a></td>
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
