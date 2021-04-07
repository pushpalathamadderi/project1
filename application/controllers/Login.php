<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User');
    }
    //load login page
    public function index()
  	{
  		$data = array();
  		$data['page_title'] = "Login Page";
  		$data['page_desc'] ="Login Page";
  		$this->load->view('login', $data);
  	}
   // validate login credentials
    public function validateCredentials(){
      // Get the post data
      //print_r($this->input->post());exit;
       $email =$this->security->xss_clean($this->input->post('username'));
      $password =$this->security->xss_clean($this->input->post('password'));
      // API key
      $apiKey = 'CODEX@123';
      // API auth credentials
      $apiUser = "admin";
      $apiPass = "1234";
      // API URL
      $url = base_url().'authentication/login';

      // User account login info
      $userData = array(
          'email' => $email,
          'password' =>   $password
      );
      // Create a new cURL resource
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_PROXY, $_SERVER['SERVER_ADDR'] . ':' .  $_SERVER['SERVER_PORT']);

      curl_setopt($ch, CURLOPT_TIMEOUT, 30);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
      // curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey,"Accept: application/json","Content-Type: application/json"));

      curl_setopt($ch, CURLOPT_USERPWD, "$apiUser:$apiPass");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $userData);
      $result = curl_exec($ch);
      // Close cURL resource
      if($result === false)
      {
        echo 'Curl error: ' . curl_error($ch);
      }else{
        if($result){
          $data = array();
      		$data['page_title'] = "Login Page";
      		$data['page_desc'] ="Login Page";
          $user_data['email']          = $result['email'];
          $user_data['user_name']          = $result['user_name'];
          $user_data['password']          = $result['password'];
          $user_data['logged_in']         = TRUE;
          $this->load->view('userform', $data);
        }else{
        //  exit;
        }
        curl_close($ch);
      }
      $data['page_title'] = "Login Page";
      $data['page_desc'] ="Login Page";
      $this->load->view('userform', $data);
    }

    public function getUserForm()
  	{
  		$data = array();
  		$data['page_title'] = "Login Page";
  		$data['page_desc'] ="Login Page";
  		$this->load->view('userform', $data);
  	}
    //submit  user form
    public function submitUserDetails()
    {
      $data =$this->security->xss_clean($this->input->post());

      // upload files
      $_FILES=$this->security->xss_clean($_FILES);
      print_r($_FILES);exit;
      if(!empty($_FILES['img'])){
        $upload_path=FCPATH.UPLOADDOCUMENT.$data->emp_id;
        if(!file_exists($upload_path)){
          mkdir($upload_path,FOL_PERMISSION,true);
          if($server == APICONSTANTCALL){
            exec("chmod -R ".FOL_PERMISSION.' '.FCPATH.UPLOADDOCUMENT.$emp_id);
          }
        }
        $FileToUpload = $_FILES['img'];

        $FileType = pathinfo($FileToUpload['name'], PATHINFO_EXTENSION);
        $new_name = str_replace(' ', '', $data->org_name);
        $config['upload_path'] =$upload_path;
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size'] = '2000000';
        $config['max_width'] = '1024000';
        $config['max_height'] = '768000';
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('img')){
          $error = array('message' => $this->upload->display_errors());
          echo json_encode($error);
          die;
        }else{
          $data_upload = array('upload_data' => $this->upload->data());
        }
        $file_name=$data_upload['upload_data']['file_name'];
      }else{
        $file_name="";
      }

      // API key
      $apiKey = 'CODEX@123';
      // API auth credentials
      $apiUser = "admin";
      $apiPass = "1234";
      // API URL
      $url = base_url().'authentication/registration';


      // User account info
      $userData = array(
          'name' => $data['name'],
          'email' =>  $data['email'],
          'user_name' =>  $data['username'],
          'password' =>  $data['password'],
          'mobile_number' =>  $data['mobile_number'],
          'profile_pic' =>  file_name,
          'dob' =>  $data['dob'],
          'address' =>  $data['address'],
          'city' =>  $data['city'],
          'state' =>  $data['state'],
          'country' =>  $data['country'],
          'created' => date('Y-m-d H:i:s')
      );
      $user_data['logged_in']         = TRUE;
      // Create a new cURL resource
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_TIMEOUT, 30);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
      curl_setopt($ch, CURLOPT_USERPWD, "$apiUser:$apiPass");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $userData);
      $result = curl_exec($ch);
      // Close cURL resource
      curl_close($ch);

    }
    //get data table viewMode
    public function listView()
    {
      $data = array();
      $data['page_title'] = "Login Page";
      $data['page_desc'] ="Login Page";
      $this->load->view('userslist', $data);
    }
    public function getList()
    {
      $data=$this->security->xss_clean($this->input->get());

  		$search=$data['search']['value'];
  		$draw = $data['draw'];
  		$offset=$data['start'];
  		$limit=$data['length'];
      $search_array=array();
      if($search!=''){
        $search_array=array('user_name'=>$search,'name'=>$search,'dob'=>$search,'mobile_number'=>$search,'email'=>$search,'created'=>$search);
      }
  		$rows = array();
  		$select=array('*');
  		$join=array();
  		$join_condition=array(	);
  		$where=array();
  		$and_or_where=array();$or_where=array();$or_where_val=array();

  		$result = $this->User->getDatatableList( 'users',array('*'), $where, $limit, $offset, $search_array, 'id asc',$join,$join_condition);
  		$result_count = $this->User->getDatatableList('users','count(id) as count',  $where, '', '', $search_array, '',$join,$join_condition);
      if(!empty($result)){
  			foreach($result as $k=>$v){
  				$status="";
          if($v['status']==1){
            $status='Active';
          }else{
            $status='Inactive';
          }
  				$action='<a href="'.base_url().'edit/'.base64_encode($v['id']).'" class="" target="_blank" data-id="'.$v['id'].'">Edit</a>';
          $action.='&nbsp;&nbsp<a href="jvascript.void(0)" class="" target="_blank" data-id="'.$v['id'].'">Delete</a>';

  				$row[]=array($v['name'],$v['email'],$v['user_name'],$v['mobile_number'],$v['dob'],$status,$v['created'],$v['modified'],$action);
  			}
  			$count=0;
  			if(!empty($result_count)){
  				$count=$result_count[0]['count'];
  			}
  			$res= array('draw'=>$draw,'recordsTotal'=>$count, 'recordsFiltered'=>$count,'data'=>$row);
  		}else{
  			$res=array('draw'=>$draw,'recordsTotal'=>0, 'recordsFiltered'=>0,'data'=>array());
  		}
  		echo json_encode($res);

    }

}
