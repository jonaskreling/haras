<?php

/**
 * HarasController class file.
 * @author Jonas Kreling <jonasfrancokreling@gmail.com>
 * 
**/
class HarasController extends CController {
	
	// @var string seta a action default
	public $defaultAction='abrir';
	public $acao = '';
	public $anuncio = 0;
	public $tituloPagina = "Haras - Aleixo";
	
	// @parametros de busca do site
	public $tpnegocio = '';
	public $tpimovel = '';
	public $cidade = '';
	public $valor = '';
	public $qtdquarto = '';
	public $qtdbanheiro = '';
	public $qtdgaragem = '';
	public $quintal = '';
	
	public $tipovenda = '';
	public $tipoanimal = '';
	public $idRegistro = '';
	public $animalIsVenda = '';
	
	// @parametros da página de admin
	public $paginaAdminInicial = 1;
	
	/**
	 ** Sessão UTILITÁRIOS
	 **/ 
	public function isAdmin(){
		return Yii::app()->user->tipoUsuario != 0;
	}
	
	private function getDate(){
		return date('Y-m-d H:i:s');
	}
	
	/**
	 ** Sessão LOGIN
	 **/ 
	
	/**
	 * Abre uma determinada página ou o index.php.
	 */ 
	public function actionAbrir() {
		$this->setPageTitle($this->tituloPagina);
		if (isset($_GET['page']) && $_GET['page'] != "") {
			$this->render($_GET['page']);
		} else {
			$this->render("index");
		}
	}
	
	/**
	 * Abre a página de Login.
	 */ 
	public function actionAbrirLogin() {
		if(!Yii::app()->user->isGuest){
			$this->render("index");
		}else{
			$this->setPageTitle($this->tituloPagina);
			$this->layout = "nulo";
			$this->render("login");
		}
	}
	
	/**
	 * Relogar no sistema.
	 */ 
	public function reLogarUsuario($email, $senha, $action) {
		$identity = new UserIdentity($email,$senha);
		if($identity->authenticate()){
			Yii::app()->user->login($identity);
			if(isset($action) && $action != ""){
				$this->redirect($action);
			}else{
				$this->redirect('admin/1');
			}
		} else {
			$this->render('erro');
		}
			
	}
	
	/**
	 * Logar usuário no sistema validando suas credenciais.
	 */ 
	public function actionLogarUsuario() {
		$identity = new UserIdentity($_POST['email'],$_POST['senha']);
		if($identity->authenticate()){
			Yii::app()->user->login($identity);
			if(isset($_POST['action']) && $_POST['action'] != ""){
				$this->redirect($_POST['action']);
			}else{
				$this->redirect('admin/1');
			}
		} else {
			$this->render('erro');
		}
	}
	
	/**
	 * Deslogar do login do usuário.
	 */ 
	public function actionDeslogarUsuario() {
		Yii::app()->user->logout();
		$this->actionAbrir();
	}
	
	/**
	 * Cadastro de usuários para fazer login.
	 */
	public function actionCadastroUsuario() {
		if(isset($_POST['usuarioid']) && $_POST['usuarioid'] != ""){
			$usuario = Usuario::model()->findByPk($_POST['usuarioid']);
			$usuario->nome       = trim(isset($_POST['nome'])? $_POST['nome'] : $usuario->nome);
			$usuario->sobrenome  = trim(isset($_POST['sobrenome'])? $_POST['sobrenome'] : $usuario->sobrenome);
			$usuario->nascimento = isset($_POST['data'])? $_POST['data'] : $usuario->nascimento;
			$usuario->sexo       = isset($_POST['sexo'])? $_POST['sexo'] : $usuario->sexo;
			$usuario->celular    = trim(isset($_POST['celular'])? $_POST['celular'] : $usuario->celular);
			$usuario->email      = trim(isset($_POST['email'])? $_POST['email'] : $usuario->email);
			$usuario->ultimaMudanca		 = $this->getDate();
			$usuario->save();
			$this->reLogarUsuario($usuario->email, $usuario->senha, "admin/6");
		}else{
			$usuario = new Usuario;
			$usuario->nome       = trim(isset($_POST['nome'])? $_POST['nome'] : "");
			$usuario->sobrenome  = trim(isset($_POST['sobrenome'])? $_POST['sobrenome'] : "");
			$usuario->nascimento = isset($_POST['data'])? $_POST['data'] : "";
			$usuario->sexo       = isset($_POST['sexo'])? $_POST['sexo'] : "";
			$usuario->celular    = trim(isset($_POST['celular'])? $_POST['celular'] : "");
			$usuario->email      = trim(isset($_POST['email'])? $_POST['email'] : "");
			$usuario->senha      = trim(isset($_POST['senha'])? $_POST['senha'] : "");
			$usuario->ultimaMudanca	 = $this->getDate();
			$usuario->save();
			$this->redirect('abrirLogin');
		}
	}
	
	/**
	 * Abre a página de admin do sistema.
	 */ 
	public function actionAdmin() {
		if(!Yii::app()->user->isGuest){
			if(isset($_POST['ferramenta']) && $_POST['ferramenta'] != ''){
				$this->paginaAdminInicial = $_POST['ferramenta'];
			}else if(isset($_GET['ferramenta']) && $_GET['ferramenta'] != ''){
				$this->paginaAdminInicial = $_GET['ferramenta'];
			}
			if(!$this->isAdmin() && ($this->paginaAdminInicial == 1 || $this->paginaAdminInicial == 5)){
				$this->paginaAdminInicial = 2;
			}
			$this->render("admin/admin");
		}else{
			$this->actionAbrirLogin();
		}
	}
	
	/**
	 * Abre a página de venda do sistema.
	 */ 
	public function actionVendas() {
		$this->render("venda/venda");
	}
	
