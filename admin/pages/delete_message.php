<?php
session_start();
require_once '../autoload.php';
if (isLogin()) {
    // get
    $rowMessage = getMessage($_GET['id']);
    // update jadi dibaca
    // if ($rowMessage['status'] == 1) {
    $allMessage = getMessage();
    $newMessage = [];
    foreach ($allMessage as $key => $value) {
        if ($value['id'] != $_GET['id']) {
            $newMessage[] = $value;
        }
    }
    $res = write_file('../db/contact.json', json_encode($newMessage));
    // }
    echo "
    <script>
        alert('Pesan berhasil dihapus');
        document.location.href = '/admin/pages/admin.php';
    </script>
";
} else {
    echo "
    <script>
        alert('Please Login');
        document.location.href = '/admin/index.html';
    </script>
";
}
