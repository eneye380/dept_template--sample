<?php

//require 'src/DeptTemplate/Autoloader.php';
require '../vendor/autoload.php';

\DeptTemplate\Config::setDirectory('../config');
$siteDetails = \DeptTemplate\Config::get('site');
$siteDetails['vPage']='org';
$siteDetails['title']='Secretaries';

// Fetch data
$people = \DeptTemplate\Model\People::getPeople('secretaries.json');
$siteDetails['people']=$people;

$template = new \DeptTemplate\Template("../views/base.phtml");
$template->render("../views/pages/secretaries.phtml", $siteDetails);
?>
