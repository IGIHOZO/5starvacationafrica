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

<div class="container-fluid bg-primary py-5 mb-5 hero-header" style="background: linear-gradient(rgba(20, 20, 31, .7), rgba(20, 20, 31, .7)), url('img/images/services.jpg'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Exceptional Services for Unforgettable Travels</h1>
                <p class="fs-4 text-white mb-4 animated slideInDown">From Planning to Exploring – We’re Here to Make Every Step Seamless.</p>
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
// Assuming $con is your PDO connection variable
$query = "SELECT ServiceName, ServiceDescription, ServiceIcon FROM Services WHERE ServiceStatus = 1 ORDER BY RAND()"; // You can filter by active services (ServiceStatus = 1)

$stmt = $con->prepare($query);
$stmt->execute();
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container" id="OurServices">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Services</h6>
            <h1 class="mb-5">Our Services</h1>
        </div>
        <div class="row g-4">
            <?php
            foreach ($services as $index => $service) {
                $delay = 0.1 * ($index + 1); 
            ?>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="<?= $delay ?>s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4 text-center">
                            <img src="img/images/services/<?= htmlspecialchars($service['ServiceIcon']) ?>" alt="<?= htmlspecialchars($service['ServiceName']) ?>" class="img-fluid mb-4" style="height: 70px; width: auto;">
                            <h5><?= htmlspecialchars($service['ServiceName']) ?></h5>
                            <p><?= htmlspecialchars($service['ServiceDescription']) ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- Service End -->
    <?php 
require("lib/footer.php");
?>