<?php
$r['/_cluster/stats']['get']['summary']                                 = "statistics from a cluster wide perspective";
$r['/_cluster/stats']['get']['tags'][]                                  = "cluster";
$r['/_cluster/stats']['get']['description']                             = "http://www.elasticsearch.org/guide/en/elasticsearch/reference/1.4/cluster-stats.html";
$r['/_cluster/stats']['get']['operationId']                             = "getClusterStats";
$r['/_cluster/stats']['get']['produces'][]                              = "application/json";
$r['/_cluster/stats']['get']['responses']['200']['description']         = "ok";