<?php

class Device extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    function index()
    {
        $datas['title'] = 'Perhitungan Fuzzy Bayes';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //$datas['rule'] = $this->db->get_where('fuzzyrule', ['email' => $this->session->userdata('email')])->row_array();       
        //$datas['data'] = $this->db->get_where('datasensor', ['email' => $this->session->userdata('email')])->row_array();       
        $datas['rule'] = $this->db->select('*')->from('fuzzyrule')->where('email', $this->session->userdata('email'))->limit(1)->order_by('id','desc')->get()->result();
        $datas['data'] = $this->db->select('*')->from('datasensor')->where('email', $this->session->userdata('email'))->limit(1)->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar



        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'device/index', $datas);
        //$this->load->view('templates/footer'); // gak usah di pakai
    }

    public function fuzzyrule()
    {
        $data['title'] = 'Fuzzy Rule Device';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();       
        $data['rule'] = $this->db->get_where('fuzzyrule', ['email' => $this->session->userdata('email')])->row_array();       

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('device/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $min_rh = $this->input->post('min_rh');
            $mid_rh = $this->input->post('mid_rh');
            $mid2_rh = $this->input->post('mid2_rh');
            $max_rh = $this->input->post('max_rh');
            $min_suhu_udara = $this->input->post('min_suhu_udara');
            $mid_suhu_udara = $this->input->post('mid_suhu_udara');
            $mid2_suhu_udara = $this->input->post('mid2_suhu_udara');
            $max_suhu_udara = $this->input->post('max_suhu_udara');
            $min_suhu_daun = $this->input->post('min_suhu_daun');
            $mid_suhu_daun = $this->input->post('mid_suhu_daun');
            $mid2_suhu_daun = $this->input->post('mid2_suhu_daun');
            $max_suhu_daun = $this->input->post('max_suhu_daun');
            $jeda_pembacaan = $this->input->post('jeda_pembacaan');
            $email = $this->input->post('email');

            $this->db->set('min_rh', $min_rh);
            $this->db->set('mid_rh', $mid_rh);
            $this->db->set('mid2_rh', $mid2_rh);
            $this->db->set('max_rh', $max_rh);
            $this->db->set('min_suhu_udara', $min_suhu_udara);
            $this->db->set('mid_suhu_udara', $mid_suhu_udara);
          	$this->db->set('mid2_suhu_udara',$mid2_suhu_udara );
            $this->db->set('max_suhu_udara', $max_suhu_udara);
            $this->db->set('min_suhu_daun', $min_suhu_daun);
            $this->db->set('mid_suhu_daun', $mid_suhu_daun);
            $this->db->set('mid2_suhu_daun', $mid2_suhu_daun);
            $this->db->set('max_suhu_daun', $max_suhu_daun);
            $this->db->set('jeda_pembacaan', $jeda_pembacaan);
            $this->db->where('email', $email);
            $this->db->update('fuzzyrule');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('device/fuzzyrule');
        }
    }



    function monitoring()
    {
        $datas['title'] = 'Monitoring';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //$datas['rule'] = $this->db->get_where('fuzzyrule', ['email' => $this->session->userdata('email')])->row_array();       
        //$datas['data'] = $this->db->get_where('datasensor', ['email' => $this->session->userdata('email')])->row_array();       
        $datas['rule'] = $this->db->select('*')->from('fuzzyrule')->where('email', $this->session->userdata('email'))->limit(1)->order_by('id','desc')->get()->result();
        $datas['data'] = $this->db->select('*')->from('datasensor')->where('email', $this->session->userdata('email'))->limit(1)->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar



        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'device/monitoring', $datas);
        //$this->load->view('templates/footer'); // gak usah di pakai
    }


    function grafikjason()
    {
        $data = $this->db->select('*')->from('datasensor')->where('email', $this->session->userdata('email'))->limit(4500)->order_by('id', 'DESC')->get()->result();
        echo json_encode($data);
    }

    function historydevice()
    {
        $datas['title'] = 'History Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $datas['data'] = $this->db->select('*')->from('datasensor')->where('email', $this->session->userdata('email'))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'device/historydevice', $datas);
        //$this->load->view('templates/footer'); // gak usah di pakai
    }

    function rh()
    {
        $datas['title'] = 'History Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //$datas['rule'] = $this->db->get_where('fuzzyrule', ['email' => $this->session->userdata('email')])->row_array();       
        //$datas['data'] = $this->db->get_where('datasensor', ['email' => $this->session->userdata('email')])->row_array();       
        $datas['rule'] = $this->db->select('*')->from('fuzzyrule')->where('email', $this->session->userdata('email'))->limit(1)->order_by('id','desc')->get()->result();
        $datas['data'] = $this->db->select('*')->from('datasensor')->where('email', $this->session->userdata('email'))->limit(1)->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar



        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'device/rh', $datas);
        //$this->load->view('templates/footer'); // gak usah di pakai   
    }

    function suhu_udara()
    {
        $datas['title'] = 'History Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //$datas['rule'] = $this->db->get_where('fuzzyrule', ['email' => $this->session->userdata('email')])->row_array();       
        //$datas['data'] = $this->db->get_where('datasensor', ['email' => $this->session->userdata('email')])->row_array();       
        $datas['rule'] = $this->db->select('*')->from('fuzzyrule')->where('email', $this->session->userdata('email'))->limit(1)->order_by('id','desc')->get()->result();
        $datas['data'] = $this->db->select('*')->from('datasensor')->where('email', $this->session->userdata('email'))->limit(1)->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar



        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'device/suhu_udara', $datas);
        //$this->load->view('templates/footer'); // gak usah di pakai   
    }

    function suhu_daun()
    {
        $datas['title'] = 'History Device';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //$datas['rule'] = $this->db->get_where('fuzzyrule', ['email' => $this->session->userdata('email')])->row_array();       
        //$datas['data'] = $this->db->get_where('datasensor', ['email' => $this->session->userdata('email')])->row_array();       
        $datas['rule'] = $this->db->select('*')->from('fuzzyrule')->where('email', $this->session->userdata('email'))->limit(1)->order_by('id','desc')->get()->result();
        $datas['data'] = $this->db->select('*')->from('datasensor')->where('email', $this->session->userdata('email'))->limit(1)->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar



        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'device/suhu_daun', $datas);
        //$this->load->view('templates/footer'); // gak usah di pakai   
    }


}
