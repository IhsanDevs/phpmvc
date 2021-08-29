<?php 
class Mahasiswa extends Controller {
    public function index()
    {
        $data['judul'] = "Data Mahasiswa";
        $data['mhs'] = $this->model("Mahasiswa_model")->GetAllMhs();
        $this->view("templates/header", $data);
        $this->view("mahasiswa/index", $data);
        $this->view("templates/footer");
    }
    public function detail($id)
    {
        $data['judul'] = "Detail Mahasiswa";
        $data['mhs'] = $this->model("Mahasiswa_model")->GetMahasiswaById($id);
        $this->view("templates/header", $data);
        $this->view("mahasiswa/detail", $data);
        $this->view("templates/footer");
    }
    public function Tambah()
    {
        if ($this->model("Mahasiswa_model")->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash("berhasil", "ditambahkan", "success");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        } else {
            Flasher::setFlash("gagal", "ditambahkan", "danger");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        }
    }
    public function Ubah()
    {
        if ($this->model("Mahasiswa_model")->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash("berhasil", "diubah", "success");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        } else {
            Flasher::setFlash("gagal", "diubah", "danger");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        }
    }
    public function Hapus($id)
    {
        if ($this->model("Mahasiswa_model")->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash("berhasil", "dihapus", "success");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        } else {
            Flasher::setFlash("gagal", "dihapus", "danger");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        }
    }
    public function getubah()
    {
        echo json_encode($this->model("Mahasiswa_model")->GetMahasiswaById($_POST['id']), JSON_PRETTY_PRINT);
    }
    
    public function Cari()
    {
        $data['judul'] = "Data Mahasiswa";
        $data['mhs'] = $this->model("Mahasiswa_model")->cariDataMahasiswa();
        $this->view("templates/header", $data);
        $this->view("mahasiswa/index", $data);
        $this->view("templates/footer");
        
    }
}