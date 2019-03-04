<?php
namespace App\Helpers;

class Format{

    public static function book_printer($data, $single = false){   

        $texto = '<h5>';

        if($single == false){
        
            foreach($data as $d){
                $texto .=  "Codigo:{$d['id']}<br>Titulo:{$d['title']}<br>Categoria: {$d['category']}".
                        " <br> Autor: {$d['author']} <br> Fecha: {$d['date']} <br><br>";
            }

        }else{
               $texto .=  "Codigo:{$data['id']}<br>Titulo:{$data['title']}<br>Categoria: {$data['category']}".
                            " <br> Autor: {$data['author']} <br> Fecha: {$data['date']} <br><br>";
        }

        $texto .= '</h5>';
        echo $texto;
    }

    
    public static function page_printer($data, $single = false, $format = 'text'){   

        $texto = '<h5>';

        if($single == false){
        
            foreach($data as $d){
                $texto .=  "Codigo:{$d['id']}<br>Titulo:{$d['title']}<br>Categoria: {$d['category']}".
                        " <br> Autor: {$d['author']} <br> Fecha: {$d['date']} <br><br>";
            }

        }else{
               $texto .=  "Codigo:{$data['id']}<br>Titulo:{$data['title']}<br>Categoria: {$data['category']}".
                            " <br> Autor: {$data['author']} <br> Fecha: {$data['date']} <br><br>";
        }

        $texto .= '</h5>';
        echo $texto;
    }
}