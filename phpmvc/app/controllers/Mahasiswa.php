<?php 

class Mahasiswa extends Controller{
    public function index()
    {   
        $data['judul'] = 'Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMHS();
        $this->view('template/header',$data);
       $this->view('mahasiswa/index',$data);
       $this->view('template/footer');
    }
    public function detail($id)
    {   
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMHSByID($id);
        $this->view('template/header',$data);
       $this->view('mahasiswa/detail',$data);
       $this->view('template/footer');
    }

    public function crate(){
        if ($this->model('Mahasiswa_model')->creatMHS($_POST)>0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }
    }

    public function delete($id){
        if ($this->model('Mahasiswa_model')->deleteMHS($id)>0) {
            Flasher::setFlash('berhasil', 'didelete', 'success');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('gagal', 'didelete', 'danger');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }
    }

    public function getubah(){
        echo json_encode($this->model('Mahasiswa_model')->getMHSByID($_POST['id']));
    }

    public function update(){
        if ($this->model('Mahasiswa_model')->updateMHS($_POST)>0) {
            Flasher::setFlash('berhasil', 'diupdate', 'success');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('gagal', 'diupdate', 'danger');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }
    }

    public function cari()
    {   
        $data['judul'] = 'Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariMHS();
        $this->view('template/header',$data);
       $this->view('mahasiswa/index',$data);
       $this->view('template/footer');
    }




}