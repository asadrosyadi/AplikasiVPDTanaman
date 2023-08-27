<?php
class Rest extends MX_Controller{
function __construct() {
parent::__construct();
//is_logged_in();
	
}
	function index(){
		$tolak = json_encode("access denied");
		echo $tolak;
	}

	function fuzzynaviebayes(){
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

		
		$rule = $this->db->select('*')->from('fuzzyrule')->where('HWID', $this->uri->segment(3))->limit(1)->order_by('id','desc')->get()->result();
        $data = $this->db->select('*')->from('datasensor')->where('HWID', $this->uri->segment(3))->limit(1)->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

		foreach ($rule as $r) {
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


            $jeda_pembacaan = $r->jeda_pembacaan;

		}

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


			foreach($data as $d){
				$time1=$d->time;
				$rh1=$d->rh;
				$suhu_udara1=$d->suhu_udara;
				$suhu_daun1=$d->suhu_daun;


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
				
					
			}

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



		

		$user = $this->db->select('*')->from('user')->where('HWID', $this->uri->segment(3))->limit(1)->order_by('id','desc')->get()->result();
		foreach ($user as $u) {
			$name = $u->name;
			$email = $u->email;
			$image = $u->image;
		}

		$respon_data = array("Data" => array());
		$data = array("time" => $time1, "rh" => $rh1, "suhu_udara" => $suhu_udara1, "suhu_daun" => $suhu_daun1,
					"Kering_rh" => $hasilmin_rh, "Ideal_rh" => $hasilmid_rh, "Sangat Lembap_rh" => $hasilmax_rh, "Kesimpulan_rh" => $hasilfusifikasi_kesimpulan_rh, "Nilai_rh" => $hasilfusifikasi_rh,
					"Dingin_suhu_udara" => $hasilmin_suhu_udara, "Ideal_suhu_udara" => $hasilmid_suhu_udara, "Panas_suhu_udara" => $hasilmax_suhu_udara, "Kesimpulan_suhu_udara" => $hasilfusifikasi_kesimpulan_suhu_udara, "Nilai_suhu_udara" => $hasilfusifikasi_suhu_udara,
					"Dingin_suhu_daun" => $hasilmin_suhu_daun, "Ideal_suhu_daun" => $hasilmid_suhu_daun, "Panas_suhu_daun" => $hasilmax_suhu_daun, "Kesimpulan_suhu_daun" => $hasilfusifikasi_kesimpulan_suhu_daun, "Nilai_suhu_daun" => $hasilfusifikasi_suhu_daun,
					"Sangat baik_VPD" => $hasil_sangat_baik_vpd, "Baik_VPD" => $hasil_baik_vpd, "Buruk_VPD" => $hasil_buruk_vpd, "Sangat Buruk_VPD" => $hasil_sangat_buruk_vpd, "Kesimpulan_VPD" => $kesimpulan_hasil_kondisi_vpd,
					"LED Menyala_kontrolsuhu" => $hasil_lambat_kontrol_suhu, "Pemanas & LED Menyala_kontrolsuhu" => $hasil_sedang_kontrol_suhu, "Pendingin Menyala_kontrolsuhu" => $hasil_cepat_kontrol_suhu, "Kesimpulan_kontrolsuhu" => $kesimpulan_hasil_kontrol_suhu,
					"Humidifer Menyala_kontrolkelembapan" => $hasil_lambat_kontrol_kelembapan, "-_kontrolkelembapan" => $hasil_sedang_kontrol_kelembapan, "Dehumidifer Menyala_kontrolkelembapan" => $hasil_cepat_kontrol_kelembapan, "Kesimpulan_kontrolkelembapan" => $kesimpulan_hasil_kontrol_kelembapan,
					"nama" => $name, "email" => $email, 'image'=> $image, 'jeda_pembacaan'=> $jeda_pembacaan
				);
		array_push($respon_data["Data"],$data);
		$upload_data = json_encode($respon_data);
		echo "$upload_data";

	}
  
	function rule(){
			
		$rule = $this->db->select('*')->from('fuzzyrule')->where('HWID', $this->uri->segment(3))->limit(1)->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
			$response = array("rule" => array());
				foreach ($rule as $r) {
				$temp = array(
				"min_rh" => $r->min_rh,
				"mid_rh" => $r->mid_rh,
				"mid2_rh" => $r->mid2_rh,
				"max_rh" => $r->max_rh,
				"min_suhu_udara" => $r->min_suhu_udara,
				"mid_suhu_udara" => $r->mid_suhu_udara,
				"mid2_suhu_udara" => $r->mid2_suhu_udara,
				"max_suhu_udara" => $r->max_suhu_udara,
				"min_suhu_daun" => $r->min_suhu_daun,
				"mid_suhu_daun" => $r->mid_suhu_daun,
				"mid2_suhu_daun" => $r->mid2_suhu_daun,
				"max_suhu_daun" => $r->max_suhu_daun,
				"jeda_pembacaan" => $r->jeda_pembacaan,
				"email" => $r->email
			);
				
				array_push($response["rule"], $temp);
			}
			$data = json_encode($response);
			echo "$data";
    }
	
