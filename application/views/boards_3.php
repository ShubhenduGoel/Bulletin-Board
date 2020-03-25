<title>Boards</title>
<body id="mustard">
<div class="container-fluid" id="brn">
<div class="row" id="tc">
<h3><?php echo $this->session->flashdata('create');?></h3>
</div>
<div class="row" id="tc">
<div class="col-sm-2">
</div>
<div class="col-sm-8">
<div style="border:10px solid;">
<h3>Add Member for <?php echo $this->session->userdata('board');?></h3> 
<table class="table table-stripped">
 <h4>
 <thead>
 <tr style="font-weight: bold;">
 <td><h4>User</h4></td>
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
			<td> <h4> " .$value['username']." </h4> </td>
		
		";?>
		<td>
		<?php echo form_open_multipart('boards/add_member'); ?>
		<input type="hidden" name="name" value="<?php  echo $value['username'];?>"/>
		<button type="submit" class="btn btn-primary" />ADD</button>
		</form>
		</td>
		</tr>
		<?php
		$i++;
	}
	if($i==1)
	{
      echo "<tr>";
      echo "<td colspan='3' class='alert alert-info'><h3>No record found.</h3></td>";
      echo "</tr>";
    }
?>
</tbody>

</table>
</div>
</div>
<div class="col-sm-2">
</div>
</div>
<div class="container-fluid">
<div class="row">
</div>
</div>
</div>