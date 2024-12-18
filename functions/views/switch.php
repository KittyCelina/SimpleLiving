<?php
include_once 'functions/connection.php';

$sql = 'SELECT d.name AS device_name, d.ip_address, r.name AS relay_name, r.* FROM `relays` r INNER JOIN `devices` d ON r.device = d.id';
$stmt = $db->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $row) {
?>
    <div class="col">
        <div class="card">
            <div class="card-body p-4">
                <h2 class="text-center card-title"><?=$row['relay_name']?></h2>
                <div class="d-flex mb-2"><img class="img-thumbnail flex-shrink-0 me-3 fit-cover" alt="processor, core, chip" width="50" height="50" src="assets/img/chip.png">
                    <div>
                        <p class="fw-bold mb-0"><?=$row['device_name']?></p>
                        <p class="text-muted mb-0"><?=$row['ip_address']?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-dark w-100 my-1 relay-on" type="button" data-relay="<?=$row['relay']?>" data-ip_address="<?=$row['ip_address']?>" data-userLevel="<?= $_SESSION['level'] ?>" data-level="<?=$row['level']?>">Turn On</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-dark w-100 my-1 relay-off" type="button" data-relay="<?=$row['relay']?>" data-ip_address="<?=$row['ip_address']?>" data-userLevel="<?= $_SESSION['level'] ?>" data-level="<?=$row['level']?>">Turn Off</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>
