<?php namespace DeptTemplate\Model;

use DeptTemplate\File;

class News
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
    static public function getNews($file)
    {
        $file = isset($file) && !empty($file) ? ''.$file : 'news.json';
        $news = File::getContents($file);
        return is_array($news) ? $news : [];
    }

    static public function getSingleNews($file, $id)
    {
        $file = isset($file) && !empty($file) ? ''.$file : 'news.json';
        $news = File::getContents($file);
        return is_array($news) ? self::findObjectById($news, $id) : false;
    }

    static public function findObjectById($array, $id)
    {
        //$array = array( /* your array of objects */ );

        foreach ( $array as $element ) {
            if ($id == $element['id'] ) {
                return $element;
            }
        }

        return false;
    }

    // Comparator function used for comparator 
    // scores of two object/students 
    static public function comparator($object1, $object2)
    { 
        return $object1['date'] > $object2['date']; 

    } 

    static public function getNewsSorted()
    { 
        $array = self::getNews('news.json');
        // Sorting the class objects according  
        // to their scores 
        //usort($array, 'comparator'); 
        //PHP 7.4 & above
        //usort($array, fn($a, $b) => strtotime($a['date']) < strtotime($b['date']));
        
        //PHP 5.3 & above
        usort(
            $array, function ($a, $b) {
                return strtotime($a['date']) < strtotime($b['date']);
            }
        );
        return $array;
    } 

  

}
