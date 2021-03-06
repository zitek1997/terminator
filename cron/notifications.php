<?php
include('../ajax/config.php');
include('apiconf.php');
require_once '../smsapi/Autoload.php';
$client = new \SMSApi\Client($l);
$pwd = md5($p);
$client->setPasswordHash( ($pwd) );
$smsapi = new \SMSApi\Api\SmsFactory();
$smsapi->setClient($client);

$now = strtotime("now");
$now = date("Y-m-d H:i:s", $now);
$now = "'".$now."'";
$array = array(
  "SENT" => 0,
  "idc" => "customEv",
  "tobeSend" => 1
);
$sql = "SELECT * FROM notifications WHERE SENT = :SENT AND TIME < $now AND idc <> :idc AND tobeSend = :tobeSend";
$noti = $db->select($sql, $array);
$def = $db->selecto("SELECT * FROM not_def");
$def = $def[0];
print_r($noti);
foreach($noti as $ts){
  $id = $ts['id'];
  $idc = $ts['IDC'];
  $ide = $ts['IDE'];
  $sSMS = $ts['SMS'];
  $sEMAIL = $ts['EMAIL'];
  //pobranie informacji
  $arra = array("ID" => $idc);
  $arrb = array("id" => $ide);
  $sqla = "SELECT * FROM clients WHERE ID = :ID";
  $sqlb = "SELECT * FROM calendar WHERE id = :id";
  $client = $db->select($sqla, $arra);
  $event = $db->select($sqlb, $arrb);
  $client = $client[0];
  $event = $event[0];
  $tel = $client['TEL'];
  $mail = $client['EMAIL'];
  $name = $client['FNAME']." ".$client['LNAME'];
  $service = $event['opis'];
  $date = $event['startdate'];
  if ($sSMS == 1 && $tel != null){
    //przygotowanie wiadomości
    //SMS
    $sms = $def['message'];
    $sms = str_replace("^usługa^", $service, $sms);
    $sms = str_replace("^data^", $date, $sms);

    // try {
    //
    //   $actionSend = $smsapi->actionSend();
    //
    //   $actionSend->setTo($tel);
    //   $actionSend->setText($sms);
    //   $actionSend->setSender('ECO');
    //
    //   $response = $actionSend->execute();
    //
    //   foreach( $response->getList() as $status ) {
    //     echo  $status->getNumber() . ' ' . $status->getPoints() . ' ' . $status->getStatus();
    //   }
    // }
    // catch( \SMSApi\Exception\SmsapiException $e ) {
    //   echo 'ERROR: ' . $e->getMessage();
    // }
  }
  if ($sEMAIL == 1 && $mail != null){
    //E-MAIL
    $topic = $def['subject'];
    $msg = $def['beforem'].$def['message'].$def['afterm'];
    $servicem = "<br><b>".$service."</b><br>";
    $datem = "<br><b>".$date."</b><br>";
    $msg = str_replace("^usługa^", $servicem, $msg);
    $msg = str_replace("^data^", $datem, $msg);
    $headers = $def['headers'];
    // $headers = str_replace("^imie^", $name, $headers);
    // $headers = str_replace("^mail^", $mail, $headers);
    // $headers .= '\r\n'."From: Nazwa Firmy <itcave@itcave.nazwa.pl>";
    mail($mail,$topic,$msg,$headers);
  }
  $where = "id = $id";
  $array = array("SENT" => 1);
  $db->update("notifications", $array, $where);
}
?>
