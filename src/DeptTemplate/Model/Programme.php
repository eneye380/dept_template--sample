<?php namespace DeptTemplate\Model;

use DeptTemplate\File;

class Programme
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
    static public function getProgrammes($file)
    {
        $file = isset($file) && !empty($file) ? 'courses/'.$file : 'courses/empty.json';
        $programme = File::getContents($file);
        return is_array($programme) ? $programme : [];
    }
}
