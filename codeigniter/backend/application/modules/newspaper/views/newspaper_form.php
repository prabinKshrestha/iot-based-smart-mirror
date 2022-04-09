<style>
    span.label.label-primary.newspaper-selected {
        padding: 8px 13px;
        margin-left: 15px;
        font-weight: bolder;
    }
</style>
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
                <h4 class="text-themecolor"><?php echo (!empty($newsExist))?'Selected: <span class="label label-primary newspaper-selected">'.$newsExist.'</span>':"Select Newspaper"; ?></h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo (isset($title) && $title !="") ? $title:""; ?></li>
                    </ol>

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
                    <div class="card ">

                        <div class="card-body">

                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label>Select Newspaper<span class="asterisk">*</span>
                                                    </label>
                                                    <select required type="text" name="newspaper_id"
                                                           autocomplete="off" class="regular-text form-control required valid"
                                                           kl_virtual_keyboard_secure_input="on">
                                                         <option value="">None</option>
                                                        <?php
                                                            foreach ($newspapers as $newspaper){
                                                        ?>
                                                                <option value="<?php echo $newspaper['id'] ?>" <?php echo (isset($selectedNewspaper) && $selectedNewspaper == $newspaper['id'])?"selected":""; ?>>
                                                                    <?php echo $newspaper['name'] ?>
                                                                </option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->

                                        </div>
                                    </div>
                                </div>
                                <p class="submit">
                                    <input type="submit" name="Setting Btn" class="button" value="Save">
                                </p>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
</div>


