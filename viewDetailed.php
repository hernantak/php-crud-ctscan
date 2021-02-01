<?php
    include 'koneksi.php';
    if(!isset($_GET['dataset_id'])){
        die("Error: Dataset ID Tidak Dimasukkan");
    }
    $query = $db->prepare("SELECT * FROM `image_data` WHERE dataset_id = :dataset_id");
    $query->bindParam(":dataset_id", $_GET['dataset_id']);
    $query->execute();
    if($query->rowCount() == 0){
        die("Error: Dataset ID Tidak Ditemukan");
    }else{
        $data = $query->fetch();
    }
    if(isset($_POST['submit'])){
        $dataset_name = htmlentities($_POST['dataset_name']);
        $medic_record = htmlentities($_POST['medic_record']);
        // $kelas = htmlentities($_POST['kelas']);
        $query = $db->prepare("UPDATE `dataset` SET `dataset_name`=:dataset_name,`medic_record`=:medic_record WHERE dataset_id=:dataset_id");
        $query->bindParam(":dataset_name", $dataset_name);
        $query->bindParam(":medic_record", $medic_record);
        // $query->bindParam(":kelas", $kelas);
        $query->bindParam(":dataset_id", $_GET['dataset_id']);
        $query->execute();
        header("location: index.php");
    }
?>
<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th class="text-center">NO</th>
			<th>IMG DATA ID</th>
			<th>DATASET DATA ID</th>
			<th>HASIL VALIDASI</th>
			<th colspan="2" class="text-center"><span class="glyphicon glyphicon-cog"></span></th>
		</tr>
		<?php
		// Include / load file koneksi.php
		include "koneksi.php";
		
		// Buat query untuk menampilkan semua data siswa
		$sql = $pdo->prepare("SELECT * FROM `image_data` WHERE dataset_id = :dataset_id");
	    $sql->bindParam(":dataset_id", $_GET['dataset_id']);
		$sql->execute(); // Eksekusi querynya
		
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
		?>
			<tr>
				<td class="align-middle text-center"><?php echo $no; ?></td>
				<td class="align-middle"><?php echo $data['file_name']; ?></td>
				<td class="align-middle"><?php echo $data['dataset_id']; ?></td>
				<td class="align-middle"><?php 
					if($data['status'] == NULL){
						echo "Belum Validasi";
					} else {
						echo $data['status']; 
					}
					?>
				</td>				
				<td class="align-middle text-center">
					<a href="validasi.php?file_name=<?php echo $data['file_name']?>" class="btn btn-default"><span class="glyphicon glyphicon-check"></span></a>
				</td>
				<td class="align-middle text-center">
					<a href="javascript:void();" data-toggle="modal" data-target="#delete-modal" onclick="hapus(<?php echo $no; ?>);" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span></a>
				</td>
			</tr>
		<?php
			$no++; // Tambah 1 setiap kali looping
		}
		?>
	</table>
</div>