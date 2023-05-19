<?php 

class Mahasiswa_model{
    // private $mhs = [
    //     [
    //         "nama" => "imanuel",
    //         "nim" => "2201",
    //         "jurusan" => "TRPL"
    //     ],
    //     [
    //         "nama" => "imanuel",
    //         "nim" => "2202",
    //         "jurusan" => "TRPL"
    //     ]
    //     ];
  
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getAllMHS()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMHSByID($id){
        $this->db->query('SELECT * FROM ' . $this->table. ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function creatMHS($data){
        $query= "INSERT INTO mahasiswa VALUE ('', :nama, :nim, :jurusan)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteMHS($id){
        $query= "DELETE FROM mahasiswa WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateMHS($data){
        $query= "UPDATE mahasiswa SET
                    nama = :nama,
                    nim = :nim,
                    jurusan = :jurusan
                WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariMHS()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }


}