<?php 
$min_rh = 0;
$mid_rh = 0;
$mid2_rh = 0;
$max_rh = 0;

$min_suhu_udara = 0;
$mid_suhu_udara = 0;
$mid2_suhu_udara = 0;
$max_suhu_udara = 0;

$min_suhu_daun = 0;
$mid_suhu_daun = 0;
$mid2_suhu_daun = 0;
$max_suhu_daun = 0;


$hasilmin_rh = 0; // Untuk menampung hasil perhitungan
$hasilmid_rh = 0;
$hasilmax_rh = 0;

$hasilmin_suhu_udara = 0;
$hasilmid_suhu_udara = 0;
$hasilmax_suhu_udara = 0;

$hasilmin_suhu_daun = 0;
$hasilmid_suhu_daun = 0;
$hasilmax_suhu_daun = 0;


$hasilfusifikasi_rh =0;
$hasilfusifikasi_suhu_udara =0;
$hasilfusifikasi_suhu_daun =0;


$hasilfusifikasi_kesimpulan_rh = '';
$hasilfusifikasi_kesimpulan_suhu_udara = '';
$hasilfusifikasi_kesimpulan_suhu_daun = '';

$kesimpulan_hasil_kondisi_vpd = '';
$kesimpulan_hasil_kontrol_suhu ='';
$kesimpulan_hasil_kontrol_kelembapan = '';


    
		foreach($rule as $r){ //untuk menampilkan variabel data yang diangkut dari controller
		?>
		<?php
            $min_rh += $r->min_rh;
			$mid_rh += $r->mid_rh;
			$mid2_rh += $r->mid2_rh;
			$max_rh += $r->max_rh;

			$min_suhu_udara += $r->min_suhu_udara;
			$mid_suhu_udara += $r->mid_suhu_udara;
			$mid2_suhu_udara += $r->mid2_suhu_udara;
			$max_suhu_udara += $r->max_suhu_udara;

			$min_suhu_daun += $r->min_suhu_daun;
			$mid_suhu_daun += $r->mid_suhu_daun;
			$mid2_suhu_daun += $r->mid2_suhu_daun;
			$max_suhu_daun += $r->max_suhu_daun;

		 ?>
        <?php } ?>

        <?php 
		foreach($data as $d){ //untuk menampilkan variabel data yang diangkut dari controller
		?>
		<?php
        $time=$d->time;
        $rh=$d->rh;
        $suhu_udara=$d->suhu_udara;
        $suhu_daun=$d->suhu_daun;
       

        //Fuzifikasi RH => Kering
				if($d->rh <= $min_rh){$hasilmin_rh += 1;}
				else if ($min_rh <= $d->rh && $d->rh < $mid_rh){$hasilmin_rh += 1 - (($d->rh - $min_rh)/($mid_rh - $min_rh));}
				else{$hasilmin_rh += 0;}

				//Fuzifikasi RH => Sangat Lembap
				if($max_rh <= $d->rh){$hasilmax_rh += 1;}
				else if($mid2_rh < $d->rh && $d->rh <= $max_rh){$hasilmax_rh += 1- (($max_rh - $d->rh)/($max_rh - $mid2_rh));}
				else{$hasilmax_rh += 0;}
				
				//Fuzifikasi RH => Ideal
				if($mid_rh <= $d->rh && $d->rh <= $mid2_rh){$hasilmid_rh +=1;}
				else if ($hasilmin_rh > 0){$hasilmid_rh += 1 - $hasilmin_rh;}
				else if ($hasilmax_rh > 0){$hasilmid_rh += 1 - $hasilmax_rh;}
				else {$hasilmid_rh += 0;}
			


        		//Fuzifikasi Suhu Udara => Dingin
				if($d->suhu_udara <= $min_suhu_udara){$hasilmin_suhu_udara += 1;}
				else if ($min_suhu_udara <= $d->suhu_udara && $d->suhu_udara < $mid_suhu_udara){$hasilmin_suhu_udara += 1 - (($d->suhu_udara - $min_suhu_udara)/($mid_suhu_udara - $min_suhu_udara));}
				else{$hasilmin_suhu_udara += 0;}

				//Fuzifikasi Suhu Udara => Panas
				if($max_suhu_udara <= $d->suhu_udara){$hasilmax_suhu_udara += 1;}
				else if($mid2_suhu_udara < $d->suhu_udara && $d->suhu_udara <= $max_suhu_udara){$hasilmax_suhu_udara += 1- (($max_suhu_udara - $d->suhu_udara)/($max_suhu_udara - $mid2_suhu_udara));}
				else{$hasilmax_suhu_udara += 0;}
				
				//Fuzifikasi Suhu Udara => Ideal
				if($mid_suhu_udara <= $d->suhu_udara && $d->suhu_udara <= $mid2_suhu_udara){$hasilmid_suhu_udara +=1;}
				else if ($hasilmin_suhu_udara > 0){$hasilmid_suhu_udara += 1 - $hasilmin_suhu_udara;}
				else if ($hasilmax_suhu_udara > 0){$hasilmid_suhu_udara += 1 - $hasilmax_suhu_udara;}
				else {$hasilmid_suhu_udara += 0;}			
			
			
			
            	//Fuzifikasi Suhu daun => Dingin
                if($d->suhu_daun <= $min_suhu_daun){$hasilmin_suhu_daun += 1;}
                else if ($min_suhu_daun <= $d->suhu_daun && $d->suhu_daun < $mid_suhu_daun){$hasilmin_suhu_daun += 1 - (($d->suhu_daun - $min_suhu_daun)/($mid_suhu_daun - $min_suhu_daun));}
                else{$hasilmin_suhu_daun += 0;}
    
                //Fuzifikasi Suhu daun => Panas
                if($max_suhu_daun <= $d->suhu_daun){$hasilmax_suhu_daun += 1;}
                else if($mid2_suhu_daun < $d->suhu_daun && $d->suhu_daun <= $max_suhu_daun){$hasilmax_suhu_daun += 1- (($max_suhu_daun - $d->suhu_daun)/($max_suhu_daun - $mid2_suhu_daun));}
                else{$hasilmax_suhu_daun += 0;}
                    
                //Fuzifikasi Suhu daun => Ideal
                if($mid_suhu_daun <= $d->suhu_daun && $d->suhu_daun <= $mid2_suhu_daun){$hasilmid_suhu_daun +=1;}
                else if ($hasilmin_suhu_daun > 0){$hasilmid_suhu_daun += 1 - $hasilmin_suhu_daun;}
                else if ($hasilmax_suhu_daun > 0){$hasilmid_suhu_daun += 1 - $hasilmax_suhu_daun;}
                else {$hasilmid_suhu_daun += 0;}
				
				


				//Hasil Fuzifikasi RH
				 if($hasilmin_rh >= $hasilmid_rh && $hasilmid_rh >= $hasilmax_rh){$hasilfusifikasi_rh += $hasilmin_rh;}
				 else if($hasilmid_rh >= $hasilmin_rh && $hasilmid_rh >= $hasilmax_rh){$hasilfusifikasi_rh += $hasilmid_rh;}
				 else if($hasilmax_rh >= $hasilmid_rh && $hasilmax_rh >= $hasilmin_rh){$hasilfusifikasi_rh += $hasilmax_rh;}
				 else{$hasilfusifikasi_rh += 0;}

				 //Kesimpulan Fuzifikasi RH
				 if($hasilmin_rh >= $hasilmid_rh && $hasilmid_rh >= $hasilmax_rh){$hasilfusifikasi_kesimpulan_rh .= 'Kering';}
				 else if($hasilmid_rh >= $hasilmin_rh && $hasilmid_rh >= $hasilmax_rh){$hasilfusifikasi_kesimpulan_rh .= 'Ideal';}
				 else if($hasilmax_rh >= $hasilmid_rh && $hasilmax_rh >= $hasilmin_rh){$hasilfusifikasi_kesimpulan_rh .= 'Sangat Lembap';}
				 else{$hasilfusifikasi_kesimpulan_rh .= 'error';}	
				 
				 

				//Hasil Fuzifikasi Suhu Udara
                if($hasilmin_suhu_udara >= $hasilmid_suhu_udara && $hasilmid_suhu_udara >= $hasilmax_suhu_udara){$hasilfusifikasi_suhu_udara += $hasilmin_suhu_udara;}
                else if($hasilmid_suhu_udara >= $hasilmin_suhu_udara && $hasilmid_suhu_udara >= $hasilmax_suhu_udara){$hasilfusifikasi_suhu_udara += $hasilmid_suhu_udara;}
                else if($hasilmax_suhu_udara >= $hasilmid_suhu_udara && $hasilmax_suhu_udara >= $hasilmin_suhu_udara){$hasilfusifikasi_suhu_udara += $hasilmax_suhu_udara;}
                else{$hasilfusifikasi_suhu_udara += 0;}

                //Kesimpulan Fuzifikasi Suhu Udara
                if($hasilmin_suhu_udara >= $hasilmid_suhu_udara && $hasilmid_suhu_udara >= $hasilmax_suhu_udara){$hasilfusifikasi_kesimpulan_suhu_udara .= 'Dingin';}
                else if($hasilmid_suhu_udara >= $hasilmin_suhu_udara && $hasilmid_suhu_udara >= $hasilmax_suhu_udara){$hasilfusifikasi_kesimpulan_suhu_udara .= 'Ideal';}
                else if($hasilmax_suhu_udara >= $hasilmid_suhu_udara && $hasilmax_suhu_udara >= $hasilmin_suhu_udara){$hasilfusifikasi_kesimpulan_suhu_udara .= 'Panas';}
                else{$hasilfusifikasi_kesimpulan_suhu_udara .= 'error';}
				
				
				
				//Hasil Fuzifikasi Suhu Daun
                if($hasilmin_suhu_daun >= $hasilmid_suhu_daun && $hasilmid_suhu_daun >= $hasilmax_suhu_daun){$hasilfusifikasi_suhu_daun += $hasilmin_suhu_daun;}
                else if($hasilmid_suhu_daun >= $hasilmin_suhu_daun && $hasilmid_suhu_daun >= $hasilmax_suhu_daun){$hasilfusifikasi_suhu_daun += $hasilmid_suhu_daun;}
                else if($hasilmax_suhu_daun >= $hasilmid_suhu_daun && $hasilmax_suhu_daun >= $hasilmin_suhu_daun){$hasilfusifikasi_suhu_daun += $hasilmax_suhu_daun;}
                else{$hasilfusifikasi_suhu_daun += 0;}

                //Kesimpulan Fuzifikasi Suhu Daun
                if($hasilmin_suhu_daun >= $hasilmid_suhu_daun && $hasilmid_suhu_daun >= $hasilmax_suhu_daun){$hasilfusifikasi_kesimpulan_suhu_daun .= 'Dingin';}
                else if($hasilmid_suhu_daun >= $hasilmin_suhu_daun && $hasilmid_suhu_daun >= $hasilmax_suhu_daun){$hasilfusifikasi_kesimpulan_suhu_daun .= 'Ideal';}
                else if($hasilmax_suhu_daun >= $hasilmid_suhu_daun && $hasilmax_suhu_daun >= $hasilmin_suhu_daun){$hasilfusifikasi_kesimpulan_suhu_daun .= 'Panas';}
                else{$hasilfusifikasi_kesimpulan_suhu_daun .= 'error';}	
				
				
                
                ?>
        <?php } 
        
        #----------Bayes------------#
		//Hasil VPD
		$sangat_baik_vpd1 = $this->db->select('*')->from('data_pelatihan')->where('hasil_vpd', 'Sangat Baik')->get()->num_rows();
		$baik_vpd1 = $this->db->select('*')->from('data_pelatihan')->where('hasil_vpd', 'Baik')->get()->num_rows();
		$buruk_vpd1 = $this->db->select('*')->from('data_pelatihan')->where('hasil_vpd', 'Buruk')->get()->num_rows();
		$sangat_buruk_vpd1 = $this->db->select('*')->from('data_pelatihan')->where('hasil_vpd', 'Sangat Buruk')->get()->num_rows();
		$total_keseluruhan_vpd = $sangat_baik_vpd1 + $baik_vpd1 + $buruk_vpd1 + $sangat_buruk_vpd1;

		$sangat_baik_vpd = number_format((float)($sangat_baik_vpd1/$total_keseluruhan_vpd), 3, '.', '');
		$baik_vpd = number_format((float)($baik_vpd1/$total_keseluruhan_vpd), 3, '.', '');
		$buruk_vpd = number_format((float)($buruk_vpd1/$total_keseluruhan_vpd), 3, '.', '');
		$sangat_buruk_vpd = number_format((float)($sangat_buruk_vpd1/$total_keseluruhan_vpd), 3, '.', '');

		$rh_sangat_baik_vpd = $this->db->select('*')->from('data_pelatihan')->where('rh', $hasilfusifikasi_kesimpulan_rh)->where('hasil_vpd', 'Sangat Baik')->get()->num_rows();
		$rh_baik_vpd = $this->db->select('*')->from('data_pelatihan')->where('rh', $hasilfusifikasi_kesimpulan_rh)->where('hasil_vpd', 'Baik')->get()->num_rows();
		$rh_buruk_vpd = $this->db->select('*')->from('data_pelatihan')->where('rh', $hasilfusifikasi_kesimpulan_rh)->where('hasil_vpd', 'Buruk')->get()->num_rows();
		$rh_sangat_buruk_vpd = $this->db->select('*')->from('data_pelatihan')->where('rh', $hasilfusifikasi_kesimpulan_rh)->where('hasil_vpd', 'Sangat Buruk')->get()->num_rows();

		$rh_sangat_baik_vpd = number_format((float)($rh_sangat_baik_vpd / $sangat_baik_vpd1), 3, '.', '');
		$rh_baik_vpd = number_format((float)($rh_baik_vpd / $baik_vpd1), 3, '.', '');
		$rh_buruk_vpd = number_format((float)($rh_buruk_vpd / $buruk_vpd1), 3, '.', '');
		$rh_sangat_buruk_vpd = number_format((float)($rh_sangat_buruk_vpd / $sangat_buruk_vpd1), 3, '.', '');

		$suhu_udara_sangat_baik_vpd = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', $hasilfusifikasi_kesimpulan_suhu_udara)->where('hasil_vpd', 'Sangat Baik')->get()->num_rows();
		$suhu_udara_baik_vpd = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', $hasilfusifikasi_kesimpulan_suhu_udara)->where('hasil_vpd', 'Baik')->get()->num_rows();
		$suhu_udara_buruk_vpd = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', $hasilfusifikasi_kesimpulan_suhu_udara)->where('hasil_vpd', 'Buruk')->get()->num_rows();
		$suhu_udara_sangat_buruk_vpd = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', $hasilfusifikasi_kesimpulan_suhu_udara)->where('hasil_vpd', 'Sangat Buruk')->get()->num_rows();

		$suhu_udara_sangat_baik_vpd = number_format((float)($suhu_udara_sangat_baik_vpd / $sangat_baik_vpd1), 3, '.', '');
		$suhu_udara_baik_vpd = number_format((float)($suhu_udara_baik_vpd / $baik_vpd1), 3, '.', '');
		$suhu_udara_buruk_vpd = number_format((float)($suhu_udara_buruk_vpd / $buruk_vpd1), 3, '.', '');
		$suhu_udara_sangat_buruk_vpd = number_format((float)($suhu_udara_sangat_buruk_vpd / $sangat_buruk_vpd1), 3, '.', '');

		$suhu_daun_sangat_baik_vpd = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', $hasilfusifikasi_kesimpulan_suhu_daun)->where('hasil_vpd', 'Sangat Baik')->get()->num_rows();
		$suhu_daun_baik_vpd = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', $hasilfusifikasi_kesimpulan_suhu_daun)->where('hasil_vpd', 'Baik')->get()->num_rows();
		$suhu_daun_buruk_vpd = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', $hasilfusifikasi_kesimpulan_suhu_daun)->where('hasil_vpd', 'Buruk')->get()->num_rows();
		$suhu_daun_sangat_buruk_vpd = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', $hasilfusifikasi_kesimpulan_suhu_daun)->where('hasil_vpd', 'Sangat Buruk')->get()->num_rows();

		$suhu_daun_sangat_baik_vpd = number_format((float)($suhu_daun_sangat_baik_vpd / $sangat_baik_vpd1), 3, '.', '');
		$suhu_daun_baik_vpd = number_format((float)($suhu_daun_baik_vpd / $baik_vpd1), 3, '.', '');
		$suhu_daun_buruk_vpd = number_format((float)($suhu_daun_buruk_vpd / $buruk_vpd1), 3, '.', '');
		$suhu_daun_sangat_buruk_vpd = number_format((float)($suhu_daun_sangat_buruk_vpd / $sangat_buruk_vpd1), 3, '.', '');	

		//hasil probabilitas VPD
		$pembilang_vpd = number_format((float)(($sangat_baik_vpd*$rh_sangat_baik_vpd*$suhu_udara_sangat_baik_vpd*$suhu_daun_sangat_baik_vpd) + ($baik_vpd*$rh_baik_vpd*$suhu_udara_baik_vpd*$suhu_daun_baik_vpd) + ($buruk_vpd*$rh_buruk_vpd*$suhu_udara_buruk_vpd*$suhu_daun_buruk_vpd) + ($sangat_buruk_vpd*$rh_sangat_buruk_vpd*$suhu_udara_sangat_buruk_vpd*$suhu_daun_sangat_buruk_vpd)), 5, '.', '');
		$hasil_sangat_baik_vpd = number_format((float)(($sangat_baik_vpd*$rh_sangat_baik_vpd*$suhu_udara_sangat_baik_vpd*$suhu_daun_sangat_baik_vpd) / $pembilang_vpd), 5, '.', '');
		$hasil_baik_vpd = number_format((float)(($baik_vpd*$rh_baik_vpd*$suhu_udara_baik_vpd*$suhu_daun_baik_vpd) / $pembilang_vpd), 5, '.', '');
		$hasil_buruk_vpd = number_format((float)(($buruk_vpd*$rh_buruk_vpd*$suhu_udara_buruk_vpd*$suhu_daun_buruk_vpd) / $pembilang_vpd), 5, '.', '');
		$hasil_sangat_buruk_vpd = number_format((float)(($sangat_buruk_vpd*$rh_sangat_buruk_vpd*$suhu_udara_sangat_buruk_vpd*$suhu_daun_sangat_buruk_vpd) / $pembilang_vpd), 5, '.', '');

		//Kesimpulan Hasil VPD
		if($hasil_sangat_baik_vpd >= $hasil_baik_vpd && $hasil_sangat_baik_vpd >= $hasil_buruk_vpd && $hasil_sangat_baik_vpd >= $hasil_sangat_buruk_vpd){$kesimpulan_hasil_kondisi_vpd .= 'Sangat Baik';}
		else if ($hasil_baik_vpd >= $hasil_sangat_baik_vpd && $hasil_baik_vpd >= $hasil_buruk_vpd && $hasil_baik_vpd >= $hasil_sangat_buruk_vpd){$kesimpulan_hasil_kondisi_vpd .= 'Baik';}
		else if ($hasil_buruk_vpd >= $hasil_sangat_baik_vpd && $hasil_buruk_vpd >= $hasil_baik_vpd && $hasil_buruk_vpd >= $hasil_sangat_buruk_vpd){$kesimpulan_hasil_kondisi_vpd .= 'Buruk';}
		else if ($hasil_sangat_buruk_vpd >= $hasil_sangat_baik_vpd && $hasil_sangat_buruk_vpd >= $hasil_baik_vpd && $hasil_sangat_buruk_vpd >= $hasil_buruk_vpd){$kesimpulan_hasil_kondisi_vpd .= 'Sangat Buruk';}
		else {$kesimpulan_hasil_kondisi_vpd .= 'error';}
		


        //Output Kontrol Suhu
		$lambat_kontrol_suhu1 = $this->db->select('*')->from('data_pelatihan')->where('kontrol_suhu', 'LED Menyala')->get()->num_rows();
		$sedang_kontrol_suhu1 = $this->db->select('*')->from('data_pelatihan')->where('kontrol_suhu', 'Pemanas & LED Menyala')->get()->num_rows();
		$cepat_kontrol_suhu1 = $this->db->select('*')->from('data_pelatihan')->where('kontrol_suhu', 'Pendingin Menyala')->get()->num_rows();
		$total_keseluruhan_kontrol_suhu = $lambat_kontrol_suhu1 + $sedang_kontrol_suhu1 + $cepat_kontrol_suhu1;

		$lambat_kontrol_suhu = number_format((float)($lambat_kontrol_suhu1/$total_keseluruhan_kontrol_suhu), 3, '.', '');
		$sedang_kontrol_suhu = number_format((float)($sedang_kontrol_suhu1/$total_keseluruhan_kontrol_suhu), 3, '.', '');
		$cepat_kontrol_suhu = number_format((float)($cepat_kontrol_suhu1/$total_keseluruhan_kontrol_suhu), 3, '.', '');

		$rh_lambat_kontrol_suhu = $this->db->select('*')->from('data_pelatihan')->where('rh', $hasilfusifikasi_kesimpulan_rh)->where('kontrol_suhu', 'LED Menyala')->get()->num_rows();
		$rh_sedang_kontrol_suhu = $this->db->select('*')->from('data_pelatihan')->where('rh', $hasilfusifikasi_kesimpulan_rh)->where('kontrol_suhu', 'Pemanas & LED Menyala')->get()->num_rows();
		$rh_cepat_kontrol_suhu = $this->db->select('*')->from('data_pelatihan')->where('rh', $hasilfusifikasi_kesimpulan_rh)->where('kontrol_suhu', 'Pendingin Menyala')->get()->num_rows();	
	
		$rh_lambat_kontrol_suhu = number_format((float)($rh_lambat_kontrol_suhu / $lambat_kontrol_suhu1), 3, '.', '');
		$rh_sedang_kontrol_suhu = number_format((float)($rh_sedang_kontrol_suhu / $sedang_kontrol_suhu1), 3, '.', '');
		$rh_cepat_kontrol_suhu = number_format((float)($rh_cepat_kontrol_suhu / $cepat_kontrol_suhu1), 3, '.', '');

		$suhu_udara_lambat_kontrol_suhu = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', $hasilfusifikasi_kesimpulan_suhu_udara)->where('kontrol_suhu', 'LED Menyala')->get()->num_rows();
		$suhu_udara_sedang_kontrol_suhu = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', $hasilfusifikasi_kesimpulan_suhu_udara)->where('kontrol_suhu', 'Pemanas & LED Menyala')->get()->num_rows();
		$suhu_udara_cepat_kontrol_suhu = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', $hasilfusifikasi_kesimpulan_suhu_udara)->where('kontrol_suhu', 'Pendingin Menyala')->get()->num_rows();	
	
		$suhu_udara_lambat_kontrol_suhu = number_format((float)($suhu_udara_lambat_kontrol_suhu / $lambat_kontrol_suhu1), 3, '.', '');
		$suhu_udara_sedang_kontrol_suhu = number_format((float)($suhu_udara_sedang_kontrol_suhu / $sedang_kontrol_suhu1), 3, '.', '');
		$suhu_udara_cepat_kontrol_suhu = number_format((float)($suhu_udara_cepat_kontrol_suhu / $cepat_kontrol_suhu1), 3, '.', '');

		$suhu_daun_lambat_kontrol_suhu = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', $hasilfusifikasi_kesimpulan_suhu_daun)->where('kontrol_suhu', 'LED Menyala')->get()->num_rows();
		$suhu_daun_sedang_kontrol_suhu = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', $hasilfusifikasi_kesimpulan_suhu_daun)->where('kontrol_suhu', 'Pemanas & LED Menyala')->get()->num_rows();
		$suhu_daun_cepat_kontrol_suhu = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', $hasilfusifikasi_kesimpulan_suhu_daun)->where('kontrol_suhu', 'Pendingin Menyala')->get()->num_rows();	
	
		$suhu_daun_lambat_kontrol_suhu = number_format((float)($suhu_daun_lambat_kontrol_suhu / $lambat_kontrol_suhu1), 3, '.', '');
		$suhu_daun_sedang_kontrol_suhu = number_format((float)($suhu_daun_sedang_kontrol_suhu / $sedang_kontrol_suhu1), 3, '.', '');
		$suhu_daun_cepat_kontrol_suhu = number_format((float)($suhu_daun_cepat_kontrol_suhu / $cepat_kontrol_suhu1), 3, '.', '');


		//hasil Output Kontrol Suhu
		$pembilang_kontrol_suhu = number_format((float)(($lambat_kontrol_suhu*$rh_lambat_kontrol_suhu*$suhu_udara_lambat_kontrol_suhu*$suhu_daun_lambat_kontrol_suhu) + ($sedang_kontrol_suhu*$rh_sedang_kontrol_suhu*$suhu_udara_sedang_kontrol_suhu*$suhu_daun_sedang_kontrol_suhu) + ($cepat_kontrol_suhu*$rh_cepat_kontrol_suhu*$suhu_udara_cepat_kontrol_suhu*$suhu_daun_cepat_kontrol_suhu)), 5, '.', '');
		$hasil_lambat_kontrol_suhu = number_format((float)(($lambat_kontrol_suhu*$rh_lambat_kontrol_suhu*$suhu_udara_lambat_kontrol_suhu*$suhu_daun_lambat_kontrol_suhu) / $pembilang_kontrol_suhu), 5, '.', '');
		$hasil_sedang_kontrol_suhu = number_format((float)(($sedang_kontrol_suhu*$rh_sedang_kontrol_suhu*$suhu_udara_sedang_kontrol_suhu*$suhu_daun_sedang_kontrol_suhu) / $pembilang_kontrol_suhu), 5, '.', '');
		$hasil_cepat_kontrol_suhu = number_format((float)(($cepat_kontrol_suhu*$rh_cepat_kontrol_suhu*$suhu_udara_cepat_kontrol_suhu*$suhu_daun_cepat_kontrol_suhu) / $pembilang_kontrol_suhu), 5, '.', '');
	
		//Kesimpulan Output Kontrol Suhu
		if($hasil_lambat_kontrol_suhu >= $hasil_sedang_kontrol_suhu && $hasil_lambat_kontrol_suhu >= $hasil_cepat_kontrol_suhu ){$kesimpulan_hasil_kontrol_suhu .= 'LED Menyala';}
		else if ($hasil_sedang_kontrol_suhu >= $hasil_lambat_kontrol_suhu && $hasil_sedang_kontrol_suhu >= $hasil_cepat_kontrol_suhu ){$kesimpulan_hasil_kontrol_suhu .= 'Pemanas & LED Menyala';}
		else if ($hasil_cepat_kontrol_suhu >= $hasil_sedang_kontrol_suhu && $hasil_cepat_kontrol_suhu >= $hasil_lambat_kontrol_suhu ){$kesimpulan_hasil_kontrol_suhu .= 'Pendingin Menyala';}
		else {$kesimpulan_hasil_kontrol_suhu .= 'error';}



        		//Output Kontrol Kelembapan
		$lambat_kontrol_kelembapan1 = $this->db->select('*')->from('data_pelatihan')->where('kontrol_kelembapan', 'Humidifer Menyala')->get()->num_rows();
		$sedang_kontrol_kelembapan1 = $this->db->select('*')->from('data_pelatihan')->where('kontrol_kelembapan', '-')->get()->num_rows();
		$cepat_kontrol_kelembapan1 = $this->db->select('*')->from('data_pelatihan')->where('kontrol_kelembapan', 'Dehumidifer Menyala')->get()->num_rows();
		$total_keseluruhan_kontrol_kelembapan = $lambat_kontrol_kelembapan1 + $sedang_kontrol_kelembapan1 + $cepat_kontrol_kelembapan1;

		$lambat_kontrol_kelembapan = number_format((float)($lambat_kontrol_kelembapan1/$total_keseluruhan_kontrol_kelembapan), 3, '.', '');
		$sedang_kontrol_kelembapan = number_format((float)($sedang_kontrol_kelembapan1/$total_keseluruhan_kontrol_kelembapan), 3, '.', '');
		$cepat_kontrol_kelembapan = number_format((float)($cepat_kontrol_kelembapan1/$total_keseluruhan_kontrol_kelembapan), 3, '.', '');

		$rh_lambat_kontrol_kelembapan = $this->db->select('*')->from('data_pelatihan')->where('rh', $hasilfusifikasi_kesimpulan_rh)->where('kontrol_kelembapan', 'Humidifer Menyala')->get()->num_rows();
		$rh_sedang_kontrol_kelembapan = $this->db->select('*')->from('data_pelatihan')->where('rh', $hasilfusifikasi_kesimpulan_rh)->where('kontrol_kelembapan', '-')->get()->num_rows();
		$rh_cepat_kontrol_kelembapan = $this->db->select('*')->from('data_pelatihan')->where('rh', $hasilfusifikasi_kesimpulan_rh)->where('kontrol_kelembapan', 'Dehumidifer Menyala')->get()->num_rows();	
	
		$rh_lambat_kontrol_kelembapan = number_format((float)($rh_lambat_kontrol_kelembapan / $lambat_kontrol_kelembapan1), 3, '.', '');
		$rh_sedang_kontrol_kelembapan = number_format((float)($rh_sedang_kontrol_kelembapan / $sedang_kontrol_kelembapan1), 3, '.', '');
		$rh_cepat_kontrol_kelembapan = number_format((float)($rh_cepat_kontrol_kelembapan / $cepat_kontrol_kelembapan1), 3, '.', '');

		$suhu_udara_lambat_kontrol_kelembapan = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', $hasilfusifikasi_kesimpulan_suhu_udara)->where('kontrol_kelembapan', 'Humidifer Menyala')->get()->num_rows();
		$suhu_udara_sedang_kontrol_kelembapan = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', $hasilfusifikasi_kesimpulan_suhu_udara)->where('kontrol_kelembapan', '-')->get()->num_rows();
		$suhu_udara_cepat_kontrol_kelembapan = $this->db->select('*')->from('data_pelatihan')->where('suhu_udara', $hasilfusifikasi_kesimpulan_suhu_udara)->where('kontrol_kelembapan', 'Dehumidifer Menyala')->get()->num_rows();	
	
		$suhu_udara_lambat_kontrol_kelembapan = number_format((float)($suhu_udara_lambat_kontrol_kelembapan / $lambat_kontrol_kelembapan1), 3, '.', '');
		$suhu_udara_sedang_kontrol_kelembapan = number_format((float)($suhu_udara_sedang_kontrol_kelembapan / $sedang_kontrol_kelembapan1), 3, '.', '');
		$suhu_udara_cepat_kontrol_kelembapan = number_format((float)($suhu_udara_cepat_kontrol_kelembapan / $cepat_kontrol_kelembapan1), 3, '.', '');

		$suhu_daun_lambat_kontrol_kelembapan = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', $hasilfusifikasi_kesimpulan_suhu_daun)->where('kontrol_kelembapan', 'Humidifer Menyala')->get()->num_rows();
		$suhu_daun_sedang_kontrol_kelembapan = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', $hasilfusifikasi_kesimpulan_suhu_daun)->where('kontrol_kelembapan', '-')->get()->num_rows();
		$suhu_daun_cepat_kontrol_kelembapan = $this->db->select('*')->from('data_pelatihan')->where('suhu_daun', $hasilfusifikasi_kesimpulan_suhu_daun)->where('kontrol_kelembapan', 'Dehumidifer Menyala')->get()->num_rows();	
	
		$suhu_daun_lambat_kontrol_kelembapan = number_format((float)($suhu_daun_lambat_kontrol_kelembapan / $lambat_kontrol_kelembapan1), 3, '.', '');
		$suhu_daun_sedang_kontrol_kelembapan = number_format((float)($suhu_daun_sedang_kontrol_kelembapan / $sedang_kontrol_kelembapan1), 3, '.', '');
		$suhu_daun_cepat_kontrol_kelembapan = number_format((float)($suhu_daun_cepat_kontrol_kelembapan / $cepat_kontrol_kelembapan1), 3, '.', '');

		//hasil Output Kontrol Kelembapan
		$pembilang_kontrol_kelembapan = number_format((float)(($lambat_kontrol_kelembapan*$rh_lambat_kontrol_kelembapan*$suhu_udara_lambat_kontrol_kelembapan*$suhu_daun_lambat_kontrol_kelembapan) + ($sedang_kontrol_kelembapan*$rh_sedang_kontrol_kelembapan*$suhu_udara_sedang_kontrol_kelembapan*$suhu_daun_sedang_kontrol_kelembapan) + ($cepat_kontrol_kelembapan*$rh_cepat_kontrol_kelembapan*$suhu_udara_cepat_kontrol_kelembapan*$suhu_daun_cepat_kontrol_kelembapan)), 5, '.', '');
		$hasil_lambat_kontrol_kelembapan = number_format((float)(($lambat_kontrol_kelembapan*$rh_lambat_kontrol_kelembapan*$suhu_udara_lambat_kontrol_kelembapan*$suhu_daun_lambat_kontrol_kelembapan) / $pembilang_kontrol_kelembapan), 5, '.', '');
		$hasil_sedang_kontrol_kelembapan = number_format((float)(($sedang_kontrol_kelembapan*$rh_sedang_kontrol_kelembapan*$suhu_udara_sedang_kontrol_kelembapan*$suhu_daun_sedang_kontrol_kelembapan) / $pembilang_kontrol_kelembapan), 5, '.', '');
		$hasil_cepat_kontrol_kelembapan = number_format((float)(($cepat_kontrol_kelembapan*$rh_cepat_kontrol_kelembapan*$suhu_udara_cepat_kontrol_kelembapan*$suhu_daun_cepat_kontrol_kelembapan) / $pembilang_kontrol_kelembapan), 5, '.', '');
	
		//Kesimpulan Output Kontrol Kelembapan
		if($hasil_lambat_kontrol_kelembapan >= $hasil_sedang_kontrol_kelembapan && $hasil_lambat_kontrol_kelembapan >= $hasil_cepat_kontrol_kelembapan ){$kesimpulan_hasil_kontrol_kelembapan .= 'Humidifer Menyala';}
		else if ($hasil_sedang_kontrol_kelembapan >= $hasil_lambat_kontrol_kelembapan && $hasil_sedang_kontrol_kelembapan >= $hasil_cepat_kontrol_kelembapan ){$kesimpulan_hasil_kontrol_kelembapan .= '-';}
		else if ($hasil_cepat_kontrol_kelembapan >= $hasil_sedang_kontrol_kelembapan && $hasil_cepat_kontrol_kelembapan >= $hasil_lambat_kontrol_kelembapan ){$kesimpulan_hasil_kontrol_kelembapan .= 'Dehumidifer Menyala';}
		else {$kesimpulan_hasil_kontrol_kelembapan .= 'error';}
 
       
        ?>

