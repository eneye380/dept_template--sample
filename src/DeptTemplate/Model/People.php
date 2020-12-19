<?php namespace DeptTemplate\Model;

use DeptTemplate\File;

class People
{
    /**
     * @var Topics $data
     */
    protected $data;
    
    /**
     * getTeachingStaff
     *
     * @return void
     */
    static public function getPeople($file)
    {
        $file = isset($file) && !empty($file) ? 'people/'.$file : 'people/staff.json';
        $people = File::getContents($file);
        return is_array($people) ? $people : [];
    }

    static public function getSingleStaff($file, $id)
    {
        $file = isset($file) && !empty($file) ? 'people/'.$file : 'people/staff.json';
        $people = File::getContents($file);
        return is_array($people) ? self::findObjectById($people, $id) : false;
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

    static public function getStaffSorted($file)
    { 
        $array = self::getPeople($file);
        // Sorting the class objects according  
        // to their scores 
        //usort($array, 'comparator'); 
        usort($array, fn($a, $b) => strtotime($a['id']) < strtotime($b['id']));
        return $array;
    } 
}
