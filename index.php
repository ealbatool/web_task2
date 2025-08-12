<?php
// Connect to database
$conn = new mysqli('localhost', 'root', '', 'simple_records');

// Add new record
if(isset($_POST['add'])){
    $conn->query("INSERT INTO users (name, age) VALUES ('".$_POST['name']."', ".$_POST['age'].")");
}

// Toggle status
if(isset($_GET['toggle'])){
    $conn->query("UPDATE users SET status = NOT status WHERE id = ".$_GET['toggle']);
    header("Location: index.php"); // Refresh page
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Records</title>
    <style>
        body { font-family: Arial; max-width: 600px; margin: auto; padding: 20px; }
        form { display: flex; margin-bottom: 20px; }
        input { padding: 8px; margin-right: 5px; }
        button { padding: 8px 15px; }
        table { width: 100%; border-collapse: collapse; }
        td, th { border: 1px solid #ddd; padding: 8px; }
        .on { background: green; color: white; }
        .off { background: red; color: white; }
    </style>
</head>
<body>

<h2>Simple Records System</h2>

<!-- Simple Form -->
<form method="post">
    <input type="text" name="name" placeholder="Name" required>
    <input type="number" name="age" placeholder="Age" required>
    <button type="submit" name="add">Add</button>
</form>

<!-- Records Table -->
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Status</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM users");
    while($row = $result->fetch_assoc()):
    ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['age'] ?></td>
        <td>
            <a href="index.php?toggle=<?= $row['id'] ?>" 
               class="<?= $row['status'] ? 'on' : 'off' ?>">
                <?= $row['status'] ? 'ON' : 'OFF' ?>
            </a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>