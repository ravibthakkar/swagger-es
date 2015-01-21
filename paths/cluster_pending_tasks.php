<?php
$r['/_cluster/pending_tasks']['get']['summary']                                 = "list of any cluster-level changes ";
$r['/_cluster/pending_tasks']['get']['tags'][]                                  = "cluster";
$r['/_cluster/pending_tasks']['get']['description']                             = "http://www.elasticsearch.org/guide/en/elasticsearch/reference/1.4/cluster-pending.html";
$r['/_cluster/pending_tasks']['get']['operationId']                             = "getClusterPendingTasks";
$r['/_cluster/pending_tasks']['get']['produces'][]                              = "application/json";
$r['/_cluster/pending_tasks']['get']['responses']['200']['description']         = "ok";    