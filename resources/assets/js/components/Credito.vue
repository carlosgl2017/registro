<template>
    <main class="main">
        <div class="container-fluid">
            <!-- Ejemplo de tabla Listado -->
            <div class="card">
                <div class="card-body">
                    <hr style="border-top: 5px solid #F5BB00;margin: 0" />
                    <div style="height: 150px; overflow: hidden;">
                        <svg
                            viewBox="0 0 500 150"
                            preserveAspectRatio="none"
                            style="height: 100%; width: 100%;"
                        >
                            <path
                                d="M0.00,49.98 C194.41,112.00 271.49,-49.98 500.00,49.98 L500.00,0.00 L0.00,0.00 Z"
                                style="stroke: none; fill: #3f7d20;"
                            ></path>
                        </svg>
                    </div>
                    <!--Formulario step by step-->
                    <div class="col-12 flex-flow text-center p-0 mt-3 mb-2">
                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                            <h2 id="heading">Qué crédito necesitas?</h2>
                            <p>Monto a solicitar</p>

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
                                    style="width:25%"
                                >
                                    25%
                                </div>
                            </div>
                            <br />
                            <!-- fieldsets -->

                            <form
                                action
                                method="post"
                                enctype="multipart/form-data"
                                class="form-horizontal"
                            >
                                <div class="form-row">
                                    <!--input start-->
                                    <div class="col-md-6 mb-3">
                                        <label for="nombre">Monto en Bs.</label>
                                        <input
                                            type="number"
                                            onkeypress="return event.keyCode != 13;"
                                            name="monto"
                                            class="form-control"
                                            v-model.trim="$v.monto.$model"
                                            :class="{
                                                'is-invalid': $v.monto.$error,
                                                'is-valid': !$v.monto.$invalid
                                            }"
                                        />
                                        <div class="valid-feedback">
                                            Correcto!
                                        </div>
                                        <div class="invalid feedback">
                                            <span
                                                class="text-danger"
                                                v-if="!$v.monto.required"
                                                >Este campo es obligatorio</span
                                            >
                                        </div>
                                    </div>
                                    <!--input ends-->

                                    <div class="col-md-6 mb-3">
                                        <label
                                            class="col-md-3 form-control-label"
                                            for="text-input"
                                            >Tipo de Crédito</label
                                        >
                                        <select
                                            class="form-control"
                                            v-model="id_tipo_credito"
                                        >
                                            <option value="0" disabled
                                                >Seleccione</option
                                            >
                                            <option
                                                v-for="tipo_credito in arrayTipoCredito"
                                                :key="
                                                    tipo_credito.id_tipo_credito
                                                "
                                                :value="
                                                    tipo_credito.id_tipo_credito
                                                "
                                                v-text="
                                                    tipo_credito.tipo_credito
                                                "
                                            ></option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label
                                            class="col-md-3 form-control-label"
                                            for="text-input"
                                            >Para que quieres el Crédito?</label
                                        >
                                        <select
                                            class="form-control"
                                            v-model="id_destino"
                                        >
                                            <option value="0" disabled
                                                >Seleccione</option
                                            >

                                            <!-- CONSUMO  -->
                                            <option
                                                v-if="this.id_tipo_credito == 1"
                                                value="1"
                                                >COMPRA DE BIENES
                                                MUEBLES</option
                                            >
                                            <option
                                                v-if="this.id_tipo_credito == 1"
                                                value="2"
                                                >LIBRE DISPONIBILIDAD</option
                                            >

                                            <!-- CONSUMO  -->
                                            <option
                                                v-if="this.id_tipo_credito == 2"
                                                value="3"
                                                >CAPITAL DE INVERSIONES</option
                                            >
                                            <option
                                                v-if="this.id_tipo_credito == 2"
                                                value="4"
                                                >CAPITAL DE OPERACIONES</option
                                            >

                                            <!-- CONSUMO  -->
                                            <option
                                                v-if="this.id_tipo_credito == 3"
                                                value="5"
                                                >CONSTRUCCIÓN DE
                                                VIVIENDA</option
                                            >
                                            <option
                                                v-if="this.id_tipo_credito == 3"
                                                value="6"
                                                >ADQUISICIÓN DE TERRENO</option
                                            >
                                            <option
                                                v-if="this.id_tipo_credito == 3"
                                                value="7"
                                                >REFACCIÓN , REMODELACIÓN,
                                                AMPLIACIÓN, MEJORAMIENTO DE
                                                VIVIENDA</option
                                            >
                                            <option
                                                v-if="this.id_tipo_credito == 3"
                                                value="8"
                                                >COMPRA DE VIVIENDA</option
                                            >

                                            <!--<option
                                                v-for="destino_credito in arrayDestino"
                                                :key="
                                                    destino_credito.id_destino
                                                "
                                                :value="
                                                    destino_credito.id_destino
                                                "
                                                v-text="
                                                    destino_credito.destino_credito
                                                "
                                            ></option>-->
                                        </select>
                                    </div>

                                    <div
                                        v-show="errorCredito"
                                        class="form-group row div-error col-md-12 mb-3"
                                        style="justify-content: center;color:red"
                                    >
                                        <div class="text-center text-error">
                                            <div
                                                v-for="error in errorMostrarMsjCredito"
                                                :key="error"
                                                v-text="error"
                                            ></div>
                                        </div>
                                    </div>

                                    <div
                                        class="col-md-12 mb-3"
                                        style="justify-content: center"
                                    >
                                        <button
                                            type="button"
                                            class="button"
                                            @click="registrarCredito()"
                                        >
                                            Siguiente
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div style="height: 150px; overflow: hidden;">
                        <svg
                            viewBox="0 0 500 150"
                            preserveAspectRatio="none"
                            style="height: 100%; width: 100%;"
                        >
                            <path
                                d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                                style="stroke: none; fill: #3f7d20;"
                            ></path>
                        </svg>
                    </div>
                    <hr style="border-top: 5px solid #F5BB00;margin: 0" />
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
    helpers
} from "vuelidate/lib/validators";
export default {
    data() {
        return {
            id_destino: 0,
            id_tipo_credito: 0,
            monto: null,
            arrayDestino: [],
            arrayTipoCredito: [],
            modal: 0,
            tituloModal: "",
            errorCredito: 0,
            errorMostrarMsjCredito: []
        };
    },
    validations: {
        monto: {
            required,
            numeric
        }
    },
    methods: {
        changeMenu() {
            this.$emit("updating-menu", 4); // 1. Emitting
        },
        selectDestino() {
            let me = this;
            var url = "/destino/selectDestino";
            axios
                .get(url)
                .then(function(response) {
                    //console.log(response);
                    var respuesta = response.data;
                    me.arrayDestino = respuesta.destinos;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        selectTipoCredito() {
            let me = this;
            var url = "/tipo-credito/selectTipoCredito";
            axios
                .get(url)
                .then(function(response) {
                    //console.log(response);
                    var respuesta = response.data;
                    me.arrayTipoCredito = respuesta.creditos;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        registrarCredito() {
            if (this.validarCredito()) {
                return;
            }
            let me = this;
            console.log(this.monto);
            axios
                .post("/credito/registrar", {
                    monto: this.monto,
                    id_destino: this.id_destino,
                    id_tipo_credito: this.id_tipo_credito,
                    aporte_afp: this.aporte_afp
                })
                .then(function(response) {
                    me.changeMenu();
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        validarCredito() {
            this.errorCredito = 0;
            this.errorMostrarMsjCredito = [];
            if (this.id_destino == 0)
                this.errorMostrarMsjCredito.push(
                    "Seleccione para qué quieres el crédito."
                );
            if (this.id_tipo_credito == 0)
                this.errorMostrarMsjCredito.push("Seleccione tipo de crédito.");
            if (this.monto == null)
                this.errorMostrarMsjCredito.push(
                    "El monto no puede estar vacío."
                );
            if (this.errorMostrarMsjCredito.length) this.errorCredito = 1;
            return this.errorCredito;
        },
        editar(data=[]) {
            this.monto = data['monto'];
        }
    },
    mounted() {
        this.editar();
        this.selectDestino();
        this.selectTipoCredito();
    }
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
