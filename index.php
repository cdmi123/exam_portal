
<?php 

  include_once 'admin/db.php';

  if (isset($_POST['login'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login_data = mysqli_query($con,"select * from user_tbl where email='$email' and password='$password'");

    if(mysqli_num_rows($login_data)==1)
    {
      $row = mysqli_fetch_assoc($login_data);
      $_SESSION['login_id'] = $row['id'];
      $_SESSION['login_name'] = $row['name'];
        header('location:dashboard.php');
    }else{
      echo "<script>alert('Check Your Email And Password')</script>";
    }
  }
 ?>

<!doctype html>
<html lang="en">


<!-- Mirrored from demos.wrappixel.com/free-admin-templates/bootstrap/spike-bootstrap-free/src/html/authentication-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 10:47:59 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Spike Free Bootstrap Admin Template by WrapPixel</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper p-0" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="card auth-card mb-0 mx-3">
          <div class="card-body">
            <a href="index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
              <img src="https://demos.wrappixel.com/free-admin-templates/bootstrap/spike-bootstrap-free/src/assets/images/logos/dark-logo.svg" width="180" alt="">
            </a>
            <p class="text-center">Your Social Campaigns</p>
            <form method="POST">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
              </div>
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
              </div>
              <input type="submit" name="login" value="Sign In" class="btn btn-primary w-100 fs-4 mb-4">
              <div class="d-flex align-items-center justify-content-center">
                <p class="fs-4 mb-0 fw-bold">New to Spike?</p>
                <a class="text-primary fw-bold ms-2" href="register.php">Create an account</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>


<!-- Mirrored from demos.wrappixel.com/free-admin-templates/bootstrap/spike-bootstrap-free/src/html/authentication-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 10:47:59 GMT -->
</html>