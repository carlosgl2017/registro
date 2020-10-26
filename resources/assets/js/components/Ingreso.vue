<template>
  <main class="main">
    <div class="container-fluid">
      <!-- Ejemplo de tabla Listado -->
      <div class="card">
        <div class="card-body">
          <hr style="border-top: 5px solid #f5bb00; margin: 0" />
          <div style="height: 150px; overflow: hidden">
            <svg
              viewBox="0 0 500 150"
              preserveAspectRatio="none"
              style="height: 100%; width: 100%"
            >
              <path
                d="M0.00,49.98 C194.41,112.00 271.49,-49.98 500.00,49.98 L500.00,0.00 L0.00,0.00 Z"
                style="stroke: none; fill: #3f7d20"
              ></path>
            </svg>
          </div>
          <!--Formulario step by step-->
          <div class="col-12 flex-flow text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
              <h2 id="heading">Información de Ingresos</h2>
              <p>Ingresos que puedas respaldar con documentos oficiales</p>

              <!-- progressbar -->
              <ul id="progressbar">
                <li class="active" id="persona">
                  <strong>Datos personales</strong>
                </li>
                <li class="active" id="ingreso">
                  <strong>Crédito</strong>
                </li>

                <li id="prestamo">
                  <strong>Ingresos</strong>
                </li>
                <li id="credito">
                  <strong>Prestamos</strong>
                </li>

                <li id="credito">
                  <strong>Declaración de bienes</strong>
                </li>

                <li id="success">
                  <strong>Completado</strong>
                </li>
              </ul>
              <div class="progress">
                <div
                  class="progress-bar progress-bar-striped active"
                  role="progressbar"
                  aria-valuenow="10"
                  aria-valuemin="0"
                  aria-valuemax="100"
                  style="width: 35%"
                >
                  35%
                </div>
              </div>
              <br />
              <!-- fieldsets -->

              <!-- Ejemplo de tabla Listado -->
              <div class="card">
                <div class="card-header">
                  <i class="fa fa-align-justify"></i> Registrar Otro Ingreso
                  <button
                    type="button"
                    @click="abrirModal('ingreso', 'registrar')"
                    class="btn btn-secondary"
                  >
                    <i class="icon-plus"></i>&nbsp;Nuevo
                  </button>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <div class="col-md-6">
                      <!--
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="nombre">Nombre</option>
                                      <option value="descripcion">Descripción</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarArticulo(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarArticulo(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                      -->
                    </div>
                  </div>

                  <table
                    class="col-md-12 table-responsive-sm table-bordered table-striped"
                  >
                    <thead class="bg-info">
                      <tr>
                        <th>Ingreso Mensual</th>
                        <th>Descripción de trabajo</th>
                        <th>Lugar de trabajo</th>
                        <th>Antiguedad trabajo en meses</th>
                        <th>Antiguedad trabajo en años</th>
                        <th>Aporte a AFP</th>
                        <th>Tipo de ingreso</th>
                        <th>Tipo de salario</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="ingreso in arrayIngreso"
                        :key="ingreso.id_ingresos"
                      >
                        <td v-text="ingreso.ingreso_mensual"></td>
                        <td v-text="ingreso.descripcion_trabajo"></td>
                        <td v-text="ingreso.lugar_trabajo"></td>
                        <td v-text="ingreso.tiempo_trabajo_meses"></td>
                        <td v-text="ingreso.tiempo_trabajo_anios"></td>
                        <td v-if="ingreso.aporte_afp">SI</td>
                        <td v-else>NO</td>
                        <td v-text="ingreso.tipo_ingreso"></td>
                        <td v-text="ingreso.tipo_salario"></td>
                        <td>
                          <button
                            type="button"
                            class="btn btn-danger btn-sm"
                            @click="desactivarIngreso(ingreso.id_ingresos)"
                          >
                            <i class="icon-trash"></i>
                          </button>
                        </td>

                        <!-- <td>
                           <button type="button" @click="abrirModal('articulo','actualizar',articulo)" class="btn btn-warning btn-sm">
                                          <i class="icon-pencil"></i>
                                        </button> &nbsp;
                                        <template v-if="articulo.condicion">
                                            <button type="button" class="btn btn-danger btn-sm" @click="desactivarArticulo(articulo.id)">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </template>
                                        <template v-else>
                                            <button type="button" class="btn btn-info btn-sm" @click="activarArticulo(articulo.id)">
                                                <i class="icon-check"></i>
                                            </button>
                                        </template>
                          
                        </td>-->
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- Fin ejemplo de tabla Listado -->

              <!--Inicio del modal agregar/actualizar-->
              <div
                class="modal fade"
                tabindex="-1"
                :class="{ mostrar: modal }"
                role="dialog"
                aria-labelledby="myModalLabel"
                style="display: none"
                aria-hidden="true"
              >
                <div
                  class="modal-dialog modal-success modal-lg"
                  role="document"
                >
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" v-text="tituloModal"></h4>
                      <button
                        type="button"
                        class="close"
                        @click="cerrarModal()"
                        aria-label="Close"
                      >
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form
                        action
                        method="post"
                        enctype="multipart/form-data"
                        class="form-horizontal"
                      >
                        <div class="form-row">
                          <!--input start-->
                          <div class="col-md-6 mb-3">
                            <label for="ingreso_mensual">Ingreso Mensual</label>
                            <input
                              type="number"
                              class="form-control"
                              v-model.trim="$v.ingreso_mensual.$model"
                              :class="{
                                'is-invalid': $v.ingreso_mensual.$error,
                                'is-valid': !$v.ingreso_mensual.$invalid,
                              }"
                            />
                            <div class="valid-feedback">Correcto!</div>
                            <div class="invalid feedback">
                              <span
                                class="text-danger"
                                v-if="!$v.ingreso_mensual.required"
                                >Este campo es obligatorio</span
                              >
                            </div>
                          </div>
                          <!--input ends-->

                          <!--input start-->
                          <div class="col-md-6 mb-3">
                            <label for="descripcion_trabajo"
                              >¿En qué trabajas?</label
                            >
                            <input
                              type="text"
                              class="form-control"
                              required
                              placeholder="En qué trabajas"
                              v-model.trim="$v.descripcion_trabajo.$model"
                              :class="{
                                'is-invalid': $v.descripcion_trabajo.$error,
                                'is-valid': !$v.descripcion_trabajo.$invalid,
                              }"
                            />
                            <div class="valid-feedback">Correcto!</div>
                            <div class="invalid feedback">
                              <span
                                class="text-danger"
                                v-if="!$v.descripcion_trabajo.required"
                                >Este campo es obligatorio</span
                              >
                            </div>
                          </div>
                          <!--input ends-->

                          <!--input start-->
                          <div class="col-md-6 mb-3">
                            <label for="lugar_trabajo">Lugar de Trabajo</label>
                            <input
                              type="text"
                              class="form-control"
                              required
                              placeholder="Escribe tu lugar de trabajo.."
                              v-model.trim="$v.lugar_trabajo.$model"
                              :class="{
                                'is-invalid': $v.lugar_trabajo.$error,
                                'is-valid': !$v.lugar_trabajo.$invalid,
                              }"
                            />
                            <div class="valid-feedback">Correcto!</div>
                            <div class="invalid feedback">
                              <span
                                class="text-danger"
                                v-if="!$v.lugar_trabajo.required"
                                >Este campo es obligatorio</span
                              >
                            </div>
                          </div>
                          <!--input ends-->

                          <div class="col-md-6 mb-3">
                            <label class="form-control-label" for="text-input"
                              >Tiempo de trabajo en años</label
                            >

                            <select
                              class="form-control"
                              v-model="tiempo_trabajo_anios"
                            >
                              <option value="1">1 Año</option>
                              <option value="2">2 Años</option>
                              <option value="3">3 Años</option>
                              <option value="4">4 Años</option>
                              <option value="5">5 Años</option>
                              <option value="6">6 Años</option>
                              <option value="7">7 Años</option>
                              <option value="8">8 Años</option>
                              <option value="9">9 Años</option>
                              <option value="10">10 Años</option>
                              <option value="11">11 Años</option>
                              <option value="12">12 Años</option>
                              <option value="13">13 Años</option>
                              <option value="14">14 Años</option>
                              <option value="15">15 Años</option>
                              <option value="16">16 Años</option>
                              <option value="17">17 Años</option>
                              <option value="18">18 Años</option>
                              <option value="19">19 Años</option>
                              <option value="20">20 Años</option>
                              <option value="21">21 Años</option>
                              <option value="22">22 Años</option>
                              <option value="23">23 Años</option>
                              <option value="24">24 Años</option>
                              <option value="25">25 Años</option>
                              <option value="26">26 Años</option>
                              <option value="27">27 Años</option>
                              <option value="28">28 Años</option>
                              <option value="29">29 Años</option>
                              <option value="30">30 Años</option>
                            </select>
                          </div>

                          <div class="col-md-6 mb-3">
                            <label class="form-control-label" for="text-input"
                              >Tiempo de Trabajo en Meses</label
                            >

                            <select
                              class="form-control"
                              v-model="tiempo_trabajo_meses"
                            >
                              <option value="1">1 Meses</option>
                              <option value="2">2 Mesess</option>
                              <option value="3">3 Mesess</option>
                              <option value="4">4 Mesess</option>
                              <option value="5">5 Mesess</option>
                              <option value="6">6 Mesess</option>
                              <option value="7">7 Mesess</option>
                              <option value="8">8 Mesess</option>
                              <option value="9">9 Mesess</option>
                              <option value="10">10 Mesess</option>
                              <option value="11">11 Mesess</option>
                            </select>
                          </div>

                          <div class="col-md-6 mb-3">
                            <label class="form-control-label" for="text-input"
                              >¿Aporta a AFP?</label
                            >

                            <select class="form-control" v-model="aporte_afp">
                              <option value="1">Si</option>
                              <option value="0">No</option>
                            </select>
                          </div>

                          <div class="col-md-6 mb-3">
                            <label
                              class="col-md-3 form-control-label"
                              for="text-input"
                              >Tipo de Ingreso</label
                            >

                            <select
                              class="form-control"
                              v-model="id_tipoingreso"
                            >
                              <option value="0" disabled>Seleccione</option>
                              <option
                                v-for="tipoingreso in arrayTipoIngreso"
                                :key="tipoingreso.id_tipoingreso"
                                :value="tipoingreso.id_tipoingreso"
                                v-text="tipoingreso.tipo_ingreso"
                              ></option>
                            </select>
                          </div>

                          <div class="col-md-6 mb-3">
                            <label class="form-control-label" for="text-input"
                              >Tipo de Salario</label
                            >

                            <select
                              class="form-control"
                              v-model="id_tiposalario"
                            >
                              <option value="0" disabled>Seleccione</option>
                              <option
                                v-for="tiposalario in arrayTipoSalario"
                                :key="tiposalario.id_tiposalario"
                                :value="tiposalario.id_tiposalario"
                                v-text="tiposalario.tipo_salario"
                              ></option>
                            </select>
                          </div>

                          <div
                            v-show="errorIngreso"
                            class="col-md-12 mb-3 form-group row div-error"
                            style="justify-content: center; color: red"
                          >
                            <div class="text-center text-error">
                              <div
                                v-for="error in errorMostrarMsjIngreso"
                                :key="error"
                                v-text="error"
                              ></div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-success"
                        @click="cerrarModal()"
                      >
                        Cerrar
                      </button>
                      <button
                        type="button"
                        v-if="tipoAccion == 1"
                        class="btn btn-primary"
                        @click="registrarIngreso()"
                      >
                        Guardar
                      </button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!--Fin del modal-->

              <div class="col-md-12 mb-3" style="justify-content: center">
                <button type="button" class="button" @click="changeMenu()">
                  Siguiente
                </button>
              </div>
            </div>
          </div>
          <div style="height: 150px; overflow: hidden">
            <svg
              viewBox="0 0 500 150"
              preserveAspectRatio="none"
              style="height: 100%; width: 100%"
            >
              <path
                d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                style="stroke: none; fill: #3f7d20"
              ></path>
            </svg>
          </div>
          <hr style="border-top: 5px solid #f5bb00; margin: 0" />
        </div>
        <!-- Formulario step by step-->
      </div>
    </div>
    <!-- Fin ejemplo de tabla Listado -->
  </main>
