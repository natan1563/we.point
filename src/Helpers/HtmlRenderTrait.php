<?php

namespace Helpers;

use Exception;

trait HtmlRenderTrait
{
    public function htmlRender(array $dataRoute)
    {
        $controlRoute = (isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : $_SERVER['REQUEST_URI']);

        if ($controlRoute === $dataRoute['route']) {

            try {
                
                if (!file_exists($dataRoute['path']))
                    throw new \Exception('Arquivo inexistente');

                if (count($dataRoute['params']) > 0)
                    extract($dataRoute['params']);

                ob_start();
                    require_once($dataRoute['title']);
                    require_once($dataRoute['path']);
                    require_once($dataRoute['footer']);
                $html = ob_get_clean();
                
                echo $html;
                
            } catch (Exception $excpt) {
                echo 'Algum dos arquivos nâo foi encontrado';
            }
        }
    }
}

