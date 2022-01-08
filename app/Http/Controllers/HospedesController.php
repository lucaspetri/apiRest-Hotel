<?php

namespace App\Http\Controllers;
use App\Models\Hospede;

use Illuminate\Http\Request;

class HospedesController extends Controller
{

    public function createHospedes(Request $request) {
    $hospede = new Hospede;
    $hospede->nome = $request->nome;
    $hospede->telefone = $request->telefone;
    $hospede->email = $request->email;
    $hospede->cpf = $request->cpf;
    $hospede->save();

    return response()->json([
        "msg" => "Hospede cadastrado com sucesso."
    ], 201);
    }

    public function getAllHospedes() {
        $hospede = Hospede::get();

        return response()->json($hospede, 200);
    }

    public function getHospedes($id) {
        if (Hospede::where('id', $id)->exists()) {
            $hospede = Hospede::where('id', $id)->get();
            return response($hospede, 200);
            }
            else {
                return response()->json([
                "msg" => "Hospede não encontrado."
                ], 404);
          }
    }

    public function updateHospedes(Request $request, $id) {
        if (Hospede::where('id', $id)->exists()) {
            $hospede = Hospede::find($id);

            $hospede->nome = $request->nome;
            $hospede->telefone = $request->telefone;
            $hospede->email = $request->email;
            $hospede->cpf = $request->cpf;
            $hospede->save();

            return response()->json([
              "msg" => "Hospede atualizado com sucesso!"
            ], 200);
        } else {
            return response()->json([
                "msg" => "Hospede não encontrado."
            ], 404);
          }
    }

    public function deleteHospedes ($id) {
        if(Hospede::where('id', $id)->exists()) {
            $hospede = Hospede::find($id);
            $hospede->delete();

            return response()->json([
                "msg" => "Hospede deletado com sucesso!"
            ], 200);
        } else {
            return response()->json([
            "msg" => "Hospede não encontrado."
            ], 404);
        }
    }
}
