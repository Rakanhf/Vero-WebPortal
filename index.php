<!DOCTYPE html>
<html>
  <head>
    <title>Vero - Task List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/styles.css">
    <link rel="icon" type="image/x-icon" href="src/images/favicon.ico">
  </head>
  <body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Vero</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="../auth/logout.php">
                Logout
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
    <div class="container py-5">
      <h1 class="mb-4">Task List</h1>

      <div class="mb-3">
        <input type="text" id="search" class="form-control" placeholder="Search...">
      </div>

      <table id="task-table" class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Task</th>
            <th>Title</th>
            <th>Description</th>
            <th>Color Code</th>
          </tr>
        </thead>
        <tbody>
          <?php include './api/update-table.php'; ?>
        </tbody>
      </table>

      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#myModal">
        Open Modal
      </button>

      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Select Image</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <input type="file" id="image-input" class="form-control mb-3">
              <img id="image-preview" class="img-fluid">
            </div>
          </div>
        </div>
      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="src/js/index.js"></script>
  </body>
</html>