<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $title; ?></h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                            </nav>
                        </div>
                    </div>

                </div>

                <br/>
</div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
					<h5 class="card-title"><center><b>Hasil Fuzzyfikasi RH</b></center></h5>
			<div class="table-responsive">
            <table id="datatable" class="table">
                <thead>
                    <tr>
						<th><center>Waktu</center></th>
						<th><center>Nilai</center></th>
						<th><center>Hasil</center></th>
						<th><center>Kesimpulan</center></th>
                    </tr>
                </thead>
		<tbody>		


		<tr>  
			<td><center><?php echo $time ?></center></td>
			<td><center><?php echo $rh ?>%</center></td>
			<td><center>Kering = <?php echo $hasilmin_rh?>, Ideal = <?php echo $hasilmid_rh ?>, Sangat Lembap = <?php echo $hasilmax_rh ?></center></td>
            <td><center><b><?php echo $hasilfusifikasi_kesimpulan_rh ?> <br/></b> <?php echo $hasilfusifikasi_rh ?></center></td>
		</tr>
		</tbody>
            </table>

          
            </div>
            </div>

            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
					<h5 class="card-title"><center><b>Hasil Fuzzyfikasi Suhu Udara</b></center></h5>
			<div class="table-responsive">
            <table id="datatable" class="table">
                <thead>
                    <tr>
						<th><center>Waktu</center></th>
						<th><center>Nilai</center></th>
						<th><center>Hasil</center></th>
						<th><center>Kesimpulan</center></th>
                    </tr>
                </thead>
		<tbody>		


		<tr>  
			<td><center><?php echo $time ?></center></td>
			<td><center><?php echo $suhu_udara ?> C</center></td>
			<td><center>Dingin = <?php echo $hasilmin_suhu_udara?>, Ideal = <?php echo $hasilmid_suhu_udara ?>, Panans = <?php echo $hasilmax_suhu_udara ?></center></td>
            <td><center><b><?php echo $hasilfusifikasi_kesimpulan_suhu_udara ?></b> <br/> <?php echo $hasilfusifikasi_suhu_udara ?></center></td>
		</tr>
		</tbody>
            </table>         
            </div>
            </div>

            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
					<h5 class="card-title"><center><b>Hasil Fuzzyfikasi Suhu Daun</b></center></h5>
			<div class="table-responsive">
            <table id="datatable" class="table">
                <thead>
                    <tr>
						<th><center>Waktu</center></th>
						<th><center>Nilai</center></th>
						<th><center>Hasil</center></th>
						<th><center>Kesimpulan</center></th>
                    </tr>
                </thead>
		<tbody>		


		<tr>  
			<td><center><?php echo $time ?></center></td>
			<td><center><?php echo $suhu_daun ?> C</center></td>
			<td><center>Dingin = <?php echo $hasilmin_suhu_daun?>, Ideal = <?php echo $hasilmid_suhu_daun ?>, Panans = <?php echo $hasilmax_suhu_daun ?></center></td>
            <td><center><b><?php echo $hasilfusifikasi_kesimpulan_suhu_daun ?></b> <br/> <?php echo $hasilfusifikasi_suhu_daun ?></center></td>
		</tr>
		</tbody>
            </table>         
            </div>
            </div>

            

            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
					<h4 class="card-title"><center><b>Hasil Fuzzifikasi & Masukan Navie Bayes</center></b></h4>
					<div class="row">
				
				</div>

				<div class="row">
				 <div class="col-3">
					<div class="form-group">
                        <label class="control-label col-xs-3" ><center>RH</center></label>
                        <div class="col-xs-9">
                           <input type="text" name="name" value="<?php echo $hasilfusifikasi_kesimpulan_rh; ?>" class="form-control" disabled>
                        </div>
                    </div>
				</div>
				<div class="col-3">
					<div class="form-group">
                        <label class="control-label col-xs-3" ><center>Suhu Udara</center></label>
                        <div class="col-xs-9">
                           <input type="text" name="name" value="<?php echo $hasilfusifikasi_kesimpulan_suhu_udara; ?>" class="form-control"disabled>
                        </div>
                    </div>
				</div>
				<div class="col-3">
					<div class="form-group">
                        <label class="control-label col-xs-3" ><center>Suhu Daun</center></label>
                        <div class="col-xs-9">
                           <input type="text" name="name" value="<?php echo $hasilfusifikasi_kesimpulan_suhu_daun; ?>" class="form-control"disabled>
                        </div>
                    </div>
				</div>
				
                  
				</div>
				
				</div>
				</div>



                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
					<h4 class="card-title"><center><b>Hasil Perhitungan Navie Bayes</center></b></h4>
					<div class="row">
				</div>
					<h5 class="card-title"><center><b>Hasil VPD</b></center></h5>
			<div class="table-responsive">
            <table id="datatable" class="table">
                <thead>
                    <tr>
						<th><center>Waktu</center></th>
						<th><center>Hasil</center></th>
						<th><center>Kesimpulan</center></th>
                    </tr>
                </thead>
		<tbody>		


		<tr>  
			<td><center><?php echo $time ?></center></td>
			<td><center>Sangat baik = <?php echo $hasil_sangat_baik_vpd?>, Baik = <?php echo $hasil_baik_vpd ?>, Buruk = <?php echo $hasil_buruk_vpd ?>, Sangat Buruk = <?php echo $hasil_sangat_buruk_vpd ?></center></td>
            <td><center><b><?php echo $kesimpulan_hasil_kondisi_vpd ?></b></center></td>
		</tr>
		</tbody>
            </table>         
            </div>
            </div>
				
            

            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
					<div class="row">
				</div>
					<h5 class="card-title"><center><b>Hasil Kontrol Suhu</b></center></h5>
			<div class="table-responsive">
            <table id="datatable" class="table">
                <thead>
                    <tr>
						<th><center>Waktu</center></th>
						<th><center>Hasil</center></th>
						<th><center>Kesimpulan</center></th>
                    </tr>
                </thead>
		<tbody>		


		<tr>  
			<td><center><?php echo $time ?></center></td>
			<td><center>LED Menyala = <?php echo $hasil_lambat_kontrol_suhu?>, Pemanas & LED Menyala = <?php echo $hasil_sedang_kontrol_suhu ?>, Pendingin Menyala = <?php echo $hasil_cepat_kontrol_suhu ?></center></td>
            <td><center><b><?php echo $kesimpulan_hasil_kontrol_suhu ?></b></center></td>
		</tr>
		</tbody>
            </table>         
            </div>
            </div>


            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
					<div class="row">
				</div>
					<h5 class="card-title"><center><b>Hasil Kontrol Kelembapan</b></center></h5>
			<div class="table-responsive">
            <table id="datatable" class="table">
                <thead>
                    <tr>
						<th><center>Waktu</center></th>
						<th><center>Hasil</center></th>
						<th><center>Kesimpulan</center></th>
                    </tr>
                </thead>
		<tbody>		


		<tr>  
			<td><center><?php echo $time ?></center></td>
			<td><center>Humidifer Menyala = <?php echo $hasil_lambat_kontrol_kelembapan?>, - = <?php echo $hasil_sedang_kontrol_kelembapan ?>, Dehumidifer Menyala = <?php echo $hasil_cepat_kontrol_kelembapan ?></center></td>
            <td><center><b><?php echo $kesimpulan_hasil_kontrol_kelembapan ?></b></center></td>
		</tr>
		</tbody>
            </table>         
            </div>
            </div>




            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
					<h4 class="card-title"><center><b>Hasil Kesimpulan Navie Bayes</center></b></h4>
					<div class="row">
				
				</div>

				<div class="row">
				 <div class="col-4">
					<div class="form-group">
                        <label class="control-label col-xs-3" ><center>Hasil VPD</center></label>
                        <div class="col-xs-9">
                           <input type="text" name="name" value="<?php echo $kesimpulan_hasil_kondisi_vpd; ?>" class="form-control" disabled>
                        </div>
                    </div>
				</div>
				

				<div class="col-4">
					<div class="form-group">
                        <label class="control-label col-xs-3" ><center>Hasil Kontrol Suhu</center></label>
                        <div class="col-xs-9">
                           <input type="text" name="name" value="<?php echo $kesimpulan_hasil_kontrol_suhu; ?>" class="form-control"disabled>
                        </div>
                    </div>
				</div>
                <div class="col-4">
					<div class="form-group">
                        <label class="control-label col-xs-3" ><center>Hasil Kontrol Kelembapan</center></label>
                        <div class="col-xs-9">
                           <input type="text" name="name" value="<?php echo $kesimpulan_hasil_kontrol_kelembapan; ?>" class="form-control"disabled>
                        </div>
                    </div>
				</div>

               
				
				
				</div>


				<?php
                foreach ($data as $r) { //untuk menampilkan variabel data yang diangkut dari controller
                ?>
				<?php 
                  
				$SVP = 610.78*exp($r->suhu_udara/($r->suhu_udara + 238.3) * 17.2694)/1000;
				$LSVP = 610.78*exp($r->suhu_daun/($r->suhu_daun + 238.3) * 17.2694)/1000;
				$VPD_udara = number_format((float)($SVP*(1-$r->rh/100)), 3, '.', '');
				$VPD_daun = number_format((float)($LSVP-$SVP*$r->rh/100), 3, '.', '');
				
				if (($VPD_udara <= 0.5 && $VPD_udara >= 0.7)|| ($VPD_udara <= 1.3 && $VPD_udara >= 1.7)){$kesimpulan_VPD_udara = 'Buruk';} else if (($VPD_udara >= 1.1 && $VPD_udara <= 1.2)||($VPD_udara >= 0.7 && $VPD_udara <= 0.9)){$kesimpulan_VPD_udara = 'Baik';} else if ($VPD_udara >= 0.7 && $VPD_udara <= 1.1){$kesimpulan_VPD_udara = 'Sangat Baik';} else {$kesimpulan_VPD_udara = 'Sangat Buruk';}
				if (($VPD_daun <= 0.5 && $VPD_daun >= 0.7) || ($VPD_daun <= 1.3 && $VPD_daun >= 1.7)){$kesimpulan_VPD_daun = 'Buruk';} else if (($VPD_daun >= 1.1 && $VPD_daun <= 1.2)||($VPD_daun >= 0.7 && $VPD_daun <= 0.9)){$kesimpulan_VPD_daun = 'Baik';} else if ($VPD_daun >= 0.7 && $VPD_daun <= 1.1){$kesimpulan_VPD_daun = 'Sangat Baik';} else {$kesimpulan_VPD_daun = 'Sangat Buruk';}
				 ?>

				<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
					<div class="row">
				</div>
					<h5 class="card-title"><center><b>Perhitungan VPD Secara Manual</b></center></h5>
			<div class="table-responsive">
            <table id="datatable" class="table">
                <thead>
                    <tr>
						<th><center>SVP & LSVP</center></th>
						<th><center>VPD Udara</center></th>
						<th><center>VPD Daun</center></th>
						<th><center>Kesimpulan</center></th>
                    </tr>
                </thead>
		<tbody>		


		<tr>  
			<td><center>SVP = 610,78 x e^(T/((T+237.3)  x 17.2694))</center> </br> <center> SVP = <b> <?php echo number_format((float)($SVP), 3, '.', ''); ?> Pascal/Pa </b></center> </br> <center> LSVP = <b> <?php echo number_format((float)($LSVP), 3, '.', ''); ?> Pascal/Pa </b></center> </br> Keterangan: T = suhu dalam derajat Celsius (C)</td>
			<td><center>VPD Udara =SVP x (1-  RH/100)</center> </br> <center> VPD Udara = <b> <?php echo $VPD_udara ?> kPa</b></center></td>
			<td><center>VPD Daun =LSVP-(SVP x  RH/100) </center> </br> <center> VPD Daun = <b> <?php echo $VPD_daun ?> kPa</b></center></td>
			<td>VPD Udara = <b> <?php echo $kesimpulan_VPD_udara ?> </b></center> </br> VPD Daun = <b> <?php echo $kesimpulan_VPD_daun ?> </b> </td>
		</tr>
		</tbody>
            </table>         
            </div>
            </div>

				<?php } ?>
				<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
					<h4 class="card-title"><center><b>Perbandigan Hasil</center></b></h4>
					<div class="row">
				
				</div>

				<div class="row">
				 <div class="col-4">
					<div class="form-group">
                        <label class="control-label col-xs-3" ><center>Hasil VPD dengan Fuzzy bayes</center></label>
                        <div class="col-xs-9">
                           <input type="text" name="name" value="<?php echo $kesimpulan_hasil_kondisi_vpd; ?>" class="form-control" disabled>
                        </div>
                    </div>
				</div>
				<div class="col-4">
					<div class="form-group">
                        <label class="control-label col-xs-3" ><center>Hasil VPD Udara dengan Perhitungan </center></label>
                        <div class="col-xs-9">
                           <input type="text" name="name" value="<?php echo $kesimpulan_VPD_udara; ?>" class="form-control"disabled>
                        </div>
                    </div>
				</div>	
               <div class="col-4">
					<div class="form-group">
                        <label class="control-label col-xs-3" ><center>Hasil VPD Daun dengan Perhitungan </center></label>
                        <div class="col-xs-9">
                           <input type="text" name="name" value="<?php echo $kesimpulan_VPD_daun; ?>" class="form-control"disabled>
                        </div>
                    </div>
				</div>	          


        </div>
        </div></div></div>
        
        <!--END MODAL ADD-->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
        $(function () {
            $('[data-plugin="knob"]').knob();
        });
    </script>

<meta http-equiv="refresh" content="10">
  
