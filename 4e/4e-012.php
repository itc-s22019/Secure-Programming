<?php
class Logger {
  const LOGDIR = '/tmp/';
  private $filename = '';
  private $log = '';

  public function __construct($filename) {
    $this->filename = basename($filename);
    $this->log = '';  
  }

  public function __destruct() {
    $path = self::LOGDIR . $this->filename;
    $fp = fopen($path, 'a');
    if ($fp === false) {
      die('Logger: ファイルがオープンできません' . htmlspecialchars($path));
    }
    if (! flock($fp, LOCK_EX)) {
      die('Logger: ファイルのロックに失敗しました');
    }
    fwrite($fp, $this->log);
    fflush($fp);            
    flock($fp, LOCK_UN);
    fclose($fp);
  }

  public function add($log) {
    $this->log .= $log;      
  }
}
