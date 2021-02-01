<?php
    include 'koneksi.php';
    $query = $db->prepare("SELECT * FROM dataset");
    $query->execute();
?>
<div class="table-responsive">
    <table class="table table-bordered">  
        <tr>
            <th class="text-center">NO</th>
            <th>DATASET ID</th>
            <th>NAMA DATASET</th>
            <th>NO REKAM MEDIS</th>
            <th>STATUS</th>
            <th colspan="4" class="text-center"><span class="glyphicon glyphicon-cog"></span></th>
        </tr> 
            <?php
                $no = 1; 
                while($value = $query->fetch()){ 
            ?>
                    <tr>
                        <td class="align-middle text-center"><?php echo $no; ?></td>
                        <td p align="left" bgcolor="#FFFFFF"><?php echo $value['dataset_id'] ?></td>
                        <td p align="left" bgcolor="#FFFFFF"><?php echo $value['dataset_name'] ?></td>
                        <td p align="left" bgcolor="#FFFFFF"><?php echo $value['medic_record'] ?></td>
                        <td p align="left" bgcolor="#FFFFFF">                
                            <?php 
                                if($value['status'] == NULL){
                                    echo "Belum Validasi";
                                } else {
                                    echo $value['status']; 
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
                    ?>
    </table>
</div>