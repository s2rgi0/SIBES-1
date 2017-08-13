<?php

namespace App\Http\Controllers;

use App\ApendiceCites;
use App\CategoriaMarn;
use App\CategoriaUICN;
use App\Clase;
use App\ClasesDeTipo;
use App\Division;
use App\Especie;
use App\Familia;
use App\Genero;
use App\Nombrecomun;
use App\Orden;
use App\ProcedenciaEspecie;
use App\publicacionPDF;
use App\Reino;
use App\Subespecie;
use App\Tipo;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Response;
use Validator;
use File;
use Carbon\Carbon;

class SibesController extends Controller
{
    //
    public function Busqueda()
    {
        $reino = Reino::all();
        return view('busqueda', compact('reino'));
    }

    public function buscaDivision(Request $req)
    {

        $data = Division::select('nombreDivision', 'idDivision')->where('idReino', $req->id)->take(0)->get();

        return response()->json($data);

    }

    public function buscaClase(Request $req)
    {

        $data1 = Clase::select('nombreClase', 'idClase')->where('idDivision', $req->id)->take(0)->get();

        return response()->json($data1);

    }

    public function buscaOrden(Request $req)
    {

        $data2 = Orden::select('nombreOrden', 'idOrden')->where('idClase', $req->id)->take(0)->get();

        return response()->json($data2);

    }

    public function buscaFamilia(Request $req)
    {

        $data3 = Familia::select('nombreFamilia', 'idFamilia')->where('idOrden', $req->id)->take(0)->get();

        return response()->json($data3);

    }

    public function buscaGenero(Request $req)
    {
        $data4 = Genero::select('nombreGenero', 'idGenero')->where('idFamilia', $req->id)->take(0)->get();

        return response()->json($data4);
    }

    public function buscaEspecie(Request $req)
    {
        $data5 = Especie::select('nombreEspecie', 'idEspecie')->where('idGenero', $req->id)->get();

        return response()->json($data5);
    }

    public function buscaSubespecie(Request $req)
    {
        $data = Subespecie::select('nombreSubespecie', 'idSubespecie')->where('idEspecie', $req->id)->get();

        return response()->json($data);

    }

    

    //AQUI GUARDA ESPECIE Y SUBESPECIE

    public function SAVE_Especie(Request $req)
    {

        //dd($req->all());

        $validator = Validator::make(Input::all(), [

            'clase_tipo'    => 'required',
            'append_cites'  => 'required',
            'cat_marn'      => 'required',
            'cat_uicn'      => 'required',
            'proce_especie' => 'required',
            'nom_ingles'    => 'nullable|regex:/^[\pL\s\-]+$/u',
            'file'          => 'nullable|max:2048',

        ], [

            'clase_tipo.required'    => 'Elija una Clase de Tipo',
            'append_cites.required'  => 'Elija un Apendice CITES',
            'cat_marn.required'      => 'Elija una Categoria MARN',
            'cat_uicn.required'      => 'Elija una Categoria UICN',
            'proce_especie.required' => 'Elija una Procedencia de Especie',
            'nom_ingles.alpha'       => 'El campo solo permite caracteres alfabeticos',
            'file.max'          => 'demasiado grande',

        ]);

        //dd($validator->errors());

        if ($validator->passes()) {

            $especie    = Especie::find($req->id_especie);
            $cad_imagen = '';

            if (Input::hasFile('file')) {

                $file           = Input::file('file');
                $nombre_especie = $req->n_esp;
                $id_especie     = $req->id_especie;
                $extension      = Input::file('file')->getClientOriginalExtension();
                $filename       = $file->getClientOriginalName();
                $bytes = File::size($file);

                //$size = getimagesize($filename);

                //$size           = Input::file('file')->getSize();

                //$bytes          = Input::file('file')->getClientSize();
                //dd($size);

                if( $extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'bmp' || $extension == 'gif' ){

                    $cad_imagen     = $id_especie . '_' . $nombre_especie . '.' . $extension;
                    $file->move('imagen_especie/' . $nombre_especie, $cad_imagen);
                    $especie->fotografiaEspecie = $cad_imagen;

                }else{


                    return response::json(['success' => false, 'errors' => 'no es una imagen']);
                }              


            }

            $especie->idGenero                 = $req->id_genero;
            $especie->descripcionDelEjemplar   = $req->descripcion_ejemplar;
            $especie->nombreEnIngles           = $req->nom_ingles;
            $especie->estadoMarn               = 1;
            $especie->idClaseDeTipo            = $req->clase_tipo;
            $especie->idProcedenciaDeLaEspecie = $req->proce_especie;
            $especie->idCategoriaMARN          = $req->cat_marn;
            $especie->idCategoriaUICN          = $req->cat_uicn;
            $especie->idApendiceCITES          = $req->append_cites;
            $especie->save();

        } else {

            if ($req->ajax()) {

                return response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            } else {

                return redirect('/Busqueda')->withErrors($validator, 'fdivision')->withInput($req->flash());
            }

        }

    }

