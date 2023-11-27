<?php 

class Product extends CI_Controller{
    public function index(){
        require_once FCPATH . 'vendor/autoload.php';

        $data['product'] = $this->product_model->get_data();


        $this->load->view('partials/header');
		$this->load->view('product', $data);
		$this->load->view('partials/footer');
    }
    public function create_view(){
        $data['category'] = $this->product_model->get_category();
        $data['status'] = $this->product_model->get_status();
        $this->load->view('partials/header');
		$this->load->view('partials/addproduct', $data);
		$this->load->view('partials/footer');
    }
    public function create(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_produk', 'nama_produk', 'required|min_length[5]');
        $this->form_validation->set_rules('harga', 'harga', 'required|numeric');
        $this->form_validation->set_rules('kategori_id', 'kategori_id', 'required');
        $this->form_validation->set_rules('status_id', 'status_id', 'required');
        if($this->form_validation->run() == false){
			$data['category'] = $this->product_model->get_category();
            $data['status'] = $this->product_model->get_status();
            $this->load->view('partials/header');
            $this->load->view('partials/addproduct', $data);
            $this->load->view('partials/footer');
		}else {
            $nama_produk = $this->input->post('nama_produk');
            $harga = $this->input->post('harga');
            $kategori_id = $this->input->post('kategori_id');
            $status_id = $this->input->post('status_id');
            $data = array(
			'nama_produk' =>$nama_produk,
            'harga' => $harga,
            'kategori_id' => $kategori_id,
            'status_id' => $status_id
			);
            $this->product_model->create_data($data, 'TB_Produk');
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			Data berhasil ditambahkan
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
			);
            redirect('product/index');
        }	
    }
    public function delete($id_produk){
        $where = array ('id_produk' => $id_produk);
        $this->product_model->delete_data($where, 'TB_Produk');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			Data berhasil dihapus
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
			);
        redirect('product/index');
    }
    public function edit($id_produk){
        $where = array ('id_produk' => $id_produk);
		$data['product'] = $this->product_model->edit_data($where, 'TB_Produk')->result();
        $data['category'] = $this->product_model->get_category();
        $data['status'] = $this->product_model->get_status();
        
        $this->load->view('partials/header');
		$this->load->view('partials/editproduct', $data);
		$this->load->view('partials/footer');   
    }
    public function update(){
		$this->load->library('form_validation');
        $id_produk = $this->input->post('id_produk');
        $this->form_validation->set_rules('nama_produk', 'nama_produk', 'required|min_length[5]');
        $this->form_validation->set_rules('harga', 'harga', 'required|numeric');
        $this->form_validation->set_rules('kategori_id', 'kategori_id', 'required');
        $this->form_validation->set_rules('status_id', 'status_id', 'required');
		if($this->form_validation->run() == false){
			$id_produk = $this->input->post('id_produk');
			$where = array ('id_produk' => $id_produk);
			$data['product'] = $this->product_model->edit_data($where, 'TB_Produk')->result();
            $data['category'] = $this->product_model->get_category();
            $data['status'] = $this->product_model->get_status();
			$this->load->view('partials/header');
			$this->load->view('partials/editproduct', $data);
			$this->load->view('partials/footer');
		} else {
			$nama_produk = $this->input->post('nama_produk');
            $harga = $this->input->post('harga');
            $kategori_id = $this->input->post('kategori_id');
            $status_id = $this->input->post('status_id');
			$data = array(
				'nama_produk' => $nama_produk,
                'harga' => $harga,
                'kategori_id' => $kategori_id,
                'status_id' => $status_id
			);
			$where = array(
				'id_produk' => $id_produk
			);
			$this->product_model->update_data($where,$data, 'TB_Produk');
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			Data berhasil diedit
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
			);
			redirect('product/index');
		}
		
	}
    public function save(){
        require_once FCPATH . 'vendor/autoload.php';
        $apiUrl = "https://recruitment.fastprint.co.id/tes/api_tes_programmer";
        $username = 'tesprogrammer271123C13';
        $password = 'db340b51212133433914ae03d4a3ba46';

        
        $client = new \GuzzleHttp\Client();

        $form_data = [
            'username' => $username,
            'password' => $password,
        ];

        
        $response = $client->post($apiUrl, [
            'form_params' => $form_data,
        ]);

        $body = $response->getBody()->getContents();

        
        $data = json_decode($body, true);

        if (isset($data['data'])) {
            $this->product_model->save_data($data['data']);
            echo 'Data saved to the database successfully!';
        } else {
            echo 'No data to save.';
        }

        redirect('product/index');
        
    }
    public function viewbj(){
        $data['product'] = $this->product_model->get_data_bj();
        $this->load->view('partials/header');
		$this->load->view('productbj', $data);
		$this->load->view('partials/footer');
                
    }
}

?>