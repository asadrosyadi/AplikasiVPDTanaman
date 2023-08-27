<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
 
<!-- Content Row -->
<center><h2 class="h4 mb-4 text-gray-800">Jumlah Kejadian dari Kelas yang Muncul (Kontrol Suhu)</h2></center>
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
                    LED Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$nomor1= $this->db->select('*')->from('data_pelatihan')->where('kontrol_suhu', 'LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($nomor1/$total_keseluruhan_vpd), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pemanas & LED Menyala
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$nomor2 = $this->db->select('*')->from('data_pelatihan')->where('kontrol_suhu', 'Pemanas & LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($nomor2/$total_keseluruhan_vpd), 3, '.', ''); ?> </div>
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
                        Pendingin Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$nomor3= $this->db->select('*')->from('data_pelatihan')->where('kontrol_suhu', 'Pendingin Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($nomor3/$total_keseluruhan_vpd), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<hr />

<center><h2 class="h4 mb-4 text-gray-800">Jumlah Kejadian dari Kategori yang Muncul (Kontrol Suhu)</h2></center>

<h3 class="h4 mb-4 text-gray-800">RH = Sangat Lembap</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">LED Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Sangat Lembap')->where('kontrol_suhu', 'LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pemanas & LED Menyala</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('rh', 'Sangat Lembap')->where('kontrol_suhu', 'Pemanas & LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendingin Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Sangat Lembap')->where('kontrol_suhu', 'Pendingin Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


</div>

<h3 class="h4 mb-4 text-gray-800">RH = Ideal</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">LED Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Ideal')->where('kontrol_suhu', 'LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pemanas & LED Menyala</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('rh', 'Ideal')->where('kontrol_suhu', 'Pemanas & LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendingin Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Ideal')->where('kontrol_suhu', 'Pendingin Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


</div>

<h3 class="h4 mb-4 text-gray-800">RH = Kering</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">LED Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Kering')->where('kontrol_suhu', 'LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pemanas & LED Menyala</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('rh', 'Kering')->where('kontrol_suhu', 'Pemanas & LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendingin Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Kering')->where('kontrol_suhu', 'Pendingin Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<h3 class="h4 mb-4 text-gray-800">Suhu Udara = Dingin</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">LED Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Dingin')->where('kontrol_suhu', 'LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pemanas & LED Menyala</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Dingin')->where('kontrol_suhu', 'Pemanas & LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendingin Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Dingin')->where('kontrol_suhu', 'Pendingin Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<h3 class="h4 mb-4 text-gray-800">Suhu Udara = Ideal</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">LED Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Ideal')->where('kontrol_suhu', 'LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pemanas & LED Menyala</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Ideal')->where('kontrol_suhu', 'Pemanas & LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendingin Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Ideal')->where('kontrol_suhu', 'Pendingin Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<h3 class="h4 mb-4 text-gray-800">Suhu Udara = Panas</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">LED Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Panas')->where('kontrol_suhu', 'LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pemanas & LED Menyala</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Panas')->where('kontrol_suhu', 'Pemanas & LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendingin Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Panas')->where('kontrol_suhu', 'Pendingin Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<h3 class="h4 mb-4 text-gray-800">Suhu Daun = Dingin</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">LED Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Dingin')->where('kontrol_suhu', 'LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pemanas & LED Menyala</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Dingin')->where('kontrol_suhu', 'Pemanas & LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendingin Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Dingin')->where('kontrol_suhu', 'Pendingin Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<h3 class="h4 mb-4 text-gray-800">Suhu Daun = Ideal</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">LED Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Ideal')->where('kontrol_suhu', 'LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pemanas & LED Menyala</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Ideal')->where('kontrol_suhu', 'Pemanas & LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendingin Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Ideal')->where('kontrol_suhu', 'Pendingin Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<h3 class="h4 mb-4 text-gray-800">Suhu Daun = Panas</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">LED Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Panas')->where('kontrol_suhu', 'LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pemanas & LED Menyala</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Panas')->where('kontrol_suhu', 'Pemanas & LED Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendingin Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Panas')->where('kontrol_suhu', 'Pendingin Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>



<!-- Content Row -->
<center><h2 class="h4 mb-4 text-gray-800">Jumlah Kejadian dari Kelas yang Muncul (Kontrol Kelembapan)</h2></center>
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
                    Humidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$nomor1= $this->db->select('*')->from('data_pelatihan')->where('kontrol_kelembapan', 'Humidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($nomor1/$total_keseluruhan_vpd), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">-
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$nomor2 = $this->db->select('*')->from('data_pelatihan')->where('kontrol_kelembapan', '-')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($nomor2/$total_keseluruhan_vpd), 3, '.', ''); ?> </div>
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
                        Dehumidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$nomor3= $this->db->select('*')->from('data_pelatihan')->where('kontrol_kelembapan', 'Dehumidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($nomor3/$total_keseluruhan_vpd), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<hr />

<center><h2 class="h4 mb-4 text-gray-800">Jumlah Kejadian dari Kategori yang Muncul (Kontrol Kelembapan)</h2></center>

<h3 class="h4 mb-4 text-gray-800">RH = Sangat Lembap</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Humidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Sangat Lembap')->where('kontrol_kelembapan', 'Humidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">-</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('rh', 'Sangat Lembap')->where('kontrol_kelembapan', '-')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dehumidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Sangat Lembap')->where('kontrol_kelembapan', 'Dehumidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


</div>

<h3 class="h4 mb-4 text-gray-800">RH = Ideal</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Humidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Ideal')->where('kontrol_kelembapan', 'Humidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">-</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('rh', 'Ideal')->where('kontrol_kelembapan', '-')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dehumidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Ideal')->where('kontrol_kelembapan', 'Dehumidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


</div>

<h3 class="h4 mb-4 text-gray-800">RH = Kering</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Humidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Kering')->where('kontrol_kelembapan', 'Humidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">-</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('rh', 'Kering')->where('kontrol_kelembapan', '-')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dehumidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('rh', 'Kering')->where('kontrol_kelembapan', 'Dehumidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<h3 class="h4 mb-4 text-gray-800">Suhu Udara = Dingin</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Humidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Dingin')->where('kontrol_kelembapan', 'Humidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">-</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Dingin')->where('kontrol_kelembapan', '-')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dehumidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Dingin')->where('kontrol_kelembapan', 'Dehumidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<h3 class="h4 mb-4 text-gray-800">Suhu Udara = Ideal</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Humidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Ideal')->where('kontrol_kelembapan', 'Humidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">-</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Ideal')->where('kontrol_kelembapan', '-')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dehumidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Ideal')->where('kontrol_kelembapan', 'Dehumidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<h3 class="h4 mb-4 text-gray-800">Suhu Udara = Panas</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Humidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Panas')->where('kontrol_kelembapan', 'Humidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">-</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Panas')->where('kontrol_kelembapan', '-')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dehumidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', 'Panas')->where('kontrol_kelembapan', 'Dehumidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<h3 class="h4 mb-4 text-gray-800">Suhu Daun = Dingin</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Humidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Dingin')->where('kontrol_kelembapan', 'Humidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">-</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Dingin')->where('kontrol_kelembapan', '-')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dehumidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Dingin')->where('kontrol_kelembapan', 'Dehumidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<h3 class="h4 mb-4 text-gray-800">Suhu Daun = Ideal</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Humidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Ideal')->where('kontrol_kelembapan', 'Humidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">-</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Ideal')->where('kontrol_kelembapan', '-')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dehumidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Ideal')->where('kontrol_kelembapan', 'Dehumidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<h3 class="h4 mb-4 text-gray-800">Suhu Daun = Panas</h3>

<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-2 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Humidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Panas')->where('kontrol_kelembapan', 'Humidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor1), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">-</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Panas')->where('kontrol_kelembapan', '-')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor2), 3, '.', ''); ?> </div>
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
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dehumidifer Menyala</div>
                    <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah: <?=$ini= $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', 'Panas')->where('kontrol_kelembapan', 'Dehumidifer Menyala')->get()->num_rows(); ?> Probabilitas: <?=number_format((float)($ini/$nomor3), 3, '.', ''); ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-battery-quarter fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<div class="row">


</div>
<hr />

</div>
<!-- /.container-fluid -->



</div>
<!-- End of Main Content -->