    public function SAVE_Subespecie(Request $req)
    {

        //dd($req->all());

        $validator = Validator::make(Input::all(), [

            'clase_tipo'    => 'required',
            'append_cites'  => 'required',
            'cat_marn'      => 'required',
            'cat_uicn'      => 'required',
            'proce_especie' => 'required',
            'nom_ingles'    => 'nullable|regex:/^[\pL\s\-]+$/u',


        ], [

            'clase_tipo.required'    => 'Elija una Clase de Tipo',
            'append_cites.required'  => 'Elija una Apendice CITES',
            'cat_marn.required'      => 'Elija una Categoria MARN',
            'cat_uicn.required'      => 'Elija una Categoria UICN',
            'proce_especie.required' => 'Elija una Prodedencia de Especie',
            'nom_ingles.regex'       => 'El campo solo permite caracteres alfabeticos',
        ]);

        if ($validator->passes()) {

            $especie    = Subespecie::find($req->id_subespe);
            $cad_imagen = '';

            if (Input::hasFile('file')) {

                $file           = Input::file('file');
                $nombre_especie = $req->n_esp;
                $nombre_subesp  = $req->n_sub;
                $id_especie     = $req->id_subespe;
                $extension      = Input::file('file')->getClientOriginalExtension();
                //$bytes          = Input::file('file')->getClientSize();
                $size           = Input::file('file')->getSize();
                $bytes = File::size($file);

                $filename       = $file->getClientOriginalName();
                
                //dd($bytes);


                if( $extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'bmp' || $extension == 'gif' ){

                    $cad_imagen     = $id_especie . '_' . $nombre_subesp . '.' . $extension;
                    $filename       = $file->getClientOriginalName();
                    $file->move('imagen_especie/' . $nombre_especie . '/' . $nombre_subesp, $cad_imagen);
                    $especie->fotografiaEspecie = $cad_imagen;

                }else{


                    return response::json(['success' => false, 'errors' => 'no es una imagen']);
                }                

            }

            $especie->idEspecie                = $req->id_especie;
            $especie->descripcionDelEjemplar   = $req->descripcion_ejemplar;
            $especie->nombreEnIngles           = $req->nom_ingles;
            $especie->estadoMarn               = 1;
            $especie->idClaseDeTipo            = $req->clase_tipo;
            $especie->idProcedenciaDeLaEspecie = $req->proce_especie;
            $especie->idCategoriaMARN          = $req->cat_marn;
            $especie->idCategoriaUICN          = $req->cat_uicn;
            $especie->idApendiceCITES          = $req->append_cites;
            $especie->save();

        } else {

            if ($req->ajax()) {

                return response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            } else {

                return redirect('/Busqueda')->withErrors($validator, 'fdivision')->withInput($req->flash());
            }

        }

    }

