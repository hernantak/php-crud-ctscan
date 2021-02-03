<?php
    include 'koneksi.php';
    $query = $db->prepare("SELECT * FROM dataset");
    $query->execute();

    $query_img = $db->prepare("SELECT * FROM image_data");
    $query_img->execute();

?>

<div>
	<?php
	$jum = 0;
		while ($value = $query_img->fetch()) {?>
			<p>Data : <?php echo $value['dataset_id'] ?>;</p>
			<p>Val : <?php echo $value['validate'] ?>;</p>
	<?php
		if($value['dataset_id'] == qZlth1WC2JZ0u1v36wJE && $value['validate'] !== NULL)
			$jum++;
		}
		echo $jum;
		?>

</div>
