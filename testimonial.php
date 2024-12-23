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

<div class="container-fluid bg-primary py-5 mb-5 hero-header" style="background: linear-gradient(rgba(20, 20, 31, .7), rgba(20, 20, 31, .7)), url('img/images/testimonial.jpg'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">What Our Travelers Say</h1>
                <p class="fs-4 text-white mb-4 animated slideInDown">Real Stories, Real Adventures – Hear from those who’ve explored the world with us.</p>
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
// Assuming $con is the PDO connection object
$query = "SELECT TestimonyPerson, TestimonyLocation, TestimonyBody, PersonPicture 
          FROM Testimony 
          WHERE TestimonyStatus = 1"; // Filter by active testimonials
$stmt = $con->prepare($query);
$stmt->execute();
$testimonials = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container" id="Testimonies">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
            <h1 class="mb-5">Our Clients Say!!!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <?php foreach ($testimonials as $testimonial): ?>
                <div class="testimonial-item bg-white text-center border p-4">
                    <!-- Person Picture -->
                    <img 
                        class="bg-white rounded-circle shadow p-1 mx-auto mb-3" 
                        src="<?= !empty($testimonial['PersonPicture']) 
                                ? "img/images/testimonies/".htmlspecialchars($testimonial['PersonPicture'], ENT_QUOTES, 'UTF-8') 
                                : 'img/images/user.png'; ?>" 
                        alt="Person Picture" 
                        style="width: 80px; height: 80px;">

                    <!-- Person Name -->
                    <h5 class="mb-0"><?= htmlspecialchars($testimonial['TestimonyPerson'], ENT_QUOTES, 'UTF-8'); ?></h5>

                    <!-- Location -->
                    <p><?= htmlspecialchars($testimonial['TestimonyLocation'], ENT_QUOTES, 'UTF-8'); ?></p>

                    <!-- Testimonial Body -->
                    <p class="mt-2 mb-0"><?= nl2br(htmlspecialchars($testimonial['TestimonyBody'], ENT_QUOTES, 'UTF-8')); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Testimonial End -->
    <?php 
require("lib/footer.php");
?>