    public function ingr_nc(Request $req)
    {

        if ($req->ajax()) {

            $n = new Nombrecomun;

            $n->idEspecie   = $req->id;
            $n->nombreComun = $req->nombre;

            $n->save();

            return response(['msg' => 'por fin ingresamos']);
        } else {
            return response(['msg' => 'no es ajax']);
        }

    }

    public function ingr_nc_sub(Request $req)
    {

        if ($req->ajax()) {

            $n = new Nombrecomun;

            $n->idSubespecie = $req->id;
            $n->nombreComun  = $req->nombre;

            $n->save();

            return response(['msg' => 'por fin ingresamos']);
        } else {
            return response(['msg' => 'no es ajax']);
        }

    }

    public function buscaNombreComun(Request $req)
    {
        $data = Nombrecomun::select('nombreComun')->where('idEspecie', $req->id)->get();

        return response()->json($data);

    }

    public function buscaNombreComun_sub(Request $req)
    {
        $data = Nombrecomun::select('nombreComun')->where('idSubespecie', $req->id)->get();

        return response()->json($data);

    }

//////////////////////////////////      PUBLICO         ///////////////////////////////////////    

    public function buscarPublico()
    {

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


        return view('publico.SIBES' ,compact('r_ani','r_bac','r_fun','r_pro','r_pla','r_chro','d_ahua','d_sant','d_sons','d_chal','d_lali','d_ssal','d_cusc','d_caba','d_lapa','d_sanv','d_usul','d_sanm','d_mora','d_laun') );
    }
    public function login()
    {
        return view('login');
    }

     public function PUBLIC_busqueda(){

        $reino = Reino::all();

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

        $no_especie = 0;

         $especie = Reino::where('idReino', 1)->get();

        return view('publico.Busqueda_avanzada', compact('especie','no_especie','reino','r_ani','r_bac','r_fun','r_pro','r_pla','r_chro','d_ahua','d_sant','d_sons','d_chal','d_lali','d_ssal','d_cusc','d_caba','d_lapa','d_sanv','d_usul','d_sanm','d_mora','d_laun'));

    }

////////////////////////////////////////////////////////////////////////////////////////////////////


    public function Consulta_interna_ESP()
    {

        $reino = Reino::all();
        return view('opciones.Consulta_esp', compact('reino'));

    }

    ///////////////////////////////////////////CONSULTAS//////////////////////////////////////////////////

   

    public function Consulta_x_Subespecie(Request $req)
    {

        $especie = Subespecie::join('Especies', 'Subespecies.idEspecie', '=', 'Especies.idEspecie')->join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie', 'Subespecies.nombreSubespecie', 'Especies.idEspecie', 'Subespecies.idSubespecie')->where([['Subespecies.idSubespecie', $req->id],[ 'Subespecies.estadoMarn', '=', 1 ]])->get();

        return response()->json($especie);

        //dd($req->id);

    }

    ///////////////////////////      CONSULTAS ESPECIE      //////////////////////////////

    public function Consulta_x_reino_ESP(Request $req)
    {

        $especie = Reino::join('Divisions', 'Reinos.idReino', '=', 'Divisions.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie', 'Especies.idEspecie', 'Subespecies.nombreSubespecie', 'Subespecies.idSubespecie')->where([['Reinos.idReino', '=', $req->id], ['Especies.estadoMarn', '=', 1]])->orWhere([['Reinos.idReino', '=', $req->id], ['Subespecies.estadoMarn', '=', 1]])->get();

        return response()->json($especie);

        //dd($req->id);

    }

