<?php


class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model','',TRUE);
                $this->load->helper('url_helper');
        }

        public function index()
{
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News archive';
        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
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
    $this->load->helper('form');
    $this->load->library('form_validation');
    $params = array('type' => 'large', 'color' => 'greesdgn');
    $this->load->library('test');
    
    $data['title'] = 'Create a news item';
    
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'Text', 'required');
    $asdf=$this->test->check($params);
    //    p($asdf);
    if ($this->form_validation->run() === FALSE)
    {
        $this->benchmark->mark('dog');

// Some code happens here
$this->load->view('templates/header', $data);
$this->load->view('news/create');
// $this->output->cache(1);
$this->output->delete_cache();
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
        $this->news_model->set_news();
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
        $this->benchmark->mark('code_start');
    if ($this->input->is_ajax_request()) {
        // For AJAX, send only the raw output
        echo $output;
    } else {
        // For regular requests, wrap the output in a layout
        echo "<html><body><h1>This is passing through second _output function</h1>" . $output . "</body></html>";
    }
}

    // public function utility()
    // {
    //        p("asdf");
    // }

}