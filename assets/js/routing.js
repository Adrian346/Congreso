var app = angular.module('app', ['ngRoute']);
app.config(function ($routeProvider) {
    // configure the routes
    $routeProvider
        .when('/', {
            // route for the home page
            templateUrl: 'pages/alumno.html',
            controller: 'alumnoController'
        })
        .when('/alta', {
            templateUrl: 'pages/alta.html',
            controller: 'altaController'
        })
        .when('/baja', {
            templateUrl: 'pages/baja.html',
            controller: 'bajaController'
        })
        .when('/cambia', {
            templateUrl: 'pages/cambia.html',
            controller: 'cambiaController'
        })
        .when('/consulta', {
            templateUrl: 'pages/consulta.html',
            controller: 'consultaController'
        })
        .otherwise({
            // when all else fails
            templateUrl: 'pages/routeNotFound.html',
            controller: 'notFoundController'
        });

});


app.controller('notFoundController', function ($scope) {
    $scope.message = 'There seems to be a problem finding the page you wanted';
    //$scope.attemptedPath = $location.path();
});
