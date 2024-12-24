<?php 
require("lib/header.php");
@require("lib/drive.php");

$con = $pdo; 

// Fetch dynamic package details from the database
$query = "SELECT p.*, tc.name AS travel_type_name, tp.name AS package_type_name, c.country_name 
          FROM Packages p 
          JOIN tour_categories tc ON p.travel_type = tc.id 
          JOIN tour_packages tp ON p.package_type = tp.id 
          JOIN countries c ON p.country_id = c.country_id 
          WHERE p.package_id = :packageId";
$stmt = $con->prepare($query);
$stmt->bindParam(':packageId', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$package = $stmt->fetch(PDO::FETCH_ASSOC);

if ($package) {
    $backgroundImage = !empty($package['image']) ? 'packages/' . htmlspecialchars($package['image']) : 'default-image.jpg';
    $packageName = htmlspecialchars($package['name']);
    $packageIntro = htmlspecialchars($package['intro']);
    $packageDescription = nl2br(htmlspecialchars($package['description']));
    $price = $package['price'];
    $days = $package['days'];
    $nights = $package['nights'];
    $numPersons = $package['num_persons'];
    $travelType = htmlspecialchars($package['travel_type_name']);
    $packageType = htmlspecialchars($package['package_type_name']);
    $countryName = htmlspecialchars($package['country_name']);
} else {
    // Default values in case no package is found
    $backgroundImage = 'default-image.jpg';
    $packageName = 'Package Not Found';
    $packageIntro = 'No package details available.';
    $packageDescription = 'Description not available.';
    $price = '0.00';
    $days = 0;
    $nights = 0;
    $numPersons = 0;
    $travelType = 'N/A';
    $packageType = 'N/A';
    $countryName = 'N/A';
}

// Handle the booking form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch form data
    $fullNames = $_POST['full_names'];
    $email = $_POST['email'];
    $bookingDate = $_POST['booking_date'];
    $specialRequest = $_POST['special_request'];
    $packageId = $_POST['package_id'];
    $unitPrice = $_POST['unit_price'];
    $totalPrice = $_POST['total_price'];
    
    // Insert booking details into the database
    $insertQuery = "INSERT INTO PackageBooking (BookingPackageID, PackageQuantity, PricePerPackage, TotalPrice, TravelerNames, TravelerEmail, TravelerDate, TravelerSpecialRequest, BookingStatus, CreatedAt, UpdatedAt)
                    VALUES (:packageId, :quantity, :unitPrice, :totalPrice, :fullNames, :email, :bookingDate, :specialRequest, 0, UNIX_TIMESTAMP(), UNIX_TIMESTAMP())";
    $stmtInsert = $con->prepare($insertQuery);
    $stmtInsert->bindParam(':packageId', $packageId, PDO::PARAM_INT);
    $stmtInsert->bindParam(':quantity', $_POST['quantity'], PDO::PARAM_INT);
    $stmtInsert->bindParam(':unitPrice', $unitPrice, PDO::PARAM_INT);
    $stmtInsert->bindParam(':totalPrice', $totalPrice, PDO::PARAM_INT);
    $stmtInsert->bindParam(':fullNames', $fullNames, PDO::PARAM_STR);
    $stmtInsert->bindParam(':email', $email, PDO::PARAM_STR);
    $stmtInsert->bindParam(':bookingDate', $bookingDate, PDO::PARAM_STR);
    $stmtInsert->bindParam(':specialRequest', $specialRequest, PDO::PARAM_STR);
    
    if ($stmtInsert->execute()) {
        echo "<script>
                alert('Booking successfully submitted. Please proceed with payment.');
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = 'proceed-to-pay.php';
    
                var packageIdField = document.createElement('input');
                packageIdField.type = 'hidden';
                packageIdField.name = 'packageId';
                packageIdField.value = '" . $packageId . "';
                form.appendChild(packageIdField);
    
                var totalPriceField = document.createElement('input');
                totalPriceField.type = 'hidden';
                totalPriceField.name = 'totalPrice';
                totalPriceField.value = '" . $totalPrice . "';
                form.appendChild(totalPriceField);
    
                document.body.appendChild(form);
                form.submit();
              </script>";
    } else {
        echo "<script>alert('Error submitting booking. Please try again.');</script>";
    }
    
    
}
?>
<!-- Hero Section with text overlay -->
<div class="container-fluid hero-header" style="background: url('<?php echo $backgroundImage; ?>'); background-size: cover; background-position: center; height: 70vh; position: relative;">
    <div class="container text-center text-white" style="position: absolute; top: 50%; transform: translateY(-50%);">
        <h1 class="display-4 font-weight-bold"><?php echo $packageName; ?></h1>
        <p class="lead mb-4"><?php echo $packageIntro; ?></p>
    </div>
