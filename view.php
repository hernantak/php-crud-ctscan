<?php
    include 'koneksi.php';
    $query = $db->prepare("SELECT * FROM dataset");
    $query->execute();

    $query_img = $db->prepare("SELECT * FROM image_data");
    $query_img->execute();
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
                    <div id="box-alret">Data Rekaman Kosong</div>
                    <div>
                        <button onClick="location.href='upload.php'" style="margin-top: 10px;" class="btn btn-sm btn-primary">Tambah Data</button>
                    </div>
            <?php
                }
                else {?>
                    <tr>
                        <th class="text-center">NO</th>
                        <th>DATASET ID</th>
                        <th>NAMA DATASET</th>
                        <th>NO REKAM MEDIS</th>
                        <th>STATUS</th>
                        <th colspan="4" class="text-center"><span class="glyphicon glyphicon-cog"></span></th>
                    </tr>     
            <?php        
                    while($value = $query->fetch()){ ?>
                        <tr>
                            <td class="align-middle text-center"><?php echo $no; ?></td>
                            <td p align="left" bgcolor="#FFFFFF"><?php echo $value['dataset_id'] ?></td>
                            <td p align="left" bgcolor="#FFFFFF"><?php echo $value['dataset_name'] ?></td>
                            <td p align="left" bgcolor="#FFFFFF"><?php echo $value['medic_record'] ?></td>
                            <td p align="left" bgcolor="#FFFFFF">                
                                <?php 
                                    $value_img = $query_img->fetch();
                                    $tmp_dataset_id = $value['dataset_id'];
                                    if($value_img['dataset_id'] == $tmp_dataset_id && $value_img['validate'] != NULL){
                                            echo "Sudah Validasi";
                                        } else {
                                            echo "Belum Validasi"; 
                                    }
                                ?>    
                            </td>
                            <td class="align-middle text-center">
                                <a href="" class="btn btn-default"><span class="glyphicon glyphicon-download-alt"></span></a>
                            </td>   
                            <td class="align-middle text-center">
                                <a href="detailed.php?dataset_id=<?php echo $value['dataset_id']?>" class="btn btn-default"><span class="glyphicon glyphicon-check"></span></a>
                            </td>   
                            <td class="align-middle text-center">
                                <a href="edit.php?dataset_id=<?php echo $value['dataset_id']?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                            </td>
                            <td class="align-middle text-center">
                                <a href="delete.php?dataset_id=<?php echo $value['dataset_id']?>" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span></a>
                            </td>
                        </tr>
                        <?php
                            $no++; 
                    }
                }?>
    </table>
</div>