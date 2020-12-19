<?php
require '../vendor/autoload.php';

use \DeptTemplate\NewsHandler;

\DeptTemplate\Config::setDirectory('../config');
$siteDetails = \DeptTemplate\Config::get('site');
$config = \DeptTemplate\Config::get('config');
$siteDetails['vPage']='news';
$siteDetails['title']='News Around the Campus';
$siteDetails['config'] = $config;

$newsHandler = new NewsHandler();

//$allNews = $newsHandler->getAllNews();
//$bulletins = $newsHandler->getBulletins();
$news = $newsHandler->getNews();
//$magazines = $newsHandler->getMagazines();

$siteDetails['news']=$news;

$template = new \DeptTemplate\Template("../views/base.phtml");
$template->render("../views/pages/news-others.phtml", $siteDetails);

?>
