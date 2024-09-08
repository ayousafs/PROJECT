<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Burger Haven! </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    <?php include ("header.php"); ?>
    <!-- end header section -->
 

  <!-- book section -->
  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>Book A Table</h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="" method="POST"> <!-- Ensure method is POST -->
              
              <div>
                <input type="text" class="form-control" name="Your_Name" placeholder="Your Name" required />
              </div>
              <div>
                <input type="text" class="form-control" name="Phone_Number" placeholder="Phone Number" required />
              </div>
              <div>
                <input type="email" class="form-control" name="Your_Email" placeholder="Your Email" required />
              </div>
              <div>
                <select class="form-control nice-select wide" name="How_Many_Persons" required>
                  <option value="" disabled selected>How many persons?</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
              <div>
                <input type="date" class="form-control" name="Date" required>
              </div>
              <div class="btn_box">
                <button type="submit" name="submit">Book Now</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end book section -->

  

  <!-- footer section -->
  <?php include ("footer.php"); ?>
  <!-- footer section -->

  <!-- jQuery and JS includes -->
</body>

</html>

<?php
include('db.php');
if (isset($_POST['submit'])) {

    $your_name = $_POST['Your_Name'];
    $phone_number = $_POST['Phone_Number'];
    $your_email = $_POST['Your_Email'];
    $how_many_persons = $_POST['How_Many_Persons'];
    $date = $_POST['Date'];
    
    // Inserting the form data into the database
    $query = mysqli_query($conn, "INSERT INTO form(`Your_Name`, `Phone_Number`, `Your_Email`, `How_Many_Persons`, `Date`) 
                                  VALUES ('$your_name', '$phone_number', '$your_email', '$how_many_persons', '$date')");

    if ($query) {
        echo "<script>alert('Form submitted successfully');</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}
?>
