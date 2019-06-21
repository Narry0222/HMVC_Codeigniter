<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('common/head'); ?>
        <style>
            .image-div {margin-top: 30px; margin-bottom: 50px;}
            .well {margin-top: 0;padding: 10px 25px;}
            .datepicker {padding: 8px;}
            .datepicker .table-condensed>tbody>tr>td, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>td, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>thead>tr>th { cursor: pointer; text-align: center; padding: 5px 8px; font-size: 12px; }
            .datepicker .prev:hover, .datepicker .next:hover, .datepicker .day:hover {background: #eee;}
            .datepicker .disabled.day {color: #bbb !important; cursor: no-drop;}
        </style>
    </head>
    <body class="hold-transition skin-blue layout-top-nav">
        <div class="wrapper">
            <?php $this->load->view('common/nav'); ?>
            <div class="content-wrapper">
                <div class="m-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 style="text-transform: uppercase; padding-top: 8px;">Gallery Image Upload</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="<?= base_url('admin/create_category') ?>" class="btn btn-success pull-right"><i class="fa fa-plus"></i> &nbsp;Create Category</a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="image-div">
                        <?php $this->load->view('common/alert'); ?>
                        <form name="image" id="image_upload" method="post" enctype="multipart/form-data"  action="<?= base_url('admin/image_upload') ?>">
                            <div class="row">
                                <div class="col-md-6"><a class="btn btn-primary add_field_button"><i class="fa fa-plus"></i> &nbsp;Add More Images</a></div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="date_image" placeholder="Select Date" autocomplete="off" name="date_image" readonly style="cursor: pointer; background: #FFF;">
                                                <span class="error_date_image text-danger"></span>
                                                <?= form_error('date_image'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="category" name="category" class="form-control">
                                                <option value=""> -- Select Image Category -- </option>
                                                <?php foreach ($categories as $category) { ?>
                                                    <option value="<?= $category->id; ?>"> <?= $category->category; ?> </option>
                                                <?php } ?>
                                            </select>
                                            <span class="error_category text-danger"></span>
                                            <?= form_error('category'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input_fields_wrap">
                                <div class="well" id="0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="url">Image Title</label>
                                                <span class="text-danger">*</span>
                                                <span class="error_image_title_0 text-danger"></span>
                                                <input type="text" class="form-control" id="image_title_0" placeholder="Image Title" name="image_title[]"  autocomplete="off" autofocus  value="<?= set_value('image_title'); ?>">
                                                <input type="hidden" id="index_value" value="1">
                                                <input type="hidden" id="remove_div_ids" value="">
                                                <?= form_error('image_title'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Image</label>
                                                <span class="text-danger">*</span>
                                                <span class="error_nrt_image_0 text-danger"></span>
                                                <input type="file" accept="image/*" class="form-control" id="nrt_image_0" placeholder="Image" autocomplete="off" name="nrt_image[]" onChange="PreviewImage1(0);">
                                                <?= form_error('nrt_image'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"><button type="submit" name="submit" style="width: 100%; text-transform: uppercase; font-size: 16;" id="submit" class="btn btn-success font-mont">Submit</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('common/footer'); ?>
        <script src="<?= root; ?>assets/admin/bower_components/moment/min/moment.min.js"></script>
        <script src="<?= root; ?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script>
                                                    $(document).ready(function () {
                                                        $('#date_image').datepicker({
                                                            autoclose: true,
                                                            format: 'dd-mm-yyyy',
                                                            endDate: 'd',
                                                            defaultViewDate: 'today'
                                                        });
                                                    });
        </script>
        <script type="text/javascript">
            $(function () {
                $("#submit").click(function () {

                    var date_image = $("#date_image").val();
                    if (date_image == '') {
                        $(".error_date_image").text('');
                        $(".error_date_image").text('Required');
                        $(".error_date_image").show();
                        $('#date_image').focus();
                        return false;
                    } else {
                        $(".error_date_image").hide();
                    }

                    var category = $("#category").val();
                    if (category == '') {
                        $(".error_category").text('');
                        $(".error_category").text('Required');
                        $(".error_category").show();
                        $('#category').focus();
                        return false;
                    } else {
                        $(".error_category").hide();
                    }

                    var im = parseFloat($("#index_value").val());
                    var remove_div_values1 = Array();
                    var remove_div_values = $("#remove_div_ids").val();
                    remove_div_values1 = remove_div_values.split(",");
                    var image_title = Array();
                    var nrt_image = Array();
                    for (e = 0; e < im; e++) {
                        if (remove_div_values1[e] == '') {
                            image_title[e] = $('#image_title_' + e).val().trim();
                            if (image_title[e].length == '') {
                                $(".error_image_title_" + e).text('');
                                $(".error_image_title_" + e).text('Required');
                                $(".error_image_title_" + e).show();
                                $('#image_title_' + e).focus();
                                return false;
                            } else {
                                $(".error_image_title_" + e).hide();
                            }
                            nrt_image[e] = $('#nrt_image_' + e).val().trim();
                            if (nrt_image[e].length == '') {
                                $(".error_nrt_image_" + e).text('');
                                $(".error_nrt_image_" + e).text('Required');
                                $('#nrt_image_' + e).focus();
                                return false;
                            } else {
                                $(".error_nrt_image_" + e).hide();
                            }
                            $("#image_upload").submit();
                        }
                    }

                });
            });


        </script>
        <script>
            $(document).ready(function () {
                var max_fields = 8; //maximum input boxes allowed
                var wrapper = $(".input_fields_wrap"); //Fields wrapper
                var add_button = $(".add_field_button"); //Add button ID
                var remove_div = Array();
                var parent_id = '';
                var x = 1; //initlal text box count
                $(add_button).click(function (e) { //on add input button click
                    e.preventDefault();
                    if (x < max_fields) { //max input box allowed
                        $(wrapper).append('<div class="well" id="' + x + '"> <div class="row"> <div class="col-md-5"> <div class="form-group"> <label for="url">Image Title</label> <span class="text-danger">*</span> <span class="error_image_title_' + x + ' text-danger"></span> <input type="text" class="form-control" id="image_title_' + x + '" placeholder="Image Title" name="image_title[]" autocomplete="off" autofocus></div></div> <div class="col-md-5"> <div class="form-group"> <label for="name">Image</label> <span class="text-danger">*</span> <span class="error_nrt_image_' + x + ' text-danger"></span> <input type="file" accept="image/*" class="form-control" id="nrt_image_' + x + '" placeholder="Image" autocomplete="off" name="nrt_image[]" onChange="PreviewImage1(' + x + ');"> </div> </div><div class="col-md-2"> <a href="#" class="remove_field btn btn-danger pull-right" style="margin-top: 30px;">Remove</a> </div> </div> </div>'); //add input box
                        $("#index_value").val(x + 1);
                        x++; //text box increment
                        remove_div[x - 1] = '';
                        $("#remove_div_ids").val(remove_div);
                    }
                });

                $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                    e.preventDefault();
                    $(this).closest('.well').remove();
                    parent_id = $(this).closest('.well').prop("id");
                    remove_div[parent_id] = parent_id;
                    $("#remove_div_ids").val(remove_div);
                    x--;
                })
            });
        </script>
        <script type="text/javascript">
            function PreviewImage1(x) {
                var f = document.getElementById("nrt_image_" + x).files[0];
                var file = $('input[name="nrt_image[]"]').val();
                var exts = ['jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF']; // first check if file field has any value	
                var filesize1 = f.size / 1024 / 1024; /* IN KB */
                if (filesize1 >= 10) {
                    $(".error_nrt_image_" + x).text('');
                    $(".error_nrt_image_" + x).text('less than or equal to 10MB..!');
                    $(".error_nrt_image_" + x).show();
                    $('#nrt_image_' + x).val("");
                    return false;
                } else {
                    var ext = $('#nrt_image_' + x).val().split('.').pop().toLowerCase();
                    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                        $(".error_nrt_image_" + x).text('');
                        $(".error_nrt_image_" + x).text('Invalid Image Extension..!');
                        $(".error_nrt_image_" + x).show();
                        $('#nrt_image_' + x).val("");
                        return false;
                    } else {
                        $(".error_nrt_image_" + x).hide();
                    }
                }
                $(".error_nrt_image_" + x).text("");
                return true;
            }
        </script>
    </body>
</html>