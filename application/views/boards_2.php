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
<h3 >View Archived Bulletin Boards.</h3> 
<div class="form-popup" id="myForm">
  <?php echo form_open_multipart('boards/view_archive'); ?>
    <button type="submit" class="btn btn-success">View</button>    
</form>
</div>
</div>
</div>
<div class="col-sm-1">
</div>
<div class="col-sm-8">
<h3>Your existing Bulletin Boards.</h3>
<?php echo form_open_multipart('boards/loadboard'); ?>
     <input type='text' name='search' value='<?php echo $search; ?>' minlength="0" maxlength="10">
     <input type='submit' class="btn btn-success" name='submit' value='Submit'>
 </form> 
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
    $sno = $row+1;
    foreach($result as $value){

      echo "<tr>";
      echo "<td><h4>".$sno."</h4></td>";
      echo "<td><h4>".$value['name']."</h4></td>";?>
      <td>
		<?php echo form_open_multipart('boards/edit_board'); ?>
		<input type="hidden" name="name" value="<?php  echo $value['name'];?>"/>
		<button type="submit" class="btn btn-primary" />Edit</button>
		</form>
		<!--<?php echo form_open_multipart('boards/add_member'); ?>
		<input type="hidden" name="name" value="<?php  echo $value['name'];?>"/>
		<button type="submit" class="btn btn-success" />Add Member</button>
		</form>-->
		<?php echo form_open_multipart('boards/delete_board'); ?>
		<input type="hidden" name="name" value="<?php  echo $value['name'];?>"/>
		<button type="submit"  class="btn btn-danger" />Delete</button>
		</form>
		<?php echo form_open_multipart('boards/archive'); ?>
		<input type="hidden" name="name" value="<?php  echo $value['name'];?>"/>
		<button type="submit" class="btn btn-info">Move to Archives</button>
		</form>
		<!--<?php echo form_open_multipart('boards/remove_member'); ?>
		<input type="hidden" name="name" value="<?php  echo $value['name'];?>"/>
		<button type="submit" class="btn btn-danger">Remove Member</button>
		</form>-->
		</td>
		</tr>
		<?php
		$sno++;
	}
 

    if(count($result) == 0)
    {
      echo "<tr>";
      echo "<td colspan='3' class='alert alert-info'><h3>No record found.</h3></td>";
      echo "</tr>";
    }
    ?>
		
</tbody>

</table>
<div class="row" id="tc">
<h3>
<div style='margin-top: 10px;'>
   
   <?php echo $pagination; ?>
</div>
</h3>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row">
</div>
</div>
