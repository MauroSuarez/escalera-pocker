<?php

class Poker
{ 
	private function getConsecutive(array $array) : bool {
		if (is_array($array) && count($array)) {
	        $newArray = array();
	        $count = array();
			$posConsecutive = 0;
			
		    foreach($array as $pos => $num){
		        if($pos>0){
		            if(($newArray[($pos-1)]+1)==$num){
						$count[$pos-1] = true;
						$posConsecutive++;
		            }else{
						$count[$pos-1] = false;
						$posConsecutive--;
		            }   
		        }
		        $newArray[$pos] = $num;
		    }
			
			if($posConsecutive == 4) {
		    	return true;
		    }else {
				return false;
			}
		}else{
            return false;
        }
    }
	
    private function orderArray(array $array) : array
    {
    	// Ordeno el array de manera descendente
    	if (is_array($array) && count($array)) {
	    	$order = array();
	    	asort($array);
	        foreach($array as $value) {
	        	array_push($order, $value);
	        }
	        return $order;
    	}else{
            return [];
        }
    }
	
	public function isStraight(array $cards) : bool
	{
		if(is_array($cards) && count($cards)) {
			$sortCards = $this->orderArray($cards);
            // Revisa que sea escalera
            $response = $this->getConsecutive($sortCards);
            if (!$response) {

            	// Revisamos que el último número sea 14 para acutalizarlo a 1 y volver a probar si hay números consecutivos
            	$count = count($sortCards);
            	if ($sortCards[$count-1] == 14) {
            		$sortCards[$count-1] = 1;
            		$order = $this->orderArray($sortCards);
            		$response = $this->getConsecutive($order);
            		
					return $response;
            	} else {
            		return false;
            	}
            }else {
				return $response;
			}
			return false;
        } else{
            return false;
        }
	}
}
// CASOS DE PRUEBA
$results = new Poker();

//La funcion valida los casos de prueba siguientes
print $results->isStraight([2, 3, 4 ,5, 6]);
print $results->isStraight([14, 5, 4 ,2, 3]);
print $results->isStraight([7, 7, 12 ,11, 3, 4, 14]);
print $results->isStraight([7, 3, 2]);
print $results->isStraight([12, 9, 11, 10, 3, 14, 13]);
