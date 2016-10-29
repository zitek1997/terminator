var crudApp = angular.module('crudApp',[]);
crudApp.controller("DbController",['$scope','$http', function($scope,$http){


function getInfo(){
$http.post('databaseFiles/empDetails.php').success(function(data){
$scope.details = data;
});
}
$scope.insertInfo = function(info){
$http.post('ajax/register.php',{"fname":info.fname,"lname":info.lname,"login":info.login,"pass":info.pass,"email":info.email,"phone":info.phone}).success(function(data){
if (data == true) {

$('#empForm').css('display', 'none');

}
});
}
$scope.regex = '^[0-9]*$';

}]);