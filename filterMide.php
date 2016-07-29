<script type="text/javascript" src="js/angular.js"></script>
<script type="text/javascript" src="js/angular.ng-modules.js"></script>
<script type="text/javascript" src="js/dirPagination.js"></script>
<script type="text/javascript" src="js/mideUniversidadesController.js"></script>

<div ng-module="mideUniversidades" class="container-fluid">
  <div class="row search-filters">
    <div ng-controller="mideUniversidadesController" class="form-horizontal">
      <div id="dvSearchNameUniversities" class="form-group">
        <h4>Listado de universidades</h4>
        <label class="col-md-2 control-label">Buscar institución</label>
        <div class="col-sm-8">
          <input type="text" id="nameUniversity" ng-model="fieldSearch.nameUniversity" class="form-control">
        </div>
        <button class="btn btn-default col-sm-2" id="btnSearch" ng-click="searchByNameUniversities();" >Buscar</button>
      </div>
    </div>
  </div>
  <div id="dvSearchOther" class="row search-filters">
    <h4>Criterios de busqueda</h4>
    <div class="col-md-5">
      <label class="control-label">Acreditadas</label>
      <select id="isAccredited" ng-model="fieldSearch.isAccredited" class="form-control">
        <option value="">-- Seleccione --</option>
        <option value="SI">IES acreditadas</option>
        <option value="NO">IES no acreditada</option>
      </select>
    </div>
    <div class="col-md-5">
      <label class="control-label">Tipo de institución: </label>
      <select id="typeUniversity" ng-model="fieldSearch.typeUniversity" class="form-control">
        <option value="">-- Seleccione --</option>
        <option value="UNIVERSIDAD">Universidad</option>
        <option value="INSTITUCION UNIVERSITARIA">Institución universitaria</option>
      </select>
    </div>
    <div class="row search-filters">
      <h4>Criterios de busqueda</h4>
      <div class="col-md-5">
        <label class="control-label">Sector:</label>
        <select id="sector" ng-model="fieldSearch.sector" class="form-control">
          <option value="">-- Seleccione --</option>
          <option value="OFICIAL">IES públicas</option>
          <option value="PRIVADA">IES no públicas</option>
        </select>
      </div>
      <div class="col-md-5">
        <label class="control-label">Grupo de clasificación: </label>
        <select id="classificationGroup" ng-model="fieldSearch.classificationGroup" class="form-control">
          <option value="">-- Seleccione --</option>
          <option value="Pregrado">Pregrado</option>
          <option value="Maestria">Maestria</option>
          <option value="Doctorado">Doctorado</option>
          <option value="Especializadas">Especializadas</option>
        </select>
      </div>
      <button id="btnSearch" ng-click="searchByOtherFields();" class="btn btn-default col-sm-2">Buscar</button>
    </div>
  </div>
</div>

        <table class="tbUniversities">
            <thead>
                <tr>
                    <th>Puesto</th>
                    <th>Nombre de Institución Educativa</th>
                    <th>Sector</th>
                    <th>Tipo de Institución</th>
                    <th>Acreditación</th>
                </tr>

                <tr>
                    <th></th>
                    <th><input type="text" ng-model="filters.nameUniversity"></th>
                    <th><input type="text" ng-model="filters.sector"></th>
                    <th><input type="text" ng-model="filters.typeUniversity"></th>
                    <th><input type="text" ng-model="filters.isAccredited"></th>
                </tr>
            </thead>

            <tbody>
                <tr dir-paginate="arrayUniversities in universities| filter:filters |itemsPerPage:10">
                    <td>{{arrayUniversities.position}}</td>
                    <td>{{arrayUniversities.nameUniversity}}</td>
                    <td>{{arrayUniversities.sector}}</td>
                    <td>{{arrayUniversities.typeUniversity}}</td>
                    <td>{{arrayUniversities.isAccredited}}</td>
                </tr>
            </tbody>
        </table>

        <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true" ></dir-pagination-controls>

        <div id="seccionForSearchAddValue">
            <b>Valor agregado: </b>
            <br>
            <label>Seleccione la Universidad: </label>
            <select id="namesUniversities" ng-model="SelectedData">
                <option ng-repeat="item in namesUniversities" ng-selected="{{item === SelectedData}}" value="{{item.codeIes}}">{{item.codeIes}} - {{item.nameUniversity}}</option>
            </select>
            <button id="btnSearch" ng-click="constructIp(SelectedData);">Buscar</button>
            <br>
        </div>
    </div>
</div>
