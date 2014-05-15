<?php 
class General{
	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}

	public function logged_in () {
		return(isset($_SESSION['id'])) ? true : false;
	}

	public function logged_in_protect() {
		if ($this->logged_in() === true) {
			header('Location: index');
			exit();
		}
	}
	 
	public function logged_out_protect() {
		if ($this->logged_in() === false) {
			header('Location: index');
			exit();
		}	
	}
	
	public function global_config_db($filter) {
		
		$query = $this->db->prepare("SELECT $filter FROM `global_config`");
						
		try{
			$query->execute();
			$res = $query->fetch();
			
			if ( $query->rowCount() != 0 )
				return $res[0];
			else
				return 0;
						
		}catch(PDOException $e){
			die($e->getMessage());
			return 0;
		}
	}
	
	public function redirect(){
	}
	
	public function file_newpath($path, $filename){
		if ($pos = strrpos($filename, '.')) {
		   $name = substr($filename, 0, $pos);
		   $ext = substr($filename, $pos);
		} else {
		   $name = $filename;
		}
		
		$newpath = $path.'/'.$filename;
		$newname = $filename;
		$counter = 0;
		
		while (file_exists($newpath)) {
		   $newname = $name .'_'. $counter . $ext;
		   $newpath = $path.'/'.$newname;
		   $counter++;
		}
		
		return $newpath;
	}
	
	function seoUrl($string) {
		//Lower case everything
		$string = strtolower($string);
		//Make alphanumeric (removes all other characters)
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		//Clean up multiple dashes or whitespaces
		$string = preg_replace("/[\s-]+/", " ", $string);
		//Convert whitespaces and underscore to dash
		$string = preg_replace("/[\s_]/", "-", $string);
		return $string;
	}
	
	// This function will take $_SERVER['REQUEST_URI'] and build a breadcrumb based on the user's current path
	function breadcrumbs($separator = ' &raquo; ', $home = 'Home') {
		// This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
		$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

		// This will build our "base URL" ... Also accounts for HTTPS :)
		$base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

		// Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
		$breadcrumbs = Array("<a href=\"$base\">$home</a>");

		// Find out the index for the last value in our path array
		$last = end(array_keys($path));

		// Build the rest of the breadcrumbs
		foreach ($path AS $x => $crumb) {
			// Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
			$title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));

			// If we are not on the last index, then display an <a> tag
			if ($x != $last)
				$breadcrumbs[] = "<a href=\"$base$crumb\">$title</a>";
			// Otherwise, just display the title (minus)
			else
				$breadcrumbs[] = $title;
		}

		// Build our temporary array (pieces of bread) into one big string :)
		return implode($separator, $breadcrumbs);
	}
}
