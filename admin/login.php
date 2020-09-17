<?php
require_once "helpers/helper.php";
session_start();
// get post
$post = $_POST;
// get all user
$user = file_get_contents('db/user.json');
$user = json_decode($user, true);
// all gmail
$email = [];
for ($i = 0; $i < count($user); $i++) {
    $email[] = $user[$i]['email'];
}
// check user
for ($i = 0; $i < count($user); $i++) {
    if (in_array($post['email'], $email)) {
        echo '<pre>';
        if (password_verify($post['password'], $user[$i]['password'])) {
            // set session
            $_SESSION['login'] = 'true';
            $_SESSION['user'] = $post['email'];
            echo "<script>
                alert('Welcome');
                document.location.href = '/admin/pages/admin.php';
            </script>";
        } else {
            // salah password
            echo "<script>
                alert('Password anda salah');
                document.location.href = '/admin';
            </script>";
        }
    } else {
        // gada email
    }
}
