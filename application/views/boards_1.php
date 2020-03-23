<title>Boards</title>
<body id="mustard">
<div class="container-fluid" id="brn">
<div class="row" id="tc">
<h3><?php echo $this->session->flashdata('create');?></h3>
</div>
<div class="row" id="tc">
<div class="col-sm-3" >
<div class="row">
<h3 >Create a new Bulletin Board.</h3> 
<div class="form-popup" id="myForm">
  <?php echo form_open_multipart('boards/new_board'); ?>

    <input type="text" placeholder="Enter Name" name="name"  minlength="3" maxlength="15" required>
    <button type="submit" class="btn btn-success">GO</button>
    
  </form>
</div>
</div> 
<div class="row">
<h3 >View Regular Bulletin Boards.</h3> 
<div class="form-popup" id="myForm">
  <?php echo form_open_multipart('boards/index'); ?>

    <button type="submit" class="btn btn-success">View</button>
    
  </form>
</div>
</div>
</div>
<div class="col-sm-1">
</div>
<div class="col-sm-8">
<h3>Your Archived Bulletin Boards.</h3> 
<table class="table table-stripped">
 <h4>
 <thead>
 <tr style="font-weight: bold;">
 <td><h4>Board ID</h4></td>
 <td><h4>Name</h4></td>
 <td><h4>Actions</h4></td>
 </tr>
 </thead>
 </h4>
<tbody>
<?php
	$i=1;
	foreach ($result as $key => $value) 
	{
		?> 
		<tr id="yellow">
		<?php
				echo " 
			<td ><h4>  ".$i." </h4> </td>
		 	<td> <h4> " .$value['name']." </h4> </td>
		
		";?>
		<td>
		<?php echo form_open_multipart('boards/unarchive'); ?>
		<input type="hidden" name="name" value="<?php  echo $value['name'];?>"/>
		<button type="submit" class="btn btn-primary" />Unarchive</button>
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