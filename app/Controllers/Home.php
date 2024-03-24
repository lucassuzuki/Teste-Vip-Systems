<?php
namespace App\Controllers;


class Home extends BaseController
{
    public function index(): string
    {
        // $db = \Config\Database::connect();
        // $builder = $db->table('vip_clientes');
        // echo "<pre>";
        // var_dump($builder->get()->getResultArray());

        return view('index');

    }

    
    
    public function dashboard()
    {
        if (!session()->has('nome')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('dashboard');
    }



    


}
