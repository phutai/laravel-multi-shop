<?php

class PagesController extends BaseController{
	
	public function about(){
		$shopinfo = CommonHelper::getInfo();
		$about = $shopinfo->shopinfo->store_body;
		return View::make('pages.about', compact('about'));
	}

	

	
}