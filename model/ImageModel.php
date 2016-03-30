<?
	class Image{

		function Image($image,$width=false,$height=false,$border=0){
			$this->img = '<img src="' . $image . '" 
						width="' . $width . '" 
						height="' . $height . '"
						border="' . $border . '" />';
			echo $this->img;
		}

	}
?>