<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Petugas;
use App\Models\Masyarakat;

class LoginController extends BaseController
{
    protected $masyarakats;

    function __construct()
    {
        $this->masyarakats = new Masyarakat();
    }
    public function index()
    {
        return view('login_view');
    }
    public function register()
    {
        return view('register_view');
    }
    
    public function saveRegister()
    {
        $ceknik = $this->masyarakats->where('nik',$this->request->getPost('nik'))->findAll();
        if ($ceknik==null)
    {
        $data = array (
            'nik'=>$this->request->getPost('nik'),
            'nama'=>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            'password'=>password_hash($this->request->getPost('password')."",PASSWORD_DEFAULT),
            'telp'=>$this->request->getPost('telp'),
        );    
        $this->masyarakats->insert($data);
        return redirect('/login');
        }
        else
        {
            return redirect('register')->with('error',lang('Nik sudah ada'));
        }
    }
    public function login()
    {
        $masy = new Masyarakat();
        $petugas = new Petugas();

        $username= $this->request->getPost('username');
        $password= $this->request->getPost('password'."");
        $cekPetugass= $petugas->where(['username'=>$username])->first();
        $cekmasy= $masy->where(['username'=>$username])->first();
        if (!($cekmasy)&&!($cekPetugass))
        {
            return redirect('login')->with("error",lang('username tidak ditemukan'));
        }
        else
        {
            if ($cekmasy)
            {
                if (password_verify($password, $cekmasy['password'])) {
                    session()->set([
                        'nik'=>$cekmasy('nik'),
                        'nama_masyarakat'=>$cekmasy('nama_masyarakat'),
                        'level'=>'masyarakat',
                        'log_in'=>true,
                    ]);
                    return redirect('/');
                }
                else
                {
                    return redirect('login')->with("error",lang('password masyarakat salah'));
                }
            }
            if ($cekPetugass) {
                if (password_verify($password, $cekPetugass['password'])) {
                session()->set([
                    'id_petugas'=> $cekPetugass('id_petugas'),
                    'nama_petugas'=> $cekPetugass('nama_petugas'),
                    'level'=> $cekPetugass('level'),
                    'log_in'=>true,
                ]);    
                return redirect('/');
            }else{
                return redirect('login')->with("error",lang('password petugas salah'));
            }
            }
        }
    }
public function logout()
{
    session()->destroy();
    return $this->response->redirect('login');
}
}