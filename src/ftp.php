<?php

namespace zaugol\FTPClient;

class ftp {
    private $connection;
    private $host;
    private $username;
    private $password;
    private $port = 21;

    public function __construct($host, $username, $password, $port = 21) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->port = $port;
    }

    public function connect() {
        $this->connection = ftp_connect($this->host, $this->port);
        if (!$this->connection) {
            throw new Exception("Failed to connect to FTP server");
        }
        $login = ftp_login($this->connection, $this->username, $this->password);
        if (!$login) {
            throw new Exception("Failed to login to FTP server");
        }
    }

    public function upload($local_file, $remote_file) {
        if (!$this->connection) {
            $this->connect();
        }
        if (ftp_put($this->connection, $remote_file, $local_file, FTP_BINARY)) {
            return true;
        } else {
            return false;
        }
    }

    public function download($remote_file, $local_file) {
        if (!$this->connection) {
            $this->connect();
        }
        if (ftp_get($this->connection, $local_file, $remote_file, FTP_BINARY)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($remote_file) {
        if (!$this->connection) {
            $this->connect();
        }
        if (ftp_delete($this->connection, $remote_file)) {
            return true;
        } else {
            return false;
        }
    }

    public function listFiles($directory = '.') {
        if (!$this->connection) {
            $this->connect();
        }
        return ftp_nlist($this->connection, $directory);
    }

    public function getFileInfo($remote_file) {
        if (!$this->connection) {
            $this->connect();
        }
        return ftp_rawlist($this->connection, $remote_file);
    }
}