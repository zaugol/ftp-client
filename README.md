# PHP FTP Client

This is a simple PHP FTP client class that provides an easy-to-use interface for interacting with an FTP server.

## Features

- Connect to an FTP server
- Upload files to the FTP server
- Download files from the FTP server
- Delete files from the FTP server
- List files in a directory on the FTP server
- Get information about a file on the FTP server

## Installation

You can install the FTP client using Composer:

```
composer require zaugol/ftp-client
```

## Usage

1. Include the Composer autoloader in your project:

```php
require_once __DIR__ . '/vendor/autoload.php';
```

2. Use the `zaugol\FTPClient\FTPClient` class to interact with the FTP server:

```php
use zaugol\FTPClient\FTPClient;

$ftp = new FTPClient('ftp.example.com', 'username', 'password');

try {
    $ftp->connect();
    $ftp->upload('local_file.txt', 'remote_file.txt');
    $ftp->download('remote_file.txt', 'downloaded_file.txt');
    $ftp->delete('remote_file.txt');
    $files = $ftp->listFiles();
    $fileInfo = $ftp->getFileInfo('another_file.txt');
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
```

See the `example.php` file for a complete example.

## Requirements

- PHP 5.6 or higher

## License

This code is licensed under the [MIT License](LICENSE).