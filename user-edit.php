<?php
include('partials/header.php');
include('inc/classes/Database.php');
include('inc/classes/User.php');

$db = new Database();
$user = new User($db);

$userData = null; // Initialize $userData to avoid undefined variable warnings

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userData = $user->show($id);

    if (!$userData) {
        echo "<p style='color: red;'>Používateľ s ID $id neexistuje.</p>";
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        if ($user->edit($id, $name, $email, $role)) {
            header("Location: admin.php");
            exit;
        } else {
            echo "<p style='color: red;'>Error editing user. Možno už existuje používateľ s týmto emailom.</p>";
        }
    }
} else {
    echo "<p style='color: red;'>ID používateľa nebolo zadané.</p>";
}
?>

<section class="container">
    <h1>Update User</h1>
    <?php if ($userData): ?>
        <form id="user" action="" method="POST">
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($userData['name']) ?>" required><br>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($userData['email']) ?>" required><br>

            <select id="role" name="role" required>
                <option value="0" <?= $userData['role'] == 0 ? 'selected' : '' ?>>Admin</option>
                <option value="1" <?= $userData['role'] == 1 ? 'selected' : '' ?>>User</option>
            </select><br>

            <input type="submit" value="Uložiť zmeny">
        </form>
    <?php else: ?>
        <p style="color: red;">Nie je možné upraviť používateľa, pretože neexistuje.</p>
    <?php endif; ?>
</section>

<?php
include('partials/footer.php');
?>