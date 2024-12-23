<?php 
require("lib/header.php");
@require("lib/drive.php");

$con = $pdo; // Ensure $pdo is defined and connected

// Fetch landing page data
$sql = "SELECT LandingTitle, LandingDescription, LandingImage FROM LandingPage WHERE LandingStatus = 'active' ORDER BY RAND() LIMIT 1";
$stmt = $con->prepare($sql);
$stmt->execute();
$landingData = $stmt->fetch(PDO::FETCH_ASSOC);

// Set default values if no active record is found
$landingTitle = $landingData['LandingTitle'] ?? "Enjoy Your Vacation With Us";
$landingDescription = $landingData['LandingDescription'] ?? "No data available";
$landingImage = $landingData['LandingImage'] ?? "bg-hero.jpg"; // Default image if none found
?>

<div class="container-fluid bg-primary py-5 mb-5 hero-header" style="background: linear-gradient(rgba(20, 20, 31, .7), rgba(20, 20, 31, .7)), url('img/images/packages.png'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Tailored Travel Packages for Every Explorer</h1>
                <p class="fs-4 text-white mb-4 animated slideInDown">Choose from a Variety of Options Designed to Match Your Dream Journey.</p>
                <div class="position-relative w-75 mx-auto animated slideInDown">
                    <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Eg: Rwanda">
                    <button type="button" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top: 7px;">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Navbar & Hero End -->


<!-- About Start -->
<?php
// Fetch data from the database using the pre-defined $con PDO connection
try {
    $stmt = $con->prepare("SELECT AboutTitle, AboutBody, AboutBullets, AboutImage FROM AboutUs WHERE AboutStatus = 'active' ORDER BY RAND() LIMIT 1");
    $stmt->execute();
    $about = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($about) {
        $aboutTitle = $about['AboutTitle'];
        $aboutBody = $about['AboutBody'];
        $aboutBullets = explode("\n", $about['AboutBullets']); // Assuming bullets are stored line by line
        $aboutImage = $about['AboutImage'];
    } else {
        // Default content if no active record is found
        $aboutTitle = "Welcome to 5StarVacationAfrica";
        $aboutBody = "Content coming soon.";
        $aboutBullets = [];
        $aboutImage = "default.jpg"; // Fallback image
    }
} catch (PDOException $e) {
    die("Error fetching AboutUs data: " . $e->getMessage());
}
?>

<?php
try {
    $query = "SELECT p.package_id, p.name, p.intro, p.price, p.days, p.num_persons, c.country_name AS country_name, p.image 
              FROM Packages p 
              JOIN countries c ON p.country_id = c.country_id 
              WHERE p.status = 1 
              ORDER BY p.created_at DESC";
    $stmt = $con->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo '<div class="container-xxl py-5">';
        echo '<div class="container" id="AwesomePackages">';
        echo '<div class="text-center wow fadeInUp" data-wow-delay="0.1s">';
        echo '<h6 class="section-title bg-white text-center text-primary px-3">Packages</h6>';
        echo '<h1 class="mb-5">Awesome Packages</h1>';
        echo '</div>';
        echo '<div class="row g-4 justify-content-center">';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $packageId = $row['package_id'];
            $name = htmlspecialchars($row['name']);
            $intro = htmlspecialchars($row['intro']);
            $price = number_format($row['price'], 2);
            $days = $row['days'];
            $numPersons = $row['num_persons'];
            $countryName = htmlspecialchars($row['country_name']);
            $image = !empty($row['image']) ? htmlspecialchars($row['image']) : 'default.jpg';

            echo '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">';
            echo '<div class="package-item">';
            echo '<div class="overflow-hidden">';
            echo '<img class="img-fluid" src="packages/' . $image . '" alt="' . $name . '">';
            echo '</div>';
            echo '<div class="d-flex border-bottom">';
            echo '<small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>' . $countryName . '</small>';
            echo '<small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>' . $days . ' days</small>';
            echo '<small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>' . $numPersons . ' Person</small>';
            echo '</div>';
            echo '<div class="text-center p-4">';
            echo '<h3 class="mb-0">$' . $price . '</h3>';
            echo '<div class="mb-3">';
            echo '<small class="fa fa-star text-primary"></small>';
            echo '<small class="fa fa-star text-primary"></small>';
            echo '<small class="fa fa-star text-primary"></small>';
            echo '<small class="fa fa-star text-primary"></small>';
            echo '<small class="fa fa-star text-primary"></small>';
            echo '</div>';
            echo '<p>' . $intro . '</p>';
            echo '<div class="d-flex justify-content-center mb-2">';
            echo '<a href="package-details.php?id=' . $packageId . '" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>';
            echo '<a href="book-package.php?id=' . $packageId . '" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Book Now</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<p class="text-center">No packages available at the moment.</p>';
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
    <?php 
require("lib/footer.php");
?>