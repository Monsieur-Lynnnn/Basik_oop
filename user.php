<?php

use Components\UserDataTable;

include_once './layouts/header.php';

?>

<div class="container">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="h4">
            User Data
        </h4>
        <a href="./user.php" class="btn btn-primary">
            Tambah User
        </a>
    </div>

    <div class="overflow-x-auto">
        <?= UserDataTable::render(); ?>
    </div>
</div>

<?php include_once './layouts/footer.php'; ?>
