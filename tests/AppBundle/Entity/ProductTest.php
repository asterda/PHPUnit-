<?php

namespace Tests\AppBundle\Entity;

use PHPUnit\Framework\TestCase;
use AppBundle\Entity\Product;

class ProductTest extends TestCase{

	public function testcomputeTVAFood(){
		$product_1 = new Product('banana', Product::FOOD_PRODUCT, 20);
		$this -> assertSame(1.1, $product_1->computeTVA());
	}

	public function testcomputeTVANoFood(){
		$product_2 = new Product('500-Abarth', 'car', 20);
		$this -> assertSame(0.392, $product_2->computeTVA());
	}

	public function testcomputeTVANegatif(){
		$product_3 = new Product('Mixer', 'Electromanager', -6);
		$this -> expectException('LogicException');
		$product_3 -> computeTVA();
	}

}

