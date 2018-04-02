<?php
/**
 * summary
 */
class Tool
{

  static function cacheClient(){
    $memcache = new Memcache;
    $memcache->connect('localhost', 11211) or die ("Could not connect");
    return $memcache;
  }

}
