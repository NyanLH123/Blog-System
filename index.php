<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Blog System — Home</title>

  <!-- Bootstrap 5 (CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>
  <!-- header component -->
  <header class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container">
      <a class="navbar-brand" href="/">MyBlog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <nav class="collapse navbar-collapse" id="mainNav" aria-label="Main navigation">
        <ul class="navbar-nav ms-auto align-items-lg-center">
          <li class="nav-item"><a class="nav-link" href="/Blog_System/login.php">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="/register.html">Register</a></li>
          <li class="nav-item"><a class="btn btn-primary ms-2" href="/user/myposts.html">Write</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="container" id="main">
    <div class="row mb-3 align-items-center">
      <div class="col-md-6">
        <h1 class="h3">Latest posts</h1>
      </div>
      <div class="col-md-6">
        <div class="d-flex gap-2 justify-content-md-end">
          <input id="searchInput" class="form-control form-control-sm" placeholder="Search posts..." aria-label="Search posts">
          <select id="categoryFilter" class="form-select form-select-sm w-auto" aria-label="Filter by category">
            <option value="">All categories</option>
          </select>
        </div>
      </div>
    </div>

    <div id="postsContainer" class="row g-3">
      <!-- Cards injected here -->
    </div>

    <nav aria-label="Pagination" class="mt-4">
      <ul id="pagination" class="pagination justify-content-center"></ul>
    </nav>
  </main>

  <!-- footer -->
  <footer class="mt-5 py-4 bg-light">
    <div class="container text-center small text-muted">© <span id="year"></span> MyBlog — Built with Bootstrap</div>
  </footer>

  <!-- Modals and toasts -->
  <div id="modals-root"></div>
  <div id="toasts-root" class="position-fixed bottom-0 end-0 p-3" style="z-index:1100"></div>

  <script type="module">
    import { initApp } from './assets/js/app.js';
    initApp({ page: 'home' });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