	/**
	 * Abre a página de venda interna do sistema.
	 */ 
	public function actionVendasInterna() {
		if(isset($_POST['tipovenda']) && $_POST['tipovenda'] != ''){
				$this->tipovenda = $_POST['tipovenda'];
		}else if(isset($_GET['tipovenda']) && $_GET['tipovenda'] != ''){
			$this->tipovenda = $_GET['tipovenda'];
		}
		$this->render("venda/vendaInterna");
	}
	
	/**
	 * Abre a página de tipo de animal com os animais cadastrados no sistema.
	 */ 
	public function actionTipoAnimal() {
		if(isset($_POST['tipoanimal']) && $_POST['tipoanimal'] != ''){
				$this->tipoanimal = $_POST['tipoanimal'];
		}else if(isset($_GET['tipoanimal']) && $_GET['tipoanimal'] != ''){
			$this->tipoanimal = $_GET['tipoanimal'];
		}
		$this->render("animal/tipoAnimal");
	}
	
	/**
	 * Abre a página de exposições.
	 */ 
	public function actionExposicaoGrupo() {
		$this->render("exposicao/exposicaogrupo");
	}
	
	/**
	 * Abre a página de história.
	 */ 
	public function actionHistoria() {
		$this->render("historia/historia");
	}
	
	/**
	 * Abre a página de contato.
	 */ 
	public function actionContato() {
		$this->render("contato/contato");
	}
	
	/**
	 * Abre a página de animal.
	 */ 
	public function actionAnimal(){
		if(isset($_POST['id']) && $_POST['id'] != ''){
			$this->idRegistro = $_POST['id'];
		}else if(isset($_GET['id']) && $_GET['id'] != ''){
			$this->idRegistro = $_GET['id'];
		}
		$this->animalIsVenda = 'false';
		$this->render("animal/animal");
	}
	
	/**
	 * Abre a página de animal de venda.
	 */
	public function actionAnimalVenda(){
		if(isset($_POST['id']) && $_POST['id'] != ''){
			$this->idRegistro = $_POST['id'];
		}else if(isset($_GET['id']) && $_GET['id'] != ''){
			$this->idRegistro = $_GET['id'];
		}
		$this->animalIsVenda = 'true'; 
		$this->render("animal/animal");
	}
	
	/**
	 * Abre a página de exposição.
	 */ 
	public function actionExposicao(){
		if(isset($_POST['id']) && $_POST['id'] != ''){
			$this->idRegistro = $_POST['id'];
		}else if(isset($_GET['id']) && $_GET['id'] != ''){
			$this->idRegistro = $_GET['id'];
		}
		$this->render("exposicao/exposicao");
	}
	
	/**
	 * Abre a página de admin.
	 */ 
	public function actionAdminPage(){
		$page = 'animal';
		$pasta = 'animal';
		$cadastro = '';
		if(isset($_POST['page']) && $_POST['page'] != ''){
			$page = $_POST['page'];
		}else if(isset($_GET['page']) && $_GET['page'] != ''){
			$page = $_GET['page'];
		}
		
		if(isset($_POST['pasta']) && $_POST['pasta'] != ''){
			$pasta = $_POST['pasta'];
		}else if(isset($_GET['pasta']) && $_GET['pasta'] != ''){
			$pasta = $_GET['pasta'];
		}
		
		if(isset($_POST['cadastro']) && $_POST['cadastro'] != ''){
			$cadastro = '/'.$_POST['cadastro'];
		}else if(isset($_GET['cadastro']) && $_GET['cadastro'] != ''){
			$cadastro = '/'.$_GET['cadastro'];
		}
		
		$this->layout = "somentehtml";
		$this->render("admin/".$pasta."/".$page.$cadastro);
	}
	
	/**
	 * Obtém páginas de admin.
	 */ 
	public function actionGetAdminPages(){
		$pages = array();
		$pages[] = array('id'=>'animais','title'=>"Animais",'link'=>$this->createUrl('adminPage/animal/animal'),'icon'=>"glyphicon glyphicon-list-alt",'show'=>"true");
		$pages[] = array('id'=>'vendas','title'=>"Vendas",'link'=>$this->createUrl('adminPage/venda/venda'),'icon'=>"glyphicon glyphicon-bookmark",'show'=>"true");
		$pages[] = array('id'=>'exposicoes','title'=>"Exposições",'link'=>$this->createUrl('adminPage/exposicao/exposicao'),'icon'=>"glyphicon glyphicon-flag",'show'=>"true");
		$pages[] = array('id'=>'configuracoes','title'=>"Configurações",'link'=>$this->createUrl('adminPage/configuracao/configuracao'),'icon'=>"glyphicon glyphicon-cog",'show'=>"true");
		$pages[] = array('id'=>'usuario','title'=>"Usuário",'link'=>$this->createUrl('adminPage/usuario/usuario'),'icon'=>"glyphicon glyphicon-user",'show'=>"true");
		
		$pages[] = array('id'=>'cadastroanimal','title'=>"Cadastro de animal",'link'=>$this->createUrl('adminPage/animal/novoanimal/novoanimal'),'icon'=>"glyphicon glyphicon-user",'show'=>"false");
		$pages[] = array('id'=>'cadastroexposicao','title'=>"Cadastro de exposição",'link'=>$this->createUrl('adminPage/exposicao/novaexposicao/novaexposicao'),'icon'=>"glyphicon glyphicon-user",'show'=>"false");
		$pages[] = array('id'=>'cadastrovenda','title'=>"Cadastro de venda",'link'=>$this->createUrl('adminPage/venda/novavenda/novavenda'),'icon'=>"glyphicon glyphicon-user",'show'=>"false");
		
		header('Content-type:application/json');
		echo CJSON::encode($pages);
		exit();
	}
	
