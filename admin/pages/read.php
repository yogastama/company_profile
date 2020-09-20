<?php
session_start();
require_once '../autoload.php';
if (!isLogin()) {
    echo "
    <script>
        alert('Please Login');
        document.location.href = '/admin/index.html';
    </script>
";
    exit;
}
// get
$rowMessage = getMessage($_GET['id']);
// update jadi dibaca
if ($rowMessage['status'] == 1) {
    $allMessage = getMessage();
    $newMessage = [];
    foreach ($allMessage as $key => $value) {
        if ($value['id'] == $_GET['id']) {
            $value['status'] = "2";
        }
        $newMessage[] = $value;
    }
    write_file('../db/contact.json', json_encode($newMessage));
}
// array status
$status = [
    1 => 'Belum dibaca',
    2 => 'Sudah dibaca'
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baca pesan : </title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/fa470/fa/css/font-awesome.min.css">
</head>

<body>

    <div class="container">
        <div class="row-flex">
            <a href="/admin/pages/admin.php" class="btn btn-primary">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row-flex">
                    <h3>
                        <?= htmlspecialchars($rowMessage['title']); ?>
                    </h3>
                </div>
            </div>
            <div class="card-body">
                Dari : <?= htmlspecialchars($rowMessage['name']); ?>
                <br>
                Email : <?= htmlspecialchars($rowMessage['email']); ?>
                <br>
                Time : <?= htmlspecialchars($rowMessage['time']); ?>
                <br>
                Status : <?= $status[$rowMessage['status']]; ?>
                <div class="main-text">
                    <?= htmlspecialchars($rowMessage['message']); ?>
                </div>
            </div>
            <div class="card-footer">
                <a href="mailto:yogabagas69@gmail.com" class="btn btn-primary">
                    <center>
                        Balas
                    </center>
                </a>
            </div>
        </div>
    </div>

</body>

</html>