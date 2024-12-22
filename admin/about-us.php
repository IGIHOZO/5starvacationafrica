<?php
require("lib/header.php");

if (!isset($_SESSION['loggedin'])) {
    echo "<script>window.location = '../../logout.php';</script>";
}
@require("../lib/drive.php");

$con = $pdo;
$responseMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aboutTitle = $_POST['aboutTitle'] ?? '';
    $aboutBody = $_POST['aboutBody'] ?? '';
    $aboutBullets = $_POST['aboutBullets'] ?? '';
    $status = 'active';  // Default status is active
    $dateCreated = date("Y-m-d H:i:s");
    $imagePath = null;

    // Handle image upload
    if (isset($_FILES['aboutImage']) && $_FILES['aboutImage']['error'] == UPLOAD_ERR_OK) {
        $uploadsDir = "../img/images/about_us/";
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        $imageTmpName = $_FILES['aboutImage']['tmp_name'];
        $imageName = time() . "_" . uniqid();
        $imagePath = $uploadsDir . $imageName;

        if (!move_uploaded_file($imageTmpName, $imagePath)) {
            $imagePath = null;
        }
    }

    // Insert into AboutUs table
    $stmt = $con->prepare("INSERT INTO AboutUs (AboutTitle, AboutBody, AboutBullets, AboutImage, AboutStatus, CreatedAt, UpdatedAt)
                          VALUES (:title, :body, :bullets, :image, :status, :created_at, :updated_at)");

    $stmt->bindParam(':title', $aboutTitle);
    $stmt->bindParam(':body', $aboutBody);
    $stmt->bindParam(':bullets', $aboutBullets);
    $stmt->bindParam(':image', $imagePath);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':created_at', $dateCreated);
    $stmt->bindParam(':updated_at', $dateCreated);

    if ($stmt->execute()) {
        $_SESSION['responseMessage'] = '<div class="alert alert-success">About Us section successfully added!</div>';
    } else {
        $_SESSION['responseMessage'] = '<div class="alert alert-danger">Failed to add About Us section.</div>';
    }
    echo "<script>window.location.href = window.location.href;</script>";
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
                        <h4 class="card-title">Add New About Us Section</h4>
                        <?php if (!empty($responseMessage)) echo $responseMessage; ?>
                        <form method="post" enctype="multipart/form-data" style="width:102%">
                            <div class="form-row row">
                                <div class="form-group col-md-6">
                                    <label for="aboutTitle">Title</label>
                                    <input type="text" class="form-control" id="aboutTitle" name="aboutTitle" placeholder="Enter title" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="aboutBody">Body</label>
                                    <textarea class="form-control" id="aboutBody" name="aboutBody" rows="5" placeholder="Enter body"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="aboutBullets">Bullets</label>
                                    <textarea class="form-control" id="aboutBullets" name="aboutBullets" rows="3" placeholder="Enter bullets"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="aboutImage">Image</label>
                                    <input type="file" class="form-control" id="aboutImage" name="aboutImage" accept="image/*">
                                </div>
                                <div class="form-group col-md-6 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary">Add About Us Section</button>
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
                                    <th>About Us Title</th>
                                    <th>Body</th>
                                    <th>Status</th>
                                     <th>Actions</th>
                                </tr>
                           </thead>
                            <tbody>
                                <?php
                                $stmt = $con->query("SELECT * FROM AboutUs ORDER BY AboutId DESC");
                                $index = 1;
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $id = $row['AboutId'];
                                    echo "<tr>
                                            <td>{$index}</td>
                                            <td>{$row['AboutTitle']}</td>
                                            <td>{$row['AboutBody']}</td>
                                            <td>{$row['AboutStatus']}</td>
                                            <td><a href='delete-about-us.php?id=$id' style='text-decoration:none;color:#F00;font-size:30px;float:right'><i class='typcn typcn-delete'></i></a></td>
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
