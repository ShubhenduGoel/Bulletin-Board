<title>Cards</title>
<body id="mustard">
<div class="container-fluid" id="brn">
<div class="row" id="tc">
<?php $board=$this->session->userdata('board'); ?>
<?php $list=$this->session->userdata('list'); ?>
<div id="pad" style="width:50%;margin-left:25%;">
<h3 class="text-success">Page Information</h3>
<h4 class="text-info">
<table class="table table-stripped" style= "margin-left: 25%;width:50%;">
<thead><tr><td>BULLETIN</td><td><?php echo $board; ?></td></tr></thead>
<tbody><tr><td>LIST</td><td><?php echo $list; ?></td></tr></tbody>
</table>
</h4>
</div>
<h3><?php echo $this->session->flashdata('create');?></h3>
</div>
<div class="row" id="tc">
<div class="col-sm-3" style="border:10px solid;">
<div class="row" id="pad">
<div class="form-popup" id="myForm">
  <?php echo form_open_multipart('cards/index'); ?>
    <button type="submit" class="btn btn-info">Go Back to Cards</button> 
  </form>
</div>
</div>
<div class="row" id="pad">
<?php $board=$this->session->userdata('board'); ?> 
</div> 
<div class="row" id="pad">
</div>
</div>
<div class="col-sm-1">
</div>
<div class="col-sm-8" style="border:10px solid;">
 <h3> Available Lists to move Cards.</h3>
 <table class="table table-stripped">
 <h4>
 <thead>
 <tr style="font-weight: bold;">
 <td><h4>Sr. No</h4></td>
 <td><h4>Name</h4></td>
 <td><h4>Move</h4></td>
 </tr>
 </thead>
 </h4>
<tbody>
 	<?php 
 		$i=1;
 		foreach ($result as $key => $value) 
 		{
 		?>
 		<tr class="text-info">
 		<?php
				echo " 
			<td ><h4>  ".$i." </h4> </td>
		 	<td> <h4> " .$value['name']." </h4> </td>
		";
		?>
 		<td>
 		<?php echo form_open_multipart('cards/move'); ?>
		<input type="hidden" name="name" value="<?php  echo $value['name'];?>"/>

		<button type="submit" class="btn btn-primary" />MOVE</button>
		</form>
		</td>
 		</tr>
 		<?php
 		}
 		$i++; 
 	 ?>
</tbody>
</table>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row">
</div>
</div>