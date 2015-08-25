<?php

return array(
	'name'=>'Haras',
	'defaultController'=>'haras',
	'import'=>array(
        'application.models.*',
        'ext.yii-mail.YiiMailMessage',
    ),
	'components'=>array(
		'mail' => array(
 			'class' => 'ext.yii-mail.YiiMail',
 			'transportType' => 'php',
 			'viewPath' => 'application.views.mail', 
 			'logging' => true,
 			'dryRun' => false
 		),
		'db' => array(
            'class'=>'CDbConnection',
            'connectionString'=>'mysql:host=127.0.0.1;dbname=darabas_haras',
            'username'=>'root',
            'password'=>'78951236',
            'charset'=>'utf8',
        ),
		'urlManager' => array(
			'urlFormat'=>'path',
			'rules'=>array(
				 //abrir home			
				'inicio'=>'haras/abrir',
				
				 //abrir admin			
				'admin'=>'haras/admin',
				'admin/<ferramenta:\d+>'=>'haras/admin',
				
				 //abrir vendas			
				'vendas'=>'haras/vendas',
				'vendasInterna/<tipovenda:\d+>'=>'haras/vendasInterna',
				'carregarVendas'=>'haras/carregarVendas',
				
				 //abrir história			
				'historia'=>'haras/historia',
				
				 //abrir contato			
				'contato'=>'haras/contato',
				
				 //Página de login			
				'abrirLogin'=>'haras/abrirLogin',
				'logarUsuario'=>'haras/logarUsuario',
				'deslogarUsuario'=>'haras/deslogarUsuario',
				
				 //cadastro de usuario
				'cadastroUsuario'=>'haras/cadastroUsuario',
				'cadastroNovaSenha'=>'haras/cadastroNovaSenha',
				
				 //abrir páginas
				'page/<page:\w+>'=>'haras/abrir',
				
				
				// ACTIONS AJAX
				
				'salvarNovaVenda'=>'haras/salvarNovaVenda',
				'vendaExcluido'=>'haras/vendaExcluido',
				'vendaCarregar'=>'haras/vendaCarregar',
				'vendaPaginacao'=>'haras/vendaPaginacao',
				'qtdVendas'=>'haras/qtdVendas',
				
				'animalExcluido'=>'haras/animalExcluido',
				'premiacaoExcluido'=>'haras/premiacaoExcluido',
				'animalCarregar'=>'haras/animalCarregar',
				'animalFindAll'=>'haras/animalFindAll',
				'animalPaginacao'=>'haras/animalPaginacao',
				'qtdAnimais'=>'haras/qtdAnimais',
				'animal/<id:\d+>'=>'haras/animal',
				'animal/venda/<id:\d+>'=>'haras/animalVenda',
				'findAnimal'=>'haras/findAnimal',
				'tipoAnimal/<tipoanimal:\d+>'=>'haras/tipoAnimal',
				'salvarNovoAnimal'=>'haras/salvarNovoAnimal',
				
				'exposicaoExcluido'=>'haras/exposicaoExcluido',
				'exposicaoCarregar'=>'haras/exposicaoCarregar',
				'exposicaoPaginacao'=>'haras/exposicaoPaginacao',
				'qtdExposicoes'=>'haras/qtdExposicoes',
				'exposicaoGrupo'=>'haras/exposicaoGrupo',
				'exposicao/<id:\d+>'=>'haras/exposicao',
				'findExposicao'=>'haras/findExposicao',
				'salvarNovaExposicao'=>'haras/salvarNovaExposicao',
				
				'racas'=>'haras/racas',
				'salvarRaca'=>'haras/salvarRaca',
				'deletarRaca'=>'haras/deletarRaca',
				
				'tipovendas'=>'haras/tipovendas',
				'salvarTipovenda'=>'haras/salvarTipovenda',
				'deletarTipovenda'=>'haras/deletarTipovenda',
				
				'paginas'=>'haras/paginas',
				'salvarPagina'=>'haras/salvarPagina',
				'deletarPagina'=>'haras/deletarPagina',
				
				'carregarConfig'=>'haras/carregarConfig',
				'salvarConfig'=>'haras/salvarConfig',
				
				//Direcionamentos pages ADMIN
				
				'adminPage/<pasta:\w+>/<page:\w+>'=>'haras/adminPage',
				'adminPage/<pasta:\w+>/<page:\w+>/<cadastro:\w+>'=>'haras/adminPage',
				'getAdminPages'=>'haras/getAdminPages',
				
				'enviarEmail'=>'haras/enviarEmail',
				'salvarGeral'=>'haras/salvarGeral',
				'getGeral'=>'haras/getGeral',
				
			),
		),
	),
);