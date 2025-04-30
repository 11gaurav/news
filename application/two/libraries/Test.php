<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test {

       private $type;
       private $color;

        public function __construct()
        {
                

        }

        public function check($params)
        {
                $this->type = $params['type'];
                $this->color = $params['color'];
			
        return "My car is <b>".$this->type."</b> and color is <b>".$this->color."</b>. This is from test library!";
        }
}