<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$url = 'http://localhost/interview2/api/item';

        /* Init cURL resource */
        $curl = curl_init($url);

       curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_TIMEOUT => 30000,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
			// Set Here Your Requesred Headers
				'Content-Type: application/json',
			),
		));

print_r($curl);exit;
        /* execute request */
        $result = curl_exec($curl);

				error_reporting(-1);
			ini_set('display_errors', 'On');

        /* close cURL resource */
        curl_close($curl);
				// // echo 'Curl error: ' . curl_error($ch);
	      // if($result === false)
	      // {
	      //   echo 'Curl error: ' . curl_error($ch);
	      // }


		print_r($result);exit;
		$this->load->view('welcome_message');
	}
	public function validateCredentials(){
	}
}
