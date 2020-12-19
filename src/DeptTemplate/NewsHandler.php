<?php
namespace DeptTemplate;

use DeptTemplate\NewsRepository;
use DeptTemplate\NewsItem;

class NewsHandler
{

    private $rawNewsData = [];
    private $processedNewsData = [];
    private $newsOnly = [];
    private $magazineOnly = [];
    private $bulletinOnly = [];

    public function __construct()
    {
        $this->rawNewsData = NewsRepository::getNews();
        $this->processNews();
    }

    static public function news()
    {
        return NewsRepository::getNews();
    }

    public function getAllNews()
    {
        return $this->processedNewsData;
    }
    
    public function getNews()
    {
        return $this->newsOnly;
    }
    
    public function getBulletins()
    {
        return $this->bulletinOnly;
    }
    
    public function getMagazines()
    {
        return $this->magazineOnly;
    }

    private function processNews()
    {
        if (!is_null($this->rawNewsData) && !empty($this->rawNewsData)) {
            $newsInclude = $this->rawNewsData['included'];
            $allNewsData = $this->rawNewsData['data'];
            //var_dump($allNewsData[0]['links']);die;
            foreach ( $allNewsData as $singleNews ) {
                $newsItem = new NewsItem();
                $newsItem->setId($this->getId($singleNews));
                $newsItem->setUrl($this->getUrl($singleNews));
                $newsItem->setTitle($this->getTitle($singleNews));
                $newsItem->setBody($this->getBody($singleNews));
                $newsItem->setDate($this->getDate($singleNews));
                $newsItem->setImageLink($this->getImageUrl($newsInclude, $singleNews));
                $newsItem->setCategory($this->getCategory($newsInclude, $singleNews));
                $newsItem->setMagazineLink($this->getMagazineUrl($newsInclude, $singleNews));
                $this->processedNewsData[] = $newsItem;
                if ($newsItem->isANews() ) {
                    $this->newsOnly[] = $newsItem;
                }
                if ($newsItem->isABulletin() ) {
                    $this->bulletinOnly[] = $newsItem;
                }
                if ($newsItem->isAMagazine() ) {
                    $this->magazineOnly[] = $newsItem;
                }
            }

            //var_dump( $this->processedNewsData );
            //die;
        }
    }

    private function getId($singleNews)
    {
        return $singleNews['id'];
    }
    
    private function getUrl($singleNews)
    {
        //return $singleNews['links']['self']['href'];
        return $singleNews['attributes']['path']['alias'];
    }
    
    private function getTitle( $singleNews )
    {
        return $singleNews['attributes']['title'];
    }

    private function getBody( $singleNews )
    {
        return isset($singleNews['attributes']['field_mt_pst_body']['processed']) ? $singleNews['attributes']['field_mt_pst_body']['processed'] : '' ;
    }

    private function getDate( $singleNews )
    {
        return $singleNews['attributes']['created'];
    }

    private function getImageUrl( $nInclude, $singleNews )
    {
        if (is_null($singleNews['relationships']['field_mt_pst_image']['data']) ) {
            return '' ;
        }
        $pst_imgs = $singleNews['relationships']['field_mt_pst_image']['data'];
        foreach ( $nInclude as $include ) {
            foreach ( $pst_imgs as $pst_img ) {
                if ($include['id'] == $pst_img['id'] ) {
                    if (isset($include['attributes']['uri']['url']) ) {
                        return $include['attributes']['uri']['url'];
                    }
                    return '';
                }
            }
        }
    }

    private function getCategory( $nInclude, $singleNews )
    {
        if (is_null($singleNews['relationships']['field_mt_pst_category']['data']) ) {
            return '' ;
        }
        $pst_cat = $singleNews['relationships']['field_mt_pst_category']['data'];
        foreach ( $nInclude as $include ) {

            if ($include['id'] == $pst_cat['id'] ) {
                if (isset($include['attributes']['name']) ) {
                    return $include['attributes']['name'];
                }
                return '';
            }

        }
    }

    private function getMagazineUrl( $nInclude, $singleNews )
    {
        if (is_null($singleNews['relationships']['field_magazine_file']['data']) ) {
            return '' ;
        }
        $pst_mag = $singleNews['relationships']['field_magazine_file']['data'];
        foreach ( $nInclude as $include ) {
            if ($include['id'] == $pst_mag['id'] ) {
                if (isset($include['attributes']['uri']['url']) ) {
                    return $include['attributes']['uri']['url'];
                }
                return '';
            }
        }
    }

}
