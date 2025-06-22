<?php
include('partials/header.php');
include('inc/classes/Database.php'); 
include('inc/classes/Contact.php');
$db = new Database();
$contact = new Contact($db);

$contactData = null; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $contactData = $contact->show($id);

    if (!$contactData) {
        echo "<p style='color: red;'>Kontakt s ID $id neexistuje.</p>";
    }
} else {
    echo "<p style='color: red;'>ID kontaktu nebolo zadané.</p>";
}
?>

<section class="container">
    <h1>Contact show</h1>
    <?php if ($contactData): ?>
        <p>Name: <?= htmlspecialchars($contactData['name']) ?></p>
        <p>Email: <?= htmlspecialchars($contactData['email']) ?></p>
        <p>Message: <?= htmlspecialchars($contactData['message']) ?></p>
        <a href="admin.php">Back to Contacts</a>
    <?php else: ?>
        <p style="color: red;">Nie je možné zobraziť kontakt, pretože neexistuje.</p>
        <a href="admin.php">Back to Contacts</a>
    <?php endif; ?>
</section>

<?php
include('partials/footer.php');
?>