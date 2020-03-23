<div class="row" id="tc">
<h3>Current Evaluation Problems</h3>
<table class="table">
<thead>
<tr style="font-weight: bold;">
<td>Problem ID</td>
<td>Name</td>
<td>Set_No</td>
</tr>
</thead>
<tbody>
<?php
foreach ($evaluations as $key => $value) 
	{?>
<tr>
<?php
			echo " 
				<td>  ".$value['id']."  </td>
		 		<td>   " .$value['name']. "</td>
			 	<td>   " .$value['set_no']. "</td>
			 	";
			 	?>
			 	</tr>
			 	<?php
	}?>
</tbody>
</table>
</div>