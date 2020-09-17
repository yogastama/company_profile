<?php session_start();
require_once '../autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <div class="title-admin">
        <h1>
            Halo, <?= $_SESSION['user']; ?>
        </h1>
    </div>
    <div class="message-admin">
        <ul>
            <li class="active" id="sudah">Belum dibaca</li>
            <li id="belum">Sudah dibaca</li>
        </ul>
        <div class="message-tab active" data-id="sudah">
            <table border="1">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Judul</th>
                        <th>Pesan</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (getNewMessage() as $message) { ?>
                        <tr>
                            <td><?= $message['name']; ?></td>
                            <td><?= $message['email']; ?></td>
                            <td><?= $message['title']; ?></td>
                            <td><?= $message['message']; ?></td>
                            <td><?= $message['time']; ?></td>
                            <td>
                                <a href="" class="btn btn-primary">
                                    Baca
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="message-tab" data-id="belum">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, sed.</div>
    </div>
</body>

</html>