<?php namespace DeptTemplate;

class File
{

    static protected $directory = __DIR__ . '/../../data/';

    /**
     * Get connection 
     *
     * @return void
     */
    static public function getContents($file)
    {

        $file_path = static::$directory . $file;
        
        //var_dump($file_path);die;

        if (file_exists($file_path)) {
            $contentsJson = file_get_contents($file_path);
            $contents = json_decode($contentsJson, true);
            
            return $contents;
        }
        return false;
    }
}
