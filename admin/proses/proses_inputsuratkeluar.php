<?php
	session_start();
	include '../../koneksi/koneksi.php';
	
	$tanggalkeluar_suratkeluar	        = mysqli_real_escape_string($db,$_POST['tanggalkeluar_suratkeluar']);
	$kode_suratkeluar	                = mysqli_real_escape_string($db,$_POST['kode_suratkeluar']);
	$nomor_suratkeluar	                = mysqli_real_escape_string($db,$_POST['nomor_suratkeluar']);
    $nama_bagian	                    = mysqli_real_escape_string($db,$_POST['nama_bagian']);
	$tanggalsurat_suratkeluar           = mysqli_real_escape_string($db,"");
	$kepada_suratkeluar		            = mysqli_real_escape_string($db,$_POST['kepada_suratkeluar']);
	$perihal_suratkeluar   	            = mysqli_real_escape_string($db,$_POST['perihal_suratkeluar']);
    $operator	                        = mysqli_real_escape_string($db,"");
	
        date_default_timezone_set('Asia/Jakarta'); 
		$tanggal_entry  = date("Y-m-d H:i:s");
        $thnNow = date("Y");
	
    $tgl_keluar                 = date('Y-m-d H:i:s', strtotime($tanggalkeluar_suratkeluar));
    $tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratkeluar));
	$ambilnomor                 = substr("$nomor_suratkeluar",0,4);
	
    if (!($tgl_keluar=='') and !($kode_suratkeluar =='') and !($nomor_suratkeluar =='') and !($nama_bagian =='') and !($kepada_suratkeluar =='') and !($perihal_suratkeluar =='') and !($tanggal_entry =='')){		
		$sql = "INSERT INTO tb_suratkeluar(tanggalkeluar_suratkeluar, kode_suratkeluar, nomor_suratkeluar, nama_bagian, tanggalsurat_suratkeluar, kepada_suratkeluar, perihal_suratkeluar, file_suratkeluar, operator, tanggal_entry)
				values ('$tgl_keluar', '$kode_suratkeluar', '$nomor_suratkeluar', '$nama_bagian', '$tgl_surat', '$kepada_suratkeluar', '$perihal_suratkeluar', '', '$operator', '$tanggal_entry')";
		$execute = mysqli_query($db, $sql);
		
		echo "<Center><h2><br>Terima Kasih<br>Surat Keluar Telah Dimasukkan</h2></center>
			<meta http-equiv='refresh' content='2;url=../datasuratkeluar.php'>";
	}
	else{
		echo "<Center><h2>Silahkan isi semua kolom lalu tekan submit<br>Terima Kasih</h2></center>
			<meta http-equiv='refresh' content='2;url=../inputsuratkeluar.php'>";
	}
	
?>
	