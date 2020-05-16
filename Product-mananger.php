<?php
/**
 * Plugin Name: Product Manager
 * Description: A plugin for list. can be used for different purposes. 
 * Author: Nishat
 * Version: 1.0.0 
 */
 
 if(!defined("ABSPATH"))
	 exit;
 if(!defined("PM_PLUGIN_DIR_PATH"))
	define("PM_PLUGIN_DIR_PATH",plugin_dir_path(__FILE__));
 if(!defined("PM_PLUGINS_URL"))
	define("PM_PLUGINS_URL",plugins_url());
	//plugin name should be attached here

function table_name(){
	global $wpdb;
	return $wpdb->prefix . "poca_table";
}
 
 //enqueue stylesheets and scripts
 function product_manager_include_assets(){
	 
	 
	 //css files
	wp_enqueue_style("pm_style",PM_PLUGINS_URL."/Product-manager/Assets/css/pm_style.css",'');
	wp_enqueue_style("bootstrap",PM_PLUGINS_URL."/Product-manager/Assets/css/bootstrap.min.css",'');
	wp_enqueue_style("datatable",PM_PLUGINS_URL."/Product-manager/Assets/css/jquery.dataTables.min.css",'');
	wp_enqueue_style("notifybar",PM_PLUGINS_URL."/Product-manager/Assets/css/jquery.notifyBar.css",'');
	
	
	
	 //js file
	//wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-3.3.1',PM_PLUGINS_URL.'/Product-manager/Assets/js/jquery-3.3.1.js','',true);
	wp_enqueue_script('pm_script',PM_PLUGINS_URL.'/Product-manager/Assets/js/pm_script.js','',true);
	wp_enqueue_script('bootstrap',PM_PLUGINS_URL.'/Product-manager/Assets/js/bootstrap.min.js','',true);
	wp_enqueue_script('datatables',PM_PLUGINS_URL.'/Product-manager/Assets/js/jquery.dataTables.min.js','',true);
	wp_enqueue_script('notifyBar',PM_PLUGINS_URL.'/Product-manager/Assets/js/jquery.notifyBar.js','',true);
	wp_enqueue_script('validate',PM_PLUGINS_URL.'/Product-manager/Assets/js/jquery.validate.min.js','',true);
	
	wp_localize_script("script","pmajaxurl",admin_url("admin-ajax.php"));
 }
 add_action("init","product_manager_include_assets");
 
 //adding menu to dashboard
 function product_manager_custom_menu(){
	 
	add_menu_page(
		'productmanager',
		'Product Manager',
		'manage_options',
		'product-manager',
		'product_manager_func',
		'dashicons-editor-ul',
		66	
	);
	 add_submenu_page(
		'product-manager',
		'View Details',
		'View Details',
		'manage_options',
		'product-manager',
		'product_manager_func'
	); 
	add_submenu_page(
		'product-manager',
		'Add New',
		'Add new',
		'manage_options',
		'add-new',
		'add_new_submenu_func'
	);
	add_submenu_page(
		'product-manager',
		'Update Product',
		'Update Product',
		'manage_options',
		'update-product',
		'update_new_submenu_func'
	);
 }
 add_action('admin_menu','product_manager_custom_menu');
 
 function product_manager_func(){
	include_once PM_PLUGIN_DIR_PATH.'/views/view-all.php'; 
 }
 function add_new_submenu_func(){
	include_once PM_PLUGIN_DIR_PATH .'/views/add-new.php'; 
 }
 function update_new_submenu_func(){
	include_once PM_PLUGIN_DIR_PATH .'/views/update.php'; 
 }
 
 //adding table to database
 function pm_custom_table(){
	 
	 global $wpdb;
	 require_once(ABSPATH.'wp-admin/includes/upgrade.php');
	 
	 $sql= "CREATE TABLE " . table_name() . " (
		 `ID` int(11) NOT NULL,
		 `Name` varchar(30) NOT NULL,
		 `Category` varchar(15) NOT NULL,
		 `Price` int(11) NOT NULL,
		 `About` text NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";

		
	dbDelta	($sql);
 }
 register_activation_hook(__FILE__,'pm_custom_table');

//deactivation hook
 function pm_custom_deactive_table(){
	
	global $wpdb;
	$wpdb->query("DROP TABLE IF EXISTS" . table_name());
} 
register_deactivation_hook(__FILE__,'pm_custom_deactive_table');

add_action("wp_ajax_productmanagerlibrary","product_manager_save_data");

function product_manager_save_data(){
	global $wpdb;
	
	if($_REQUEST['param']=="save_data"){
		
			$wpdb-> insert(table_name(),array(
			"Name"=> $_REQUEST['name'],
			"Category"=> $_REQUEST['category'],
			"Price"=> $_REQUEST['price'],
			"About "=> $_REQUEST['about'] 
		 )); 
	 echo json_encode(array("status"=>1,"message"=>"data has been saved"));
	
	}elseif($_REQUEST['param']=="edit_data"){
		
		$wpdb-> update(table_name(),array(
			"Name"=> $_REQUEST['name'],
			"Category"=> $_REQUEST['category'],
			"Price"=> $_REQUEST['price'],
			"About "=> $_REQUEST['about'] 
		 ), array(
			"id" =>$_REQUEST['product_id']
		 ));
	echo json_encode(array("status"=>1,"message"=>"data has been saved"));		
	
	}elseif($_REQUEST['param']=="delete_data"){
		
		$wpdb->delete(table_name(),array(
			
			"id"=> $_REQUEST['id']
		));
	}
wp_die();	 
}
 ?>