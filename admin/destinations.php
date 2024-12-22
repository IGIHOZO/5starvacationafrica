<?php
require("lib/header.php");

if (!isset($_SESSION['loggedin'])) {
    echo "<script>window.location = '../../logout.php';</script>";

}
@require("../lib/drive.php");

$con = $pdo;
$responseMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $location = $_POST['location'] ?? '';
    $discountPercentage = $_POST['discountPercentage'] ?? 0;
    $price = $_POST['price'] ?? 0;
    $destinationDetails = $_POST['destinationDetails'] ?? '';
    $status = 'active';  // Default status is active
    $dateCreated = date("Y-m-d H:i:s");

    // Handle image upload
    $imagePath = null;
    if (isset($_FILES['destinationImage']) && $_FILES['destinationImage']['error'] == UPLOAD_ERR_OK) {
        $uploadsDir = "img/images/destinations/";
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        $imageTmpName = $_FILES['destinationImage']['tmp_name'];
        $imageName = time() . "_" . uniqid();
        $imagePath = $uploadsDir . $imageName;

        if (!move_uploaded_file($imageTmpName, $imagePath)) {
            $imagePath = null;
        }
    }

    // Insert into Destinations table
    $stmt = $con->prepare("INSERT INTO Destinations (DestinationLocation, DestinationDiscountPercentage, DestinationPrice, DestinationImage, DestinationDetails, DestinationStatus, CreatedAt, UpdatedAt)
                          VALUES (:location, :discountPercentage, :price, :image, :details, :status, :created_at, :updated_at)");

    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':discountPercentage', $discountPercentage, PDO::PARAM_INT);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->bindParam(':image', $imagePath);
    $stmt->bindParam(':details', $destinationDetails);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':created_at', $dateCreated);
    $stmt->bindParam(':updated_at', $dateCreated);

    if ($stmt->execute()) {
        $_SESSION['responseMessage'] = '<div class="alert alert-success">Destination successfully added!</div>';
    } else {
        $_SESSION['responseMessage'] = '<div class="alert alert-danger">Failed to add destination.</div>';
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
                        <h4 class="card-title">Add New Destination</h4>
                        <?php if (!empty($responseMessage)) echo $responseMessage; ?>
                        <form method="post" enctype="multipart/form-data" style="width:102%">
                            <div class="form-row row">
                                <div class="form-group col-md-4">
                                    <label for="location">Destination Location</label>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="discountPercentage">Discount Percentage</label>
                                    <input type="number" class="form-control" id="discountPercentage" name="discountPercentage" placeholder="Discount" min="0" max="100">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="price">Destination Price</label>
                                    <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" step="0.01" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="destinationImage">Destination Image</label>
                                    <input type="file" class="form-control" id="destinationImage" name="destinationImage" accept="image/*" required>
                                </div>
                                <div class="form-group col-md-10">
                                    <label for="destinationDetails">Destination Details</label>
                                    <textarea class="form-control" id="destinationDetails" name="destinationDetails" rows="5" placeholder="Enter details" required></textarea>
                                </div>
                                <div class="form-group col-md-2 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary">Add Destination</button>
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
                                    <th>Destination Location</th>
                                    <th>Discount Percentage</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Display added Destinations
                                $stmt = $con->query("SELECT * FROM Destinations ORDER BY DestinationID DESC");
                                $index = 1;
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $id = $row['DestinationID'];
                                    echo "<tr>
                                            <td>{$index}</td>
                                            <td>{$row['DestinationLocation']}</td>
                                            <td>{$row['DestinationDiscountPercentage']}%</td>
                                            <td>{$row['DestinationPrice']}</td>
                                            <td>{$row['DestinationStatus']}</td>
                                            <td><a href='delete-destination.php?id=$id' style='text-decoration:none;color:#F00;font-size:30px;float:right'><i class='typcn typcn-delete'></i></a></td>
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


