<?php

namespace App\Repositories;

use App\Transportadora;

class CarrierRepository
{
    protected $carrier;

    public function __construct(Transportadora $carrier)
    {
        $this->carrier = $carrier;
    }

    public function getCarrierByCnpj($cnpj)
    {
        return $this->carrier->where('tax', $cnpj)->get();
    }
}
