<?php

use Youshido\GraphQL\Execution\Processor;
use Youshido\GraphQL\Schema\Schema;
use Youshido\GraphQL\Type\Object\ObjectType;

require_once '../vendor/autoload.php';
require_once '../generated-conf/config.php';

$request_json = file_get_contents('php://input');
$request_data = json_decode($request_json, true);

$processor_object = new Processor(new Schema([
	'query' => new ObjectType([
		'name' => 'Query',
		'fields' => [
			new BookField(),
			new ChapterField(),
			new VerseField(),
		],
	]),
]));

$processor_object->processPayload($request_data['query']);
$response_data = $processor_object->getResponseData();

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: content-type');

echo json_encode($response_data);

?>