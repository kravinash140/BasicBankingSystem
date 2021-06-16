<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <link rel="stylesheet" href="static/index.css">
    
    <title>Banking System</title>
  </head>
  <body>
  <header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent p-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Banking System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php#transfer">Transfer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php#contact">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <div class="container p-5 text-center">
    <h1>All Customers</h1>
    <!-- grab all data and view  -->
    <?php
        require 'db.php';

        $sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  echo '<table class="table text-white">
  <thead>
  <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Balance</th>
    </tr>
    </thead>
    <tbody>';
  while($row = mysqli_fetch_assoc($result)) {
    echo  '<tr>
      <th scope="row">' . $row["id"] . '</th>
      <td><a class="text-warning" href="customer.php?id='. $row["id"] .'">' . $row['name'] .'</a></td>
      <td>' . $row['email'].'</td>
      <td>'.$row['balance'].'</td>
    </tr>
  ';
  }
  echo '</tbody>
  </table>';
} else {
  echo '<h1 class="text-warning">No Customers Found !</h1>';
}
mysqli_close($conn);
    ?>
  </div>
</header>
  </body>
</html>