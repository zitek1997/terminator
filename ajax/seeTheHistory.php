<?php
include("config.php");
$clients = $db->selecto("SELECT * FROM clients ORDER BY LNAME ASC");
$cards = array();
foreach ($clients as $client){
  $id = $client['ID'];
  $name = $client['LNAME']." ".$client['FNAME'];
  $lname = $client['LNAME'];
  $fname = $client['FNAME'];
  $email = $client['EMAIL'];
  $tel = $client['TEL'];
  $adres = $client['ADRES'];
  $array = array(
    "idc" => $id,
  );
  $sql = "SELECT startdate, opis FROM history WHERE idc = :idc ORDER BY startdate DESC";
  $history = $db->select($sql,$array);

  $c = array();
  $c['name'] = $name;
  $c['lname'] = $lname;
  $c['fname'] = $fname;
  $c['poczta'] = $email;
  $c['tel'] = $tel;
  $c['adres'] = $adres;
  $c['history'] = $history;
  $cards[$id] = $c;
  // echo '<input type="button" class="btn btn-success dashbutton clientname" name="showCH" onclick="openDir('.$id.')" value="'.$name.'"/>';
print <<<KOD
  <div class="dashbutton">
    <div class='btn btn-success btn-sm dashbutton' id="$id$name" onclick="openDir($id);">
      <div class="clientname">
        $name
      </div>
    </div>
  </div>
KOD;
}

echo "<input type='hidden' id='cardsOfHistory' value='".json_encode($cards)."'/>";
?>
