<?php

class About extends Controller{
    public function page()
    {
        $data['judul'] = 'About';

        $this->view('template/header',$data);
        $this->view('about/page');
        $this->view('template/footer');
    }public function index($nama = 'kamu siapa')
    {
        $data['judul'] = 'About';
        
        $this->view('template/header',$data);
        $data['nama'] = $nama;
        $this->view('about/index',$data);
        $this->view('template/footer');

    }

}