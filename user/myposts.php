<?php
session_start();
require '../config/config.php';
if (!isset($_SESSION['user_id'])) {
  header('Location: /login.php');
  exit;
}

$display = $pdo->prepare("SELECT * FROM post WHERE Author_ID = :user_id ORDER BY Created_At DESC");
$display->execute([':user_id' => $_SESSION['user_id']]);
$result = $display->fetchAll(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>My Posts — MyBlog</title>
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
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1 class="h5">My Posts</h1>
      <button id="btnNewPost" class="btn btn-sm btn-primary">New Post</button>
    </div>

    <div id="myPostsList" class="row g-3">
      <?php
      if ($result) {
        foreach ($result as $post) {
      ?>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($post['Title'], ENT_QUOTES, 'UTF-8') ?></h5>
                <p class="card-text"><?= htmlspecialchars(substr($post['Content'], 0, 50), ENT_QUOTES, 'UTF-8') ?>...</p>
                <small class="text-muted">Created: <?= htmlspecialchars($post['Created_At'], ENT_QUOTES, 'UTF-8') ?></small>
              </div>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>
  </main>

  <!-- New Post Modal -->
  <div class="modal fade" id="newPostModal" tabindex="-1" aria-labelledby="newPostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0 pb-0">
          <h5 class="modal-title" id="newPostModalLabel">Create New Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="createpost.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body pt-3">
            <div class="mb-3">
              <label for="postTitle" class="form-label fw-semibold">Title</label>
              <input type="text" class="form-control" id="postTitle" name="title" required>
            </div>
            <div class="mb-3">
              <label for="postContent" class="form-label fw-semibold">Content</label>
              <textarea class="form-control" id="postContent" name="content" rows="6" required></textarea>
            </div>
            <div class="mb-3">
              <label for="postImage" class="form-label fw-semibold">Image <span class="text-muted">(optional)</span></label>
              <input type="file" class="form-control" id="postImage" name="image" accept="image/*">
            </div>
          </div>
          <div class="modal-footer border-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Create Post</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <div id="toasts-root" class="position-fixed bottom-0 end-0 p-3" style="z-index:1100"></div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Trigger modal when "New Post" button is clicked
    document.getElementById('btnNewPost').addEventListener('click', function() {
      const modal = new bootstrap.Modal(document.getElementById('newPostModal'));
      modal.show();
    });
  </script>
</body>

</html>