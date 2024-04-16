<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {   
        $data['title'] = 'Home'; 
        $data['berita']= $this->Model_app->berita_user();   
        $data['struktur']= $this->Model_app->struktur();  
        $data['kegiatan']= $this->Model_app->kegiatan();
        $this->load->view('user/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('user/footer', $data);
    }

    public function struktur_detail($id_struktur){
        $data['user'] = $this->db->get_where('users',['username' => 
            $this->session->userdata('username')])->row_array();  
        $data['data']= $this->Model_app->struktur_detail($id_struktur); 
        $data['kegiatan']= $this->Model_app->kegiatan();            
        $data['title'] = 'Struktur Organisasi';     
        $this->load->view('user/struktur_detail', $data);
        $this->load->view('user/footer', $data);
    }

    public function sejarah()
    {   
        $data['title'] = 'Tentang KTTH'; 
        $data['visi']= $this->Model_app->visiaja(); 
        $data['misi']= $this->Model_app->misiaja(); 
        $data['sejarah']= $this->Model_app->sejarah(); 
        $data['kegiatan']= $this->Model_app->kegiatan();
        $this->load->view('user/sejarah', $data);
        $this->load->view('user/footer', $data);
    }

      public function anggota()
    {   
        $data['title'] = 'Anggota KTTH'; 
        $data['anggota']= $this->Model_app->status_anggota();  
        $data['kegiatan']= $this->Model_app->kegiatan();
        $this->load->view('user/anggota', $data);
        $this->load->view('user/footer', $data);
    }

      public function struktur_organisasi()
    {   
        $data['title'] = 'Struktur KTTH'; 
        $data['struktur']= $this->Model_app->strukturinti();  
        $data['kegiatan']= $this->Model_app->kegiatan();
        $this->load->view('user/struktur_organisasi', $data);
        $this->load->view('user/footer', $data);
    }


    public function kategori($id_kegiatan){
        $data['user'] = $this->db->get_where('users',['username' => 
            $this->session->userdata('username')])->row_array();
        $data['kegiatan']= $this->Model_app->kegiatan();       
        $data['data']= $this->Model_app->goupby_kegiatanberita($id_kegiatan);        
        $data['title'] = 'Kegiatan Organisasi';       
        $this->load->view('user/kegiatan_berita', $data);
        $this->load->view('user/footer', $data);
    }

     public function baca_berita($id_berita){
        $data['user'] = $this->db->get_where('users',['username' => 
            $this->session->userdata('username')])->row_array();  
        $data['bacaberita']= $this->Model_app->berita_id($id_berita); 
        $data['kegiatan']= $this->Model_app->kegiatan();            
        $data['title'] = 'Baca Berita';        
        $this->load->view('user/header', $data);
        $this->load->view('user/baca_berita', $data);
        $this->load->view('user/footer', $data);
    }
    
       public function kontak()
    {   
        $data['title'] = 'Kontak KTTH'; 
        $data['kegiatan']= $this->Model_app->kegiatan();
        $this->load->view('user/kontak', $data);
        $this->load->view('user/footer', $data);
    }



    public function login()
    {
        $this->load->view('user/login');
    }
    
    public function galeri()
    {
        $data['title'] = 'Galeri'; 
        $data['berita']= $this->Model_app->berita_user();   
        $data['struktur']= $this->Model_app->struktur();  
        $data['kegiatan']= $this->Model_app->kegiatan();
        $this->load->view('user/galeri', $data);
        $this->load->view('user/footer', $data);
    }
    
     public function galeriid($id_kegiatan)
    {
        $data['title'] = 'Galeri';  
        $data['kegiatan']= $this->Model_app->tampil_kegiatanid($id_kegiatan);
        $data['galeriid']= $this->Model_app->galeriid($id_kegiatan);
        $this->load->view('user/galeriid', $data);
        $this->load->view('user/footer', $data);
    }
    
    public function berita()
    {
        $data['title'] = 'Berita'; 
        $data['berita']= $this->Model_app->tampil_berita(); 
        $data['recentpost']= $this->Model_app->recentpost();     
        $data['kegiatan']= $this->Model_app->kegiatan();         
        $this->load->view('user/tampil_berita', $data);
    }
    
     public function beritaid($id_berita){
        $data['title'] = 'Detail Berita';  
        $data['kegiatan']= $this->Model_app->kegiatan();     
        $data['recentpost']= $this->Model_app->recentpost();
        $data['data']= $this->Model_app->berita_lengkap($id_berita);
        $data['user'] = $this->db->get_where('users',['username' => 
            $this->session->userdata('username')])->row_array();
        $this->load->view('user/berita_selengkapnya', $data);
    }
    
    
    public function kegiatan()
    {
        $this->load->view('user/kegiatan');
    }
    public function registrasi()
    {
        $this->load->view('user/registrasi');
    }

     // Controller Modul Laporan dan keuangan

}
