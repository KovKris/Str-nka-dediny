<?php
include('partials/header.php');
include('inc/classes/Database.php'); // Corrected path to Database.php
include('inc/classes/Contact.php');
$db = new Database();
$contact = new Contact($db);
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    //print_r($_POST);
    if ($contact->create($name, $email, $message)) {
      header("Location: admin.php");
      exit;
    } else {
        echo "Error creating contact.";
    }
  }
?>
<section class="container">
    <h1>Pridanie kontaktu</h1>
    <form id="contact" action="" method="POST">
        <input type="text" placeholder="Vaše meno" id ="name" name="name" required><br>
        <input type="email" placeholder="Váš email" id="email" name="email" required><br>
        <textarea placeholder="Vaša správa" id="message" name="message" ></textarea><br>
        <input type="submit" value="Odoslať">
    </form>
</section>

<?php
include('partials/footer.php');
?>