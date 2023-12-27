<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PostsModel;

class Socials extends BaseController
{
    
    protected $validation;
    protected $m_posts;
    
    protected $halaman_controller;
    protected $halaman_label;
    function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->m_posts = new PostsModel();
        helper("global_fungsi_helper");
        /** untuk konfigurasi internal */
        $this->halaman_controller = "socials";
        $this->halaman_label = "Social Media";
    }
    function index()
{
    $data = [];
    
    if ($this->request->getMethod() == 'post') {
        // Save configurations
        $this->saveConfigurations();
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('admin/' . $this->halaman_controller);
    }

    // Load configurations
    $data['set_socials_twitter'] = $this->getConfig('set_socials_twitter');
    $data['set_socials_facebook'] = $this->getConfig('set_socials_facebook');
    $data['set_socials_github'] = $this->getConfig('set_socials_github');

    $data['templateJudul'] = "Halaman " . $this->halaman_label;

    /** header */
    echo view('admin/v_template_header', $data);
    echo view('admin/v_socials', $data);
    echo view('admin/v_template_footer', $data);
    /** footer */
}

private function saveConfigurations()
{
    $this->saveConfiguration('set_socials_twitter');
    $this->saveConfiguration('set_socials_facebook');
    $this->saveConfiguration('set_socials_github');
}

private function saveConfiguration($konfigurasi_name)
{
    $dataSimpan = [
        'konfigurasi_value' => $this->request->getVar($konfigurasi_name)
    ];

    konfigurasi_set($konfigurasi_name, $dataSimpan);
}

private function getConfig($konfigurasi_name)
{
    $configData = konfigurasi_get($konfigurasi_name);
    return $configData !== null ? $configData['konfigurasi_value'] : null;
}

}
