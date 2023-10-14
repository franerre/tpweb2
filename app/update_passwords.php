<?php
$db = new PDO('mysql:host=localhost;dbname=db_futbol;charset=utf8', 'root', '');

$query = $db->prepare('SELECT id, password FROM usuarios');
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    $id = $row['id'];
    $password = $row['password'];

    // Verificar la contraseña
    if (password_needs_rehash($password, PASSWORD_DEFAULT)) {
        // Hashear la contraseña si es necesario volver a hashearla
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $updateQuery = $db->prepare('UPDATE usuarios SET password = ? WHERE id = ?');
        $updateQuery->execute([$hashedPassword, $id]);
    }
}


