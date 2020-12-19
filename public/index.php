<?php

//require 'src/DeptTemplate/Autoloader.php';
require __DIR__ . '/../vendor/autoload.php';

use \DeptTemplate\NewsHandler;

\DeptTemplate\Config::setDirectory(__DIR__ . '/../config');
$siteDetails = \DeptTemplate\Config::get('site');
$siteDetails['vPage']='index';

//$news = \DeptTemplate\Model\News::getNews('news.json');
///$siteDetails['news']=$news;

$config = \DeptTemplate\Config::get('config');
$siteDetails['config'] = $config;

$newsHandler = new NewsHandler();

//$allNews = $newsHandler->getAllNews();
//$bulletins = $newsHandler->getBulletins();
$news = $newsHandler->getNews();
//$magazines = $newsHandler->getMagazines();

$siteDetails['news']=$news;

$template = new \DeptTemplate\Template(__DIR__ . "/../views/base.phtml");
$template->render(__DIR__ . "/../views/pages/home/home.phtml", $siteDetails);
?>
