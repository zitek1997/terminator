<?php
include("config.php");
$clients = $db->selecto("SELECT * FROM clients");
$cards = array();
foreach ($clients as $client){
  $id = $client['ID'];
  $name = $client['FNAME']." ".$client['LNAME'];
  $email = $client['EMAIL'];
  $tel = $client['TEL'];
  $array = array(
    "idc" => $id,
  );
  $sql = "SELECT startdate, opis FROM history WHERE idc = :idc ORDER BY startdate DESC";
  $history = $db->select($sql,$array);

  $c = array();
  $c['name'] = $name;
  $c['poczta'] = $email;
  $c['tel'] = $tel;
  $c['history'] = $history;
  $cards[$id] = $c;
  echo '<input type="button" class="btn btn-success dashbutton" name="showCH" onclick="openDir('.$id.')" value="'.$name.'"/>';
}

echo "<input type='hidden' id='cardsOfHistory' value='".json_encode($cards)."'/>";
?>
