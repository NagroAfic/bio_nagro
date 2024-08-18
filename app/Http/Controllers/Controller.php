<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public static function limpiarTexto($texto) {
        // Reemplazar tildes y caracteres especiales
        $texto = strtr($texto,
            'áéíóúÁÉÍÓÚüÜñÑ',
            'aeiouAEIOUuUnN'
        );

        // Reemplazar espacios por guiones
        $texto = str_replace(' ', '-', $texto);
        $texto = str_replace('¿', '', $texto);
        $texto = str_replace('?', '', $texto);
        $texto = str_replace('!', '', $texto);
        $texto = str_replace('¡', '', $texto);
        $texto = str_replace('ñ', 'n', $texto);
        $texto = str_replace('Ñ', 'n', $texto);
        $texto = str_replace('\xB1o', '', $texto);

        // Convertir a minúsculas
        $texto = strtolower($texto);

        return $texto;
    }

}
