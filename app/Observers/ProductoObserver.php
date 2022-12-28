<?php

namespace App\Observers;

use App\Models\Producto;
use App\Models\Subcategoria;

class ProductoObserver
{
    public function updated(Producto $producto)
    {
        $subcategoria_id = $producto->subcategoria_id;
        $subcategory = Subcategoria::find($subcategoria_id);

        if ($subcategory->size) {

            if ($producto->colors->count()) {
                $producto->colors()->detach();
            }
        } elseif ($subcategory->color) {
            if ($producto->sizes->count()) {
                foreach ($producto->sizes as $size) {
                    $size->delete();
                }
            }
        } else {
            if ($producto->colors->count()) {
                $producto->colors()->detach();
            }

            if ($producto->sizes->count()) {
                foreach ($producto->sizes as $size) {
                    $size->delete();
                }
            }
        }
    }
}
