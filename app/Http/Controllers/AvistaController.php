<?php

namespace App\Http\Controllers;

use App\Avistamiento;
use App\Canton;
use App\ClasesDeTierra;
use App\Colectore;
use App\Departamento;
use App\Especie;
use App\Clase;
use App\Municipio;
use App\Region;
use App\Suelo;
use App\Division;
use App\Familia;
use App\Genero;
use App\Nombrecomun;
use App\Orden;
use App\Reino;
use App\Subespecie;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use Response;
use Validator;
use Cache;
use Redirect;


class AvistaController extends Controller
{
    /////////////////////-------------busca ESPECIE Y AVISTAMIENTOS------------------////////////////////

    public function Avistamiento(Request $req)
    {

        Cache::flush();
        //dd($req->id_especie);
        $usuario = Usuario::select('idUsuario','nombreUsuario','idTipo')->where('idUsuario',$req->id_usuario)->get();

        $especie = Especie::join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('reinos', 'Divisions.idReino', '=', 'reinos.idReino')->select('Especies.idEspecie', 'Especies.nombreEspecie', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'reinos.nombreReino')->where('Especies.idEspecie', $req->id_especie)->get();

        $avista = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->select('Avistamientos.idAvistamiento', 'Colectores.nombreColector', 'Suelo.nombreSuelo', 'ClasesDeTierra.nombreClaseDeTierra', 'Departamento.nombreDepartamento','Avistamientos.fechaHoraAvistamiento','Avistamientos.fechaIngresodeInformacionBD')->where('idEspecie', $req->id_especie)->get();

        return view('ingreso.avis', compact('especie', 'avista','usuario'));

    }


    public function Avistamiento_sub(Request $req)
    {
        Cache::flush();
        $usuario = Usuario::select('idUsuario','nombreUsuario','idTipo')->where('idUsuario',$req->id_usuario)->get();
        //dd($req->id_especie);

        $especie = Subespecie::join('Especies', 'Subespecies.idEspecie' , '=' , 'Especies.idEspecie' )->join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('reinos', 'Divisions.idReino', '=', 'reinos.idReino')->select('Subespecies.idSubespecie','Especies.idEspecie', 'Especies.nombreEspecie', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'reinos.nombreReino', 'Subespecies.nombreSubespecie' )->where('Subespecies.idSubespecie', $req->id_especie)->get();

        $avista = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->select('Avistamientos.idAvistamiento', 'Colectores.nombreColector', 'Suelo.nombreSuelo', 'ClasesDeTierra.nombreClaseDeTierra', 'Departamento.nombreDepartamento','Avistamientos.fechaHoraAvistamiento','Avistamientos.fechaIngresodeInformacionBD')->where('idSubespecie', $req->id_especie)->paginate(50);




        //->simplePaginate(5);
        //->get();->paginate(5)

        return view('ingreso.avis_sub', compact('especie', 'avista','usuario'));

    }

    //////REGRESA RESULTADOS DE PAGINACION PARA LOS AVISTAMIENTOS DE SUBESPECIE

    public function Avistamiento_sub_pag(Request $req)
    {
        Cache::flush();
     
        $avista = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->select('Avistamientos.idAvistamiento', 'Colectores.nombreColector', 'Suelo.nombreSuelo', 'ClasesDeTierra.nombreClaseDeTierra', 'Departamento.nombreDepartamento','Avistamientos.fechaHoraAvistamiento','Avistamientos.fechaIngresodeInformacionBD')->where('idSubespecie', $req->id_especie)->paginate(50);

        //->simplePaginate(5);
        //->get();

        return view('opciones.tabla_avis_sub', compact('avista'));

    }    




    /////////////////////////------REGRESA AVISTAMIENTOS DESPUES DE HAVERLOS GUARDAOS-----//////////////////////

    public function get_avista(Request $req)
    {
        Cache::flush();
        $vis_ta = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->select('Avistamientos.idAvistamiento', 'Colectores.nombreColector', 'Suelo.nombreSuelo', 'ClasesDeTierra.nombreClaseDeTierra', 'Departamento.nombreDepartamento','Avistamientos.fechaIngresodeInformacionBD')->where('idEspecie', $req->id)->get();

        //return view('ingreso.avis', compact('avista') );

        return response()->json($vis_ta);

    }

    public function get_avista_SUB(Request $req)
    {
        Cache::flush();
        $vis_ta = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->select('Avistamientos.idAvistamiento', 'Colectores.nombreColector', 'Suelo.nombreSuelo', 'ClasesDeTierra.nombreClaseDeTierra', 'Departamento.nombreDepartamento','Avistamientos.fechaIngresodeInformacionBD')->where('idSubespecie', $req->id)->paginate(2);

        //return view('ingreso.avis', compact('avista') );

        return response()->json($vis_ta);

    }

    public function get_Avista_BY_ID(Request $req)
    {
        Cache::flush();
        $av_id = Avistamiento::join('Especies', 'Avistamientos.idEspecie', '=', 'Especies.idEspecie')->join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Municipio', 'Avistamientos.codigoMunicipio', '=', 'Municipio.codigoMunicipio')->join('Canton', 'Avistamientos.codigoCanton', '=', 'Canton.codigoCanton')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->select('Especies.idEspecie', 'Especies.nombreEspecie', 'Avistamientos.idAvistamiento', 'Colectores.nombreColector', 'Suelo.nombreSuelo', 'ClasesDeTierra.nombreClaseDeTierra', 'Departamento.nombreDepartamento', 'Municipio.nombreMunicipio', 'Canton.nombreCanton', 'Avistamientos.fuenteDeInformacion', 'Avistamientos.alturaAvistamiento', 'Avistamientos.longitudAvistamiento', 'Avistamientos.latitudAvistamiento', 'Avistamientos.fechaHoraAvistamiento', 'Avistamientos.ejemplarDepositado', 'Avistamientos.fechaIngresodeInformacionBD', 'Avistamientos.fotografiaAvistamiento', 'Avistamientos.ecosistemaAvistamiento', 'Avistamientos.descripcionClimaAvistamiento', 'Avistamientos.fisiografiaAvistamiento', 'Avistamientos.geologiaAvistamiento', 'Avistamientos.hidrografiaAvistamiento', 'Avistamientos.usosDeLaEspecieAvistamiento', 'Colectores.idColector', 'Departamento.codigoDepartamento', 'Municipio.codigoMunicipio', 'Canton.codigoCanton', 'Suelo.idSuelo', 'ClasesDeTierra.idClaseDeTierra','Avistamientos.publicacionPdf','Avistamientos.horaAvistamiento')->where('idAvistamiento', $req->id)->get();

        return response()->json($av_id);

    }

    public function get_Avista_BY_ID_sub(Request $req)
    {
        Cache::flush();
        $av_id = Avistamiento::join('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->join('Especies','Subespecies.idEspecie','=','Especies.idEspecie')->join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Municipio', 'Avistamientos.codigoMunicipio', '=', 'Municipio.codigoMunicipio')->join('Canton', 'Avistamientos.codigoCanton', '=', 'Canton.codigoCanton')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->select('Subespecies.idSubespecie','Subespecies.nombreSubespecie','Especies.idEspecie', 'Especies.nombreEspecie', 'Avistamientos.idAvistamiento', 'Colectores.nombreColector', 'Suelo.nombreSuelo', 'ClasesDeTierra.nombreClaseDeTierra', 'Departamento.nombreDepartamento', 'Municipio.nombreMunicipio', 'Canton.nombreCanton', 'Avistamientos.fuenteDeInformacion', 'Avistamientos.alturaAvistamiento', 'Avistamientos.longitudAvistamiento', 'Avistamientos.latitudAvistamiento', 'Avistamientos.fechaHoraAvistamiento', 'Avistamientos.ejemplarDepositado', 'Avistamientos.fechaIngresodeInformacionBD', 'Avistamientos.fotografiaAvistamiento', 'Avistamientos.ecosistemaAvistamiento', 'Avistamientos.descripcionClimaAvistamiento', 'Avistamientos.fisiografiaAvistamiento', 'Avistamientos.geologiaAvistamiento', 'Avistamientos.hidrografiaAvistamiento', 'Avistamientos.usosDeLaEspecieAvistamiento', 'Colectores.idColector', 'Departamento.codigoDepartamento', 'Municipio.codigoMunicipio', 'Canton.codigoCanton', 'Suelo.idSuelo', 'ClasesDeTierra.idClaseDeTierra','Avistamientos.publicacionPdf','Avistamientos.horaAvistamiento')->where('idAvistamiento', $req->id)->get();

        return response()->json($av_id);

    }


    public function get_Colector_id(Request $req)
    {
        Cache::flush();
        $d = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->select('Colectores.nombreColector', 'Colectores.idColector')->where('Avistamientos.idAvistamiento', $req->id)->get();

        return response()->json($d);

    }

    public function get_Departamento_id(Request $req)
    {
        Cache::flush();                
        $d = Avistamiento::join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->select('Departamento.nombreDepartamento', 'Departamento.codigoDepartamento')->where('idAvistamiento', $req->id)->get();

        return response()->json($d);

    }

    public function get_Municipio_id(Request $req)
    {

        $d = Avistamiento::join('Municipio', 'Avistamientos.codigoMunicipio', '=', 'Municipio.codigoMunicipio')->select('Municipio.nombreMunicipio', 'Municipio.codigoMunicipio')->where('idAvistamiento', $req->id)->get();

        return response()->json($d);

    }

    public function get_Canton_id(Request $req)
    {

        $d = Avistamiento::join('Canton', 'Avistamientos.codigoCanton', '=', 'Canton.codigoCanton')->select('Canton.nombreCanton', 'Canton.codigoCanton')->where('idAvistamiento', $req->id)->get();

        return response()->json($d);

    }

    public function get_Suelo_id(Request $req)
    {

        $d = Avistamiento::join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->select('Suelo.nombreSuelo', 'Suelo.idSuelo')->where('idAvistamiento', $req->id)->get();

        return response()->json($d);

    }

    public function get_Tierra_id(Request $req)
    {

        $d = Avistamiento::join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->select('ClasesDeTierra.nombreClaseDeTierra', 'ClasesDeTierra.idClaseDeTierra')->where('idAvistamiento', $req->id)->get();

        return response()->json($d);

    }

    public function Regiones()
    {

        $reg = Region::all();

        return response()->json($reg);

    }

    public function Suelos()
    {

        $sue = Suelo::all();

        return response()->json($sue);

    }

    public function ClasedeTierra()
    {

        $cla = ClasesDeTierra::all();

        return response()->json($cla);

    }

    public function Colectores()
    {

        $col = Colectore::all();

        return response()->json($col);

    }

    public function Departamentos()
    {
        $d = Departamento::all();

        return response()->json($d);
    }

    public function get_departamento(Request $req)
    {

        $d = Departamento::select('codigoDepartamento', 'nombreDepartamento')->where('idRegion', $req->id)->get();

        return response()->json($d);

    }

    public function get_municipio(Request $req)
    {

        $d = Municipio::select('codigoMunicipio', 'nombreMunicipio')->where('codigoDepartamento', $req->id)->get();

        return response()->json($d);

    }

    public function get_canton(Request $req)
    {

        $d = Canton::select('codigoCanton', 'nombreCanton')->where('codigoMunicipio', $req->id)->get();

        return response()->json($d);

    }

