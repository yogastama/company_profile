<?php
require_once '../autoload.php';
$post = $_POST;
$post['time'] = date('Y-m-d H:i:s');
// get all message
$allMessage = getMessage();
// $allMessage[(count($allMessage) - 1)]
if (count($allMessage) == 0) {
    $allMessage[] = [
        'id' => (count($allMessage) + 1),
        'name' => $post['name'],
        'email' => $post['email'],
        'title' => $post['title'],
        'message' => $post['message'],
        'status' => 1,
        'time' => $post['time']
    ];
} else {
    $allMessage[count($allMessage)] = [
        'id' => (count($allMessage) + 1),
        'name' => $post['name'],
        'email' => $post['email'],
        'title' => $post['title'],
        'message' => $post['message'],
        'status' => 1,
        'time' => $post['time']
    ];
}

$res = write_file('../db/contact.json', json_encode($allMessage));
if ($res) {
    echo "
    <script>
        alert('Pesan anda terkirim, tunggu balasan dari kami ya!');
        document.location.href = '/';
    </script>
";
}
