<?php
class Client{
	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}
	
	
	/* Select part */	

	public function client_select_generic($db_table, $custom_filter) {
		//~ $custom_filter[0] = filter table column name))
		//~ $custom_filter[1] = filter table column value
		
		if ( isset($custom_filter) ){		
			$query = $this->db->prepare("SELECT * FROM `$db_table` WHERE $custom_filter[0]=$custom_filter[1] ORDER BY id DESC");
			//~ $query->bindValue(1, $custom_filter[0]);
			//~ $query->bindValue(2, $custom_filter[1]);			
				
		} else {
			$query = $this->db->prepare("SELECT * FROM `$db_table` WHERE 1 ORDER BY id DESC");
		}
				
		try{
			$query->execute();
			return $query->fetchAll();
						
		}catch(PDOException $e){
			die($e->getMessage());
			return false;
		}
	}
	
	//~  example: select user based on ID
	//~ This method accepts 2 mandatory parametres: database table and search criteria
	//~ Tis method search details in database based on tables ID
	public function client_show_details($db_table, $criteria) {
	
		$query = $this->db->prepare("SELECT * FROM `$db_table` WHERE id=?");
			$query->bindValue(1, $criteria);
									
		try{
			$query->execute();
			return $query->fetch();
						
		}catch(PDOException $e){
			die($e->getMessage());
			return false;
		}
	}
	
	/* Update part */
	
	/* Delete part */
	
}
?>
