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
                    <div class="col-12 text-center p-0 mt-3 mb-2 ">
                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3 ">
                            <h2 id="heading">
                                Añadir información de prestamos
                            </h2>
                            <p>Necesitamos saber si tienes otros créditos</p>
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
                                    style="width:65%"
                                >
                                    65%
                                </div>
                            </div>
                            <br />
                            <!-- fieldsets -->

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
                                        <label for="nombre"
                                            >Cuota Mensual</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control"
                                            v-model.trim="
                                                $v.cuota_mensual.$model
                                            "
                                            :class="{
                                                'is-invalid':
                                                    $v.cuota_mensual.$error,
                                                'is-valid': !$v.cuota_mensual
                                                    .$invalid
                                            }"
                                        />
                                        <div class="valid-feedback">
                                            Correcto!
                                        </div>
                                        <div class="invalid feedback">
                                            <span
                                                class="text-danger"
                                                v-if="
                                                    !$v.cuota_mensual.required
                                                "
                                                >Este campo es obligatorio</span
                                            >
                                            <span
                                                class="text-danger"
                                                v-if="!$v.cuota_mensual.numeric"
                                                >Este campo debe ser un
                                                número</span
                                            >
                                        </div>
                                    </div>
                                    <!--input ends-->

                                    <!--input start-->
                                    <div class="col-md-6 mb-3">
                                        <label for="nombre">Saldo</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            v-model.trim="$v.saldo.$model"
                                            :class="{
                                                'is-invalid': $v.saldo.$error,
                                                'is-valid': !$v.saldo.$invalid
                                            }"
                                        />
                                        <div class="valid-feedback">
                                            Correcto!
                                        </div>
                                        <div class="invalid feedback">
                                            <span
                                                class="text-danger"
                                                v-if="!$v.saldo.required"
                                                >Este campo es obligatorio</span
                                            >
                                            <span
                                                class="text-danger"
                                                v-if="!$v.saldo.numeric"
                                                >Este campo debe ser un
                                                número</span
                                            >
                                        </div>
                                    </div>
                                    <!--input ends-->

                                    <div class="col-md-6 mb-3">
                                        <label
                                            class="form-control-label"
                                            for="text-input"
                                            >Entidad Financiera (*)</label
                                        >
                                        <select
                                            class="form-control"
                                            v-model="id_entidad"
                                            required
                                        >
                                            <option value="0" disabled
                                                >Seleccione</option
                                            >
                                            <option
                                                v-for="entidad in arrayEntidad"
                                                :key="entidad.id_entidad"
                                                :value="entidad.id_entidad"
                                                v-text="entidad.nombre"
                                            ></option>
                                        </select>
                                    </div>

                                    <div
                                        v-show="errorPrestamo"
                                        class=" col-md-12 mb-3 form-group row div-error"
                                        style="justify-content: center;color:red"
                                    >
                                        <div class="text-center text-error">
                                            <div
                                                v-for="error in errorMostrarMsjPrestamo"
                                                :key="error"
                                                v-text="error"
                                            ></div>
                                        </div>
                                    </div>

                                    <div
                                        class=" col-md-12 mb-3"
                                        style="justify-content: center"
                                    >
                                        <button
                                            type="button"
                                            class="button"
                                            @click="registrarPrestamo()"
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
            cuota_mensual: null,
            saldo: null,
            id_entidad: 0,
            arrayEntidad: [],
            errorPrestamo: 0,
            errorMostrarMsjPrestamo: []
        };
    },
    validations: {
        cuota_mensual: {
            required,
            numeric
        },
        saldo: {
            required,
            numeric
        }
    },
    methods: {
        changeMenu() {
            this.$emit("updating-menu", 6); // 1. Emitting
        },
        selectEntidad() {
            let me = this;
            var url = "/entidad/selectEntidad";
            axios
                .get(url)
                .then(function(response) {
                    //console.log(response);
                    var respuesta = response.data;
                    me.arrayEntidad = respuesta.entidades;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },

        registrarPrestamo() {
            if (this.validarPrestamo()) {
                return;
            }
            let me = this;
            axios
                .post("/prestamo/registrar", {
                    cuota_mensual: this.cuota_mensual,
                    saldo: this.saldo,
                    id_entidad: this.id_entidad
                })
                .then(function(response) {
                    me.changeMenu();
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        limpiarDatos() {
            this.cuota_mensual = 0;
            this.saldo = 0;
            this.id_entidad = 0;
        },
        validarPrestamo() {
            this.errorPrestamo = 0;
            this.errorMostrarMsjPrestamo = [];
            if (this.id_entidad == 0)
                this.errorMostrarMsjPrestamo.push(
                    "Seleccione Entidad Financiera."
                );
            if (this.cuota_mensual == null)
                this.errorMostrarMsjPrestamo.push(
                    "El cuota no puede estar vacio."
                );
            if (this.saldo == null)
                this.errorMostrarMsjPrestamo.push(
                    "Saldo no puede estar vacio."
                );
            if (this.errorMostrarMsjPrestamo.length) this.errorPrestamo = 1;
            return this.errorPrestamo;
        }
    },
    mounted() {
        this.selectEntidad();
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
