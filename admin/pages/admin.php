<?php session_start();
require_once '../autoload.php';
if (!isLogin()) {
    echo "
    <script>
        alert('Please Login');
        document.location.href = '/admin/index.html';
    </script>
";
}
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
        <div class="row-flex">
            <a href="/admin/pages/logout.php" class="btn btn-primary">
                Logout
            </a>
        </div>
    </div>
    <div class="message-admin">
        <ul>
            <li class="tab active" id="sudah">Belum dibaca</li>
            <li class="tab" id="belum">Sudah dibaca</li>
        </ul>
        <div class="message-tab active" data-id="sudah">
            <div class="table-responsive">
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
                                    <a href="/admin/pages/read.php?id=<?= $message['id']; ?>" class="btn btn-primary">
                                        Baca
                                    </a>
                                    <a href="/admin/pages/delete_message.php?id=<?= $message['id']; ?>" class="btn btn-danger">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="message-tab" data-id="belum">
            <div class="table-responsive">
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
                        <?php foreach (getLastMessage() as $message) { ?>
                            <tr>
                                <td><?= $message['name']; ?></td>
                                <td><?= $message['email']; ?></td>
                                <td><?= $message['title']; ?></td>
                                <td><?= $message['message']; ?></td>
                                <td><?= $message['time']; ?></td>
                                <td>
                                    <a href="/admin/pages/read.php?id=<?= $message['id']; ?>" class="btn btn-primary">
                                        Baca
                                    </a>
                                    <a href="/admin/pages/delete_message.php?id=<?= $message['id']; ?>" class="btn btn-danger">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function dom(el) {
            return document.querySelector(el);
        }

        function domAll(el) {
            return document.querySelectorAll(el);
        }
        const tabs = domAll('.tab');
        // tab
        tabs.forEach((item, index) => {
            item.addEventListener('click', function() {
                // get tab active
                let tabActive = dom('.tab.active');
                // get tab not active
                tabActive.classList.toggle('active');
                this.classList.toggle('active');
                // get message not active
                let messageTab = Array.from(domAll('.message-tab'));
                let active = '';
                messageTab.forEach((item, index) => {
                    if (item.classList.contains('active')) {
                        item.classList.toggle('active');
                    } else {
                        item.classList.toggle('active');
                    }
                });
            });
        });
    </script>
</body>

</html>