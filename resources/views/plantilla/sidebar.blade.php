<div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li @click="menu=0" class="nav-item">
                        <a class="nav-link active" href="main.html"><i class="icon-speedometer"></i>Escritorio</a>
                    </li>
                    <li class="nav-title">
                        Gestionar
                
                    <li @click="menu=1" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-book-open"></i>Datos Personales</a>
                    </li>

                    <li @click="menu=2" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-book-open"></i>Datos Conyugue</a>
                    </li>

                    <li @click="menu=3" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-book-open"></i>Datos de ingreso</a>
                    </li>
                    <li @click="menu=4" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-info"></i>Datos de Prestamos</a>
                    </li>

                    <li @click="menu=8" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-info"></i>Datos bienes</a>
                    </li>

                    <li @click="menu=5" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-info">Datos de credito</i></a>
                    </li>

                    <li @click="menu=7" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-info">Credito</i></a>
                    </li>

                    <button @click="reRender">Rerender Parent</button>


                   </li>

                   <li @click="menu=7" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-info">Credito</i></a>
                    </li>
                    <li  class="nav-item">
                        <a class="nav-link" href="https://sanmartin.net.bo"><i class="icon-book-open"></i>Regresar a la Página web</a>
                    </li>
                
                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>
