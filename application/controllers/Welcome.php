<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//aap direct project name ke baad controller ko call nhi ker sakte 
//localhost /projectname / index.php /controllername / function of controller
//ek rule h uske hisab se call kare this is used for securoty purpose.
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		//$this->load->model('Athenticate');//load ek super object h
		//$data = $this->Athenticate->getdata();//sub object
		//print_r($data);
		$this->load->view('users_data/article_list');
	}
	public function demo()
	{
		echo "demo";
	}
}
