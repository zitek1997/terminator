var crudApp = angular.module('crudApp',[]);
crudApp.controller("DbController",['$scope','$http', function($scope,$http){

getInfo();
function getInfo(){
$http.post('databaseFiles/empDetails.php').success(function(data){
$scope.details = data;
});
}
$scope.reSet = function(index) {$scope.products[index].likes += 1;};
$scope.show_form = true;
$scope.formToggle =function(){
$('#empForm').slideToggle();
$('#editForm').css('display', 'none');
}
$scope.insertInfo = function(info){
$http.post('databaseFiles/insertDetails.php',{"fname":info.fname,"lname":info.lname,"position":info.position,"wage":info.wage}).success(function(data){
if (data == true) {
getInfo();
$('#empForm').css('display', 'none');

}
});
}
$scope.regex = '^[0-9]*$';
$scope.deleteInfo = function(info){
$http.post('databaseFiles/deleteDetails.php',{"del_id":info.emp_id}).success(function(data){
if (data == true) {
getInfo();
}
});
}
$scope.currentUser = {};
$scope.editInfo = function(info){
$scope.currentUser = info;
$('#empForm').slideUp();
$('#editForm').slideToggle();
}
$scope.UpdateInfo = function(info){
$http.post('databaseFiles/updateDetails.php',{"id":info.emp_id,"fname":info.emp_fname,"lname":info.emp_lname,"position":info.emp_position,"wage":info.emp_wage}).success(function(data){
$scope.show_form = true;
if (data == true) {
getInfo();
}
});
}
$scope.updateMsg = function(emp_id){
$('#editForm').css('display', 'none');
}
}]);