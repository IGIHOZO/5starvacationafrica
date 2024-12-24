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

<div class="container-fluid bg-primary py-5 mb-5 hero-header" style="background: linear-gradient(rgba(20, 20, 31, .7), rgba(20, 20, 31, .7)), url('img/images/booking.jpeg'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Secure Your Adventure Today</h1>
                <p class="fs-4 text-white mb-4 animated slideInDown">Easy, Fast, and Hassle-Free Booking for Your Dream Getaway.</p>
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

<!-- Booking Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container" id="OnlineBooking">
        <div class="booking p-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-6 text-white">
                    <h6 class="text-white text-uppercase">Booking</h6>
                    <h1 class="text-white mb-4">Online Booking</h1>
                    <p class="mb-4">Welcome to 5StarVacationAfrica, your gateway to unforgettable African adventures. Booking your dream vacation has never been easier! Explore the breathtaking landscapes, vibrant cultures, and unique wildlife Africa has to offer, all at your fingertips.</p>
                    <p class="mb-4">Whether you’re planning a luxurious safari, a serene beach getaway, or a cultural tour, we ensure your journey is seamless and tailored to perfection.</p>
                    <p class="mb-4">Let us handle the details while you focus on creating memories that will last a lifetime. Book now and embark on an extraordinary African experience like no other!</p>
                    <p><b>Your dream vacation is just a few clicks away.</b></p>
                    <a class="btn btn-outline-light py-3 px-5 mt-2" href="package.php">Book Now</a>
                </div>
                <div class="col-md-6">
                    <h1 class="text-white mb-4">Plan Your Adventure</h1>
                    <div class="booking-image">
                        <img src="path/to/your/image.jpg" alt="African Adventure" class="img-fluid rounded-3">
                    </div>
                    <p class="text-white mt-4">Not sure where to start? Explore the destinations available, or click the button above to begin planning your perfect tour. Our team is ready to assist you in creating a customized African experience.</p>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Booking Start -->
    <?php 
require("lib/footer.php");
?>