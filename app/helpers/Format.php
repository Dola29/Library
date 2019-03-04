<?php
namespace App\Helpers;

class Format{

    /**
     * Este metodo Recibe un arreglo y un bool que le permitan 
     * determinar si se recibe una coleccion de arreglo o un simple arreglo
     * y de acuerdo con la desicion imprime el texto con el formato desado para el libro.
     */

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

    /**
     * Este metodo Recibe un arreglo, un bool y un texto, que le permitan
     * determinar si se recibe una coleccion de arreglo o un simple arreglo
     * y de acuerdo con la desicion imprime el texto con el formato desado para 
     * la pagina.
     */

    
    public static function page_printer($data, $single = false, $format = 'text'){   

        $texto = "<div style='width:95%; padding:3px;'>";

        if($single == false){
        
            foreach($data as $d){
                $texto .=  "<b>Pagina: {$d['number']}</b><br><br>{$d['content']}".
                           "<br><br><b>Del Libro: {$d['book']}</b><br><br><br>";
            }

            $texto .= '</div>';

            echo $texto;

        }else{
            $texto .=  "<b>Pagina: {$data['number']}</b><br><br>{$data['content']}".
                       "<br><br><b>Del Libro: {$data['book']}</b><br><br><br>";
            
            $texto .= '</div>';           
            
            if($format == 'text'){
                echo htmlentities($texto);
            }else {
                echo $texto;
            }           
        }
        
    }
}