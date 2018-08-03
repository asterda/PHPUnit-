<?php

namespace AppBundle\Entity;

class Product{

	const FOOD_PRODUCT = "food";
	private $name;
	private $type;
	private $price;

	public function __construct($name, $type, $price){
		$this -> name = $name; 
		$this -> type = $type; 
		$this -> price = $price; 				
	}

	public function computeTVA(){
		if($this->price < 0){
			throw new \LogicException('La TVA ne peut pas etre negatif !!');
		}

		if(self::FOOD_PRODUCT == $this->type){
			return $this -> price * 0.055;
		}

		return $this -> price * 0.0196;
	
	}
}

?>