    public function SAVE_avista(Request $req)
    {
            Cache::flush();

            $validator = Validator::make(Input::all(), [

            'zona_avis'   => 'required',
            'col_avis'    => 'required',
            'tierra_avis' => 'required',
            'suelo_avis'  => 'required',
            'depar_avis'  => 'required',
            'mun_avis'    => 'required',
            'canton_avis' => 'required',
            'fecha_av'    => 'required',
            'foto-graf'   => 'image|mimes:jpeg,jpg,png,bmp',
            'alt_avis'    => 'nullable|numeric',
            'lati_avis'   => 'nullable|numeric',
            'long_avis'   => 'nullable|numeric',
            'eco_avis'      => 'nullable|max:950',
            'clima_avis'    => 'nullable|max:950',
            'fisio_Avis'    => 'nullable|max:950',
            'geo_avis'      => 'nullable|max:950',
            'hidro_avis'    => 'nullable|max:950',
            'usos_avis'     => 'nullable|max:950',

        ], [
            'foto-graf.image'      => 'no es una imagen',
            'foto-graf.mimes'      => 'no es una imagen',
            'foto-graf.max'      => 'imagen demasiado grande',
            'foto-graf.size'      => 'imagen demasiado grande',
            'zona_avis.required'   => 'Elija una zona',
            'lati_avis.regex'      => 'Verifique latitud',
            'long_avis.regex'      => 'Verifique longitud',
            'col_avis.required'    => 'Elija un colector',
            'tierra_avis.required' => 'Elija un tipo de tierra',
            'suelo_avis.required'  => 'Elija un tipo de suelo',
            'depar_avis.required'  => 'Elija un depto',
            'mun_avis.required'    => 'Elija un municipio',
            'canton_avis.required' => 'Elija un canton',
            'fecha_av.required'    => 'Debe ingresar fecha',
            'alt_avis.numeric'     => 'El campo debe ser numerico',
            'lati_avis.numeric'     => 'El campo debe ser numerico',
            'long_avis.numeric'     => 'El campo debe ser numerico',
            'eco_avis.max'        => 'El campo permite 950 caracteres ',
            'clima_avis.max'    => 'El campo permite 950 caracteres ',
            'fisio_Avis.max'    => 'El campo permite 950 caracteres ',
            'geo_avis.max'      => 'El campo permite 950 caracteres ',
            'hidro_avis.max'    => 'El campo permite 950 caracteres ',
            'usos_avis.max'     => 'El campo permite 950 caracteres ',
        ]);

        if ($validator->passes()) {

            $fecha_avi  = "";
            $fecha_ingr = "";

            $avis = new Avistamiento;

            if (Input::hasfile('foto_graf')) {
                //$msj1 = "si tiene IMAGEN";
                //var_dump($msj1);

                $foto           = Input::file('foto_graf');
                $nombre_especie = $req->nom_esp_ver;
                $id_especie     = $req->id_esp_ver;
                $extension      = Input::file('foto_graf')->getClientOriginalExtension();

                //dd($extension);
                if( $extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'bmp' || $extension == 'gif' ){

                    $cad_imagen     = 'avis_' . $id_especie . '_' . $nombre_especie . '.' . $extension;

                //dd($cad_imagen);
                    $foto->move('imagen_especie/' . $nombre_especie, $cad_imagen);

                    $avis->fotografiaAvistamiento = $cad_imagen;


                }else{


                    return response::json(['success' => false, 'errors' => 'no es una imagen']);
                }

                

            }


            if ($req->fecha_av != null) {

                //$d = DateTime::createFromFormat("YmdHis", $req->fecha_av);
                //$fecha_avi =  $d->format("d/m/Y H:i:s");

                $date      = date_create($req->fecha_av);
                $fecha_avi = date_format($date, "Y/m/d H:i:s");

            }

            if ($req->fecha_ing != null) {

                $date       = date_create($req->fecha_ing);
                $fecha_ingr = date_format($date, "Y/m/d H:i:s");

            }            

            $avis->idEspecie                    = $req->id_esp;
            $avis->codigoDepartamento           = $req->depar_avis;
            $avis->codigoMunicipio              = $req->mun_avis;
            $avis->codigoCanton                 = $req->canton_avis;
            $avis->idColector                   = $req->col_avis;
            $avis->idClaseDeTierra              = $req->tierra_avis;
            $avis->idSuelo                      = $req->suelo_avis;
            $avis->fuenteDeInformacion          = $req->fuente_avis;
            $avis->latitudAvistamiento          = $req->lati_avis;
            $avis->longitudAvistamiento         = $req->long_avis;
            $avis->alturaAvistamiento           = $req->alt_avis;
            $avis->fechaHoraAvistamiento        = $fecha_avi; //feacha de avis
            $avis->ejemplarDepositado           = $req->ejem_avis;
            $avis->fechaIngresodeInformacionBD  = $fecha_ingr; //fecha de ingr
            $avis->ecosistemaAvistamiento       = $req->eco_avis;
            $avis->descripcionClimaAvistamiento = $req->clima_avis;
            $avis->fisiografiaAvistamiento      = $req->fisio_Avis;
            $avis->geologiaAvistamiento         = $req->geo_avis;
            $avis->hidrografiaAvistamiento      = $req->hidro_avis;
            $avis->usosDeLaEspecieAvistamiento  = $req->usos_avis;
            $avis->publicacionPdf               = $req->publish;
            $avis->horaAvistamiento             = $req->hora_av;



            $avis->save();

        } else {

            if ($req->ajax()) {

                return response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            } else {

                return redirect('/Busqueda')->withErrors($validator, 'fdivision')->withInput($req->flash());
            }
        }

    }

    public function SAVE_edit(Request $req)
    {
        Cache::flush();
        $fecha_avi_ver  = "";
        $fecha_ingr_ver = "";

        $avis = Avistamiento::find($req->id_avis_ver);

        $validator = Validator::make(Input::all(), [

            'col_avis_ver'    => 'required',
            'depar_avis_ver'  => 'required',
            'mun_avis_ver'    => 'required',
            'canton_avis_ver' => 'required',
            'foto-graf_ver'   => 'image|mimes:jpeg,jpg,png,bmp',
            'alt_avis_ver'    => 'nullable|numeric',
            'lati_avis_ver'   => 'nullable|numeric',
            'long_avis_ver'   => 'nullable|numeric',
            'eco_avis_ver'        => 'nullable|max:950',
            'clima_avis_ver'    => 'nullable|max:950',
            'fisio_Avis_ver'    => 'nullable|max:950',
            'geo_avis_ver'      => 'nullable|max:950',
            'hidro_avis_ver'    => 'nullable|max:950',
            'usos_avis_ver'     => 'nullable|max:950',
            
        ], [
            
            'col_avis_ver.required'    => 'Elija un Colector',
            'depar_avis_ver.required'  => 'Elija un departamento',
            'mun_avis_ver.required'    => 'Elija un municipio',
            'canton_avis_ver.required' => 'Elija un canton',
            'foto-graf_ver.image'   => 'ingrese una imagen',
            'alt_avis_ver.numeric'    => 'ingrese un dato numerico',
            'lati_avis_ver.numeric'   => 'ingrese un dato numerico',
            'long_avis_ver.numeric'   => 'ingrese un dato numerico',
            'eco_avis_ver.max'        => 'El campo permite 950 caracteres ',
            'clima_avis_ver.max'    => 'El campo permite 950 caracteres ',
            'fisio_Avis_ver.max'    => 'El campo permite 950 caracteres ',
            'geo_avis_ver.max'      => 'El campo permite 950 caracteres ',
            'hidro_avis_ver.max'    => 'El campo permite 950 caracteres ',
            'usos_avis_ver.max'     => 'El campo permite 950 caracteres ',


        ]);

        if ($validator->passes()) {


            if (Input::hasfile('foto-graf_ver')) {

            $foto           = Input::file('foto-graf_ver');
            $nombre_especie = $req->nom_esp_ver;
            $id_especie     = $req->id_avis_ver;
            $extension      = Input::file('foto-graf_ver')->getClientOriginalExtension();
            $cad_imagen     = 'avis_' . $id_especie . '_' . $nombre_especie . '.' . $extension;

            $foto->move('imagen_especie/' . $nombre_especie, $cad_imagen);

            $avis->fotografiaAvistamiento = $cad_imagen;

        }


        if ($req->fecha_av_ver != null) {

            //$d = DateTime::createFromFormat("YmdHis", $req->fecha_av);
            //$fecha_avi =  $d->format("d/m/Y H:i:s");

            $date          = date_create($req->fecha_av_ver);
            $fecha_avi_ver = date_format($date, "Y/m/d H:i:s");

        }

        if ($req->fecha_ing_ver != null) {

            $date           = date_create($req->fecha_ing_ver);
            $fecha_ingr_ver = date_format($date, "Y/m/d H:i:s");

        }

        $avis->codigoDepartamento           = $req->depar_avis_ver;
        $avis->codigoMunicipio              = $req->mun_avis_ver;
        $avis->codigoCanton                 = $req->canton_avis_ver;
        
        $avis->idColector                   = $req->col_avis_ver;
        $avis->idClaseDeTierra              = $req->tierra_avis_ver;
        $avis->idSuelo                      = $req->suelo_avis_ver;
        $avis->fuenteDeInformacion          = $req->fuente_avis_ver;
        $avis->latitudAvistamiento          = $req->lati_avis_ver;
        $avis->longitudAvistamiento         = $req->long_avis_ver;
        $avis->alturaAvistamiento           = $req->alt_avis_ver;
        $avis->fechaHoraAvistamiento        = $fecha_avi_ver; //feacha de avis
        $avis->ejemplarDepositado           = $req->ejem_avis_ver;
        $avis->fechaIngresodeInformacionBD  = $fecha_ingr_ver; //fecha de ingr
        $avis->ecosistemaAvistamiento       = $req->eco_avis_ver;
        $avis->descripcionClimaAvistamiento = $req->clima_avis_ver;
        $avis->fisiografiaAvistamiento      = $req->fisio_Avis_ver;
        $avis->geologiaAvistamiento         = $req->geo_avis_ver;
        $avis->hidrografiaAvistamiento      = $req->hidro_avis_ver;
        $avis->usosDeLaEspecieAvistamiento  = $req->usos_avis_ver;

        if( $req->publish_edit != null ){

            $avis->publicacionPdf               = $req->publish_edit;
                
        }        
        $avis->save();





        }else{

            if ($req->ajax()) {

                return response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            } else {

                return redirect('/Busqueda')->withErrors($validator, 'fdivision')->withInput($req->flash());
            }

        }       

    }


    public function SAVE_edit_sub(Request $req)
    {
        //dd($req->all());

        $fecha_avi_ver  = "";
        $fecha_ingr_ver = "";
        Cache::flush();

        $avis = Avistamiento::find($req->id_avis_ver);

        $validator = Validator::make(Input::all(), [


            'col_avis_ver'    => 'required',
            'depar_avis_ver'  => 'required',
            'mun_avis_ver'    => 'required',
            'canton_avis_ver' => 'required',
            'foto-graf_ver'   => 'image|mimes:jpeg,jpg,png,bmp',
            'alt_avis_ver'    => 'nullable|numeric',
            'lati_avis_ver'   => 'nullable|numeric',
            'long_avis_ver'   => 'nullable|numeric',
            'eco_avis_ver'        => 'nullable|max:950',
            'clima_avis_ver'    => 'nullable|max:950',
            'fisio_Avis_ver'    => 'nullable|max:950',
            'geo_avis_ver'      => 'nullable|max:950',
            'hidro_avis_ver'    => 'nullable|max:950',
            'usos_avis_ver'     => 'nullable|max:950',

            
        ], [
            
            'col_avis_ver.required'    => 'Elija un Colector',
            'depar_avis_ver.required'  => 'Elija un departamento',
            'mun_avis_ver.required'    => 'Elija un municipio',
            'canton_avis_ver.required' => 'Elija un canton',
            'foto-graf_ver.image'   => 'ingrese una imagen',
            'alt_avis_ver.numeric'    => 'ingrese un dato numerico',
            'lati_avis_ver.numeric'   => 'ingrese un dato numerico',
            'long_avis_ver.numeric'   => 'ingrese un dato numerico',
            'eco_avis_ver.max'        => 'El campo permite 950 caracteres ',
            'clima_avis_ver.max'    => 'El campo permite 950 caracteres ',
            'fisio_Avis_ver.max'    => 'El campo permite 950 caracteres ',
            'geo_avis_ver.max'      => 'El campo permite 950 caracteres ',
            'hidro_avis_ver.max'    => 'El campo permite 950 caracteres ',
            'usos_avis_ver.max'     => 'El campo permite 950 caracteres ',

        ]);

        if ($validator->passes()) {


            if (Input::hasfile('foto-graf_ver')) {

            $foto           = Input::file('foto-graf_ver');
            $nombre_especie = $req->nom_esp_ver;
            $nombre_subespe = $req->nom_sub_ver;
            $id_especie     = $req->id_avis_ver;
            $extension      = Input::file('foto-graf_ver')->getClientOriginalExtension();
            $cad_imagen     = 'avis_' . $id_especie . '_' . $nombre_subespe . '.' . $extension;

            $foto->move('imagen_especie/' . $nombre_especie .'/'. $nombre_subespe, $cad_imagen);

            $avis->fotografiaAvistamiento = $cad_imagen;

        }


        if ($req->fecha_av_ver != null) {

            //$d = DateTime::createFromFormat("YmdHis", $req->fecha_av);
            //$fecha_avi =  $d->format("d/m/Y H:i:s");

            $date          = date_create($req->fecha_av_ver);
            $fecha_avi_ver = date_format($date, "Y/m/d H:i:s");

        }

        if ($req->fecha_ing_ver != null) {

            $date           = date_create($req->fecha_ing_ver);
            $fecha_ingr_ver = date_format($date, "Y/m/d H:i:s");

        }

        $avis->codigoDepartamento           = $req->depar_avis_ver;
        $avis->codigoMunicipio              = $req->mun_avis_ver;
        $avis->codigoCanton                 = $req->canton_avis_ver;
        
        $avis->idColector                   = $req->col_avis_ver;
        $avis->idClaseDeTierra              = $req->tierra_avis_ver;
        $avis->idSuelo                      = $req->suelo_avis_ver;
        $avis->fuenteDeInformacion          = $req->fuente_avis_ver;
        $avis->latitudAvistamiento          = $req->lati_avis_ver;
        $avis->longitudAvistamiento         = $req->long_avis_ver;
        $avis->alturaAvistamiento           = $req->alt_avis_ver;
        $avis->fechaHoraAvistamiento        = $fecha_avi_ver; //feacha de avis
        $avis->ejemplarDepositado           = $req->ejem_avis_ver;
        $avis->fechaIngresodeInformacionBD  = $fecha_ingr_ver; //fecha de ingr
        $avis->ecosistemaAvistamiento       = $req->eco_avis_ver;
        $avis->descripcionClimaAvistamiento = $req->clima_avis_ver;
        $avis->fisiografiaAvistamiento      = $req->fisio_Avis_ver;
        $avis->geologiaAvistamiento         = $req->geo_avis_ver;
        $avis->hidrografiaAvistamiento      = $req->hidro_avis_ver;
        $avis->usosDeLaEspecieAvistamiento  = $req->usos_avis_ver;

        if( $req->publish_edit_sub != null ){

            $avis->publicacionPdf               = $req->publish_edit_sub;
                
        }

        
        $avis->save();



        }else{


            if ($req->ajax()) {

                return response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            } else {

                return redirect('/Busqueda')->withErrors($validator, 'fdivision')->withInput($req->flash());
            }

        }
     

    }

