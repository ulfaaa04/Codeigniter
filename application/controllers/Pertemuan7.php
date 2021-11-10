<?php 
defined('BASEPATH') or exit ('No direct script access allowed');

class Pertemuan7 extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->model('ModelPertemuan7');
    }

    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama Pembeli', 'required', [
            'required' => 'Nama Pembeli Harus Diisi'
        ]);
        $this->form_validation->set_rules('nhp', 'Nomer Hp', 'required', [
            'required' => 'Nomor HP Harus Diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['merk'] = ['Nike', 'Adidas', 'Kickers', 'Eiger', 'Bucherri'];
            $this->load->view('pertemuan7/v_input', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'nhp' => $this->input->post('nhp'),
                'merk' => $this->input->post('merk'),
                'ukuran' => $this->input->post('ukuran'),
                'harga' => $this->ModelPertemuan7->proses($this->input->post('merk'))
            ];

            $this->load->view('pertemuan7/v_output', $data);
        }
       
    }
}