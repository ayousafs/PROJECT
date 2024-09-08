<!DOCTYPE html>
<html>

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

  <link href="css/custom.css" rel="stylesheet"/>
  <script src="js/custom2.js" defer></script>


</head>

<body>



  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    <?php include ("header.php"); ?>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                    Burger Haven!
                    </h1>
                    <p>
                    Burger Haven, founded by passionate food enthusiasts, redefines burgers in Pakistan by combining international trends with local flavors. They use locally sourced, 100% halal beef, fresh vegetables, and homemade sauces, ensuring perfection. Their mission is to bring joy to every meal.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

    </section>
    <!-- end slider section -->
  </div>

 
  <!-- food section -->

  <?php include ("food_section.php"); ?>
  <!-- end food section -->

 
  <!-- about section -->
  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <?php
              // Include database connection file
              include('db.php');

              // Query to select data from 'about_us' table
              $sql = "SELECT * FROM `about_us` ORDER BY id";
              $result = $conn->query($sql);

              // Check if query returns any result
              if ($result->num_rows > 0) {
                // Fetch each row as associative array
                while ($row = $result->fetch_assoc()) {
                  // Display the title and about section
                  echo '<h2>' . $row['title'] . '</h2>';
                  echo '<p>' . $row['about'] . '</p>';
                }
              } else {
                // If no data is found
                echo '<p>No information found.</p>';
              }

              // Close the connection
              $conn->close();
              ?>
            </div>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
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

  <!-- end book section -->


  <!-- footer section -->
    <?php include ("footer.php"); ?>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>