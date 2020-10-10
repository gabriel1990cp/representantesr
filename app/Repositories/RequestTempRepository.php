<?php

namespace App\Repositories;

use App\PedidoTemp;

class RequestTempRepository
{
    public function addProduct($data)
    {
        return PedidoTemp::create($data);
    }

    public function getProductByCnpj($cnpj)
    {
        return PedidoTemp::with('infoProduct')->where('cnpj', $cnpj)->get();
    }

    public function destroy($id)
    {
        return PedidoTemp::destroy($id);
    }

    public function update($valorSugerido, $id)
    {
        $pedidoTemp = PedidoTemp::find($id);
        $pedidoTemp->valor_sugerido = $valorSugerido;
        return $pedidoTemp->save();
    }
}
