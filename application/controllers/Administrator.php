<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Administrator extends CI_Controller
{
    function index()
    {
        if (isset($_POST['submit'])) {
            $username = $this->input->post('username');
            $password = sha1($this->input->post('password'));
            $cek = $this->Model_app->cek_login($username, $password, 'users');
            $row = $cek->row_array();
            $total = $cek->num_rows();
            if ($total > 0) {
                $this->session->set_userdata('upload_image_file_manager', true);
                $this->session->set_userdata(array(
                    'username' => $row['username'],
                    'level' => $row['level'],
                    'id_session' => $row['id_session']
                ));

                redirect($this->uri->segment(1) . '/home');
            } else {
                $data['title'] = 'Username atau Password salah!';
                $this->load->view('Administrator/view_login', $data);
            }
        } else {
            $data['title'] = 'Administrator &rsaquo; Log In';
            $this->load->view('Administrator/view_login', $data);
        }
    }

    function reset_password()
    {
        if (isset($_POST['submit'])) {
            $usr = $this->Model_app->edit('users', array('id_session' => $this->input->post('id_session')));
            if ($usr->num_rows() >= 1) {
                if ($this->input->post('a') == $this->input->post('b')) {
                    $data = array('password' => sha1($this->input->post('a')));
                    $where = array('id_session' => $this->input->post('id_session'));
                    $this->Model_app->update('users', $data, $where);

                    $row = $usr->row_array();
                    $this->session->set_userdata('upload_image_file_manager', true);
                    $this->session->set_userdata(array(
                        'username' => $row['username'],
                        'level' => $row['level'],
                        'id_session' => $row['id_session']
                    ));
                    redirect('Administrator/home');
                } else {
                    $data['title'] = 'Password Tidak sama!';
                    $this->load->view('Administrator/view_reset', $data);
                }
            } else {
                $data['title'] = 'Terjadi Kesalahan!';
                $this->load->view('Administrator/view_reset', $data);
            }
        } else {
            $this->session->set_userdata(array('id_session' => $this->uri->segment(3)));
            $data['title'] = 'Reset Password';
            $this->load->view('Administrator/view_reset', $data);
        }
    }

    function lupapassword()
    {
        if (isset($_POST['lupa'])) {
            $email = strip_tags($this->input->post('email'));
            $cekemail = $this->Model_app->edit('users', array('email' => $email))->num_rows();
            if ($cekemail <= 0) {
                $data['title'] = 'Alamat email tidak ditemukan';
                $this->load->view('Administrator/view_login', $data);
            } else {
                $iden = $this->Model_app->edit('identitas', array('id_identitas' => 1))->row_array();
                $usr = $this->Model_app->edit('users', array('email' => $email))->row_array();
                $this->load->library('email');

                $tgl = date("d-m-Y H:i:s");
                $subject      = 'Lupa Password ...';
                $message      = "<html><body>
                <table style='margin-left:25px'>
                <tr><td>Halo $usr[nama_lengkap],<br>
                Seseorang baru saja meminta untuk mengatur ulang kata sandi Anda di <span style='color:red'>$iden[url]</span>.<br>
                Klik di sini untuk mengganti kata sandi Anda.<br>
                Atau Anda dapat copas (Copy Paste) url dibawah ini ke address Bar Browser anda :<br>
                <a href='" . base_url() . "Administrator/reset_password/$usr[id_session]'>" . base_url() . "Administrator/reset_password/$usr[id_session]</a><br><br>

                Tidak meminta penggantian ini?<br>
                Jika Anda tidak meminta kata sandi baru, segera beri tahu kami.<br>
                Email. $iden[email], No Telp. $iden[no_telp]</td></tr>
                </table>
                </body></html> \n";

                $this->email->from($iden['email'], $iden['nama_website']);
                $this->email->to($usr['email']);
                $this->email->cc('');
                $this->email->bcc('');

                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->set_mailtype("html");
                $this->email->send();

                $config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);

                $data['title'] = 'Password terkirim ke ' . $usr['email'];
                $this->load->view('Administrator/view_login', $data);
            }
        } else {
            $data['title'] = 'Reset Password Administrator';
            $this->load->view('Administrator/lupa_password', $data);
        }
    }

    function home()
    {
        $this->cek_admin();
        $data['title'] = 'Dasboard';
        if ($this->session->level == 'admin') {
            $this->template->load('Administrator/template', 'Administrator/view_home', $data);
        } else {
            $data['users'] = $this->Model_app->view_where('users', array('username' => $this->session->username))->row_array();
            $data['modul'] = $this->Model_app->view_join_one('users', 'users_modul', 'id_session', 'id_umod', 'DESC');
            $this->template->load('Administrator/template', 'Administrator/view_home', $data);
        }
    }

    function identitaswebsite()
    {
        $this->cek_admin();
        if (isset($_POST['submit'])) {
            $config['upload_path'] = 'assets/images/';
            $config['allowed_types'] = 'gif|jpg|png|ico';
            $config['max_size'] = '500'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('j');
            $hasil = $this->upload->data();

            if ($hasil['file_name'] == '') {
                $data = array(
                    'nama_website' => $this->db->escape_str($this->input->post('a')),
                    'email' => $this->db->escape_str($this->input->post('b')),
                    'url' => $this->db->escape_str($this->input->post('c')),
                    'facebook' => $this->input->post('d'),
                    'twitter' => $this->input->post('d1'),
                    'instagram' => $this->input->post('d2'),
                    'google' => $this->input->post('d3'),
                    'youtube' => $this->input->post('d4'),
                    'alamat' => $this->db->escape_str($this->input->post('e')),
                    'no_telp' => $this->db->escape_str($this->input->post('f')),
                    'meta_deskripsi' => $this->input->post('g'),
                    'meta_keyword' => $this->db->escape_str($this->input->post('h')),
                    'maps' => $this->input->post('i')
                );
            } else {
                $data = array(
                    'nama_website' => $this->db->escape_str($this->input->post('a')),
                    'email' => $this->db->escape_str($this->input->post('b')),
                    'url' => $this->db->escape_str($this->input->post('c')),
                    'facebook' => $this->input->post('d'),
                    'twitter' => $this->input->post('d1'),
                    'instagram' => $this->input->post('d2'),
                    'google' => $this->input->post('d3'),
                    'youtube' => $this->input->post('d4'),
                    'alamat' => $this->db->escape_str($this->input->post('e')),
                    'no_telp' => $this->db->escape_str($this->input->post('f')),
                    'meta_deskripsi' => $this->input->post('g'),
                    'meta_keyword' => $this->db->escape_str($this->input->post('h')),
                    'favicon' => $hasil['file_name'],
                    'maps' => $this->input->post('i')
                );
            }
            $where = array('id_identitas' => $this->input->post('id'));
            $this->Model_app->update('identitas', $data, $where);

            redirect($this->uri->segment(1) . '/identitaswebsite');
        } else {
            $proses = $this->Model_app->edit('identitas', array('id_identitas' => 1))->row_array();
            $data = array('record' => $proses);
            $data['title'] = 'Identitas Website';
            $this->template->load('Administrator/template', 'Administrator/mod_identitas/view_identitas', $data);
        }
    }

    // Controller Modul User

    function manajemenuser()
    {
        $this->cek_admin();
        $data['title'] = 'Data User';
        $data['record'] = $this->Model_app->view_ordering('users', 'username', 'DESC');
        $this->template->load('Administrator/template', 'Administrator/mod_users/view_users', $data);
    }

    function tambah_manajemenuser()
    {
        $this->cek_admin();
        $data['title'] = 'Tambah Data User';
        $id = $this->session->username;
        if (isset($_POST['submit'])) {
            $config['upload_path'] = 'assets/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('f');
            $hasil = $this->upload->data();
            if ($hasil['file_name'] == '') {
                $data = array(
                    'username' => $this->db->escape_str($this->input->post('a')),
                    'password' => sha1($this->input->post('b')),
                    'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
                    'email' => $this->db->escape_str($this->input->post('d')),
                    'no_telp' => $this->db->escape_str($this->input->post('e')),
                    'jk' => $this->db->escape_str($this->input->post('jk')),
                    'alamat' => $this->db->escape_str($this->input->post('alamat')),
                    'level' => $this->db->escape_str($this->input->post('g')),
                    'blokir' => 'N',
                    'id_session' => md5($this->input->post('a')) . '-' . date('YmdHis')
                );
            } else {
                $data = array(
                    'username' => $this->db->escape_str($this->input->post('a')),
                    'password' => sha1($this->input->post('b')),
                    'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
                    'email' => $this->db->escape_str($this->input->post('d')),
                    'no_telp' => $this->db->escape_str($this->input->post('e')),
                    'jk' => $this->db->escape_str($this->input->post('jk')),
                    'alamat' => $this->db->escape_str($this->input->post('alamat')),
                    'foto' => $hasil['file_name'],
                    'level' => $this->db->escape_str($this->input->post('g')),
                    'blokir' => 'N',
                    'id_session' => md5($this->input->post('a')) . '-' . date('YmdHis')
                );
            }
            $this->Model_app->insert('users', $data);

            $mod = count($this->input->post('modul'));
            $modul = $this->input->post('modul');
            $sess = md5($this->input->post('a')) . '-' . date('YmdHis');
            for ($i = 0; $i < $mod; $i++) {
                $datam = array(
                    'id_session' => $sess,
                    'id_modul' => $modul[$i]
                );
                $this->Model_app->insert('users_modul', $datam);
            }
            $this->session->set_flashdata('manajemenuser','<div class="alert alert-success alert-sm" role="alert"> Profil Anggota berhasil di tambahkan !</div>');
            redirect($this->uri->segment(1) . '/manajemenuser/' . $this->input->post('a'));
        } else {
            $proses = $this->Model_app->view_where_ordering('modul', array('publish' => 'Y', 'level' => 'user'), 'id_modul', 'DESC');
            $data = array('record' => $proses);
            $this->template->load('Administrator/template', 'Administrator/mod_users/view_users_tambah', $data);
        }
    }

    function edit_manajemenuser()
    {
        $this->cek_admin();
        $data['title'] = 'Edit Data User';
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])) {
            $config['upload_path'] = 'assets/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('f');
            $hasil = $this->upload->data();
            if ($hasil['file_name'] == '' and $this->input->post('b') == '') {
                $data = array(
                    'username' => $this->db->escape_str($this->input->post('a')),
                    'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
                    'email' => $this->db->escape_str($this->input->post('d')),
                    'no_telp' => $this->db->escape_str($this->input->post('e')),
                    'jk' => $this->db->escape_str($this->input->post('jk')),
                    'alamat' => $this->db->escape_str($this->input->post('alamat')),
                    'blokir' => $this->db->escape_str($this->input->post('h'))
                );
            } elseif ($hasil['file_name'] != '' and $this->input->post('b') == '') {
                $data = array(
                    'username' => $this->db->escape_str($this->input->post('a')),
                    'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
                    'email' => $this->db->escape_str($this->input->post('d')),
                    'jk' => $this->db->escape_str($this->input->post('jk')),
                    'alamat' => $this->db->escape_str($this->input->post('alamat')),
                    'no_telp' => $this->db->escape_str($this->input->post('e')),
                    'jk' => $this->db->escape_str($this->input->post('jk')),
                    'alamat' => $this->db->escape_str($this->input->post('alamat')),
                    'foto' => $hasil['file_name'],
                    'blokir' => $this->db->escape_str($this->input->post('h'))
                );
            } elseif ($hasil['file_name'] == '' and $this->input->post('b') != '') {
                $data = array(
                    'username' => $this->db->escape_str($this->input->post('a')),
                    'password' => sha1($this->input->post('b')),
                    'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
                    'email' => $this->db->escape_str($this->input->post('d')),
                    'no_telp' => $this->db->escape_str($this->input->post('e')),
                    'jk' => $this->db->escape_str($this->input->post('jk')),
                    'alamat' => $this->db->escape_str($this->input->post('alamat')),
                    'blokir' => $this->db->escape_str($this->input->post('h'))
                );
            } elseif ($hasil['file_name'] != '' and $this->input->post('b') != '') {
                $data = array(
                    'username' => $this->db->escape_str($this->input->post('a')),
                    'password' => sha1($this->input->post('b')),
                    'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
                    'email' => $this->db->escape_str($this->input->post('d')),
                    'no_telp' => $this->db->escape_str($this->input->post('e')),
                    'jk' => $this->db->escape_str($this->input->post('jk')),
                    'alamat' => $this->db->escape_str($this->input->post('alamat')),
                    'foto' => $hasil['file_name'],
                    'blokir' => $this->db->escape_str($this->input->post('h'))
                );
            }
            $where = array('username' => $this->input->post('id'));
            $this->Model_app->update('users', $data, $where);

            $mod = count($this->input->post('modul'));
            $modul = $this->input->post('modul');
            for ($i = 0; $i < $mod; $i++) {
                $datam = array(
                    'id_session' => $this->input->post('ids'),
                    'id_modul' => $modul[$i]
                );
                $this->Model_app->insert('users_modul', $datam);
            }
            $this->session->set_flashdata('manajemenuser','<div class="alert alert-success alert-sm" role="alert"> Profil Anggota berhasil di Ubah !</div>');
            redirect($this->uri->segment(1) . '/manajemenuser/' . $this->input->post('id'));
        } else {
            if ($this->session->username == $this->uri->segment(3) or $this->session->level == 'admin') {
                $proses = $this->Model_app->edit('users', array('username' => $id))->row_array();
                $akses = $this->Model_app->view_join_where('users_modul', 'modul', 'id_modul', array('id_session' => $proses['id_session']), 'id_umod', 'DESC');
                $modul = $this->Model_app->view_where_ordering('modul', array('publish' => 'Y', 'level' => 'user'), 'id_modul', 'DESC');
                $data = array('rows' => $proses, 'record' => $modul, 'akses' => $akses);
                $this->template->load('Administrator/template', 'Administrator/mod_users/view_users_edit', $data);
            } else {
                redirect($this->uri->segment(1) . '/manajemenuser/' . $this->session->username);
            }
        }
    }

    function delete_manajemenuser()
    {
        $this->cek_admin();
        $id = array('username' => $this->uri->segment(3));
        $this->Model_app->delete('users', $id);

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">  Data Berhasil di Hapus</div>');
        redirect($this->uri->segment(1) . '/manajemenuser');
    }

    function delete_akses()
    {
        $this->cek_admin();
        $id = array('id_umod' => $this->uri->segment(3));
        $this->Model_app->delete('users_modul', $id);
        redirect($this->uri->segment(1) . '/edit_manajemenuser/' . $this->uri->segment(4));
    }

    // Controller Modul Modul

    function manajemenmodul()
    {
        $this->cek_admin();
        $data['title'] = 'Data Modul';
        if ($this->session->level == 'admin') {
            $data['record'] = $this->Model_app->view_ordering('modul', 'id_modul', 'DESC');
        } else {
            $data['record'] = $this->Model_app->view_where_ordering('modul', array('level' => $this->session->level), 'id_modul', 'DESC');
        }
        $this->template->load('Administrator/template', 'Administrator/mod_modul/view_modul', $data);
    }

    function tambah_manajemenmodul()
    {
        $this->cek_admin();
        $data['title'] = 'Tambah Modul';
        if (isset($_POST['submit'])) {
            $data = array(
                'nama_modul' => $this->db->escape_str($this->input->post('a')),
                'level' => $this->db->escape_str($this->input->post('level')),
                'link' => $this->db->escape_str($this->input->post('b')),
                'publish' => $this->db->escape_str($this->input->post('c')),
                'aktif' => $this->db->escape_str($this->input->post('d')),
            );
            $this->Model_app->insert('modul', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success alert-sm" role="alert"> Manajemen Modul Berhasil di tambahkan !</div>');
            redirect($this->uri->segment(1) . '/manajemenmodul');
        } else {
            $this->template->load('Administrator/template', 'Administrator/mod_modul/view_modul_tambah');
        }
    }

    public function edit_manajemenmodul($id_modul){
        $where = array('id_modul' => $id_modul);
        $data['user'] = $this->db->get_where('users',['username' => 
            $this->session->userdata('username')])->row_array();               
        $data['data']= $this->Model_app->tampil_edit($where,'modul')->result();
        $data['title'] = 'Edit Modul';
        $this->template->load('Administrator/template', 'Administrator/mod_modul/view_modul_edit', $data);
    }


    public function update_modul(){
        $id_modul          =$this->input->post('id_modul');
        $nama_modul        =$this->input->post('nama_modul');
        $level             =$this->input->post('level');
        $link              =$this->input->post('link');
        $publish           =$this->input->post('publish');
        $aktif             =$this->input->post('aktif'); 
        $data= array(
            'id_modul'     => $id_modul,
            'nama_modul'   =>$nama_modul,
            'level'        =>$level,
            'link'         =>$link,
            'publish'      =>$publish,
            'aktif'        =>$aktif
        );

        $where = array(
            'id_modul' => $id_modul
        );

        if($this->Model_app->update_datamodul($where,$data,'modul', $id_modul)){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">  Data Berhasil di Update</div>');
            redirect(base_url('Administrator/manajemenmodul'),'refresh');        
        }

    }


    function delete_manajemenmodul()
    {
        $this->cek_admin();
        if ($this->session->level == 'admin') {
            $id = array('id_modul' => $this->uri->segment(3));
        } else {
            $id = array('id_modul' => $this->uri->segment(3), 'username' => $this->session->username);
        }
        $this->Model_app->delete('modul', $id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">  Data Berhasil di Hapus</div>');
        redirect($this->uri->segment(1) . '/manajemenmodul');
    }

    // Controller Modul Keuangan

    function manajemenkeuangan()
    {
        $this->cek_admin();
        $data['title'] = 'Manajemen Keuangan';
        $data['masuk'] = $this->db->query("SELECT * FROM keuangan WHERE status='Masuk' ORDER BY id_keuangan DESC")->result_array();
        $data['keluar'] = $this->db->query("SELECT * FROM keuangan WHERE status='Keluar' ORDER BY id_keuangan DESC")->result_array();
        $this->template->load('Administrator/template', 'Administrator/mod_keuangan/view_keuangan', $data);
    }

    function tambah_keuangan()
    {
        $this->cek_admin();
        $data['title'] = 'Tambah Manajemen Keuangan';
        if (isset($_POST['submit'])) {
            $data = array(
                'username' => $this->session->username,
                'status' => $this->db->escape_str($this->input->post('status')),
                'tgl' => $this->db->escape_str($this->input->post('tgl')),
                'tujuan' => $this->db->escape_str($this->input->post('tujuan')),
                'jumlah' => $this->db->escape_str($this->input->post('jumlah'))
            );
            $this->Model_app->insert('keuangan', $data);
            redirect($this->uri->segment(1) . '/manajemenkeuangan');
        } else {
            $this->template->load('Administrator/template', 'Administrator/mod_keuangan/view_keuangan_tambah', $data);
        }
    }

    function edit_keuangan()
    {
        $this->cek_admin();
        $data['title'] = 'Edit Manajemen Keuangan';
        if (isset($_POST['submit'])) {
            $data = array(
                'username' => $this->session->username,
                'status' => $this->db->escape_str($this->input->post('status')),
                'tgl' => $this->db->escape_str($this->input->post('tgl')),
                'tujuan' => $this->db->escape_str($this->input->post('tujuan')),
                'jumlah' => $this->db->escape_str($this->input->post('jumlah'))
            );
            $where = array('id_keuangan' => $this->input->post('id'));
            $this->Model_app->update('keuangan', $data, $where);
            redirect($this->uri->segment(1) . '/manajemenkeuangan');
        } else {
            $id = $this->uri->segment(3);
            if ($this->session->level == 'admin') {
                $proses = $this->Model_app->edit('keuangan', array('id_keuangan' => $id))->row_array();
            } else {
                $proses = $this->Model_app->edit('keuangan', array('id_keuangan' => $id, 'username' => $this->session->username))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('Administrator/template', 'Administrator/mod_keuangan/view_keuangan_edit', $data);
        }
    }

    function delete_keuangan()
    {
        $this->cek_admin();
        if ($this->session->level == 'admin') {
            $id = array('id_keuangan' => $this->uri->segment(3));
        } else {
            $id = array('id_keuangan' => $this->uri->segment(3), 'username' => $this->session->username);
        }
        $this->Model_app->delete('keuangan', $id);
        redirect($this->uri->segment(1) . '/manajemenkeuangan');
    }

    // Controller Modul Laporan

    function laporan()
    {
        $this->cek_admin();
        $data['title'] = 'Laporan Keuangan';
        $this->template->load('Administrator/template', 'Administrator/mod_laporan/view_laporan', $data);
    }

    function tampil_data()
    {
        $vtanggal = $this->input->post('vtanggal');
        $data['tampil_data'] = $this->Model_app->tampil_data($vtanggal);
        $data['tampil_data1'] = $this->Model_app->tampil_data1($vtanggal);
        $this->load->view('Administrator/mod_laporan/tampil_data', $data);
    }

    function cetak_laporan()
    {
        $data['title'] = 'Cetak Laporan Keuangan';
        $vtanggal = $this->input->post('vtanggal');
        $data['tampil_data'] = $this->Model_app->tampil_data($vtanggal);
        $data['tampil_data1'] = $this->Model_app->tampil_data1($vtanggal);
        $this->load->view('Administrator/mod_laporan/cetak_laporan', $data);
    }

    function cek_admin()
    {
        if (!$this->session->userdata('level')) {
            redirect('Administrator/index');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('Administrator');
    }

    public function profil(){
        $data['title'] = 'Profil';      
        $data['username'] = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array();
        $data['data']= $this->Model_app->data_orangyanglogin();       
        $this->template->load('Administrator/template', 'Administrator/profil', $data);

    }

    public function update_profil(){
        $data['title'] = 'Update Profil';       
        $data['user'] = $this->db->get_where('users',['username' => 
            $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required|trim');
        $this->form_validation->set_rules('jk', 'JK', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        if ($this->form_validation->run()== false) {
            $this->template->load('Administrator/template', 'Administrator/update_profil', $data);

        } else{
            $nama_lengkap = $this->input->post('nama_lengkap');
            $email = $this->input->post('email');
            $no_telp = $this->input->post('no_telp');
            $jk = $this->input->post('jk');
            $alamat = $this->input->post('alamat');    
            $username = $this->input->post('username');

            //cek jika ada gambar yang akan di upload
            $upload_foto = $_FILES['foto'];

            if($upload_foto){

                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '10048';
                $config['upload_path'] = './assets/foto_user/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_foto = $data['user']['foto'];
                    if ($old_foto != 'avatar.png') {
                        unlink(FCPATH . '/assets/foto_user/' . $old_foto);
                    } 
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                }else{
                }
            }
            $this->db->set('nama_lengkap', $nama_lengkap);
            $this->db->set('email', $email);
            $this->db->set('no_telp', $no_telp);
            $this->db->set('jk', $jk);
            $this->db->set('alamat', $alamat);
            $this->db->set('username', $username);
            $this->db->where('username', $username);

            //boleh pakai model jika tidak juga idak apa-apa.
            $this->db->UPDATE('users');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Profile Anda Berhasil Di Perbaharui !</div>');
            redirect('Administrator/profil');

        }
    }


    // Sejarah Organisasi
    public function sejarah(){
        if($this->session->userdata('username') == 'admin'){
            $data['title'] = 'Sejarah';       
            $data['user'] = $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array();  
            $data['sejarah']= $this->Model_app->sejarah();
            $this->template->load('Administrator/template', 'Administrator/sejarah', $data);
        }
        else{
            redirect('Home');
        }
    }

    public function add_sejarah(){
        $judul_sejarah = $this->input->post('judul_sejarah');
        $isi_sejarah = $this->input->post('isi_sejarah');
        $gambar_sejarah    =$_FILES['gambar_sejarah']['name'];
        if ($gambar_sejarah = '') {} else{
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path']   = './assets/images/';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar_sejarah')) {
                echo "Image uploaded!";
            }else{
                $gambar_sejarah=$this->upload->data('file_name');
            }
        }
        $data= array(
            'judul_sejarah'  => $judul_sejarah,
            'isi_sejarah'    => $isi_sejarah,
            'gambar_sejarah' =>$gambar_sejarah
        );
        // ini error
        $this->Model_app->tambah_data($data,'tb_sejarah');
        $this->session->set_flashdata('sejarah', '<div class="alert alert-sm alert-success" role="alert">Data Sejarah berhasil ditambah</div>');
        redirect('Administrator/sejarah');
    }

    public function edit_sejarah($id_sejarah){
        $where = array('id_sejarah' => $id_sejarah);
        $data['user'] = $this->db->get_where('users',['username' => 
            $this->session->userdata('username')])->row_array();                
        $data['edit_sejarah']= $this->Model_app->tampil_edit($where,'tb_sejarah')->result();
        $data['title'] = 'Edit Sejarah';
        $this->template->load('Administrator/template', 'Administrator/edit_sejarah', $data);
    }


    public function update_sejarah(){
        $id_sejarah            =$this->input->post('id_sejarah');
        $judul_sejarah       =$this->input->post('judul_sejarah');
        $isi_sejarah         =$this->input->post('isi_sejarah');
        //cek jika ada gambar yang akan di upload
        $upload_foto = $_FILES['gambar_sejarah'];
        if($upload_foto){

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/images/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_sejarah')) {

                $new_foto = $this->upload->data('file_name');
                $this->db->set('gambar_sejarah', $new_foto);
            }else{
                // echo $this->upload->display_errors();
            }
        }
        $data= array(
            'id_sejarah' => $id_sejarah,
            'judul_sejarah' =>$judul_sejarah,
            'isi_sejarah' =>$isi_sejarah
        );

        $where = array(
            'id_sejarah' => $id_sejarah
        );

        if($this->Model_app->ubah_sejarah($where,$data,'tb_sejarah', $id_sejarah)){
            $this->session->set_flashdata('sejarah', '<div class="alert alert-sm alert-success" role="alert"> Data Sejarah Berhasil di Ubah</div>');
            redirect(base_url('Administrator/sejarah'),'refresh');        
        }

    }

     // visi misi Organisasi
    public function visi_misi(){
        if($this->session->userdata('level') == 'admin'){
            $data['title'] = 'Visi - Misi';       
            $data['user'] = $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array();  
            $data['vm']= $this->Model_app->visi_misi();
            $this->template->load('Administrator/template', 'Administrator/visi_misi', $data);
        }
        else{
            redirect('User');
        }
    }

    public function add_visimisi(){
        $isi_visi = $this->input->post('isi_visi');        
        $isi_misi = $this->input->post('isi_misi');

        $data= array(
            'isi_visi' => $isi_visi,
            'isi_misi' => $isi_misi,
        );
        // ini error
        $this->Model_app->tambah_data($data,'tb_visimisi');
        $this->session->set_flashdata('visimisi', '<div class="alert alert-sm alert-success" role="alert">Visi Misi berhasil ditambah</div>');
        redirect('Administrator/visi_misi');
    }

    public function edit_visimisi($id_visimisi){
        $data = $this->Model_app->edit_visimisi($id_visimisi);
        $this->session->set_flashdata('visimisi', '<div class="alert alert-sm alert-success" role="alert">Data Berhasil di ubah</div>');
        redirect('Administrator/visi_misi');
    }

     // struktur Organisasi
    public function struktur(){
        if($this->session->userdata('username') == 'admin'){
            $data['title'] = 'Struktur Organisasi';       
            $data['user'] = $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array();  
            $data['struktur']= $this->Model_app->struktur();            
            $data['dataorang']= $this->Model_app->data_tabeluser();
            $this->template->load('Administrator/template', 'Administrator/struktur', $data);
        }
        else{
            redirect('Home');
        }
    }


    public function add_struktur(){
        $username = $this->input->post('username');        
        $jabatan = $this->input->post('jabatan');

        $data= array(
            'username' => $username,
            'jabatan' => $jabatan,
        );
        // ini error
        $this->Model_app->tambah_data($data,'tb_struktur');
        $this->session->set_flashdata('struktur', '<div class="alert alert-sm alert-success" role="alert">Struktur Organisasi berhasil ditambah</div>');
        redirect('Administrator/struktur');
    }


    public function edit_struktur($id_struktur){
        $where = array('id_struktur' => $id_struktur);
        $data['user'] = $this->db->get_where('users',['username' => 
            $this->session->userdata('username')])->row_array();               
        $data['struktur']= $this->Model_app->tampil_edit($where,'tb_struktur')->result();
        $data['dataorang']= $this->Model_app->data_tabeluser(); 
        $data['title'] = 'Edit Struktur';
        $this->template->load('Administrator/template', 'Administrator/edit_struktur', $data);
    }

    public function update_struktur(){
        $id_struktur        =$this->input->post('id_struktur');
        $username         =$this->input->post('username');
        $jabatan =$this->input->post('jabatan');

        $data= array(
            'id_struktur' => $id_struktur,
            'username'   =>$username,
            'jabatan' =>$jabatan
        );

        $where = array(
            'id_struktur' => $id_struktur
        );

        if($this->Model_app->update_struktur($where,$data,'tb_struktur', $id_struktur)){
            $this->session->set_flashdata('struktur', '<div class="alert alert-success" role="alert">  Data Struktur Berhasil di Update</div>');
            redirect(base_url('Administrator/struktur'),'refresh');        
        }

    }


    //kegiatan organisasi
    public function kegiatan(){
        if($this->session->userdata('username') == 'admin'){
            $data['title'] = 'Kategori Kegiatan';       
            $data['user'] = $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array();  
            $data['kegiatan']= $this->Model_app->kegiatan();
            $this->template->load('Administrator/template', 'Administrator/kegiatan', $data);
        }
        else{
            redirect('Home');
        }
    }

    public function add_kategorikegiatan(){
        $kategori_kegiatan = $this->input->post('kategori_kegiatan');
        
        $data= array(
            'kategori_kegiatan'  => $kategori_kegiatan,
        );
        // ini error
        $this->Model_app->tambah_data($data,'tb_kegiatan');
        $this->session->set_flashdata('kegiatan', '<div class="alert alert-sm alert-success" role="alert">Data Sejarah berhasil ditambah</div>');
        redirect('Administrator/kegiatan');
    }

    //berita

    public function add_berita($id_kegiatan){
        $data['title'] = 'Berita';
        $data['data']= $this->Model_app->tampil_kegiatanid($id_kegiatan);
        $data['user'] = $this->db->get_where('users',['username' => 
            $this->session->userdata('username')])->row_array();
        $this->template->load('Administrator/template', 'Administrator/add_berita', $data);
    }

    public function tambahkan_berita(){
        $id_kegiatan = $this->input->post('id_kegiatan');
        $judul_berita = $this->input->post('judul_berita');
        $isi_berita = $this->input->post('isi_berita');
        $gambar_berita    =$_FILES['gambar_berita']['name'];
        if ($gambar_berita = '') {} else{
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path']   = './assets/berita/';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar_berita')) {

            }else{
                $gambar_berita=$this->upload->data('file_name');
            }
        }
        $data= array(
            'id_kegiatan'     => $id_kegiatan,
            'judul_berita'    => $judul_berita,
            'isi_berita'      => $isi_berita,
            'gambar_berita'   => $gambar_berita
        );
        // ini error
        $this->Model_app->tambah_data($data,'tb_berita');
        $this->session->set_flashdata('berita', '<div class="alert alert-sm alert-success" role="alert">Berita berhasil ditambah</div>');
        redirect('Administrator/kegiatan');
    }

    public function detail_berita($id_kegiatan){
        $data['title'] = 'Kumpulan Berita';
        $data['data']= $this->Model_app->berita_berdasarkankegiatan($id_kegiatan);
        $data['user'] = $this->db->get_where('users',['username' => 
            $this->session->userdata('username')])->row_array();
        $this->template->load('Administrator/template', 'Administrator/berita_berdasarkankegiatan', $data);
    }

    public function edit_beritaid($id_berita){
        $data['title'] = 'Edit Berita';
        $data['kegiatan']= $this->Model_app->kegiatan();
        $data['beritaid']= $this->Model_app->berita_id($id_berita);
        $data['user'] = $this->db->get_where('users',['username' => 
            $this->session->userdata('berita')])->row_array();
        $this->template->load('Administrator/template', 'Administrator/edit_beritaid', $data);
    }

    public function update_beritaid(){
        $id_berita        =$this->input->post('id_berita');
        $id_kegiatan     =$this->input->post('id_kegiatan');
        $judul_berita     =$this->input->post('judul_berita');
        $isi_berita      =$this->input->post('isi_berita');
        //cek jika ada gambar yang akan di upload
        $upload_foto = $_FILES['gambar_berita'];
        if($upload_foto){

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/berita/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_berita')) {

                $new_foto = $this->upload->data('file_name');
                $this->db->set('gambar_berita', $new_foto);
            }else{
                // echo $this->upload->display_errors();
            }
        }

        $data= array(
            'id_berita'     => $id_berita,
            'judul_berita'  =>$judul_berita,
            'id_kegiatan'   =>$id_kegiatan,
            'isi_berita'    =>$isi_berita
        );

        $where = array(
            'id_berita' => $id_berita
        );

        if($this->Model_app->update_berita($where,$data,'tb_berita', $id_berita)){
            $this->session->set_flashdata('berita', '<div class="alert alert-success" role="alert">  Data Berhasil di Update</div>');
            redirect(base_url('Administrator/kegiatan'),'refresh');        
        }

    }


    public function hapus_beritaid($id=null){
        if (!isset($id)) show_404();
        if ($this->Model_app->hapus_beritaid($id)) {
            $this->session->set_flashdata('berita', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
            redirect(site_url('Administrator/kegiatan'));

        }
    }


    ////INI TAMPILAN UNTUK DI SISI USER YANG LOGIN
    function keuangan()
    {
        $data['title'] = 'Keuangan Organisasi';
        $data['masuk'] = $this->db->query("SELECT * FROM keuangan WHERE status='Masuk' ORDER BY id_keuangan DESC")->result_array();
        $data['keluar'] = $this->db->query("SELECT * FROM keuangan WHERE status='Keluar' ORDER BY id_keuangan DESC")->result_array();
        $this->template->load('Administrator/template', 'Administrator/mod_users/keuangan', $data);
    }


    function laporanuser()
    {
        $data['title'] = 'Laporan Keuangan';
        $this->template->load('Administrator/template', 'Administrator/mod_users/laporan', $data);
    }
    
    public function hapus_sejarah($id=null){
        if (!isset($id)) show_404();
        if ($this->Model_app->hapus_sejarah($id)) {
            $this->session->set_flashdata('sejarah', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
            redirect(site_url('Administrator/sejarah'));

        }
    }
    
    public function edit_kategorikegiatan($id_kegiatan){
        $data = $this->Model_app->edit_kategorikegiatan($id_kegiatan);
        $this->session->set_flashdata('kegiatan', '<div class="alert alert-sm alert-success" role="alert">Data Berhasil di ubah</div>');
        redirect('Administrator/kegiatan');
    }
    
    public function hapus_struktur($id=null){
        if (!isset($id)) show_404();
        if ($this->Model_app->hapus_struktur($id)) {
            $this->session->set_flashdata('struktur', '<div class="alert alert-danger" role="alert">Data Struktur Berhasil Dihapus</div>');
            redirect(site_url('Administrator/struktur'));

        }
    }
    
    public function hapus_vm($id=null){
        if (!isset($id)) show_404();
        if ($this->Model_app->hapus_vm($id)) {
            $this->session->set_flashdata('visimisi', '<div class="alert alert-danger" role="alert">Data Visi Misi Berhasil Dihapus</div>');
            redirect(site_url('Administrator/visi_misi'));

        }
    }
    
     // Aset Organisasi
    public function aset(){
        if($this->session->userdata('level') == 'admin'){
            $data['title'] = 'Aset Organisasi';       
            $data['user'] = $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array();  
            $data['aset']= $this->Model_app->aset();
            $this->template->load('Administrator/template', 'Administrator/aset', $data);
        }
        else{
            redirect('User');
        }
    }
    
    public function add_aset(){
        $nm_aset=$this->input->post('nm_aset');        
        $jml_aset=$this->input->post('jml_aset');      
        $harga_beli=$this->input->post('harga_beli');      
        $harga_jual=$this->input->post('harga_jual');      
        $keterangan=$this->input->post('keterangan');

        $data= array(
            'nm_aset'=>$nm_aset,
            'jml_aset'=>$jml_aset,
            'harga_beli'=>$harga_beli,
            'harga_jual'=>$harga_jual,
            'keterangan'=>$keterangan,
        );
        // ini error
        $this->Model_app->tambah_data($data,'tb_aset');
        $this->session->set_flashdata('aset', '<div class="alert alert-sm alert-success" role="alert">Data Aset berhasil ditambah</div>');
        redirect('Administrator/aset');
    }
    
    public function edit_aset($id_aset){
        $data = $this->Model_app->edit_aset($id_aset);
        $this->session->set_flashdata('aset', '<div class="alert alert-sm alert-success" role="alert">Data Aset Berhasil di ubah</div>');
        redirect('Administrator/aset');
    }
    
    public function hapus_aset($id=null){
        if (!isset($id)) show_404();
        if ($this->Model_app->hapus_aset($id)) {
            $this->session->set_flashdata('aset', '<div class="alert alert-danger" role="alert">Data Aset Berhasil Dihapus</div>');
            redirect(site_url('Administrator/aset'));

        }
    }
    
    public function asetuser(){
        $data['title'] = 'Aset Organisasi';       
        $data['user'] = $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array();  
        $data['aset']= $this->Model_app->aset();
        $this->template->load('Administrator/template', 'Administrator/asetuser', $data);
    }

    public function hapus_uangmasuk($id=null){
        if (!isset($id)) show_404();
        if ($this->Model_app->hapus_uangmasuk($id)) {
            $this->session->set_flashdata('keuanganhapus', '<div class="alert alert-danger" role="alert">Data Keuangan Berhasil Dihapus</div>');
            redirect(site_url('Administrator/manajemenkeuangan'));

        }
    }

    public function edit_keuanganfix($id_keuangan){
        $where = array('id_keuangan' => $id_keuangan);
        $data['user'] = $this->db->get_where('users',['username' => 
            $this->session->userdata('username')])->row_array();                
        $data['edit_uangmasuk']= $this->Model_app->tampil_edit($where,'keuangan')->result();
        $data['title'] = 'Edit Keuangan';
        $this->template->load('Administrator/template', 'Administrator/edit_uangmasuk', $data);
    }

    public function update_keuangan(){
        $id_keuangan            =$this->input->post('id_keuangan');
        $username       =$this->input->post('username');
        $status         =$this->input->post('status');
        $tgl         =$this->input->post('tgl');
        $tujuan         =$this->input->post('tujuan');
        $jumlah         =$this->input->post('jumlah');
        //cek jika ada gambar yang akan di upload
        $upload_foto = $_FILES['gambar_struk'];
        if($upload_foto){

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_struk')) {

                $new_foto = $this->upload->data('file_name');
                $this->db->set('gambar_struk', $new_foto);
            }else{
                // echo $this->upload->display_errors();
            }
        }
        $data= array(
            'id_keuangan' => $id_keuangan,
            'username'    =>$username,
            'status'      =>$status,
            'tgl'         =>$tgl,
            'tujuan'      =>$tujuan,
            'jumlah'      =>$jumlah
        );

        $where = array(
            'id_keuangan' => $id_keuangan
        );

        if($this->Model_app->ubah_keuangan($where,$data,'keuangan', $id_keuangan)){
            $this->session->set_flashdata('keuangan', '<div class="alert alert-sm alert-success" role="alert"> Data Sejarah Berhasil di Ubah</div>');
            redirect(base_url('Administrator/manajemenkeuangan'),'refresh');        
        }

    }

     public function add_keuangan(){
        $data['user'] = $this->db->get_where('users',['username' => 
            $this->session->userdata('username')])->row_array();                
        $data['title'] = 'Tambah Keuangan';
        $this->template->load('Administrator/template', 'Administrator/add_keuangan', $data);
    }

    public function masukkan_keuangan(){
        $username =$this->session->userdata('username');
        $status = $this->input->post('status');
        $tgl = $this->input->post('tgl');
        $tujuan = $this->input->post('tujuan');
        $jumlah = $this->input->post('jumlah');
        $gambar_struk    =$_FILES['gambar_struk']['name'];
        if ($gambar_struk = '') {} else{
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path']   = './assets/img/';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar_struk')) {
                echo "Image uploaded!";
            }else{
                $gambar_struk=$this->upload->data('file_name');
            }
        }
        $data= array(
            'username'  => $username,
            'status'    => $status,
            'tgl'       => $tgl,
            'tujuan'    => $tujuan,
            'jumlah'    => $jumlah,
            'gambar_struk' =>$gambar_struk
        );
        // ini error
        $this->Model_app->tambah_data($data,'keuangan');
        $this->session->set_flashdata('keuangan', '<div class="alert alert-sm alert-success" role="alert">Data Keuangan berhasil ditambah</div>');
        redirect('Administrator/manajemenkeuangan');
    }
    






}

