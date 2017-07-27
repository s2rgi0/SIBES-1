<table  class="table table-striped table-bordered table-hover " width="100%" cellspacing="0" style="background-color: white;">
        <thead>
            <tr>
                <th>Fecha Avistamiento</th>
                <th>Departamento</th>
                <th>Nombre Suelo</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody class="row_avista">

            @foreach( $avista as $v_r )
            <tr>
               
                <td> {{ $v_r->fechaHoraAvistamiento }} </td>
                <td> {{ $v_r->nombreDepartamento }} </td>
                <td> {{ $v_r->nombreSuelo }} </td>
                <td class="grid_avista" id="grid_avista" >

                <form method="get"  action="avista_esp_publico" > 

                    <input type="hidden" name="id_avista" value="{{ $v_r->idAvistamiento }}" >
                    <button class="btn btn-default btn-Ver btn-sm " style="float: right;" value="{{ $v_r->idAvistamiento }}" ></span> Informacion </button>
                 

                 </form>
                    

                </td>

            </tr>
            @endforeach

        </tbody>
       
    </table>

    <div id="links" >
        
   
    </div>


