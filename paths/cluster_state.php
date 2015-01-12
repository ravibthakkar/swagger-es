<?php
  
$p['metric']['in']                                                                 = "path";
$p['metric']['name']                                                               = "metric";
$p['metric']['description']                                                        = "Filters response to a specific metric.  Can also be provided as a comma separated list if multiple metrics are desired.";
$p['metric']['required']                                                           = true;
$p['metric']['type']                                                               = "string";
$p['metric']['enum']                                                               = ['version','master_node','nodes','routing_table','metadata','blocks'];

$r['/_cluster/state']['get']['summary']                                           = "cluster state";
$r['/_cluster/state']['get']['tags'][]                                            = "cluster";
$r['/_cluster/state']['get']['description']                                       = "http://www.elasticsearch.org/guide/en/elasticsearch/reference/1.4/cluster-state.html";
$r['/_cluster/state']['get']['operationId']                                       = "getClusterHealth";
$r['/_cluster/state']['get']['produces'][]                                        = "application/json";
$r['/_cluster/state']['get']['responses']['200']['description']                   = "ok";    

$r['/_cluster/state/{metric}']['get']['summary']                                  = "cluster state for a specific metric";
$r['/_cluster/state/{metric}']['get']['tags'][]                                   = "cluster";
$r['/_cluster/state/{metric}']['get']['description']                              = "http://www.elasticsearch.org/guide/en/elasticsearch/reference/1.4/cluster-state.html";
$r['/_cluster/state/{metric}']['get']['operationId']                              = "getClusterHealthPerMetric";
$r['/_cluster/state/{metric}']['get']['produces'][]                               = "application/json";
$r['/_cluster/state/{metric}']['get']['parameters'][]                             = $p['metric'];
$r['/_cluster/state/{metric}']['get']['responses']['200']['description']          = "ok";  

$r['/_cluster/state/{metric}/{index}']['get']['summary']                          = "cluster state for a specific metric";
$r['/_cluster/state/{metric}/{index}']['get']['tags'][]                           = "cluster";
$r['/_cluster/state/{metric}/{index}']['get']['description']                      = "http://www.elasticsearch.org/guide/en/elasticsearch/reference/1.4/cluster-state.html";
$r['/_cluster/state/{metric}/{index}']['get']['operationId']                      = "getClusterHealthPerMetricPerIndesx";
$r['/_cluster/state/{metric}/{index}']['get']['produces'][]                       = "application/json";
$r['/_cluster/state/{metric}/{index}']['get']['parameters'][]                     = $p['index'];
$r['/_cluster/state/{metric}/{index}']['get']['parameters'][]                     = $p['metric'];
$r['/_cluster/state/{metric}/{index}']['get']['responses']['200']['description']  = "ok";   