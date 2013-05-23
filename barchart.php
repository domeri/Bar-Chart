<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//---------------------------------------------------------------
// Barchart Chart Generator LIBRARY
// by Denis Omeri (http://denis.erlotto.com/)
//
// version: 1.1 
//---------------------------------------------------------------

/**
 * This is a simple class that generates Bar Chart-s
 * from an array added as input parameter 
 *
 *  
 * 
 */
class barchart {

	private $data;
	private $width;
	private $height;
	
	private $imagepath;

	/**
	 * 
	 * Construct 
	 * 
	 * Defining Images foler path [Needed to take background image of chart] 
	 * 
	*/
	public function __construct($images_path = ''){
		$this->imagepath = $images_path;
	}
	
	
	/**
	 * Function that returns the generated chart
	 * 
	 * @param array data [An array with the data to be displyed in chart]
	 * @param int width in pixel
	 * @param int height in pixel
	 * 
	 * @return string which contains chart html.
	 * 
	 */
	public function generate_chart($data, $width, $height){
		
		$this->data 	= $data;
		$html			= "";
		
		if (count($this->data)>0):
		
			$this->width	= $width;
			$this->height	= $height;
			
			$one_bar_full_w	= $this->width / count($this->data);
			$margin_w		= 0.2 * $one_bar_full_w;
			$bar_w			= 0.6 * $one_bar_full_w;
			
			$margin_h		= 0 * $this->height;
			$bar_h			= 1 * $this->height;
			
			$bars = '';
			
			foreach($this->data as $key => $value){
			
				$thisbh = ($value * $bar_h)/max($this->data);
			
				$bars = $bars.'<div style="width:'.$bar_w.'px; height:'.$thisbh.'px; float:left; margin:'.($margin_h+$bar_h-$thisbh).'px '.$margin_w.'px; margin-bottom: 0px; text-align:center; overflow: hidden; ">
				
				<span style="font-size:10px; height:10px; display:block; margin:3px 0; line-height: 10px;">'.$value.'</span>
				<div style="-moz-box-shadow: 0 0 5px #888;
	-webkit-box-shadow: 0 0 5px #888;
	box-shadow: 0 0 5px #888; border: 1px solid #f1eaea; background-color: #0066ff; width:100%; height:'.($thisbh-42).';"></div>
				<span style="font-size:10px; height:10px; display:block; margin:3px 0; line-height: 10px;">'.$key.'</span>
				
				</div>';
			}
			
			$html = '<div style="background-image:url('.$this->imagepath.'/chart_bg.png); border: 1px solid #ccc; width:'.$this->width.'px; height:'.$this->height.'px; ">'.$bars.'</div>';
			//
		
		endif;
		
		return $html;
	}
	
}

?>