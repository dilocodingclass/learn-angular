<!DOCTYPE html>
<html>
<head>
	<title>Data Gempa BMKG</title>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

	<!-- tambahkan script untuk css -->
	<link rel="stylesheet" type="text/css" href="search.css">
</head>
<body ng-app="myApp" ng-controller="dataCtrl">
	<h1>Data Gempa BMKG</h1>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Jam</th>
			<th class="magnitude" ng-click="orderBySkala('Magnitude')">Skala</th>
			<th>Kedalaman</th>
			<th>Lintang</th>
			<th>Bujur</th>
			<th>Wilayah</th>
			<th>Koordinat</th>
		</tr>

		<tr ng-repeat="x in gempa | orderBy:myOrderBy">
			<td>{{$index + 1}}</td>
			<td>{{x.Tanggal}}</td>
			<td>{{x.Jam}}</td>
			<td>{{x.Magnitude}}</td>
			<td>{{x.Kedalaman}}</td>
			<td>{{x.Lintang}}</td>
			<td>{{x.Bujur}}</td>
			<td>{{x.Wilayah}}</td>
			<td>{{x.point.coordinates}}</td>
		</tr>
	</table>

	<!-- Script Untuk Angular JS nya -->
	<script>
		var app = angular.module("myApp", []);

		// buat controllernya
		app.controller('dataCtrl', function($scope, $http){

			// get file json gempa
			$http.get("gempa.php").then(function(response){
				$scope.gempa = response.data.gempa;
			});
			$scope.orderBySkala = function(x) {
				$scope.myOrderBy = x;
			};
		});
	</script>
</body>
</html>