<title>
User Portal
</title>
</head>
<body id="mustard">
<div class="container">
<div class="row" id="tc">
<h3><?php echo $this->session->flashdata('pass');?></h3>
</div>
<div class="row" id="tc">
<br><br>
<h3 id="brn">Change Password</h3>

<?php echo form_open_multipart('userportal/change_password'); ?>


<h5><b>Enter Your Current Password</b></h5>
<input type="password" name="password" value="" size="50" required/>
<div class="alert-danger"><h4><?php echo form_error('password'); ?></h4></div>

<h5><b>Enter Your New Password</b></h5>
<input type="password" name="new_password" value="" size="50" required/>
<div class="alert-danger"><h4><?php echo form_error('new_password'); ?></h4></div>

<h5><b>Confirm Your New Password</b></h5>
<input type="password" name="confirm_password" value="" size="50" required/>
<div class="alert-danger"><h4><?php echo form_error('confirm_password'); ?></h4></div>

<br>
<button type="submit" class="btn btn-success" value="">Change Password</button>

</form>

</div>
</div>
<br><br>
