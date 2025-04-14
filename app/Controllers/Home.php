<?php

namespace App\Controllers;

use App\Models\ObraModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new ObraModel();
        $data = [
            'obras' => $model->getObrasDisponibles(),
            'titulo' => 'Cartelera de Teatro'
        ];

        return view('index', $data); // Renderiza views/index.php
    }
}
