<?php

//require 'src/DeptTemplate/Autoloader.php';
require '../vendor/autoload.php';

\DeptTemplate\Config::setDirectory('../config');
$siteDetails = \DeptTemplate\Config::get('site');
$siteDetails['vPage']='contact';
$siteDetails['title']='Contact';

$template = new \DeptTemplate\Template("../views/base.phtml");
$template->render("../views/pages/contact.phtml", $siteDetails);
?>
