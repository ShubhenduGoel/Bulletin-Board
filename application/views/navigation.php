<div class="container-fluid" id="brown">
<div class="row" id="tc">
<?php $username=$this->session->userdata('username');?>
<h3 id="brn">You are currently logged in as <?php echo $username; ?></h3>
</div>
</div>

<header id="brown">
<div class="container" >
<nav class="navbar fixed-top " >
<div class="row" id="tc">
<div class="col-sm-3" ><a class="navbar-brand" href= "<?php echo site_url('dashboard')?>"><b>HOME</b></a> </div>
<div class="col-sm-3" ><a class="navbar-brand" href= "<?php echo site_url('boards') ?>"><b>BOARDS</b></a></div>
<div class="col-sm-3"><a class="navbar-brand" href= "<?php echo site_url('userportal') ?>"><b>MY ACCOUNT</b></a>
</div>
<div class="col-sm-3" ><a class="navbar-brand" href= "<?php echo site_url('logout') ?>"><b>LOGOUT</b></a></div>
</div>
</nav>
<div class="row alert-danger" id="tc">
</div>
</div>

</header>
