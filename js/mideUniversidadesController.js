var app = "";

app = angular.module('mideUniversidades', ['angularUtils.directives.dirPagination']);

app.controller('mideUniversidadesController', function($scope, $http) {

    $scope.universities = [];

    $scope.search = function() {
        var obj = {content: null};

        $http.get('Resources/base-mide.json').success(function(data) {
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
    
    $scope.searchByOtherFields = function() {
        
        var obj = {content: null};
        var filterSearch = 0;
        var arrayObject = '';
        var numberFilterActive = 0;
        
        $scope.universities = [];
        
        $http.get('https://dl.dropboxusercontent.com/u/575652037/mide/edu-mide/resources/base-mide.json').success(function(data) {
            
            obj.content = data;
            
            var isAccredited = document.getElementById('isAccredited').value;
            var typeUniversity = document.getElementById('typeUniversity').value;
            var sector = document.getElementById('sector').value;
            var classificationGroup = document.getElementById('classificationGroup').value;
            
            if(isAccredited == "" && typeUniversity == "" && sector == "" && classificationGroup == ""){
                alert("Favor seleccione al menos un criterio de busqueda.");
                return false;
            }
            
            if(isAccredited)
                numberFilterActive += 1;
            if(typeUniversity)
                numberFilterActive += 1;
            if(sector)
                numberFilterActive += 1;
            if(classificationGroup)
                numberFilterActive += 1;
            
            angular.forEach(obj.content, function(mide) {
                filterSearch = 0;
                arrayObject = {
                    position: mide.position,
                    nameUniversity: mide.nameUniversity,
                    sector: mide.sector,
                    typeUniversity: mide.typeUniversity,
                    isAccredited: mide.isAccredited
                };
                
                if(isAccredited){
                    if(isAccredited == mide.isAccredited)
                        filterSearch += 1;
                }
                
                if(typeUniversity){
                    if(typeUniversity == mide.typeUniversity)
                        filterSearch += 1;
                   }
                
                if(sector){
                    if(sector == mide.sector)
                        filterSearch += 1;
                }
                
                if(classificationGroup){
                    if(classificationGroup == mide.classificationGroup)
                        filterSearch = 1;
                }
                
                if(filterSearch == numberFilterActive){
                    $scope.universities.push(arrayObject);
                }
                
            });
        });
    };
    
    $scope.searchByNameUniversities = function() {
        
        var obj = {content: null};
        var arrayObject = '';
        
        $scope.universities = [];
        
        $http.get('https://dl.dropboxusercontent.com/u/575652037/mide/edu-mide/resources/base-mide.json').success(function(data) {
            
            obj.content = data;
            
            var nameUniversity = document.getElementById('nameUniversity').value;
            
            if(nameUniversity == ""){
                alert("Favor seleccione al menos un criterio de busqueda.");
                return false;
            }
            
            angular.forEach(obj.content, function(mide) {
                
                arrayObject = {
                    position: mide.position,
                    nameUniversity: mide.nameUniversity,
                    sector: mide.sector,
                    typeUniversity: mide.typeUniversity,
                    isAccredited: mide.isAccredited
                };
                
                if (mide.nameUniversity.indexOf(nameUniversity) > -1 || mide.nameUniversity.toUpperCase().indexOf(nameUniversity.toUpperCase()) > -1)
                    $scope.universities.push(arrayObject);
                
            });
        });
    };
    
});