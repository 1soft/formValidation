"use strict";

angular.module("hdForm", []);


angular.module("hdForm").directive("hdForm", function () {
    return {
        transclude: true,
        scope: {
            email: '@',
            password: '@',
            spotsession: '@',
            iframe: '@',
            url: '@'
        },
        controller: "hdFormController",
        templateUrl: "js/hdForm/hdFormTemplate.html"

    };
});

angular.module("hdForm").controller("hdFormController",
    ['$scope', '$window', '$rootScope', '$location',
        function ($scope, $window, $rootScope, $location) {
            $scope.isFormVisible = true;

            var broadcastFormState = function () {
                $rootScope.$broadcast('hd-form-show',
                    {
                        show: $scope.isFormVisible
                    });
            };

        }
    ]);