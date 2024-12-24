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

<div class="container-fluid bg-primary py-5 mb-5 hero-header" style="background: linear-gradient(rgba(20, 20, 31, .7), rgba(20, 20, 31, .7)), url('img/images/destinations.webp'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Explore Breathtaking Destinations</h1>
                <p class="fs-4 text-white mb-4 animated slideInDown">Discover the World’s Most Captivating Places, Tailored Just for You.</p>
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
// Assuming $con is your PDO connection
$query = "SELECT DestinationLocation, DestinationDiscountPercentage, DestinationImage, DestinationDetails 
          FROM Destinations WHERE DestinationStatus = 'active' ORDER BY RAND()";
$stmt = $con->prepare($query);
$stmt->execute();
$destinations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Destination Start -->
<div class="container-xxl py-5 destination">
    <div class="container" id="PopularDestinations">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Destination</h6>
            <h1 class="mb-5">Popular Destinations</h1>
        </div>
        <div class="row g-3">
            <?php if (count($destinations) > 0): ?>
                <!-- Group 1: Left Column -->
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <?php for ($i = 0; $i < min(3, count($destinations)); $i++): ?>
                            <?php $destination = $destinations[$i]; ?>
                            <div class="col-lg-<?= $i == 0 ? '12' : '6' ?> col-md-12 wow zoomIn" data-wow-delay="<?= 0.1 + ($i * 0.2) ?>s">
                                <a class="position-relative d-block overflow-hidden" href="#">
                                <img class="img-fluid" src="<?= str_replace('../', '', $destination['DestinationImage']) ?>" alt="<?= htmlspecialchars($destination['DestinationLocation']) ?>">
                                    <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">
                                        <?= htmlspecialchars($destination['DestinationDiscountPercentage']) ?>% OFF
                                    </div>
                                    <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                        <?= htmlspecialchars($destination['DestinationLocation']) ?>
                                    </div>
                                </a>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <!-- Group 2: Right Column -->
                <?php if (count($destinations) > 3): ?>
                    <?php $destination = $destinations[3]; ?>
                    <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                        <a class="position-relative d-block h-100 overflow-hidden" href="#">
                            <img class="img-fluid position-absolute w-100 h-100" src="<?= htmlspecialchars($destination['DestinationImage']) ?>" alt="<?= htmlspecialchars($destination['DestinationLocation']) ?>" style="object-fit: cover;">
                            <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">
                                <?= htmlspecialchars($destination['DestinationDiscountPercentage']) ?>% OFF
                            </div>
                            <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                <?= htmlspecialchars($destination['DestinationLocation']) ?>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <p class="text-center">No active destinations found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Destination End -->
    <?php 
require("lib/footer.php");
?>