<link href="templates/assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
<!-- Page plugins css -->
<link href="templates/assets/node_modules/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
<!-- Color picker plugins css -->
<link href="templates/assets/node_modules/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
<!-- Date picker plugins css -->
<link href="templates/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<!-- Daterange picker plugins css -->
<link href="templates/assets/node_modules/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="templates/assets/node_modules/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
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
                        <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>todo" >Todo</a> </li>
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
                        <strong>Error!</strong>  <?php echo $this->session->flashdata('error'); ?>.
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card ">

                    <div class="card-body">
                        <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-body">


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <input type="text" name="title" placeholder="Todo Title"   data-validation="required" value="<?php echo (isset($todo['title']) && $todo['title'] !="") ? $todo['title']:""; ?>"  autocomplete="off" class="regular-text form-control required valid" kl_virtual_keyboard_secure_input="on">
                                            </div>
                                           <div class="col-sm-6">
                                             <select name="todo_type" class="form-control">
                                                    <option>Priority</option>
                                                    <option value="0" <?php echo (isset($todo['todo_type']) && $todo['todo_type'] =="0")?"selected":"";?>>Urgent</option>
                                                    <option value="1" <?php echo (isset($todo['todo_type']) && $todo['todo_type'] =="1")?"selected":"";?>>Medium</option>
                                                    <option value="2"  <?php echo (isset($todo['todo_type']) && $todo['todo_type'] =="2")?"selected":"";?>>Normal</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <input type="text" name="assign_date" class="form-control" data-validation="required" placeholder="TODO Date- YY-mm-dd" id="mdate" value="<?php echo (isset($todo['assign_date']) && $todo['assign_date'] !="") ? $todo['assign_date']:""; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="PageType">Todo Details<span class="asterisk">*</span></label>
                                            <textarea name="todo_detail" id="todo_detail" class="form-control" rows="10" cols="15">
                                                   <?php echo (isset($todo['todo_detail']) && $todo['todo_detail'] !="")?$todo['todo_detail']:"";?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            <hr>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="PageType">Publish Status<span class="asterisk">*</span></label>
                                            <select name="publish_status" class="publish_status form-control">
                                                <option value="1"  <?php echo (isset($todo['publish_status']) && $todo['publish_status'] =="1")?"selected":"";?>>Yes</option>
                                                <option value="0"  <?php echo (isset($todo['publish_status']) && $todo['publish_status'] =="0")?"selected":"";?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <input type="hidden" name="todo_id" value="<?php echo (isset($todo['todo_id']) && $todo['todo_id'] !="") ? $todo['todo_id']:""; ?>">
                                                <input type="submit" name="Setting Btn" class="btn btn-success" value="Save">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


<script>
    $.validate();
</script>
<!--<script>-->
<!--    CKEDITOR.replace( 'todo_detail',{-->
<!--    filebrowserUploadUrl: "/rp-admin/themes/plugins/ckeditor/imgupload.php/",-->
<!--    filebrowserWindowWidth  : 800,-->
<!--    filebrowserWindowHeight : 500-->
<!--});-->
<!---->
<!--</script>-->
<script>
    $('.add-tag').click(function(){
        var value = $(this).attr("id");
        $('#new_tags').val($('#new_tags').val() + value);
    });
</script>
<!-- script to remove tags-->
<script>
      CKEDITOR.replace( 'todo_detail'  ,{
        toolbar: [
            { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
            { name: 'styles', items: [ 'Format', 'FontSize' ] },
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline'] },
            { name: 'colors', items: [ 'TextColor' ] },
            { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
            { name: 'links', items: [ 'Link', 'Unlink' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-' ] },
        ],
        filebrowserBrowseUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });
    $('.remtag').click(function(){

        var term = $(this).attr("id");
        var content = $('#content_id').val();

        var postData = {
            'term_id' : term,
            'content_id' : content
        };


        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>index.php/content/rmv_content_tag',
            dataType: "html",

            data: postData, // appears as $_GET['id'] @ your backend side
            success: function(data) {

                location.reload();

            }

        });
    });


</script>
<script>
    $(document).ready(function(e){

        var  value = $('.page_type').val();

        if(value == "Page")
        {

            $('#multi_tab').show();

        }

        else
        {

            $('#multi_tab').hide();


        }

        $('.page_type').change(function(){
            var  value = $('.page_type').val();
            if(value == "Page")
            {

                $('#multi_tab').show();

            }
            else
            {

                $('#multi_tab').hide();


            }
        })
    })
</script>

<script>

    $('#save_content').click(function(e)
    {

        $("#type_error").text("");
        var a=0;

        var ext1 =  $('#featuredimg').val().split('.').pop().toLowerCase();


        if(ext1 == "")
        {
            a = 1;
        }
        else
        {
            if($.inArray(ext1, ['gif','png','jpg','jpeg']) == -1)
            {
                a = 0
            }
            else
            {

                a = 1;
            }
        }

        if(a != "1")
        {
            $("#type_error").text("Invalid Featured Image");
            $("#type_error").css("color", "red");

            e.preventDefault();
        }

        else{

            e.submit;

        }



    });
</script>
<script src="templates/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="templates/assets/node_modules/popper/popper.min.js"></script>
<script src="templates/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="dist/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="templates/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="templates/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>

<!-- Plugins for this page -->
<!-- ============================================================== -->
<!-- Plugin JavaScript -->
<script src="templates/assets/node_modules/moment/moment.js"></script>
<script src="templates/assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<!-- Clock Plugin JavaScript -->
<script src="templates/assets/node_modules/clockpicker/dist/jquery-clockpicker.min.js"></script>
<!-- Color Picker Plugin JavaScript -->
<script src="templates/assets/node_modules/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
<script src="templates/assets/node_modules/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
<script src="templates/assets/node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="templates/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- Date range Plugin JavaScript -->
<script src="templates/assets/node_modules/timepicker/bootstrap-timepicker.min.js"></script>
<script src="templates/assets/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<script>
    // MAterial Date picker
    $('#mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
    $('#ydate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
    $('#timepicker').bootstrapMaterialDatePicker({ format: 'HH:mm', time: true, date: false });
    $('#date-format').bootstrapMaterialDatePicker({ format: 'dddd DD MMMM YYYY - HH:mm' });

    $('#min-date').bootstrapMaterialDatePicker({ format: 'DD/MM/YYYY HH:mm', minDate: new Date() });
    // Clock pickers
    $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    $('.clockpicker').clockpicker({
        donetext: 'Done',
    }).find('input').change(function() {
        console.log(this.value);
    });
    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
    // Colorpicker
    $(".colorpicker").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker({
        mode: 'gradient'
    });
    // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    // Daterange picker
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2015',
        maxDate: '06/30/2015',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        dateLimit: {
            days: 6
        }
    });
</script>

