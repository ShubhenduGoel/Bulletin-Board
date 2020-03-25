<title>Lists</title>
<body id="mustard">
<div class="container-fluid" id="brn">
<div class="row" id="tc">
<?php $board=$this->session->userdata('board'); ?>
<div id="pad" style=" width:50%;margin-left:25%;">
<h3 class="text-success">Page Information</h3>
<h4 class="text-info">
<table class="table table-stripped" style= "margin-left: 25%;width:50%;">
<thead><tr><td>BULLETIN</td><td><?php echo $board; ?></td></tr></thead>
</table>
</h4>
</div>
</div>
<h3><?php echo $this->session->flashdata('create');?></h3>
<div class="row" id="tc">
<div class="col-sm-3" style="border:10px solid;">
<div class="row" id="pad">
<div class="form-popup" id="myForm">
  <?php echo form_open_multipart('boards/index'); ?>
    <button type="submit" class="btn btn-info">Go Back to Boards</button> 
  </form>
</div>
</div>
<div class="row" id="pad">
<?php $board=$this->session->userdata('board'); ?>
<h3 >Create a new List.</h3> 
<div class="form-popup" id="myForm">
  <?php echo form_open_multipart('lists/create_list'); ?>

    <input type="text" placeholder="Enter Name" name="name"  minlength="3" maxlength="15" class="form-control input-lg " required><br>
    <button type="submit" class="btn btn-success">GO</button>
  </form>    
</div>
</div>
 
<div class="row" id="pad">
<h3 >View Archived lists.</h3> 
<div class="form-popup" id="myForm">
  <?php echo form_open_multipart('lists/view_archive'); ?>
    <button type="submit" class="btn btn-success">View</button>    
  </form>
</div>
</div>
</div>
<div class="col-sm-1">
</div>
<div class="col-sm-8" style="border:10px solid;">
 <h3>Regular Lists.</h3>
 <table class="table table-stripped">
 <h4>
 <thead>
 <tr style="font-weight: bold;">
 <td><h4>Sr. No</h4></td>
 <td><h4>Name</h4></td>
 <td><h4>Actions</h4></td>
 <td><h4>Delete</h4></td>
 </trd>
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
 		<?php echo form_open_multipart('lists/edit_list'); ?>
		<input type="hidden" name="name" value="<?php echo $value['name'];?>"/>
		<button type="submit" class="btn btn-success" />Edit</button>
		</form>
		<?php echo form_open_multipart('lists/archive'); ?>
		<input type="hidden" name="name" value="<?php  echo $value['name'];?>"/>
		<button type="submit" class="btn btn-primary" />Archive</button>
		</form>
		</td>
		<td>
		<?php echo form_open_multipart('lists/delete_list'); ?>
		<input type="hidden" name="name" value="<?php  echo $value['name'];?>"/>
		<button type="submit" class="btn btn-danger" />Delete</button>
		</form>
 		</td>
 		</tr>
 		<?php
 			$i++; 
 		}
 	
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