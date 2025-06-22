<?php
include('partials/header.php');
include('inc/classes/Database.php'); // Corrected path to Database.php
include('inc/classes/Contact.php');
$db = new Database();
$contact = new Contact($db);

$contactData = null; // Initialize $contactData to avoid undefined variable warnings

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $contactData = $contact->show($id);

    if (!$contactData) {
        echo "<p style='color: red;'>Kontakt s ID $id neexistuje.</p>";
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        if ($contact->edit($id, $name, $email, $message)) {
            header("Location: admin.php");
            exit;
        } else {
            echo "Error editing contact.";
        }
    }
} else {
    echo "<p style='color: red;'>ID kontaktu nebolo zadané.</p>";
}
?>

<section class="container">
    <h1>Update contact</h1>
    <?php if ($contactData): ?>
        <form id="contact" action="" method="POST">
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($contactData['name']) ?>" required><br>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($contactData['email']) ?>" required><br>
            <textarea id="message" name="message"><?= htmlspecialchars($contactData['message']) ?></textarea><br>
            <input type="submit" value="Odoslať">
        </form>
    <?php else: ?>
        <p style="color: red;">Nie je možné upraviť kontakt, pretože neexistuje.</p>
    <?php endif; ?>
</section>

<?php
include('partials/footer.php');
?>