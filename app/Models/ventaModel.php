<?php

namespace App\Models;

use CodeIgniter\Model;

class ventaModel extends Model
{
    protected $table = 'VENTA';
    protected $primaryKey = 'numero_venta';
    protected $allowedFields = ['cod_obra', 'comprador', 'comprador_id', 'fecha_compra'];

    public function crearVenta($data)
    {
        return $this->insert($data);
    }
}
