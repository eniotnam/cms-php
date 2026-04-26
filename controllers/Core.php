<?php

Class CoreController {
    private $_ViewPath = 'views/';
    private $_ViewPat = 'models/';

    private $_Variable = array();


    public function call($variable, $var){
        $this->_Variable[$variable] = $var;
    }

    public function home(){
        extract($this->_Variable);
        require $this->_ViewPath . 'header.php';
        require $this->_ViewPath . 'home.php';
        require $this->_ViewPath . 'footer.php';

    }
    
    public function CGU(){
        extract($this->_Variable);
        require $this->_ViewPath . 'header.php';
        require $this->_ViewPath . 'CGU.php';
        require $this->_ViewPath . 'footer.php';

    }
     
    public function articlebycat(){
        extract($this->_Variable);
     
        require $this->_ViewPath . 'header.php';
        require $this->_ViewPath . 'articlebycat.php';
        require $this->_ViewPath . 'footer.php';
    }
    
    public function contact(){
         extract($this->_Variable);
    
        require $this->_ViewPath . 'header.php';
        require $this->_ViewPath . 'contact.php';
        require $this->_ViewPath . 'footer.php';  
    }
    public function allcat(){
         extract($this->_Variable);
      
        require $this->_ViewPath . 'header.php';
        require $this->_ViewPath . 'allcat.php';
        require $this->_ViewPath . 'footer.php';  
    } 
    public function allarticle(){
         extract($this->_Variable);
      
        require $this->_ViewPath . 'header.php';
        require $this->_ViewPath . 'allarticle.php';
        require $this->_ViewPath . 'footer.php';  
    } 
    public function article(){
         extract($this->_Variable);
      
        require $this->_ViewPath . 'header.php';
        require $this->_ViewPath . 'article.php';
        require $this->_ViewPath . 'footer.php';  
    }
   
    
    public function apropos(){
         extract($this->_Variable);
        require $this->_ViewPath . 'header.php';
        require $this->_ViewPath . 'apropos.php';
        require $this->_ViewPath . 'footer.php';  
    }
    public function test(){
         extract($this->_Variable);
        require $this->_ViewPath . 'header.php';
        require $this->_ViewPath . 'test.php';
        require $this->_ViewPath . 'footer.php';  
    }
}