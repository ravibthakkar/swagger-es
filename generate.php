<?php
date_default_timezone_set('GMT');

require('vendor/autoload.php');
  
$es_host = $argv[1];
$swagger_output_file = $argv[2];

$host_info = parse_url($es_host);

$scheme = $host_info['scheme'];

if (isset($host_info['port'])) {
  $host   = $host_info['host'].":".$host_info['port'];
} else {
  $host   = $host_info['host'];
}

echo "Connecting to Elasticsearch instance at $es_host...\n";
$client = new Elasticsearch\Client(array('hosts'=>array($es_host)));
$idx = $client->indices()->getMapping();
$indices = array_keys($idx);

$p['index']['in']             = "path";
$p['index']['name']           = "index";
$p['index']['description']    = "The index name";
$p['index']['required']       = true;
$p['index']['type']           = "string";
$p['index']['enum']           = $indices;

$doc = new stdClass();
$doc->swagger = "2.0";

$doc->info = new stdClass();
$doc->info->description = "API docs generated for Elasticsearch located at $es_host";
$doc->info->version = date('c', time());
$doc->info->title = "Elasticsearch";

$doc->host = $host;
$doc->basePath = "/";

$doc->schemes   = array();
$doc->schemes[] = $scheme;

$doc->paths = new stdClass();

include('./paths/cluster.php'); 

foreach ($r as $resource=>$details) {
  $doc->paths->$resource = json_decode(json_encode($details), FALSE);
}

$doc->securityDefinitions = new stdClass();

$doc->definitions         = new stdClass();

echo "Writing Swagger File $swagger_output_file...\n";
$json = json_encode($doc, JSON_PRETTY_PRINT);
file_put_contents($swagger_output_file, $json);
