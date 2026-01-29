<?php
if (!class_exists('SuratModel')) {
    class SuratModel {
        private $db;
        public function __construct($conn) { $this->db = $conn; }

        public function loginUser($u, $p) {
            $u = mysqli_real_escape_string($this->db, $u);
            $p = mysqli_real_escape_string($this->db, $p);
            return mysqli_fetch_assoc(mysqli_query($this->db, "SELECT * FROM users WHERE username='$u' AND password='$p'"));
        }

        public function tampil() { 
            return mysqli_query($this->db, "SELECT * FROM surat ORDER BY id DESC"); 
        }

        public function simpan($no, $jen, $per) {
            $no = mysqli_real_escape_string($this->db, $no);
            $jen = mysqli_real_escape_string($this->db, $jen);
            $per = mysqli_real_escape_string($this->db, $per);
            return mysqli_query($this->db, "INSERT INTO surat (nomor, jenis, perihal) VALUES ('$no', '$jen', '$per')");
        }

        public function update($id, $no, $jen, $per) {
            $id = (int)$id;
            $no = mysqli_real_escape_string($this->db, $no);
            $jen = mysqli_real_escape_string($this->db, $jen);
            $per = mysqli_real_escape_string($this->db, $per);
            return mysqli_query($this->db, "UPDATE surat SET nomor='$no', jenis='$jen', perihal='$per' WHERE id=$id");
        }

        public function hapus($id) { 
            return mysqli_query($this->db, "DELETE FROM surat WHERE id=" . (int)$id); 
        }
    }
}
?>