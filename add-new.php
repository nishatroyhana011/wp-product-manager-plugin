<!DOCTYPE html>
<html>
<head> <?php wp_enqueue_media();?></head>
<body>
<div class="container">
	<div class="row"> 
		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Add Product</h4></div>
			<div class="panel-body">
				<form class="form-horizontal" action="javascript:void(0)" id="addForm">
				 
				 <div class="form-group">
					<label class="control-label col-sm-2" for="name">Name:</label>
					<div class="col-sm-10">
					  <input type="text" name="name" class="form-control" required id="name" placeholder="Enter Name"/>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-2" for="category">Category:</label>
					<div class="col-sm-10">
					  <input type="text" name="category" class="form-control" required id="category" placeholder="Enter Category"/>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-2" for="price">Price:</label>
					<div class="col-sm-10">
					  <input type="text" name="price" class="form-control" required id="price" placeholder="Enter Price"/>
					</div>
				  </div>
				  				  
				  <div class="form-group">
					<label class="control-label col-sm-2" for="about">About:</label>
					<div class="col-sm-10">
					  <textarea name="about" id="about" placeholder="Enter Details" class="form-control"></textarea>
					</div>
				  </div>
				  
				   <!--<div class="form-group">
					<label class="control-label col-sm-2" for="image">Upload image:</label>
					<div class="col-sm-10">
						<input type="button" name="btnImage" class="btn btn-info" id="imageBtn" value="Uplaod Image"/>
						 
						<img src="" id="show_image" style="height:50px; width:50px;"/>
						
					</div>
				  </div> -->
				  
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-default">Submit</button>
					</div>
				  </div>
				  
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>