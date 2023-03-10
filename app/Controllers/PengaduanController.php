<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;

class PengaduanController extends BaseController{
    protected $pengaduan, $tanggapans;
    function __construct()
    {
        $this->pengaduans = new Pengaduan;
        $this->tanggapans = new Tanggapan;
    }
    function index()
    {
        if(session()->get('level')== 'masyarakat'){
        $data['pengaduan'] = $this->pengaduans->where(['nik'->session()->get('nik')])->findAll();
        }else{
            $data['pengaduan'] = $this->pengaduans->findAll();
        }
        return view('pengaduan_view',$data);
    }
    public function save(){
        $dataFile=$this->request->getFile('foto');
        $Filename=$datafile->getRandomName();
        $data= [
            'tgl_pengaduan'=>date('Y:m:d H:i:s'),
            'nik'=>session()->get('nik'),
            'isi_laporan'=>$this->request->getPost('isi_laporan'),
            'foto'=>$Filename,
            'status'=> '0',
        ];
        $this->pengaduanss->insert($data);
        
        $databerkas->move('uploads/berkas/', $filename);
        return redirect('pengaduan');
    }
    
    public function delete($id)
    {
        $this->pengaduans->delete($id);
        return $this->response->redirect('/pengaduan');
    }
}