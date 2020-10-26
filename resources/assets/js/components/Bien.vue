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
              <h2 id="heading">Registra bienes (muebles y enseres)</h2>
              <p>Registrar</p>

              <!-- progressbar -->
              <ul id="progressbar">
                <li class="active" id="persona">
                  <strong>Datos personales</strong>
                </li>
                <li class="active" id="ingreso">
                  <strong>Crédito</strong>
                </li>

                <li class="active" id="prestamo">
                  <strong>Ingresos</strong>
                </li>
                <li class="active" id="credito">
                  <strong>Prestamos</strong>
                </li>

                <li class="active" id="credito">
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
                  style="width: 85%"
                >
                  85%
                </div>
              </div>
              <br />
              <!-- fieldsets -->

              <!-- Ejemplo de tabla Listado -->
              <div class="card">
                <div class="card-header">
                  <i class="fa fa-align-justify"></i> Añadir nuevo bien
                  <button
                    type="button"
                    @click="abrirModal('bien', 'registrar')"
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
                        <th>Descripción</th>
                        <th>Marca</th>
                        <th>Serie</th>
                        <th>Valor en Bs.</th>
                        <th>Tipo Bien</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="bien in arrayBien" :key="bien.id_bien">
                        <td v-text="bien.descripcion"></td>
                        <td v-text="bien.marca"></td>
                        <td v-text="bien.serie"></td>
                        <td v-text="bien.valor"></td>
                        <td v-text="bien.tipo_bien"></td>

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
                            <label for="descripcion">Descripción</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model.trim="$v.descripcion.$model"
                              :class="{
                                'is-invalid': $v.descripcion.$error,
                                'is-valid': !$v.descripcion.$invalid,
                              }"
                            />
                            <div class="valid-feedback">Correcto!</div>
                            <div class="invalid feedback">
                              <span
                                class="text-danger"
                                v-if="!$v.descripcion.required"
                                >Este campo es obligatorio</span
                              >
                            </div>
                          </div>
                          <!--input ends-->

                          <!--input start-->
                          <div class="col-md-6 mb-3">
                            <label for="descripcion">Marca</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model.trim="$v.marca.$model"
                              :class="{
                                'is-invalid': $v.marca.$error,
                                'is-valid': !$v.marca.$invalid,
                              }"
                            />
                            <div class="valid-feedback">Correcto!</div>
                            <div class="invalid feedback">
                              <span
                                class="text-danger"
                                v-if="!$v.marca.nombreValid"
                                >Este campo debe ser de tipo texto</span
                              >
                            </div>
                          </div>
                          <!--input ends-->

                          <!--input start-->
                          <div class="col-md-6 mb-3">
                            <label for="descripcion">Serie</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model.trim="$v.serie.$model"
                              :class="{
                                'is-invalid': $v.serie.$error,
                                'is-valid': !$v.serie.$invalid,
                              }"
                            />
                            <div class="valid-feedback">Correcto!</div>
                            <div class="invalid feedback">
                              <span
                                class="text-danger"
                                v-if="!$v.serie.nombreValid"
                                >Este campo debe ser de tipo texto</span
                              >
                            </div>
                          </div>
                          <!--input ends-->

                          <!--input start-->
                          <div class="col-md-6 mb-3">
                            <label for="descripcion">Valor</label>
                            <input
                              type="number"
                              class="form-control"
                              v-model.trim="$v.valor.$model"
                              :class="{
                                'is-invalid': $v.valor.$error,
                                'is-valid': !$v.valor.$invalid,
                              }"
                              required
                            />
                            <div class="valid-feedback">Correcto!</div>
                            <div class="invalid feedback">
                              <span
                                class="text-danger"
                                v-if="!$v.valor.required"
                                >Este campo es obligatorio</span
                              >
                              <span class="text-danger" v-if="!$v.valor.numeric"
                                >Este campo debe ser numérico</span
                              >
                            </div>
                          </div>
                          <!--input ends-->

                          <div class="col-md-12 mb-3">
                            <label
                              class="col-md-3 form-control-label"
                              for="text-input"
                              >Tipo de Bien</label
                            >
                            <select class="form-control" v-model="id_tipo_bien">
                              <option value="0" disabled>Seleccione</option>
                              <option
                                v-for="tipo_bien in arrayTipoBien"
                                :key="tipo_bien.id_tipo_bien"
                                :value="tipo_bien.id_tipo_bien"
                                v-text="tipo_bien.tipo_bien"
                              ></option>
                            </select>
                          </div>

                          <div
                            v-show="errorBien"
                            class="col-md-12 mb-3 form-group row div-error"
                          >
                            <div class="text-center text-error">
                              <div
                                v-for="error in errorMostrarMsjBien"
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
                        @click="registrarBien()"
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

              <spinner v-show="loading"></spinner>
              <div class="form-group row" style="justify-content: center">
                <button type="button" class="button" @click="enviarMensaje()">
                  Enviar solicitud
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
      id_bien: 0,
      tipoAccion: 0,
      id_tipo_bien: 0,
      descripcion: "",
      marca: "",
      serie: "",
      valor: null,
      arrayTipoBien: [],
      arrayBien: [], //el objeto response de listarbien se almacena en este array
      modal: 0,
      tituloModal: "",
      errorBien: 0,
      errorMostrarMsjBien: [],
      loading: false,
      check: 0,
      calculo: 0,
    };
  },
  validations: {
    descripcion: {
      required,
      nombreValid: helpers.regex("nombreValid", /^[a-z_\u00E0-\u00FC ]*$/i),
    },
    marca: {
      nombreValid: helpers.regex("nombreValid", /^[a-z_\u00E0-\u00FC ]*$/i),
    },
    serie: {
      nombreValid: helpers.regex("nombreValid", /^[a-z_\u00E0-\u00FC ]*$/i),
    },
    valor: {
      required,
      numeric,
    },
  },
  methods: {
    loaderon() {
      this.loading = true;
    },
    loaderoff() {
      this.loading = false;
    },
    checkEmpty() {
      let me = this;
      axios
        .get("/check")
        .then(function (response) {
          me.check = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    calculo() {
      let me = this;
      axios
        .get("/calculo")
        .then(function (response) {
          me.calculo = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    listarBien() {
      let me = this;
      axios
        .get("/bien")
        .then(function (response) {
          me.arrayBien = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    changeMenu() {
      this.$emit("updating-menu", 9); // 1. Emitting
    },
    selectTipoBien() {
      let me = this;
      var url = "/tipo-bien/selectTipoBien";
      axios
        .get(url)
        .then(function (response) {
          //console.log(response);
          var respuesta = response.data;
          me.arrayTipoBien = respuesta.bienes;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    registrarBien() {
      if (this.validarBien()) {
        return;
      }
      let me = this;
      console.log(this.valor);
      axios
        .post("/bien/registrar", {
          id_tipo_bien: this.id_tipo_bien,
          descripcion: this.descripcion,
          marca: this.marca,
          serie: this.serie,
          valor: this.valor,
        })
        .then(function (response) {
          me.cerrarModal();
          me.listarBien();
          me.checkEmpty();

          /* me.changeMenu();*/
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    enviarMensaje() {
      if (this.calculo == 1) {
        this.checkEmpty();
        console.log(this.check);
        if (this.check >= 4) {
          let me = this;
          this.loaderon();
          var url = "/bien/enviar";
          axios
            .get(url)
            .then(function (response) {
              me.changeMenu();
              this.loaderoff();
            })
            .catch(function (error) {
              console.log(error);
            });
        } else {
          this.$swal("Registra como mínimo 4 bienes");
        }
      } else {
        this.$swal("Actualiza el monto a solicitar");
        this.$emit("updating-menu", 3); // 1. Emitting
      }
    },
    cerrarModal() {
      this.modal = 0;
      this.tituloModal = "";
      this.valor = null;
      this.descripcion = "";
      this.marca = "";
      this.serie = "";
    },
    abrirModal(modelo, accion, data = []) {
      switch (modelo) {
        case "bien": {
          switch (accion) {
            case "registrar": {
              this.modal = 1;
              this.tituloModal = "Registrar Bienes";
              this.descripcion = "";
              this.marca = "";
              this.serie = "";
              this.valor = null;
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
    validarBien() {
      this.errorBien = 0;
      this.errorMostrarMsjBien = [];
      if (this.id_tipo_bien == 0)
        this.errorMostrarMsjBien.push("Seleccione tipo de bien.");
      if (!this.valor)
        this.errorMostrarMsjBien.push("El valor es obligatorio.");
      if (!this.descripcion)
        this.errorMostrarMsjBien.push(
          "La descripción es un valor obligatorio."
        );
      if (this.errorMostrarMsjBien.length) this.errorBien = 1;
      return this.errorBien;
    },
  },
  mounted() {
    this.selectTipoBien();
    this.listarBien();
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
  width: 16%;
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
