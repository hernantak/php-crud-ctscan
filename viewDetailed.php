<?php
    include 'koneksi.php';
    $query = $db->prepare("SELECT * FROM image_data");
    $query->execute();
?>
<style>
    #box-alret{
        background: #f2dede;
        padding: 8px;
        text-align: center;
        font-weight: bold;
    }    
</style>
<div class="table-responsive">
	<table class="table table-bordered">
            <?php
                $no = 1; 
                if($query->rowCount() == 0){?>
                    <div id="box-alret">Data Gambar Kosong</div>
            <?php
                }
                else {?>
					<tr>
						<th class="text-center">NO</th>
						<th>IMG DATA ID</th>
						<th>DATASET DATA ID</th>
						<th>HASIL VALIDASI</th>
						<th colspan="2" class="text-center"><span class="glyphicon glyphicon-cog"></span></th>
					</tr>     
            <?php        
				while($data = $query->fetch()){?>
					<tr>
						<td class="align-middle text-center"><?php echo $no; ?></td>
						<td class="align-middle"><?php echo $data['file_name']; ?></td>
						<td class="align-middle"><?php echo $data['dataset_id']; ?></td>
						<td class="align-middle"><?php 
							if($data['status'] == NULL){
								echo "Belum Validasi";
							} else {
								echo $data['status']; 
							}?>
						</td>				
						<td class="align-middle text-center">
							<a href="validasi.php?file_name=<?php echo $data['file_name']?>" class="btn btn-default"><span class="glyphicon glyphicon-check"></span></a>
						</td>
						<td class="align-middle text-center">
							<a href="delete_img.php?file_name=<?php echo $data['file_name']?>" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span></a>
						</td>
					</tr>
				<?php
					$no++;
				}
			}
		?>
	</table>
</div>