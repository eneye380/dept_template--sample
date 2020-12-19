<?php
namespace DeptTemplate;


class NewsRepository
{
    static protected $instance = null;
    protected $jsonApi = null;
    protected $news = [];

    protected function __construct()
    {

        if (false ) {
            $this->usingFileGetContents();
        } else {
            $this->usingGuzzle();
        }

    }

    protected function usingFileGetContents()
    {
        $config = include './config/config.php';

        $opts = [
            'http' => [
                'method' => 'GET',
                'header' => $config['header']
            ]
        ];

        $api = $config['baseUrl'] . '/' . $config['endpoint'] . '/' . $config['resource'] . '?' . $config['param'];

        $context = stream_context_create($opts);

        // Open the file using the HTTP headers set above
        // $data = file_get_contents( $config['apiURL'], false, $context );
        $data = file_get_contents($api, false, $context);

        $news = json_decode($data, true);
        $this->news = $news;
        //$news[] = $cat_facts;
    }

    protected function usingGuzzle()
    {
        $config = include __DIR__ . '/../../config/config.php';

        //        require 'vendor/autoload.php';

        $client = new \GuzzleHttp\Client(
            [
            //'base_uri' => 'http://localhost/morethanthemes/news/',
            //'base_uri' => 'http://localhost/abupress/',
            'base_uri' => 'http://publicaffairs.abu.edu.ng/',
            'headers' => [
                'Accept'     => 'application/vnd.api+json',
            ]
             ] 
        );
        //var_dump( $client );

        try {
            $response = $client->get(
                'jsonapi/node/mt_post', [
                'query' => [
                    'page[limit]'=>10,
                    'sort'=>'-nid',
                    'include'=>'field_mt_pst_image,field_mt_pst_category,field_magazine_file'
                ]
                 ] 
            );
            //        var_dump( $response );
            
    
            $news = json_decode($response->getBody(), true);
            //var_dump( $news );
            
            $this->news = $news;
        } catch (\Exception $ex) {
            $this->news = [];
        }
        
       
    }

    /**
     * @return
     */

    public function fetchNews()
    {
        return $this->news;
    }

    /**
     *
     */
    static public function getNews()
    {
        if (!( static::$instance instanceof static ) ) {
            static::$instance = new static();
        }

        return static::$instance->fetchNews();
    }

}
