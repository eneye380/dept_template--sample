<?php

//require 'src/DeptTemplate/Autoloader.php';
require '../vendor/autoload.php';

\DeptTemplate\Config::setDirectory('../config');
$siteDetails = \DeptTemplate\Config::get('site');
$siteDetails['vPage']='programmes';
$siteDetails['title']='Undergraduate Courses';

$courses = \DeptTemplate\Model\Site::getData('ugcourses.json');
$siteDetails['courses']=$courses;

$template = new \DeptTemplate\Template("../views/base.phtml");
// Use for auto generation of courses
$template->render("../views/pages/undergraduate--auto-accordion.phtml", $siteDetails);
// Use for fully static or semi-auto generation of courses
//$template->render("views/pages/undergraduate.phtml", $siteDetails);
?>
