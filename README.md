## Plugin tipo content para o Jooomla 3

# Dizendo não para o lado negro da força (MS) mudei para o GitLab. Manterei os arquivos aqui em respeito aos usuários e ao antigo GitHub mas estarei atualizando somente no GitLab daqui pra frente.
https://gitlab.com/ribafs/plg_modelo

Este simples plugin tem como objetivo inserir os créditos em todos os artigos logo abaixo do título dos mesmos.
Insere mesmo os criados antes.

Chega a ser redundante, visto que o Joomla já faz isto, mas vale como exercício.

Como este plugin adiciona o crédito em todos os artigos indiscriminadmente, vou procurar evitar algum artigo passando como parâmetro o id do artigo recebido pela função onContentAfterTitle().

O XML teve o acréscimo de um campo de form:
	<config>
		<fields name="params">
			<fieldset name="basic">
				<field
					name="artigo_id"
					type="text"
					label="Artigo"
					description="ID do Artigo"
                    default="2"
				/>
            </fieldset>
        </fields>
    </config>


Então seu código php:
<?php

// no direct access
defined('_JEXEC') or die;

class plgContentCredit extends JPlugin{
    public function onContentAfterTitle($context, &$article, &$params, $limitstart){

        $artigo = $this->params->get('artigo_id');

        if($article->id != $artigo){
            return '<p><i>Por <a href="http://ribafs.org" target="_blank">Ribamar FS</a></i></p>';
        }
    }
}

?>

Assim experimente acessar:
http://localhost/joomlasem/index.php?option=com_content&view=article&id=2

Não mostrará o crédito. Mas para os demais artigos mostrará, como por exemplo:
http://localhost/joomlasem/index.php?option=com_content&view=article&id=1

## Licença

GPL 3
