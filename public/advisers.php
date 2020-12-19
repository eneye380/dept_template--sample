<?php

//require 'src/DeptTemplate/Autoloader.php';
require '../vendor/autoload.php';

\DeptTemplate\Config::setDirectory('../config');
$siteDetails = \DeptTemplate\Config::get('site');
$siteDetails['vPage']='about';
$siteDetails['title']='Coordinatiors and Advisers';

// Fetch data
$advisers = \DeptTemplate\Model\Site::getData('advisers.json');
$siteDetails['advisers']=$advisers;

$template = new \DeptTemplate\Template("../views/base.phtml");
$template->render("../views/pages/advisers.phtml", $siteDetails);
?>
