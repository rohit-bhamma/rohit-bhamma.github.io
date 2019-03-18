<!-- Class for connection to MySQL -->
<?php
include "class.php";
class Connect{
	public $link;
        public $db_selected;
		public function connect_fn(){
			$this->link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

			if (!$this->link) {
				die('error connecting to database');
			}
		
	
			$this->db_selected = mysqli_select_db($this->link, DB_NAME);
			if(!$this->db_selected){
				die('cannot use ' . $this->db_selected . ':');
			}
		}
		public function disconnect(){
			mysqli_close($this->link);
		}	
	}	
?>