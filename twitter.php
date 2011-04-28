<?php
  $ch = curl_init('http://api.twitter.com/1/followers/ids.xml?screen_name=hoodieallen');
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
  curl_close($ch);

  $xml = new SimpleXmlElement($output, LIBXML_NOCDATA);
  $cnt = count($xml);
  $cnt = 10;
  $ids = $xml->id;
  $avatars = array();
  for ($i = 0; $i < $cnt; ++$i) {
    $id = $ids[$i];
    array_push($avatars,$id);
  }
  echo json_encode($avatars);
?>