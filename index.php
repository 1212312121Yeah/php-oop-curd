<?php
include('db.php');
$upload_dir = 'uploads/';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "select * from md_service where id = " . $id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $image = $row['image'];
        unlink($upload_dir . $image);
        $sql = "delete from md_service where id=" . $id;
        if (mysqli_query($conn, $sql)) {
            header('location:index.php');
        }
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
                <li class="nav-item"><a class="btn btn-primary" href="create.php"><i class="fa fa-user-plus"></i></a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Service List</div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Asset Desc</th>
                                <th>Company Code</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "select * from md_service";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><img src="<?php echo $upload_dir . $row['image']; ?>" height="40"></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['asset_desc']; ?></td>
                                        <td><?php echo $row['company_code']; ?></td>
                                        <td class="text-center">
                                            <a href="show.php?id=<?php echo $row['id']; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
                                            <a href="index.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>