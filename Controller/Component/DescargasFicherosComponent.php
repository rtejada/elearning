<?php
/**
 * User: rtejada
 * Date: 29/03/13
 * Time: 10:29
 *
 */

App::uses('Component', 'Controller');

class DescargasFicherosComponent extends Component {

    public function descarga($modelo, $directorio, $fichero, $campo) {

        $url_foto = APP.DIRECTORIO_UPLOADS.DS.$modelo.DS.$campo.DS.$directorio.DS.$fichero;
        $file =$url_foto;

        if (file_exists($file)) {

            $mime_type = mime_content_type($file);
            header("Pragma: public");
            header('Content-Description: File Transfer');
            header("Content-Type: {$mime_type}");
            header('Content-Transfer-Encoding: binary');
            header("Content-disposition: attachment; filename= ".$fichero."");
            ob_clean();
            flush();
            $salida = readfile($file);
        }

    }

}