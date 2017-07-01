angular.module('myApp', [])
		.controller('employeeController', function ($scope, $http) {

			$scope.message = "Hi, just checking if everything is fine!";
			$scope.btnName = "Add";
			$scope.insertData = function(){
				$http.post(
					"insert.php", {
						'name' : $scope.name,
						'dateOfBirth' : $scope.dateOfBirth,
						'gender' : $scope.gender,
						'salary' : $scope.salary,
						'btnName' : $scope.btnName,
						'id' : $scope.id
					}).success(function(data){
						alert(data);
						$scope.name = null;
						$scope.dateOfBirth = null;
						$scope.gender = null;
						$scope.salary = null;
						$scope.btnName = 'Add';
						$scope.fetchData();
					});
			};
			$scope.fetchData = function(){
				$http.get("select.php")
					.success(function(data){
						$scope.allEmployees = data;
					});
			}
			$scope.updateData = function(id, name, dateOfBirth, gender, salary, btnName){
				$scope.id = id;
				$scope.name = name;
				$scope.dateOfBirth = dateOfBirth;
				$scope.gender = gender;
				$scope.salary = salary;
				$scope.btnName = 'Update';
			}
			$scope.deleteData = function(id){
				if(confirm("Are you sure you want to delete this?")){
					$http.post(
						"delete.php", {
							'id' : id
					}).success(function(data){
						alert(data);
						$scope.fetchData();
					})
				}else{
					return false;
				}
			}
		});