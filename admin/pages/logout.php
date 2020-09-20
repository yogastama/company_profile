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
} else {
    session_destroy();
    echo "
    <script>
        document.location.href = '/admin/index.html';
    </script>
";
}
