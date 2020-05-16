<!DOCTYPE html>
<html>
<head>
	<?php wp_enqueue_media();?>
	<?php 
		$product_id = isset($_GET['edit']) ? intval($_GET['edit']) : 0;
		global $wpdb;
		$product_detail = $wpdb->get_row(
			$wpdb->prepare(
				"SELECT * from" . table_name()."WHERE id=%d",$product_id;
			)
		);
	?>
</head>

<body>
<div class="container">
	<div class="row"> 
		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Update Product</h4></div>
			<div class="panel-body">
				<form class="form-horizontal" action="javascript:void(0)" id="updateForm">
				<input type="hidden" name="product_id" value="<?php echo isset($_GET['edit'] ? intval($_GET['edit']) : 0)?>" />
				 <div class="form-group">
					<label class="control-label col-sm-2" for="name">Name:</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" required id="name" value="<?php echo $product_detail['name']?>">
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-2" for="category">Category:</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" required id="category" value="<?php echo $product_detail['category']?>">
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-2" for="price">Price:</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" required id="price" value="<?php echo $product_detail['price']?>"">
					</div>
				  </div>
				  				  
				  <div class="form-group">
					<label class="control-label col-sm-2" for="about">About:</label>
					<div class="col-sm-10">
					  <textarea name="about" id="about" placeholder="Enter Details" class="form-control" value="<?php echo $product_detail['about']?>"></textarea>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-2" for="image">Upload image:</label>
					<div class="col-sm-10">
						<input type="button" class="btn btn-info " id="btnImage" name="btnImage" value="Uplaod Image">
						 
					</div>
				  </div>
				  
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-default">Update</button>
					</div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>