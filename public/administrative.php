<?php

//require 'src/DeptTemplate/Autoloader.php';
require '../vendor/autoload.php';

\DeptTemplate\Config::setDirectory('../config');
$siteDetails = \DeptTemplate\Config::get('site');
$siteDetails['vPage']='people';
$siteDetails['title']='Administrative Staff';

//Response to a GET request for a single administrative staff
if (isset($_GET['id']) || !empty($_GET['id'])) {
    $person = \DeptTemplate\Model\People::getSingleStaff('administrative.json', $_GET['id']);
   
    if ($person === false) {
        echo "Topic not found!";
        exit;
    } else {
        $siteDetails['person']=$person;
        $siteDetails['title'] = $person['name'] . ' | '.$siteDetails['title'];
        $template = new \DeptTemplate\Template("../views/base.phtml");
        $template->render("../views/pages/staff-single.phtml", $siteDetails);
        exit;
    }
}

// Fetch data
$people = \DeptTemplate\Model\People::getPeople('administrative.json');
$siteDetails['people']=$people;

$template = new \DeptTemplate\Template("../views/base.phtml");
$template->render("../views/pages/people.phtml", $siteDetails);
?>
