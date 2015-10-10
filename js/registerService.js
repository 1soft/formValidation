app.factory('registerService', ['$http', '$q',
    function registerService($http, $q) {
        // interface
        var service = {
            data: [],
            register: register
        };
        return service;

        // implementation
        function register(formData) {
            var param = function (data) {
                var returnString = '';
                for (d in data) {
                    if (data.hasOwnProperty(d))
                        returnString += d + '=' + data[d] + '&';
                }
                // Remove last ampersand and return
                return returnString.slice(0, returnString.length - 1);
            };
            
            var def = $q.defer();

            $http({
                method: 'POST',
                url: 'process.php',
                data: param(formData), //forms user object
                headers: {'Content-Type': 'application/x-www-hdForm-urlencoded'}
            }).success(function (res) {
                service.data = res;
                def.resolve(res);
            })
                .error(function (res) {
                    def.reject(res);
                });
            return def.promise;
        }
    }]);