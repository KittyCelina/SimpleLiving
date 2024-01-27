<?php
include_once 'functions/connection.php';

$sql = 'SELECT * FROM `users` WHERE `level` != 0';
$stmt = $db->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $row) {
?>
    <tr>
        <td><img class="rounded-circle me-2" alt="blank profile picture, mystery man, avatar" width="30" height="30" src="assets/img/user.png"><?= $row['username'] ?></td>
        <td><?= $row['password'] ?></td>
        <td><?= $row['level'] ?></td>
        <td><?= $row['created_at'] ?></td>
        <td class="text-center">
            <a class="btn btn-warning btn-sm d-none d-sm-inline-block mx-1 mt-1 mb-1" role="button" href="#" data-bs-target="#update" data-bs-toggle="modal" data-id="<?= $row['id'] ?>" data-username="<?= $row['username'] ?>" data-password="<?= $row['password'] ?>" data-level="<?= $row['level'] ?>">
                <i class="fas fa-user-circle fa-sm text-white-50"></i>&nbsp;Update
            </a>
            <a class="btn btn-danger btn-sm d-none d-sm-inline-block mx-1 mt-1 mb-1" role="button" href="#" data-bs-target="#remove" data-bs-toggle="modal" data-id="<?= $row['id'] ?>">
                <i class="fas fa-user-circle fa-sm text-white-50"></i>&nbsp;Remove
            </a>
        </td>
    </tr>

<?php
}
