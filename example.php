<?php
require_once __DIR__ . '/vendor/autoload.php';

use zaugol\FTPClient\ftp;

$ftp = new ftp('ftp.example.com', 'username', 'password');

try {
    $ftp->connect();
    echo "Connected to FTP server.\n";

    $ftp->upload('local_file.txt', 'remote_file.txt');
    echo "Uploaded file to FTP server.\n";

    $ftp->download('remote_file.txt', 'downloaded_file.txt');
    echo "Downloaded file from FTP server.\n";

    $ftp->delete('remote_file.txt');
    echo "Deleted file from FTP server.\n";

    $files = $ftp->listFiles();
    echo "Files on FTP server:\n";
    foreach ($files as $file) {
        echo "- $file\n";
    }

    $fileInfo = $ftp->getFileInfo('another_file.txt');
    echo "File information:\n";
    print_r($fileInfo);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>