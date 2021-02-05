<?php

    $host = "localhost";
    $dbname = "skirpsi_db";
    $username = "root";
    $password = "root";
    try {
        $db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exception){
        die("Connection error: " . $exception->getMessage());
    }

    if(isset($_GET["dataset_id"])){
        $query_dat = $db->prepare("SELECT * FROM `image_data` WHERE dataset_id=:dataset_id");
        $query_dat->bindParam(":dataset_id", $_GET["dataset_id"]);
        $query_dat->execute();
        $value = $query_dat->fetch();
        $temp_path = $value['dataset_id'];

        $folder_name = 'upload/'.$temp_path;
        $dir = $folder_name;
        $zip_file = 'file-CTSCAN-'.$temp_path.'.zip';

        // Get real path for our folder
        $rootPath = realpath($dir);

        // Initialize archive object
        $zip = new ZipArchive();
        $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        // Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file)
        {
            // Skip directories (they would be added automatically)
            if (!$file->isDir())
            {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);

                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }

        // Zip archive will be created only after closing object
        $zip->close();

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($zip_file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($zip_file));
        readfile($zip_file);
    }

?>