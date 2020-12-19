<?php

//require 'src/DeptTemplate/Autoloader.php';
require '../vendor/autoload.php';

\DeptTemplate\Config::setDirectory('../config');
$siteDetails = \DeptTemplate\Config::get('site');
$siteDetails['vPage']='programmes';
$siteDetails['title']='Our Programmes';

// Fetch data
$programmes = \DeptTemplate\Model\Programme::getProgrammes('programmes.json');
$siteDetails['programmes']=$programmes;

$template = new \DeptTemplate\Template("../views/base.phtml");
$template->render("../views/pages/programmes.phtml", $siteDetails);
?>
