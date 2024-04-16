<?php 
class Model_app extends CI_model{

    function __construct(){
        parent::__construct();
    }

    function manualQuery($q)
    {
        return $this->db->query($q);
    }
    private $_table = "tb_berita";
    
    private $_table2 = "tb_sejarah";
    
    private $_table3 = "tb_struktur";
    
     private $_table4 = "tb_visimisi";
     
      private $_table5 = "tb_aset";

      private $_table6 = "keuangan";

    public function view($table){
        return $this->db->get($table);
    }

    public function insert($table,$data){
        return $this->db->insert($table, $data);
    }

    public function tampil_edit($where,$table){     
        return $this->db->get_where($table,$where);
    }

    public function edit($table, $data){
        return $this->db->get_where($table, $data);
    }

    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    public function view_where($table,$data){
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function view_ordering_limit($table,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }
    
    public function view_ordering($table,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_where_ordering($table,$data,$order,$ordering){
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function view_join_one($table1,$table2,$field,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_where($table1,$table2,$field,$where,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    function umenu_akses($link,$id){
        return $this->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    }

    public function cek_login($username,$password,$table){
        return $this->db->query("SELECT * FROM $table where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."' AND blokir='N'");
    }

    function tampil_data($vtanggal){
        $vbulan = date("m",strtotime($vtanggal)); 
        $this->db->select('*');
        $this->db->from('keuangan');
        $this->db->where('month(tgl)',$vbulan);
        $this->db->where('year(tgl)',$vtanggal);
        $this->db->where('status', 'masuk');
        $query = $this->db->get();
        return $query;
    }

    function tampil_data1($vtanggal){
        $vbulan = date("m",strtotime($vtanggal)); 
        $this->db->select('*');
        $this->db->from('keuangan');
        $this->db->where('month(tgl)',$vbulan);
        $this->db->where('year(tgl)',$vtanggal);
        $this->db->where('status', 'keluar');
        $query = $this->db->get();
        return $query;
    }

    function update_datamodul($where,$data,$table, $id_modul){
        $username= $this->session->userdata('username');
        $this->db->Select(['*']);
        $this->db->from('modul');
        $this->db->where('modul.id_modul', $id_modul);
        
        if($this->db->update('modul', $data)){
            return true;
        }else{
            print_r($this->db->error());
        }
        exit();
    }   

    public function data_orangyanglogin(){
        $username= $this->session->userdata('username');
        $q = $this->manualQuery("SELECT * From users WHERE username = '$username'");
        return $q->result();
    }

    // Sejarah
    public function sejarah(){
        $q = $this->manualQuery("SELECT * From tb_sejarah");
        return $q->result();
    }

    public function tambah_data($data,$table){
        $this->db->insert($table,$data);
    }

    function ubah_sejarah($where,$data,$table, $id_sejarah){
        $this->db->Select(['*','tb_sejarah.id_sejarah']);
        $this->db->from('tb_sejarah');
        $this->db->where('tb_sejarah.id_sejarah', $id_sejarah);
        if($this->db->UPDATE('tb_sejarah', $data)){
            return true;
        }else{
            print_r($this->db->error());
        }
        exit();
    }   
 // Visi Misi
    public function visi_misi(){
        $q = $this->manualQuery("SELECT * From tb_visimisi");
        return $q->result();
    }

    public function edit_visimisi($id_visimisi){
        $data = array(
            'isi_visi' => $this->input->post('isi_visi'),
            'isi_misi' => $this->input->post('isi_misi')
        );
        $this->db->where('id_visimisi',$id_visimisi);
        return $this->db->update('tb_visimisi',$data);
    }

    public function data_tabeluser(){
        $q = $this->manualQuery("SELECT * From users where blokir='N'");
        return $q->result();
    }

      // Sejarah
    public function struktur(){
        $q = $this->manualQuery("SELECT * From tb_struktur join users on tb_struktur.username = users.username ORDER by users.nama_lengkap Asc");
        return $q->result();
    }

    public function edit_struktur($id_struktur){
        $data = array(
            'username' => $this->input->post('username'),
            'jabatan' => $this->input->post('jabatan')
        );
        $this->db->where('id_struktur',$id_struktur);
        return $this->db->update('tb_struktur',$data);
    }


    function update_struktur($where,$data,$table, $id_struktur){
        $username= $this->session->userdata('username');
        $this->db->Select(['*']);
        $this->db->from('tb_struktur');
        $this->db->join('users', 'users.username = tb_struktur.username');
        $this->db->where('tb_struktur.id_struktur', $id_struktur);
        // $this->db->update($table, $data);
        
        if($this->db->update('tb_struktur', $data)){
            return true;
        }else{
            print_r($this->db->error());
        }
        exit();
    }   

     // kegiatan
    public function kegiatan(){
        $q = $this->manualQuery("SELECT * From tb_kegiatan");
        return $q->result();
    }

    function tampil_kegiatanid($id_kegiatan){
        $q = $this->manualQuery("SELECT * FROM `tb_kegiatan` WHERE `tb_kegiatan`.`id_kegiatan` = '$id_kegiatan' ");
        return $q->result();
    }

    function berita_berdasarkankegiatan($id_kegiatan){
        $q = $this->manualQuery("SELECT * FROM `tb_kegiatan` join tb_berita on `tb_kegiatan`.`id_kegiatan` = `tb_berita`.`id_kegiatan` WHERE `tb_berita`.`id_kegiatan` = '$id_kegiatan' ");
        return $q->result();
    }

    function berita_id($id_berita){
        $q = $this->manualQuery("SELECT * FROM `tb_kegiatan` join tb_berita on `tb_kegiatan`.`id_kegiatan` = `tb_berita`.`id_kegiatan` WHERE `tb_berita`.`id_berita` = '$id_berita' ");
        return $q->result();
    }


    function update_berita($where,$data,$table, $id_berita){
        $username= $this->session->userdata('username');
        $this->db->Select(['*']);
        $this->db->from('tb_berita');
        $this->db->join('tb_kegiatan', 'tb_kegiatan.id_kegiatan = tb_berita.id_kegiatan');
        $this->db->where('tb_berita.id_berita', $id_berita);
        // $this->db->update($table, $data);
        
        if($this->db->update('tb_berita', $data)){
            return true;
        }else{
            print_r($this->db->error());
        }
        exit();
    }   


    public function hapus_beritaid($id){
        return $this->db->delete($this->_table, array("id_berita" => $id));
    }

    public function berita_user(){
        $q = $this->manualQuery("SELECT * From tb_berita join tb_kegiatan on tb_kegiatan.id_kegiatan = tb_berita.id_kegiatan group by tb_berita.id_kegiatan");
        return $q->result();
    }


    function struktur_detail($id_struktur){
        $q = $this->manualQuery("SELECT * FROM `tb_struktur` join users on `users`.`username` = `tb_struktur`.`username` WHERE `tb_struktur`.`id_struktur` = '$id_struktur' ");
        return $q->result();
    }

    public function status_anggota(){
        $q = $this->manualQuery("SELECT * From tb_struktur join users on tb_struktur.username = users.username where tb_struktur.jabatan='Anggota'");
        return $q->result();
    }

    public function visiaja(){
        $q = $this->manualQuery("SELECT isi_visi From tb_visimisi group by id_visimisi");
        return $q->result();
    }

    public function misiaja(){
        $q = $this->manualQuery("SELECT isi_misi From tb_visimisi group by id_visimisi");
        return $q->result();
    }

    function goupby_kegiatanberita($id_kegiatan){
        $q = $this->manualQuery("SELECT * FROM `tb_berita` join tb_kegiatan on `tb_kegiatan`.`id_kegiatan` = `tb_berita`.`id_kegiatan` WHERE `tb_berita`.`id_kegiatan` = '$id_kegiatan' group by tb_berita.id_kegiatan = '$id_kegiatan' ");
        return $q->result();
    }
    
    function galeriid($id_kegiatan){
        $q = $this->manualQuery("SELECT * FROM `tb_berita` join tb_kegiatan on `tb_kegiatan`.`id_kegiatan` = `tb_berita`.`id_kegiatan` WHERE `tb_berita`.`id_kegiatan` = '$id_kegiatan'  ");
        return $q->result();
    }
    
    public function hapus_sejarah($id){
        return $this->db->delete($this->_table2, array("id_sejarah" => $id));
    }
    
     public function edit_kategorikegiatan($id_kegiatan){
        $data = array(
            'id_kegiatan' => $this->input->post('id_kegiatan'),
            'kategori_kegiatan' => $this->input->post('kategori_kegiatan')
        );
        $this->db->where('id_kegiatan',$id_kegiatan);
        return $this->db->update('tb_kegiatan',$data);
    }
    
    public function strukturinti(){
        $q = $this->manualQuery("SELECT * From tb_struktur join users on tb_struktur.username = users.username where tb_struktur.jabatan !='Anggota'");
        return $q->result();
    }
    
     public function hapus_struktur($id){
        return $this->db->delete($this->_table3, array("id_struktur" => $id));
    }
    
    public function hapus_vm($id){
        return $this->db->delete($this->_table4, array("id_visimisi" => $id));
    }
    
    public function recentpost(){
        $q = $this->manualQuery("SELECT * From tb_berita where id_berita order by id_berita DESC limit 3");
        return $q->result();
    }


    public function tampil_berita(){
        $q = $this->manualQuery("SELECT * FROM `tb_berita` join tb_kegiatan on `tb_kegiatan`.`id_kegiatan` = `tb_berita`.`id_kegiatan` where tb_berita.id_berita order by id_berita DESC limit 3");
        return $q->result();
    }
    
    public function aset(){
        $q = $this->manualQuery("SELECT * From tb_aset");
        return $q->result();
    }
    
    public function edit_aset($id_aset){
        $data = array(
            'nm_aset' => $this->input->post('nm_aset'),
            'jml_aset' => $this->input->post('jml_aset'),
            'harga_beli' => $this->input->post('harga_beli'),
            'harga_jual' => $this->input->post('harga_jual'),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->db->where('id_aset',$id_aset);
        return $this->db->update('tb_aset',$data);
    }
    
    public function hapus_aset($id){
        return $this->db->delete($this->_table5, array("id_aset" => $id));
    }
    
   public function berita_lengkap($id_berita){
        $q = $this->manualQuery("SELECT * FROM `tb_berita` join tb_kegiatan on `tb_kegiatan`.`id_kegiatan` = `tb_berita`.`id_kegiatan` WHERE `tb_berita`.`id_berita` = '$id_berita' ");
        return $q->result();
    }

    public function hapus_uangmasuk($id){
        return $this->db->delete($this->_table6, array("id_keuangan" => $id));
    }

    function ubah_keuangan($where,$data,$table, $id_keuangan){
        $this->db->Select(['*','keuangan.id_keuangan']);
        $this->db->from('keuangan');
        $this->db->where('keuangan.id_keuangan', $id_keuangan);
        if($this->db->UPDATE('keuangan', $data)){
            return true;
        }else{
            print_r($this->db->error());
        }
        exit();
    }  







}