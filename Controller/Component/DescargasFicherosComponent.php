<?php
/**
 * User: rtejada
 * Date: 29/03/13
 * Time: 10:29
 *
 */

App::uses('Component', 'Controller');

class DescargasFicherosComponent extends Component {

    public function descarga($modelo, $directorio, $fichero) {

        $url_foto = APP.DS.DIRECTORIO_UPLOADS.DS.$modelo.DS.RUTA_IMAGEN_DIR_FOTO.DS.$directorio.DS.$fichero;
        $file =$url_foto;
        header("Pragma: public");
        header('Content-Description: File Transfer');
        header('Content-Transfer-Encoding: binary');
        header("Content-disposition: attachment; filename= ".$fichero."");
        ob_clean();
        flush();
        readfile($file);

    }

}