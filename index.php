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



<!-- Video Modal -->
<div id="videoModal" style="display:none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.8); justify-content: center; align-items: center; overflow: hidden; display: flex;">
    <div style="background-color: #fff; padding: 10px; border-radius: 15px; position: relative; width: 60%; height: 68%; display: flex; justify-content: center; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);">
        <span class="close" style="color: #fff; position: absolute; top: 10px; right: 20px; font-size: 40px; font-weight: bold; cursor: pointer; z-index: 10;">&times;</span>
        <iframe id="videoFrame" width="100%" height="100%" 
                src="https://www.youtube.com/embed/3xBHaiQXnBQ?autoplay=1&rel=0&mute=1" 
                frameborder="0" allow="autoplay; encrypted-media" allowfullscreen
                style="border-radius: 12px;"></iframe>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Automatically show modal on page load
        $("#videoModal").fadeIn();

        // Unmute video after modal is displayed
        var videoSrc = $("#videoFrame").attr("src");
        $("#videoFrame").attr("src", videoSrc.replace("&mute=1", ""));  // Remove mute parameter

        // Close Modal
        $(".close").click(function() {
            $("#videoModal").fadeOut();
            // Pause video when modal is closed
            $("#videoFrame").attr("src", $("#videoFrame").attr("src"));
        });

        // Close Modal if clicked outside of the content
        $(window).click(function(event) {
            if ($(event.target).is("#videoModal")) {
                $("#videoModal").fadeOut();
                $("#videoFrame").attr("src", $("#videoFrame").attr("src"));
            }
        });
    });
</script>





<div class="container-fluid bg-primary py-5 mb-5 hero-header" style="background: linear-gradient(rgba(20, 20, 31, .7), rgba(20, 20, 31, .7)), url('<?php echo htmlspecialchars($landingImage); ?>'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo htmlspecialchars($landingTitle); ?></h1>
                <p class="fs-4 text-white mb-4 animated slideInDown"><?php echo htmlspecialchars($landingDescription); ?></p>
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

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5" id="AbouUs">
            <!-- Image Section -->
            <!-- <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="img/<?php echo htmlspecialchars($aboutImage); ?>" alt="<?php echo htmlspecialchars($aboutTitle); ?>" style="object-fit: cover;">
                </div>
            </div> -->
            <!-- Content Section -->
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                <h1 class="mb-4"><?php echo htmlspecialchars($aboutTitle); ?></h1>
                <p class="mb-4"><?php echo nl2br(htmlspecialchars($aboutBody)); ?></p>
                <div class="row gy-2 gx-4 mb-4">
                    <!-- Dynamic Bullet Points -->
                    <?php foreach ($aboutBullets as $bullet): ?>
                        <?php if (!empty(trim($bullet))): ?>
                            <div class="col-sm-6">
                                <p class="mb-0">
                                    <i class="fa fa-arrow-right text-primary me-2"></i><?php echo htmlspecialchars(trim($bullet)); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
            </div>
        </div>
    </div>
</div>

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
                                    <img class="img-fluid" src="<?=$destination['DestinationImage'] ?>" alt="<?= htmlspecialchars($destination['DestinationLocation']) ?>">
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
            echo '<a href="package-details.php?id=' . $packageId . '" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Book Now</a>';
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


<!-- Process Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Process</h6>
            <h1 class="mb-5">3 Easy Steps</h1>
        </div>
        <div class="row gy-5 gx-4 justify-content-center">
            <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative border border-primary pt-5 pb-4 px-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                        <i class="fa fa-globe fa-3x text-white"></i>
                    </div>
                    <h5 class="mt-4">Choose A Destination</h5>
                    <hr class="w-25 mx-auto bg-primary mb-1">
                    <hr class="w-50 mx-auto bg-primary mt-0">
                    <p class="mb-0">Explore our wide range of destinations across Africa. From scenic safaris to serene beaches, find the perfect getaway for your dream vacation.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="position-relative border border-primary pt-5 pb-4 px-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                        <i class="fa fa-dollar-sign fa-3x text-white"></i>
                    </div>
                    <h5 class="mt-4">Pay Online</h5>
                    <hr class="w-25 mx-auto bg-primary mb-1">
                    <hr class="w-50 mx-auto bg-primary mt-0">
                    <p class="mb-0">Complete your booking with our secure and convenient online payment system. No hassle, no stress—just a few clicks away from your adventure.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="position-relative border border-primary pt-5 pb-4 px-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                        <i class="fa fa-plane fa-3x text-white"></i>
                    </div>
                    <h5 class="mt-4">Fly Today</h5>
                    <hr class="w-25 mx-auto bg-primary mb-1">
                    <hr class="w-50 mx-auto bg-primary mt-0">
                    <p class="mb-0">Pack your bags and get ready for an extraordinary journey. Fly with us and let Africa's beauty take your breath away!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Process End -->



<?php
// Assuming $con is your PDO connection
$sql = "SELECT * FROM Guides WHERE GuideStatus = 1"; // 1 indicates active guides
$stmt = $con->prepare($sql);
$stmt->execute();
$guides = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Team Start -->
<!-- <div class="container-xxl py-5">
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
</div> -->
<!-- Team End -->



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