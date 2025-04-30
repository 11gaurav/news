<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyHookClass {
    public function my_pre_system_function() {
        $CI =& get_instance();
        $CI->load->helper('url');

        // Code to be executed before the system executes
        log_message('info', 'Request made to: ' . current_url());
    if(current_url()=="http://localhost/work/news/new_news/news/message"){
            show_error("error occured",408,'An Error Was Encounterew');
    }

        // p(base_url()."application/controllers/new_news/News.php");
        // if (is_really_writable(base_url()."application/controllers/new_news/News.php"))
        // {
        //         echo "I could write to this if I wanted to";
        // }
        // else
        // {
        //         echo "File is not writable";
        // }
    }
}
