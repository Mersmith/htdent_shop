<?php

namespace App\Observers;

use App\Models\Producto;
use App\Models\Subcategoria;

class ProductoObserver
{
    public function updated(Producto $producto)
    {
        $tiene_detalle = $producto->tiene_detalle;

        if ($tiene_detalle == 0) {
            $producto->tiene_detalle = null;
        }


        $subcategoria_id = $producto->subcategoria_id;
        $subcategoria = Subcategoria::find($subcategoria_id);

        if ($subcategoria->tiene_medida) {
            if ($producto->colores->count()) {
                $producto->colores()->detach();
            }
        } elseif ($subcategoria->tiene_color) {
            if ($producto->medidas->count()) {
                foreach ($producto->medidas as $medida) {
                    $medida->delete();
                }
            }
        } else {
            if ($producto->colores->count()) {
                $producto->colores()->detach();
            }
            if ($producto->medidas->count()) {
                foreach ($producto->medidas as $medida) {
                    $medida->delete();
                }
            }
        }
    }
}
