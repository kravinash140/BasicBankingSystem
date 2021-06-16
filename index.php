<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  
  
    <link rel="stylesheet" href="static/index.css">
    
    <title>Banking System</title>
   
  </head>
  <body>
    <header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent p-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Banking System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#transfer">Transfer Money</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <div class="container customcontainer p-4 mt-5">
    <h1 class="text-center">Banking System</h1>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mt-4">

    <!--  -->
    <div class="col mb-3">
      <div class="card h-100 text-center">
      <img src="static/images/all-customers.jpg" class="card-img-top" alt="...">
      <div class="card-body">
      <a class="card-link stretched-link" href="all-customers.php">All Customers</a>
      </div>
      </div>
    </div> 
    
    <!-- // -->
    <div class="col mb-3">
      <div class="card h-100 text-center">
      <img src="static/images/all-transactions.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
      <a class="card-link stretched-link" href="all-transactions.php">View all Transactions</a>
      </div>
      </div>
    </div> 

    <!-- // -->
    <div class="col mb-3">
      <div class="card h-100 text-center">
      <img src="static/images/transfer_money.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
    <a class="card-link stretched-link" href="#transfer">Transfer Money</a>
      </div>
      </div>
    </div> 
    </div>
  </div>

</header>


  <!-- Transfer  -->
  <section id="transfer" class="container-fluid py-4">
  <h2 class="text-center">Transfer Money with ease</h2>
  <div class="row align-items-center">
    
  
  <div class="col-lg-6 d-none d-lg-inline-block">
      <img src="static/images/card.png" class="img-fluid" alt="Card Fluid">
    </div>


    <div class="col-10 col-md-8 col-lg-6 mx-auto">
    <form name='form' onsubmit="return validateForm()" action="transfer.php" method="POST">
  <div class="mb-3">
    <label for="sender" class="form-label">Select Sender</label>
    <select name="sender" id="sender" class="form-select form-select-lg">
    <?php
        require 'db.php';
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
      
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                echo '<option value="', $row['id'],'">', $row['name'], '</option>';
            }
        }
        echo '</select>';
        echo '</div>';

        echo ' <div class="mb-3">
        <label for="receiver" class="form-label">Select Receiver</label>
        <select name="receiver" id="receiver" class="form-select form-select-lg">';

        
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)){
              echo '<option value="'. $row['id'] .'">' . $row['name'] . '</option>';
          }
      }
      echo '</select>';
      echo '</div>';
      
      ?>
      <div class="mb-3">
      <label for="card" class="form-label">Card Number</label>
      <input type="text" name="card" class="form-control form-control-lg" minlength="16" maxlength="16" placeholder="Card Number">
    </div>

    <div class="row mb-3">
  
  <div class="col">
      <label for="month" class="form-label">Expiry Month</label>
    <input type="text" name="month" id="month" class="form-control form-control-lg" placeholder="Expiry Month">
  </div>

  <div class="col">
  <label for="year" class="form-label">Expiry Year</label>
    <input type="text" name="year" id="year" class="form-control form-control-lg" placeholder="Expiry Year">
  </div>
  
</div>

<div class="mb-3">
  <label for="cvv" class="form-label">CVV</label>
    <input type="text" name="cvv" id="cvv" class="form-control form-control-lg" placeholder="CVV">
  </div>

<div class="mb-3">
      <label for="amount" class="form-label">Amount</label>
      <input type="text" name="amount" id="amount" class="form-control form-control-lg" placeholder="Amount to transfer">
    </div>

  <button type="submit" class="btn btn-lg btn-primary px-5">Transfer</button>
  </form>

    </div>
  </div>
  </section>


  <!-- ABOUT  -->
  <section id="about" class="container-fluid py-4">
        <h2 class="text-center">About</h2>
        <p style="font-size: 1.5vw;">
                    Welcome to Banking System, your number one source for all your banking solutions. We're dedicated to giving you the very best of services, with a focus of your security.


                    <br>Founded in 1995 by The Sparks Foundation, Banking System has come a long way from its beginnings in Patna. When The Sparks Foundation first started out, their passion for providing excellent services drove them to do tons of research so that Banking System can offer you the world's most advanced services. We now serve customers all over  the world, and are thrilled that we're able to turn our passion into our own website.


                    <br>We hope you enjoy our services as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.


                    <br>Sincerely,

                    <br>Banking System
                </p>
  </section>

  <!-- Contact  -->

  <section id="contact" class="container-fluid py-3">
  <h2 class="text-center">Contact Us</h2>  
  <div class="row justify-content-center align-items-center">
      <div class="col-10 col-md-8 col-lg-4">
      <form>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control form-control-lg" id="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control form-control-lg" id="name">
  </div>
 

  <button type="submit" class="btn btn-lg btn-primary">Submit</button>
  </form>
  <!-- // -->
      
        <h3 class="text-white">or reach us at</h3>
        <a href=""><i class="fab fa-facebook-square"></i></a>
        <a href=""><i class="fab fa-instagram-square"></i></a>
        <a href=""><i class="fab fa-youtube"></i></a>
        <a href=""><i class="fab fa-github"></i></a>
      </div>
      
    </div>
  </section>


  <footer class="text-center p-3">
      <p>All rights Reserved | 2021</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
      
  <script>
    function validateForm() {
  var sender = document.forms["form"]["sender"].value;
  var receiver = document.forms["form"]["receiver"].value;
  var card = document.forms["form"]["card"].value;
  if (sender == receiver) {
    alert("Sender and Receiver can't be the same !");
    return false;
  }
  if(card.length != 16){
    alert("Enter Valid Card Number !");
    return false;
  }
  return true;
}
  </script>

  </body>
</html>
