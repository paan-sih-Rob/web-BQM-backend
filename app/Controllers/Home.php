<?php

namespace App\Controllers;

use App\Models\PostsModel;

class Home extends BaseController
{    
    protected $m_posts;
    protected $pager;
    
    function __construct()
    {
        $this->pager = \Config\Services::pager();   
        $this->m_posts = new PostsModel();
        helper('global_fungsi_helper');
    }
    public function beranda()
    {   
        $data = [
            'tittle' => 'Beranda | BQM'
        ];
        
        echo view('depan/v_header', $data);
        echo view("depan/v_beranda", $data);
        echo view('depan/v_footer', $data);
    }
    public function profile()
    {   
        $data = [
            'tittle' => 'Profile | BQM'
        ];

        echo view('depan/v_header', $data);
        echo view("depan/v_profile", $data);
        echo view('depan/v_footer', $data);
    }
    public function direktori()
    {   
        $data = [
            'tittle' => 'Direktori | BQM'
        ];

        echo view('depan/v_header', $data);
        echo view("depan/v_direktori", $data);
        echo view('depan/v_footer', $data);
    }
    public function berita()
    {   
        
        $data = [];

        $post_type = 'article';
        $jumlahBaris = 3;
        $katakunci = '';
        $group_dataset = 'ft';
        
        
        // Dapatkan page_id dari konfigurasi untuk halaman depan
        $konfigurasi_name = "set_halaman_depan";
        $konfigurasi = konfigurasi_get($konfigurasi_name);
        $page_id = $konfigurasi['konfigurasi_value'] ?? 'default_value';
        
        // Dapatkan data dari modelPosts untuk id page_id
        $dataHalaman = $this->m_posts->getPost($page_id);
        
        if ($dataHalaman !== null && isset($dataHalaman['post_type'])) {
            $data['type'] = $dataHalaman['post_type'];
            $data['judul'] = $dataHalaman['post_title'];
            $data['deskripsi'] = $dataHalaman['post_description'];
            $data['thumbnail'] = $dataHalaman['post_thumbnail'];
        }
        $pager = $this->m_posts->listPost($post_type, $jumlahBaris, $katakunci, $group_dataset);
        $data['record'] = $pager['record'];
        $data['pager'] = $pager['pager'];

        
        

        echo view('depan/v_header', $data);
        echo view("depan/v_berita", $data);
        echo view('depan/v_footer', $data);
    }
    public function galeri()
    {   
        $data = [
            'tittle' => 'Galeri | BQM'
        ];

        echo view('depan/v_header', $data);
        echo view("depan/v_galeri", $data);
        echo view('depan/v_footer', $data);
    }
    public function akademik()
    {   
        $data = [
            'tittle' => 'Akademik | BQM'
        ];

        echo view('depan/v_header', $data);
        echo view("depan/v_akademik", $data);
        echo view('depan/v_footer', $data);
    }
    public function hubungi()
    {   
        $data = [
            'tittle' => 'Hubungi | BQM'
        ];

        echo view('depan/v_header', $data);
        echo view("depan/v_hubungi", $data);
        echo view('depan/v_footer', $data);
    }
}
