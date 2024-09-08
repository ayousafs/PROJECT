<!-- food section -->
<section class="food_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>Our Menu</h2>
    </div>

    <ul class="filters_menu">
      <li class="active" data-filter="*">All</li>
      <li data-filter=".burger">Burger</li>
      <li data-filter=".pizza">Pizza</li>
      <li data-filter=".pasta">Pasta</li>
      <li data-filter=".fries">Fries</li>
    </ul>

    <div class="filters-content">
      <div class="row grid">
        <?php
        // Include database connection file
        include('db.php');

        // Query to select menu items
        $sql = "SELECT * FROM `menu` ORDER BY id DESC";
        $result = $conn->query($sql);

        // Check if there are results
        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            // Determine the category class
            $category_class = strtolower($row['category_name']);
            $short_desc = substr($row['full_desc'], 0, 150) . '...'; // Adjust the length as needed
        ?>
        <div class="col-sm-6 col-lg-4 all <?php echo $category_class; ?>">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="<?php echo $row['image']; ?>" alt="">
              </div>
              <div class="detail-box">
                <h5><?php echo $row['title']; ?></h5>
                <p class="full-desc" style="display:none;"><?php echo $row['full_desc']; ?></p>
                     <p class="short-desc"><?php echo $short_desc; ?></p> 
                <a href="javascript:void(0);" class="read-more">Read More</a>
                <div class="options">
                  <h6><?php echo $row['price']; ?></h6>
                  <a href="">
                    <svg version="1.1" clasee="button"id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;margin-bottom:7px;" xml:space="preserve">
                      <g>
                        <g>
                          <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248 c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                        </g>
                      </g>
                      <g>
                        <g>
                          <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48 C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064 c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4 C457.728,97.71,450.56,86.958,439.296,84.91z" />
                        </g>
                      </g>
                      <g>
                        <g>
                          <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296 c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                        </g>
                      </g>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        } else {
          echo "<p>No results found.</p>";
        }

        // Close database connection
        $conn->close();
        ?>
      </div>
    </div>
  </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.read-more').forEach(function(button) {
        button.addEventListener('click', function() {
            // Get the parent box
            var box = this.closest('.box');
            
            // Find the full description and short description
            var fullDesc = box.querySelector('.full-desc');
            var shortDesc = box.querySelector('.short-desc');

            // Toggle the visibility
            if (fullDesc.style.display === 'none') {
                // Show full description
                fullDesc.style.display = 'block';
                shortDesc.style.display = 'none';
                this.textContent = 'Read Less';
            } else {
                // Show short description
                fullDesc.style.display = 'none';
                shortDesc.style.display = 'block';
                this.textContent = 'Read More';
            }
        });
    });
});
</script>
 




  <!-- end food section -->