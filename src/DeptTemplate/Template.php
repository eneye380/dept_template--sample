<?php

namespace DeptTemplate;

class Template
{
    protected $base_template;
    protected $page;
    protected $partials;

    /**
     * Constructor
     * 
     * @param string $base_template
     */
    public function __construct(
        $base_template
    ) {
        $this->base_template = is_null($base_template) || !file_exists($base_template) ? 'views/partials/_blank.phtml' : $base_template;
    }
    
    /**
     * render
     *
     * @param  mixed $page
     * @param  mixed $data
     * @return void
     */
    public function render($page, $data = array())
    {
        $this->page = is_null($page) || !file_exists($page) ? '../views/partials/_blank.phtml' : $page;
       
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
        
        include $this->base_template;
    }    

    public function include($partial, $data = array())
    {
        $partial = '../views/partials/' . $partial;
        $this->partial = is_null($partial) || !file_exists($partial) ? '../views/partials/_blank.phtml' : $partial;
        
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
        
        include $this->partial;
    } 

    /**
     * content
     *
     * @return void
     */
    public function content()
    {
        include $this->page;
    }
}
