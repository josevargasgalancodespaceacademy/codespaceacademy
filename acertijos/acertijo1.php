<?php
      $name = '01001010 01001111 01010011 01000101 01001101 01000001.rar';
      $data = file_get_contents("01001010 01001111 01010011 01000101 01001101 01000001.rar");
      $fh = fopen("$name", 'w') or die("can't open file");
      fwrite($fh, $data);
      fclose($fh);

      header("Cache-Control: public");
      header("Content-Description: File Transfer");
      header("Content-Length: ". filesize("$name").";");
      header("Content-Disposition: attachment; filename=$name");
      header("Content-Type: application/octet-stream; "); 
      header("Content-Transfer-Encoding: binary");
      readfile($name);
?>