	public function actionBuscainicial(){
			
		$this->setPageTitle($this->tituloPagina);
		
		$buscainicial = isset($_POST['buscainicial']) ? $_POST['buscainicial']:"";
		$busca = explode(".", $buscainicial);
		$tpimovel = Tpimovel::model()->find(array('condition'=>'tpimovel=:tpimovel','params'=>array(':tpimovel'=>$busca[1])));
		switch ($busca[0]) {
			case 'alugar':
				$this->tpnegocio = 3;
				$this->tpimovel = $tpimovel->id;		
				break;
			case 'comprar':
				$this->tpnegocio = 2;
				$this->tpimovel = $tpimovel->id;
				break;
			default:
				$this->tpimovel = $tpimovel->id;
				break;
		}
		$this->render('busca');
		
	}
	
	public function actionBusca() {
		
		$this->setPageTitle($this->tituloPagina);
		
		if(isset($_GET['tpnegocio']) && $_GET['tpnegocio'] != ""){
			$this->tpnegocio = isset($_GET['tpnegocio']) ? $_GET['tpnegocio']:"";
			$this->tpimovel = isset($_GET['tpimovel']) ? $_GET['tpimovel']:"";
		}else if(Yii::app()->request->isPostRequest){
			$this->tpnegocio = isset($_POST['tpnegocio']) ? $_POST['tpnegocio']:"";
			$this->tpimovel = isset($_POST['tpimovel']) ? $_POST['tpimovel']:"";
			$this->cidade = isset($_POST['cidade']) ? $_POST['cidade']:"";
			$this->valor = isset($_POST['valor']) ? $_POST['valor']:"";
			$this->qtdquarto = isset($_POST['qtdquarto']) ? $_POST['qtdquarto']:"";
			$this->qtdbanheiro = isset($_POST['qtdbanheiro']) ? $_POST['qtdbanheiro']:"";
			$this->qtdgaragem = isset($_POST['qtdgaragem']) ? $_POST['qtdgaragem']:"";
			$this->quintal = isset($_POST['quintal']) ? $_POST['quintal']:"";
		}
		
		$this->render("busca");
		
	}

	public function actionCadastroNovaSenha() {
		if(isset($_POST['usuarioid']) && $_POST['usuarioid'] != ""){
			$usuario = Usuario::model()->findByPk($_POST['usuarioid']);
			$usuario->senha       = trim($_POST['novasenha']);
			$usuario->ultimaMudanca		 = $this->getDate();
			$usuario->save();
			$this->reLogarUsuario($usuario->email, $usuario->senha, "admin/6");
		}
	}

	public function actionAbrirAnuncio() {
		if(Yii::app()->user->isGuest){
			$this->acao = 'abrirAnuncio';
			$this->layout = 'nulo';
			$this->render('login');
		}else{
			$this->render('anuncie');
		}
	}

	public function actionVerAnuncio() {
		$this->anuncio = $_GET['anuncio'];
		$this->render('anuncio');
	}
	

	/**
	 * ACTIONS AJAX
	 */
	
	/**
	 * DELETE VENDA
	 */ 
	public function actionVendaExcluido(){
		$post = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($post, true);
		
		$venda = Venda::model()->findByPk($parametros['id']);
		
		$response = array();
		if ($venda->delete() === false) {
			$response['success'] = false;
			$response['errors'] = $venda->errors;
		} else {
			$response['success'] = true;
			$response['venda'] = $venda; 
		}
		header('Content-type:application/json');
		echo CJSON::encode($response);
		exit();
	}
	
	/**
	 * DELETE ANIMAL
	 */ 
	public function actionAnimalExcluido(){
		$post = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($post, true);
		
		$animalPremiacao = Animalpremiacao::model()->deleteAll(array('condition'=>' animal=:animal ', 'params'=>array(':animal'=>$parametros['id'])));
		$animal = Animal::model()->findByPk($parametros['id']);
		
		$response = array();
		if ($animal->delete() === false) {
			$response['success'] = false;
			$response['errors'] = $animal->errors;
		} else {
			$response['success'] = true;
			$response['animal'] = $animal; 
		}
		header('Content-type:application/json');
		echo CJSON::encode($response);
		exit();
	}
	
	/**
	 * DELETE PREMIAÇÃO
	 */ 
	public function actionPremiacaoExcluido(){
		$post = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($post, true);
		
		$animalpremiacao = Animalpremiacao::model()->find(array('condition'=>' id=:id ', 'params'=>array(':id'=>$parametros['id'])));
		
		$response = array();
		if ($animalpremiacao->delete() === false) {
			$response['success'] = false;
			$response['errors'] = $animalpremiacao->errors;
		} else {
			$response['success'] = true;
			$response['animalpremiacao'] = $animalpremiacao; 
		}
		header('Content-type:application/json');
		echo CJSON::encode($response);
		exit();
	}
	
	/**
	 * DELETE EXPOSIÇÃO
	 */ 
	public function actionExposicaoExcluido(){
		$post = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($post, true);
		
		$exposicao = Exposicao::model()->findByPk($parametros['id']);
		
		$response = array();
		if ($exposicao->delete() === false) {
			$response['success'] = false;
			$response['errors'] = $exposicao->errors;
		} else {
			$response['success'] = true;
			$response['exposicao'] = $exposicao; 
		}
		header('Content-type:application/json');
		echo CJSON::encode($response);
		exit();
	}
	 
