<?php
	session_start();
	include '../../koneksi/koneksi.php';
    $id				           		    = mysqli_real_escape_string($db,$_POST['id_suratkeluar']);
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
	
	$sql  		= "SELECT * FROM tb_suratkeluar where id_suratkeluar='".$id."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);
	
	$sql = "UPDATE tb_suratkeluar set 
					tanggalkeluar_suratkeluar   = '$tgl_keluar',
					kode_suratkeluar    		= '$kode_suratkeluar',
					nomor_suratkeluar 			= '$nomor_suratkeluar',
					nama_bagian                 = '$nama_bagian',
					tanggalsurat_suratkeluar	= '',
					kepada_suratkeluar          = '$kepada_suratkeluar',
					perihal_suratkeluar		    = '$perihal_suratkeluar',
					operator            	    = '',
					tanggal_entry               = '$tanggal_entry',
					file_suratkeluar			= '' 
			where id_suratkeluar = $id";
			
	$execute = mysqli_query($db, $sql);			
					
	echo "<Center><h2><br>Data Surat Keluar telah diubah</h2></center>
	<meta http-equiv='refresh' content='2;url=../detail-suratkeluar.php?id_suratkeluar=".$id."'>";
?>
	