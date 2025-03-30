<?php
    include('partials/header.php');
?>
<main>
  <section>
    <div>
      <div class="col_w10">
          <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $contact_name = $_POST['meno'];

              if (empty($contact_name)) {
                echo "";
              } else {
                echo "<h2>$contact_name ďakujeme za vyplnenie formulára.</h2>";
              }
                 
            }  
          ?>
        </div>
    </div>
  </section>
</main>
<?php
    include('partials/footer.php');
?>