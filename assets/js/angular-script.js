var crudApp = angular.module('crudApp',[]);
crudApp.controller("DbController",['$scope','$http', function($scope,$http){

$scope.getInfo = function(info){
$http.post('/ajax/login.php',{"login":info.login,"pass":info.pass})
.success(function(data)
{
  if(data==0)
  {
    window.location.replace("http://projekt.itcave.pl");
  }else if(data==1){
    info.login="";
    info.pass="";
  }else if(data==2){
    info.pass="";
  }

});
}


$scope.insertInfo = function(info){
$http.post('/ajax/register.php',{"fname":info.fname,"lname":info.lname,"login":info.login,"pass":info.pass,"email":info.email,"phone":info.phone,"access":info.access}).success(function(data){
if (data == true) {
$('#empForm').css('display', 'none');
}
});
}

$scope.addClient = function(info){
$http.post('/ajax/addclient.php',{"fname":info.fname,"lname":info.lname,"login":info.login,"pass":info.pass,"email":info.email,"phone":info.phone}).success(function(data){
if (data == true) {
$('#empForm').css('display', 'none');
}
});
}

$scope.addTerm = function(info){
$http.post('/ajax/addterm.php',{"name":info.name,"color":info.color,"access":info.access}).success(function(data){
if (data == true) {
    console.log(data);
$('#termForm').css('display', 'none');
}
});
}

$scope.regex = '^[0-9]*$';

}]);
