
jQuery(document).ready(function() {
   
	
	jQuery('#producttable').DataTable();
	
	jQuery(document).on("click","btnproductdelete",function(){
		var conf = confirm("Are u sure?");
		if (conf){var product_id = jQuery(this).attr("data-id");
		
		var postdata = "action=productmanagerlibrary&param=delete_data&id="+product_id;
			jQuery.post(pmajaxurl,postdata,function(response){
				var data = jQuery.parseJSON(response);
				if (data.status == 1){
					jQuery.notifyBar({
						cssClass: "success",
						html: data.message
					});
				}
		}
		
	});
	
	jQuery('#addForm').validate({
		submitHandler:function(){
			var postdata = "action=productmanagerlibrary&param=save_data&"+jQuery('#addForm').serialize();
			jQuery.post(pmajaxurl,postdata,function(response){
				var data = jQuery.parseJSON(response);
				if (data.status == 1){
					jQuery.notifyBar({
						cssClass: "success",
						html: data.message
					});
				}
			});
		}
	});
	 
	jQuery('#updateForm').validate({
		submitHandler:function(){
			var postdata = "action=productmanagerlibrary&param=edit_data&"+jQuery('#updateForm').serialize();
			jQuery.post(pmajaxurl,postdata,function(response){
				var data = jQuery.parseJSON(response);
				if (data.status == 1){
					jQuery.notifyBar({
						cssClass: "success",
						html: data.message
					});
				}
		}
	}); 
	    
  
});	
/* jQuery("#imageBtn").on("click",function(){
		
		var images = wp.media({ 
			title:"Upload Image",
			multiple: false
		}).open().on("select",function(){
			var selected_image = images.state().get("selection").first();
			var final_image = selected_image.toJSON().url;
			
			jQuery("#show_image").attr("src",final_image.url);
			//jQuery("#show_image").html("<img src='"+final_image"'/>");
		});
	
	});   */