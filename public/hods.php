<?php

//require 'src/DeptTemplate/Autoloader.php';
require '../vendor/autoload.php';

\DeptTemplate\Config::setDirectory('../config');
$siteDetails = \DeptTemplate\Config::get('site');
$siteDetails['vPage']='org';
$siteDetails['title']='Heads of Department';

// Fetching data
$people = \DeptTemplate\Model\People::getPeople('heads_of_department.json');
$siteDetails['people']=$people;

$template = new \DeptTemplate\Template("../views/base.phtml");
$template->render("../views/pages/hods.phtml", $siteDetails);
?>
