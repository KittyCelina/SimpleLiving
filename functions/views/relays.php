<?php
include_once 'functions/connection.php';

$sql = 'SELECT * FROM `relays`';
$stmt = $db->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $row) {
?>
    <tr>
        <td><img class="img-thumbnail me-2" alt="processor, core, chip" width="30" height="30" src="assets/img/chip.png"><?= $row['name'] ?></td>
        <td><?= $row['device'] ?></td>
        <td><?= $row['relay'] ?></td>
        <td><?= $row['level'] ?></td>
        <td><?= $row['created_at'] ?></td>
        <td class="text-center">
            <a class="btn btn-primary btn-sm d-none d-sm-inline-block mx-1 mt-1 mb-1" role="button" href="#">
                <i class="fas fa-user-circle fa-sm text-white-50"></i>&nbsp;On</a>
            <a class="btn btn-primary btn-sm d-none d-sm-inline-block mx-1 mt-1 mb-1" role="button" href="#">
                <i class="fas fa-user-circle fa-sm text-white-50"></i>&nbsp;Off</a>
            <a class="btn btn-warning btn-sm d-none d-sm-inline-block mx-1 mt-1 mb-1" role="button" href="#" data-bs-target="#update" data-bs-toggle="modal" data-id="<?= $row['id'] ?>" data-name="<?= $row['name'] ?>" data-device="<?= $row['device'] ?>" data-relay="<?= $row['relay'] ?>" data-level="<?= $row['level'] ?>">
                <i class="fas fa-user-circle fa-sm text-white-50"></i>&nbsp;Update</a>
            <a class="btn btn-danger btn-sm d-none d-sm-inline-block mx-1 mt-1 mb-1" role="button" href="#" data-bs-target="#remove" data-bs-toggle="modal" data-id="<?= $row['id'] ?>">
                <i class="fas fa-user-circle fa-sm text-white-50"></i>&nbsp;Remove</a>
        </td>
    </tr>

<?php
}
