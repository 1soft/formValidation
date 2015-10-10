"use strict";

angular.module("form").directive("form", function () {
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