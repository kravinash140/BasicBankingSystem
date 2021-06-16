<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <link rel="stylesheet" href="./static/index.css">

  <title>Banking System</title>
</head>

<body>
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent p-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html">Banking System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/banking#transfer">Transfer Money</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/banking#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/banking#contact">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


  <div class="container p-5 text-center mt-5">
    <!-- grab id from url query and view  -->
    <div class="row">
      <div class="col-10 col-md-6 col-lg-4 mx-auto bg-white">
    <?php
    require 'db.php';
    $sender;
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = " . $id;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $sender = $row['name'];
        echo '<div class="shadow p-3">
          <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" class="img-fluid" width=256 >
          <h2> Customer Profile </h2>
            <h3>Name : ' . $row['name'] . ' </h3>
            <h4>Email : ' . $row['email'] . ' </h4>
            <h4>Balance : ' . $row['balance'] . ' </h4>
          </div>
          </div>
          </div>';
      }
    } else {
      echo "No Customers Found !";
    }

    mysqli_close($conn);

    ?>
  
  </header>
</body>

</html>