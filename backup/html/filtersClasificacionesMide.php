
<script type="text/javascript" src="/sites/default/files/naspublic/mide/js/angular.js"></script>
<script type="text/javascript" src="/sites/default/files/naspublic/mide/js/angular.ng-modules.js"></script>
<script type="text/javascript" src="/sites/default/files/naspublic/mide/js/dirPagination.js"></script>
<script type="text/javascript" src="/sites/default/files/naspublic/mide/js/mideUniversidadesController.js"></script>
<h2>Mide Clasificacion</h2>
<div class="panel-group" id="accordion" class="helping-image" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Clasificaciones
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <img src="http://52.37.84.217/edu-mide/images/img-methodology-2.jpg" alt="i">
      </div>
    </div>
  </div>
</div>
<div ng-module="mideUniversidades" >
    <div ng-controller="mideUniversidadesController">

        <input id="productMide" type="hidden" value="Clasificación">
        <div class="row search-filters">
          <h5>Criterios de busqueda</h5>
          <div class="col-md-5">
              <label class="control-label">Grupo de clasificación: </label>
              <select id="classification" class="form-control">
                  <option value="ENFOQUE DOCTORAL">PREGRADO CON ENFOQUE DOCTORAL</option>
                  <option value="ESPECIALIZADAS">PREGRADO ESPECIALIZADAS</option>
                  <option value="ENFOQUE MAESTRIA">PREGRADO CON ENFOQUE MAESTRIA</option>
                  <option value="PREGRADO U 5_8">PREGRADO 5_8 ÁREAS Univesidades</option>
                  <option value="PREGRADO U 2_4">PREGRADO 2_4 ÁREAS Univesidades</option>
                  <option value="PREGRADO I 2_4">PREGRADO 2_4 ÁREAS Univesidades</option>
                  <option value="PREGRADO I 5_8">PREGRADO 5_8 ÁREAS Univesidades</option>
              </select>
          </div>
        </div>
        <div id="dvSearchOther" class="row search-filters oter-filters">

            <div class="col-md-7">
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
                <div class="col-md-5">
                    <label class="control-label">Sector:</label>
                    <select id="sector" ng-model="fieldSearch.sector" class="form-control">
                        <option value="">-- Seleccione --</option>
                        <option value="OFICIAL">IES oficiales</option>
                        <option value="PRIVADA">IES privadas</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-2 col-md-offset-10">
            <button id="btnSearch" ng-click="searchByOtherFields();" class="btn btn-default">Buscar</button>
        </div>

        <table class="tbUniversities table table-hover" ng-hide="tableResult" >
            <thead>
                <tr>
                    <th>Código IES</th>
                    <th>Nombre de Institución Educativa</th>
                    <th>Sector</th>
                    <!--<th>Clasificación</th>-->
                    <th>Acreditación</th>
                    <!--<th ng-click="sort('score')" style="cursor: pointer">Puntaje</th>-->
                    <!--<th ng-click="sort('score_est')" style="cursor: pointer">Puntaje est</th>-->
                </tr>

                <tr>
                    <td></td>
                    <td sortable="'nameUniversity'"><input type="text" ng-model="filters.nameUniversity"></td>
                    <td><input type="text" ng-model="filters.sector"></td>
                    <!--<td><input type="text" ng-model="filters.classification"></td>-->
                    <td><input type="text" ng-model="filters.isAccredited"></td>
                    <!--<td></td>-->
                    <!--<td></td>-->
                </tr>
            </thead>

            <tbody>
                <tr ng-repeat="arrayUniversities in universities">
                    <td>{{arrayUniversities.codeIes}}</td>
                    <td>
                        <a href="http://aprende.colombiaaprende.edu.co/sites/default/files/naspublic/mide20/{{arrayUniversities.codeIes}}.pdf">{{arrayUniversities.nameUniversity}}</a>
                    </td>
                    <td>{{arrayUniversities.sector}}</td>
                    <!--<td>{{arrayUniversities.classification}}</td>-->
                    <td>{{arrayUniversities.isAccredited}}</td>
                    <!--<td>{{arrayUniversities.score}}</td>-->
                    <!--<td>{{arrayUniversities.score_est}}</td>-->
                </tr>
            </tbody>
        </table>



    </div>
</div>
