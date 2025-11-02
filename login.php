<?php
session_start();
require 'config/config.php';

if (isset($_POST['btnLogin'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($email) || empty($password)) {
    echo "<script>alert('Please complete the form');</script>";
  } else {
    $statement = $pdo->prepare("SELECT * FROM user WHERE Email = :email");
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user) {
      if ($password == $user['Password']) {
        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['user_email'] = $user['Email'];

        if ($user['Role'] == 'IsAdmin') {
          $_SESSION['is_admin'] = true;
          header('Location: /admin/index.php');
          exit();
        } else {
          header('Location: /user/home.php');
          exit();
        }
      } else {
        echo "<script>alert('Incorrect password');</script>";
      }
    } else {
      echo "<script>alert('Email not found');</script>";
    }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login — MyBlog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body class="d-flex align-items-center" style="min-height:100vh">
  <main class="container">
    <div class="row justify-content-center">
      <div class="col-sm-10 col-md-6 col-lg-5">
        <div class="card shadow-sm">
          <div class="card-body p-4">
            <h1 class="h4 mb-3">Sign in</h1>

            <form action="login.php" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" minlength="8" required>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-primary" name="btnLogin">Login</button>
              </div>
              <div class="mt-3 small text-center">
                Don't have an account? <a href="register.php">Register</a>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </main>

  <div id="toasts-root" class="position-fixed bottom-0 end-0 p-3" style="z-index:1100"></div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>