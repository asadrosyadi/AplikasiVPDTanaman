<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model', 'user');
        $this->load->model('Menu_model', 'menu');
        $this->load->model('Admin_model', 'admin');
        $this->load->model('Admin_model');
    }
    function data_data(){
        $data=$this->Admin_model->data_list();
        echo json_encode($data);
    }

    function get_data(){
        $id=$this->input->get('id');
        $data=$this->Admin_model->get_data_by_kode($id);
        echo json_encode($data);
    }

    public function index()
    {
        $data['data'] = $this->db->select('*')->from('data_pelatihan')->get()->result(); //Untuk mengambil data dari database webinar

        $datas['title'] = 'Data Pelatihan';
        $datas['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $datas);
        $this->load->view('templates/sidebar', $datas);
        $this->load->view('templates/topbar', $datas);
        $this->template->load('template1', 'admin/index', $data);
        //$this->load->view('templates/footer'); // gak usah di pakai
    }
    function add(){
        $rh=$this->input->post('rh');
		$suhu_udara=$this->input->post('suhu_udara');
		$suhu_daun=$this->input->post('suhu_daun');
		$hasil_vpd=$this->input->post('hasil_vpd');
		$kontrol_suhu=$this->input->post('kontrol_suhu');
		$kontrol_kelembapan=$this->input->post('kontrol_kelembapan');
        $data=$this->Admin_model->simpan_data($rh,$suhu_udara,$suhu_daun,$hasil_vpd,$kontrol_suhu,$kontrol_kelembapan);
        echo json_encode($data);
    }

    function edit(){
        $rh=$this->input->post('rh');
		$suhu_udara=$this->input->post('suhu_udara');
		$suhu_daun=$this->input->post('suhu_daun');
		$hasil_vpd=$this->input->post('hasil_vpd');
		$kontrol_suhu=$this->input->post('kontrol_suhu');
		$kontrol_kelembapan=$this->input->post('kontrol_kelembapan');
        $id=$this->input->post('id');
        $data=$this->Admin_model->update_data($rh,$suhu_udara,$suhu_daun,$hasil_vpd,$media_tanam,$ppm,$ph,$oksigen,$debit,$kontrol_suhu,$kontrol_kelembapan,$kontrol_nutrisiair,$kontrol_ph,$hasil_kondisi,$id);
        echo json_encode($data);
		
    }
    
    function hapus(){
        $id=$this->input->post('id');
        $data=$this->Admin_model->hapus_data($id);
        echo json_encode($data);
		
    }

        public function hasil()
    {
        $data['title'] = 'Probabilitas Hasil';
        $data['user'] = $this->user->getUserData();
        $data['all_user'] = $this->user->getUserDataAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/hasil', $data);
        $this->load->view('templates/footer');
    }

    public function output()
    {
        $data['title'] = 'Probabilitas Output';
        $data['user'] = $this->user->getUserData();
        $data['all_user'] = $this->user->getUserDataAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/output', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->user->getUserData();

        $data['role'] = $this->admin->getUserRoleAll();

        $this->form_validation->set_rules('role', 'Role Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $role_name = $this->input->post('role');
            $data = [
                'role' => $role_name
            ];
            $user_role = $this->db->get_where('user_role', ['role' => $role_name]);

            if ($user_role->num_rows() < 1) {
                $this->db->insert('user_role', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Role Added!</div>');
                redirect('admin/role');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This role is exist!</div>');
                redirect('admin/role');
            }
        }
    }

    public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->user->getUserData();


        $data['role'] = $this->admin->getUserRoleById($role_id);;

        $data['menu'] = $this->menu->getUserMenuAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer', $data);
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Access Changed! </div>');
    }

    public function editrole($role_id)
    {
        $data['title'] = 'Edit Role';
        $data['user'] = $this->user->getUserData();
        $data['role'] = $this->admin->getUserRoleById($role_id);;

        $this->form_validation->set_rules('role', 'Role Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-role', $data);
            $this->load->view('templates/footer');
        } else {
            $role_name = $this->input->post('role');
            $user_role = $this->db->get_where('user_role', ['role' => $role_name]);
            if ($user_role->num_rows() < 1) {
                $this->db->set('role', $role_name);
                $this->db->where('id', $role_id);
                $this->db->update('user_role');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Role Success!</div>');
                redirect('admin/role/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This role name is exist or same!</div>');
                redirect('admin/editrole/' . $role_id);
            }
        }
    }

    public function deleterole($role_id)
    {
        $role = $this->admin->getUserRoleById($role_id);

        $this->db->delete('user_role', ['id' => $role_id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $role['role'] . ' role is deleted!</div>');
        redirect('admin/role');
    }
}
