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
          <div class="col-12 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
              <h2 id="heading">!Consigamos ese Crédito!</h2>
              <p>Completa tus datos personales</p>

              <!-- progressbar -->
              <ul id="progressbar">
                <li class="active" id="persona">
                  <strong>Datos personales</strong>
                </li>
                <li id="ingreso">
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
                  style="width: 0%"
                >
                  0%
                </div>
              </div>
              <br />
              <!-- fieldsets -->
              <spinner v-show="loading"></spinner>
              <form
                id="msform"
                action
                method="post"
                enctype="multipart/form-data"
                class="form-horizontal"
              >
                <div class="form-row">
                  <!--input start-->
                  <div class="col-md-6 mb-3">
                    <label for="nombre">Nombre</label>
                    <input
                      type="text"
                      name="nombre"
                      class="form-control"
                      v-model.trim="$v.nombre.$model"
                      :class="{
                        'is-invalid': $v.nombre.$error,
                        'is-valid': !$v.nombre.$invalid,
                      }"
                    />
                    <div class="valid-feedback">Correcto!</div>
                    <div class="invalid feedback">
                      <span class="text-danger" v-if="!$v.nombre.required"
                        >Este campo es obligatorio</span
                      >
                    </div>
                  </div>
                  <!--input ends-->

                  <!--input start-->
                  <div class="col-md-6 mb-3">
                    <label for="nombre">Apellido Paterno</label>
                    <input
                      type="text"
                      name="nombre"
                      class="form-control"
                      v-model.trim="$v.ap_paterno.$model"
                      :class="{
                        'is-invalid': $v.ap_paterno.$error,
                        'is-valid': !$v.ap_paterno.$invalid,
                      }"
                    />
                    <div class="valid-feedback">Correcto!</div>
                    <div class="invalid feedback">
                      <span class="text-danger" v-if="!$v.ap_paterno.required"
                        >Este campo es obligatorio</span
                      >
                    </div>
                  </div>
                  <!--input ends-->

                  <!--input start-->
                  <div class="col-md-6 mb-3">
                    <label for="ap_materno">Apellido Materno</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model.trim="$v.ap_materno.$model"
                      :class="{
                        'is-invalid': $v.ap_materno.$error,
                        'is-valid': !$v.ap_materno.$invalid,
                      }"
                    />
                    <div class="valid-feedback">Correcto!</div>
                    <div class="invalid feedback">
                      <span class="text-danger" v-if="!$v.ap_materno.required"
                        >Este campo es obligatorio</span
                      >
                    </div>
                  </div>
                  <!--input ends-->

                  <!--input start-->
                  <div class="col-md-6 mb-3">
                    <label for="ap_materno">Celular</label>
                    <input
                      type="number"
                      class="form-control"
                      v-model.trim="$v.celular.$model"
                      :class="{
                        'is-invalid': $v.celular.$error,
                        'is-valid': !$v.celular.$invalid,
                      }"
                    />
                    <div class="valid-feedback">Correcto!</div>
                    <div class="invalid feedback">
                      <span class="text-danger" v-if="!$v.celular.required"
                        >Este campo es obligatorio</span
                      >
                    </div>
                  </div>
                  <!--input ends-->

                  <!--input start-->
                  <div class="col-md-6 mb-3">
                    <label for="ap_materno">CI</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model.trim="$v.ci.$model"
                      :class="{
                        'is-invalid': $v.ci.$error,
                        'is-valid': !$v.ci.$invalid,
                      }"
                    />
                    <div class="valid-feedback">Correcto!</div>
                    <div class="invalid feedback">
                      <span class="text-danger" v-if="!$v.ci.required"
                        >Este campo es obligatorio</span
                      >
                    </div>
                  </div>
                  <!--input ends-->

                  <!--input start-->
                  <div class="col-md-6 mb-3">
                    <label for="direccion">Dirección</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model.trim="$v.direccion.$model"
                      :class="{
                        'is-invalid': $v.direccion.$error,
                        'is-valid': !$v.direccion.$invalid,
                      }"
                    />
                    <div class="valid-feedback">Correcto!</div>
                    <div class="invalid feedback">
                      <span class="text-danger" v-if="!$v.direccion.required"
                        >Este campo es obligatorio</span
                      >
                    </div>
                  </div>
                  <!--input ends-->

                  <!--input start-->
                  <div class="col-md-6 mb-3">
                    <label for="direccion">Ciudad de residencia</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model.trim="$v.lugar_residencia.$model"
                      :class="{
                        'is-invalid': $v.lugar_residencia.$error,
                        'is-valid': !$v.lugar_residencia.$invalid,
                      }"
                    />
                    <div class="valid-feedback">Correcto!</div>
                    <div class="invalid feedback">
                      <span
                        class="text-danger"
                        v-if="!$v.lugar_residencia.required"
                        >Este campo es obligatorio</span
                      >
                    </div>
                  </div>
                  <!--input ends-->

                  <div class="col-md-6 mb-3">
                    <label for="text-input">CI Expedido en</label>
                    <select
                      class="form-control"
                      v-model="id_extension"
                      required
                    >
                      <option value="0" disabled>Seleccione</option>
                      <option
                        v-for="extension in arrayExtension"
                        :key="extension.id_extension"
                        :value="extension.id_extension"
                        v-text="extension.extension"
                      ></option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label>Fecha Nacimiento</label>

                    <input
                      type="date"
                      v-model="fech_nac"
                      class="form-control"
                      required
                    />
                  </div>

                  <div class="col-md-6 mb-3">
                    <label class="col-md-5 form-control-label" for="text-input"
                      >Nacionalidad</label
                    >
                    <select class="form-control" v-model="id_nacionalidad">
                      <option value="0" disabled>Seleccione</option>
                      <option
                        v-for="nacionalidad in arrayNacionalidad"
                        :key="nacionalidad.id_nacionalidad"
                        :value="nacionalidad.id_nacionalidad"
                        v-text="nacionalidad.nacionalidad"
                      ></option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label>Estado Civil</label>

                    <select
                      class="form-control"
                      v-model="id_estado_civil"
                      required
                    >
                      <option value="0" disabled>Seleccione</option>
                      <option
                        v-for="estadocivil in arrayEstadoCivil"
                        :key="estadocivil.id_estado_civil"
                        :value="estadocivil.id_estado_civil"
                        v-text="estadocivil.estado_civil"
                      ></option>
                    </select>
                  </div>

                  <div
                    v-show="errorPersona"
                    class="col-md-12 mb-3 form-group row div-error"
                    style="justify-content: center; color: red"
                  >
                    <div class="text-center text-error">
                      <div
                        v-for="error in errorMostrarMsjPersona"
                        :key="error"
                        v-text="error"
                      ></div>
                    </div>
                  </div>

                  <div class="col-md-12 mb-3" style="justify-content: center">
                    <button
                      type="button"
                      class="button"
                      @click="registrarPersona()"
                    >
                      Siguiente
                    </button>
                  </div>
                </div>
              </form>
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
      nombre: "",
      ap_paterno: "",
      ap_materno: "",
      celular: "",
      ci: "",
      direccion: "",
      lugar_residencia: "",
      fech_nac: "",
      id_nacionalidad: 68,
      id_extension: 0,
      id_estado_civil: 0,
      arrayNacionalidad: [],
      arrayEstadoCivil: [],
      arrayExtension: [],
      errorPersona: 0,
      errorMostrarMsjPersona: [],
      loading: false,
    };
  },
  validations: {
    nombre: {
      required,
      nombreValid: helpers.regex("nombreValid", /^[a-z_\u00E0-\u00FC ]*$/i),
    },
    ap_paterno: {
      required,
      alpha: helpers.regex("alpha", /^[a-z_\u00E0-\u00FC ]*$/i),
    },
    ap_materno: {
      required,
      alpha: helpers.regex("alpha", /^[a-z_\u00E0-\u00FC ]*$/i),
    },
    celular: {
      required,
      numeric,
      maxLength: maxLength(8),
    },
    ci: {
      required,
      alphaNum,
    },
    lugar_residencia: {
      required,
      alpha: helpers.regex("alpha", /^[a-z_\u00E0-\u00FC ]*$/i),
    },
    direccion: {
      required,
      alpha: helpers.regex("alpha", /^[a-z_\u00E0-\u00FC ]*$/i),
    },
  },
  methods: {
    actualizar() {
      let me = this;
      axios
        .get("/persona")
        .then(function (response) {
          var res = response.data;
          me.nombre = res.persona[0].nombre;
          me.ap_paterno = res.persona[0].ap_paterno;
          me.ap_materno = res.persona[0].ap_materno;
          me.celular = res.persona[0].celular;
          me.direccion = res.persona[0].direccion;
          me.lugar_residencia = res.persona[0].lugar_residencia;
          me.ci = res.persona[0].ci;
          me.fech_nac = res.persona[0].fech_nac;
          me.id_nacionalidad = res.persona[0].id_nacionalidad;
          me.id_extension = res.persona[0].id_extension;
          me.id_estado_civil = res.persona[0].id_estado_civil;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    changeMenu() {
      if (this.id_estado_civil == 1 || this.id_estado_civil == 4) {
        this.$emit("updating-menu", 2); // 1. Emitting
      } else {
        this.$emit("updating-menu", 3); // 1. Emitting
      }
    },
    loaderoff() {
      loading: false;
    },
    loaderon() {
      loading: true;
    },
    selectNacionalidad() {
      let me = this;
      var url = "/nacionalidad/selectNacionalidad";
      axios
        .get(url)
        .then(function (response) {
          //console.log(response);
          var respuesta = response.data;
          me.arrayNacionalidad = respuesta.nacionalidades;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    selectEstadoCivil() {
      let me = this;
      var url = "/estadocivil/selectEstadoCivil";
      axios
        .get(url)
        .then(function (response) {
          //console.log(response);
          var respuesta = response.data;
          me.arrayEstadoCivil = respuesta.estados;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    selectExtension() {
      let me = this;
      var url = "/extension/selectExtension";
      axios
        .get(url)
        .then(function (response) {
          //console.log(response);
          var respuesta = response.data;
          me.arrayExtension = respuesta.extensiones;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    registrarPersona() {
      this.loaderon();
      if (this.validarPersona()) {
        return;
      }
      let me = this;
      axios
        .post("/persona/registrar", {
          nombre: this.nombre,
          ap_paterno: this.ap_paterno,
          ap_materno: this.ap_materno,
          celular: this.celular,
          ci: this.ci,
          direccion: this.direccion,
          lugar_residencia: this.lugar_residencia,
          fech_nac: this.fech_nac,
          id_nacionalidad: this.id_nacionalidad,
          id_extension: this.id_extension,
          id_estado_civil: this.id_estado_civil,
        })
        .then(function (response) {
          me.changeMenu();
          me.loader();
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    lipiarDatos() {
      this.nombre = "";
      this.ap_paterno = "";
      this.ap_materno = "";
      this.celular = "";
      this.ci = "";
      this.direccion = "";
      this.lugar_residencia = "";
      this.fech_nac = "";
      this.id_nacionalidad = 0;
      this.id_extension = 0;
      this.id_estado_civil = 0;
    },
    validarPersona() {
      this.errorPersona = 0;
      this.errorMostrarMsjPersona = [];

      if (this.id_nacionalidad == 0)
        this.errorMostrarMsjPersona.push("Seleccione Nacionalidad.");
      if (this.id_estado_civil == 0)
        this.errorMostrarMsjPersona.push("Seleccione Estado Civil.");
      if (!this.id_extension)
        this.errorMostrarMsjPersona.push("La extensión de ci es obligatoria.");
      if (!this.nombre)
        this.errorMostrarMsjPersona.push(
          "El campo nombre no puede estar vacio."
        );
      if (!this.ap_paterno)
        this.errorMostrarMsjPersona.push(
          "El ap. paterno no puede estar vacio."
        );
      if (!this.ap_materno)
        this.errorMostrarMsjPersona.push(
          "El ap. materno no puede estar vacio."
        );
      if (!this.celular)
        this.errorMostrarMsjPersona.push("El celular es requerido");
      if (!this.ci) this.errorMostrarMsjPersona.push("El CI es requerido");
      if (!this.direccion)
        this.errorMostrarMsjPersona.push("La direccion es requerido");
      if (!this.lugar_residencia)
        this.errorMostrarMsjPersona.push(
          "El campo Ciudad de residencia es requerido"
        );
      if (this.errorMostrarMsjPersona.length) this.errorPersona = 1;
      return this.errorPersona;
    },
  },
  mounted() {
    this.actualizar();
    this.selectNacionalidad();
    this.selectExtension();
    this.selectEstadoCivil();
  },
};
</script>
<style>
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
