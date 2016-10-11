<?php
	function rands(){
		$ran=rand(1,1000);
		if($ran<=600){
			
			$result = 245;
			
		}elseif($ran>600&&$ran<=750){
			$result = 200;
		}elseif ($ran>750&&$ran<=850) {
			$n = rand(1,2);
			switch ($n) {
				case 1:
					$result =155;
					break;
				case 2:
					$result = 335;
					break;
			}
		}elseif ($ran>850&&$ran<=900) {
			$result = 20;
		}elseif ($ran>900&&$ran<=950) {
			$result = 65;
		}elseif ($ran>950&&$ran<=998) {
			$result = 110;
		}elseif ($ran>998&&$ran<=1000) {
			$result = 290;
		}
		echo $result;
	}
	rands();
	?>