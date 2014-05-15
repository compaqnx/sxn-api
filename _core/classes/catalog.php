<?php
class Catalog{
	
	private $db;
	
	//~ Database tables
	public static $tables = array(
		"atribute" => "atribute",
		"config" => "global_config",
		"manufacturer" => "manufacturer",
		"modules" => "modules",
		"products" => "products",
		"product_group" => "product_group",
		"users" => "users"
	);

	public function __construct($database) {
	    $this->db = $database;
	}
	
	public function catalog_check_existing($db_table, $custom_filter) {
		//~ $custom_filter[0] = filter(table column name))
		//~ $custom_filter[1] = filter(table column) value
		
		$query = $this->db->prepare("SELECT * FROM `$db_table` WHERE $custom_filter[0]=$custom_filter[1]");
		//$query->bindValue(1, $db_table);
				
		try{
			$query->execute();
			if ( $query->rowCount() != 0 )
				return true;
			else
				return false;
						
		}catch(PDOException $e){
			die($e->getMessage());
			return false;
		}
	}
	
	/* Add part */
	public function add_atribute ($id, $name, $desc) {
		
		$filter = array('atribute_name', $name);
		$table = self::$tables;
		
		$query = $this->db->prepare("INSERT into `$table[atribute]`(`id_user`, `atribute_name`, `atribute_desc`) VALUES (?, ?, ?)");
		$query->bindValue(1, $id);
		$query->bindValue(2, $name);
		$query->bindValue(3, $desc);
		
		//~ If atribute exists return
		if ( $this->catalog_check_existing('atribute', $filter) === true ) 
			return false;
		
		try{
			$query->execute();
			return true;
		}catch(PDOException $e){
			die($e->getMessage());
			return false;
		}
	}
	
	public function add_manufacturer ($id, $name) {
		$query = $this->db->prepare("INSERT into `manufacturer`(`id_user`, `manufacturer_name`) VALUES (?, ?)");
		$query->bindValue(1, $id);
		$query->bindValue(2, $name);
				
		try{
			$query->execute();
			return true;
		}catch(PDOException $e){
			die($e->getMessage());
			return false;
		}
	}
	
	public function add_product_group ($id, $name, $desc, $atr_id) {
		$query = $this->db->prepare("INSERT into `product_group`(`id_user`, `product_group_name`, `product_group_desc`, `id_atribute`) VALUES (?, ?, ?, ?)");
		$query->bindValue(1, $id);
		$query->bindValue(2, $name);
		$query->bindValue(3, $desc);
		$query->bindValue(4, $atr_id);
		
		try{
			$query->execute();
			return true;
		}catch(PDOException $e){
			die($e->getMessage());
			return false;
		}
	}
	
	public function add_products ($id, $pg_id, $name, $desc, $id_atr, $weight) {
		$date_added = date('d-m-Y');
		$query = $this->db->prepare("INSERT into `products`(`id_user`, `id_product_group`, `product_name`, `product_desc`, `id_atribute`, `weight`, `date_added`) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$query->bindValue(1, $id);
		$query->bindValue(2, $pg_id);
		$query->bindValue(3, $name);
		$query->bindValue(4, $desc);
		$query->bindValue(5, $id_atr);
		$query->bindValue(6, $weight);
		$query->bindValue(7, $date_added);
		
		try{
			$query->execute();
			return true;
		}catch(PDOException $e){
			die($e->getMessage());
			return false;
		}
	}
	
	/* Select part */	
	public function select_all_atributes($custom) {
		if ( isset($custom) )
			$query = $this->db->prepare("SELECT * FROM `atribute` WHERE id=$custom");
		else
			$query = $this->db->prepare("SELECT * FROM `atribute` WHERE 1");
				
		try{
			$query->execute();
			return $query->fetchAll();
						
		}catch(PDOException $e){
			die($e->getMessage());
			return false;
		}
	}
	
	public function select_all_product_groups($custom, $id_user) {
		if ( isset($custom) && $custom != NULL )
			$query = $this->db->prepare("SELECT * FROM `product_group` WHERE id=$custom");
		else if ( isset($id_user) && $id_user != NULL )
			$query = $this->db->prepare("SELECT * FROM `product_group` WHERE id_user=$id_user");
		else
			$query = $this->db->prepare("SELECT * FROM `product_group` WHERE 1");
				
		try{
			$query->execute();
			return $query->fetchAll();
						
		}catch(PDOException $e){
			die($e->getMessage());
			return false;
		}
	}
	
	public function catalog_select_products_generic($db_table, $custom_filter, $limit) {
		//~ $custom_filter[0] = filter(table column name))
		//~ $custom_filter[1] = filter(table column) value
		
		if ( isset($custom_filter) && $custom_filter != NULL ){		
			$query = $this->db->prepare("SELECT * FROM `$db_table` WHERE $custom_filter[0]=$custom_filter[1]");
			//~ $query->bindValue(1, $custom_filter[0]);
			//~ $query->bindValue(2, $custom_filter[1]);			
				
		} else {
			if ( isset($limit) && $limit != NULL )
				$query = $this->db->prepare("SELECT * FROM `$db_table` WHERE 1 ORDER BY date_added DESC LIMIT 0,$limit");
			else
				$query = $this->db->prepare("SELECT * FROM `$db_table` WHERE 1 ORDER BY date_added DESC");
		}
				
		try{
			$query->execute();
			return $query->fetchAll();
						
		}catch(PDOException $e){
			die($e->getMessage());
			return false;
		}
	}
	
	/* Select and return product details */	
	public function product_detail($id) {
		$table = self::$tables;
		
		if ( isset($id) && $id != NULL )
			$query = $this->db->prepare("SELECT * FROM `$table[products]` WHERE id=$id");
		else
			$query = $this->db->prepare("SELECT * FROM `$table[products]` WHERE 1");
				
		try{
			$query->execute();
			return $query->fetchAll();
						
		}catch(PDOException $e){
			die($e->getMessage());
			return false;
		}
	}
	
	
	
	/* Update part */
	
	/* Delete part */
	
}
?>
