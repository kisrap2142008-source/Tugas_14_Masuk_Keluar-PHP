<?php
if (!class_exists('SuratController')) {
    class SuratController {
        private $model;
        public function __construct($conn) { $this->model = new SuratModel($conn); }

        public function auth($u, $p) {
            $user = $this->model->loginUser($u, $p);
            if ($user) {
                $_SESSION['role'] = $user['role'];
                $_SESSION['username'] = $user['username'];
                header("Location: index.php"); exit;
            }
            return "Login Gagal!";
        }

        public function showAll() { return $this->model->tampil(); }
        public function add($no, $jen, $per) { $this->model->simpan($no, $jen, $per); header("Location: index.php"); exit; }
        public function edit($id, $no, $jen, $per) { $this->model->update($id, $no, $jen, $per); header("Location: index.php"); exit; }
        public function remove($id) { $this->model->hapus($id); header("Location: index.php"); exit; }
    }
}
?>