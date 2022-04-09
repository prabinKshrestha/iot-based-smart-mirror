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
                <h4 class="text-themecolor">Deals</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Deals</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><a href="<?php echo site_url('todo/form');?>" class="add_am"><i class="fa fa-plus-circle"></i> Create New </a></button>
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
                        <strong>Error!</strong>  <?php echo $this->session->flashdata('error'); ?>.
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-body">
                    <form action="<?php echo site_url('todo/search_todo_upcomings') ?>" method="get" id="search_form">
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
                        <div class="table-responsive m-t-40">
                            <table id="exasdmple23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Title</th>
                                    <th>Priority</th>
                                    <th>Assigned Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                $i = 1;
                                foreach($todo as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $row['title'];?></td>
                                        <td>

                                            <?php



                                            if($row['todo_type'] == '0'){
                                            ?>
                                                <button class="btn btn-success btn-xs">Urgent</button>

                                            <?php
                                            }elseif ($row['todo_type'] == '1'){

                                                ?>
                                                <button class="btn btn-warning btn-xs">Medium</button>

                                            <?php

                                            }elseif ($row['todo_type'] =='2'){
                                                ?>
                                                <button class="btn btn-dark btn-xs">Normal</button>
                                            <?php

                                            }else{
                                                ?>

                                            <?php

                                            }

                                            ?></td>
                                        <td><?php echo $this->todo->countdown_date($row['assign_date']) ;?></td>

                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-warning btn-xs" data-target="#myModal_view<?php echo $row['todo_id'];?>" data-toggle="modal" title="View"><i class="fa fa-eye" ></i></a>
                                                <a href="<?php echo site_url('todo/form/'. $row['todo_id']);?>" class="btn btn-success btn-xs" title="Edit"><i class="fa fa-pencil-square-o"></i></a>

                                                <a class="btn btn-danger btn-xs" data-target="#myModal_delete<?php echo $row['todo_id'];?>" data-toggle="modal" title="Delete"><i class="fa fa-trash-o" ></i></a>
                                            </div>

                                            <!-- Modal for booking delete -->
                                            <div id="myModal_delete<?php echo $row['todo_id'];?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"><strong>Delete</strong> Confirmation</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>


                                                        <div class="modal-body">
                                                            <p>Are you sure to delete this Information</p>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <input type="hidden" class="hidden_link_delete" value="<?php echo site_url('todo/todo_delete/'. $row['todo_id']); ?>">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                                            <button type="submit" class="btn btn-success delete" >Ok</button>
                                                            <!--                                                            <a href="--><?php //echo site_url('todo/todo_delete/'. $row['todo_id']); ?><!--"><button type="button" class="btn btn-success delete" >OK</button></a>-->
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--modal-->


                                            <!-- Modal for booking delete -->
                                            <div id="myModal_view<?php echo $row['todo_id'];?>" class="modal fade"  role="dialog">
                                                <div class="modal-dialog modal-lg">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"><strong>Title: <?php echo $row['title'];?></strong> </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>


                                                        <div class="modal-body">


                                                            <table class="table table-bordered">

                                                                <tbody>

                                                              <tr>
                                                                    <th scope="row">Todo Details</th>
                                                                    <td>
                                                                        <?php echo $row['todo_detail']; ?>
                                                                    </td>      
                                                                </tr> 
                                                                <tr>
                                                                    <th scope="row">Date</th>
                                                                    <td>
                                                                        <b> End Date: </b> <br><?php echo $row['assign_date'];?>

                                                                        </td>

                                                                </tr>



                                                                <tr>
                                                                    <th scope="row">Priority</th>
                                                                    <td>
                                                                        <?php



                                                                        if($row['todo_type'] == '0'){
                                                                            ?>
                                                                            <button class="btn btn-success btn-xs">Urgent</button>

                                                                            <?php
                                                                        }elseif ($row['todo_type'] == '1'){

                                                                            ?>
                                                                            <button class="btn btn-warning btn-xs">Medium</button>

                                                                            <?php

                                                                        }elseif ($row['todo_type'] =='2'){
                                                                            ?>
                                                                            <button class="btn btn-dark btn-xs">Normal</button>
                                                                            <?php

                                                                        }else{
                                                                            ?>

                                                                            <?php

                                                                        }

                                                                        ?>
                                                                    </td>

                                                                </tr>

                                                                <tr>
                                                                    <th scope="row">Created By</th>
                                                                    </td>
                                                                    <td><a class="btn btn-info btn-xs" ></i><?php echo $this->crud->user_name_by_id($row['assign_by'])?></a></td>

                                                                </tr>

                                                                <!--   <tr>
                                                                    <th scope="row">Lead Type</th>
                                                                    <td> <?php

                                                                if($row['type'] == 0) {
                                                                    echo "<span class='btn btn-success btn-xs'>New</span>";

                                                                }elseif ($row['type'] == 1){
                                                                    echo "<span class='btn btn-warning btn-xs'>Cold</span>";

                                                                }elseif ($row['type'] == 2){
                                                                    echo "<span class='btn btn-primary btn-xs'>Warm</span>";

                                                                }elseif ($row['type'] == 3){
                                                                    echo "<span class='btn btn-info btn-xs'>Hot</span>";

                                                                }elseif ($row['type'] == 4){
                                                                    echo "<span class='btn btn-dark btn-xs'>NLWC (No Longerr with Company)</span>";

                                                                }elseif ($row['type'] == 5){
                                                                    echo "<span class='btn btn-danger btn-xs'>InActive</span>";

                                                                }elseif ($row['type'] == 6){
                                                                    echo "<span class='btn btn-success btn-xs'>Active</span>";

                                                                }else{
                                                                    echo "<span class='btn btn-success btn-xs'>Not Defined</span>";

                                                                }


                                                                ?></td>

                                                                </tr> -->
                                                                <!-- <tr>
                                                                    <th scope="row">Image</th>
                                                                    <td><img src="../uploads/todos/<?php echo $row['featured_img'];?>" width="40%" /> </td>

                                                                </tr> -->

                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    $('.delete').click(function(){

        var values = $(this).parent() .find('.hidden_link_delete').val();
        window.location =  values;
    });



</script>
