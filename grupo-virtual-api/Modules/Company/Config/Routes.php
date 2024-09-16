<?php

$routes->group("company", ["namespace" => "\Modules\Company\Controllers",'filter' => 'cors:default'], function ($routes) {

	$routes->get("/", "CompanyController::index");
	$routes->get("export", "CompanyController::exportData");
	$routes->get("check-cnpj/(:any)", "CompanyController::checkCnpj/$1");
	$routes->get("delete/(:any)", "CompanyController::delete/$1");
  
	$routes->post("/", "CompanyController::create");
	$routes->post("update", "CompanyController::update");

});
