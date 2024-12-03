<?php
include_once 'functions/connection.php';

$sql = 'SELECT * FROM `logs`';
$stmt = $db->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $row) {
?>
    <tr>
        <td><img class="img-thumbnail me-2" alt="processor, core, chip" width="30" height="30" src="assets/img/chip.png"><?=$row['id']?></td>
        <td><?=$row['user_id']?></td>
        <td><?=$row['logs']?></td>
        <td><?=$row['created_at']?></td>
    </tr>

<?php
}
