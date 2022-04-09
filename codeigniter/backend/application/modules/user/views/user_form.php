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
                <h4 class="text-themecolor"><?php echo (isset($title) && $title !="") ? $title:""; ?></h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>/user" >User</a> </li>
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
                                                    <label>User Name<span class="asterisk">*</span>
                                                    </label>
                                                    <input type="text" name="username"  data-validation="required"
                                                           value="<?php echo (isset($User['username']) && $User['username'] != "") ? $User['username'] : ""; ?>"
                                                           autocomplete="off" class="regular-text form-control required valid"
                                                           kl_virtual_keyboard_secure_input="on">
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Email<span class="asterisk">*</span>
                                                    </label>
                                                    <input type="text" name="email" data-validation="required"
                                                           value="<?php echo (isset($User['email']) && $User['email'] != "") ? $User['email'] : ""; ?>"
                                                           autocomplete="off" class="regular-text form-control required valid"
                                                           kl_virtual_keyboard_secure_input="on">
                                                </div>

                                            </div>
                                            <!--/span-->

                                        </div>
                                    </div>


                                <?php
                                    if (!isset($User['password'])) {

                                ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label>Password<span class="asterisk">*</span>
                                                    </label>
                                                    <input type="password" name="password" size="50" data-validation="required"
                                                           autocomplete="off" class="regular-text form-control required valid"
                                                           kl_virtual_keyboard_secure_input="on">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                <?php 
                                        } 
                                ?>


                                    <div class="row">
                                            <div class="col-md-6">
                                                <label>User Type <span class="asterisk">*</span></label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="permission"
                                                                       value="0" data-validation=""
                                                                       autocomplete="off" id="customRadio1" class="regular-text custom-control-input required valid"
                                                                       kl_virtual_keyboard_secure_input="on" <?php if(isset($User['permission'])&&$User['permission']=='0') echo 'checked="checked"'?> >

                                                        <label class="custom-control-label" for="customRadio1">Admin</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="permission"
                                                               value="1" data-validation="required"
                                                               autocomplete="off" id="customRadio2" class="regular-text custom-control-input required valid"
                                                               kl_virtual_keyboard_secure_input="on" <?php if(isset($User['permission'])&&$User['permission']=='1') echo 'checked="checked"'?>>

                                                        <label class="custom-control-label" for="customRadio2">Normal</label>
                                                    </div>
                                            </div>

                                                <div class="col-md-6">
                                                    <label>Status <span class="asterisk">*</span>
                                                    </label>

                                                    <div class="custom-controlq ">
                                                        <input type="radio" name="status"
                                                               value="0" data-validation=""
                                                               autocomplete="off" class="regular-text required valid"
                                                               kl_virtual_keyboard_secure_input="on" <?php if(isset($User['status'])&&$User['status']=='0') echo 'checked="checked"'?> >Inactive
                                                    </div>

                                                    <div class="custom-controlq">
                                                        <input type="radio" name="status"
                                                               value="1" data-validation="required"
                                                               autocomplete="off" class="regular-text required valid"
                                                               kl_virtual_keyboard_secure_input="on" <?php if(isset($User['status'])&&$User['status']=='1') echo 'checked="checked"'?>>Active
                                                    </div>


                                                </div>



                                            </div>
                                            <!--/span-->
                                </div>

                                    <p class="submit">
                                        <input type="hidden" name="user_id"
                                               value="<?php echo (isset($User['user_id']) && $User['user_id'] != "") ? $User['user_id'] : ""; ?>">
                                        <input type="submit" name="Setting Btn" class="button" value="Save">
                                    </p>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
</div>


