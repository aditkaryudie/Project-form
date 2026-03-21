<?php
class FormData {
    private $nama;
    private $email;
    private $pesan;

    public function __construct($nama, $email, $pesan) {
        $this->nama = htmlspecialchars($nama);
        $this->email = htmlspecialchars($email);
        $this->pesan = htmlspecialchars($pesan);
    }

    public function getNama() {
        return $this->nama;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPesan() {
        return $this->pesan;
    }

    public function tampilkanHasil() {
        return "
            <ul>
                <li><strong>Nama:</strong> {$this->nama}</li>
                <li><strong>Email:</strong> {$this->email}</li>
                <li><strong>Pesan:</strong> {$this->pesan}</li>
            </ul>
        ";
    }
}
?>