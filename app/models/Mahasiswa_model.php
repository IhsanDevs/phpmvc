<?php 
class Mahasiswa_model {
    // private $mhs = [
    //     [
    //         "nama" => "Ihsan Devs",
    //         "nrp" => 97324374085406,
    //         "email" => "demo123@me.com",
    //         "jurusan" => "Komputer"
    //     ],
    //     [
    //         "nama" => "Ihsan Devs",
    //         "nrp" => 97324374085406,
    //         "email" => "demo123@me.com",
    //         "jurusan" => "Komputer"
    //     ],
    //     [
    //         "nama" => "Ihsan Devs01",
    //         "nrp" => 97324374038706,
    //         "email" => "demo124@me.com",
    //         "jurusan" => "Desain Grafis"
    //     ],
    //     [
    //         "nama" => "Ihsan Devs02",
    //         "nrp" => 97324374092006,
    //         "email" => "demo125@me.com",
    //         "jurusan" => "Agama"
    //     ]
    // ];
    
    private $table = "mahasiswa";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function GetAllMhs()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultSet();
    }
    public function GetMahasiswaById($id)
    {
        $this->db->query("SELECT * FROM `{$this->table}` WHERE id=:id;");
        $this->db->bind("id", $id);
        return $this->db->single();
    }
    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa
                    VALUES
                ('', :nama, :nrp, :email, :jurusan)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET
                    nama = :nama,
                    nrp = :nrp,
                    email = :email,
                    jurusan = :jurusan
                WHERE id = :id;";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind("keyword", "%$keyword%");
        $this->db->execute($query);
        return $this->db->resultSet();
    }
}