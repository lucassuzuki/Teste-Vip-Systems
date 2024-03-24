<?php

namespace App\Controllers;
use App\Controllers\Validacao;

class Usuario extends BaseController{

    public function login()
    {
        $validacao = new Validacao();

        $usuario = $this->request->getPost()['usuario'];
        $senha = $this->request->getPost()['senha'];
        

        $result = $validacao->validaDados($usuario, $senha);
        if ($result == 'cpf inválido') {
            session()->setFlashdata('cpf-invalido', 'cpf inválido');
            return redirect()->back();
        } else if ($result['id_cliente']) {
            if ($result['result_valida_senha']) {
                $valores = explode("-", $result['result_valida_senha']->dtnasc);
                $ano = $valores[0];
                $mes = $valores[1];
                $dia = $valores[2];

                $list = [
                    'nome_mae' => $result['result_valida_senha']->mae,
                    // 'dia_ano' => $dia . '-' . $ano,
                    // 'mes_ano' => $mes . '-' . $ano,
                    // 'dia_mes' => $dia . '-' . $mes,
                ];

                $chave_aleatorio = array_rand($list);

                session()->setFlashdata('valor-aleatorio', $chave_aleatorio);
                return redirect()->back();
            }

        }

        session()->setFlashdata('failed-login', 'senha incorreta!');
        $data = [
            'id_cliente' => $result['id_cliente'],
            'idstatus' => -1,
            'motbloqueio' => "senha incorreta."
        ];



        $db = \Config\Database::connect();
        $builder = $db->table('vip_movcli');
        $builder->insert($data);

        return redirect()->back();
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}

?>