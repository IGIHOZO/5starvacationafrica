<?php
require("lib/header.php");

if (!isset($_SESSION['loggedin'])) {
    echo "<script>window.location = '../../logout.php';</script>";
}
@require("../lib/drive.php");

$con = $pdo;
$responseMessage = '';

if (isset($_SESSION['responseMessage'])) {
    $responseMessage = $_SESSION['responseMessage'];
    unset($_SESSION['responseMessage']);
}
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="table-responsive pt-3">
                        <table class="table table-striped project-orders-table" style="font-size:8px!important">
                            <thead>
                                <tr style="font-size:8px!important">
                                    <th>#</th>
                                    <th>Package Name</th>
                                    <th>Qnt</th>
                                    <th>Package Price</th>
                                    <th>Total Price</th>
                                    <th>Names</th>
                                    <th>Email</th>
                                    <th>Trip-Date</th>
                                    <th>Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stmt = $con->query("
                                    SELECT b.BookingID, b.BookingPackageID, b.TravelerDate, b.PackageQuantity, b.PricePerPackage, b.TotalPrice, 
                                           b.TravelerNames, b.TravelerEmail, b.BookingStatus, p.name AS package_name, c.country_name
                                    FROM PackageBooking b
                                    JOIN Packages p ON b.BookingPackageID = p.package_id
                                    JOIN countries c ON p.country_id = c.country_id
                                    ORDER BY b.BookingStatus
                                ");
                                
                                $index = 1;
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $id = $row['BookingID'];
                                    $bookingStatus = $row['BookingStatus'] == 0 ? 'Pending' : 'Paid';
                                    
                                    // Set the background color based on booking status
                                    if ($row['BookingStatus'] == 0) {
                                        $bookingStatusn = "<span style='background-color:#ffc107; color:white; padding:3px 6px; border-radius:4px;'>".$bookingStatus."</span>";
                                    } else {
                                        $bookingStatusn = "<span style='background-color:#28a745; color:white; padding:3px 6px; border-radius:4px;'>".$bookingStatus."</span>";
                                    }

                                    echo "<tr'>
                                    <td>{$index}</td>
                                    <td>{$row['package_name']}</td>
                                    <td>{$row['PackageQuantity']}</td>
                                    <td>" . number_format($row['PricePerPackage'], 2) . "</td> <!-- Format price with 2 decimals --> 
                                    <td>" . number_format($row['TotalPrice'], 2) . "</td> <!-- Format total price with 2 decimals -->
                                    <td>{$row['TravelerNames']}</td>
                                    <td>{$row['TravelerEmail']}</td>
                                    <td>" . substr($row['TravelerDate'], 0, 10) . "</td>
                                    <td>{$bookingStatusn}</td>
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
