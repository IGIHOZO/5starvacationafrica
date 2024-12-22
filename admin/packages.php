<?php
require("lib/header.php");

if (!isset($_SESSION['loggedin'])) {
    echo "<script>window.location = '../../logout.php';</script>";

}
@require("../lib/drive.php");

$con = $pdo; 
$responseMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $packageName = $_POST['packageName'] ?? '';
    $packageIntro = $_POST['packageIntro'] ?? '';
    $packageDesc = $_POST['packageDesc'] ?? '';
    $days = $_POST['days'] ?? 0;
    $nights = $_POST['nights'] ?? 0;
    $price = $_POST['price'] ?? 0;
    $travelType = $_POST['travelType'] ?? 0;  // travel_type from tour_categories
    $packageType = $_POST['packageType'] ?? 0; // package_type from tour_Packages
    $countryId = $_POST['countryId'] ?? 0;
    $numPersons = $_POST['numPersons'] ?? 0;
    $status = 1;  // Active by default
    $dateCreated = date("Y-m-d H:i:s");

    // Handle image upload
    $imagePath = null;
    if (isset($_FILES['packageImage']) && $_FILES['packageImage']['error'] == UPLOAD_ERR_OK) {
        $uploadsDir = "../img/images/packages/";
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        $imageTmpName = $_FILES['packageImage']['tmp_name'];
        $imageName = time() . "_" . uniqid();
        $imagePath = $uploadsDir . $imageName;

        if (!move_uploaded_file($imageTmpName, $imagePath)) {
            $imagePath = null;
        }
    }

    // Insert into Packages table
    $stmt = $con->prepare("INSERT INTO Packages (name, intro, description, days, nights, price, travel_type, package_type, country_id, num_persons, image, status, created_at) 
                          VALUES (:name, :intro, :desc, :days, :nights, :price, :travel_type, :package_type, :country_id, :num_persons, :image, :status, :created_at)");

    $stmt->bindParam(':name', $packageName);
    $stmt->bindParam(':intro', $packageIntro);
    $stmt->bindParam(':desc', $packageDesc);
    $stmt->bindParam(':days', $days, PDO::PARAM_INT);
    $stmt->bindParam(':nights', $nights, PDO::PARAM_INT);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':travel_type', $travelType, PDO::PARAM_INT);
    $stmt->bindParam(':package_type', $packageType, PDO::PARAM_INT);
    $stmt->bindParam(':country_id', $countryId, PDO::PARAM_INT);
    $stmt->bindParam(':num_persons', $numPersons, PDO::PARAM_INT);
    $stmt->bindParam(':image', $imagePath);
    $stmt->bindParam(':status', $status, PDO::PARAM_INT);
    $stmt->bindParam(':created_at', $dateCreated);

    if ($stmt->execute()) {
        $_SESSION['responseMessage'] = '<div class="alert alert-success">Tour package successfully added!</div>';
    } else {
        $_SESSION['responseMessage'] = '<div class="alert alert-danger">Failed to add tour package.</div>';
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
                        <h4 class="card-title">Add New Tour Package</h4>
                        <?php if (!empty($responseMessage)) echo $responseMessage; ?>
                        <form method="post" enctype="multipart/form-data" style="width:102%">
                            <div class="form-row row">
                                <div class="form-group col-md-4">
                                    <label for="packageName">Package Name</label>
                                    <input type="text" class="form-control" id="packageName" name="packageName" placeholder="Enter package name" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="packageIntro">Package Introduction</label>
                                    <textarea class="form-control" id="packageIntro" name="packageIntro" rows="3" placeholder="Enter introduction" required></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="packageDesc">Package Description</label>
                                    <textarea class="form-control" id="packageDesc" name="packageDesc" rows="3" placeholder="Enter description" required></textarea>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="days">Days</label>
                                    <input type="number" class="form-control" id="days" name="days" placeholder="Days" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="nights">Nights</label>
                                    <input type="number" class="form-control" id="nights" name="nights" placeholder="Nights" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="price">Package Price</label>
                                    <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="travelType">Travel Type</label>
                                    <select class="form-control" id="travelType" name="travelType" required>
                                        <?php
                                        // Fetch from tour_categories
                                        $categories = $con->query("SELECT * FROM tour_categories ORDER BY name ASC");
                                        while ($row = $categories->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="packageType">Package Type</label>
                                    <select class="form-control" id="packageType" name="packageType" required>
                                        <?php
                                        $Packages = $con->query("SELECT * FROM tour_packages ORDER BY name ASC");
                                        while ($row = $Packages->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="countryId">Package Country</label>
                                    <select class="form-control" id="countryId" name="countryId" required>
                                        <?php
                                        $countries = $con->query("SELECT * FROM countries WHERE active = 1 ORDER BY country_name ASC");
                                        while ($row = $countries->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='{$row['country_id']}'>{$row['country_name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="numPersons">Number of Persons</label>
                                    <input type="number" class="form-control" id="numPersons" name="numPersons" placeholder="Persons" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="packageImage">Package Image</label>
                                    <input type="file" class="form-control" id="packageImage" name="packageImage" accept="image/*" required>
                                </div>
                                <div class="form-group col-md-2 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary">Add Package</button>
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
                                    <th>Package Name</th>
                                    <th>Package Intro</th>
                                    <th>Price</th>
                                    <th>Travel Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stmt = $con->query("SELECT * FROM Packages ORDER BY package_id DESC");
                                $index = 1;
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $categoryQuery = $con->prepare("SELECT name FROM tour_categories WHERE id = :category_id");
                                    $categoryQuery->execute(['category_id' => $row['travel_type']]);
                                    $category = $categoryQuery->fetch(PDO::FETCH_ASSOC);
                                    $id = $row['package_id'];
                                    echo "<tr>
                                            <td>{$index}</td>
                                            <td>{$row['name']}</td>
                                            <td>{$row['intro']}</td>
                                            <td>{$row['price']}</td>
                                            <td>{$category['name']}</td>
                                            <td><a href='delete-package.php?id=$id' style='text-decoration:none;color:#F00;font-size:30px;float:right'><i class='typcn typcn-delete'></i></a></td>

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

<?php
// require("../lib/footer.php"); 
?>
