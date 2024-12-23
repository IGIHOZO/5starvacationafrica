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

<div class="container-fluid bg-primary py-5 mb-5 hero-header" style="background: linear-gradient(rgba(20, 20, 31, .7), rgba(20, 20, 31, .7)), url('img/images/team.jpeg'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Meet Our Expert Guides</h1>
                <p class="fs-4 text-white mb-4 animated slideInDown">Passionate Travelers, Experienced Professionals – Dedicated to Making Your Journey Unforgettable.</p>
                <div class="position-relative w-75 mx-auto animated slideInDown">
                    <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Eg: Rwanda">
                    <button type="button" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top: 7px;">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Navbar & Hero End -->

    <?php
// Assuming $con is your PDO connection
$sql = "SELECT * FROM Guides WHERE GuideStatus = 1"; // 1 indicates active guides
$stmt = $con->prepare($sql);
$stmt->execute();
$guides = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container" id="MeetOurGuide">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Travel Guide</h6>
            <h1 class="mb-5">Meet Our Guide</h1>
        </div>
        <div class="row g-4">
            <?php foreach ($guides as $guide): ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/images/guides/<?php echo htmlspecialchars($guide['GuidePicture']); ?>" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                            <?php if ($guide['GuideFacebook']): ?>
                                <a class="btn btn-square mx-1" href="<?php echo htmlspecialchars($guide['GuideFacebook']); ?>"><i class="fab fa-facebook-f"></i></a>
                            <?php endif; ?>
                            <?php if ($guide['GuideTwitter']): ?>
                                <a class="btn btn-square mx-1" href="<?php echo htmlspecialchars($guide['GuideTwitter']); ?>"><i class="fab fa-twitter"></i></a>
                            <?php endif; ?>
                            <?php if ($guide['GuideInstagram']): ?>
                                <a class="btn btn-square mx-1" href="<?php echo htmlspecialchars($guide['GuideInstagram']); ?>"><i class="fab fa-instagram"></i></a>
                            <?php endif; ?>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0"><?php echo htmlspecialchars($guide['GuideFname'] . ' ' . $guide['GuideLname']); ?></h5>
                            <small><?php echo htmlspecialchars($guide['GuideSpecialization']); ?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Team End -->
    <?php 
require("lib/footer.php");
?>