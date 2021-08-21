<?php
require_once('config.php');

$qery_for_fetching_category_dataset = "SELECT id, name, created_at, created_by, updated_at, updated_by FROM category";
$result = $conn->query($qery_for_fetching_category_dataset);
$category_dataset = [];
if ($result->num_rows > 0) {
    $category_dataset = $result->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin Panel</title>
    <!-- <link href="css/datatable.css" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" hr ef="index.html">Admin Panel</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Category
                        </a>
                        <a class="nav-link" href="product.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Product
                        </a>
                        <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div> -->

                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Category</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="">Category</a></li>
                        <li class="breadcrumb-item active">Tables</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- <i class="fas fa-table me-1"></i> -->
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">Add Category</button>
                        </div>
                        <div class="card-body">
                            <table id="categoryTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Created Date</th>
                                        <th>Created By</th>
                                        <th>Updated Date</th>
                                        <th>Updated By</th>
                                    </tr>
                                </thead>
                                <?php if (!empty($category_dataset)) { ?>
                                    <?php foreach ($category_dataset as $category) { ?>
                                        <tr>
                                            <td><?php echo $category['id']; ?></td>
                                            <td><?php echo $category['name']; ?></td>
                                            <td><?php echo $category['created_at']; ?></td>
                                            <td><?php echo $category['created_by']; ?></td>
                                            <td><?php echo $category['updated_at']; ?></td>
                                            <td><?php echo $category['updated_by']; ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- add modal -->
                <div class="modal fade" tabindex="-1" role="dialog" id="addMember">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span> Add Member</h4>
                            </div>

                            <form class="form-horizontal" action="php_action/create.php" method="POST" id="createMemberForm">

                                <div class="modal-body">
                                    <div class="messages"></div>

                                    <div class="form-group">
                                        <!--/here teh addclass has-error will appear -->
                                        <label for="name" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                            <!-- here the text will apper  -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact" class="col-sm-2 control-label">Contact</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="active" class="col-sm-2 control-label">Active</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="active" id="active">
                                                <option value="">~~SELECT~~</option>
                                                <option value="1">Activate</option>
                                                <option value="2">Deactivate</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!-- /add modal -->
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; 2021 Developed by : Janvi Ranpara</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="js/scripts.js"></script>
    <!-- <script src="js/datatable.js"></script>
        <script src="js/datatables-simple-demo.js"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#categoryTable').DataTable();

            $("#addMemberModalBtn").on('click', function() {
                // reset the form 
                $("#createMemberForm")[0].reset();
                // remove the error 
                $(".form-group").removeClass('has-error').removeClass('has-success');
                $(".text-danger").remove();
                // empty the message div
                $(".messages").html("");

                // submit form
                $("#createMemberForm").unbind('submit').bind('submit', function() {

                    $(".text-danger").remove();

                    var form = $(this);

                    // validation
                    var name = $("#name").val();
                    var address = $("#address").val();
                    var contact = $("#contact").val();
                    var active = $("#active").val();

                    if (name == "") {
                        $("#name").closest('.form-group').addClass('has-error');
                        $("#name").after('<p class="text-danger">The Name field is required</p>');
                    } else {
                        $("#name").closest('.form-group').removeClass('has-error');
                        $("#name").closest('.form-group').addClass('has-success');
                    }

                    if (address == "") {
                        $("#address").closest('.form-group').addClass('has-error');
                        $("#address").after('<p class="text-danger">The Address field is required</p>');
                    } else {
                        $("#address").closest('.form-group').removeClass('has-error');
                        $("#address").closest('.form-group').addClass('has-success');
                    }

                    if (contact == "") {
                        $("#contact").closest('.form-group').addClass('has-error');
                        $("#contact").after('<p class="text-danger">The Contact field is required</p>');
                    } else {
                        $("#contact").closest('.form-group').removeClass('has-error');
                        $("#contact").closest('.form-group').addClass('has-success');
                    }

                    if (active == "") {
                        $("#active").closest('.form-group').addClass('has-error');
                        $("#active").after('<p class="text-danger">The Active field is required</p>');
                    } else {
                        $("#active").closest('.form-group').removeClass('has-error');
                        $("#active").closest('.form-group').addClass('has-success');
                    }

                    if (name && address && contact && active) {
                        //submi the form to server
                        $.ajax({
                            url: form.attr('action'),
                            type: form.attr('method'),
                            data: form.serialize(),
                            dataType: 'json',
                            success: function(response) {

                                // remove the error 
                                $(".form-group").removeClass('has-error').removeClass('has-success');

                                if (response.success == true) {
                                    $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                        '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>' + response.messages +
                                        '</div>');

                                    // reset the form
                                    $("#createMemberForm")[0].reset();

                                    // reload the datatables
                                    manageMemberTable.ajax.reload(null, false);
                                    // this function is built in function of datatables;

                                } else {
                                    $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                        '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>' + response.messages +
                                        '</div>');
                                } // /else
                            } // success  
                        }); // ajax subit 				
                    } /// if


                    return false;
                }); // /submit form for create member
            }); // /add modal                
        });
    </script>
    <!-- include custom index.js -->
    <script type="text/javascript" src="../custom/js/index.js"></script>
</body>

</html>