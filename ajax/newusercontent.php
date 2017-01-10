<?php
include("config.php");
$tt = $db->selecto("SELECT * FROM time_tables");

print <<<KOD
<div>
  <form class="form-horizontal alert" name="empList" id="empForm" ng-submit="insertInfo(empInfo);">
    <div class="form-group">
      <label for="Imie">Imie:</label>
      <input type="text" name="emp_fname" class="form-control" placeholder="Wpisz Imię" ng-model="empInfo.fname" autofocus required />
    </div>
    <div class="form-group">
      <p class="text-danger" ng-show="empList.emp_fname.\$invalid && empList.emp_fname.\$dirty">Błąd</p>
    </div>
    <div class="form-group">
      <label for="Nazwisko">Nazwisko:</label>
      <input type="text" name="emp_lname" class="form-control" placeholder="Wpisz Nazwisko" ng-model="empInfo.lname" autofocus required />
    </div>
    <div class="form-group">
      <p class="text-danger" ng-show="empList.emp_lname.\$invalid && empList.emp_lname.\$dirty">Błąd</p>
    </div>
    <div class="form-group">
      <label for="Login">Login:</label>
      <input type="text" name="emp_login" class="form-control" placeholder="Wpisz login" ng-model="empInfo.login" autofocus required />
    </div>
    <div class="form-group">
      <p class="text-danger" ng-show="empList.emp_login.\$invalid && empList.emp_login.\$dirty">Błąd</p>
    </div>
    <div class="form-group">
      <label for="Pass">Hasło:</label>
      <input type="password" name="emp_pass" class="form-control" placeholder="Wpisz hasło" ng-model="empInfo.pass" autofocus required />
    </div>
    <div class="form-group">
      <p class="text-danger" ng-show="empList.emp_pass.\$invalid && empList.emp_pass.\$dirty">Błąd</p>
    </div>
    <div class="form-group">
      <label for="Email">Email:</label>
      <input type="email" name="emp_email" class="form-control" placeholder="Wpisz email" ng-model="empInfo.email" autofocus required />
    </div>
    <div class="form-group">
      <p class="text-danger" ng-show="empList.emp_email.\$invalid && empList.emp_email.\$dirty">Błąd</p>
    </div>
    <div class="form-group">
      <label for="Phone">Telefon:</label>
      <input type="text" name="emp_phone" class="form-control" placeholder="Wpisz numer" ng-model="empInfo.phone" autofocus required />
    </div>
    <div class="form-group">
      <p class="text-danger" ng-show="empList.emp_phone.\$invalid && empList.emp_phone.\$dirty">Błąd</p>
    </div>
    <div class="form-group">
      <label for="Access">Terminarze:</label>
      <select multiple name="emp_access" class="form-control" ng-model="empInfo.access" required>
KOD;
foreach($tt as $t){
  $id = $t['timetab_id'];
  $name = $t['title'];
  echo '<option value="'.$id.'">'.$name.'</option>';
}
print <<<KOD
      </select>
    </div>
  </form>
</div>
KOD;


?>
