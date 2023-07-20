<?php
include 'data_connection.php';
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit();
}

$pageRecords = 5;

if (isset($_GET['pageRecords'])) {
  $pageRecords = $_GET['pageRecords'];
}

if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

if (isset($_GET['search'])) {
  $search = $_GET['search'];
} else {
  $search = "";
}

$start_from = ($page - 1) * $pageRecords;

if (isset($_GET['sort'])) {
  $sort = $_GET['sort'];
} else {
  $sort = 'asc';
}

function Records($conn, $search, $pageRecords, $start_from, $sort)
{
  // Add sorting by title, description, and status
  $query = "SELECT * FROM records WHERE user_id = '" . $_SESSION['user_id'] . "' AND (title LIKE '%$search%' OR description LIKE '%$search%') ORDER BY title $sort, description $sort, status $sort LIMIT $start_from, $pageRecords";
  $result = mysqli_query($conn, $query);
  return $result;
}


function totalRecords($conn, $search)
{
  $sql = "SELECT COUNT(*) AS total FROM records WHERE user_id = '" . $_SESSION['user_id'] . "' AND (title LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  return $row["total"];
}

// function searching($conn,$search)
// {

//   $query = "SELECT * FROM records WHERE user_id = '" . $_SESSION['user_id'] . "' AND (title LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')";
//    $result = mysqli_query($conn,$query);
//    $row = mysqli_fetch_assoc($result);
//    return $result;
// }

// function sorting ($conn,$sort)
// {
//   $query = "SELECT * FROM records WHERE user_id = '".$_SESSION['user_id']."' ORDER BY title $sort";
//   $result = mysqli_query($conn,$query);
//   $row = mysqli_fetch_assoc($result);
//   return $result;
// }

$result = Records($conn, $search, $pageRecords, $start_from, $sort);
$total_records = totalRecords($conn, $search);
$total_pages = ceil($total_records / $pageRecords);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <button type="button" class="btn btn-dark text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Data Records
            </button>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Select
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="record_detail.php">Add data</a></li>
              <li><a class="dropdown-item" href="logout.php">Log out</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="add text-center">
        <a class="navbar-brand" href="#"><?= strtoupper($_SESSION['username']) ?></a>
      </div>
    </div>
    <form class="d-flex" method="GET">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="<?= $search ?>">
      <button class="btn btn-outline-secondary" type="submit">Search</button>
    </form>
  </nav>
  <h3 class="text-center my-5">Display records</h3>
  <table id="example" class="table table-light mb-4 p-1">
    <form method="GET" action="">
      <div class="float-end mb-4">
        <select class="form-select" name="pageRecords" aria-label="Default select example" id="Select_Nodata">
          <option value="5" <?= ($pageRecords == 5) ? 'selected' : '' ?>>5</option>
          <option value="10" <?= ($pageRecords == 10) ? 'selected' : '' ?>>10</option>
          <option value="15" <?= ($pageRecords == 15) ? 'selected' : '' ?>>15</option>
        </select>
        <input type="hidden" class="form-select"  name="sort" aria-label="Default select example" id="Sort_Nodata">
      </div>
    </form>
    <thead class="bg-dark text-dark text-center">
  <th>
  <a href="?page=<?= $page ?>&search=<?= $search ?>&sort=<?= ($sort == 'asc') ? 'desc' : 'asc' ?>&pageRecords=<?= $pageRecords ?>">
    Title
    <?php if ($sort == 'asc') : ?>
      <span style="color: black;" class="data-bs-toggle=tooltip" data-bs-placement="right" title="Ascending">&#9650;</span>
    <?php else : ?>
      <span style="color: black;" class="data-bs-toggle=tooltip" data-bs-placement="right" title="Descending">&#9660;</span>
    <?php endif; ?>
  </a>
