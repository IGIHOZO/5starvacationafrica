<?php
require("lib/header.php");

if (!isset($_SESSION['loggedin'])) {
    echo "<script>window.location = '../../logout.php';</script>";

    exit;
}
@require("../lib/drive.php");

$con = $pdo;
$responseMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $landingTitle = $_POST['landingTitle'] ?? '';
    $landingDescription = $_POST['landingDescription'] ?? '';
    $status = 'active'; // Default status is active
    $dateCreated = date("Y-m-d H:i:s");
    $imagePath = null;

    // Handle file upload
    if (isset($_FILES['landingImage']) && $_FILES['landingImage']['error'] == UPLOAD_ERR_OK) {
        $uploadsDir = "../img/images/landing_pages/";
        if (!is_dir($uploadsDir)) {
            if (!mkdir($uploadsDir, 0777, true)) {
                die('Failed to create upload directory.');
            }
        }

        $imageTmpName = $_FILES['landingImage']['tmp_name'];
        $imageName = time() . "_" . uniqid() . "." . pathinfo($_FILES['landingImage']['name'], PATHINFO_EXTENSION);
        $fullImagePath = $uploadsDir . $imageName;

        if (move_uploaded_file($imageTmpName, $fullImagePath)) {
            // Adjust path for storing in the database
            $imagePath = "img/images/landing_pages/" . $imageName;
        } else {
            die('Failed to move uploaded file.');
        }
    }

    // Insert into the database
    $stmt = $con->prepare("INSERT INTO LandingPage (LandingTitle, LandingDescription, LandingImage, LandingStatus, CreatedAt, UpdatedAt)
                          VALUES (:title, :description, :image, :status, :created_at, :updated_at)");

    $stmt->bindParam(':title', $landingTitle);
    $stmt->bindParam(':description', $landingDescription);
    $stmt->bindParam(':image', $imagePath);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':created_at', $dateCreated);
    $stmt->bindParam(':updated_at', $dateCreated);

    if ($stmt->execute()) {
        $_SESSION['responseMessage'] = '<div class="alert alert-success">Landing page successfully added!</div>';
    } else {
        $_SESSION['responseMessage'] = '<div class="alert alert-danger">Failed to add landing page.</div>';
    }
    echo "<script>window.location.href = window.location.href;</script>";
    exit;
}

// Display response message if available
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
                        <h4 class="card-title">Add New Landing Page</h4>
                        <?php if (!empty($responseMessage)) echo $responseMessage; ?>
                        <form method="post" enctype="multipart/form-data" style="width:102%">
                            <div class="form-row row">
                                <div class="form-group col-md-6">
                                    <label for="landingTitle">Landing Page Title</label>
                                    <input type="text" class="form-control" id="landingTitle" name="landingTitle" placeholder="Enter title" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="landingDescription">Landing Page Description</label>
                                    <textarea class="form-control" id="landingDescription" name="landingDescription" rows="5" placeholder="Enter description"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="landingImage">Landing Page Image</label>
                                    <input type="file" class="form-control" id="landingImage" name="landingImage" accept="image/*" required>
                                </div>
                                <div class="form-group col-md-6 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary">Add Landing Page</button>
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
                                    <th>Landing Page Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stmt = $con->query("SELECT * FROM LandingPage ORDER BY LandingID DESC");
                                $index = 1;
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $id = $row['LandingID'];
                                    echo "<tr>
                                            <td>{$index}</td>
                                            <td>{$row['LandingTitle']}</td>
                                            <td>{$row['LandingDescription']}</td>
                                            <td>{$row['LandingStatus']}</td>
                                            <td><a href='delete-landing-page.php?id=$id' style='text-decoration:none;color:#F00;font-size:30px;float:right'><i class='typcn typcn-delete'></i></a></td>
                                        </tr>";
                                    $index++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
