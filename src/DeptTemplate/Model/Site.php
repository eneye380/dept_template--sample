<?php namespace DeptTemplate\Model;

use DeptTemplate\File;

class Site
{
    /**
     * @var Topics $data
     */
    protected $data;
    
    /**
     * getNews
     *
     * @return void
     */
    static public function getData($file)
    {
        $file = isset($file) && !empty($file) ? 'courses/'.$file : 'courses/empty.json';
        $news = File::getContents($file);
        return is_array($news) ? $news : [];
    }
}