    public function Consulta_x_Division_ESP(Request $req)
    {

        $especie = Division::join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->join('Clases', 'Divisions.idDivision', '=', 'Clases.idDivision')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie', 'Especies.idEspecie', 'Subespecies.nombreSubespecie', 'Subespecies.idSubespecie')->where([['Divisions.idDivision', $req->id], ['Especies.estadoMarn', '=', 1]])->orWhere([['Divisions.idDivision', '=', $req->id], ['Subespecies.estadoMarn', '=', 1]])->get();

        return response()->json($especie);

        //dd($req->id);

    }

    public function Consulta_x_Clase_ESP(Request $req)
    {

        $especie = Clase::join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->join('Ordens', 'Clases.idClase', '=', 'Ordens.idClase')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie', 'Especies.idEspecie', 'Subespecies.nombreSubespecie', 'Subespecies.idSubespecie'
        )->where([['Clases.idClase', $req->id], ['Especies.estadoMarn', '=', 1]])->orWhere([['Clases.idClase', '=', $req->id], ['Subespecies.estadoMarn', '=', 1]])->get();

        return response()->json($especie);

        //dd($req->id);

    }

    public function Consulta_x_Orden_ESP(Request $req)
    {

        $especie = Orden::join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->join('Familias', 'Ordens.idOrden', '=', 'Familias.idOrden')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie', 'Especies.idEspecie', 'Subespecies.nombreSubespecie', 'Subespecies.idSubespecie')->where([['Ordens.idOrden', $req->id], ['Especies.estadoMarn', '=', 1]])->orWhere([['Ordens.idOrden','=', $req->id], ['Subespecies.estadoMarn', '=', 1]])->get();

        return response()->json($especie);

    }

    public function Consulta_x_Familia_ESP(Request $req)
    {

        $especie = Familia::join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->join('Generos', 'Familias.idFamilia', '=', 'Generos.idFamilia')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie', 'Especies.idEspecie', 'Subespecies.nombreSubespecie', 'Subespecies.idSubespecie')->where([['Familias.idFamilia', $req->id], ['Especies.estadoMarn', '=', 1]])->orWhere([['Familias.idFamilia', '=', $req->id], ['Subespecies.estadoMarn', '=', 1]])->get();

        return response()->json($especie);

        //dd($req->id);

    }

    public function Consulta_x_Genero_ESP(Request $req)
    {

        $especie = Genero::join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->join('Especies', 'Generos.idGenero', '=', 'Especies.idGenero')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie', 'Especies.idEspecie', 'Subespecies.nombreSubespecie', 'Subespecies.idSubespecie')->where([['Generos.idGenero', $req->id], ['Especies.estadoMarn', '=', 1]])->orWhere([['Generos.idGenero', '=', $req->id], ['Subespecies.estadoMarn', '=', 1]])->get();

        return response()->json($especie);
        //dd($req->id);

    }

    public function Consulta_x_Especie_ESP(Request $req)
    {
        $especie = Especie::join('Generos', 'Especies.idGenero', '=', 'Generos.idGenero')->join('Familias', 'Generos.idFamilia', '=', 'Familias.idFamilia')->join('Ordens', 'Familias.idOrden', '=', 'Ordens.idOrden')->join('Clases', 'Ordens.idClase', '=', 'Clases.idClase')->join('Divisions', 'Clases.idDivision', '=', 'Divisions.idDivision')->join('Reinos', 'Divisions.idReino', '=', 'Reinos.idReino')->leftJoin('Subespecies', 'Especies.idEspecie', '=', 'Subespecies.idEspecie')->select('Reinos.nombreReino', 'Divisions.nombreDivision', 'Clases.nombreClase', 'Ordens.nombreOrden', 'Familias.nombreFamilia', 'Generos.nombreGenero', 'Especies.nombreEspecie', 'Especies.idEspecie', 'Subespecies.nombreSubespecie', 'Subespecies.idSubespecie')->where([['Especies.idEspecie', $req->id], ['Especies.estadoMarn', '=', 1]])->orWhere([['Especies.idEspecie', '=', $req->id], ['Subespecies.estadoMarn', '=', 1]])->get();

        return response()->json($especie);

        //dd($req->id);

    }

  

    public function Agregar_usuarios(Request $req)
    {

        $tipo = Tipo::all();

        $usuario = Usuario::select('idUsuario', 'nombreUsuario', 'idTipo')->where('idUsuario', $req->id_usuario)->get();

        return view('opciones.agregarUsuario', compact('tipo', 'usuario'));

    }

    public function agregar_usr(Request $req)
    {
        //dd($req->all());

        $usuario = Usuario::select('idUsuario', 'nombreUsuario', 'idTipo')->where('idUsuario', $req->id_usuario)->get();

        //dd($usuario[0]->idUsuario);

        $validator = Validator::make($req->all(), [

            'textTipoU'  => 'required',
            'textCodU'   => 'required|regex:/^[\pL\s\-]+$/u',
            'textNomdU'  => 'required',
            'texContraU' => 'required',

        ], [
            'textTipoU.required'  => 'El campo tipo de usuario es requerido',
            'textCodU.required'   => 'Ingrese el nombre del usuario',
            'textCodU.regex'      => 'Solo se permiten caracteres alfabeticos',

            'textCodU.min'        => 'El campo requiere al menos 6 digitos',
            'textCodU.size'        => 'El campo requiere al menos 6 digitos',
            'textCodU.alpha_num'  => 'El campo requiere caracteres alfanumericos',
            'textNomdU.required'  => 'El campo nombre de usuario  es requerido',
            'texContraU.required' => 'El campo contraseña de usuario es requerido',

        ]);

        //dd($validator->errors());
        //dd($req->flash());

        if ($validator->passes()) {

            /*

            $usr = new Usuario();

            $usr->idTipo            = $req->textTipoU;
            $usr->codigoUsuario     = $req->textCodU;
            $usr->nombreUsuario     = $req->textNomdU;
            $usr->contrasenaUsuario = $req->texContraU;
            $usr->estadoUsuario     = 1;

            $usr->save();

        //dd($usr);

            $usuario = Usuario::select('nombreUsuario', 'idTipo', 'idUsuario')->where('idUsuario', $usr->idUsuario)->get();
        //dd($usuario);
            return view('inicio_SIBES', compact('usuario'));*/
            
        }else{

            if ($req->ajax()) {

                return response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            } else {

                //return redirect('/Busqueda')->withErrors($validator, 'fdivision')->withInput($req->flash());
                return redirect('/Agregar_usuarios' )->withErrors($validator, 'usuarios')->withInput($req->flash());
            }         

        }

    }

    public function agregar_usr_dos( Request $req )
    {   
        //dd($req->all());
        //dd(date('Y-m-d H:m:s'));

        $usr = new Usuario();

            $usr->idTipo            = $req->textTipoU;
            $usr->nomComp           = $req->textCodU;
            $usr->nombreUsuario     = $req->textNomdU;
            $usr->contrasenaUsuario =  Hash::make($req->texContraU);
            $usr->estadoUsuario     = 1;
            $datetime = Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
            
            $usr->created_at  =  $datetime;  
            $usr->updated_at  =  $datetime;  

            $usr->save();

        //dd($usr);
             $tipo = Tipo::all();

            $usuario = Usuario::select('nombreUsuario', 'idTipo', 'idUsuario')->where('idUsuario', $req->id_usuario)->get();
        //dd($usuario);
            return view('opciones.agregarUsuario', compact('usuario','tipo'));
            //return redirect('/Agregar_usuarios')->with('usuario','tipo');
            
    }

    public function login_usr(Request $req)
    {

        $msg = '';

        return view('login', compact('msg'));

    }

    /////////////////////////////////////////////////////////////////////////////////////////////--------------*

    public function auth_usuario(Request $req)
    {
        /*
        $usuario = Usuario::select('idTipo', 'nombreUsuario', 'idUsuario')->where([['nombreUsuario', $req->nombre_usr], ['contrasenaUsuario', $req->intento_usr], ['estadoUsuario', 1]])->get();

        $usr = count($usuario);

        if ($usr < 1) {
            $msg = 'verifique su nombre y contraseña';

            return view('login', compact('msg'));

        } else {
            return view('inicio_SIBES', compact('usuario'));
        }*/

 
        $usuario = Usuario::select('idTipo', 'nombreUsuario', 'idUsuario','contrasenaUsuario')->where([['nombreUsuario', $req->nombre_usr], ['estadoUsuario', 1]])->get();

        //'contrasenaUsuario', $req->intento_usr

        //dd($usuario[0]->contrasenaUsuario);

        //dd(count($usuario));

        if( count($usuario) > 0 ){

            $Contra_Hash = $usuario[0]->contrasenaUsuario;

            if( Hash::check( $req->intento_usr , $Contra_Hash) ){

            return view('inicio_SIBES', compact('usuario'));

            }else{

            $msg = 'verifique su nombre y contraseña';

            return view('login', compact('msg'));
            }


        }else{
            
            $msg = 'verifique su nombre y contraseña';

            return view('login', compact('msg'));

        }     

    }

    public function estado_usuario(Request $req)
    {

        $users = Usuario::join('Tipo', 'Usuario.idTipo', '=', 'Tipo.idTipo')->select('Usuario.nombreUsuario', 'Usuario.nomComp', 'Usuario.idUsuario', 'Tipo.tipoUsuario')->where('estadoUsuario', 1)->get();

        $usuario = Usuario::select('idUsuario', 'nombreUsuario', 'idTipo')->where('idUsuario', $req->id_usuario)->get();

        $tipo = Tipo::all();

        return view('opciones.estado', compact('users', 'usuario', 'tipo'));

    }

    public function usuarios_uno()
    {

        $data = Usuario::join('Tipo', 'Usuario.idTipo', '=', 'Tipo.idTipo')->select('Usuario.nombreUsuario', 'Usuario.nomComp', 'Usuario.idUsuario', 'Tipo.tipoUsuario')->where('estadoUsuario', 1)->get();

        return response()->json($data);

    }

    public function Baja_usuar(Request $req)
    {
        //dd($req->id);
        $usar = Usuario::find($req->id);

        $usar->estadoUsuario = 0;

        $usar->save();

    }

    public function Roll_usuar(Request $req)
    {
        //dd($req->id);
        $usar = Usuario::find($req->id);

        $usar->idTipo = $req->rol;

        $usar->save();

        //dd($usar);

    }

    ////////////////////////           LOGICA DE SISTEMA             //////////////////////////////

    public function agregar_especie(Request $req)
    {
        //dd($req->all());
        $usuario = Usuario::select('idUsuario', 'nombreUsuario', 'idTipo')->where('idUsuario', $req->id_usuario)->get();
        //dd($usuario);
        $reino = Reino::all();

        return view('Busqueda', compact('usuario', 'reino'));

    }

    public function consultar_especie(Request $req)
    {
        //dd($req->all());
        $usuario = Usuario::select('idUsuario', 'nombreUsuario', 'idTipo')->where('idUsuario', $req->id_usuario)->get();
        //dd($usuario);
        $reino = Reino::all();

        return view('opciones.Consulta_esp', compact('usuario', 'reino'));

    }

    public function incio_sibes(Request $req)
    {

        $usuario = Usuario::select('idUsuario', 'nombreUsuario', 'idTipo')->where('idUsuario', $req->id_usuario)->get();

        return view('inicio_SIBES', compact('usuario'));

    }
    public function ayuda(Request $req)
    {

        $usuario = Usuario::select('idUsuario', 'nombreUsuario', 'idTipo')->where('idUsuario', $req->id_usuario)->get();

        return view('pdf', compact('usuario'));

    }

   

}
