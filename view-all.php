<?php
global $wpdb;
$table = $wpdb->prefix . "Product_table";
$all_products = $wpdb->get_results(
	
		"SELECT * FROM $table"
	
);
?>
<div class="container">
	<div class="row"> 
		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Product table</h4></div>
			<div class="panel-body">
				<table id="producttable" class="display" style="width:100%">
				<thead>
					<tr>
						<th>ID<th>
						<th>Name</th>
						<th>Category</th>
						<th>Price</th>
						<th>About</th>
						<td>
						<a class="btn btn-info" href="admin.php?page=edit&edit=<?php echo $value['ID']; ?>">EDIT</a>
						<a class="btn btn-danger btnproductdelete" href="javascript:void(0)" data-id="<?php echo $value['ID']; ?>">DELETE</a>
						</td>
					</tr>
				</thead>
				<tbody>
				<?php 
				if (count($all_products) > 0)	{
					$i = 1;
						foreach ($all_products as $product => $value){
				?>				
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $value['Name']; ?></td>
						<td><?php echo $value['Category']; ?></td>
						<td><?php echo $value['Price']; ?></td>
						<td><?php echo $value['About']; ?></td>
						 
					</tr>
				<?php 
						}
				}
				?>	
				</tbody>
				<tfoot>
					<tr>
						<th>ID<th>
						<th>Name</th>
						<th>Category</th>
						<th>Price</th>
						<th>About</th>
					</tr>
				</tfoot>
				</table>
			</div>
		</div>		
	</div>
</div>
