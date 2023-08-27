<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
 <!-- Content Row -->
 <center><h2 class="h4 mb-4 text-gray-800">Jumlah Kejadian dari Kelas yang Muncul (VPD)</h2></center>
 <div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Jumlah Data Training</div>
                    <div class="h4 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$total_keseluruhan_vpd= $data = $this->db->select('*')->from('data_pelatihan')->get()->num_rows(); ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-globe fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    Sangat Baik</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$sangat_baik_vpd1= $this->db->select('*')->from('data_pelatihan')->where('hasil_vpd', 'Sangat Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($sangat_baik_vpd1/$total_keseluruhan_vpd), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-full fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Baik
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$baik_vpd1 = $this->db->select('*')->from('data_pelatihan')->where('hasil_vpd', 'Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($baik_vpd1/$total_keseluruhan_vpd), 3, '.', ''); ?> </div>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-three-quarters fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Buruk</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$buruk_vpd1= $this->db->select('*')->from('data_pelatihan')->where('hasil_vpd', 'Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($buruk_vpd1/$total_keseluruhan_vpd), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Sangat Buruk</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$sangat_buruk_vpd1= $this->db->select('*')->from('data_pelatihan')->where('hasil_vpd', 'Sangat Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($sangat_buruk_vpd1/$total_keseluruhan_vpd), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-empty fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<hr />

<center><h2 class="h4 mb-4 text-gray-800">Jumlah Kejadian dari Kategori yang Muncul (VPD)</h2></center>

<center><h3 class="h4 mb-4 text-gray-800">RH = Sangat Lembap</h3></center>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">SANGAT BAIK</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Sangat Lembap')->where('hasil_vpd', 'Sangat Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_baik_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-full fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">BAIK</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('rh', 'Sangat Lembap')->where('hasil_vpd', 'Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$baik_vpd1), 3, '.', ''); ?> </div>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-three-quarters fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Buruk</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Sangat Lembap')->where('hasil_vpd', 'Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">SANGAT BURUK</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Sangat Lembap')->where('hasil_vpd', 'Sangat Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-empty fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<center><h3 class="h4 mb-4 text-gray-800">RH = Ideal</h3></center>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">SANGAT BAIK</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Ideal')->where('hasil_vpd', 'Sangat Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_baik_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-full fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">BAIK</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('rh', 'Ideal')->where('hasil_vpd', 'Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$baik_vpd1), 3, '.', ''); ?> </div>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-three-quarters fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Buruk</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Ideal')->where('hasil_vpd', 'Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">SANGAT BURUK</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Ideal')->where('hasil_vpd', 'Sangat Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-empty fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<center><h3 class="h4 mb-4 text-gray-800">RH = Kering</h3></center>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">SANGAT BAIK</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Kering')->where('hasil_vpd', 'Sangat Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_baik_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-full fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">BAIK</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('rh', 'Kering')->where('hasil_vpd', 'Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$baik_vpd1), 3, '.', ''); ?> </div>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-three-quarters fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Buruk</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Kering')->where('hasil_vpd', 'Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">SANGAT BURUK</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Kering')->where('hasil_vpd', 'Sangat Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-empty fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


<center><h3 class="h4 mb-4 text-gray-800">Suhu Udara = Dingin</h3></center>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">SANGAT BAIK</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Dingin')->where('hasil_vpd', 'Sangat Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_baik_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-full fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">BAIK</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Dingin')->where('hasil_vpd', 'Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$baik_vpd1), 3, '.', ''); ?> </div>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-three-quarters fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Buruk</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Dingin')->where('hasil_vpd', 'Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Sangat Buruk</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Dingin')->where('hasil_vpd', 'Sangat Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-empty fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<center><h3 class="h4 mb-4 text-gray-800">Suhu Udara = Ideal</h3></center>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">SANGAT BAIK</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Ideal')->where('hasil_vpd', 'Sangat Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_baik_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-full fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">BAIK</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Ideal')->where('hasil_vpd', 'Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$baik_vpd1), 3, '.', ''); ?> </div>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-three-quarters fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Buruk</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Ideal')->where('hasil_vpd', 'Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Sangat Buruk</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Ideal')->where('hasil_vpd', 'Sangat Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-empty fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<center><h3 class="h4 mb-4 text-gray-800">Suhu Udara = Panas</h3></center>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">SANGAT BAIK</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Panas')->where('hasil_vpd', 'Sangat Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_baik_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-full fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">BAIK</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Panas')->where('hasil_vpd', 'Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$baik_vpd1), 3, '.', ''); ?> </div>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-three-quarters fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Buruk</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Panas')->where('hasil_vpd', 'Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Sangat Buruk</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Panas')->where('hasil_vpd', 'Sangat Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-empty fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


<center><h3 class="h4 mb-4 text-gray-800">Suhu Daun = Dingin</h3></center>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">SANGAT BAIK</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Dingin')->where('hasil_vpd', 'Sangat Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_baik_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-full fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">BAIK</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Dingin')->where('hasil_vpd', 'Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$baik_vpd1), 3, '.', ''); ?> </div>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-three-quarters fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Buruk</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Dingin')->where('hasil_vpd', 'Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Sangat Buruk</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Dingin')->where('hasil_vpd', 'Sangat Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-empty fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<center><h3 class="h4 mb-4 text-gray-800">Suhu Daun = Ideal</h3></center>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">SANGAT BAIK</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Ideal')->where('hasil_vpd', 'Sangat Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_baik_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-full fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">BAIK</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Ideal')->where('hasil_vpd', 'Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$baik_vpd1), 3, '.', ''); ?> </div>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-three-quarters fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Buruk</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Ideal')->where('hasil_vpd', 'Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Sangat Buruk</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Ideal')->where('hasil_vpd', 'Sangat Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-empty fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<center><h3 class="h4 mb-4 text-gray-800">Suhu Daun = Panas</h3></center>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">SANGAT BAIK</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Panas')->where('hasil_vpd', 'Sangat Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_baik_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-full fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">BAIK</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Panas')->where('hasil_vpd', 'Baik')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$baik_vpd1), 3, '.', ''); ?> </div>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-three-quarters fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Buruk</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Panas')->where('hasil_vpd', 'Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Sangat Buruk</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Panas')->where('hasil_vpd', 'Sangat Buruk')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$sangat_buruk_vpd1), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-empty fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<hr />

</div>
<hr />



</div>



</div>

</div>