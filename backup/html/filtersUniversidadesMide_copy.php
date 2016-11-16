<script type="text/javascript" src="../../js/angular.js"></script>
<script type="text/javascript" src="../../js/angular.ng-modules.js"></script>
<script type="text/javascript" src="../../js/dirPagination.js"></script>
<script type="text/javascript" src="../../js/mideUniversidadesController.js"></script>

<div ng-module="mideUniversidades" >
    <div ng-controller="mideUniversidadesController">
        <div class="row search-filters inst-filter">
            <div  class="form-horizontal">
                <div id="dvSearchNameUniversities" class="form-group">
                    <h5>Listado de universidades</h5>
                    <div class="col-md-2 ">
                      <label class="control-label">Buscar institución</label>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" id="nameUniversity" ng-model="fieldSearch.nameUniversity" class="form-control">
                    </div>
                    <div class="col-md-2 ">
                      <button class="btn btn-default" id="btnSearch" ng-click="searchByNameUniversities();" >Buscar</button>
                    </div>

                </div>
            </div>
        </div>
        <div id="dvSearchOther" class="row search-filters oter-filters">
            <h5>Criterios de busqueda</h5>
            <div class="col-md-4">
                <label class="control-label">Acreditadas</label>
                <select id="isAccredited" ng-model="fieldSearch.isAccredited" class="form-control">
                    <option value="">-- Seleccione --</option>
                    <option value="SI">IES acreditadas</option>
                    <option value="NO">IES no acreditada</option>
                </select>
            </div>
            <div class="col-md-4 col-md-offset-1">
                <label class="control-label">Tipo de institución: </label>
                <select id="typeUniversity" ng-model="fieldSearch.typeUniversity" class="form-control">
                    <option value="">-- Seleccione --</option>
                    <option value="UNIVERSIDAD">Universidad</option>
                    <option value="INSTITUCION UNIVERSITARIA">Institución universitaria</option>
                </select>
            </div>

            <div class="row search-filters">
                <div class="col-md-4">
                    <label class="control-label">Sector:</label>
                    <select id="sector" ng-model="fieldSearch.sector" class="form-control">
                        <option value="">-- Seleccione --</option>
                        <option value="OFICIAL">IES públicas</option>
                        <option value="PRIVADA">IES no públicas</option>
                    </select>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <label class="control-label">Grupo de clasificación: </label>
                    <select id="classificationGroup" ng-model="fieldSearch.classificationGroup" class="form-control">
                        <option value="">-- Seleccione --</option>
                        <option value="Pregrado">Pregrado</option>
                        <option value="Maestria">Maestria</option>
                        <option value="Doctorado">Doctorado</option>
                        <option value="Especializadas">Especializadas</option>
                    </select>
                </div>
                <div class="col-sm-2">
                  <button id="btnSearch" ng-click="searchByOtherFields();" class="btn btn-default">Buscar</button>
                </div>
            </div>
        </div>

        <table class="tbUniversities table table-hover" ng-hide="tableResult" >
            <thead>
                <tr>
                    <th>Puesto</th>
                    <th>Nombre de Institución Educativa</th>
                    <th>Sector</th>
                    <th>Tipo de Institución</th>
                    <th>Acreditación</th>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="text" ng-model="filters.nameUniversity"></td>
                    <td><input type="text" ng-model="filters.sector"></td>
                    <td><input type="text" ng-model="filters.typeUniversity"></td>
                    <td><input type="text" ng-model="filters.isAccredited"></td>
                </tr>
            </thead>

            <tbody>
                <tr dir-paginate="arrayUniversities in universities| filter:filters |itemsPerPage:10">
                    <td>{{arrayUniversities.position}}</td>
                    <td><a href="http://aprende.colombiaaprende.edu.co/es/mide/va-{{arrayUniversities.codeIes}}" data-toggle="modal" data-target="#myModal">{{arrayUniversities.nameUniversity}}</a>
                    <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Archivo PDF - Detalle de la Universidad</h4>
                                        </div>
                                        <div class="modal-body">
                                            <iframe src="http://docs.google.com/gview?url=http://victorpimentel.com/stuff/rubik.pdf&embedded=true" style="width:867px; height:400px;" frameborder="0"></iframe>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </td>
                    <td>{{arrayUniversities.sector}}</td>
                    <td>{{arrayUniversities.typeUniversity}}</td>
                    <td>{{arrayUniversities.isAccredited}}</td>
                </tr>
            </tbody>
        </table>


        <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true" ></dir-pagination-controls>

        <div id="seccionForSearchAddValue">
          <h4>Consulta por valor agregado</h4>
          <div class="row search-filters valor-filter">
            <h5>Consulte el modelo de Valor Agregado de su institución:<h5>
            <div class="col-md-3 ">
              <label class="control-label">Seleccione la Universidad: </label>
            </div>
            <div class="col-sm-6">
              <select id="namesUniversities" ng-model="SelectedData" class="form-control">
                <option ng-repeat="item in namesUniversities" ng-selected="{{item === SelectedData}}" value="{{item.codeIes}}">{{item.codeIes}} - {{item.nameUniversity}}</option>
              </select>
            </div>
            <div class="col-md-2 ">
              <button type="button" data-toggle="modal" data-target="#myModal" id="btnSearch" class="btn btn-default">Buscar</button>
              <!-- Modal -->

            <div class="modal fade" id="myModal" role="dialog">

                <div class="modal-dialog modal-lg">

                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Archivo PDF - Detalle de la Universidad</h4>
                        </div>
                        <div class="modal-body">
                            <iframe src="http://docs.google.com/gview?url=http://victorpimentel.com/stuff/rubik.pdf&embedded=true" style="width:867px; height:400px;" frameborder="0"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <section id="accordion">
        			<div>
        				<input type="checkbox" id="check-1" />
        				<label for="check-1">¿Qué es el modelo de Valor Agregado?</label>
        				<article>
        					<p>El Valor Agregado (VA) se refiere al logro o progreso de los estudiantes, en términos de aprendizaje. Es la diferencia entre el desempeño observado, (SABERPRO) y el desempeño a partir de los resultados en las pruebas SABER 11.</p>
                  <p>Esta medición es posible ya que en Colombia, existen dos pruebas obligatorias estandarizadas, Saber 11 y Saber PRO, que permiten estimar el Valor Agregado de cada Institución de Educación Superior a partir del año 2012. El modelo se estima para dos competencias genéricas de manera separada: Lectura Crítica y Razonamiento Cuantitativo.</p>
        				</article>
        			</div>
        			<div>
        				<input type="checkbox" id="check-2" />
        				<label for="check-2">¿Cómo se lee el  modelo de Valor Agregado?</label>
        				<article>
                  <p>El Valor Agregado (VA) se refiere al logro o progreso de los estudiantes, en términos de aprendizaje. Es la diferencia entre el desempeño observado, (SABERPRO) y el desempeño a partir de los resultados en las pruebas SABER 11.</p>
                  <p>Esta medición es posible ya que en Colombia, existen dos pruebas obligatorias estandarizadas, Saber 11 y Saber PRO, que permiten estimar el Valor Agregado de cada Institución de Educación Superior a partir del año 2012. El modelo se estima para dos competencias genéricas de manera separada: Lectura Crítica y Razonamiento Cuantitativo.</p>
        				</article>
        			</div>
        		</section>
          </div>
        </div>
    </div>
</div>
