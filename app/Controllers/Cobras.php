<?php

namespace App\Controllers;

use App\Models\obraModel;

class Cobras extends BaseController
{
    public function index()
    {
        $model = new ObraModel();
        $data['obras'] = $model->getObrasDisponibles();

        return view('obras/list', $data);
    }

    public function comprar($cod_obra)
    {
        $f = fopen('on.txt', 'w');
        fprintf($f, "Datos: %s\n", print_r($cod_obra, true));
        fclose($f);
        $model = new ObraModel();
        $data['obra'] = $model->find($cod_obra);



        if (!$data['obra'] || $data['obra']['fecha_obra'] < date('Y-m-d H:i:s') || $data['obra']['disponibles'] <= 0) {
            return redirect()->to('/')->with('error', 'Lo sentimos, esta obra ya no está disponible');
        }

        // Agregar metadatos para SEO
        $data['meta'] = [
            'title' => "Reservar: {$data['obra']['nombre']} | Theatre Flow",
            'description' => "Reserva tus entradas para {$data['obra']['nombre']} - {$data['obra']['descripcion']}"
        ];

        return view('obras/comprar', $data);
    }
}