    public function GET_todos_avis_ESP(Request $req)
    {
        $avista = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->select('Avistamientos.idAvistamiento', 'Colectores.nombreColector', 'Suelo.nombreSuelo', 'ClasesDeTierra.nombreClaseDeTierra', 'Departamento.nombreDepartamento','Avistamientos.fechaIngresodeInformacionBD')->where('idEspecie', $req->id)->get();

        //return view('ingreso.avis', compact('avista') );
        return response()->json($avista);
        //return view('opciones.tabla_avis_sub', compact('avista'));

    }

    public function mapa_show(Request $req)
    {

        //dd($req->id_especie);
        $usuario = Usuario::select('idUsuario','nombreUsuario','idTipo')->where('idUsuario',$req->id_usuario)->get();


        $espec = Especie::join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('reinos', 'Divisions.idReino', '=', 'reinos.idReino')->select('Especies.idEspecie', 'Especies.nombreEspecie', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'reinos.nombreReino')->where('Especies.idEspecie', $req->id_especie)->get();

        $coord = Avistamiento::select('latitudAvistamiento' , 'longitudAvistamiento', 'idAvistamiento')->where('idEspecie', $req->id_especie)->get();

        //dd($coord);

        return view('ingreso.mapa', compact('coord', 'usuario' ,'espec'));

    }


     public function mapa_show_sub(Request $req)
    {

        //dd($req->id_especie);
        $usuario = Usuario::select('idUsuario','nombreUsuario','idTipo')->where('idUsuario',$req->id_usuario)->get();


        $espec = Subespecie::join('Especies','Subespecies.idEspecie','=','Especies.idEspecie')->join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('reinos', 'Divisions.idReino', '=', 'reinos.idReino')->select('Subespecies.idSubespecie','Especies.idEspecie', 'Especies.nombreEspecie', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'reinos.nombreReino')->where('Subespecies.idSubespecie', $req->id_especie)->get();

        //dd($espec);

        $coord = Avistamiento::select('latitudAvistamiento', 'longitudAvistamiento', 'idAvistamiento')->where('idSubespecie', $req->id_especie)->get();

        return view('ingreso.mapa_sub', compact('coord', 'usuario' , 'espec'));

        //return view('ingreso.mapa_sub', compact('espec'));


    }


    public function SAVE_avista_sub(Request $req)
    {
            Cache::flush();
            $validator = Validator::make(Input::all(), [

            'zona_avis'   => 'required',
            'col_avis'    => 'required',
            'tierra_avis' => 'required',
            'suelo_avis'  => 'required',
            'depar_avis'  => 'required',
            'mun_avis'    => 'required',
            'canton_avis' => 'required',
            'fecha_av'    => 'required',
            'foto-graf'   => 'image',
            'alt_avis'    => 'nullable|numeric',
            'lati_avis'   => 'nullable|numeric',
            'long_avis'   => 'nullable|numeric',
            'eco_avis'      => 'nullable|max:950',
            'clima_avis'    => 'nullable|max:950',
            'fisio_Avis'    => 'nullable|max:950',
            'geo_avis'      => 'nullable|max:950',
            'hidro_avis'    => 'nullable|max:950',
            'usos_avis'     => 'nullable|max:950',


        ], [

            'foto-graf.image'      => 'no es una imagen',
            'zona_avis.required'   => 'Elija una zona',
            'lati_avis.regex'      => 'Verifique latitud',
            'long_avis.regex'      => 'Verifique longitud',
            'col_avis.required'    => 'Elija un colector',
            'tierra_avis.required' => 'Elija un tipo de tierra',
            'suelo_avis.required'  => 'Elija un tipo de suelo',
            'depar_avis.required'  => 'Elija un dpto',
            'mun_avis.required'    => 'Elija un municipio',
            'canton_avis.required' => 'Elija un canton',
            'fecha_av.required'    => 'Debe ingresar fecha',
            'alt_avis.numeric'     => 'Ingrese un dato numerico',
            'long_avis.numeric'     => 'Ingrese un dato numerico',
            'lati_avis.numeric'     => 'Ingrese un dato numerico',
            'eco_avis.max'        => 'El campo permite 950 caracteres ',
            'clima_avis.max'    => 'El campo permite 950 caracteres ',
            'fisio_Avis.max'    => 'El campo permite 950 caracteres ',
            'geo_avis.max'      => 'El campo permite 950 caracteres ',
            'hidro_avis.max'    => 'El campo permite 950 caracteres ',
            'usos_avis.max'     => 'El campo permite 950 caracteres ',

        ]);

        if ($validator->passes()) {

            $fecha_avi  = "";
            $fecha_ingr = "";

            $avis = new Avistamiento;

            if (Input::hasfile('foto_graf')) {
                //$msj1 = "si tiene IMAGEN";
                //var_dump($msj1);

                $foto           = Input::file('foto_graf');
                $nombre_especie = $req->nom_esp;
                $nombre_subespe = $req->nom_sub;
                $id_especie     = $req->id_esp;
                $extension      = Input::file('foto_graf')->getClientOriginalExtension();
                


                if( $extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'bmp' || $extension == 'gif' ){

                    
                    $cad_imagen     = 'avis_' . $id_especie . '_' . $nombre_subespe . '.' . $extension;
                    $foto->move('imagen_especie/' . $nombre_especie . '/' . $nombre_subespe , $cad_imagen);
                    $avis->fotografiaAvistamiento = $cad_imagen;


                }else{


                    return response::json(['success' => false, 'errors' => 'no es una imagen']);
                }

                //dd($cad_imagen);               

            }

            //dd($req->foto_graf);

         

            if ($req->fecha_av != null) {

                //$d = DateTime::createFromFormat("YmdHis", $req->fecha_av);
                //$fecha_avi =  $d->format("d/m/Y H:i:s");

                $date      = date_create($req->fecha_av);
                $fecha_avi = date_format($date, "Y/m/d H:i:s");

            }

            if ($req->fecha_ing != null) {

                $date       = date_create($req->fecha_ing);
                $fecha_ingr = date_format($date, "Y/m/d H:i:s");

            }

            $avis->idEspecie                 = $req->id_esp;
            $avis->idSubespecie                 = $req->id_sub;
            
            $avis->codigoDepartamento           = $req->depar_avis;
            $avis->codigoMunicipio              = $req->mun_avis;
            $avis->codigoCanton                 = $req->canton_avis;
            $avis->idColector                   = $req->col_avis;
            $avis->idClaseDeTierra              = $req->tierra_avis;
            $avis->idSuelo                      = $req->suelo_avis;
            $avis->fuenteDeInformacion          = $req->fuente_avis;
            $avis->latitudAvistamiento          = $req->lati_avis;
            $avis->longitudAvistamiento         = $req->long_avis;
            $avis->alturaAvistamiento           = $req->alt_avis;
            $avis->fechaHoraAvistamiento        = $fecha_avi; //feacha de avis
            $avis->ejemplarDepositado           = $req->ejem_avis;
            $avis->fechaIngresodeInformacionBD  = $fecha_ingr; //fecha de ingr
            $avis->ecosistemaAvistamiento       = $req->eco_avis;
            $avis->descripcionClimaAvistamiento = $req->clima_avis;
            $avis->fisiografiaAvistamiento      = $req->fisio_Avis;
            $avis->geologiaAvistamiento         = $req->geo_avis;
            $avis->hidrografiaAvistamiento      = $req->hidro_avis;
            $avis->usosDeLaEspecieAvistamiento  = $req->usos_avis;
            $avis->horaAvistamiento             = $req->hora_av;



            if( $req->publish_sub != null ){

                $avis->publicacionPdf = $req->publish_sub;

            }            

            
            $avis->save();

        } else {

            if ($req->ajax()) {

                return response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            } else {

                return redirect('/Busqueda')->withErrors($validator, 'fdivision')->withInput($req->flash());
            }
        }

    }

