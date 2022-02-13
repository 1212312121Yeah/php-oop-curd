<?php
require_once('db.php');
$upload_dir = 'uploads/';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from md_service where id=" . $id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        $errorMsg = 'Could not Find Any Record';
    }
}

if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $asset_desc = $_POST['asset_desc'];
    $company_code = $_POST['company_code'];
    $imgName = $_FILES['image']['name'];
    $imgTmp = $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];
    if ($imgName) {
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $allowExt  = array('jpeg', 'jpg', 'png', 'gif');
        $userPic = time() . '_' . rand(1000, 9999) . '.' . $imgExt;
        if (in_array($imgExt, $allowExt)) {
            if ($imgSize < 5000000) {
                unlink($upload_dir . $row['image']);
                move_uploaded_file($imgTmp, $upload_dir . $userPic);
            } else {
                $errorMsg = 'Image too large';
            }
        } else {
            $errorMsg = 'Please select a valid image';
        }
    } else {
        $userPic = $row['image'];
    }

    if (!isset($errorMsg)) {
        $sql = "update md_service set name = '" . $name . "', asset_desc = '" . $asset_desc . "', company_code = '" . $company_code . "', image = '" . $userPic . "' where id=" . $id;
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $successMsg = 'New record updated successfully';
            header('Location:index.php');
        } else {
            $errorMsg = 'Error ' . mysqli_error($conn);
        }
    } else {
        echo $errorMsg;
    }
}

?>


<?php include('header.php'); ?>
<nav class="navbar navbar-expand-md navbar-light ">
    <div class="container">
        <a class="navbar-brand" href="index.php">Asset Audit - MD-Service</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i></a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Edit Service
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo $row['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="asset_desc">Asset Desc</label>
                            <input type="text" class="form-control" name="asset_desc" placeholder="Enter Asset Desc" value="<?php echo $row['asset_desc']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="company_code">Company Code</label>
                            <input type="text" class="form-control" name="company_code" placeholder="Enter Company Code" value="<?php echo $row['company_code']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="image">Choose Image</label>
                            <div class="col-md-4">
                                <img src="<?php echo $upload_dir . $row['image']; ?>" width="100">
                                <input type="file" class="form-control" name="image" value="" capture="user" accept="image/*;capture=camera">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>