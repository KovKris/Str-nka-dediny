<?php
include('partials/header.php');
include('inc/classes/Database.php');
include('inc/classes/User.php');

$db = new Database();
$user = new User($db);

$userData = null; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userData = $user->show($id);

    if (!$userData) {
        echo "<p style='color: red;'>Používateľ s ID $id neexistuje.</p>";
    }
} else {
    echo "<p style='color: red;'>ID používateľa nebolo zadané.</p>";
}
?>

<section class="container">
    <h1>Detail používateľa</h1>
    <?php if ($userData): ?>
        <p>Meno: <?= htmlspecialchars($userData['name']) ?></p>
        <p>Email: <?= htmlspecialchars($userData['email']) ?></p>
        <p>Rola: <?= $userData['role'] == 0 ? 'Admin' : 'User' ?></p>
        <a href="admin.php">Späť na zoznam používateľov</a>
    <?php else: ?>
        <p>Používateľ nebol nájdený.</p>
        <a href="admin.php">Späť na zoznam používateľov</a>
    <?php endif; ?>
</section>

<?php
include('partials/footer.php');
?>