<title>Login</title>
<body id="mustard">
<div class="container-fluid">
<div class="row" id="tc" >
<h3><?php echo $this->session->flashdata('pass')?></h3>
<div class="login col-md-3 mx-auto text-center">

<h3>New User? Sign up here!!</h3>
<?php echo form_open_multipart('login/signup'); ?>
<h5><b>Enter UserName</b></h5>
<input type="text" name="username" value=""  required />
<div class="alert-danger"><h3><?php echo form_error('username'); ?></h3></div>
<h5><b>Enter Email</b></h5>
<input type="email" id="email" name="email" required>

<h5><b>Enter your Password</b></h5>
<input type="password" name="password" value="" required/>
<div class="alert-danger"><h3><?php echo form_error('password'); ?></h3></div>
<h5><b>Confirm your Password</b></h5>
<input type="password" name="confirm_password" value="" required/>
<div class="alert-danger"><h3><?php echo form_error('confirm_password'); ?></h3></div>
<br>
<input type="submit" value="SignUp"  class="btn btn-primary" />
</form>
</div>
<div class="col-md-1">
	
</div>
<div class="login col-md-3 mx-auto text-center">

<h3>Forgot Password???</h3>
<?php echo form_open_multipart('login/forgot'); ?>
<h5><b>Enter Email</b></h5>
<input type="email" id="email" name="email" required>
<br>
<input type="submit" value="Submit"  class="btn btn-primary" />
</form>
</div>
<div class="col-md-1">
	
</div>
<div class="login col-md-3 mx-auto text-center" >

<h3>Existing Users Login Here!!</h3>

<?php echo form_open_multipart('login/verify'); ?>
<h5><b>Enter UserName</b></h5>
<input type="text" name="username" value=""  required/>
<div class="alert-danger"><h3><?php echo form_error('username'); ?></h3></div>
<h5><b>Enter your Password</b></h5>
<input type="password" name="password" value="" required/>
<div class="alert-danger"><h3><?php echo form_error('password'); ?></h3></div>
<br>
<input type="submit" value="Login"  class="btn btn-primary" />
</form>
</div>
</div>
<div class="container-fluid">
<div class="row">
</div>
</div>
</div>