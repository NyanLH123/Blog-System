<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Profile — MyBlog</title>
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
    <h1 class="h5 mb-3">Edit profile</h1>

    <div class="row">
      <div class="col-md-4">
        <div class="card p-3 text-center">
          <img id="avatarPreview" src="../assets/img/avatar-placeholder.svg" alt="avatar" class="rounded-circle mb-3" width="120" height="120">
          <div>
            <label class="btn btn-sm btn-outline-primary">
              Upload avatar
              <input id="avatarInput" type="file" accept="image/*" hidden>
            </label>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <form id="profileForm" novalidate>
          <div class="mb-3">
            <label for="name" class="form-label">Full name</label>
            <input id="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control" type="email" required>
          </div>
          <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea id="bio" class="form-control" rows="4"></textarea>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-primary" type="submit">Save profile</button>
            <button id="changePasswordBtn" class="btn btn-outline-secondary" type="button">Change password</button>
          </div>
        </form>
      </div>
    </div>
  </main>

  <div id="toasts-root" class="position-fixed bottom-0 end-0 p-3" style="z-index:1100"></div>
  <script type="module">
    import { initApp } from '../assets/js/app.js';
    initApp({ page: 'profile' });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
