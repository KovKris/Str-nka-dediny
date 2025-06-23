<?php
include('partials/header.php');
include('inc/classes/Database.php');
include('inc/classes/User.php');

$db = new Database();
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $role = isset($_POST['role']) && ($_POST['role'] == '0' || $_POST['role'] == '1') ? $_POST['role'] : null;
    $password = $_POST['password'];


    if (empty($name) || empty($email) || empty($role) || empty($password)) {
        echo "<p style='color: red;'>Všetky polia sú povinné.</p>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color: red;'>Neplatný email.</p>";
    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

 
        if ($user->create($name, $email, $role, $hashedPassword)) {
            header("Location: admin.php");
            exit;
        } else {
            echo "<p style='color: red;'>Error creating user. Možno už existuje používateľ s týmto emailom.</p>";
        }
    }
}
?>

<section class="container">
    <h1>Pridanie používateľa</h1>
    <form id="user" action="" method="POST">
        <input type="text" placeholder="Meno" id="name" name="name" required><br>
        <input type="email" placeholder="Email" id="email" name="email" required><br>
        
        <select id="role" name="role" required>
            <option value="" disabled selected>Vyberte rolu</option>
            <option value="0">Admin</option>
            <option value="1">User</option>
        </select><br>

        <input type="password" placeholder="Heslo" id="password" name="password" required><br>
        <input type="submit" value="Vytvoriť">
    </form>
    <br>
    <div style="display: flex; flex-direction: column; align-items: flex-start; gap: 15px; margin-left: 0;">
        <div style="border:1px solid #ccc; padding:5px; width:70px; background:gray; text-align:center;">
            <a href="user-edit.php" class="button" style="display:block;">Upraviť používateľa</a>
        </div>
        <div style="border:1px solid #ccc; padding:5px; width:70px; background:gray; text-align:center;">
            <a href="usershow.php" class="button" style="display:block;">Zobraziť používateľa</a>
        </div>
    </div>
</section>

<?php
include('partials/footer.php');
?>