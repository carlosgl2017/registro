<template>
            <main class="main">
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">                   
                    <div class="card-body">
<!--Formulario step by step-->                     
                            <div class="col-7 flex-flow text-center p-0 mt-3 mb-2">
                                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                    <h2 id="heading">Obten tu crédito de consumo</h2>
                                    <p>Completa el formulario y pasa al siguiente paso</p>
                                    <form id="msform">
                                        <!-- progressbar -->
                                        <ul id="progressbar">
                                            <li class="active" id="account"><strong>Datos personales</strong></li>
                                            <li id="personal"><strong>Datos Conyugue</strong></li>
                                            <li id="payment"><strong>Datos Ingresos</strong></li>
                                            <li id="confirm"><strong>Prestamos</strong></li>
                                            <li id="confi"><strong>comple</strong></li>
                                        </ul>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> <br> <!-- fieldsets -->
                                        <fieldset>
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="fs-title">Completa tus Datos Personales:</h2>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">Paso 1 - 4</h2>
                                                    </div>
                                                </div> 
                                                <label class="fieldlabels">Nombres: *</label> 
                                                <input type="text" v-model="nombre" placeholder="Nombres"/> 
                                                <label class="fieldlabels">Apellido Paterno: *</label> 
                                                <input type="text"  v-model="ap_paterno" placeholder="Ap. Paterno" /> 
                                                <label class="fieldlabels">Apellido Materno: *</label>                                                 
                                                <input type="text" v-model="ap_materno" placeholder="Ap. Materno"/>  
                                                <label class="fieldlabels">Telefono Celular: *</label>                                                 
                                                <input type="text"  v-model="celular" placeholder="Celular"/> 
                                                <label class="fieldlabels">ci: *</label>                                                 
                                                <input type="text"  v-model="ci" placeholder="Celular"/>                                                
                                               
                                                <div class="form-group row">
                                                        <label class="col-md-3 form-control-label" for="text-input">Nacionalidad (*)</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" v-model="id_nacionalidad">
                                                                <option value="0" disabled>Seleccione</option>
                                                                <option v-for="nacionalidad in arrayNacionalidad" :key="nacionalidad.id_nacionalidad" :value="nacionalidad.id_nacionalidad" v-text="nacionalidad.nacionalidad"></option>
                                                            </select>                                        
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                        <label class="col-md-3 form-control-label" for="text-input">CI Expedido en (*)</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" v-model="id_extension">
                                                                <option value="0" disabled>Seleccione</option>
                                                                <option v-for="extension in arrayExtension" :key="extension.id_extension" :value="extension.id_extension" v-text="extension.extension"></option>
                                                            </select>                                        
                                                        </div>
                                                </div>
                                                <label class="fieldlabels">Fecha Nacimiento: *</label>                                                 
                                                <input type="date" v-model="fech_nac"/> 

                                                 <div class="form-group row">
                                                        <label class="col-md-3 form-control-label" for="text-input">Estado Civil (*)</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" v-model="id_estado_civil">
                                                                <option value="0" disabled>Seleccione</option>
                                                                <option v-for="estadocivil in arrayEstadoCivil" :key="estadocivil.id_estado_civil" :value="estadocivil.id_estado_civil" v-text="estadocivil.estado_civil"></option>
                                                            </select>                                        
                                                        </div>
                                                </div>                                              
                                            </div>
                                            


                                            <div v-show="errorPersona" class="form-group row div-error">
                                                <div class="text-center text-error">
                                                    <div v-for="error in errorMostrarMsjPersona" :key="error" v-text="error">

                                                    </div>
                                                </div>
                                            </div>


                                        <input type="button" name="next" @click="registrarPersona()" class="next action-button" value="Siguiente"/>
                                        </fieldset>

                                        <fieldset>
                                             <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="fs-title">Completa los Datos de tu Conyugue</h2>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">Paso 1 - 4</h2>
                                                    </div>
                                                </div> 
                                                <label class="fieldlabels">Nombres: *</label> 
                                                <input type="text" v-model="nombre" placeholder="Nombres"/> 
                                                <label class="fieldlabels">Apellido Paterno: *</label> 
                                                <input type="text"  v-model="ap_paterno" placeholder="Ap. Paterno" /> 
                                                <label class="fieldlabels">Apellido Materno: *</label>                                                 
                                                <input type="text" v-model="ap_materno" placeholder="Ap. Materno"/>  
                                                <label class="fieldlabels">Telefono Celular: *</label>                                                 
                                                <input type="text"  v-model="celular" placeholder="Celular"/> 
                                                <label class="fieldlabels">ci: *</label>                                                 
                                                <input type="text"  v-model="ci" placeholder="Celular"/>                                                
                                               
                                                <div class="form-group row">
                                                        <label class="col-md-3 form-control-label" for="text-input">Nacionalidad (*)</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" v-model="id_nacionalidad">
                                                                <option value="0" disabled>Seleccione</option>
                                                                <option v-for="nacionalidad in arrayNacionalidad" :key="nacionalidad.id_nacionalidad" :value="nacionalidad.id_nacionalidad" v-text="nacionalidad.nacionalidad"></option>
                                                            </select>                                        
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                        <label class="col-md-3 form-control-label" for="text-input">CI Expedido en (*)</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" v-model="id_extension">
                                                                <option value="0" disabled>Seleccione</option>
                                                                <option v-for="extension in arrayExtension" :key="extension.id_extension" :value="extension.id_extension" v-text="extension.extension"></option>
                                                            </select>                                        
                                                        </div>
                                                </div>
                                                <label class="fieldlabels">Fecha Nacimiento: *</label>                                                 
                                                <input type="date" v-model="fech_nac"/> 

                                                 <div class="form-group row">
                                                        <label class="col-md-3 form-control-label" for="text-input">Estado Civil (*)</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" v-model="id_estado_civil">
                                                                <option value="0" disabled>Seleccione</option>
                                                                <option v-for="estadocivil in arrayEstadoCivil" :key="estadocivil.id_estado_civil" :value="estadocivil.id_estado_civil" v-text="estadocivil.estado_civil"></option>
                                                            </select>                                        
                                                        </div>
                                                </div>                                              
                                            </div>
                                            


                                            <div v-show="errorPersona" class="form-group row div-error">
                                                <div class="text-center text-error">
                                                    <div v-for="error in errorMostrarMsjPersona" :key="error" v-text="error">

                                                    </div>
                                                </div>
                                            </div>


                                             <input type="button" @click="registrarConyugue()" name="next" class="next action-button" value="Siguiente" /> <input type="button" name="Anterior" class="previous action-button-previous" value="Previous" />
                                        </fieldset>                                        

                                        <fieldset>
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="fs-title">Datos de tus Ingresos</h2>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">Paso 3 - 4</h2>
                                                    </div>
                                                </div> 
                                              



                             <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                               
                             
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Ingreso Mensual (*)</label>
                                    <div class="col-md-9">
                                        <input type="number" step="any" v-model="ingreso_mensual" class="form-control" placeholder="Ingreso Mensual">                                        
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Tiempo Trabajo</label>
                                    <div class="col-md-9">
                                        <input type="date"  v-model="tiempo_trabajo" class="form-control" placeholder="Tiempo Trabajo">                                        
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Aporta AFP</label>
                                    <div class="col-md-9">
                                        <select class="form-control" v-model="aporte_afp">
                                            <option value="1" >Si</option>
                                            <option value="0" >No</option>                                           
                                        </select>                                        
                                    </div>
                                 </div>

                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Tipo Ingreso</label>
                                    <div class="col-md-9">
                                        <select class="form-control" v-model="idtipoingreso">
                                            <option value="0" disabled>Seleccione</option>
                                            <option v-for="tipoingreso in arrayTipoIngreso" :key="tipoingreso.id_tipo_ingreso" :value="tipoingreso.id_tipoingreso" v-text="tipoingreso.tipo_ingreso"></option>
                                        </select>                                        
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Tipo Salario</label>
                                    <div class="col-md-9">
                                        <select class="form-control" v-model="id_tiposalario">
                                            <option value="0" disabled>Seleccione</option>
                                            <option v-for="tiposalario in arrayTipoSalario" :key="tiposalario.id_tiposalario" :value="tiposalario.id_tiposalario" v-text="tiposalario.tipo_salario"></option>
                                        </select>                                        
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Tipo Salario</label>
                                    <div class="col-md-9">
                                        <select class="form-control" v-model="id_tiposalario">
                                            <option value="0" disabled>Seleccione</option>
                                            <option v-for="tiposalario in arrayTipoSalario" :key="tiposalario.id_tiposalario" :value="tiposalario.id_tiposalario" v-text="tiposalario.tipo_salario"></option>
                                        </select>                                        
                                    </div>
                                </div>

                            
                                   <button type="button" class="btn btn-secondary" >Anterior</button>
                                     <button type="button"  class="btn btn-primary" @click="registrarIngreso()">Guardar</button>
                                    <button type="button"  class="btn btn-primary" >Siguiente</button>
                          

                                <div v-show="errorIngreso" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjIngreso" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>

                                                          

                            </form>



                                            </div> 
                                            <input type="button" name="next" class="next action-button" value="Siguiente" /> <input type="button" name="Anterior" class="previous action-button-previous" value="Previous" />
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="fs-title">Prestamos:</h2>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">Step 3 - 4</h2>
                                                    </div>
                                                </div> 
                                                <label class="fieldlabels">Cuota Mensual</label> 
                                                <input type="numeric" name="pic" accept="image/*"> 

                                                <label class="fieldlabels">Saldo</label> 
                                                <input type="numeric" name="pic" accept="image/*">

                                                <label class="fieldlabels">Entidad Bancaria</label> 
                                                <input type="text" name="pic" accept="image/*">
                                                
                                            </div> <input type="button" name="next" class="next action-button" value="Submit" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="fs-title">Fin:</h2>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">Paso 4 - 4</h2>
                                                    </div>
                                                </div> <br><br>
                                                <h2 class="purple-text text-center"><strong>Exelente!</strong></h2> <br>
                                                <div class="row justify-content-center">
                                                    <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                                                </div> <br><br>
                                                <div class="row justify-content-center">
                                                    <div class="col-7 text-center">
                                                        <h5 class="purple-text text-center">Exelente se esta procesando su solicitud</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
               <!-- Formulario step by step-->

                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
           
        </main>
