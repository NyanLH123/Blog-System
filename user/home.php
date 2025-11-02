<?php
session_start();
require '../config/config.php';
if (empty($_SESSION['user_id'])) {
  header('Location: /login.php');
  exit;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>User Home — MyBlog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body>
  <header class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">MyBlog</a>
    </div>
  </header>

  <main class="container">
    <div id="userWelcome" class="card p-4">
      <h1 class="h5">Welcome</h1>
      <p id="welcomeText" class="text-muted">Loading...</p>
      <div class="mt-3">
        <a href="/user/myposts.php" class="btn btn-primary me-2">My Posts</a>
        <a href="/user/profile.html" class="btn btn-outline-secondary">Profile</a>
      </div>
    </div>
  </main>

  <div id="toasts-root" class="position-fixed bottom-0 end-0 p-3" style="z-index:1100"></div>
  <!-- <script type="module">
    import { getAuthUser } from '../assets/js/utils.js';
    const user = getAuthUser();
    if (!user) {
      window.location.href = '/login.html';
    } else if (user.role === 'admin') {
      // admins should go to admin dashboard
      window.location.href = '/dashboard/index.html';
    } else {
      document.getElementById('welcomeText').textContent = `Hello ${user.name} — role: ${user.role}`;
    }
  </script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
