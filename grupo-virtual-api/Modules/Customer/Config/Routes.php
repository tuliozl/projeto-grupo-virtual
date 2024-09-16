<?php

$routes->group("customer", ["namespace" => "\Modules\Customer\Controllers",'filter' => 'cors:default'], function ($routes) {

	$routes->get("/", "CustomerController::index");
	$routes->get("delete/(:any)", "CustomerController::delete/$1");
  
	$routes->post("/", "CustomerController::create");
	$routes->post("update", "CustomerController::update");

});
