<?php


class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model','',TRUE);
                // $this->load->helper('url_helper');
                $this->load->helper('form');
                $this->load->helper(array('form', 'url','url_helper'));
                // $this->load->library('cart');
        }

        public function index()
{
    $this->config->load('configs');
    $this->config->set_item('checks', 'i');
    $h= $this->config->item('checks');
    echo $h;

    $email = "gajendrabang@gmail.com, gajendrabang@yahoo.com, richard.simpson@reliablesoftjm.com, zanzi101@aol.com";
   $html = '
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Welcome</title>
</head>
<body style="font-family: Arial, sans-serif;">
  <h1>Welcome to <span style="color:red;">VIPER</span> from Gaurav</h1>
  <p>This is a test email with HTML content.</p>
  
  <img 
  src="https://www.mbusa.com/content/dam/mb-nafta/us/myco/my25/eqs-class/eqs-sedan/all-vehicles/2025-EQS450-SEDAN-AVP-DR.png" 
  alt="Cool Car"
  width="600"
  style="display:block; width:600px; max-width:100%; height:auto; border-radius:10px; margin-top:20px; line-height:0; border:0; outline:none; text-decoration:none;">

  
  <p style="margin-top:10px;">Enjoy your ride 🚗</p>
</body>
</html>';

    

    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'mail.mentem.in';
    $config['smtp_user'] = 'send_mail@mentem.in';
    $config['smtp_pass'] = 'pL87W_j)(XC*';
    $config['smtp_port'] = 587;
    $config['smtp_timeout'] = 10;
    $config['smtp_crypto'] = 'tls';
    $config['charset'] = 'utf-8';
    $config['mailtype'] = 'html';
    $config['newline'] = "\r\n";
    $config['crlf'] = "\r\n";
    
    $this->load->library('email');
    $this->email->initialize($config);

$this->email->from('send_mail@mentem.in', 'test');
$this->email->to('11.gksharma@gmail.com');
// $this->email->cc('another@another-example.com');
// $this->email->bcc('them@their-example.com');

$this->email->subject('Email Test');
$this->email->message($html);


// $this->email->send();

// p(empty($this->email->print_debugger()));
if($this->email->print_debugger()){
//    var_dump(trim($this->email->print_debugger()));
   $debugInfo = $this->email->print_debugger();

   // Remove HTML tags and invisible characters
   $cleaned = trim(strip_tags($debugInfo));
   $cleaned = preg_replace('/[\x00-\x1F\x7F\s]+/', '', $cleaned);
   
   if ($cleaned != '') {
     p($this->email->print_debugger());
   }
    // p("end");
}

// $this->load->library('encryption');
// $this->encryption->initialize(
//     array('mode' => 'ctr')
// );
// // $key = $this->encryption->create_key(16);

// $plain_text = 'This is a plain-text message!';
// $ciphertext = $this->encryption->encrypt($plain_text);
// p($this->encryption->decrypt($ciphertext));

        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News archive';
        $this->load->view('templates/header', $data);
        $this->load->view('news/cart', $data);
        $this->load->view('templates/footer');
}
public function view($slug = NULL)
{
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item']))
        {
                show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
}

public function create()
{
    $this->load->library('form_validation');
    $params = array('type' => 'large', 'color' => 'greesdgn');
    $this->load->library('test');
    
    $data['title'] = 'Create a news item';
    // $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    // $this->form_validation->set_rules(
    //     'title', 'Title', 'min_length[2]|max_length[7]|callback_title_check', //this is mentioned in form_validation config file
    //      array(
    //         'required'      => 'You have not provided %s.'
    // )
        // );
    // $this->form_validation->set_rules('text', 'Text', 'required');
    

    $asdf=$this->test->check($params);
    if ($this->form_validation->run() === FALSE)
    {
        $this->benchmark->mark('dog');

$this->load->view('templates/header', $data);
$this->load->view('news/create');
// $this->output->cache(1);
// $this->output->delete_cache();
// $this->benchmark->mark('cat');

$sections = array(
    'memory_usage'  => FALSE,
    'queries' => TRUE
);

$this->output->set_profiler_sections($sections);
        $this->output->enable_profiler(TRUE);
        // $this->output->enable_profiler(FALSE);
        // if ($this->output->is_cached()) {
        //     echo "Cache hit!";
        // } else {
        //     echo "Cache miss!";
        // }
        $this->load->view('templates/footer');
        
    }
    else
    {
        $config['upload_path']          = APPPATH.'uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $date = date('Y-m-d H:i:s');
        // $config['file_name']             = $config['client_name'].'_'.$date;
        $this->load->library('upload', $config);
        
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        if ( ! $this->upload->do_upload('userfile'))
        {
            $data['error'] = array('error' => $this->upload->display_errors());

            $this->load->view('news/create', $data);
    }
    else
    {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('news/upload_success', $data);
    }



        $this->news_model->set_news();
        // echo $this->benchmark->elapsed_time();
        $this->load->view('news/success');
    }
}

public function message($to = 'World')
{
        echo "Hello {$to}!".PHP_EOL;
}

// public function _remap($method, $params = array())
// {

//         if ($method == "view")
//         {
//                 return $this->_utility();
//         }
//         // redirect(base_url("news/").$method);
//         redirect(base_url('news/' . $method));

// }

public function _output($output)
{

    $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
    $prefs['template'] = array(
        'table_open'           => '<table class="calendar">',
        'cal_cell_start'       => '<td class="day">',
        'cal_cell_start_today' => '<td class="today">'
);

$this->load->library('calendar', $prefs);

echo $this->calendar->get_total_days(4, 2025);
if ( ! $foo = $this->cache->get('fooa'))
{
        echo 'Saving to the cache!<br />';
        $foo = 'foobarbaza!';

        // Save into the cache for 5 minutes
        $this->cache->save('fooa', $foo, 300);
}
// $this->cache->delete('fooa');
$foo = $this->cache->get('fooa');
$foo = $this->cache->decrement('iterator', 2);

$this->load->library('cart');
$data = array(
    'id'      => 'sku_123ABC',
    'qty'     => 1,
    'price'   => 39.95,
    'name'    => 'T-Shirt',
    'options' => array('Size' => 'L', 'Color' => 'Red')
);

$this->cart->insert($data);
// $this->cache->clean();
// var_dump($this->cache->cache_info());

// echo $foo;

// if ($this->cache->apc->is_supported())
// {
//         if ($data = $this->cache->apc->get('fooa'))
//         {
//                 echo $data;
//         }
// }
        $this->benchmark->mark('code_start');
    if ($this->input->is_ajax_request()) {
        // For AJAX, send only the raw output
        echo $output;
    } else {
        // For regular requests, wrap the output in a layout
        echo "<html><body><h1>This is passing through first _output function</h1>" . $output . "</body></html>";
    }
    $this->benchmark->mark('code_end');

echo $this->benchmark->elapsed_time('code_start', 'code_end'); //this is not visible due to html closing in above echo 

}

    // public function utility()
    // {
    //        p("asdf");
    // }

    function title_check($str)
    {
        $result = $this->news_model->get_title_count($str);
        if($result > 0){
        $this->form_validation->set_message('title_check',' <b>'. $str . ' </b>already taken!');
            return FALSE;
      }else{
        $word = CANNOT_USE;
        if ($str == $word) {
            $this->form_validation->set_message('title_check', 'The {field} field cannot be the word ' . $word);
            return FALSE;
        } else {
            return TRUE;
        }
    }
}


    }