	public function actionCarregarConfig(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$config;
		try{
			$config = Config::model()->findByPk(1);
		}catch(Exception $e){
			$config = 'Erro ao carregar as configurações.';
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($config);
		Yii::app()->end();
		
	}
	
	/**
	 * FINDALL VENDAS
	 */ 
	public function actionVendaCarregar(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " 1=1 ";
		$params = array();
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->offset = $parametros['pagina']*$parametros['limite'];
		$criteria->limit = $parametros['limite'];
		$criteria->order = 'data asc';
		
		$vendas = Venda::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($vendas as $key => $venda) {
			$dados = array();
			$dados['id'] = $venda->id;
			$dados['valor'] = $venda->valor;
			$dados['animal'] = $venda->animal;
			$dados['animalnome'] = isset($venda->Animal)?$venda->Animal->nome:'';
			$dados['animal2'] = $venda->animal2;
			$dados['animal2nome'] = isset($venda->Animal2)?$venda->Animal2->nome:'';
			$dados['tipovenda'] = $venda->tipovenda;
			$dados['tipovendanome'] = isset($venda->Tipovenda)?$venda->Tipovenda->nome:'';
			$dados['data'] = strftime('%d de %b, %Y', strtotime($venda->data));
			$dados['showAnimal2'] = ($venda->animal2 != 0);
			$dados['show'] = true;
			
			$dados['imagens'] = array();
			$imagem = array();
			$imagem['url'] = $venda->url;
			$dados['imagens'][] = $imagem;
			
			$jsons[] = $dados;
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($jsons);
		Yii::app()->end();
	}

	/**
	 * PAGINACAO VENDAS
	 */ 
	public function actionVendaPaginacao(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " 1=1 ";
		$params = array();
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		
		$vendas = Venda::model()->findAll($criteria);
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode(count($vendas));
		Yii::app()->end();
		
	}
	
	/**
	 * PAGINATION ANIMAL
	 */ 
	public function actionAnimalPaginacao(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " 1=1 ";
		$params = array();
		
		$animais = Animal::model()->count(array('condition'=>$condition, 'params'=>$params));
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($animais);
		Yii::app()->end();
		
	}
	
	/**
	 * PAGINATION EXPOSIÇÃO
	 */ 
	public function actionExposicaoPaginacao(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " 1=1 ";
		$params = array();
		
		$exposicoes = Exposicao::model()->count(array('condition'=>$condition, 'params'=>$params));
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($exposicoes);
		Yii::app()->end();
		
	}
	
	/**
	 * COUNT VENDAS
	 */ 
	public function actionQtdVendas(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$sql = "SELECT count(*) FROM Venda WHERE 1 = 1";
		
		$qtd = Yii::app()->db->createCommand($sql)->queryScalar();
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($qtd);
		Yii::app()->end();
	}
	
	/**
	 * COUNT ANIMAL
	 */ 
	public function actionQtdAnimais(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$sql = "SELECT count(*) FROM Animal WHERE 1 = 1";
		$qtd = Yii::app()->db->createCommand($sql)->queryScalar();
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($qtd);
		Yii::app()->end();
		
	}
	
	/**
	 * COUNT EXPOSIÇÃo
	 */ 
	public function actionQtdExposicoes(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$sql = "SELECT count(*) FROM Exposicao WHERE 1=1";
		$qtd = Yii::app()->db->createCommand($sql)->queryScalar();
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($qtd);
		Yii::app()->end();
		
	}

	/**
	 * SAVE NOVO ANIMAL
	 */ 
	public function actionSalvarNovoAnimal() {
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
			$animal = Animal::model()->find(array('condition'=>' id=:id', 'params'=>array(':id'=>$parametros['id'])));
		}else{
			$animal = new Animal;
		}
		$animal->nome = $parametros['nome'];
		$animal->nascimento = isset($parametros['nascimento'])?$parametros['nascimento']:"";
		$animal->raca = $parametros['raca'];
		$animal->sexo = $parametros['sexo'];
		$animal->registro = isset($parametros['registro'])? $parametros['registro'] : "";
		$animal->dna = isset($parametros['dna'])? $parametros['dna'] : "";
		$animal->pelagem = isset($parametros['pelagem'])? $parametros['pelagem'] : "";
		$animal->video = isset($parametros['video'])? $parametros['video'] : "";
		$animal->descricao = isset($parametros['descricao'])? $parametros['descricao'] : "";
		$animal->pai = isset($parametros['pai'])? $parametros['pai'] : "";
		$animal->mae = isset($parametros['mae'])? $parametros['mae'] : "";
		$animal->pagina = isset($parametros['pagina'])? $parametros['pagina'] : "";
		
		$response = array();
		if ($animal->save() === false) {
			$response['success'] = false;
			$response['errors'] = $animal->errors;
		} else {
			
			$imagens = $parametros['imagens'];
			for($i = 0; $i < count($imagens); $i++){
				$imagem = $imagens[$i];
				$status = isset($imagem['status'])?$imagem['status']:"";
				if($status == "I"){
					$imagemAnimal = new Imagemanimal;
					$imagemAnimal->url = $imagens[$i]['url'];
					$imagemAnimal->animal = $animal->id;
					$imagemAnimal->status = 'U';
					$imagemAnimal->descricao = isset($imagens[$i]['descricao'])?$imagens[$i]['descricao']:"";
					$imagemAnimal->save();
				}else if($status == "U"){
					if(isset($imagem['id'])){
						$condition = ' id=:id';
						$params = array(':id'=>$imagem['id']);
						$busca = array('condition'=>$condition, 'params'=>$params);
						$imagemAnimal = Imagemanimal::model()->find($busca);	
						$imagemAnimal->descricao = isset($imagem['descricao'])?$imagem['descricao']:"";
						$imagemAnimal->save();
					}
				}else if($status == "D"){
					if(isset($imagem['id'])){
						$condition = ' id=:id';
						$params = array(':id'=>$imagem['id']);
						$busca = array('condition'=>$condition, 'params'=>$params);
						$imagemAnimal = Imagemanimal::model()->find($busca);	
						$imagemAnimal->delete();
					}
				}
			}
			
			$premiacoes = $parametros['premiacoes'];
			for($i = 0; $i < count($premiacoes); $i++){
				$premiacao = $premiacoes[$i];
				$status = isset($premiacao['status'])?$premiacao['status']:"";
				if($status == "I"){
					$animalpremiacao = new Animalpremiacao;
					$animalpremiacao->descricao = $premiacao['descricao'];
					$animalpremiacao->status = 'U';
					$animalpremiacao->animal = $animal->id;
					$animalpremiacao->save();
				}
			}
			
			$response['success'] = true;
			$response['contacts'] = $animal; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	/**
	 * SAVE NOVA EXPOSIÇÃO
	 */ 
	public function actionSalvarNovaExposicao() {
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
			$exposicao = Exposicao::model()->find(array('condition'=>' id=:id', 'params'=>array(':id'=>$parametros['id'])));
		}else{
			$exposicao = new Exposicao;
		}
		$exposicao->nome = $parametros['nome'];
		$exposicao->data = $parametros['data'];
		$exposicao->local = isset($parametros['local'])?$parametros['local']:"";
		$exposicao->cidade = isset($parametros['cidade'])?$parametros['cidade']:"";
		$exposicao->estado = isset($parametros['estado'])?$parametros['estado']:"";
		$exposicao->pais = isset($parametros['pais'])?$parametros['pais']:"";
		
		$response = array();
		if ($exposicao->save() === false) {
			$response['success'] = false;
			$response['errors'] = $exposicao->errors;
		} else {
			
			$imagens = $parametros['imagens'];
			for($i = 0; $i < count($imagens); $i++){
				$imagem = $imagens[$i];
				$status = isset($imagem['status'])?$imagem['status']:"";
				if($status == "I"){
					$imagemExposicao = new Imagemexposicao;
					$imagemExposicao->url = $imagem['url'];
					$imagemExposicao->exposicao = $exposicao->id;
					$imagemExposicao->status = 'U';
					$imagemExposicao->descricao = isset($imagem['descricao'])?$imagem['descricao']:"";
					$imagemExposicao->save();
				}else if($status == "U"){
					if(isset($imagem['id'])){
						$condition = ' id=:id';
						$params = array(':id'=>$imagem['id']);
						$busca = array('condition'=>$condition, 'params'=>$params);
						$imagemExposicao = Imagemexposicao::model()->find($busca);	
						$imagemExposicao->descricao = isset($imagem['descricao'])?$imagem['descricao']:"";
						$imagemExposicao->save();
					}
				}else if($status == "D"){
					if(isset($imagem['id'])){
						$condition = ' id=:id';
						$params = array(':id'=>$imagem['id']);
						$busca = array('condition'=>$condition, 'params'=>$params);
						$imagemExposicao = Imagemexposicao::model()->find($busca);	
						$imagemExposicao->delete();
					}
				}
			}
			
			$response['success'] = true;
			$response['contacts'] = $exposicao; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	/**
	 * SAVE NOVA VENDA
	 */ 
	public function actionSalvarNovaVenda() {
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
			$venda = Venda::model()->find(array('condition'=>' id=:id', 'params'=>array(':id'=>$parametros['id'])));
		}else{
			$venda = new Venda;
		}
		
		$venda->valor = $parametros['valor'];
		$venda->animal = $parametros['animal'];
		$venda->animal2 = $parametros['animal2'];
		$venda->tipovenda = $parametros['tipovenda'];
		$venda->url = $parametros['imagens']['0']['url'];
		$venda->data = $this->getDate();
		
		$response = array();
		if ($venda->save() === false) {
			$response['success'] = false;
			$response['errors'] = $venda->errors;
		} else {
			$response['success'] = true;
			$response['contacts'] = $venda; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	public function actionSalvarConfig() {
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
			$config = Config::model()->find(array('condition'=>' id=:id', 'params'=>array(':id'=>$parametros['id'])));
		}else{
			$config = new Config;
		}
		$config->nomesite = $parametros['nomesite'];
		$config->qtdanuncio = $parametros['qtdanuncio'];
		$config->exibircreci = $parametros['exibircreci'];
		$config->crecipessoafisica = $parametros['crecipessoafisica'];
		$config->creci = $parametros['creci'];
		$config->endereco = $parametros['endereco'];
		$config->email = $parametros['email'];
		$config->celular1 = $parametros['celular1'];
		$config->celular2 = $parametros['celular2'];
		$config->celular3 = $parametros['celular3'];
		$config->celular4 = $parametros['celular4'];
		
		$response = array();
		if ($config->save() === false) {
			$response['success'] = false;
			$response['errors'] = $config->errors;
		} else {
			$response['success'] = true;
			$response['config'] = $config; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}

	/**
	 * ANIMAL CARREGAR
	 */ 
	public function actionAnimalCarregar(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " 1=1 ";
		$params = array();
		
		if(isset($parametros['tipoanimal']) && $parametros['tipoanimal'] != ''){
			$condition .= ' AND pagina=:pagina ';
			$params[':pagina'] = $parametros['tipoanimal'];
		}
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		if(isset($parametros['pagina']) && isset($parametros['limite'])){
			$pagina = $parametros['pagina'];
			$limite = $parametros['limite'];
			$criteria->offset = $pagina * $limite;
			$criteria->limit = $limite;
		}
		$criteria->together = true;		
		$criteria->order = 'nome asc';
		
		$animais = Animal::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($animais as $key => $animal) {
			$dados = array();
			$dados['id'] = $animal->id;
			$dados['nome'] = $animal->nome;
			$isNascimento = $animal->nascimento == '0000-00-00 00:00:00';
			$dados['nascimento'] = strftime('%d%m%Y', strtotime($animal->nascimento));
			$dados['nascimentonome'] = $isNascimento ? "" : strftime('%d de %b, %Y', strtotime($animal->nascimento));
			$dados['registro'] = $animal->registro;
			$dados['dna'] = $animal->dna;
			$dados['pelagem'] = $animal->pelagem;
			$dados['video'] = $animal->video;
			$dados['descricao'] = $animal->descricao;
			$dados['pai'] = $animal->pai > 0?$animal->pai:"";
			$dados['nomepai'] = isset($animal->Pai)?$animal->Pai->nome:'';
			$dados['mae'] = $animal->mae > 0?$animal->mae:"";
			$dados['nomemae'] = isset($animal->Mae)?$animal->Mae->nome:'';
			$dados['sexo'] = $animal->sexo;
			$dados['nomeraca'] = isset($animal->Raca)?$animal->Raca->nome:'';
			$dados['raca'] = $animal->raca > 0?$animal->raca:"";
			$dados['pagina'] = $animal->pagina > 0?$animal->pagina:"";
			$dados['paginanome'] = isset($animal->Pagina)?$animal->Pagina->nome:'';
			$dados['show'] = true;
			
			if($dados['pai'] != '' && $dados['mae'] != ''){
				$dados['nomepaiemae'] = $dados['nomepai']." X ".$dados['nomemae'];
			}else if($dados['pai'] != ''){
				$dados['nomepaiemae'] = $dados['nomepai'];
			}else if($dados['mae'] != ''){
				$dados['nomepaiemae'] = $dados['nomemae'];
			}
			
			$dados['premiacoes'] = array();
			foreach($animal->Animalpremiacao as $key => $premiacao){
				$addpremiacao = array();
				$addpremiacao['descricao'] = $premiacao->descricao;
				$addpremiacao['id'] = $premiacao->id;
				$addpremiacao['status'] = $premiacao->status;
				$addpremiacao['animal'] = $premiacao->animal;
				$dados['premiacoes'][] = $addpremiacao;
			}
			
			$dados['qtdimagem'] = count($animal->Imagemanimal);
			$dados['imagens'] = array();
			if(count($animal->Imagemanimal) > 0){
				foreach ($animal->Imagemanimal as $key => $imagem) {
					$addimagem = array();
					$addimagem['id'] = $imagem->id;
					$addimagem['descricao'] = $imagem->descricao;
					$addimagem['status'] = $imagem->status;
					$addimagem['show'] = false;
					$addimagem['url'] = $imagem->url;
					$dados['imagens'][] = $addimagem;
				}
			}
			
			$jsons[] = $dados;
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($jsons);
		Yii::app()->end();
		
	}
	
	/**
	 * ANIMAL FIND
	 */ 
	public function actionFindAnimal(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " 1=1 ";
		$params = array();
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
			$condition .= ' AND id=:id ';
			$params[':id'] = $parametros['id'];
		}
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;
		
		$animal = Animal::model()->find($criteria);
		
		$dados = array();
		$dados['id'] = $animal->id;
		$dados['nome'] = $animal->nome;
		$isNascimento = $animal->nascimento == '0000-00-00 00:00:00';
		$dados['nascimento'] = strftime('%d%m%Y', strtotime($animal->nascimento));
		$dados['nascimentonome'] = $isNascimento ? "" : strftime('%d de %b, %Y', strtotime($animal->nascimento));
		$dados['registro'] = $animal->registro;
		$dados['dna'] = $animal->dna;
		$dados['pelagem'] = $animal->pelagem;
		$dados['video'] = $animal->video;
		$dados['descricao'] = $animal->descricao;
		$dados['sexo'] = $animal->sexo;
		$dados['sexonome'] = $animal->sexo == 'F'?'FÊMEA':'MACHO';
		$dados['nomeraca'] = isset($animal->Raca)?$animal->Raca->nome:'';
		$dados['raca'] = $animal->raca > 0?$animal->raca:"";
		$dados['pagina'] = $animal->pagina > 0?$animal->pagina:"";
		$dados['paginanome'] = isset($animal->Pagina)?$animal->Pagina->nome:'';
		
		$dados['pai'] = $animal->pai > 0?$animal->pai:"";
		$dados['nomepai'] = isset($animal->Pai)?$animal->Pai->nome:'';
		$dados['paipai'] = isset($animal->Pai->Pai->id)?$animal->Pai->Pai->id:"";
		$dados['nomepaipai'] = isset($animal->Pai->Pai->id)?$animal->Pai->Pai->nome:"";
		$dados['paimae'] = isset($animal->Pai->Mae->id)?$animal->Pai->Mae->id:"";
		$dados['nomepaimae'] = isset($animal->Pai->Mae->id)?$animal->Pai->Mae->nome:"";
		
		$dados['mae'] = $animal->mae > 0?$animal->mae:"";
		$dados['nomemae'] = isset($animal->Mae)?$animal->Mae->nome:'';
		$dados['maemae'] = isset($animal->Mae->Mae->id)?$animal->Mae->Mae->id:"";
		$dados['nomemaemae'] = isset($animal->Mae->Mae->id)?$animal->Mae->Mae->nome:"";
		$dados['maepai'] = isset($animal->Mae->Pai->id)?$animal->Mae->Pai->id:"";
		$dados['nomemaepai'] = isset($animal->Mae->Pai->id)?$animal->Mae->Pai->nome:"";
		
		$dados['show'] = true;
		
		if($dados['pai'] != '' && $dados['mae'] != ''){
			$dados['nomepaiemae'] = $dados['nomepai']." X ".$dados['nomemae'];
		}else if($dados['pai'] != ''){
			$dados['nomepaiemae'] = $dados['nomepai'];
		}else if($dados['mae'] != ''){
			$dados['nomepaiemae'] = $dados['nomemae'];
		}
		
		$dados['venda'] = false;
		$sql = "SELECT count(*) FROM Venda WHERE animal = ".$animal->id." OR animal2 = ".$animal->id;
		$qtd = Yii::app()->db->createCommand($sql)->queryScalar();
		if($qtd > 0){
			$dados['venda'] = true;
		}
		
		$dados['premiacoes'] = array();
		foreach($animal->Animalpremiacao as $key => $premiacao){
			$addpremiacao = array();
			$addpremiacao['descricao'] = $premiacao->descricao;
			$addpremiacao['id'] = $premiacao->id;
			$addpremiacao['status'] = $premiacao->status;
			$addpremiacao['animal'] = $premiacao->animal;
			$dados['premiacoes'][] = $addpremiacao;
		}
		
		$dados['qtdimagem'] = count($animal->Imagemanimal);
		$dados['imagens'] = array();
		if(count($animal->Imagemanimal) > 0){
			foreach ($animal->Imagemanimal as $key => $imagem) {
				$addimagem = array();
				$addimagem['id'] = $imagem->id;
				$addimagem['descricao'] = $imagem->descricao;
				$addimagem['status'] = $imagem->status;
				$addimagem['show'] = false;
				$addimagem['url'] = $imagem->url;
				$dados['imagens'][] = $addimagem;
			}
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($dados);
		Yii::app()->end();
	}
	
	/**
	 * EXPOSIÇÃO FIND
	 */ 
	public function actionFindExposicao(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " 1=1 ";
		$params = array();
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
			$condition .= ' AND id=:id ';
			$params[':id'] = $parametros['id'];
		}
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;
		
		$exposicao = Exposicao::model()->find($criteria);
		
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');
		
		$dados = array();
		$dados['id'] = $exposicao->id;
		$dados['nome'] = $exposicao->nome;
		$dados['data'] = $exposicao->data;//strtotime($exposicao->data);
		$dados['local'] = $exposicao->local;
		$dados['cidade'] = $exposicao->cidade;
		$dados['estado'] = $exposicao->estado;
		$dados['pais'] = $exposicao->pais;
		
		$dados['qtdimagem'] = count($exposicao->Imagemexposicao);
		$dados['imagens'] = array();
		if(count($exposicao->Imagemexposicao) > 0){
			foreach ($exposicao->Imagemexposicao as $key => $imagem) {
				$addimagem = array();
				$addimagem['id'] = $imagem->id;
				$addimagem['descricao'] = $imagem->descricao;
				$addimagem['status'] = $imagem->status;
				$addimagem['show'] = false;
				$addimagem['url'] = $imagem->url;
				$dados['imagens'][] = $addimagem;
			}
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($dados);
		Yii::app()->end();
	}
	
	/**
	 * EXPOSIÇÃO CARREGAR
	 */ 
	public function actionExposicaoCarregar(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " 1=1 ";
		$params = array();
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->order = 'data asc';
		
		if(isset($parametros['pagina']) && isset($parametros['limite'])){
			$criteria->offset = $parametros['pagina']*$parametros['limite'];
			$criteria->limit = $parametros['limite'];
		}
		
		$exposicoes = Exposicao::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($exposicoes as $key => $exposicao) {
			$dados = array();
			$dados['id'] = $exposicao->id;
			$dados['nome'] = $exposicao->nome;
			$dados['data'] = strftime('%d%m%Y', strtotime($exposicao->data));
			$dados['datanome'] = strftime('%d de %b, %Y', strtotime($exposicao->data));
			$dados['local'] = $exposicao->local;
			$dados['cidade'] = $exposicao->cidade;
			$dados['estado'] = $exposicao->estado;
			$dados['pais'] = $exposicao->pais;
			$dados['show'] = true;
			
			$dados['qtdimagem'] = count($exposicao->Imagemexposicao);
			$dados['imagens'] = array();
			if(count($exposicao->Imagemexposicao) > 0){
				foreach ($exposicao->Imagemexposicao as $key => $imagem) {
					$addimagem = array();
					$addimagem['id'] = $imagem->id;
					$addimagem['descricao'] = $imagem->descricao;
					$addimagem['status'] = $imagem->status;
					$addimagem['show'] = false;
					$addimagem['url'] = $imagem->url;
					$dados['imagens'][] = $addimagem;
				}
			}
			
			$jsons[] = $dados;
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($jsons);
		Yii::app()->end();
		
	}
	
	/**
	 * ANIMAL FINDALL
	 */ 
	public function actionAnimalFindAll(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " 1=1 ";
		$params = array();
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->order = 'id asc';
		
		$animais = Animal::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($animais as $key => $animal) {
			$dados = array();
			$dados['id'] = $animal->id;
			$dados['nome'] = $animal->nome;
			$dados['nascimento'] = strftime('%d%m%Y', strtotime($animal->nascimento));
			$dados['nascimentonome'] = strftime('%d de %b, %Y', strtotime($animal->nascimento));
			$dados['registro'] = $animal->registro;
			$dados['dna'] = $animal->dna;
			$dados['pelagem'] = $animal->pelagem;
			$dados['video'] = $animal->video;
			$dados['descricao'] = $animal->descricao;
			$dados['pai'] = $animal->pai;
			$dados['nomepai'] = isset($animal->Pai)?$animal->Pai->nome:'';
			$dados['mae'] = $animal->mae;
			$dados['nomemae'] = isset($animal->Mae)?$animal->Mae->nome:'';
			$dados['sexo'] = $animal->sexo;
			$dados['nomeraca'] = isset($animal->Raca)?$animal->Raca->nome:'';
			$dados['raca'] = $animal->raca;
			$dados['pagina'] = $animal->pagina;
			$dados['paginanome'] = isset($animal->Pagina)?$animal->Pagina->nome:'';
			$dados['show'] = true;
			
			$dados['qtdimagem'] = count($animal->Imagemanimal);
			if(count($animal->Imagemanimal) > 0){
				foreach ($animal->Imagemanimal as $key => $imagem) {
					$dados[$imagem->descricao] = $imagem->url;
				}
			}
			$count = 1;
			while($count <= 8) {
				if(!isset($dados['imagem'.$count]) || $dados['imagem'.$count] == ""){
					$dados['imagem'.$count] = Yii::app()->baseUrl."/assets/images/simbolo/thumbnail-default.jpg";
				}
				$count++;
			}
			
			$jsons[] = $dados;
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($jsons);
		Yii::app()->end();
		
	}

	/**
	 * Action Raca : FINDALL
	 */
	public function actionRacas(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$racas = Raca::model()->findAll();
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($racas);
		Yii::app()->end();
	}
	
	/**
	 * Action Raca : SAVE
	 */
	public function actionSalvarRaca(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
			$raca = Raca::model()->findByPk($parametros['id']);
		}else{
			$raca = new Raca;
		}
		$raca->nome = $parametros['nome'];
		
		$response = array();
		if ($raca->save() === false) {
			$response['success'] = false;
			$response['errors'] = $raca->errors;
		} else {
			$response['success'] = true;
			$response['raca'] = $raca; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	/**
	 * Action Raca : DELETE
	 */
	public function actionDeletarRaca(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$raca = Raca::model()->findByPk($parametros['id']);
		
		$response = array();
		if ($raca->delete() === false) {
			$response['success'] = false;
			$response['errors'] = $raca->errors;
		} else {
			$response['success'] = true;
			$response['raca'] = $raca; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	/**
	 * Action Tipovenda : FINDALL
	 */
	public function actionTipovendas(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$tipovenda = Tipovenda::model()->findAll();
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($tipovenda);
		Yii::app()->end();
	}
	
	/**
	 * Action Tipovenda : SAVE
	 */
	public function actionSalvarTipovenda(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
			$tipovenda = Tipovenda::model()->findByPk($parametros['id']);
		}else{
			$tipovenda = new Tipovenda;
		}
		$tipovenda->nome = $parametros['nome'];
		
		$response = array();
		if ($tipovenda->save() === false) {
			$response['success'] = false;
			$response['errors'] = $tipovenda->errors;
		} else {
			$response['success'] = true;
			$response['tipovenda'] = $tipovenda; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	/**
	 * Action Tipovenda : DELETE
	 */
	public function actionDeletarTipovenda(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$tipovenda = Tipovenda::model()->findByPk($parametros['id']);
		
		$response = array();
		if ($tipovenda->delete() === false) {
			$response['success'] = false;
			$response['errors'] = $tipovenda->errors;
		} else {
			$response['success'] = true;
			$response['tipovenda'] = $tipovenda; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	/**
	 * Action Página : FINDALL
	 */
	public function actionPaginas(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$paginas = Pagina::model()->findAll();
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($paginas);
		Yii::app()->end();
	}
	
	/**
	 * Action Página : SAVE
	 */
	public function actionSalvarPagina(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
			$pagina = Pagina::model()->findByPk($parametros['id']);
		}else{
			$pagina = new Pagina;
		}
		$pagina->nome = $parametros['nome'];
		$pagina->posicao = $parametros['posicao'];
		
		$response = array();
		if ($pagina->save() === false) {
			$response['success'] = false;
			$response['errors'] = $pagina->errors;
		} else {
			$response['success'] = true;
			$response['pagina'] = $pagina; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	/**
	 * Action Página : DELETE
	 */ 
	public function actionDeletarPagina(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$pagina = Pagina::model()->findByPk($parametros['id']);
		
		$response = array();
		if ($pagina->delete() === false) {
			$response['success'] = false;
			$response['errors'] = $pagina->errors;
		} else {
			$response['success'] = true;
			$response['pagina'] = $pagina; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	/**
	 * Action Venda : FINDALL
	 */
	public function actionCarregarVendas(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " tipovenda=:tipovenda ";
		$params = array(":tipovenda"=>$parametros['tipovenda']);
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->order = 'data asc';
		
		$vendas = Venda::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($vendas as $key => $venda) {
			$dados = array();
			$dados['id'] = $venda->id;
			$dados['valor'] = $venda->valor;
			$dados['animal'] = $venda->animal;
			$dados['animalnome'] = isset($venda->Animal)?$venda->Animal->nome:'';
			$dados['animal2'] = $venda->animal2;
			$dados['animal2nome'] = isset($venda->Animal2)?$venda->Animal2->nome:'';
			$dados['tipovenda'] = $venda->tipovenda;
			$dados['tipovendanome'] = isset($venda->Tipovenda)?$venda->Tipovenda->nome:'';
			$dados['data'] = strftime('%d%m%Y', strtotime($venda->data));
			$dados['datanome'] = strftime('%d de %b, %Y', strtotime($venda->data));
			
			if($venda->animal != 0){
				if($venda->Animal->pai != 0 && $venda->Animal->mae != 0){
					$dados['nomepaiemae'] = $venda->Animal->Pai->nome." X ".$venda->Animal->Mae->nome;
				}else if($venda->Animal->pai != 0){
					$dados['nomepaiemae'] = $venda->Animal->Pai->nome;
				}else if($venda->Animal->mae != 0){
					$dados['nomepaiemae'] = $venda->Animal->Mae->nome;
				}
			}
			
			$dados['imagens'] = array();
			$imagem = array();
			$imagem['url'] = $venda->url;
			$dados['imagens'][] = $imagem;
			
			$jsons[] = $dados;
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($jsons);
		Yii::app()->end();
	}
	
	/**
	 * Action Enviar : EMAIL
	 */
	public function actionEnviarEmail(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$message = new YiiMailMessage;
		$mensagem = $parametros['nome'].'<br />'.$parametros['telefone'].'<br >'.$parametros['mensagem'];
		$message->setBody($mensagem, 'text/html');
		$message->subject = 'Mensagem de '.$parametros['nome'];
		$message->addTo('contato@harasaleixo.com.br');
		$message->from = $parametros['email'];
		Yii::app()->mail->send($message);
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode(true);
		Yii::app()->end();
	}
	
	/**
	 * Action Salvar : GERAL
	 */
	public function actionSalvarGeral(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$geral = Geral::model()->find(array('condition'=>' id=:id', 'params'=>array(':id'=>1)));
		$geral->cds = $parametros['carregarDados'];
		$geral->save();
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode(true);
		Yii::app()->end();
	}
	
	/**
	 * Action Get : GERAL
	 */
	public function actionGetGeral(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$geral = Geral::model()->find(array('condition'=>' id=:id', 'params'=>array(':id'=>1)));
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($geral);
		Yii::app()->end();
	}
	
}