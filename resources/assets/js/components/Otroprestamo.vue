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
                            <h2 id="heading">Tiene otros Créditos</h2>
                            <p>Necesitamos saber si tiene otros créditos</p>

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
                                    style="width:50%"
                                >
                                    50%
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
                                <div
                                    class="col-md-12 form-group row"
                                    style="justify-content: center"
                                >
                                    <div class="col-md-6 col-sm-4 mb-3 col-xs-3">
                                        <button
                                            type="button"
                                            class="button"
                                            @click="opcionSi()"
                                        >
                                            SI
                                        </button>
                                    </div>

                                    <div class="col-md-6 col-sm-4 mb-3 col-xs-3">
                                        <button
                                            type="button"
                                            class="button"
                                            @click="opcionNo()"
                                        >
                                            NO
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
export default {
    data() {
        return {
            si: 0,
            no: 0
        };
    },
    methods: {
        opcionSi() {
            this.$emit("updating-menu", 7); // 1. Emitting
        },
        opcionNo() {
            this.$emit("updating-menu", 8);
        }
    },
    mounted() {}
};
</script>
<style>
* {
    margin: 0;
    padding: 0;
}

html {
    height: 100%;
}

p {
    color: grey;
}

#heading {
    text-transform: uppercase;
    color: #3f7d20;
    font-weight: normal;
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px;
}

#msform form {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative;
}

.form-card {
    text-align: left;
}

#msform form:not(:first-of-type) {
    display: none;
}

#msform input,
#msform textarea {
    padding: 8px 15px 8px 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2c3e50;
    background-color: #eceff1;
    font-size: 16px;
    letter-spacing: 1px;
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #3f7d20;
    outline-width: 0;
}

#msform .action-button {
    width: 100px;
    background: #3f7d20;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right;
}

#msform .action-button:hover,
#msform .action-button:focus {
    background-color: #311b92;
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right;
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    background-color: #000000;
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