</th>
<th>
  <a href="?page=<?= $page ?>&search=<?= $search ?>&sort=<?= ($sort == 'asc') ? 'desc' : 'asc' ?>&pageRecords=<?= $pageRecords ?>">
    Description
    <?php if ($sort == 'asc') : ?>
      <span style="color: black;" class="data-bs-toggle=tooltip" data-bs-placement="right" title="Ascending">&#9650;</span>
    <?php else : ?>
      <span style="color: black;" class="data-bs-toggle=tooltip" data-bs-placement="right" title="Descending">&#9660;</span>
    <?php endif; ?>
  </a>
</th>
<th>Priority</th>
<th>Language</th>
<th>
  <a href="?page=<?= $page ?>&search=<?= $search ?>&sort=<?= ($sort == 'asc') ? 'desc' : 'asc' ?>&pageRecords=<?= $pageRecords ?>">
    Status
    <?php if ($sort == 'asc') : ?>
      <span style="color: black;" class="data-bs-toggle=tooltip" data-bs-placement="right" title="Ascending">&#9650;</span>
    <?php else : ?>
      <span style="color: black;" class="data-bs-toggle=tooltip" data-bs-placement="right" title="Descending">&#9660;</span>
    <?php endif; ?>
  </a>
</th>

    <th>File</th>
    <th>Date</th>
    <th>View</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>

    
    <tbody>
      <?php
      if (mysqli_num_rows($result) == 0) {
        echo '<tr><td colspan="11" class="text-center">Data not found</td></tr>';
      } else {
        $index = ($page - 1) * $pageRecords;
        while ($res = mysqli_fetch_assoc($result)) {
          $imageURL = "image/" . $res["attachment"];
      ?>
          <tr class="text-left">
            <td><?= ++$index ?></td>
            <td><?= $res['title'] ?? ''; ?></td>
            <td><?= $res['description'] ?? ''; ?></td>
            <td><?= $res['priority'] ?? ''; ?></td>
            <td><?= $res['language'] ?? ''; ?></td>
            <td><?= $res['status'] ?? ''; ?></td>
            <td><img src="<?= $imageURL; ?>" alt="" width="45px" height="20%" /></td>
            <td><?= date('d-m-Y', strtotime($res['due_date'])) ?? ''; ?></td>
            <td><a href="view.php?id=<?= $res['id']; ?>" class="btn btn-dark text-white">View</a></td>
            <td><a href="update.php?id=<?= $res['id']; ?>" class="btn btn-dark text-white">Edit</a></td>
            <td><a href="delete.php?id=<?= $res['id']; ?>" class="btn btn-dark text-white" onclick="return confirm('Are you sure to delete data?')">Delete</a></td>
          </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>

  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center align-items-end">
      <li class="page-item <?= ($page == 1 || (isset($_GET['search']) && empty($_GET['search'])) || (isset($_GET['sort']) && empty($_GET['sort']))) ? 'disabled' : '' ?>">
        <a class="page-link" href="?page=<?= ($page - 1) ?> &search=<?= $search ?>&sort=<?= $sort ?>&pageRecords=<?= $pageRecords ?>" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <?php
      for ($i = 1; $i <= $total_pages; $i++) {
        echo '<li class="page-item ' . ($page == $i ? "active" : "") . '"><a class="page-link" href="?page=' . $i . '&search=' . ($search) . '&sort=' . $sort . '&pageRecords=' . $pageRecords . '">' . $i . '</a></li>';
      }
      ?>
      <li class="page-item <?= ($page == $total_pages || mysqli_num_rows($result) == 0) ? 'disabled' : '' ?>">
        <a class="page-link" href="?page=<?= ($page + 1) ?>&search=<?= $search ?>&sort=<?= $sort ?>&pageRecords=<?= $pageRecords ?>" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
  <script>
    $(document).ready(function() {
      $("#Select_Nodata, #Sort_Nodata").change(function() {
        var pageRecords = $("#Select_Nodata").val();
        var sort = $("#Sort_Nodata").val();
        var search = "<?= ($search) ?>";
        window.location.href = "data_dispay.php?pageRecords=" + pageRecords + "&search=" + search + "&sort=" + sort;
      });
    });
  </script>
</body>

</html>