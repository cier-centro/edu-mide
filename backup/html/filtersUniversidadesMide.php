<script type="text/javascript" src="../../js/angular.js"></script>
<script type="text/javascript" src="../../js/angular.ng-modules.js"></script>
<script type="text/javascript" src="../../js/dirPagination.js"></script>
<script type="text/javascript" src="../../js/mideUniversidadesController.js"></script>

<div ng-module="mideUniversidades" >
    <div ng-controller="mideUniversidadesController">

        <input id="productMide" type="hidden" value="Universidades">

        <div id="dvSearchOther" class="row search-filters oter-filters">
            <h5>Criterios de busqueda</h5>

            <div class="col-sm-7">
                <label class="control-label">Buscar institución</label>
                <input type="text" id="nameUniversity" ng-model="fieldSearch.nameUniversity" class="form-control">
            </div>

            <div class="col-md-5">
                <label class="control-label">Acreditadas</label>
                <select id="isAccredited" ng-model="fieldSearch.isAccredited" class="form-control">
                    <option value="">-- Seleccione --</option>
                    <option value="SI">IES acreditadas</option>
                    <option value="NO">IES no acreditada</option>
                </select>
            </div>

            <div class="row search-filters">
                <div class="col-md-6">
                    <label class="control-label">Sector:</label>
                    <select id="sector" ng-model="fieldSearch.sector" class="form-control">
                        <option value="">-- Seleccione --</option>
                        <option value="OFICIAL">IES públicas</option>
                        <option value="PRIVADA">IES no públicas</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="control-label">Grupo de clasificación: </label>
                    <select id="classification" class="form-control">
                        <option value="ENFOQUE DOCTORAL">ENFOQUE DOCTORAL</option>
                        <option value="ESPECIALIZADAS">ESPECIALIZADAS</option>
                        <option value="ENFOQUE MAESTRIA">ENFOQUE MAESTRIA</option>
                        <option value="PREGRADO U 5_8">PREGRADO U 5_8</option>
                        <option value="PREGRADO U 2_4">PREGRADO U 2_4</option>
                        <option value="PREGRADO I 2_4">PREGRADO I 2_4</option>
                        <option value="PREGRADO I 5_8">PREGRADO I 5_8</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-2 col-md-offset-10">
              <button id="btnSearch" ng-click="searchByOtherFields();" class="btn btn-default">Buscar</button>
          </div>
        </div>

        <table class="tbUniversities table table-hover" ng-hide="tableResult" >
            <thead>
                <tr>
                    <th>Código IES</th>
                    <th>Nombre de Institución Educativa</th>
                    <th>Sector</th>
                    <th>Clasificación</th>
                    <th>Acreditación</th>
                    <th ng-click="sort('score')" style="cursor: pointer">Puntaje</th>
                    <th ng-click="sort('score_est')" style="cursor: pointer">Puntaje est</th>
                </tr>

                <tr>
                    <td></td>
                    <td sortable="'nameUniversity'"><input type="text" ng-model="filters.nameUniversity"></td>
                    <td><input type="text" ng-model="filters.sector"></td>
                    <td><input type="text" ng-model="filters.classification"></td>
                    <td><input type="text" ng-model="filters.isAccredited"></td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>

            <tbody>
                <tr dir-paginate="arrayUniversities in universities| filter:filters |itemsPerPage:10 |orderBy:sortKey:reverse">
                    <td>{{arrayUniversities.codeIes}}</td>
                    <td>
                        <a href="http://aprende.colombiaaprende.edu.co/es/mide/{{arrayUniversities.codeIes}}" >{{arrayUniversities.nameUniversity}}</a>
                    </td>
                    <td>{{arrayUniversities.sector}}</td>
                    <td>{{arrayUniversities.classification}}</td>
                    <td>{{arrayUniversities.isAccredited}}</td>
                    <td>{{arrayUniversities.score}}</td>
                    <td>{{arrayUniversities.score_est}}</td>
                </tr>
            </tbody>
        </table>

        <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true" ></dir-pagination-controls>

    </div>
</div>
