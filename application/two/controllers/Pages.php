<?php
class Pages extends CI_Controller {

	public function view($page = 'home')
	{
		// print_r(! file_exists(APPPATH.'views/pages/'.$page.'.php'));
		// print_r("/var/www/html/work/news/application/views/templates/pages/home.php");
					if (! file_exists(APPPATH.'views/pages/'.$page.'.php'))
					{
								// Whoops, we don't have a page for that!
									show_404();
					}
	
					$data['title'] = ucfirst($page); // Capitalize the first letter
	
					$this->load->view('templates/header', $data);
					$this->load->view('pages/'.$page, $data);
					$this->load->view('templates/footer', $data);
	}
}