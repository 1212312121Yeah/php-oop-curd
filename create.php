<?php include('add.php'); ?>
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
                <div class="card-header">Create</div>
                <div class="card-body">
                    <form action="add.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="">
                        </div>
                        <div class="form-group">
                            <label for="asset_desc">Asset Desc</label>
                            <input type="text" class="form-control" name="asset_desc" placeholder="Enter Asset Desc" value="">
                        </div>
                        <div class="form-group">
                            <label for="company_code">Company Code</label>
                            <input type="text" class="form-control" name="company_code" placeholder="Enter Company Code" value="">
                        </div>
                        <div class="form-group">
                            <label for="image">Choose Image</label>
                            <input type="file" class="form-control" name="image" value="" >
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