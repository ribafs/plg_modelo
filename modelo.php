<?php

// no direct access
defined('_JEXEC') or die;

class plgContentModelo extends JPlugin{

    public function onContentAfterTitle($context, &$article, &$params, $limitstart){

        $artigo = $this->params->get('artigo_id');

        if($article->id != $artigo){
            return '<p><i>Por <a href="http://ribafs.org" target="_blank">Ribamar FS</a></i></p>';
        }
    }
}

?>
