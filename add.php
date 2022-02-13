<?php
require_once('db.php');
$upload_dir = 'uploads/';

if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $asset_desc = $_POST['asset_desc'];
    $company_code = $_POST['company_code'];
    $imgName = $_FILES['image']['name'];
    $imgTmp = $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];
    if (empty($name)) {
        $errorMsg = 'Please input name';
    } elseif (empty($asset_desc)) {
        $errorMsg = 'Please input asset_desc';
    } elseif (empty($company_code)) {
        $errorMsg = 'Please input company_code';
    } else {
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $allowExt  = array('jpeg', 'jpg', 'png', 'gif');
        $userPic = time() . '_' . rand(1000, 9999) . '.' . $imgExt;
        if (in_array($imgExt, $allowExt)) {
            if ($imgSize < 5000000) {
                move_uploaded_file($imgTmp, $upload_dir . $userPic);
            } else {
                $errorMsg = 'Image too large';
            }
        } else {
            $errorMsg = 'Please select a valid image';
        }
    }

    if (!isset($errorMsg)) {
        $sql = "insert into md_service(name, asset_desc, company_code, image) values('" . $name . "', '" . $asset_desc . "', '" . $company_code . "', '" . $userPic . "')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $successMsg = 'New record added successfully';
            header('Location: index.php');
        } else {
            $errorMsg = 'Error ' . mysqli_error($conn);
        }
    } else {
        echo $errorMsg;
    }
}
