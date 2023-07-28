<?php
function uploadImage($image)
{

    $target_dir = __DIR__ . "/uploads/";

    $uid = uniqid();
    $target_file = $target_dir . $uid . '-' . basename($image['name']);
    if (move_uploaded_file($image['tmp_name'], $target_file)) {
        return  "/uploads/" . $uid . '-' . basename($image['name']);
    } else {
        return null;
    }
}