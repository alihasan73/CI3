<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function index()
	{
		$data['category'] = $this->category_model->get_data();
		$this->load->view('partials/header');
		$this->load->view('category', $data);
		$this->load->view('partials/footer');
	}

	public function create() 
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|min_length[3]');
		
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
			form tidak boleh kosong dan minimal 3 huruf
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
			);
			redirect('category/index');
		}else {
			$nama_kategori = $this->input->post('nama_kategori');
			$data = array(
			'nama_kategori' =>$nama_kategori,
			);
			$this->category_model->create_data($data, 'TB_Kategori');
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			Data berhasil ditambahkan
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
			);
			redirect('category/index');
		}
		
	}
	public function delete($id_kategori){
		$where = array ('id_kategori' => $id_kategori);
		$this->category_model->delete_data($where, 'TB_Kategori');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			Data berhasil dihapus
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
			);
		redirect('category/index');
	}
	public function edit($id_kategori){
		$where = array ('id_kategori' => $id_kategori);
		$data['category'] = $this->category_model->edit_data($where, 'TB_Kategori')->result();
		$this->load->view('partials/header');
		$this->load->view('partials/editcategory', $data);
		$this->load->view('partials/footer');
	}
	public function update(){
		$this->load->library('form_validation');
		$id_kategori = $this->input->post('id_kategori');
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|min_length[3]');
		if($this->form_validation->run() == false){
			$id_kategori = $this->input->post('id_kategori');
			$where = array ('id_kategori' => $id_kategori);
			$data['category'] = $this->category_model->edit_data($where, 'TB_Kategori')->result();
			$this->load->view('partials/header');
			$this->load->view('partials/editcategory', $data);
			$this->load->view('partials/footer');
		} else {
			$nama_kategori = $this->input->post('nama_kategori');
			$data = array(
				'nama_kategori' => $nama_kategori,
			);
			$where = array(
				'id_kategori' => $id_kategori
			);
			$this->category_model->update_data($where,$data, 'TB_Kategori');
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			Data berhasil diedit
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
			);
			redirect('category/index');
		}
		
	}
}
