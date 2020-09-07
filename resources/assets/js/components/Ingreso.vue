<template>
  <main class="main">
    <div class="container-fluid">
      <!-- Ejemplo de tabla Listado -->
      <div class="card">
        <div class="card-body">
          <hr style="border-top: 5px solid #F5BB00;margin: 0">
          <div style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C194.41,112.00 271.49,-49.98 500.00,49.98 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: #3f7d20;"></path></svg></div>
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
               
                <li  id="prestamo">
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
                  style="width:35%"
                >35%</div>
              </div>
              <br />
              <!-- fieldsets -->





              <form action method="post" enctype="multipart/form-data" class="form-horizontal">
<div class="form-row">
              <!--input start-->
                                    <div class="col-md-6 mb-3">
                                        <label for="ingreso_mensual"
                                            >Ingreso Mensual</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control"
                                            v-model.trim="$v.ingreso_mensual.$model"
                                            :class="{
                                                'is-invalid':
                                                    $v.ingreso_mensual.$error,
                                                'is-valid': !$v.ingreso_mensual
                                                    .$invalid
                                            }"
                                        />
                                        <div class="valid-feedback">
                                            Correcto!
                                        </div>
                                        <div class="invalid feedback">
                                            <span
                                                class="text-danger"
                                                v-if="!$v.ingreso_mensual.required"
                                                >Este campo es obligatorio</span
                                            >
                                        </div>
                                    </div>
                                    <!--input ends-->

                

                <div class="col-md-6 mb-3">
                  <label class="form-control-label" for="text-input">Tiempo de trabajo en años</label>
                
                    <select class="form-control" v-model="tiempo_trabajo_anios">
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
                  <label class="form-control-label" for="text-input">Tiempo de Trabajo en Meses</label>
                
                    <select class="form-control" v-model="tiempo_trabajo_meses">
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
                  <label class="form-control-label" for="text-input">¿Aporta a AFP?</label>
                
                    <select class="form-control" v-model="aporte_afp">
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  
                </div>

                <div class="col-md-6 mb-3">
                  <label class="col-md-3 form-control-label" for="text-input">Tipo de Ingreso</label>
            
                    <select class="form-control" v-model="id_tipoingreso">
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
                  <label class="form-control-label" for="text-input">Tipo de Salario</label>
                
                    <select class="form-control" v-model="id_tiposalario">
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
                  style="justify-content: center;color:red"
                >
                  <div class="text-center text-error">
                    <div v-for="error in errorMostrarMsjIngreso" :key="error" v-text="error"></div>
                  </div>
                </div>

                <div class="col-md-12 mb-3" style="justify-content: center">                
                  <button
                    type="button"
                    class="button"
                    @click="registrarIngreso()"
                  >Siguiente</button>
                </div>  

                </div>               
              </form>
    
            </div>
            </div>
          <div style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #3f7d20;"></path></svg></div>
  <hr style="border-top: 5px solid #F5BB00;margin: 0">  
        </div>
        <!-- Formulario step by step-->
      </div>
    </div>
    <!-- Fin ejemplo de tabla Listado -->
  </main>
</template>

<script>
import { required, minLength, alpha, numeric, alphaNum, between,maxLength, helpers} from "vuelidate/lib/validators";
export default {
  data() {
    return {
      id_tipoingreso: 0,
      id_tiposalario: 0,
      ingreso_mensual: null,
      tiempo_trabajo_anios: 0,
      tiempo_trabajo_meses: 0,
      aporte_afp: 0,
      arrayTipoSalario: [],
      arrayTipoIngreso: [],
      errorIngreso: 0,
      errorMostrarMsjIngreso: []
    };
  },
  validations: {
        ingreso_mensual: {
            required,
            numeric
        },
  },
  methods: {
    changeMenu() {
         this.$emit('updating-menu',5)  // 1. Emitting    
    },
    selectTipoIngreso() {
      let me = this;
      var url = "/tipo-ingreso/selectTipoIngreso";
      axios
        .get(url)
        .then(function(response) {
          //console.log(response);
          var respuesta = response.data;
          me.arrayTipoIngreso = respuesta.ingresos;
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    selectTipoSalario() {
      let me = this;
      var url = "/tipo-salario/selectTipoSalario";
      axios
        .get(url)
        .then(function(response) {
          //console.log(response);
          var respuesta = response.data;
          me.arrayTipoSalario = respuesta.salarios;
        })
        .catch(function(error) {
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
          tiempo_trabajo_anios: this.tiempo_trabajo_anios,
          tiempo_trabajo_meses: this.tiempo_trabajo_meses,
          aporte_afp: this.aporte_afp,
          id_tipoingreso: this.id_tipoingreso,
          id_tiposalario: this.id_tiposalario
        })
        .then(function(response) {
          me.changeMenu();          
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    limpiarDatos()
    {
          this.ingreso_mensual = 0;
          this.tiempo_trabajo_anios = 0;
          this.tiempo_trabajo_meses = 0;
          this.aporte_afp = 0;
          this.id_tipoingreso = 0;
          this.id_tiposalario = 0;
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
      if (!this.aporte_afp)
        this.errorMostrarMsjIngreso.push("El aporte afp no puede estar vacio.");
      if (this.errorMostrarMsjIngreso.length) this.errorIngreso = 1;
      return this.errorIngreso;
    }
  },
  mounted() {
    this.selectTipoIngreso();
    this.selectTipoSalario();
  }
}
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
