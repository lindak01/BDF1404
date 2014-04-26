<?php

class view{
    
    public function __construct(){
        
    }
    
    public function show($template, $data = array()) {
        $templatePath = "views/${template}";
        if (file_exists($templatePath)) {
            include $templatePath;
        }
    }
}
?>