<?php
namespace Base\Helpers;

final class RenderHelper extends NotInstantiable
{
    static public function renderHtmlPage ($view, $data = array()) {
        $m = new \Mustache_Engine(array(
            'loader' => new \Mustache_Loader_FilesystemLoader(PATH_VIEWS, array('extension' => '.html'))
        ));
        // depois implementas array para verificar se o content e string ou seja um partial
        // ou se possui o content possui mais de um partial...depois eu implemento...
        $data['page'] = $m->render('pages/'. $view['page'], $data);
        return $m->render($view['layout'], $data);
    }

    static public function renderHtml ($view, $data = null) {
        $m = new \Mustache_Engine(array(
            'loader' => new \Mustache_Loader_FilesystemLoader(PATH_VIEWS, array('extension' => '.html'))
        ));
        
        return $m->render($view['layout'], $data);
    }

    static public function renderModile ()
    {
        // TODO
    }
}