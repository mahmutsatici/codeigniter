<?php
    class Home extends CI_Controller
    {
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('CommonModel', 'CM');
            
            
            
        }
        public function index()
        {
            $data["pnr"] = array();
            $getInfo = $this->input->get();
            if (isset($getInfo['KalkisYeri'])) {
                $data["pnr"] = $this->CM->select_data("seferler", "*",$getInfo);
                

            }
            $data["seferler"] = $this->CM->select_data("seferler", "*","");
            $this->load->view('home/include/header');
            $this->load->view('home/index',$data);
            $this->load->view('home/include/footer');
        }
       
        
        public function amenities()
        {
            $this->load->view('home/include/header');
            $this->load->view('home/amenities');
            $this->load->view('home/include/footer');
        }
        public function contacts()
        {
            $this->load->view('home/include/header');
            $this->load->view('home/contacts');
            $this->load->view('home/include/footer');
        }
        public function gallery()
        {
            
            $data["seferler"] = array();
            $getInfo = $this->input->get();
            if (isset($getInfo['KalkisYeri'])) {
                $data["seferler"] = $this->CM->select_data("seferler", "*",$getInfo);
            }
            $this->load->view('home/include/header');
            $this->load->view('home/gallery',$data);
            $this->load->view('home/include/footer');
        }
        
        public function bilet($seferID)
        {
            $data["seferler"] = array();
            $data["biletler"] = array();
            $data["seferid"] = $seferID;    
            $data["seferler"] = $this->CM->select_data("seferler", "*", array('SeferID' => $seferID));
            $data["otobus"] = $this->CM->select_data("otobus", "*", "" );
            $data["bilet"] = $this->CM->select_data("biletler", "*", array('SeferID' => $seferID) );
            $data["kullanici"] = $this->CM->select_data("kullanicilar","*","");
           
            if(!$this->session->userdata("session"))
            {
                $kontrol = 1;
                redirect(base_url("login/"));
                return false;
            }
            
            $this->load->view('home/include/header');
            $this->load->view('home/bilet',$data);
            $this->load->view('home/include/footer');
        }
        public function account()
        {
            if(!$this->session->userdata("session"))
            {
                redirect(base_url("login"));
                return false;
            }
            
            $this->load->view('home/include/header');
            $this->load->view('home/account');
            $this->load->view('home/include/footer');
        }
        public function satinal()
        {
            $this->load->view('home/include/header');
            $this->load->view('home/satinal');
            $this->load->view('home/include/footer');
        }
        
        public function register()
        {
            $this->load->view('home/include/header');
            $this->load->view('home/register');
            $this->load->view('home/include/footer');
        }
        public function faqs()
        {
            $this->load->view('home/include/header');
            $this->load->view('home/faqs');
            $this->load->view('home/include/footer');
        }
        
    }
?>