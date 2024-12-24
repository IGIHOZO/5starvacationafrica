<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>5*StarVacationAfrica - Travel Agency</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="../img/images/icon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://5starvacationafrica.com/lib/animate/animate.min.css" rel="stylesheet">
    <link href="https://5starvacationafrica.com/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://5starvacationafrica.com/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="https://5starvacationafrica.com/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://5starvacationafrica.com/css/style.css" rel="stylesheet">

</head>
<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>KG 9 Ave, Kigali, Rwanda</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+250 736 615 069</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>info@5starvacationafrica.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="index.php" class="navbar-brand p-0">
                <img src="img/images/logo.png" alt="5 Star Vacation Africa - Logo" style="width: 250px; max-width: 110%; height: 500px!important; margin-top: -20px; 
                            background-color: rgba(255, 255, 255, 0.8); 
                            border-radius: 5px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="destination.php" class="nav-item nav-link">Destinations</a>
                    <!-- <a href="service.php" class="nav-item nav-link">Services</a> -->
                    <a href="package.php" class="nav-item nav-link">Packages</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">More Services</a>
                        <div class="dropdown-menu m-0">
                            <a href="booking.php" class="dropdown-item">Book Now</a>
                            <a href="team.php" class="dropdown-item">Travel Guides</a>
                            <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                            <a href="#" class="dropdown-item"></a>
                            <a href="training.php" class="dropdown-item">Trainings</a>
                            <a href="internship.php" class="dropdown-item">Internships</a>
                        </div>
                    </div>
                    <a href="#Contact" class="nav-item nav-link">Contact</a>
                </div>
                <a href="#" class="btn btn-primary rounded-pill py-2 px-4 mx-2">Register</a>
                <a href="admin" target="_blank" class="btn btn-outline-secondary rounded-pill py-2 px-4">Login</a>
            </div>
        </nav>