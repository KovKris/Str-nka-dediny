<?php
include('partials/header.php');
include('inc/classes/Database.php'); // Corrected path to Database.php
include('inc/classes/Authenticate.php'); // Ensure Authenticate.php is included
include('inc/classes/Contact.php'); // Ensure Contact.php is included
include('inc/classes/User.php');

$db = new Database();
$auth = new Authenticate($db);
$auth->requireLogin();

// Získanie role prihláseného používateľa
$userRole = $auth->getUserRole();

// Kontakty
$contact = new Contact($db);
$contacts = $contact->index();

// Používatelia (iba pre adminov)
if ($userRole == 0) {
    $user = new User($db);
    $users = $user->index();
}

// Vymazanie správy
if (isset($_GET['delete'])) {
    $contact->destroy($_GET['delete']);
    header("Location: admin.php");
    exit;
}


?>

<section class="container">
    <h1>Vítaj</h1>

    <!-- Sekcia kontaktov -->
    <h2>Kontakty</h2>
    <a href="contact-create.php" class="button">Create Contact</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Meno</th>
            <th>Email</th>
            <th>Správa</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>Show</th>
        </tr>
        <?php foreach($contacts as $con): ?>
            <tr>
                <td><?= htmlspecialchars($con['id']) ?></td>
                <td><?= htmlspecialchars($con['name']) ?></td>
                <td><?= htmlspecialchars($con['email']) ?></td>
                <td><?= htmlspecialchars($con['message']) ?></td>
                <td><a href="?delete=<?= $con['id'] ?>" onclick="return confirm('Určite chcete vymazať túto správu?')">Delete</a></td>
                <td><a href="contact-edit.php?id=<?= $con['id'] ?>">Edit</a></td>
                <td><a href="contact-show.php?id=<?= $con['id'] ?>">Show</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Sekcia používateľov (iba pre adminov) -->
    <?php if ($userRole == 0): ?>
        <h2>Používatelia</h2>
        <a href="user-create.php" class="button">Create User</a>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Meno</th>
                <th>Email</th>
                <th>Role</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>Show</th>
            </tr>
            <?php foreach($users as $u): ?>
                <tr>
                    <td><?= htmlspecialchars($u['id']) ?></td>
                    <td><?= htmlspecialchars($u['name']) ?></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                    <td><?= htmlspecialchars($u['role']) ?></td>
                    <td><a href="?delete_user=<?= $u['id'] ?>" onclick="return confirm('Určite chcete vymazať tohto používateľa?')">Delete</a></td>
                    <td><a href="user-edit.php?id=<?= $u['id'] ?>">Edit</a></td>
                    <td><a href="user-show.php?id=<?= $u['id'] ?>">Show</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</section>

<?php
include('partials/footer.php');
?>
