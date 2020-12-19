<?php

//require 'src/DeptTemplate/Autoloader.php';
require '../vendor/autoload.php';

\DeptTemplate\Config::setDirectory('../config');
$siteDetails = \DeptTemplate\Config::get('site');
$siteDetails['vPage']='about';
$siteDetails['title']='About Us';

$template = new \DeptTemplate\Template("../views/base.phtml");
$template->render("../views/pages/about-us.phtml", $siteDetails);
?>
