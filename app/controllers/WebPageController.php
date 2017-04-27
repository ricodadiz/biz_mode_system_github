<?php

class WebPageController extends BaseController {

	public function index()
	{
		return View::make('app.web_index');
	}

	public function features(){
         $data_to_pass = array(
            'title' => 'Features - Beezmode'
        );
        return View::make ('app.features',$data_to_pass);
    }

	public function pricing(){
        $data_to_pass = array(
            'title' => 'Pricing - Beezmode'
        );
        return View::make ('app.pricing',$data_to_pass);
    }

    public function contact(){
        $data_to_pass = array(
            'title' => 'Contact - Beezmode'
        );
        return View::make ('app.contact',$data_to_pass);
    }

}
