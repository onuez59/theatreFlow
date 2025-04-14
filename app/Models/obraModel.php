<?php

namespace App\Models;

use CodeIgniter\Model;

class obraModel extends Model
{
    protected $table = 'OBRA';
    protected $primaryKey = 'cod_obra';
    protected $allowedFields = ['nombre', 'fecha_obra', 'aforo', 'disponibles', 'sala', 'descripcion', 'imagen', 'precio'];

    public function getObrasDisponibles()
    {
        return $this->where('fecha_obra >', date('Y-m-d H:i:s'))
            ->where('disponibles >', 0)
            ->findAll();
    }

    public function reducirDisponibles($cod_obra)
    {
        return $this->set('disponibles', 'disponibles-1', false)
            ->where('cod_obra', $cod_obra)
            ->update();
    }
}