	function updaterule(){
	if($_SERVER['REQUEST_METHOD']=='POST'){
        $data = array(
            'min_rh'     => $this->input->post('min_rh'),
			'mid_rh'     => $this->input->post('mid_rh'),
			'mid2_rh'     => $this->input->post('mid2_rh'),
			'max_rh'     => $this->input->post('max_rh'),
			'min_suhu_udara'     => $this->input->post('min_suhu_udara'),
			'mid_suhu_udara'     => $this->input->post('mid_suhu_udara'),
			'mid2_suhu_udara'     => $this->input->post('mid2_suhu_udara'),
			'max_suhu_udara'     => $this->input->post('max_suhu_udara'),
			'min_suhu_daun'     => $this->input->post('min_suhu_daun'),
			'mid_suhu_daun'     => $this->input->post('mid_suhu_daun'),
			'mid2_suhu_daun'     => $this->input->post('mid2_suhu_daun'),
			'max_suhu_daun'     => $this->input->post('max_suhu_daun'),
			'jeda_pembacaan'     => $this->input->post('jeda_pembacaan'),
			'email'     => $this->input->post('email')
        );
        $hwid   = $this->input->post('HWID');
        $this->db->where('HWID',$hwid);
        $this->db->update('fuzzyrule',$data);
        
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
			echo "gagal";
		} else {
			echo "sukses";
		}
        }
	
    }

	
	public function kirimdatasensor()
	{
	  $this->db->select('*')->from('user')->where('HWID', $_GET['HWID'])->where('token', $_GET['token'])->get()->row()->id;
	  $isi = array(
  
		'HWID'     => $_GET['HWID'],
		'rh'     => $_GET['rh'],
		'suhu_udara'     => $_GET['suhu_udara'],
		'suhu_daun'     => $_GET['suhu_daun'],
		'email'     => $_GET['email']
  
	  );
	  $this->db->insert('datasensor', $isi);
	  $this->db->trans_complete();
	  if ($this->db->trans_status() === FALSE)
	  {
		  echo "gagal";
	  } else {
		  echo "sukses";
	  }
	}

	function log_sensor(){
			
		$log_sensor = $this->db->select('*')->from('datasensor')->where('HWID', $this->uri->segment(3))->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
			$response = array("log_sensor" => array());
				foreach ($log_sensor as $r) {
				$temp = array(
				"rh" => $r->rh,
				"suhu_udara" => $r->suhu_udara,
				"suhu_daun" => $r->suhu_daun,
				"time" => $r-> time
			);
				
				array_push($response["log_sensor"], $temp);
			}
			$data = json_encode($response);
			echo "$data";
    }
	
	function perhitungan_vpd(){
        $perhitungan_VPD = $this->db->select('*')->from('datasensor')->where('HWID', $this->uri->segment(3))->limit(1)->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
			$response = array("perhitungan_VPD" => array());
				foreach ($perhitungan_VPD as $r) {
				
				$e = 2.71828;	
				$SVP = (610.78 * (pow($e,($r->suhu_udara/($r->suhu_udara+237.3)*17.2694))) );
				$LSVP = (610.78 * (pow($e,($r->suhu_daun/($r->suhu_daun+237.3)*17.2694))) );
				$VPD_udara = number_format((float)(($SVP*(1-($r->rh/100)))/1000) - 0.4, 3, '.', '');
				$VPD_daun = number_format((float)(($LSVP - ($LSVP * ($r->rh/100)))/1000) - 0.4, 3, '.', '');
				
				if ($VPD_udara < 0.8 && $VPD_udara > 0.4){$kesimpulan_VPD_udara = 'Sangat Baik';} else if ($VPD_udara > 0.8 && $VPD_udara < 1.2){$kesimpulan_VPD_udara = 'Baik';} else if ($VPD_udara > 1.2 && $VPD_udara < 1.6){$kesimpulan_VPD_udara = 'Buruk';} else {$kesimpulan_VPD_udara = 'Sangat Buruk';}
				if ($VPD_daun < 0.8 && $VPD_daun > 0.4){$kesimpulan_VPD_daun = 'Sangat Baik';} else if ($VPD_daun > 0.8 && $VPD_daun < 1.2){$kesimpulan_VPD_daun = 'Baik';} else if ($VPD_daun > 1.2 && $VPD_daun < 1.6){$kesimpulan_VPD_daun = 'Buruk';} else {$kesimpulan_VPD_daun = 'Sangat Buruk';}


				$temp = array(
				"VPD Udara" => $VPD_udara,
				"Kesimpulan VPD Udara" => $kesimpulan_VPD_udara,
				"VPD Daun" => $VPD_daun,
				"Kesimpulan VPD Daun" => $kesimpulan_VPD_daun,
				"Kesimpulan VPD" => $kesimpulan_VPD_udara
			);
				
				array_push($response["perhitungan_VPD"], $temp);
			}
			$data = json_encode($response);
			echo "$data";
	}

	function perhitungan()
    {
        $datas['rule'] = $this->db->select('*')->from('fuzzyrule')->where('HWID', $this->uri->segment(3))->limit(1)->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar
        $datas['data'] = $this->db->select('*')->from('datasensor')->where('HWID', $this->uri->segment(3))->limit(1)->order_by('id', 'DESC')->get()->result(); //Untuk mengambil data dari database webinar

        $this->template->load('android', 'rest/perhitungan', $datas);

    }
	
}