</template>

<script>
import {
  required,
  minLength,
  alpha,
  numeric,
  alphaNum,
  between,
  maxLength,
  helpers,
} from "vuelidate/lib/validators";
export default {
  data() {
    return {
      id_tipoingreso: 0,
      id_tiposalario: 0,
      ingreso_mensual: null,
      descripcion_trabajo: "",
      lugar_trabajo: "",
      tiempo_trabajo_anios: 0,
      tiempo_trabajo_meses: 0,
      aporte_afp: 0,
      arrayIngreso: [],
      arrayTipoSalario: [],
      arrayTipoIngreso: [],
      errorIngreso: 0,
      errorMostrarMsjIngreso: [],
      tituloModal: "",
      modal: 0,
      tipoAccion: 0,
    };
  },
  validations: {
    ingreso_mensual: {
      required,
      numeric,
    },
    descripcion_trabajo: {
      required,
      nombreValid: helpers.regex("nombreValid", /^[a-z_\u00E0-\u00FC ]*$/i),
    },
    lugar_trabajo: {
      required,
      nombreValid: helpers.regex("nombreValid", /^[a-z_\u00E0-\u00FC ]*$/i),
    },
  },
  methods: {
    listarIngreso() {
      let me = this;
      axios
        .get("/ingreso")
        .then(function (response) {
          me.arrayIngreso = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    changeMenu() {
      this.$emit("updating-menu", 5); // 1. Emitting
    },
    selectTipoIngreso() {
      let me = this;
      var url = "/tipo-ingreso/selectTipoIngreso";
      axios
        .get(url)
        .then(function (response) {
          //console.log(response);
          var respuesta = response.data;
          me.arrayTipoIngreso = respuesta.ingresos;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    selectTipoSalario() {
      let me = this;
      var url = "/tipo-salario/selectTipoSalario";
      axios
        .get(url)
        .then(function (response) {
          //console.log(response);
          var respuesta = response.data;
          me.arrayTipoSalario = respuesta.salarios;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    registrarIngreso() {
      if (this.validarIngreso()) {
        return;
      }
      let me = this;
      axios
        .post("/ingreso/registrar", {
          ingreso_mensual: this.ingreso_mensual,
          descripcion_trabajo: this.descripcion_trabajo,
          lugar_trabajo: this.lugar_trabajo,
          tiempo_trabajo_anios: this.tiempo_trabajo_anios,
          tiempo_trabajo_meses: this.tiempo_trabajo_meses,
          aporte_afp: this.aporte_afp,
          id_tipoingreso: this.id_tipoingreso,
          id_tiposalario: this.id_tiposalario,
        })
        .then(function (response) {
          me.cerrarModal();
          me.listarIngreso();
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    limpiarDatos() {
      this.ingreso_mensual = 0;
      this.descripcion_trabajo = "";
      this.lugar_trabajo = "";
      this.tiempo_trabajo_anios = 0;
      this.tiempo_trabajo_meses = 0;
      this.aporte_afp = 0;
      this.id_tipoingreso = 0;
      this.id_tiposalario = 0;
    },
    cerrarModal() {
      this.modal = 0;
      this.tituloModal = "";
      this.ingreso_mensual = 0;
      this.descripcion_trabajo = "";
      this.lugar_trabajo = "";
      this.tiempo_trabajo_meses = 0;
      this.tiempo_trabajo_anios = 0;
      this.aporte_afp = 0;
      this.id_tipoingreso = 0;
      this.id_tiposalario = 0;
    },
    abrirModal(modelo, accion, data = []) {
      switch (modelo) {
        case "ingreso": {
          switch (accion) {
            case "registrar": {
              this.modal = 1;
              this.tituloModal = "Registrar Ingreso";
              this.ingreso_mensual = "";
              this.descripcion_trabajo = "";
              this.lugar_trabajo = "";
              this.tiempo_trabajo_meses = 0;
              this.tiempo_trabajo_anios = 0;
              this.aporte_afp = 0;
              this.id_tipoingreso = 0;
              this.id_tiposalario = 0;
              this.tipoAccion = 1;
              break;
            }
            case "actualizar": {
              break;
            }
          }
        }
      }
    },
    desactivarIngreso(id) {
      this.$swal({
        title: "Esta seguro de eliminar este registro?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Aceptar!",
        cancelButtonText: "Cancelar",
        confirmButtonClass: "btn btn-success",
        cancelButtonClass: "btn btn-danger",
        buttonsStyling: false,
        reverseButtons: true,
      }).then((result) => {
        if (result.value) {
          let me = this;

          axios
            .delete("/ingreso/desactivar", {
              id: id
            })
            .then(function (response) {
              me.listarIngreso();
              this.$swal('Deleted', 'You successfully deleted this file', 'success');
            })
            .catch(function (error) {
              console.log(error);
            });
        } else {
          this.$swal('Cancelled', 'Your file is still intact', 'info');
        }      
    
      });
    },
    validarIngreso() {
      this.errorIngreso = 0;
      this.errorMostrarMsjIngreso = [];
      if (this.id_tipoingreso == 0)
        this.errorMostrarMsjIngreso.push("Seleccione tipo de ingreso.");
      if (this.id_tiposalario == 0)
        this.errorMostrarMsjIngreso.push("Seleccione tipo de salario.");
      if (!this.ingreso_mensual)
        this.errorMostrarMsjIngreso.push(
          "El ingreso mensual  no puede estar vacío."
        );
      if (!this.descripcion_trabajo)
        this.errorMostrarMsjIngreso.push(
          "El detalle de trabajo no puede estar vacío."
        );
      if (!this.lugar_trabajo)
        this.errorMostrarMsjIngreso.push(
          "El lugar de trabajo no puede estar vacío."
        );
      if (!this.aporte_afp)
        this.errorMostrarMsjIngreso.push("El aporte afp no puede estar vacio.");
      if (this.errorMostrarMsjIngreso.length) this.errorIngreso = 1;
      return this.errorIngreso;
    },
  },
  mounted() {
    this.listarIngreso();
    this.selectTipoIngreso();
    this.selectTipoSalario();
  },
};
</script>
<style>
.modal-content {
  width: 100% !important;
  position: absolute !important;
}
.mostrar {
  display: list-item !important;
  opacity: 1 !important;
  position: absolute !important;
  background-color: #3c29297a !important;
}
.div-error {
  display: flex;
  justify-content: center;
}
.text-error {
  color: red !important;
  font-weight: bold;
}
.form-card {
  text-align: left;
}
.card {
  z-index: 0;
  border: none;
  position: relative;
}

.fs-title {
  font-size: 25px;
  color: #3f7d20;
  margin-bottom: 15px;
  font-weight: normal;
  text-align: left;
}

.purple-text {
  color: #3f7d20;
  font-weight: normal;
}

.steps {
  font-size: 25px;
  color: gray;
  margin-bottom: 10px;
  font-weight: normal;
  text-align: right;
}

.fieldlabels {
  color: gray;
  text-align: left;
}

#progressbar {
  margin-bottom: 30px;
  overflow: hidden;
  color: lightgrey;
}

#progressbar .active {
  color: #3f7d20;
}

#progressbar li {
  list-style-type: none;
  font-size: 15px;
  width: 20%;
  float: left;
  position: relative;
  font-weight: 400;
}

#progressbar #persona:before {
  font-family: FontAwesome;
  content: "\f007";
}

#progressbar #ingreso:before {
  font-family: FontAwesome;
  content: "\f0d6";
}

#progressbar #prestamo:before {
  font-family: FontAwesome;
  content: "\f09d";
}

#progressbar #credito:before {
  font-family: FontAwesome;
  content: "\f0d6";
}
#progressbar #success:before {
  font-family: FontAwesome;
  content: "\f046";
}

#progressbar li:before {
  width: 50px;
  height: 50px;
  line-height: 45px;
  display: block;
  font-size: 20px;
  color: #ffffff;
  background: lightgray;
  border-radius: 50%;
  margin: 0 auto 10px auto;
  padding: 2px;
}

#progressbar li:after {
  content: "";
  width: 100%;
  height: 2px;
  background: lightgray;
  position: absolute;
  left: 0;
  top: 25px;
  z-index: -1;
}

#progressbar li.active:before,
#progressbar li.active:after {
  background: #3f7d20;
}

.progress {
  height: 20px;
}

.progress-bar {
  background-color: #3f7d20;
}

.fit-image {
  width: 100%;
  object-fit: cover;
}

/*---estilo boton----*/
.button {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #3f7d20;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}
.button:hover {
  background-color: #3e8e41;
}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
