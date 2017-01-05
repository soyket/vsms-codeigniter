<?php $this->load->view('admin/partials/admin_header.php'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>All Employees</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add a new Employee</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <label><?php echo $message; ?></label>
                        <form method="post">
                            <fieldset>
                                <div class="form-group">
                                    First Name : <input class="form-control" placeholder="First Name" name="f_name" type="text" value="<?php echo $userRow['first_name']; ?>" required>
                                </div>
                                <div class="form-group">
                                    Last Name : <input class="form-control" placeholder="Last Name" name="l_name" type="text" value="<?php echo $userRow['last_name']; ?>" required>
                                </div>
                                <div class="form-group">
                                    Mobile : <input class="form-control" placeholder="Mobile" name="u_mobile" type="text" value="<?php echo $userRow['mobile']; ?>" required>
                                </div>
                                <div class="form-group">
                                    Position : <input class="form-control" placeholder="Position" name="u_position" type="text" value="<?php echo $userRow['position']; ?>" required>
                                </div>
                                <div class="form-group">
                                    Password : <input class="form-control" placeholder="Password" name="u_pass" type="password" required>
                                </div>
                                <div class="form-group">
                                    Gender : <?php
                                    if(strcmp("male", $userRow['gender']) == 0)
                                        echo '<input type="radio" name="u_gender" value="male" checked> Male';
                                    else
                                        echo '<input type="radio" name="u_gender" value="male"> Male';
                                    if(strcmp("female",$userRow['gender']) == 0)
                                        echo ' &nbsp<input type="radio" name="u_gender" value="female" checked> Female';
                                    else
                                        echo '&nbsp <input type="radio" name="u_gender" value="female"> Female';
                                    ?>
                                </div>

                                <div class="form-group">
                                    Date of Birth:<input type="date"  value="<?php echo $userRow['birthday']; ?>" name="u_bday">
                                </div>
                                
                                <div class="form-group">
                                    Address: <textarea rows="3" cols="10" class="form-control"  name="u_address"><?php echo $userRow['address']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if(strcmp("admin",$this->session->userdata('type'))==0) {
                                    echo 'User Type ';
                                    if(strcmp("admin",$userRow['type'])==0)
                                    echo '<input type="radio" name="u_type" value="admin" checked> Admin';
                                    else
                                    echo '<input type="radio" name="u_type" value="admin"> Admin';
                                    if(strcmp("Employee",$userRow['type'])==0)
                                    echo ' &nbsp<input type="radio" name="u_type" value="employee" checked> Employee';
                                    else
                                    echo '&nbsp <input type="radio" name="u_type" value="employee"> Employee';
                                    }
                                    ?>
                                </div>
                                <br/>
                                <input type="submit" name="buttonSubmit" value="Save" />
                                <input type="hidden" name="u_id" value="<?php echo $userRow['id'] ?>">
                            </fieldset>
                        </form>
                    </div> <!-- /content --> 
                </div><!-- /x-panel --> 
            </div> <!-- /col --> 
        </div> <!-- /row --> 
    </div>
</div> <!-- /.col-right --> 
<!-- /page content -->

<?php $this->load->view('admin/partials/admin_footer'); ?>

<?php if($this->session->flashdata('message') != NULL) : ?>
<script>
    swal({
      title: "Success",
      text: "<?php echo $this->session->flashdata('message'); ?>",
      type: "success",
      timer: 1500,
      showConfirmButton: false
    });
</script>
<?php endif ?>