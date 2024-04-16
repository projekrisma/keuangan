<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <div class="card bg-danger ">
        <div class="container">
            <h2 class="alert alert-primary text-center mt-3">Form Pendaftaran Anggota KTTH</h2>

            <from>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="" class="form-control" placeholder="Masukkan nama lengkap Anda">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="" class="form-control" placeholder="Masukkan email Anda">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="" class="form-control" placeholder="Masukkan password Anda">
                    <small>Password harus terdiri dari angka dan huruf minimal 6 karakter</small>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="TempatLahir">Tempat Lahir</label>
                            <input type="text" name="" class="form-control" placeholder="Masukkan tempat lahir Anda" id="TempatLahir">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <select class="form-control">
                        <option>1. Ketua</option>
                        <option>2. Sekretaris</option>
                        <option>3. Bendahara</option>
                        <option>4. Anggota</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Alasan Anda Bergabung Jadi Anggota</label>
                    <textarea class="form-control" rows='5'></textarea>
                </div>


                <div class="form-group">
                    <label>Jenis Kelamin</label><br>
                    <div class="form-check-inline">
                        <input type="radio" class"form-check-input" name="radio1" id="radio2">

                        <label>Laki-laki</label>
                    </div>
                    <div class="form-check-inline">
                        <input type="radio" class"form-check-input" name="radio1" id="radio2">

                        <label>Prempuan</label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Opload Foto Anda</label>
                    <input type="file" name="" class="form-control-file">
                    <small>Upload foto dengan ukuran maksimal 2Mb</small>
                </div>
                <button type="submit" class="btn btn-primary"> Simpan</button>
                <button type="reset" class="btn btn-danger"> Reset</button>


            </from>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>