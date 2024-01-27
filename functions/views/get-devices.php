<?php
include_once 'functions/connection.php';

$sql = 'SELECT * FROM `devices`';
$stmt = $db->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $row) {
?>
    <option value="<?=$row['id']?>"><?=$row['name']?></option>
<?php
}