</div>

<!-- Package Details Section -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <h3 class="mb-4"><?php echo $packageName; ?></h3>
            <p><strong>Description:</strong> <?php echo $packageDescription; ?></p>
            <p><strong>Introduction:</strong> <?php echo $packageIntro; ?></p>
            <p><strong>Price:</strong> $<span id="unit-price"><?php echo $price; ?></span></p>
            <p><strong>Duration:</strong> <?php echo $days; ?> days, <?php echo $nights; ?> nights</p>
            <p><strong>Travel Type:</strong> <?php echo $travelType; ?></p>
            <p><strong>Package Type:</strong> <?php echo $packageType; ?></p>
            <p><strong>Country:</strong> <?php echo $countryName; ?></p><hr>

            <!-- Quantity of Packages (One Input Field) -->
            <p><strong>Number of Packages:</strong> 
                <input type="number" id="num-packages" value="1" min="1" class="form-control w-auto d-inline" style="width: 100px;">
            </p>
        </div>

        <div class="col-lg-4">
            <div class="bg-light p-4 rounded shadow-lg">
                <h5 class="font-weight-bold mb-4">Booking Information</h5>
                <p><strong>Price per Package:</strong> $<span id="unit-price-booking"><?php echo $price; ?></span></p>
                <p><strong>Total Cost:</strong> $<span id="total-price"><?php echo $price; ?></span></p>

                <!-- Booking Form -->
                <form id="booking-form" action="package-details.php" method="POST" class="booking-form">
                    <div class="form-group">
                        <input type="text" class="form-control" id="full-names" name="full_names" required placeholder="Enter your full name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="booking-date" name="booking_date" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="special-request" name="special_request" rows="4" placeholder="Any special requests?"></textarea>
                    </div>
                    <input type="hidden" name="package_id" value="<?=$_GET['id'];?>">
                    <input type="hidden" name="unit_price" value="<?=$price;?>">
                    <input type="hidden" name="total_price" id="total-price-input" value="<?=$price;?>">
                    <input type="hidden" name="quantity" value="1" id="quantity-input">

                    <!-- Terms and Conditions Checkbox -->
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="agree-terms" required>
                        <label class="form-check-label" for="agree-terms">
                            I have read and agree to the <a href="conditions.php" target="_blank">Terms and Conditions</a>.
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 mt-4 py-3 font-weight-bold" id="submit-booking" disabled>Submit Booking</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JS to handle price updates -->
<script>
    // Get DOM elements for price and number of packages
    // const unitPrice = parseFloat(document.getElementById('unit-price').innerText);
    const oldprice = "<?=$price?>";
    const unitPrice = parseInt(oldprice.replace(/,/g, '').split('.')[0], 10); // Remove commas, split at decimal, and parse integer

    const numPackagesInput = document.getElementById('num-packages');
    const totalPriceSpan = document.getElementById('total-price');
    const totalPriceInput = document.getElementById('total-price-input');
    const quantityInput = document.getElementById('quantity-input');
    
    // Update total price when the number of packages is changed
    numPackagesInput.addEventListener('input', updateTotalPrice);

    function updateTotalPrice() {
        const numPackages = numPackagesInput.value;
        const totalPrice = unitPrice * numPackages; // Total price is unit price * number of packages
        totalPriceSpan.innerText = totalPrice.toFixed(2); // Format price with 2 decimals
        totalPriceInput.value = totalPrice.toFixed(2); // Update hidden field for form submission
        quantityInput.value = numPackages; // Update the hidden quantity value
    }

    // Initialize total price
    updateTotalPrice();


    document.getElementById('agree-terms').addEventListener('change', function() {
        var submitButton = document.getElementById('submit-booking');
        submitButton.disabled = !this.checked;
    });
</script>

<!-- Booking Form Styling -->
<style>
    .hero-header {
        background-size: cover;
        background-position: center;
        height: 70vh;
        position: relative;
    }

    .btn-light {
        font-weight: bold;
        font-size: 1.1rem;
        padding: 10px 20px;
    }

    .booking-form {
        font-family: 'Arial', sans-serif;
    }

    .booking-form input, .booking-form textarea {
        border-radius: 8px;
        border: 1px solid #ccc;
        padding: 10px;
        font-size: 1rem;
        margin-bottom: 15px;
    }

    .booking-form input[type="submit"], .booking-form button {
        font-size: 1.2rem;
        padding: 12px 20px;
        border-radius: 10px;
    }

    .booking-form button {
        background-color: #007BFF;
        color: white;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .booking-form button:hover {
        background-color: #0056b3;
    }
    strong{
        font-weight: bolder;
        color:black
    }
</style>

<?php 
require("lib/footer.php");
?>
