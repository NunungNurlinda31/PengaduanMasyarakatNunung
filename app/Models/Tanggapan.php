<?php 
namespace App\Models;

use CodeIgniter\Model;

class Tanggapan extends Model{
    protected $table      = 'tb_tanggapan';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_tanggapan';
    protected $allowedFields = ['id_tanggapan','id_pengaduan','tgl_pengaduan','tanggapan','id_petugas'];
}