<?php

namespace App\Controllers;

class Validacao extends BaseController
{

    public function segundaValidacao()
    {
        $info = $this->request->getPost()['info'];

        switch ($info) {
            case 'nome_mae':
                $nome_mae = $this->request->getPost('nome_mae');
                // $data = ["nome_mae" => $nome_mae];
                $result = $this->validaNomeMae($nome_mae);
                break;
            case 'dia_ano':
                $dia = $this->request->getPost('dia');
                $ano = $this->request->getPost('ano');
                // $data = ["dia" => $dia, "ano" => $ano];
                $result = $this->validaDiaAno($dia, $ano);
                break;
            case 'mes_ano':
                $mes = $this->request->getPost('mes');
                $ano = $this->request->getPost('ano');
                // $data = ["mes" => $mes, "ano" => $ano];
                $result = $this->validaMesAno($mes, $ano);
                break;
            case 'dia_mes':
                $dia = $this->request->getPost('dia');
                $mes = $this->request->getPost('mes');
                // $data = ["dia" => $dia, "mes" => $mes];
                $result = $this->validaDiaMes($dia, $mes);
                break;

            default:

                break;
        }

        
        if ($result) {
            session()->set([
                'id' => $result->id_cliente,
                'nome' => $result->nome,
            ]);
            return view('dashboard');

        }
        session()->setFlashdata('failed-login', 'Dados incorretos!');
        return redirect()->back();
    }

    public function validaDados($usuario, $senha)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('vip_clientes');
        $builder->select('mae, dtnasc, id_cliente, nome');
        $builder->where('cpf', $usuario);

        $result = $builder->get()->getRow();
        if ($result) {
            $builder->where('senha', $senha);
            $result_valida_senha = $builder->get()->getRow();
            $data = [
                'id_cliente' => $result->id_cliente,
                'result_valida_senha' => $result_valida_senha,
            ];
            return ($data);
        }
        return "cpf inválido";
    }

    public function validaNomeMae($nome_mae)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('vip_clientes');
        $builder->select('mae, dtnasc, id_cliente, nome');
        $builder->where('mae', $nome_mae);
        $result = $builder->get()->getRow();
        return $result;
    }
    public function validaDiaAno($dia, $ano)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('vip_clientes');
        $builder->select('mae, dtnasc, id_cliente, nome');
        $builder->where("DATE_FORMAT(dtnasc, '%d')", $dia);
        $builder->where("DATE_FORMAT(dtnasc, '%Y')", $ano);

        $result = $builder->get()->getRow();

        return $result;
    }
    public function validaMesAno($mes, $ano)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('vip_clientes');
        $builder->select('mae, dtnasc, id_cliente, nome');
        $builder->where("DATE_FORMAT(dtnasc, '%m')", $mes);
        $builder->where("DATE_FORMAT(dtnasc, '%Y')", $ano);

        $result = $builder->get()->getRow();
        return $result;
    }
    public function validaDiaMes($dia, $mes)
    {

        $db = \Config\Database::connect();
        $builder = $db->table('vip_clientes');
        $builder->select('mae, dtnasc, id_cliente, nome');
        $builder->where("DATE_FORMAT(dtnasc, '%d')", $dia);
        $builder->where("DATE_FORMAT(dtnasc, '%m')", $mes);

        $result = $builder->get()->getRow();
        return $result;
    }

}



?>