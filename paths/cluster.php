<?php
  
$p['level']['in']                                                        = "query";
$p['level']['name']                                                      = "level";
$p['level']['description']                                               = "Can be one of cluster, indices or shards. Controls the details level of the health information returned. Defaults to cluster.";
$p['level']['required']                                                  = false;
$p['level']['type']                                                      = "string";
$p['level']['enum']                                                      = ['cluster','indicies','shards'];

$p['wait_for_status']['in']                                              = "query";
$p['wait_for_status']['name']                                            = "wait_for_status";
$p['wait_for_status']['description']                                     = "One of green, yellow or red. Will wait (until the timeout provided) until the status of the cluster changes to the one provided or better, i.e. green > yellow > red. By default, will not wait for any status.";
$p['wait_for_status']['required']                                        = false;
$p['wait_for_status']['type']                                            = "string";
$p['wait_for_status']['enum']                                            = ['green','yellow','red'];

$p['wait_for_relocating_shards']['in']                                   = "query";
$p['wait_for_relocating_shards']['name']                                 = "wait_for_relocating_shards";
$p['wait_for_relocating_shards']['description']                          = "A number controlling to how many relocating shards to wait for. Usually will be 0 to indicate to wait till all relocations have happened. Defaults to not wait.";
$p['wait_for_relocating_shards']['required']                             = false;
$p['wait_for_relocating_shards']['type']                                 = "string";

$p['wait_for_nodes']['in']                                               = "query";
$p['wait_for_nodes']['name']                                             = "wait_for_nodes";
$p['wait_for_nodes']['description']                                      = "The request waits until the specified number N of nodes is available. It also accepts >=N, <=N, >N and <N. Alternatively, it is possible to use ge(N), le(N), gt(N) and lt(N) notation";
$p['wait_for_nodes']['required']                                         = false;
$p['wait_for_nodes']['type']                                             = "string";

$p['timeout']['in']                                                      = "query";
$p['timeout']['name']                                                    = "timeout";
$p['timeout']['description']                                             = "A time based parameter controlling how long to wait if one of the wait_for_XXX are provided. Defaults to 30s.";
$p['timeout']['required']                                                = false;
$p['timeout']['type']                                                    = "string";

$r['/_cluster/health']['get']['summary']                                 = "cluster health for all indices";
$r['/_cluster/health']['get']['tags'][]                                  = "cluster";
$r['/_cluster/health']['get']['description']                             = "http://www.elasticsearch.org/guide/en/elasticsearch/reference/current/cluster-health.html";
$r['/_cluster/health']['get']['operationId']                             = "getClusterHealth";
$r['/_cluster/health']['get']['produces'][]                              = "application/json";
$r['/_cluster/health']['get']['parameters'][]                            = $p['level'];
$r['/_cluster/health']['get']['parameters'][]                            = $p['wait_for_status'];
$r['/_cluster/health']['get']['parameters'][]                            = $p['wait_for_relocating_shards'];
$r['/_cluster/health']['get']['parameters'][]                            = $p['wait_for_nodes'];
$r['/_cluster/health']['get']['responses']['200']['description']         = "ok";    

$r['/_cluster/health/{index}']['get']['summary']                         = "cluster health for a specific index";
$r['/_cluster/health/{index}']['get']['tags'][]                          = "cluster";
$r['/_cluster/health/{index}']['get']['description']                     = "http://www.elasticsearch.org/guide/en/elasticsearch/reference/current/cluster-health.html";
$r['/_cluster/health/{index}']['get']['operationId']                     = "getClusterHealth";
$r['/_cluster/health/{index}']['get']['produces'][]                      = "application/json";
$r['/_cluster/health/{index}']['get']['parameters'][]                    = $p['index'];
$r['/_cluster/health/{index}']['get']['parameters'][]                    = $p['level'];
$r['/_cluster/health/{index}']['get']['parameters'][]                    = $p['wait_for_status'];
$r['/_cluster/health/{index}']['get']['parameters'][]                    = $p['wait_for_relocating_shards'];
$r['/_cluster/health/{index}']['get']['parameters'][]                    = $p['wait_for_nodes'];
$r['/_cluster/health/{index}']['get']['responses']['200']['description'] = "ok";   