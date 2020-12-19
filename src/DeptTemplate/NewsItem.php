<?php
namespace DeptTemplate;


class NewsItem
{
    private $id;
    private $url;
    private $title;
    private $body;
    private $teaser;
    private $date;
    private $category;
    private $isNews = false;
    private $isBulletin = false;
    private $isMagazine = false;
    private $imageLink = null;
    private $magazineLink = null;
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function setUrl($url)
    {
        $this->url = $url;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    public function setBody($body)
    {
        $this->body = $body;
    }
    
    public function setDate($date)
    {
        $this->date = $date;
    }
    
    public function setCategory($category)
    {
        $this->category = $category;
        if($category == 'News') {
            $this->isNews = true;
        }
        if($category == 'Special Bulletin') {
            $this->isBulletin = true;
        }
        if($category == 'Magazine') {
            $this->isMagazine = true;
        }
    }
    
    public function setMagazineLink($link)
    {
        $this->magazineLink = $link;
    }
    
    public function setImageLink($link)
    {
        $this->imageLink = $link;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getUrl()
    {
        return $this->url;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function getBody()
    {
        return $this->body;
    }
    
    public function getCategory()
    {
        return $this->category;
    }
    
    public function getMagazineLink()
    {
        return $this->magazineLink;
    }
    
    public function getImageLink()
    {
        return $this->imageLink;
    }
    
    public function getDate()
    {
        return $this->date;
    }
    
    public function isANews()
    {
        return $this->isNews;
    }
    
    public function isABulletin()
    {
        return $this->isBulletin;
    }
    
    public function isAMagazine()
    {
        return $this->isMagazine;
    }
    
}
