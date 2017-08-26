<div class="container">
	<h1>Welcome to CodeIgniter!</h1>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. </p>
	<div ng-app="myApp">
	  <div>
	    {{ 'World' | greet }}
	  </div>
	  
	  <div ng-controller="GreetingController">
	  	{{ greeting }}
	  </div>
	  
	  <div ng-controller="DoubleController">
		Two times <input ng-model="num"> equals {{ double(num) }}
	  </div>
	  
	  <div ng-controller="SpicyController">
		 <input ng-model="customSpice">
		 <button class="btn btn-primary" ng-click="chiliSpicy()">Chili</button>
		 <button class="btn btn-success" ng-click="jalapenoSpicy()">Jalapeño</button>
		 <button class="btn btn-success" ng-click="custom()">custom</button>
		 <p>The food is {{spice}} spicy!</p>
	   </div>
	   
	   <div class="card bg-info" ng-controller="MainController">
		   <div class="card-body">
			    <p>Good {{timeOfDay}}, {{name}}!</p>
			    <div class="card bg-success" ng-controller="ChildController">
				    <div class="card-body">
					    <p>Good {{timeOfDay}}, {{name}}!</p>
					    <div class="card bg-warning" ng-controller="GrandChildController">
							<div class="card-body">
								<p>Good {{timeOfDay}}, {{name}}!</p>
				    		</div>
					    </div>
				    </div>
			    </div>
		   </div>
	   </div>
	   
	   <div ng-controller="notifyController">
		  <p>Let's try this simple notify service, injected into the controller...</p>
		  <input class="form-control" type="text" ng-init="message=''" ng-model="message" >
		  <button class="btn btn-primary" ng-click="callNotify(message);">NOTIFY</button>
	   </div>
	   
	   <div ng-controller="GreetController">
	    Hello {{name}}!
	   </div>
	   <div ng-controller="ListController">
	    <ol>
	      <li ng-repeat="name in names">{{name}} from {{department}}</li>
	    </ol>
	   </div>
  
	</div>
</div>
<script>
	(function(angular) {
		'use strict';
		var myApp = angular.module('myApp', []);
		
		myApp.filter('greet', function() {
		 return function(name) {
		    return 'Hello, ' + name + '!';
		  };
		});
		
		myApp.controller('GreetingController', ['$scope', function($scope) {
		  $scope.greeting = 'Hola!';
		}]);
		
		myApp.controller('DoubleController', ['$scope', function($scope) {
		  $scope.double = function(value) { if(isNaN(value)){return 0;}else{return value * 2;} };
	    }]);
	    
	    myApp.controller('SpicyController', ['$scope', function($scope) {
		    $scope.spice = 'very';
		    $scope.chiliSpicy = function() {
		        $scope.spice = 'chili';
		    };
		    $scope.jalapenoSpicy = function() {
		        $scope.spice = 'jalapeño';
		    };
		    $scope.custom = function(){
			    $scope.spice = $scope.customSpice;
		    }
		}]);
		
		myApp.controller('MainController', ['$scope', function($scope) {
		  $scope.timeOfDay = 'morning';
		  $scope.name = 'Nikki';
		}]);
		myApp.controller('ChildController', ['$scope', function($scope) {
		  $scope.name = 'Mattie';
		}]);
		myApp.controller('GrandChildController', ['$scope', function($scope) {
		  $scope.timeOfDay = 'evening';
		  $scope.name = 'Gingerbread Baby';
		}]);
		
		myApp.controller('notifyController', ['$scope', 'notify', function($scope, notify) {
	    	$scope.callNotify = function(msg) {
				notify(msg);
	    	};
		}]).factory('notify', ['$window', function(win) {
			var msgs = [];
		    return function(msg) {
		      msgs.push(msg);
		      if (msgs.length === 3) {
		        win.alert(msgs.join('\n'));
		        msgs = [];
		      }
		    };
  		}]);
  		
  		myApp.controller('GreetController', ['$scope', '$rootScope', function($scope, $rootScope) {
		  $scope.name = 'World';
		  $rootScope.department = 'AngularJS';
		}])
		.controller('ListController', ['$scope', function($scope) {
		  $scope.names = ['Igor', 'Misko', 'Vojta'];
		}]);
	})(window.angular);
</script>
