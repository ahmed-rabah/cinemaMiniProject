<?php
// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=moviedb', 'root', '');

// Récupération des utilisateurs
$stmt = $db->query('SELECT idUser, userName, email FROM user');
$user = $stmt->fetchAll();
?>

<!doctype html>
<html>
<head>
  <style>
    /* Mise en forme du tableau */
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even){background-color: #black}

    th {
      background-color: #4CAF50;
      color: white;
    }
  </style>
</head>
<body>
  <!-- Affichage du tableau -->
  
  <table border="1" cellspacing="2" cellpadding="2">
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Email</th>
    </tr>
    <?php foreach ($user as $user): ?>
      <tr>
        <td><?= $user['idUser'] ?></td>
        <td><?= $user['userName'] ?></td>
        <td><?= $user['email'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
