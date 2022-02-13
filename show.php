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

        </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    Service Details
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md text-center">
                            <img src="<?php echo $upload_dir . $row['image']; ?>" height="200">
                        </div>
                        <div class="col-md">
                            <h5 class="form-control"><i class="fa fa-user-tag">
                                    <span><?php echo $row['name']; ?></span>
                                </i></h5>
                            <h5 class="form-control"><i class="fa fa-mobile-alt">
                                    <span><?php echo $row['asset_desc']; ?></span>
                                </i></h5>
                            <h5 class="form-control"><i class="fa fa-envelope">
                                    <span><?php echo $row['company_code']; ?></span>
                                </i></h5>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-md-12 text-center">
                            <a class="btn btn-outline-danger" href="index.php"></i><span>Back to list</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>