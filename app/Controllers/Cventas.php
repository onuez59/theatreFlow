<?php

namespace App\Controllers;

use App\Models\obraModel;
use App\Models\ventaModel;

class Cventas extends BaseController
{

    public function procesarCompra()
    {
        $rules = [
            'cod_obra' => 'required|numeric',
            'comprador' => 'required|min_length[3]|max_length[100]',
            'comprador_id' => 'required|min_length[5]|max_length[20]|alpha_numeric' // Validación para ID
        ];

        // Mensajes personalizados (opcional)
        $messages = [
            'comprador_id' => [
                'required' => 'El identificador es obligatorio',
                'min_length' => 'El identificador debe tener al menos 5 caracteres',
                'max_length' => 'El identificador no puede exceder 20 caracteres'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $cod_obra = $this->request->getPost('cod_obra');
        $comprador = $this->request->getPost('comprador');
        $comprador_id = $this->request->getPost('comprador_id');

        $obraModel = new ObraModel();
        $ventaModel = new VentaModel();

        // valido disponible
        $obra = $obraModel->find($cod_obra);
        if (!$obra || strtotime($obra['fecha_obra']) < time() || $obra['disponibles'] <= 0) {
            return redirect()->to(base_url('/'))->with('error', 'La obra no está disponible');
        }

        //? Hacer Venta
        $venta_id = $ventaModel->insert([
            'cod_obra' => $cod_obra,
            'comprador' => $comprador,
            'comprador_id' => $comprador_id,
            'fecha_compra' => date('Y-m-d H:i:s')
        ]);

        //!Restar vacante o asiento
        $obraModel->update($cod_obra, [
            'disponibles' => $obra['disponibles'] - 1
        ]);
        return redirect()->to(base_url("confirmacion/$venta_id"))->with('success', 'Compra realizada con éxito');
    }

    public function confirmacion($numero_venta)
    {
        $ventaModel = new VentaModel();
        $obraModel = new ObraModel();

        $venta = $ventaModel->find($numero_venta);
        if (!$venta) {
            return redirect()->to('/')->with('error', 'Reserva no encontrada');
        }

        $data = [
            'venta' => $venta,
            'obra' => $obraModel->find($venta['cod_obra']),
            'meta' => [
                'title' => "Reserva Confirmada | Theatre Flow",
                'description' => "Detalles de tu reserva #{$numero_venta}"
            ]
        ];

        return view('ventas/confirmacion', $data);
    }
}