    public function Avista_sub_pub( Request $req ){

        //dd($req->all());
        Cache::flush();
        $especie = Subespecie::join('Especies', 'Subespecies.idEspecie' , '=' , 'Especies.idEspecie' )->join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('reinos', 'Divisions.idReino', '=', 'reinos.idReino')->join('ClasesdeTipo','Subespecies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('procedencia_especies','Subespecies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->join('categoria_marns','Subespecies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Subespecies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('apendice_cites','Subespecies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->select('Subespecies.idSubespecie','Especies.idEspecie', 'Especies.nombreEspecie', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'reinos.nombreReino', 'Subespecies.nombreSubespecie','Subespecies.nombreEnIngles','Subespecies.descripcionDelEjemplar','Subespecies.fotografiaEspecie','ClasesdeTipo.nombreClaseDeTipo','procedencia_especies.nombreProcedenciaDeLaEspecie','categoria_marns.nombreCategoriaMARN','categoria_u_i_c_ns.nombreCategoriaUICN','apendice_cites.nombreApendiceCITES','Subespecies.fotografiaEspecie')->where('Subespecies.idSubespecie', $req->id_sub)->get();


        $nc_sub = Nombrecomun::where('idSubespecie', $req->id_sub)->get();

        

       $avista = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->select('Avistamientos.idAvistamiento', 'Colectores.nombreColector', 'Suelo.nombreSuelo', 'ClasesDeTierra.nombreClaseDeTierra', 'Departamento.nombreDepartamento','Avistamientos.fechaHoraAvistamiento','Avistamientos.fechaIngresodeInformacionBD','Avistamientos.ejemplarDepositado', 'Avistamientos.fechaIngresodeInformacionBD', 'Avistamientos.fotografiaAvistamiento', 'Avistamientos.ecosistemaAvistamiento', 'Avistamientos.descripcionClimaAvistamiento', 'Avistamientos.fisiografiaAvistamiento', 'Avistamientos.geologiaAvistamiento', 'Avistamientos.hidrografiaAvistamiento','Avistamientos.publicacionPdf')->where('idSubespecie', $req->id_sub)->get();

       $no_avis = count($avista);

       $reino_ani = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie')->where([['Reinos.nombreReino', '=', 'Animalia'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Animalia'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $reino_bac = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie')->where([['Reinos.nombreReino', '=', 'Bacteria'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Bacteria'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $reino_chro = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie')->where([['Reinos.nombreReino', '=', 'Chromista'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Chromista'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $reino_fun = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie')->where([['Reinos.nombreReino', '=', 'Fungi'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Fungi'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $reino_pla = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie')->where([['Reinos.nombreReino', '=', 'Plantae'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Plantae'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $reino_pro = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie')->where([['Reinos.nombreReino', '=', 'Protozoa'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Protozoa'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $depar_ahua = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'AHUACHAPAN'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'AHUACHAPAN'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_santa = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'SANTA ANA'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'SANTA ANA'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_sonso = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'SONSONATE'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'SONSONATE'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_chal = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'CHALATENANGO'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'CHALATENANGO'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_lali = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'LA LIBERTAD'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'LA LIBERTAD'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_ssal = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'SAN SALVADOR'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'SAN SALVADOR'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_cusca = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'CUSCATLAN'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'CUSCATLAN'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_cab = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'CABANAS'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'CABANAS'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_lapaz = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'LA PAZ'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'LA PAZ'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_sanvi = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'SAN VICENTE'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'SAN VICENTE'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_usul = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'USULUTAN'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'USULUTAN'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_sanmi = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'SAN MIGUEL'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'SAN MIGUEL'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_mor = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'MORAZAN'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'MORAZAN'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_launi = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'LA UNION'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'LA UNION'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();




        $r_ani = count($reino_ani);
        $r_bac = count($reino_bac);
        $r_fun = count($reino_fun);
        $r_pro = count($reino_pro);
        $r_pla = count($reino_pla);
        $r_chro = count($reino_chro);


        $d_ahua = count($depar_ahua);
        $d_sant = count($depar_santa);
        $d_sons = count($depar_sonso);
        $d_chal = count($depar_chal);
        $d_lali = count($depar_lali);
        $d_ssal = count($depar_ssal);
        $d_cusc = count($depar_cusca);
        $d_caba = count($depar_cab);
        $d_lapa = count($depar_lapaz);
        $d_sanv = count($depar_sanvi);
        $d_usul = count($depar_usul);
        $d_sanm = count($depar_sanmi);
        $d_mora = count($depar_mor);
        $d_laun = count($depar_launi);


            //dd($avista);

        //return view('ingreso.avis', compact('especie', 'avista','usuario'));

        return view('publico.avista_sub', compact('avista','especie','no_avis','nc_sub','r_ani','r_bac','r_fun','r_pro','r_pla','r_chro','d_ahua','d_sant','d_sons','d_chal','d_lali','d_ssal','d_cusc','d_caba','d_lapa','d_sanv','d_usul','d_sanm','d_mora','d_laun'));

    }

    public function Avista_esp_pub( Request $req ){
        Cache::flush();
        $especie = Especie::join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('reinos', 'Divisions.idReino', '=', 'reinos.idReino')->join('ClasesdeTipo','Especies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('procedencia_especies','Especies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->join('categoria_marns','Especies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Especies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('apendice_cites','Especies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->select('Especies.idEspecie', 'Especies.nombreEspecie', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'reinos.nombreReino','ClasesdeTipo.nombreClaseDeTipo','procedencia_especies.nombreProcedenciaDeLaEspecie','categoria_marns.nombreCategoriaMARN','categoria_u_i_c_ns.nombreCategoriaUICN','apendice_cites.nombreApendiceCITES','Especies.nombreEnIngles','Especies.descripcionDelEjemplar','Especies.fotografiaEspecie')->where('Especies.idEspecie', $req->id_esp)->get();

        $nc_esp = Nombrecomun::where('idEspecie', $req->id_esp)->get();

        //dd($req->all());

        $avista = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->select('Avistamientos.idAvistamiento', 'Colectores.nombreColector', 'Suelo.nombreSuelo', 'ClasesDeTierra.nombreClaseDeTierra', 'Departamento.nombreDepartamento','Avistamientos.fechaHoraAvistamiento','Avistamientos.fechaIngresodeInformacionBD','Avistamientos.ejemplarDepositado', 'Avistamientos.fechaIngresodeInformacionBD', 'Avistamientos.fotografiaAvistamiento', 'Avistamientos.ecosistemaAvistamiento', 'Avistamientos.descripcionClimaAvistamiento', 'Avistamientos.fisiografiaAvistamiento', 'Avistamientos.geologiaAvistamiento', 'Avistamientos.hidrografiaAvistamiento','Avistamientos.publicacionPdf')->where('idEspecie', $req->id_esp)->get();

         $no_avis = count($avista);

         $reino_ani = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie')->where([['Reinos.nombreReino', '=', 'Animalia'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Animalia'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $reino_bac = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie')->where([['Reinos.nombreReino', '=', 'Bacteria'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Bacteria'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $reino_chro = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie')->where([['Reinos.nombreReino', '=', 'Chromista'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Chromista'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $reino_fun = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie')->where([['Reinos.nombreReino', '=', 'Fungi'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Fungi'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $reino_pla = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie')->where([['Reinos.nombreReino', '=', 'Plantae'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Plantae'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $reino_pro = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie')->where([['Reinos.nombreReino', '=', 'Protozoa'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Protozoa'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $depar_ahua = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'AHUACHAPAN'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'AHUACHAPAN'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_santa = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'SANTA ANA'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'SANTA ANA'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_sonso = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'SONSONATE'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'SONSONATE'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_chal = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'CHALATENANGO'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'CHALATENANGO'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_lali = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'LA LIBERTAD'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'LA LIBERTAD'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_ssal = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'SAN SALVADOR'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'SAN SALVADOR'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_cusca = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'CUSCATLAN'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'CUSCATLAN'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_cab = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'CABANAS'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'CABANAS'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_lapaz = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'LA PAZ'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'LA PAZ'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_sanvi = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'SAN VICENTE'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'SAN VICENTE'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_usul = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'USULUTAN'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'USULUTAN'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_sanmi = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'SAN MIGUEL'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'SAN MIGUEL'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_mor = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'MORAZAN'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'MORAZAN'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();

        $depar_launi = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Departamento.nombreDepartamento', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie','Reinos.nombreReino')->where([['Departamento.nombreDepartamento', '=', 'LA UNION'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'LA UNION'], ['Subespecies.estadoMarn', '=', 1]])->distinct()->get();




        $r_ani = count($reino_ani);
        $r_bac = count($reino_bac);
        $r_fun = count($reino_fun);
        $r_pro = count($reino_pro);
        $r_pla = count($reino_pla);
        $r_chro = count($reino_chro);


        $d_ahua = count($depar_ahua);
        $d_sant = count($depar_santa);
        $d_sons = count($depar_sonso);
        $d_chal = count($depar_chal);
        $d_lali = count($depar_lali);
        $d_ssal = count($depar_ssal);
        $d_cusc = count($depar_cusca);
        $d_caba = count($depar_cab);
        $d_lapa = count($depar_lapaz);
        $d_sanv = count($depar_sanvi);
        $d_usul = count($depar_usul);
        $d_sanm = count($depar_sanmi);
        $d_mora = count($depar_mor);
        $d_laun = count($depar_launi);




            //dd($avista);
            //dd($especie);

        return view('publico.avista_esp', compact('avista','especie','no_avis','nc_esp','r_ani','r_bac','r_fun','r_pro','r_pla','r_chro','d_ahua','d_sant','d_sons','d_chal','d_lali','d_ssal','d_cusc','d_caba','d_lapa','d_sanv','d_usul','d_sanm','d_mora','d_laun'));

    }


    public function Exportar_excel_esp( Request $req )
    {
        //dd($req->all());

        $nombre_excel = $req->nom_esp;
     
        $avista = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->select('Avistamientos.idAvistamiento', 'Colectores.nombreColector', 'Suelo.nombreSuelo', 'ClasesDeTierra.nombreClaseDeTierra', 'Departamento.nombreDepartamento','Avistamientos.fechaHoraAvistamiento','Avistamientos.fechaIngresodeInformacionBD','Avistamientos.ecosistemaAvistamiento', 'Avistamientos.descripcionClimaAvistamiento', 'Avistamientos.fisiografiaAvistamiento', 'Avistamientos.geologiaAvistamiento', 'Avistamientos.hidrografiaAvistamiento','Avistamientos.publicacionPdf')->where('idEspecie', $req->id_esp)->get();

        $especie = Especie::join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie', 'Subespecies.nombreSubespecie')->where([['Especies.idEspecie', $req->id_esp], ['Especies.estadoMarn', '=', 1]])->orWhere([['Especies.idEspecie', $req->id_esp], ['Subespecies.estadoMarn', '=', 1]])->get();

        $nc_esp = Nombrecomun::select('nombreComun')->where('idEspecie', $req->id_esp)->get();


        Excel::create($nombre_excel, function($excel)use($avista , $especie , $nc_esp ) {
            
            $excel->sheet('taxonomia', function($sheet)use($especie) {               
 
                $sheet->fromArray($especie);
 
            });         


            $excel->sheet('avistamientos', function($sheet)use($avista) {               
 
                $sheet->fromArray($avista);
 
            });

            $excel->sheet('nombre comun', function($sheet)use($nc_esp) {               
 
                $sheet->fromArray($nc_esp);
 
            });

            

        })->export('xls');

    }

    public function Exportar_excel_sub( Request $req )
    {
        //dd($req->all());

        $nombre_excel = $req->nom_sub;

        $avista = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->select('Avistamientos.idAvistamiento', 'Colectores.nombreColector', 'Suelo.nombreSuelo', 'ClasesDeTierra.nombreClaseDeTierra', 'Departamento.nombreDepartamento','Avistamientos.fechaHoraAvistamiento','Avistamientos.fechaIngresodeInformacionBD','Avistamientos.ecosistemaAvistamiento', 'Avistamientos.descripcionClimaAvistamiento', 'Avistamientos.fisiografiaAvistamiento', 'Avistamientos.geologiaAvistamiento', 'Avistamientos.hidrografiaAvistamiento','Avistamientos.publicacionPdf')->where('idSubespecie', $req->id_sub)->get();

        $especie = Subespecie::join('Especies', 'Subespecies.idEspecie', '=', 'Especies.idEspecie')->join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie', 'Subespecies.nombreSubespecie')->where('Subespecies.idSubespecie', $req->id_sub)->get();

        $nc_sub = Nombrecomun::select('nombreComun')->where('idSubespecie', $req->id_sub)->get();

        Excel::create($nombre_excel, function($excel)use($avista , $especie , $nc_sub ){
            
            $excel->sheet('taxonomia', function($sheet)use($especie) {               
 
                $sheet->fromArray($especie);
 
            });             

            $excel->sheet('avistamientos', function($sheet)use( $avista ){
                
                $sheet->fromArray($avista);
 
            });

            $excel->sheet('nombre comun', function($sheet)use( $nc_sub ){
                
                $sheet->fromArray($nc_sub);
 
            });

        })->export('xls');

    }

    //////////////////////////////////////////// EXCE ESPECIES //////////////////////////////////////////////////
    public function Excel_avistamientos( Request $req  )
    {
        //dd($req->all());

        $nombre_excel = 'Avistamientos';



        if( $req->id_sub !=null ){

            

            $avista = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->join('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->leftjoin('nombrecomuns','subespecies.idSubespecie','=','nombrecomuns.idSubespecie')->join('ClasesdeTipo','Subespecies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('apendice_cites','Subespecies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->join('categoria_marns','Subespecies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Subespecies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('procedencia_especies','Subespecies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->select('Subespecies.nombreSubespecie as Subespecie','Subespecies.nombreEnIngles as nombre Ingles','nombrecomuns.nombreComun as Nombre Comun','Suelo.nombreSuelo as Suelo', 'ClasesDeTierra.nombreClaseDeTierra as Clase Tierra', 'Departamento.nombreDepartamento as Departamento','ClasesdeTipo.nombreClaseDeTipo as Clase de Tipo','apendice_cites.nombreApendiceCITES as Apendice CITES','categoria_marns.nombreCategoriaMARN as Categoria MARN','categoria_u_i_c_ns.nombreCategoriaUICN as Categoria UICN','procedencia_especies.nombreProcedenciaDeLaEspecie as Procedencia','Avistamientos.ecosistemaAvistamiento as Ecosistema', 'Avistamientos.descripcionClimaAvistamiento as Clima', 'Avistamientos.fisiografiaAvistamiento as Fisiogrfia', 'Avistamientos.geologiaAvistamiento as Geologia', 'Avistamientos.hidrografiaAvistamiento as Hidrografia','Avistamientos.publicacionPdf as Publicaciones')->where([['Subespecies.idSubespecie', '=', $req->id_sub ], ['Subespecies.estadoMarn', '=', 1]])->get(); 

           

            Excel::create($nombre_excel, function($excel)use($avista){
                 

            $excel->sheet('subespecies', function($sheet)use( $avista ){
                
                $sheet->fromArray($avista);
 
            });

        })->export('xls');





        }else if( $req->id_esp !=null ){

            $esp = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->join('Especies', 'Avistamientos.idEspecie', '=', 'Especies.idEspecie')->leftjoin('nombrecomuns','Especies.idEspecie','=','nombrecomuns.idSubespecie')->leftJoin('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->join('ClasesdeTipo','Especies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('apendice_cites','Especies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->join('categoria_marns','Especies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Especies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('procedencia_especies','Especies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->select('Especies.nombreEspecie as Especie','Especies.nombreEnIngles as nombre Ingles','nombrecomuns.nombreComun as Nombre Comun','Suelo.nombreSuelo as Suelo', 'ClasesDeTierra.nombreClaseDeTierra as Clase Tierra', 'Departamento.nombreDepartamento as Departamento','ClasesdeTipo.nombreClaseDeTipo as Clase de Tipo','apendice_cites.nombreApendiceCITES as Apendice CITES','categoria_marns.nombreCategoriaMARN as Categoria MARN','categoria_u_i_c_ns.nombreCategoriaUICN as Categoria UICN','procedencia_especies.nombreProcedenciaDeLaEspecie as Procedencia','Avistamientos.ecosistemaAvistamiento as Ecosistema', 'Avistamientos.descripcionClimaAvistamiento as Clima', 'Avistamientos.fisiografiaAvistamiento as Fisiogrfia', 'Avistamientos.geologiaAvistamiento as Geologia', 'Avistamientos.hidrografiaAvistamiento as Hidrografia','Avistamientos.publicacionPdf as Publicaciones')->where([['Especies.idEspecie', '=', $req->id_esp], ['Especies.estadoMarn', '=', 1]])->get(); 

            //dd($avista);

            $sub = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->join('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->join('Especies','Subespecies.idEspecie','=','Especies.idEspecie')->join('Generos','Especies.idGenero','=','Generos.idGenero')->leftjoin('nombrecomuns','subespecies.idSubespecie','=','nombrecomuns.idSubespecie')->join('ClasesdeTipo','Subespecies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('apendice_cites','Subespecies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->join('categoria_marns','Subespecies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Subespecies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('procedencia_especies','Subespecies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->select('Especies.nombreEspecie as Especie','Subespecies.nombreSubespecie as Subespecie','Subespecies.nombreEnIngles as nombre Ingles','nombrecomuns.nombreComun as Nombre Comun','Suelo.nombreSuelo as Suelo', 'ClasesDeTierra.nombreClaseDeTierra as Clase Tierra', 'Departamento.nombreDepartamento as Departamento','ClasesdeTipo.nombreClaseDeTipo as Clase de Tipo','apendice_cites.nombreApendiceCITES as Apendice CITES','categoria_marns.nombreCategoriaMARN as Categoria MARN','categoria_u_i_c_ns.nombreCategoriaUICN as Categoria UICN','procedencia_especies.nombreProcedenciaDeLaEspecie as Procedencia','Avistamientos.ecosistemaAvistamiento as Ecosistema', 'Avistamientos.descripcionClimaAvistamiento as Clima', 'Avistamientos.fisiografiaAvistamiento as Fisiogrfia', 'Avistamientos.geologiaAvistamiento as Geologia', 'Avistamientos.hidrografiaAvistamiento as Hidrografia','Avistamientos.publicacionPdf as Publicaciones')->where([['Especies.idEspecie', '=', $req->id_esp ], ['Subespecies.estadoMarn', '=', 1]])->get(); 

            Excel::create($nombre_excel, function( $excel )use( $esp , $sub ){
                 

            $excel->sheet('especies', function( $sheet )use( $esp ){
                
                $sheet->fromArray($esp);
 
            });

            $excel->sheet('subespecies', function( $sheet )use( $sub ){
                
                $sheet->fromArray($sub);
 
            });

        })->export('xls');       

            




        }else if( $req->id_gen !=null ){

            //dd($req->all());

            $esp = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->join('Especies', 'Avistamientos.idEspecie', '=', 'Especies.idEspecie')->join('Generos','Especies.idGenero','=','Generos.idGenero')->leftJoin('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->leftjoin('nombrecomuns','Especies.idEspecie','=','nombrecomuns.idSubespecie')->join('ClasesdeTipo','Especies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('apendice_cites','Especies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->join('categoria_marns','Especies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Especies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('procedencia_especies','Especies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->select('Generos.nombreGenero as Genero','Especies.nombreEspecie as Especie','Especies.nombreEnIngles as nombre Ingles','nombrecomuns.nombreComun as Nombre Comun','Suelo.nombreSuelo as Suelo', 'ClasesDeTierra.nombreClaseDeTierra as Clase Tierra', 'Departamento.nombreDepartamento as Departamento','ClasesdeTipo.nombreClaseDeTipo as Clase de Tipo','apendice_cites.nombreApendiceCITES as Apendice CITES','categoria_marns.nombreCategoriaMARN as Categoria MARN','categoria_u_i_c_ns.nombreCategoriaUICN as Categoria UICN','procedencia_especies.nombreProcedenciaDeLaEspecie as Procedencia','Avistamientos.ecosistemaAvistamiento as Ecosistema', 'Avistamientos.descripcionClimaAvistamiento as Clima', 'Avistamientos.fisiografiaAvistamiento as Fisiogrfia', 'Avistamientos.geologiaAvistamiento as Geologia', 'Avistamientos.hidrografiaAvistamiento as Hidrografia','Avistamientos.publicacionPdf as Publicaciones')->where([['Generos.idGenero', '=', $req->id_gen], ['Especies.estadoMarn', '=', 1]])->get(); 

            //dd($avista);

            $sub = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->join('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->join('Especies','Subespecies.idEspecie','=','Especies.idEspecie')->join('Generos','Especies.idGenero','=','Generos.idGenero')->leftjoin('nombrecomuns','subespecies.idSubespecie','=','nombrecomuns.idSubespecie')->join('ClasesdeTipo','Subespecies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('apendice_cites','Subespecies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->join('categoria_marns','Subespecies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Subespecies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('procedencia_especies','Subespecies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->select('Generos.nombreGenero as Genero','Especies.nombreEspecie as Especie','Subespecies.nombreSubespecie as Subespecie','Subespecies.nombreEnIngles as nombre Ingles','nombrecomuns.nombreComun as Nombre Comun','Suelo.nombreSuelo as Suelo', 'ClasesDeTierra.nombreClaseDeTierra as Clase Tierra', 'Departamento.nombreDepartamento as Departamento','ClasesdeTipo.nombreClaseDeTipo as Clase de Tipo','apendice_cites.nombreApendiceCITES as Apendice CITES','categoria_marns.nombreCategoriaMARN as Categoria MARN','categoria_u_i_c_ns.nombreCategoriaUICN as Categoria UICN','procedencia_especies.nombreProcedenciaDeLaEspecie as Procedencia','Avistamientos.ecosistemaAvistamiento as Ecosistema', 'Avistamientos.descripcionClimaAvistamiento as Clima', 'Avistamientos.fisiografiaAvistamiento as Fisiogrfia', 'Avistamientos.geologiaAvistamiento as Geologia', 'Avistamientos.hidrografiaAvistamiento as Hidrografia','Avistamientos.publicacionPdf as Publicaciones')->where([['Generos.idGenero', '=', $req->id_gen ], ['Subespecies.estadoMarn', '=', 1]])->get(); 

           

            Excel::create($nombre_excel, function( $excel )use( $esp , $sub ){
                 

            $excel->sheet('especies', function( $sheet )use( $esp ){
                
                $sheet->fromArray($esp);
 
            });

            $excel->sheet('subespecies', function( $sheet )use( $sub ){
                
                $sheet->fromArray($sub);
 
            });

        })->export('xls');       

            

        }else if( $req->id_fam != null ){

            $esp = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->join('Especies', 'Avistamientos.idEspecie', '=', 'Especies.idEspecie')->join('Generos','Especies.idGenero','=','Generos.idGenero')->join('Familias','Generos.idFamilia','=','Familias.idFamilia')->leftjoin('nombrecomuns','Especies.idEspecie','=','nombrecomuns.idSubespecie')->leftJoin('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->join('ClasesdeTipo','Especies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('apendice_cites','Especies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->join('categoria_marns','Especies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Especies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('procedencia_especies','Especies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->select('Familias.nombreFamilia as Familia', 'Generos.nombreGenero as Genero','Especies.nombreEspecie as Especie','Especies.nombreEnIngles as nombre Ingles','nombrecomuns.nombreComun as Nombre Comun','Suelo.nombreSuelo as Suelo', 'ClasesDeTierra.nombreClaseDeTierra as Clase Tierra', 'Departamento.nombreDepartamento as Departamento','ClasesdeTipo.nombreClaseDeTipo as Clase de Tipo','apendice_cites.nombreApendiceCITES as Apendice CITES','categoria_marns.nombreCategoriaMARN as Categoria MARN','categoria_u_i_c_ns.nombreCategoriaUICN as Categoria UICN','procedencia_especies.nombreProcedenciaDeLaEspecie as Procedencia','Avistamientos.ecosistemaAvistamiento as Ecosistema', 'Avistamientos.descripcionClimaAvistamiento as Clima', 'Avistamientos.fisiografiaAvistamiento as Fisiogrfia', 'Avistamientos.geologiaAvistamiento as Geologia', 'Avistamientos.hidrografiaAvistamiento as Hidrografia','Avistamientos.publicacionPdf as Publicaciones')->where([['Familias.idFamilia', '=', $req->id_fam], ['Especies.estadoMarn', '=', 1]])->get(); 

            //dd($avista);

            $sub = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->join('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->join('Especies','Subespecies.idEspecie','=','Especies.idEspecie')->join('Generos','Especies.idGenero','=','Generos.idGenero')->join('Familias','Generos.idFamilia','=','Familias.idFamilia')->leftjoin('nombrecomuns','subespecies.idSubespecie','=','nombrecomuns.idSubespecie')->join('ClasesdeTipo','Subespecies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('apendice_cites','Subespecies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->join('categoria_marns','Subespecies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Subespecies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('procedencia_especies','Subespecies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->select('Familias.nombreFamilia as Familia', 'Generos.nombreGenero as Genero','Especies.nombreEspecie as Especie','Subespecies.nombreSubespecie as Subespecie','Subespecies.nombreEnIngles as nombre Ingles','nombrecomuns.nombreComun as Nombre Comun','Suelo.nombreSuelo as Suelo', 'ClasesDeTierra.nombreClaseDeTierra as Clase Tierra', 'Departamento.nombreDepartamento as Departamento','ClasesdeTipo.nombreClaseDeTipo as Clase de Tipo','apendice_cites.nombreApendiceCITES as Apendice CITES','categoria_marns.nombreCategoriaMARN as Categoria MARN','categoria_u_i_c_ns.nombreCategoriaUICN as Categoria UICN','procedencia_especies.nombreProcedenciaDeLaEspecie as Procedencia','Avistamientos.ecosistemaAvistamiento as Ecosistema', 'Avistamientos.descripcionClimaAvistamiento as Clima', 'Avistamientos.fisiografiaAvistamiento as Fisiogrfia', 'Avistamientos.geologiaAvistamiento as Geologia', 'Avistamientos.hidrografiaAvistamiento as Hidrografia','Avistamientos.publicacionPdf as Publicaciones')->where([['Familias.idFamilia', '=', $req->id_fam ], ['Subespecies.estadoMarn', '=', 1]])->get(); 


            Excel::create($nombre_excel, function( $excel )use( $esp , $sub ){
                 

            $excel->sheet('especies', function( $sheet )use( $esp ){
                
                $sheet->fromArray($esp);
 
            });

            $excel->sheet('subespecies', function( $sheet )use( $sub ){
                
                $sheet->fromArray($sub);
 
            });

        })->export('xls');       

        


        }else if( $req->id_ord != null ){

            $esp = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->join('Especies', 'Avistamientos.idEspecie', '=', 'Especies.idEspecie')->join('Generos','Especies.idGenero','=','Generos.idGenero')->join('Familias','Generos.idFamilia','=','Familias.idFamilia')->join('Ordens','Familias.idOrden','=','Ordens.idOrden')->leftjoin('nombrecomuns','Especies.idEspecie','=','nombrecomuns.idSubespecie')->leftJoin('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->join('ClasesdeTipo','Especies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('apendice_cites','Especies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->join('categoria_marns','Especies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Especies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('procedencia_especies','Especies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->select('Ordens.nombreOrden as Orden', 'Familias.nombreFamilia as Familia', 'Generos.nombreGenero as Genero','Especies.nombreEspecie as Especie','Especies.nombreEnIngles as nombre Ingles','nombrecomuns.nombreComun as Nombre Comun','Suelo.nombreSuelo as Suelo', 'ClasesDeTierra.nombreClaseDeTierra as Clase Tierra', 'Departamento.nombreDepartamento as Departamento','ClasesdeTipo.nombreClaseDeTipo as Clase de Tipo','apendice_cites.nombreApendiceCITES as Apendice CITES','categoria_marns.nombreCategoriaMARN as Categoria MARN','categoria_u_i_c_ns.nombreCategoriaUICN as Categoria UICN','procedencia_especies.nombreProcedenciaDeLaEspecie as Procedencia','Avistamientos.ecosistemaAvistamiento as Ecosistema', 'Avistamientos.descripcionClimaAvistamiento as Clima', 'Avistamientos.fisiografiaAvistamiento as Fisiogrfia', 'Avistamientos.geologiaAvistamiento as Geologia', 'Avistamientos.hidrografiaAvistamiento as Hidrografia','Avistamientos.publicacionPdf as Publicaciones')->where([['Ordens.idOrden', '=', $req->id_ord], ['Especies.estadoMarn', '=', 1]])->get(); 

            //dd($avista);

            $sub = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->join('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->join('Especies','Subespecies.idEspecie','=','Especies.idEspecie')->join('Generos','Especies.idGenero','=','Generos.idGenero')->join('Familias','Generos.idFamilia','=','Familias.idFamilia')->join('Ordens','Familias.idOrden','=','Ordens.idOrden')->leftjoin('nombrecomuns','subespecies.idSubespecie','=','nombrecomuns.idSubespecie')->join('ClasesdeTipo','Subespecies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('apendice_cites','Subespecies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->join('categoria_marns','Subespecies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Subespecies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('procedencia_especies','Subespecies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->select('Ordens.nombreOrden as Orden', 'Familias.nombreFamilia as Familia', 'Generos.nombreGenero as Genero','Especies.nombreEspecie as Especie','Subespecies.nombreSubespecie as Subespecie','Subespecies.nombreEnIngles as nombre Ingles','nombrecomuns.nombreComun as Nombre Comun','Suelo.nombreSuelo as Suelo', 'ClasesDeTierra.nombreClaseDeTierra as Clase Tierra', 'Departamento.nombreDepartamento as Departamento','ClasesdeTipo.nombreClaseDeTipo as Clase de Tipo','apendice_cites.nombreApendiceCITES as Apendice CITES','categoria_marns.nombreCategoriaMARN as Categoria MARN','categoria_u_i_c_ns.nombreCategoriaUICN as Categoria UICN','procedencia_especies.nombreProcedenciaDeLaEspecie as Procedencia','Avistamientos.ecosistemaAvistamiento as Ecosistema', 'Avistamientos.descripcionClimaAvistamiento as Clima', 'Avistamientos.fisiografiaAvistamiento as Fisiogrfia', 'Avistamientos.geologiaAvistamiento as Geologia', 'Avistamientos.hidrografiaAvistamiento as Hidrografia','Avistamientos.publicacionPdf as Publicaciones')->where([['Ordens.idOrden', '=', $req->id_ord ], ['Subespecies.estadoMarn', '=', 1]])->get(); 


            Excel::create($nombre_excel, function( $excel )use( $esp , $sub ){
                 

            $excel->sheet('especies', function( $sheet )use( $esp ){
                
                $sheet->fromArray($esp);
 
            });

            $excel->sheet('subespecies', function( $sheet )use( $sub ){
                
                $sheet->fromArray($sub);
 
            });

        })->export('xls');              



        }else if( $req->id_cla != null ){

            //dd($req->all());

            $esp = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->join('Especies', 'Avistamientos.idEspecie', '=', 'Especies.idEspecie')->join('Generos','Especies.idGenero','=','Generos.idGenero')->join('Familias','Generos.idFamilia','=','Familias.idFamilia')->join('Ordens','Familias.idOrden','=','Ordens.idOrden')->join('Clases','Ordens.idClase','=','Clases.idClase')->leftjoin('nombrecomuns','Especies.idEspecie','=','nombrecomuns.idSubespecie')->leftJoin('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->join('ClasesdeTipo','Especies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('apendice_cites','Especies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->join('categoria_marns','Especies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Especies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('procedencia_especies','Especies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->select('Clases.nombreClase as Clase', 'Ordens.nombreOrden as Orden', 'Familias.nombreFamilia as Familia', 'Generos.nombreGenero as Genero','Especies.nombreEspecie as Especie','Especies.nombreEnIngles as nombre Ingles','nombrecomuns.nombreComun as Nombre Comun','Suelo.nombreSuelo as Suelo', 'ClasesDeTierra.nombreClaseDeTierra as Clase Tierra', 'Departamento.nombreDepartamento as Departamento','ClasesdeTipo.nombreClaseDeTipo as Clase de Tipo','apendice_cites.nombreApendiceCITES as Apendice CITES','categoria_marns.nombreCategoriaMARN as Categoria MARN','categoria_u_i_c_ns.nombreCategoriaUICN as Categoria UICN','procedencia_especies.nombreProcedenciaDeLaEspecie as Procedencia','Avistamientos.ecosistemaAvistamiento as Ecosistema', 'Avistamientos.descripcionClimaAvistamiento as Clima', 'Avistamientos.fisiografiaAvistamiento as Fisiogrfia', 'Avistamientos.geologiaAvistamiento as Geologia', 'Avistamientos.hidrografiaAvistamiento as Hidrografia','Avistamientos.publicacionPdf as Publicaciones')->where([['Clases.idClase', '=',  $req->id_cla], ['Especies.estadoMarn', '=', 1]])->get(); 

            //dd($avista);

            $sub = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->join('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->join('Especies','Subespecies.idEspecie','=','Especies.idEspecie')->join('Generos','Especies.idGenero','=','Generos.idGenero')->join('Familias','Generos.idFamilia','=','Familias.idFamilia')->join('Ordens','Familias.idOrden','=','Ordens.idOrden')->join('Clases','Ordens.idClase','=','Clases.idClase')->leftjoin('nombrecomuns','subespecies.idSubespecie','=','nombrecomuns.idSubespecie')->join('ClasesdeTipo','Subespecies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('apendice_cites','Subespecies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->join('categoria_marns','Subespecies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Subespecies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('procedencia_especies','Subespecies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->select('Clases.nombreClase as Clase', 'Ordens.nombreOrden as Orden', 'Familias.nombreFamilia as Familia', 'Generos.nombreGenero as Genero','Especies.nombreEspecie as Especie','Subespecies.nombreSubespecie as Subespecie','Subespecies.nombreEnIngles as nombre Ingles','nombrecomuns.nombreComun as Nombre Comun','Suelo.nombreSuelo as Suelo', 'ClasesDeTierra.nombreClaseDeTierra as Clase Tierra', 'Departamento.nombreDepartamento as Departamento','ClasesdeTipo.nombreClaseDeTipo as Clase de Tipo','apendice_cites.nombreApendiceCITES as Apendice CITES','categoria_marns.nombreCategoriaMARN as Categoria MARN','categoria_u_i_c_ns.nombreCategoriaUICN as Categoria UICN','procedencia_especies.nombreProcedenciaDeLaEspecie as Procedencia','Avistamientos.ecosistemaAvistamiento as Ecosistema', 'Avistamientos.descripcionClimaAvistamiento as Clima', 'Avistamientos.fisiografiaAvistamiento as Fisiogrfia', 'Avistamientos.geologiaAvistamiento as Geologia', 'Avistamientos.hidrografiaAvistamiento as Hidrografia','Avistamientos.publicacionPdf as Publicaciones')->where([['Clases.idClase', '=',  $req->id_cla ], ['Subespecies.estadoMarn', '=', 1]])->get(); 


            //dd($avista);

            Excel::create($nombre_excel, function( $excel )use( $esp , $sub ){
                 

            $excel->sheet('especies', function( $sheet )use( $esp ){
                
                $sheet->fromArray($esp);
 
            });

            $excel->sheet('subespecies', function( $sheet )use( $sub ){
                
                $sheet->fromArray($sub);
 
            });

        })->export('xls');        


                      



        }else if( $req->id_div != null ){


            //dd($req->all());

            $esp = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->join('Especies', 'Avistamientos.idEspecie', '=', 'Especies.idEspecie')->join('Generos','Especies.idGenero','=','Generos.idGenero')->join('Familias','Generos.idFamilia','=','Familias.idFamilia')->join('Ordens','Familias.idOrden','=','Ordens.idOrden')->join('Clases','Ordens.idClase','=','Clases.idClase')->join('Divisions','Clases.idDivision','=','Divisions.idDivision')->leftJoin('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->leftjoin('nombrecomuns','Especies.idEspecie','=','nombrecomuns.idSubespecie')->join('ClasesdeTipo','Especies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('apendice_cites','Especies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->join('categoria_marns','Especies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Especies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('procedencia_especies','Especies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->select('Divisions.nombreDivision as Division', 'Clases.nombreClase as Clase', 'Ordens.nombreOrden as Orden', 'Familias.nombreFamilia as Familia', 'Generos.nombreGenero as Genero','Especies.nombreEspecie as Especie','Especies.nombreEnIngles as nombre Ingles','nombrecomuns.nombreComun as Nombre Comun','Suelo.nombreSuelo as Suelo', 'ClasesDeTierra.nombreClaseDeTierra as Clase Tierra', 'Departamento.nombreDepartamento as Departamento','ClasesdeTipo.nombreClaseDeTipo as Clase de Tipo','apendice_cites.nombreApendiceCITES as Apendice CITES','categoria_marns.nombreCategoriaMARN as Categoria MARN','categoria_u_i_c_ns.nombreCategoriaUICN as Categoria UICN','procedencia_especies.nombreProcedenciaDeLaEspecie as Procedencia','Avistamientos.ecosistemaAvistamiento as Ecosistema', 'Avistamientos.descripcionClimaAvistamiento as Clima', 'Avistamientos.fisiografiaAvistamiento as Fisiogrfia', 'Avistamientos.geologiaAvistamiento as Geologia', 'Avistamientos.hidrografiaAvistamiento as Hidrografia','Avistamientos.publicacionPdf as Publicaciones')->where([['Divisions.idDivision', '=',  $req->id_div], ['Especies.estadoMarn', '=', 1]])->get(); 

            //dd($avista);

            $sub = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->join('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->join('Especies','Subespecies.idEspecie','=','Especies.idEspecie')->join('Generos','Especies.idGenero','=','Generos.idGenero')->join('Familias','Generos.idFamilia','=','Familias.idFamilia')->join('Ordens','Familias.idOrden','=','Ordens.idOrden')->join('Clases','Ordens.idClase','=','Clases.idClase')->join('Divisions','Clases.idDivision','=','Divisions.idDivision')->leftjoin('nombrecomuns','subespecies.idSubespecie','=','nombrecomuns.idSubespecie')->join('ClasesdeTipo','Subespecies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('apendice_cites','Subespecies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->join('categoria_marns','Subespecies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Subespecies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('procedencia_especies','Subespecies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->select('Divisions.nombreDivision as Division', 'Clases.nombreClase as Clase', 'Ordens.nombreOrden as Orden', 'Familias.nombreFamilia as Familia', 'Generos.nombreGenero as Genero','Especies.nombreEspecie as Especie','Subespecies.nombreSubespecie as Subespecie','Subespecies.nombreEnIngles as nombre Ingles','nombrecomuns.nombreComun as Nombre Comun','Suelo.nombreSuelo as Suelo', 'ClasesDeTierra.nombreClaseDeTierra as Clase Tierra', 'Departamento.nombreDepartamento as Departamento','ClasesdeTipo.nombreClaseDeTipo as Clase de Tipo','apendice_cites.nombreApendiceCITES as Apendice CITES','categoria_marns.nombreCategoriaMARN as Categoria MARN','categoria_u_i_c_ns.nombreCategoriaUICN as Categoria UICN','procedencia_especies.nombreProcedenciaDeLaEspecie as Procedencia','Avistamientos.ecosistemaAvistamiento as Ecosistema', 'Avistamientos.descripcionClimaAvistamiento as Clima', 'Avistamientos.fisiografiaAvistamiento as Fisiogrfia', 'Avistamientos.geologiaAvistamiento as Geologia', 'Avistamientos.hidrografiaAvistamiento as Hidrografia','Avistamientos.publicacionPdf as Publicaciones')->where([['Divisions.idDivision', '=',  $req->id_div ], ['Subespecies.estadoMarn', '=', 1]])->get(); 

            //dd($avista);

            Excel::create($nombre_excel, function( $excel )use( $esp , $sub ){
                 

            $excel->sheet('especies', function( $sheet )use( $esp ){
                
                $sheet->fromArray($esp);
 
            });

            $excel->sheet('subespecies', function( $sheet )use( $sub ){
                
                $sheet->fromArray($sub);
 
            });

        })->export('xls');            



        }else if( $req->id_rei != null ){

            //dd($req->all());

            $esp = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->join('Especies', 'Avistamientos.idEspecie', '=', 'Especies.idEspecie')->join('Generos','Especies.idGenero','=','Generos.idGenero')->join('Familias','Generos.idFamilia','=','Familias.idFamilia')->join('Ordens','Familias.idOrden','=','Ordens.idOrden')->join('Clases','Ordens.idClase','=','Clases.idClase')->join('Divisions','Clases.idDivision','=','Divisions.idDivision')->join('Reinos','Divisions.idReino','=','Reinos.idReino')->leftjoin('nombrecomuns','Especies.idEspecie','=','nombrecomuns.idEspecie')->leftJoin('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->join('ClasesdeTipo','Especies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('apendice_cites','Especies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->join('categoria_marns','Especies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Especies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('procedencia_especies','Especies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->select('Reinos.nombreReino as Reino', 'Divisions.nombreDivision as Division', 'Clases.nombreClase as Clase', 'Ordens.nombreOrden as Orden', 'Familias.nombreFamilia as Familia', 'Generos.nombreGenero as Genero','Especies.nombreEspecie as Especie','Especies.nombreEnIngles as nombre Ingles','nombrecomuns.nombreComun as Nombre Comun','Suelo.nombreSuelo as Suelo', 'ClasesDeTierra.nombreClaseDeTierra as Clase Tierra', 'Departamento.nombreDepartamento as Departamento','ClasesdeTipo.nombreClaseDeTipo as Clase de Tipo','apendice_cites.nombreApendiceCITES as Apendice CITES','categoria_marns.nombreCategoriaMARN as Categoria MARN','categoria_u_i_c_ns.nombreCategoriaUICN as Categoria UICN','procedencia_especies.nombreProcedenciaDeLaEspecie as Procedencia','Avistamientos.ecosistemaAvistamiento as Ecosistema', 'Avistamientos.descripcionClimaAvistamiento as Clima', 'Avistamientos.fisiografiaAvistamiento as Fisiogrfia', 'Avistamientos.geologiaAvistamiento as Geologia', 'Avistamientos.hidrografiaAvistamiento as Hidrografia','Avistamientos.publicacionPdf as Publicaciones')->where([['Reinos.idReino', '=', $req->id_rei], ['Especies.estadoMarn', '=', 1]])->get();


            //dd($avista);

            $sub = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->join('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->join('Especies','Subespecies.idEspecie','=','Especies.idEspecie')->join('Generos','Especies.idGenero','=','Generos.idGenero')->join('Familias','Generos.idFamilia','=','Familias.idFamilia')->join('Ordens','Familias.idOrden','=','Ordens.idOrden')->join('Clases','Ordens.idClase','=','Clases.idClase')->join('Divisions','Clases.idDivision','=','Divisions.idDivision')->join('Reinos','Divisions.idReino','=','Reinos.idReino')->leftjoin('nombrecomuns','subespecies.idSubespecie','=','nombrecomuns.idSubespecie')->join('ClasesdeTipo','Subespecies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('apendice_cites','Subespecies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->join('categoria_marns','Subespecies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Subespecies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('procedencia_especies','Subespecies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->select('Reinos.nombreReino as Reino', 'Divisions.nombreDivision as Division', 'Clases.nombreClase as Clase', 'Ordens.nombreOrden as Orden', 'Familias.nombreFamilia as Familia', 'Generos.nombreGenero as Genero','Especies.nombreEspecie as Especie','Subespecies.nombreSubespecie as Subespecie','Subespecies.nombreEnIngles as nombre Ingles','nombrecomuns.nombreComun as Nombre Comun','Suelo.nombreSuelo as Suelo', 'ClasesDeTierra.nombreClaseDeTierra as Clase Tierra', 'Departamento.nombreDepartamento as Departamento','ClasesdeTipo.nombreClaseDeTipo as Clase de Tipo','apendice_cites.nombreApendiceCITES as Apendice CITES','categoria_marns.nombreCategoriaMARN as Categoria MARN','categoria_u_i_c_ns.nombreCategoriaUICN as Categoria UICN','procedencia_especies.nombreProcedenciaDeLaEspecie as Procedencia','Avistamientos.ecosistemaAvistamiento as Ecosistema', 'Avistamientos.descripcionClimaAvistamiento as Clima', 'Avistamientos.fisiografiaAvistamiento as Fisiogrfia', 'Avistamientos.geologiaAvistamiento as Geologia', 'Avistamientos.hidrografiaAvistamiento as Hidrografia','Avistamientos.publicacionPdf as Publicaciones')->where([['Reinos.idReino', '=', $req->id_rei], ['Subespecies.estadoMarn', '=', 1]])->get(); 

            Excel::create($nombre_excel, function( $excel )use( $esp , $sub ){
                 

            $excel->sheet('especies', function( $sheet )use( $esp ){
                
                $sheet->fromArray($esp);
 
            });

            $excel->sheet('subespecies', function( $sheet )use( $sub ){
                
                $sheet->fromArray($sub);
 
            });

        })->export('xls'); 



            


        }else if( $req->id_rei == null ){


            $esp = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->join('Especies', 'Avistamientos.idEspecie', '=', 'Especies.idEspecie')->join('Generos','Especies.idGenero','=','Generos.idGenero')->join('Familias','Generos.idFamilia','=','Familias.idFamilia')->join('Ordens','Familias.idOrden','=','Ordens.idOrden')->join('Clases','Ordens.idClase','=','Clases.idClase')->join('Divisions','Clases.idDivision','=','Divisions.idDivision')->join('Reinos','Divisions.idReino','=','Reinos.idReino')->leftjoin('nombrecomuns','Especies.idEspecie','=','nombrecomuns.idEspecie')->leftJoin('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->join('ClasesdeTipo','Especies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('apendice_cites','Especies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->join('categoria_marns','Especies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Especies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('procedencia_especies','Especies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->select('Reinos.nombreReino as Reino', 'Divisions.nombreDivision as Division', 'Clases.nombreClase as Clase', 'Ordens.nombreOrden as Orden', 'Familias.nombreFamilia as Familia', 'Generos.nombreGenero as Genero','Especies.nombreEspecie as Especie','Especies.nombreEnIngles as nombre Ingles','nombrecomuns.nombreComun as Nombre Comun','Suelo.nombreSuelo as Suelo', 'ClasesDeTierra.nombreClaseDeTierra as Clase Tierra', 'Departamento.nombreDepartamento as Departamento','ClasesdeTipo.nombreClaseDeTipo as Clase de Tipo','apendice_cites.nombreApendiceCITES as Apendice CITES','categoria_marns.nombreCategoriaMARN as Categoria MARN','categoria_u_i_c_ns.nombreCategoriaUICN as Categoria UICN','procedencia_especies.nombreProcedenciaDeLaEspecie as Procedencia','Avistamientos.ecosistemaAvistamiento as Ecosistema', 'Avistamientos.descripcionClimaAvistamiento as Clima', 'Avistamientos.fisiografiaAvistamiento as Fisiogrfia', 'Avistamientos.geologiaAvistamiento as Geologia', 'Avistamientos.hidrografiaAvistamiento as Hidrografia','Avistamientos.publicacionPdf as Publicaciones')->where('Especies.estadoMarn',1)->get(); 

            //dd($avista);

            $sub = Avistamiento::join('Colectores', 'Avistamientos.idColector', '=', 'Colectores.idColector')->join('Suelo', 'Avistamientos.idSuelo', '=', 'Suelo.idSuelo')->join('ClasesDeTierra', 'Avistamientos.idClaseDeTierra', '=', 'ClasesDeTierra.idClaseDeTierra')->join('Departamento', 'Avistamientos.codigoDepartamento', '=', 'Departamento.codigoDepartamento')->join('Subespecies', 'Avistamientos.idSubespecie', '=', 'Subespecies.idSubespecie')->join('Especies','Subespecies.idEspecie','=','Especies.idEspecie')->join('Generos','Especies.idGenero','=','Generos.idGenero')->join('Familias','Generos.idFamilia','=','Familias.idFamilia')->join('Ordens','Familias.idOrden','=','Ordens.idOrden')->join('Clases','Ordens.idClase','=','Clases.idClase')->join('Divisions','Clases.idDivision','=','Divisions.idDivision')->join('Reinos','Divisions.idReino','=','Reinos.idReino')->leftjoin('nombrecomuns','subespecies.idSubespecie','=','nombrecomuns.idSubespecie')->join('ClasesdeTipo','Subespecies.idClaseDeTipo','=','ClasesdeTipo.idClaseDeTipo')->join('apendice_cites','Subespecies.idApendiceCITES','=','apendice_cites.idApendiceCITES')->join('categoria_marns','Subespecies.idCategoriaMARN','=','categoria_marns.idCategoriaMARN')->join('categoria_u_i_c_ns','Subespecies.idCategoriaUICN','=','categoria_u_i_c_ns.idCategoriaUICN')->join('procedencia_especies','Subespecies.idProcedenciaDeLaEspecie','=','procedencia_especies.idProcedenciaDeLaEspecie')->select('Reinos.nombreReino as Reino', 'Divisions.nombreDivision as Division', 'Clases.nombreClase as Clase', 'Ordens.nombreOrden as Orden', 'Familias.nombreFamilia as Familia', 'Generos.nombreGenero as Genero','Especies.nombreEspecie as Especie','Subespecies.nombreSubespecie as Subespecie','Subespecies.nombreEnIngles as nombre Ingles','nombrecomuns.nombreComun as Nombre Comun','Suelo.nombreSuelo as Suelo', 'ClasesDeTierra.nombreClaseDeTierra as Clase Tierra', 'Departamento.nombreDepartamento as Departamento','ClasesdeTipo.nombreClaseDeTipo as Clase de Tipo','apendice_cites.nombreApendiceCITES as Apendice CITES','categoria_marns.nombreCategoriaMARN as Categoria MARN','categoria_u_i_c_ns.nombreCategoriaUICN as Categoria UICN','procedencia_especies.nombreProcedenciaDeLaEspecie as Procedencia','Avistamientos.ecosistemaAvistamiento as Ecosistema', 'Avistamientos.descripcionClimaAvistamiento as Clima', 'Avistamientos.fisiografiaAvistamiento as Fisiogrfia', 'Avistamientos.geologiaAvistamiento as Geologia', 'Avistamientos.hidrografiaAvistamiento as Hidrografia','Avistamientos.publicacionPdf as Publicaciones')->where( 'Subespecies.estadoMarn', 1)->get(); 





            Excel::create($nombre_excel, function( $excel )use( $esp , $sub ){
                 

            $excel->sheet('especies', function( $sheet )use( $esp ){
                
                $sheet->fromArray($esp);
 
            });

            $excel->sheet('subespecies', function( $sheet )use( $sub ){
                
                $sheet->fromArray($sub);
 
            });

        })->export('xls'); 

        }
    }



    public function Excel_especies_sub( Request $req )
    {
        
        $nombre_excel = 'Taxonomia_De_Especies';

        //dd($req->all());

        if( $req->id_sub !=null ){


            //echo "<script>alert('buscamos subespecie');</script>";
            $especie = Subespecie::join('Especies', 'Subespecies.idEspecie', '=', 'Especies.idEspecie')->join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie', 'Subespecies.nombreSubespecie')->where('Subespecies.idSubespecie', $req->id_sub)->get(); 

            $nombre_excel = 'Subespecie_';//.$especie->nombreSubespecie;

            Excel::create($nombre_excel, function($excel)use($especie) {
 
            $excel->sheet('pagina 1', function($sheet)use($especie) {               
 
                $sheet->fromArray($especie);
 
            });


        })->export('xls');

        }else if( $req->id_esp !=null ){

                        //echo "<script>alert('buscamos X 3specie');</script>";
            $especie = Especie::join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie', 'Subespecies.nombreSubespecie')->where([['Especies.idEspecie', $req->id_esp], ['Especies.estadoMarn', '=', 1]])->orWhere([['Especies.idEspecie', $req->id_esp], ['Subespecies.estadoMarn', '=', 1]])->get();

            $nombre_excel = 'Especie_';//.$especie->nombreEspecie;            

            Excel::create($nombre_excel, function($excel)use($especie) {
 
            $excel->sheet('pagina 1', function($sheet)use($especie) {               
 
                $sheet->fromArray($especie);
 
            });
        })->export('xls');
 



        }else if( $req->id_gen !=null ){

            //echo "<script>alert('buscamos X GENERO');</script>";
            $especie = Genero::join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie')->where([['Generos.idGenero', $req->id_gen], ['Especies.estadoMarn', '=', 1]])->orWhere([['Generos.idGenero', '=', $req->id_gen], ['Subespecies.estadoMarn', '=', 1]])->get();

            $nombre_excel = 'Genero_';//.$especie->nombreGenero;

            
            Excel::create($nombre_excel, function($excel)use($especie) {
 
            $excel->sheet('pagina 1', function($sheet)use($especie) {               
 
                $sheet->fromArray($especie);
 
            });
        })->export('xls');



        }else if( $req->id_fam != null ){


            //echo "<script>alert('buscamos X FAMILIA');</script>";
            $especie = Familia::join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie', 'Subespecies.nombreSubespecie')->where([['Familias.idFamilia', $req->id_fam], ['Especies.estadoMarn', '=', 1]])->orWhere([['Familias.idFamilia', '=', $req->id_fam], ['Subespecies.estadoMarn', '=', 1]])->get();

            $nombre_excel = 'Familia_';//.$especie->nombreFamilia;            

            Excel::create($nombre_excel, function($excel)use($especie) {
 
            $excel->sheet('pagina 1', function($sheet)use($especie) {               
 
                $sheet->fromArray($especie);
 
            });
        })->export('xls');



        }else if( $req->id_ord != null ){

            //echo "<script>alert('buscamos X Ordens');</script>";
            $especie = Orden::join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie')->where([['Ordens.idOrden', $req->id_ord], ['Especies.estadoMarn', '=', 1]])->orWhere([['Ordens.idOrden','=', $req->id_ord], ['Subespecies.estadoMarn', '=', 1]])->get();

            $nombre_excel = 'Orden_';//.$especie->nombreOrden;
          
            Excel::create($nombre_excel, function($excel)use($especie) {
 
            $excel->sheet('pagina 1', function($sheet)use($especie) {               
 
                $sheet->fromArray($especie);
 
            });
        })->export('xls');



        }else if( $req->id_cla != null ){

            //echo "<script>alert('buscamos CLASE');</script>";
            $especie = Clase::join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie')->where([['Clases.idClase', $req->id_cla], ['Especies.estadoMarn', '=', 1]])->orWhere([['Clases.idClase', '=', $req->id_cla], ['Subespecies.estadoMarn', '=', 1]])->get();

            $nombre_excel = 'Clase_';//.$especie->nombreClase;

            Excel::create($nombre_excel, function($excel)use($especie) {
 
            $excel->sheet('pagina 1', function($sheet)use($especie) {               
 
                $sheet->fromArray($especie);
 
            });
        })->export('xls');



        }else if( $req->id_div != null ){

            //echo "<script>alert('buscamos X DIVISIOM');</script>";

            $especie = Division::join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie')->where([['Divisions.idDivision', $req->id_div], ['Especies.estadoMarn', '=', 1]])->orWhere([['Divisions.idDivision', '=', $req->id_div], ['Subespecies.estadoMarn', '=', 1]])->get();

            $nombre_excel = 'Division_';//.$especie->nombreDivision;
            

            Excel::create($nombre_excel, function($excel)use($especie) {
 
            $excel->sheet('pagina 1', function($sheet)use($especie) {               
 
                $sheet->fromArray($especie);
 
            });
        })->export('xls');



        }else if( $req->id_rei != null ){

            //echo "<script>alert('buscamos X REINO');</script>";
            $especie = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie','Subespecies.nombreSubespecie')->where([['Reinos.idReino', '=', $req->id_rei], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.idReino', '=', $req->id_rei], ['Subespecies.estadoMarn', '=', 1]])->get();

            //dd($especie->nombreReino);
            $nombre_excel = 'Reino';//.$especie->Reinos.nombreReino;            

            Excel::create($nombre_excel, function($excel)use($especie) {
 
            $excel->sheet('pagina 1', function($sheet)use($especie) {               
 
                $sheet->fromArray($especie);
 
            });
        })->export('xls');



        }



    }



    public function Consulta_Publica( Request $req )
    {

        //dd($req->all());


        $especie = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie', 'Especies.idEspecie', 'Subespecies.nombreSubespecie', 'Subespecies.idSubespecie')->where([['Reinos.nombreReino', 'LIKE', "%$req->consulta%"], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', 'LIKE', "%$req->consulta%"], ['Subespecies.estadoMarn', '=', 1]])->orWhere([['Divisions.nombreDivision', 'LIKE', "%$req->consulta%"], ['Especies.estadoMarn', '=', 1]])->orWhere([['Divisions.nombreDivision', 'LIKE', "%$req->consulta%"], ['Subespecies.estadoMarn', '=', 1]])->orWhere([['Clases.nombreClase', 'LIKE', "%$req->consulta%"], ['Especies.estadoMarn', '=', 1]])->orWhere([['Clases.nombreClase', 'LIKE', "%$req->consulta%"], ['Subespecies.estadoMarn', '=', 1]])->orWhere([['Ordens.nombreOrden', 'LIKE', "%$req->consulta%"], ['Especies.estadoMarn', '=', 1]])->orWhere( [['Ordens.nombreOrden', 'LIKE', "%$req->consulta%"], ['Subespecies.estadoMarn', '=', 1]])->orWhere([['Familias.nombreFamilia', 'LIKE', "%$req->consulta%"], ['Especies.estadoMarn', '=', 1]])->orWhere([['Familias.nombreFamilia', 'LIKE', "%$req->consulta%"], ['Subespecies.estadoMarn', '=', 1]])->orWhere([['Generos.nombreGenero', 'LIKE', "%$req->consulta%"], ['Especies.estadoMarn', '=', 1]])->orWhere([['Generos.nombreGenero', 'LIKE', "%$req->consulta%"], ['Subespecies.estadoMarn', '=', 1]])->orWhere([['Especies.nombreEspecie', 'LIKE', "%$req->consulta%"], ['Especies.estadoMarn', '=', 1]])->orWhere([['Especies.nombreEspecie', 'LIKE', "%$req->consulta%"], ['Subespecies.estadoMarn', '=', 1]])->orWhere([['Subespecies.nombreSubespecie', 'LIKE', "%$req->consulta%"], ['Subespecies.estadoMarn', '=', 1]])->paginate(30);


        $reino_ani = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Reinos.nombreReino', '=', 'Animalia'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Animalia'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $reino_bac = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Reinos.nombreReino', '=', 'Bacteria'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Bacteria'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $reino_chro = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Reinos.nombreReino', '=', 'Chromista'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Chromista'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $reino_fun = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Reinos.nombreReino', '=', 'Fungi'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Fungi'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $reino_pla = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Reinos.nombreReino', '=', 'Plantae'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Plantae'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $reino_pro = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Reinos.nombreReino', '=', 'Protozoa'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', 'Protozoa'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $depar_ahua = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Departamento.nombreDepartamento', '=', 'AHUACHAPAN'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'AHUACHAPAN'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $depar_santa = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Departamento.nombreDepartamento', '=', 'SANTA ANA'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'SANTA ANA'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $depar_sonso = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Departamento.nombreDepartamento', '=', 'SONSONATE'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'SONSONATE'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $depar_chal = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Departamento.nombreDepartamento', '=', 'CHALATENANGO'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'CHALATENANGO'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $depar_lali = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Departamento.nombreDepartamento', '=', 'LA LIBERTAD'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'LA LIBERTAD'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $depar_ssal = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Departamento.nombreDepartamento', '=', 'SAN SALVADOR'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'SAN SALVADOR'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $depar_cusca = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Departamento.nombreDepartamento', '=', 'CUSCATLAN'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'CUSCATLAN'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $depar_cab = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Departamento.nombreDepartamento', '=', 'CABANAS'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'CABANAS'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $depar_lapaz = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Departamento.nombreDepartamento', '=', 'LA PAZ'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'LA PAZ'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $depar_sanvi = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Departamento.nombreDepartamento', '=', 'SAN VICENTE'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'SAN VICENTE'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $depar_usul = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Departamento.nombreDepartamento', '=', 'USULUTAN'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'USULUTAN'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $depar_sanmi = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Departamento.nombreDepartamento', '=', 'SAN MIGUEL'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'SAN MIGUEL'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $depar_mor = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Departamento.nombreDepartamento', '=', 'MORAZAN'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'MORAZAN'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $depar_launi = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->join('Avistamientos','Especies.idEspecie','=','Avistamientos.idEspecie')->join('Departamento','Avistamientos.codigoDepartamento','=','Departamento.codigoDepartamento')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->where([['Departamento.nombreDepartamento', '=', 'LA UNION'], ['Especies.estadoMarn', '=', 1]])->orWhere([['Departamento.nombreDepartamento', '=', 'LA UNION'], ['Subespecies.estadoMarn', '=', 1]])->get();

        $r_ani = count($reino_ani);
        $r_bac = count($reino_bac);
        $r_fun = count($reino_fun);
        $r_pro = count($reino_pro);
        $r_pla = count($reino_pla);
        $r_chro = count($reino_chro);

        $d_ahua = count($depar_ahua);
        $d_sant = count($depar_santa);
        $d_sons = count($depar_sonso);
        $d_chal = count($depar_chal);
        $d_lali = count($depar_lali);
        $d_ssal = count($depar_ssal);
        $d_cusc = count($depar_cusca);
        $d_caba = count($depar_cab);
        $d_lapa = count($depar_lapaz);
        $d_sanv = count($depar_sanvi);
        $d_usul = count($depar_usul);
        $d_sanm = count($depar_sanmi);
        $d_mora = count($depar_mor);
        $d_laun = count($depar_launi);
        $no_res = count($especie);

        $msg = 'No se encontro resultados en su busqueda';


// where([['Reinos.nombreReino', '=', $req->consulta], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.nombreReino', '=', $req->consulta], ['Subespecies.estadoMarn', '=', 1]])->get();



        
        
        //dd($especie);

        return view('publico.resulta_consulta_general', compact('msg','especie','r_ani','r_bac','r_fun','r_pro','r_pla','r_chro','d_ahua','d_sant','d_sons','d_chal','d_lali','d_ssal','d_cusc','d_caba','d_lapa','d_sanv','d_usul','d_sanm','d_mora','d_laun'));


    }


}
