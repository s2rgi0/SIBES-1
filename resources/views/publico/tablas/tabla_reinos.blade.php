

<br>
<table id="resultados" class="table table-striped table-bordered table-hover" width="100%" cellspacing="0" style="background-color: white;" >
<thead></thead>
<tbody>

@foreach( $especie as $v_r )



@if( $v_r->nombreSubespecie )
    
    <tr>
        <td>
        <div class="row" style="padding-left: 15px;" ><label>Nombre Subespecie : </label> {{ $v_r->nombreSubespecie }}  
        </div> 
        <div class="row">
            <div class="col-md-6" >
                <label>Reino : </label> {{ $v_r->nombreReino }}
                <br> 
                <label>Division : </label> {{ $v_r->nombreDivision }}<br> 
                <label>Clase : </label> {{ $v_r->nombreClase }} <br>
                
            </div>
            <div class="col-md-6" >

                <label>Familia : </label> {{ $v_r->nombreFamilia }}<br>
                <label>Genero : </label> {{ $v_r->nombreGenero }}<br> 
                <label>Especie : </label> {{ $v_r->nombreEspecie }}<br>               
                
                <form action="Avista_sub_pub" method="get" >

                    <input type="hidden" name="id_sub" value="{{ $v_r->idSubespecie }}" >
                    <center>
                        <button class="btn btn-default btn-sm " value="" style="float: right; ;">Información</button>  
                    </center>                         
                </form>
               
            </div>
        </div>   
        </td>
    </tr>   

@else

    <tr>
        <td>
        <div class="row" style="padding-left: 15px;" ><label>Nombre Especie : </label> {{ $v_r->nombreEspecie }}  
        </div>
        <div class="row">
            <div class="col-md-6" >
                <label>Reino : </label> {{ $v_r->nombreReino }}
                <br> 
                <label>Division : </label> {{ $v_r->nombreDivision }}<br> 
                <label>Clase : </label> {{ $v_r->nombreClase }} <br>
               
            </div>
            <div class="col-md-6" >
                 <label>Familia : </label> {{ $v_r->nombreFamilia }}<br>     
                <label>Genero : </label> {{ $v_r->nombreGenero }}<br> 

                <form action="Avista_esp_pub" method="get" >

                    <input type="hidden" name="id_esp" value="{{ $v_r->idEspecie }}" >
                    <center>
                        <button class="btn btn-default btn-sm " value="" style="float: right; ;">Información</button>  
                    </center>
                
                </form> 
               
            </div>
        </div>
        </td>
    </tr>        

@endif




@endforeach

</tbody>


</table>
<div id="links" >
        
    {{ $especie->links() }}

</div>





























<!--
<table id="resultados" class="table table-striped table-bordered table-hover" width="80%" cellspacing="0" style="background-color: white;width: 400px;" >
	<thead>
	<tr>
	<th>Reino</th><th>Division</th><th>Clase</th><th>Orden</th><th>Familia</th><th>Genero</th><th>Especie</th><th>Subespecie</th>
	</tr>
	</thead>


	<tbody class="row_consulta" style="font-size:x-small;" >
	 	 @foreach( $especie as $v_r )
            <tr>
                <td> {{ $v_r->nombreReino }} </td>
                <td> {{ $v_r->nombreDivision }} </td>
                <td> {{ $v_r->nombreClase }} </td>
                <td> {{ $v_r->nombreOrden }} </td>
                <td> {{ $v_r->nombreFamilia }} </td>
                <td> {{ $v_r->nombreGenero }} </td>
                <td> {{ $v_r->nombreEspecie }} </td>
                <td> {{ $v_r->nombreSubespecie }} </td>
                <td class="grid_avista" id="grid_avista" >

                @if( $v_r->idSubespecie )

                <form action="Avista_sub_pub" method="get" >

                    <input type="hidden" name="id_sub" value="{{ $v_r->idSubespecie }}" >
                    <button class="btn btn-info" value="" >Informacion</button>       
                </form>

                @else
                    
                <form action="Avista_esp_pub" method="get" >

                    <input type="hidden" name="id_esp" value="{{ $v_r->idEspecie }}" >
                    <button class="btn btn-info" value="" >Informacion</button>
                
                </form>

                @endif


                </td>

            </tr>
            @endforeach
	</tbody>
	

	</table>

    -->
		
