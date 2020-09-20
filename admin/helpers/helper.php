<?php
function write_file($path, $data, $mode = 'wb')
{
    if (!$fp = @fopen($path, $mode)) {
        return FALSE;
    }

    flock($fp, LOCK_EX);

    for ($result = $written = 0, $length = strlen($data); $written < $length; $written += $result) {
        if (($result = fwrite($fp, substr($data, $written))) === FALSE) {
            break;
        }
    }

    flock($fp, LOCK_UN);
    fclose($fp);

    return is_int($result);
}
function getNewMessage()
{
    $contact = json_decode(file_get_contents('../db/contact.json'), true);
    $message = [];
    foreach ($contact as $key => $value) {
        if ($value['status'] == 1) {
            $message[] = $value;
        }
    }
    return $message;
}
function getLastMessage()
{
    $contact = json_decode(file_get_contents('../db/contact.json'), true);
    $message = [];
    foreach ($contact as $key => $value) {
        if ($value['status'] == 2) {
            $message[] = $value;
        }
    }
    return $message;
}
function getMessage($id = '')
{
    $message = json_decode(file_get_contents('../db/contact.json'), true);
    if ($id) {
        foreach ($message as $key => $value) {
            if ($id == $value['id']) {
                return $message[$key];
            }
        }
    } else {
        return $message;
    }
}
function isLogin()
{
    if (array_key_exists('login', $_SESSION) && array_key_exists('user', $_SESSION)) {
        return true;
    }
    return false;
}
