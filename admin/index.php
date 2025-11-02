<?php
session_start();
require '../config/config.php';

if (empty($_SESSION['user_id'])) {
  header('Location: /login.php');
  exit;
}
if (empty($_SESSION['is_admin'])) {
  header('Location: /Blog_System/index.php');
  exit;
}

if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin'])) {
  header('Location: ../login.php');
  exit();
}

$statement = $pdo->prepare("SELECT 
    (SELECT COUNT(*) FROM user) AS user_count,
    (SELECT COUNT(*) FROM post) AS post_count  
    ");
$statement->execute();
$stats = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Dashboard — MyBlog</title>
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
    <div class="row mb-3">
      <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
          <h1 class="h4 mb-0">Admin Dashboard</h1>
          <div class="text-muted small">Manage users, posts and comments</div>
        </div>
        <div class="d-flex gap-2">
          <button id="btnNewPostTop" class="btn btn-primary">New Post</button>
          <a href="/dashboard/users.html" class="btn btn-outline-secondary">Manage Users</a>
        </div>
      </div>
    </div>

    <div class="row g-3 mb-4">
      <div class="col-6 col-md-6">
        <div class="card p-3">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="text-muted small">Users</div>
              <div id="statUsers" class="h5 mb-0"><?php echo $stats['user_count'] ?></div>
            </div>
            <div class="text-muted">👥</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-6">
        <div class="card p-3">
          <div>
            <div class="text-muted small">Posts (total)</div>
            <div id="statPosts" class="h5 mb-0"><?php echo $stats['post_count'] ?></div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6 mb-3">
        <div class="card p-3 h-100">
          <h2 class="h6">Recent Posts</h2>
          <div id="recentPosts" class="list-group list-group-flush mt-2">
            <!-- populated by admin.js -->
          </div>
          <div class="mt-3 text-end"><a href="/dashboard/posts.html" class="link-primary">View all posts</a></div>
        </div>
      </div>
      <div class="col-lg-6 mb-3">
        <div class="card p-3 h-100">
          <h2 class="h6">Recent Comments</h2>
          <div id="recentComments" class="list-group list-group-flush mt-2">
            <!-- populated by admin.js -->
          </div>
          <div class="mt-3 text-end"><a href="/dashboard/posts.html" class="link-primary">Manage comments</a></div>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-12">
        <div class="card p-3">
          <h2 class="h6">Admin capabilities</h2>
          <ul class="mb-0">
            <li>Manage users (create/edit/delete, assign roles)</li>
            <li>Manage posts: create, edit, publish/unpublish, schedule</li>
            <li>Moderate comments on posts (approve/delete)</li>
          </ul>
        </div>
      </div>
    </div>
  </main>

  <div id="toasts-root" class="position-fixed bottom-0 end-0 p-3" style="z-index:1100"></div>
  <script type="module">
    import {
      initApp
    } from '../assets/js/app.js';
    import {
      getAuthUser
    } from '../assets/js/utils.js';
    // Guard: only admin may access this page when using mock or real auth
    const user = getAuthUser();
    if (!user) {
      // Not logged in — redirect to login
      window.location.href = '/login.html';
    } else if (user.role !== 'admin') {
      // Not admin — redirect to user home
      window.location.href = '/user/home.html';
    }
    initApp({
      page: 'dashboard'
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>