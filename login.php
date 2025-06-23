<?php
include('partials/header.php');
include('inc/classes/Database.php');
include('inc/classes/Authenticate.php');

$db = new Database();
$auth = new Authenticate($db);

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    if ($auth->login($email, $password)) {
        header("Location: admin.php");
        exit;
    } else {
        $error = "Nesprávny email alebo heslo.";
    }
}
?>

<section class="container">
    <h1>Prihlásenie</h1>
    <?php if ($error): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Heslo" required><br>
        <input type="submit" value="Prihlásiť sa">
    </form>
    <br>
    <a href="user-create.php" class="button">Vytvoriť používateľa</a>
</section>

<?php include('partials/footer.php'); ?>