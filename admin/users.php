<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Users — Admin</title>
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
      <h1 class="h5">User Management</h1>
      <button id="btnCreateUser" class="btn btn-sm btn-primary">Create user</button>
    </div>

    <div class="card">
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Active</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="usersTableBody">
            <!-- Filled by JS -->
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <div id="toasts-root" class="position-fixed bottom-0 end-0 p-3" style="z-index:1100"></div>
  <script type="module">
    import { initApp } from '../assets/js/app.js';
    initApp({ page: 'dashboard-users' });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
