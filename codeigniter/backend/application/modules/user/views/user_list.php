<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Users</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><a href="<?php echo site_url('user/form'); ?>" class="add_am"><i class="fa fa-plus-circle"></i> Create New </a></button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php
                if ($this->session->flashdata('success') != "") {
                    ?>
                    <div class="alert alert-success alert_box">
                        <a href="#" class="close alert_message" data-dismiss="alert" aria-label="close"><i
                                    class="fa fa-times"></i></a>
                        <strong>Success !</strong> <?php echo $this->session->flashdata('success'); ?>.
                    </div>
                    <?php
                }
                ?>
                <?php if ($this->session->flashdata('error') != "") {

                    ?>
                    <div class="alert alert-danger alert_box">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"><i
                                    class="fa fa-times"></i></a>
                        <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>.
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">


                    <div class="panel-body">
  <form action="<?php echo site_url('user/search') ?>" method="get" id="search_form">
                        <div class="backend-search-field">
                            <label>Search: &nbsp;</label>
                            <input class="input-search" id="backend_search" type="text" name="q" >
                            <button class="backend_search_button btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="clear"></div>
                    </form>
<script>
     $(document).ready(function(){
        $('#search_form').submit(function(e){
            if($('#backend_search').val() != '')
            {

            }
            else
            {
                alert("Write Something To Search");
                return false;
            }
        });
    });
</script>
                        <div class="table-responsive">
                            <table id="exaasdmple23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>status</th>
                                    <th>User Type</th>
                                    <th>Create Date</th>
                                    <th>Last Login</th>
                                    <th>Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach ($User as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php if ($row['status'] == 1) {
                                                echo 'Active';
                                            } else {
                                                echo 'Inactive';
                                            } ?></td>

                                        <td><?php
                                            if ($row['permission'] == 1) {
                                                echo 'Normal User';
                                            } else {
                                                echo 'Admin User';
                                            } ; ?></td>
                                        <td><?php echo $row['date_created']; ?></td>
                                        <td><?php echo $row['last_login']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo site_url('user/form/' . $row['user_id']); ?>"
                                                   class="btn btn-success" title="Edit"><i
                                                            class="fa fa-pencil-square-o"></i></a>
                                                <a class="btn btn-danger"
                                                   data-target="#myModal_delete<?php echo $row['user_id']; ?>"
                                                   data-toggle="modal" title="Delete"><i class="fa fa-trash-o"></i></a>
                                            </div>

                                            <!-- Modal for booking delete -->
                                            <div id="myModal_delete<?php echo $row['user_id']; ?>"
                                                 class="modal fade"
                                                 role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">user Delete Confirmation</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure to delete this Information</p>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <input type="hidden" class="hidden_link_delete"
                                                                   value="<?php echo site_url('user/delete/' . $row['user_id']); ?>">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                                Cancel
                                                            </button>
                                                            <button type="button" class="btn btn-default delete">Ok</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--modal-->
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                </tbody>
                            </table>
              <?php echo (isset($pagination))?$pagination:""; ?>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>



<script>
    $('.delete').click(function () {

        var values = $(this).parent().find('.hidden_link_delete').val();
        window.location = values;
    });


</script>