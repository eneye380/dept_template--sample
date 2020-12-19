<?php
return [
    "host"=>"http://publicaffairs.abu.edu.ng/",
    "host1"=>"http://localhost/abupress",
    "baseUrl"=>"http://localhost/morethanthemes/news",
    "baseURI"=>"http://localhost/morethanthemes/news/jsonapi/node",
    "endpoint"=>"jsonapi/node",
    "resource"=>"mt_post",
    "param"=>"page[limit]=10&sort=-nid&include=field_mt_pst_image,field_mt_pst_category,field_magazine_file",
    "apiURL" => "http://localhost/morethanthemes/news/jsonapi/node/mt_post?page[limit]=10&sort=-nid&include=field_mt_pst_image",
    "apiURL1" => 'https://cat-fact.herokuapp.com/facts/random?amount=2',
    "apiURL2" => "http://localhost/morethanthemes/news/jsonapi/node/mt_post/46091a1e-7e77-459c-b2b5-0e2c79b727ae?include=field_mt_pst_image",
    "header" => 'Accept: application/vnd.api+json',
    "title" => "ABU NEWS CLIENT"
];
?>