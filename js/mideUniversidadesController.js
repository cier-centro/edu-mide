var app = "";

app = angular.module('mideUniversidades', []);

app.controller('mideUniversidadesController', function($scope, $http) {

    $scope.search = function() {
        
        $scope.universities = [];
        
        var obj = {content: null};

        $http.get('https://dl.dropboxusercontent.com/u/575652037/mide/edu-mide/resources/base-mide.json').success(function(data) {
            obj.content = data;

            angular.forEach(obj.content, function(mide) {
                $scope.universities.push({
                    position: mide.position,
                    nameUniversity: mide.nameUniversity,
                    sector: mide.sector,
                    typeUniversity: mide.typeUniversity,
                    isAccredited: mide.isAccredited
                });
            });
        });
    };
});

