<?php

namespace App\Http\Controllers;

use App\Models\pedido;
use Illuminate\Http\Request;

class pedidosController extends Controller
{
    //Função para armazenar no banco de dados apenas se os valores estiverem corretos com o da API
    public function store(Request $request){

        $check = $this::get_endereco($request->cep);
        $check['cep'] = preg_replace("/[^0-9]/", "", $check['cep']);

        if($request->cep != $check['cep'] || $request->rua != $check['logradouro'] || $request->bairro != $check['bairro'] ||
        $request->cidade != $check['localidade'] || $request->estado != $check['uf']){
            return back()->with('error', 'error');
        }

        pedido::updateOrCreate([
            "nome" => $request->nome,
            "sobrenome" => $request->sobrenome,
            "pedido" => $request->pedido,
            "cep" => $request->cep,
            "rua" => $request->rua,
            "bairro" => $request->bairro,
            "cidade" => $request->cidade,
            "estado" => $request->estado,
            "numero" => $request->numero
        ]);


        return redirect()->route("newTask")->with('status', 'okay!');;
    }


    //Retornar todos os dados salvos no banco de dados
    public function show(){

        $pedidos = pedido::get()->all();

        return view('_partials.taskList', compact('pedidos'));
    }


    //Função para retornar os valores relacionados ao CEP
    public static function get_endereco($cep){
        // formatar o cep removendo caracteres nao numericos
        $cep = preg_replace("/[^0-9]/", "", $cep);
        $str = file_get_contents("https://viacep.com.br/ws/$cep/json/");
      
        $json = json_decode($str, true);
        return $json;
      }
}