</template>

<script>   

   export default {
        data ()
        {
            return{
                id_nacionalidad:0,
                id_estado_civil:0,
                id_extension:0,
                nombre:'',
                ap_paterno:'',
                ap_materno:'',
                celular:'',
                ci:'',
                estado_civil:'',
                estado:'',
                fech_nac:'',
                arrayNacionalidad:[],
                arrayEstadoCivil:[],
                arrayExtension:[],
                arrayTipoSalario:[],
                arrayTipoIngreso:[],
                modal:0,
                tituloModal : '',
                errorPersona : 0,
                errorMostrarMsjPersona : [],
            }
        },
        methods:{
            
            listarRol()
            {
              let me=this;
              axios.get('/rol').then(function(response)
              {
                  me.arrayRol=response.data;
              })  
              .catch(function (error){
                  console.log(error);
              });
            },
            selectNacionalidad()
            {
                let me=this;
                var url= '/nacionalidad/selectNacionalidad';
                axios.get(url).then(function (response) {
                    //console.log(response);                  
                    var respuesta= response.data;
                    me.arrayNacionalidad = respuesta.nacionalidades;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
             selectEstadoCivil()
            {
                let me=this;
                var url= '/estadocivil/selectEstadoCivil';
                axios.get(url).then(function (response) {
                    //console.log(response);                  
                    var respuesta= response.data;
                    me.arrayEstadoCivil= respuesta.estados;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
             selectExtension()
            {
                let me=this;
                var url= '/extension/selectExtension';
                axios.get(url).then(function (response) {
                    //console.log(response);                  
                    var respuesta= response.data;
                    me.arrayExtension = respuesta.extensiones;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            selectTipoIngreso()
            {
                let me=this;
                var url= '/tipo-ingreso/selectTipoIngreso';
                axios.get(url).then(function (response) {
                    //console.log(response);                  
                    var respuesta= response.data;
                    me.arrayTipoIngreso = respuesta.ingresos;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            selectTipoSalario()
            {
                let me=this;
                var url= '/tipo-salario/selectTipoSalario';
                axios.get(url).then(function (response) {
                    //console.log(response);                  
                    var respuesta= response.data;
                    me.arrayTipoSalario = respuesta.salarios;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            registrarPersona(){
                if(this.validarPersona()){
                    return;
                }
                let me=this;
                axios.post('/persona/registrar',{
                    'id_nacionalidad':this.id_nacionalidad,
                    'id_extension':this.id_extension,
                    'id_estado_civil':this.id_estado_civil,
                    'nombre':this.nombre,
                    'ap_paterno':this.ap_paterno,
                    'ap_materno':this.ap_materno,
                    'celular':this.celular,
                    'ci':this.ci,
                    'fech_nac':this.fetch_nac 
                }).then(function (response) {
                    this.id_nacionalidad=0;
                    this.id_extension=0;
                    this.id_estado_civil=0;               
                    this.nombre='';               
                    this.ap_paterno='';               
                    this.ap_materno='';               
                    this.celular='';               
                    this.ci='';
                    this.fech_nac='';               
                }).catch(function (error){
                    console.log(error);
                })
            },
            registrarConyugue(){
                if(this.validarPersona()){
                    return;
                }
                let me=this;
                axios.post('/persona/registrar',{
                    'id_nacionalidad':this.id_nacionalidad,
                    'id_extension':this.id_extension,
                    'id_estado_civil':this.id_estado_civil,
                    'nombre':this.nombre,
                    'ap_paterno':this.ap_paterno,
                    'ap_materno':this.ap_materno,
                    'celular':this.celular,
                    'ci':this.ci,
                    'fech_nac':this.fetch_nac                
                }).catch(function (error){
                    console.log(error);
                })
            },
            validarPersona(){
                this.errorPersona=0;
                this.errorMostrarMsjPersona =[];
                if (this.id_nacionalidad==0) this.errorMostrarMsjPersona.push("Seleccione una nacionalidad.");
                if (this.id_estado_civil==0) this.errorMostrarMsjPersona.push("Seleccione estado civil.");
                if (this.id_extension==0) this.errorMostrarMsjPersona.push("Seleccione extensión de ci.");
                if (!this.nombre) this.errorMostrarMsjPersona.push("El nombre  no puede estar vacío.");
                if (!this.ap_paterno) this.errorMostrarMsjPersona.push("El apellido no puede estar vacio.");
                if (!this.ci) this.errorMostrarMsjPersona.push("El ci no puede estar vacio.");
                if (!this.celular) this.errorMostrarMsjPersona.push("El celular no puede estar vacio");                
                if (this.errorMostrarMsjPersona.length) this.errorPersona = 1;
                return this.errorPersona;
            },
            avrir(modelo, accion, data = []){
                switch(modelo){
                    case "persona":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Artículo';
                                this.id_nacionalidad=0;
                                this.id_extension=0;
                                this.id_estado_civil=0;
                                this.id_users=0;
                                this.nombre='';
                                this.ap_paterno='';
                                this.ap_materno= '';
                                this.celular='';
                                this.ci='';
                                this.fech_nac = '';
                                this.tipoAccion=1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal = 1;
                                this.tituloModal = 'Registrar Artículo';
                                this.tipoAccion=2;
                                this.id_persona=data['id_persona'];
                                this.id_nacionalidad=data['id_nacionalidad'];
                                this.id_extension=data['id_extension'];
                                this.id_estado_civil=data['id_estado_civil'];
                                this.id_users=data['id_users'];
                                this.nombre=data['nombre'];
                                this.ap_paterno=data['ap_paterno'];
                                this.ap_materno= data['ap_materno'];
                                this.celular=data['celular'];
                                this.ci=data['ci'];
                                this.fech_nac = data['fech_nac'];
                                break;
                            }
                        }
                    }
                }
                this.selectNacionalidad();
            }
        },         
        mounted() {
            this.selectNacionalidad();
            this.selectExtension();
            this.selectEstadoCivil();
            this.listarRol();
            }
    }
</script>
<style>

* {
    margin: 0;
    padding: 0
}

html {
    height: 100%
}

p {
    color: grey
}

#heading {
    text-transform: uppercase;
    color: #3F7D20;
    font-weight: normal
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

.form-card {
    text-align: left
}

#msform fieldset:not(:first-of-type) {
    display: none
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
    color: #2C3E50;
    background-color: #ECEFF1;
    font-size: 16px;
    letter-spacing: 1px
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #3F7D20;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background: #3F7D20;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right
}

#msform .action-button:hover,
#msform .action-button:focus {
    background-color: #311B92
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
    float: right
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    background-color: #000000
}

.card {
    z-index: 0;
    border: none;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #3F7D20;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}

.purple-text {
    color: #3F7D20;
    font-weight: normal
}

.steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
}

.fieldlabels {
    color: gray;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #3F7D20
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f13e"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f030"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
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
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #3F7D20
}

.progress {
    height: 20px
}

.progress-bar {
    background-color: #3F7D20
}

.fit-image {
    width: 100%;
    object-fit: cover
}

</style>
