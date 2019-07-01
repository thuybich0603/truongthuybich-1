<?php

namespace App;
use Illuminate\Support\Facades\DB;
class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id){
		$giohang = ['qty'=>0, 'price' => $item->unit_price, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		$giohang['qty']++;
		$giohang['price'] = $item->unit_price;
		$this->items[$id] = $giohang;
		$this->totalQty++;
		if($item->new == 1)
		{
			$this->totalPrice += $item->unit_price;
		}
		else
		{
			$this->totalPrice += $item->unit_price - 0.1* $item->unit_price;
		}
		// $this->totalPrice = $this->totalPrice;

	}
	public function changeNumber($item, $id, $number){
		$giohang = ['qty'=>0, 'price' => $item->unit_price, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		
		if($number > $giohang['qty'])
		{
			$chenhlech = $number - $giohang['qty'];
			$this->totalQty+=$chenhlech;
			if($item->new == 1)
			{
				$this->totalPrice += $chenhlech*$item->unit_price;
			}
			else
			{
				$this->totalPrice += $item->unit_price* $chenhlech - 0.1* $item->unit_price* $chenhlech;
			}
		}
		else
		{
			$chenhlech =$giohang['qty']- $number;
			$this->totalQty-=$chenhlech;
			if($item->new == 1)
			{
				$this->totalPrice -= $item->unit_price*$chenhlech;
			}
			else
			{
				$this->totalPrice -= ($item->unit_price*$chenhlech - 0.1* $item->unit_price*$chenhlech);
			}
		}

		$giohang['qty']=$number;
		//if
		$giohang['price'] = $item->unit_price;


		//endif
		$this->items[$id] = $giohang;
		
		// $this->totalPrice = $this->totalPrice;

	}
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$product = Product::find($id);
		if($product->new==1)
		{
			$this->totalPrice -= $this->items[$id]['price']*$this->items[$id]['qty'];
		}
		else
		{
			$this->totalPrice -= ($this->items[$id]['price']*$this->items[$id]['qty'] - 0.1*$this->items[$id]['price']*$this->items[$id]['qty']);
		}
		unset($this->items[$id]);
	}
}
