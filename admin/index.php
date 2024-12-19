<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("../lib/drive.php");  
$con = $pdo;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']); 

    $sql = "SELECT * FROM admin WHERE AdminEmail = :email AND AdminPassword = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['loggedin'] = true;
        $_SESSION['AdminID'] = $admin['AdminID'];
        $_SESSION['AdminFName'] = $admin['AdminFName'];
        $_SESSION['AdminLName'] = $admin['AdminLName'];
        $_SESSION['AdminEmail'] = $admin['AdminEmail'];
        $_SESSION['AdminPhone'] = $admin['AdminPhone'];
        $_SESSION['AdminManager'] = $admin['AdminManager'];
        header("Location: home.php");
        exit();
    } else {
        $error_message = "Invalid email or password.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>5*StarVacationAfrica Admin</title>
  <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" href="../img/images/icon.ico" type="image/x-icon">
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-start py-5 px-4 px-sm-5">
              <!-- Brand Logo -->
              <div class="brand-logo text-center mb-4">
                <div style="background-color: #ffffff; padding: 0px; display: inline-block; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);width:100%">
                  <img src="../img/images/logo.png" alt="Company Logo" class="img-fluid" style="width: 60%; height: auto;">
                </div>
              </div>
              <h6 class="fw-light text-center mb-4">Sign in to continue.</h6>

              <!-- Display error message if login fails -->
              <?php if (isset($error_message)) { ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
              <?php } ?>

              <!-- Login form -->
              <form method="POST" action="">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Enter your password" required>
                </div>
                <div class="mt-3 d-grid gap-2">
                  <button type="submit" class="btn btn-primary btn-lg fw-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="keepSignedIn">
                    <label class="form-check-label text-muted" for="keepSignedIn">Keep me signed in</label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="text-center mt-4 fw-light">
                  Don't have an account? <a href="register.php" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
</body>
</html>
