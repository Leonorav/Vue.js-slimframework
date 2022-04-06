<?php
//header('Access-Control-Allow-Origin:*');
//header('Access-Control-Allow-Headers:X-Request-With');
//header('Access-Control-Allow-Methods: GET,POST,PUT,DELETE, OPTIONS');
//header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//require '../vendor/autoload.php';
//require '../src/config/db.php';

$app = new \Slim\App();
$app->options('/(routes:.+)', function ($request, $response, $args){
	return $response;
});
$app->add(function ($req, $res, $next){
	$response = $next($req, $res);
	return $response
			->withHeader('Access-Control-Allow-Origin', '*')
			->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
			->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

// Get All dairies_vita
$app->get('/api/dairies_vita', function (Request $request, Response $response) {
	//echo 'dairies_vita';
	$sql = 'SELECT * FROM dairies_vita';
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db=$db->connect();
		
		$stmt = $db->query($sql);
		$dairies_vita = $stmt->fetchALL(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($dairies_vita);
		
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

// Get Single DairyVITA
$app->get('/api/dairyVITA/{id_dairyVITA}', function (Request $request, Response $response) {
	//echo 'dairies_vita';
	$id_dairyVITA = $request->getAttribute('id_dairyVITA');
	
	$sql = "SELECT * FROM dairies_vita WHERE id_dairyVITA = '$id_dairyVITA'";
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db=$db->connect();
		
		$stmt = $db->query($sql);
		$dairyVITA = $stmt->fetch(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($dairyVITA);
		
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

// Add DairyVITA
$app->post('/api/dairyVITA/add', function (Request $request, Response $response) {
	//echo 'dairies_vita';
	$product_dairyVITA = $request->getParam('product_dairyVITA');
	$measurement_dairyVITA = $request->getParam('measurement_dairyVITA');
	$realprice_dairyVITA = $request->getParam('realprice_dairyVITA');
	$discountedprice_dairyVITA = $request->getParam('discountedprice_dairyVITA');
	$bestbefore_dairyVITA = $request->getParam('bestbefore_dairyVITA');
	$fat_dairyVITA = $request->getParam('fat_dairyVITA');
	$calories_dairyVITA = $request->getParam('calories_dairyVITA');
	$market_dairyVITA = $request->getParam('market_dairyVITA');
	$city_dairyVITA = $request->getParam('city_dairyVITA');
	$packing_dairyVITA = $request->getParam('packing_dairyVITA');
	
	$sql = "INSERT INTO dairies_vita (product_dairyVITA, measurement_dairyVITA, realprice_dairyVITA, discountedprice_dairyVITA, bestbefore_dairyVITA, fat_dairyVITA, calories_dairyVITA, market_dairyVITA, city_dairyVITA, packing_dairyVITA)
	VALUES(:product_dairyVITA, :measurement_dairyVITA, :realprice_dairyVITA, :discountedprice_dairyVITA, :bestbefore_dairyVITA, :fat_dairyVITA, :calories_dairyVITA, :market_dairyVITA, :city_dairyVITA, :packing_dairyVITA)";
	
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db=$db->connect();
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':product_dairyVITA',$product_dairyVITA);
		$stmt->bindParam(':measurement_dairyVITA',$measurement_dairyVITA);
		$stmt->bindParam(':realprice_dairyVITA',$realprice_dairyVITA);
		$stmt->bindParam(':discountedprice_dairyVITA',$discountedprice_dairyVITA);
		$stmt->bindParam(':bestbefore_dairyVITA',$bestbefore_dairyVITA);
		$stmt->bindParam(':fat_dairyVITA',$fat_dairyVITA);
		$stmt->bindParam(':calories_dairyVITA',$calories_dairyVITA);
		$stmt->bindParam(':market_dairyVITA',$market_dairyVITA);
		$stmt->bindParam(':city_dairyVITA',$city_dairyVITA);
		$stmt->bindParam(':packing_dairyVITA',$packing_dairyVITA);
		
		$stmt->execute();
		echo'{"notice":{"text":"Dairy Added"}';
		
		//$stmt = $db->query($sql);
		//$customer = $stmt->fetchALL(PDO::FETCH_OBJ);
		//$db = null;
		//echo json_encode($customer);
		
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

// Update Customer Slide 47
$app->put('/api/dairyVITA/update/{id_dairyVITA}', function (Request $request, Response $response) {
	//echo 'dairies_vita';
	$id_dairyVITA = $request->getAttribute('id_dairyVITA');
	
	$product_dairyVITA = $request->getParam('product_dairyVITA');
	$measurement_dairyVITA = $request->getParam('measurement_dairyVITA');
	$realprice_dairyVITA = $request->getParam('realprice_dairyVITA');
	$discountedprice_dairyVITA = $request->getParam('discountedprice_dairyVITA');
	$bestbefore_dairyVITA = $request->getParam('bestbefore_dairyVITA');
	$fat_dairyVITA = $request->getParam('fat_dairyVITA');
	$calories_dairyVITA = $request->getParam('calories_dairyVITA');
	$market_dairyVITA = $request->getParam('market_dairyVITA');
	$city_dairyVITA = $request->getParam('city_dairyVITA');
	$packing_dairyVITA = $request->getParam('packing_dairyVITA');
	
	$sql = "UPDATE dairies_vita SET
	product_dairyVITA = :product_dairyVITA,
	measurement_dairyVITA = :measurement_dairyVITA,
	realprice_dairyVITA = :realprice_dairyVITA,
	discountedprice_dairyVITA = :discountedprice_dairyVITA,
	bestbefore_dairyVITA = :bestbefore_dairyVITA,
	fat_dairyVITA = :fat_dairyVITA,
	calories_dairyVITA = :calories_dairyVITA,
	market_dairyVITA = :market_dairyVITA,
	city_dairyVITA = :city_dairyVITA,
	packing_dairyVITA = :packing_dairyVITA
	WHERE id_dairyVITA = '$id_dairyVITA'";
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db=$db->connect();
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':product_dairyVITA',$product_dairyVITA);
		$stmt->bindParam(':measurement_dairyVITA',$measurement_dairyVITA);
		$stmt->bindParam(':realprice_dairyVITA',$realprice_dairyVITA);
		$stmt->bindParam(':discountedprice_dairyVITA',$discountedprice_dairyVITA);
		$stmt->bindParam(':bestbefore_dairyVITA',$bestbefore_dairyVITA);
		$stmt->bindParam(':fat_dairyVITA',$fat_dairyVITA);
		$stmt->bindParam(':calories_dairyVITA',$calories_dairyVITA);
		$stmt->bindParam(':market_dairyVITA',$market_dairyVITA);
		$stmt->bindParam(':city_dairyVITA',$city_dairyVITA);
		$stmt->bindParam(':packing_dairyVITA',$packing_dairyVITA);
		
		$stmt->execute();
		echo'{"notice":{"text":"Dairy Updated"}';
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

// Delete Dairy 
$app->delete('/api/dairyVITA/delete/{id_dairyVITA}', function (Request $request, Response $response) {
	$id_dairyVITA = $request->getAttribute('id_dairyVITA');
	
	$sql = "DELETE FROM dairies_vita WHERE id_dairyVITA = '$id_dairyVITA'";
	try{
		//Get DB Object
		$db = new db();
		//Connect
		$db=$db->connect();
		
		$stmt = $db->prepare($sql);
		$stmt->execute();
		echo'{"notice":{"text":"Dairy Deleted"}';
		
	} catch(PDOException $e){
		echo '{"error": {"text": '.$e->getMessage().'}';
	}
});

?>
