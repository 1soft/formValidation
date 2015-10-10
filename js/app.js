"use strict";

var app = angular.module('mainApp', ['ngRoute', 'hdForm'])
    .config(function ($routeProvider, $locationProvider) {
        $locationProvider.html5Mode({
            enabled: true,
            requireBase: true
        });
    });//add then successfully get url


app.controller('genderController', ['$scope', function ($scope) {
    $scope.clearCache = function() {
        $templateCache.removeAll();
    }
    $scope.user = {};
    $scope.user.gender = 'male';
    $scope.genderChanged = function (value) {
        $scope.user.gender = value;
    }
}]);

// create angular controller
app.controller('mainController', ['$scope', '$location', 'registerService',

    function ($scope, $location, registerService) {

        $scope.$watch('user', function (newVal, oldVal) {
        }, true);

        $scope.$on('hd-form-show', function (evt, data) {
            $scope.routeString = data.route;
            $location.path(data.route);
            broadcastMenuState();
        });

        $scope.user = {};
        $scope.message = {};
        $scope.user.firstname = 'test';
        $scope.user.lastname = 'test';
        $scope.user.gender = 'male';
        $scope.user.email = 'test1@bot.com';
        $scope.user.phone = '123123456789';
        $scope.user.country = '14';
        $scope.user.currency = 'USD';
        $scope.user.password = '123456';

        var urlParams = $location.search();

        Object.keys(urlParams).forEach(function (key) {

            $scope.user[key] = urlParams[key];

        });

        var vm = this;
        vm.register = function () {
            registerService.register($scope.userForm)
                .then(function (res) {
                    $scope.user.msg = res.message;
                    if (res.message == 'Success!') {

                    }
                    $scope.user.errors = {};
                    $scope.user.errors = res.errors;
                },
                function (res) { //res--> internal error
                    $scope.messages = {};
                    $scope.user.errors = res.errors;
                });
        }
        // process the hdForm
        // function to submit the hdForm after all validation has occurred
        $scope.submitForm = function (isValid,$scope) {
            // check to make sure the hdForm is completely valid
            if (isValid) {
                vm.register();
            }
        };

    }]);