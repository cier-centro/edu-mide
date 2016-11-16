var app = "";
var obj = "";

app = angular.module('mideUniversidades', ['angularUtils.directives.dirPagination']);

app.controller('mideUniversidadesController', function($scope, $http) {

    obj = {content: null};

    $http.get('../../service/resources/base-mide.json').success(function(data) {
        obj.content = data;
    });

    $scope.tableResult=true;
    
    $scope.searchByOtherFields = function() {

        var filterSearch = 0;
        var arrayObject = '';
        var numberFilterActive = 0;

        $scope.universities = [];

        var nameUniversity = document.getElementById('nameUniversity').value;
        var isAccredited = document.getElementById('isAccredited').value;
        var sector = document.getElementById('sector').value;
        var classification = document.getElementById('classification').value;
        var productMide = document.getElementById('productMide').value;
            
        if(nameUniversity == "" && isAccredited == "" && sector == "" && classification == ""){
            alert("Favor seleccione al menos un criterio de busqueda.");
            return false;
        }

        if(nameUniversity)
            numberFilterActive += 1;
        if(isAccredited)
            numberFilterActive += 1;
        if(sector)
            numberFilterActive += 1;
        if(classification)
            numberFilterActive += 1;

        angular.forEach(obj.content, function(mide) {
            filterSearch = 0;
            arrayObject = {
                codeIes: mide.codeIes,
                nameUniversity: mide.nameUniversity,
                sector: mide.sector,
                classification: mide.classification,
                isAccredited: mide.isAccredited,
                score: mide.score,
                score_est: mide.score_est,
                productMide: mide.productMide
            };

            if(nameUniversity){
                if (mide.nameUniversity.indexOf(nameUniversity) > -1 || mide.nameUniversity.toUpperCase().indexOf(nameUniversity.toUpperCase()) > -1){
                    filterSearch += 1;
                }
            }

            if(isAccredited){
                if(isAccredited == mide.isAccredited)
                    filterSearch += 1;
            }

            if(sector){
                if(sector == mide.sector)
                    filterSearch += 1;
            }

            if(classification){
                if(classification == mide.classification)
                    filterSearch += 1;
            }

            if(filterSearch == numberFilterActive){
                if(mide.productMide == productMide){
                    $scope.tableResult=false;
                    $scope.universities.push(arrayObject);
                }
            }

        });
        
    };
});
