<?php

namespace Babel\NotFound\Components;

use Babel\NotFound\Models\Page404Settings;
use System\Classes\BaseComponent;

class NotFoundPage extends BaseComponent
{
    public function defineProperties()
    {
        return [];
    }

    public function onRun() 
    {       

        $this->addCss('css/notfound.css', 'notfound-css');

        $this->registerVars();
    }

    public function registerVars(){
        
        $this->page['title'] = Page404Settings::get('title');  
        $this->page['content_text'] = Page404Settings::get('content_text'); 
        $this->page['button_text'] = Page404Settings::get('button_text'); 
        $this->page['button_color'] = Page404Settings::get('button_color'); 
        $this->page['button_text_color'] = Page404Settings::get('button_text_color'); 
        $this->page['error_image'] = Page404Settings::get('error_image'); 
        $this->page['button_url'] = Page404Settings::get('button_url');      
        
    }
    
}