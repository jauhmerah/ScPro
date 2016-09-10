<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class L_label
	{
		protected $ci;
	
		public function __construct()
		{
	        $this->obj =& get_instance();
	        $ci = $this->obj;
		}
	
		public function item_label($id=0)
		{
			switch ($id) {
				case 1:
					$text = "Blackurrant | <strong>Bad Blood</strong> | Red";
					break;
				case 2:
					$text = "Manggo | <strong>Fat Boy</strong> | Yellow";
					break;
				case 3:
					$text = "Honey Dew | <strong>Devil Teeth</strong> | Orange";
					break;
				case 4:
					$text = "Grape | <strong>Asap Grape</strong> | Purple";
					break;
				case 5:
					$text = "Blackurrant + L | <strong>Wicked Haze</strong> | Pink";
					break;
				case 6:
					$text = "Pineapple | <strong>Slow Blow</strong> | Cyan";
					break;				
				default:
					$text = "error";
					break;
			}
			return $text;
		}
	}
	
	/* End of file l_label.php */
	/* Location: ./application/libraries/l_label.php */
	
?>