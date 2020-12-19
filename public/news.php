<?php

//require 'src/DeptTemplate/Autoloader.php';
require '../vendor/autoload.php';

\DeptTemplate\Config::setDirectory('../config');
$siteDetails = \DeptTemplate\Config::get('site');
$siteDetails['vPage']='news';
$siteDetails['title']='News Around the Campus';

if (isset($_GET['id']) || !empty($_GET['id'])) {
    $news = \DeptTemplate\Model\News::getSingleNews('news.json', $_GET['id']);
   
    if ($news === false) {
        echo "Topic not found!";
        exit;
    } else {
        $siteDetails['singleNews']=$news;
        $siteDetails['title'] = $news['title'] . ' | News ';
        $news = \DeptTemplate\Model\News::getNewsSorted();
        $siteDetails['news']=$news;
        $template = new \DeptTemplate\Template("../views/base.phtml");
        $template->render("../views/pages/news-single.phtml", $siteDetails);
        exit;
    }
}
  

// Fetch data
$news = \DeptTemplate\Model\News::getNews('news.json');
$siteDetails['news']=$news;

$template = new \DeptTemplate\Template("../views/base.phtml");
$template->render("../views/pages/news.phtml", $siteDetails);
?>
