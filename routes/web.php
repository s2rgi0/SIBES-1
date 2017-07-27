<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
Route::get('/', function () {
return view('busqueda');
});|

 */

Route::get('/Busqueda', 'SibesController@Busqueda');

Route::get('/buscaDivision', 'SibesController@buscaDivision');

Route::get('/buscaClase', 'SibesController@buscaClase');

Route::get('/buscaOrden', 'SibesController@buscaOrden');

Route::get('/buscaFamilia', 'SibesController@buscaFamilia');

Route::get('/buscaGenero', 'SibesController@buscaGenero');

Route::get('/buscaEspecie', 'SibesController@buscaEspecie');

Route::get('/buscaSubespecie', 'SibesController@buscaSubespecie');

Route::get('/mostrar', 'SibesController@mostrar');

Route::post('/guardar', 'SibesController@guardar');

Route::get('/nuevaDivision', 'IngresoController@nuevaDivision');

Route::post('/ingresarDivision', 'IngresoController@ingresarDivision');

Route::get('/ingr_div', 'IngresoController@ingr_div');

Route::post('ingr_div_modal', 'IngresoController@ingr_div_modal');

//rutas para agregar clase

Route::get('ingr_cla', 'IngresoController@ingr_cla');
Route::get('Busca_div_clase', 'IngresoController@Busca_div_clase');
Route::post('ingr_cla_modal', 'IngresoController@ingr_cla_modal');

// rutas para agregar orden

Route::get('ingr_ord', 'IngresoController@ingr_ord');
Route::get('Busca_div_ord', 'IngresoController@Busca_div_ord');
Route::get('Busca_cla_ord', 'IngresoController@Busca_cla_ord');
Route::post('ingr_ord_modal', 'IngresoController@ingr_ord_modal');

//rutas post para guardar familia genero especie y subespecie

Route::post('ingr_fam_modal', 'IngresoController@ingr_fam_modal');
Route::post('ingr_gen_modal', 'IngresoController@ingr_gen_modal');
Route::post('ingr_esp_modal', 'IngresoController@ingr_esp_modal');
Route::post('ingr_sub_modal', 'IngresoController@ingr_sub_modal');

//Ruta para poblar reino en popups fam gen y esp y sub especie

Route::get('ingr_fam', 'IngresoController@ingr_fam');
Route::get('ingr_gen', 'IngresoController@ingr_gen');
Route::get('ingr_esp', 'IngresoController@ingr_esp');
Route::get('ingr_sub', 'IngresoController@ingr_sub');

//rutas para buscar division

Route::get('Busca_div_fam', 'IngresoController@Busca_div_fam');
Route::get('Busca_div_gen', 'IngresoController@Busca_div_gen');
Route::get('Busca_div_esp', 'IngresoController@Busca_div_esp');
Route::get('Busca_div_sub', 'IngresoController@Busca_div_sub');

//rutas para buscar clase

Route::get('Busca_cla_fam', 'IngresoController@Busca_cla_fam');
Route::get('Busca_cla_gen', 'IngresoController@Busca_cla_gen');
Route::get('Busca_cla_esp', 'IngresoController@Busca_cla_esp');
Route::get('Busca_cla_sub', 'IngresoController@Busca_cla_sub');

// rutas para buscar orden

Route::get('Busca_ord_fam', 'IngresoController@Busca_ord_fam');
Route::get('Busca_ord_gen', 'IngresoController@Busca_ord_gen');
Route::get('Busca_ord_esp', 'IngresoController@Busca_ord_esp');
Route::get('Busca_ord_sub', 'IngresoController@Busca_ord_esp');

//rutas para buscar familia

Route::get('Busca_fam_gen', 'IngresoController@Busca_fam_gen');
Route::get('Busca_fam_esp', 'IngresoController@Busca_fam_esp');
Route::get('Busca_fam_sub', 'IngresoController@Busca_fam_sub');

// ruta para buscar genero

Route::get('Busca_gen_esp', 'IngresoController@Busca_gen_esp');
Route::get('Busca_gen_sub', 'IngresoController@Busca_gen_sub');

// ruta para buscar especie

Route::get('Busca_esp_sub', 'IngresoController@Busca_esp_sub');

//ruta guardar nombre comun

Route::post('ingr_nc', 'SibesController@ingr_nc');

Route::post('ingr_nc_sub', 'SibesController@ingr_nc_sub');

Route::get('buscaNombreComun', 'SibesController@buscaNombreComun');

Route::get('buscaNombreComun_sub', 'SibesController@buscaNombreComun_sub');

//Actualizar Especie y Sub Especie

Route::post('guardar_especie', 'SibesController@guardar_especie');
Route::post('guardar_sub_especie', 'SibesController@guardar_sub_especie');

//popular valores en modales

Route::get('pop_rei_div', 'ModalesController@pop_rei_div');
Route::get('pop_rei_cla', 'ModalesController@pop_rei_cla');
Route::get('pop_rei_ord', 'ModalesController@pop_rei_ord');
Route::get('pop_rei_fam', 'ModalesController@pop_rei_fam');
Route::get('pop_rei_gen', 'ModalesController@pop_rei_gen');
Route::get('pop_rei_esp', 'ModalesController@pop_rei_esp');
Route::get('pop_rei_sub', 'ModalesController@pop_rei_sub');

//llenar division en modales

Route::get('pop_DIV_cla', 'ModalesController@pop_DIV_cla');
Route::get('pop_DIV_ord', 'ModalesController@pop_DIV_ord');
Route::get('pop_DIV_fam', 'ModalesController@pop_DIV_fam');
Route::get('pop_DIV_gen', 'ModalesController@pop_DIV_gen');
Route::get('pop_DIV_esp', 'ModalesController@pop_DIV_esp');
Route::get('pop_DIV_sub', 'ModalesController@pop_DIV_sub');

//llenar clase en modales

Route::get('pop_CLA_ord', 'ModalesController@pop_CLA_ord');
Route::get('pop_CLA_fam', 'ModalesController@pop_CLA_fam');
Route::get('pop_CLA_gen', 'ModalesController@pop_CLA_gen');
Route::get('pop_CLA_esp', 'ModalesController@pop_CLA_esp');
Route::get('pop_CLA_sub', 'ModalesController@pop_CLA_sub');

//llenar ORDEN en MODALES

Route::get('pop_ORD_fam', 'ModalesController@pop_ORD_fam');
Route::get('pop_ORD_gen', 'ModalesController@pop_ORD_gen');
Route::get('pop_ORD_esp', 'ModalesController@pop_ORD_esp');
Route::get('pop_ORD_sub', 'ModalesController@pop_ORD_sub');

//lenar FAMILIA en modales

Route::get('pop_FAM_gen', 'ModalesController@pop_FAM_gen');
Route::get('pop_FAM_esp', 'ModalesController@pop_FAM_esp');
Route::get('pop_FAM_sub', 'ModalesController@pop_FAM_sub');

//LLENAR GENERO EN MODALES

Route::get('pop_GEN_esp', 'ModalesController@pop_GEN_esp');
Route::get('pop_GEN_sub', 'ModalesController@pop_GEN_sub');

//LLenar especie en modales

Route::get(' pop_ESP_sub', 'ModalesController@pop_ESP_sub');

//llenar valores de modales en Busqueda

Route::get('nueva_div', 'ModalesController@nueva_div');
Route::get('nueva_cla', 'ModalesController@nueva_cla');
Route::get('nueva_ord', 'ModalesController@nueva_ord');
Route::get('nueva_fam', 'ModalesController@nueva_fam');
Route::get('nueva_div', 'ModalesController@nueva_div');
Route::get('nueva_gen', 'ModalesController@nueva_gen');
Route::get('nueva_esp', 'ModalesController@nueva_esp');
Route::get('nueva_sub', 'ModalesController@nueva_sub');

//llenar busqueda con taxonomia de modales

Route::get('get_div_cla', 'ModalesController@get_div_cla');
Route::get('get_div_ord', 'ModalesController@get_div_ord');
Route::get('get_div_fam', 'ModalesController@get_div_fam');
Route::get('get_div_gen', 'ModalesController@get_div_gen');
Route::get('get_div_esp', 'ModalesController@get_div_esp');
Route::get('get_div_sub', 'ModalesController@get_div_sub');

Route::get('get_cla_ord', 'ModalesController@get_cla_ord');
Route::get('get_cla_fam', 'ModalesController@get_cla_fam');
Route::get('get_cla_gen', 'ModalesController@get_cla_gen');
Route::get('get_cla_esp', 'ModalesController@get_cla_esp');
Route::get('get_cla_sub', 'ModalesController@get_cla_sub');

Route::get('get_ord_fam', 'ModalesController@get_ord_fam');
Route::get('get_ord_gen', 'ModalesController@get_ord_gen');
Route::get('get_ord_esp', 'ModalesController@get_ord_esp');
Route::get('get_ord_sub', 'ModalesController@get_ord_sub');

Route::get('get_fam_gen', 'ModalesController@get_fam_gen');
Route::get('get_fam_esp', 'ModalesController@get_fam_esp');
Route::get('get_fam_sub', 'ModalesController@get_fam_sub');

Route::get('get_gen_esp', 'ModalesController@get_gen_esp');
Route::get('get_gen_sub', 'ModalesController@get_gen_sub');

Route::get('get_esp_sub', 'ModalesController@get_esp_sub');

/////////////////////////////////////////////////////AGREGAN TAXONOMIA A MODALEAS//////////////////////////////////

Route::get('Agrega_div_cla', 'ModalesController@Agrega_div_cla');

////////Verificar el estado MARN de la especie //////////////////////////////////////////////////////////////////

Route::get('estadoMarn_sub', 'ModalesController@estadoMarn_sub');
Route::get('estadoMarn_esp', 'ModalesController@estadoMarn_esp');

Route::post('cambia_estado_esp', 'ModalesController@cambia_estado_esp');
Route::post('cambia_estado_sub', 'ModalesController@cambia_estado_sub');

Route::get('agarra_esp', 'ModalesController@agarra_esp');
Route::get('agarra_sub', 'ModalesController@agarra_sub');

///////////////////////////////////////// GUARDAN ESPECIE Y SUBESPECIE ///////////////////////////////////////////

Route::post('SAVE_Especie', 'SibesController@SAVE_Especie');

Route::post('SAVE_Subespecie', 'SibesController@SAVE_Subespecie');

//////////////////////////////////////////LLENAN FICHA DE ESP Y SUBESP //////////////////////////////////////////

Route::get('Informacion', 'ModalesController@Informacion');
Route::get('Informacion_Sub', 'ModalesController@Informacion_Sub');

///////////////////////////////////////////////////AVISTAMIENTO///////////////LLENAN FORMULARIO//////////////////

Route::get('Avistamiento', 'AvistaController@Avistamiento');

Route::get('Avistamiento_sub', 'AvistaController@Avistamiento_sub');

Route::get('Avistamiento_sub_pag', 'AvistaController@Avistamiento_sub_pag');


Route::get('Regiones', 'AvistaController@Regiones');

Route::get('Suelos', 'AvistaController@Suelos');

Route::get('ClasedeTierra', 'AvistaController@ClasedeTierra');

Route::get('Colectores', 'AvistaController@Colectores');

Route::get('get_departamento', 'AvistaController@get_departamento');

Route::get('get_municipio', 'AvistaController@get_municipio');

Route::get('get_canton', 'AvistaController@get_canton');

/////////////////////////////////////////////////GUARDAN AVISTAMIENTO////////////////////////////////////////////

Route::post('SAVE_avista', 'AvistaController@SAVE_avista');

Route::post('SAVE_avista_sub', 'AvistaController@SAVE_avista_sub');

///////////////////////////////////////////////VEMOS LOS AVISTAMIENTOS////////////////////////////////////////////

Route::get('get_avista', 'AvistaController@get_avista');

Route::get('get_avista_SUB', 'AvistaController@get_avista_SUB');

Route::get('get_Avista_BY_ID', 'AvistaController@get_Avista_BY_ID');

Route::get('get_Avista_BY_ID_sub', 'AvistaController@get_Avista_BY_ID_sub');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('get_Colector_id', 'AvistaController@get_Colector_id');

Route::get('get_Departamento_id', 'AvistaController@get_Departamento_id');

Route::get('get_Municipio_id', 'AvistaController@get_Municipio_id');

Route::get('get_Canton_id', 'AvistaController@get_Canton_id');

Route::get('get_Suelo_id', 'AvistaController@get_Suelo_id');

Route::get('get_Tierra_id', 'AvistaController@get_Tierra_id');

Route::get('Departamentos', 'AvistaController@Departamentos');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('GET_especie', 'ModalesController@GET_especie');

Route::get('GET_subespecie', 'ModalesController@GET_subespecie');

Route::get('informacion_avis', 'ModalesController@informacion_avis');

Route::get('informacion_avis_sub', 'ModalesController@informacion_avis_sub');

Route::post('SAVE_edit', 'AvistaController@SAVE_edit');

Route::post('SAVE_edit_sub', 'AvistaController@SAVE_edit_sub');

Route::get('GET_todos_avis_ESP', 'AvistaController@GET_todos_avis_ESP');

Route::get('mapa_show', 'AvistaController@mapa_show');

Route::get('mapa_show_sub', 'AvistaController@mapa_show_sub');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//LOGIN//

Route::get('login', 'SibesController@login');

//////////////////////////              ////////////////////////////////////////

Route::get('Consulta_interna', 'SibesController@Consulta_interna');

Route::get('Consulta_x_reino', 'SibesController@Consulta_x_reino');

Route::get('Consulta_x_Division', 'SibesController@Consulta_x_Division');

Route::get('Consulta_x_Clase', 'SibesController@Consulta_x_Clase');

Route::get('Consulta_x_Orden', 'SibesController@Consulta_x_Orden');

Route::get('Consulta_x_Familia', 'SibesController@Consulta_x_Familia');

Route::get('Consulta_x_Genero', 'SibesController@Consulta_x_Genero');

Route::get('Consulta_x_Especie', 'SibesController@Consulta_x_Especie');

Route::get('Consulta_x_Subespecie', 'SibesController@Consulta_x_Subespecie');

//////////////////////////     CONSULTAS ESPECIE     //////////////////////////////

Route::get('Consulta_interna_ESP', 'SibesController@Consulta_interna_ESP');

Route::get('Consulta_x_reino_ESP', 'SibesController@Consulta_x_reino_ESP');

Route::get('Consulta_x_Division_ESP', 'SibesController@Consulta_x_Division_ESP');

Route::get('Consulta_x_Clase_ESP', 'SibesController@Consulta_x_Clase_ESP');

Route::get('Consulta_x_Orden_ESP', 'SibesController@Consulta_x_Orden_ESP');

Route::get('Consulta_x_Familia_ESP', 'SibesController@Consulta_x_Familia_ESP');

Route::get('Consulta_x_Genero_ESP', 'SibesController@Consulta_x_Genero_ESP');

Route::get('Consulta_x_Especie_ESP', 'SibesController@Consulta_x_Especie_ESP');

/////////////////////////        ENLACES DE AVISTAM       /////////////////////////////////

Route::post('ingr_enlace_esp', 'SibesController@ingr_enlace_esp');

Route::get('busca_enlace_esp', 'SibesController@busca_enlace_esp');

Route::get('Agregar_usuarios', 'SibesController@Agregar_usuarios');

Route::post('agregar_usr', 'SibesController@agregar_usr');

Route::post('agregar_usr_dos', 'SibesController@agregar_usr_dos');


Route::get('/', 'SibesController@login_usr');

Route::get('auth_usuario', 'SibesController@auth_usuario');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

////////////////////         PARA ESTADO           /////////////////

Route::get('estado_usuario', 'SibesController@estado_usuario');

Route::get('usuarios_uno', 'SibesController@usuarios_uno');

Route::post('Baja_usuar', 'SibesController@Baja_usuar');

Route::post('Roll_usuar', 'SibesController@Roll_usuar');

/////////////////////        LOGICA DE SISTEMA           //////////////////////////////

Route::get('agregar_especie', 'SibesController@agregar_especie');

Route::get('consultar_especie', 'SibesController@consultar_especie');

Route::get('incio_sibes', 'SibesController@incio_sibes');

Route::get('ayuda', 'SibesController@ayuda');


//////////////////////////////////// PUBLICO ////////////////////////////////////////////

//PUBLICO///

Route::get('SistemadeBiodiversidadsv', 'SibesController@buscarPublico');

Route::get('Busqueda_Avanzada', 'SibesController@PUBLIC_busqueda');

Route::get('Avista_sub_pub', 'AvistaController@Avista_sub_pub');

Route::get('Avista_esp_pub', 'AvistaController@Avista_esp_pub');

Route::get('Exportar_excel_esp', 'AvistaController@Exportar_excel_esp');

Route::get('Exportar_excel_sub', 'AvistaController@Exportar_excel_sub');

Route::get('Excel_especies_sub', 'AvistaController@Excel_especies_sub');

Route::get('Excel_avistamientos', 'AvistaController@Excel_avistamientos');

Route::get('Consulta_Publica','AvistaController@Consulta_Publica');

Route::get('avista_esp_publico','PublicoController@avista_esp_publico');

Route::get('avista_sub_publico','PublicoController@avista_sub_publico');


///////////////////////////// BUSQUEDAS CON FILTRO //////////////////////////////////////////


Route::get('Reino_Animal','PublicoController@Reino_Animal');

Route::get('Reino_Bacteria','PublicoController@Reino_Bacteria');

Route::get('Reino_Chromista','PublicoController@Reino_Chromista');

Route::get('Reino_Fungi','PublicoController@Reino_Fungi');

Route::get('Reino_Planta','PublicoController@Reino_Planta');

Route::get('Reino_Protozoa','PublicoController@Reino_Protozoa');

Route::get('avis_esp_excel', 'PublicoController@avis_esp_excel');

Route::get('avis_sub_excel', 'PublicoController@avis_sub_excel');

Route::get('reino_taxo', 'PublicoController@reino_taxo');

Route::get('depto_taxo', 'PublicoController@depto_taxo');


//////////////////////////////////// X DEPARTAMENTO //////////////////////////////////////


Route::get('Departamento_Ahuachapan','PublicoController@Departamento_Ahuachapan');

Route::get('Departamento_SantaAna','PublicoController@Departamento_SantaAna');

Route::get('Departamento_Sonsonate','PublicoController@Departamento_Sonsonate');

Route::get('Departamento_Chalatenango','PublicoController@Departamento_Chalatenango');

Route::get('Departamento_LaLibertad','PublicoController@Departamento_LaLibertad');

Route::get('Departamento_SanSalvador','PublicoController@Departamento_SanSalvador');

Route::get('Departamento_Cuscatlan','PublicoController@Departamento_Cuscatlan');

Route::get('Departamento_Cabañas','PublicoController@Departamento_Cabañas');

Route::get('Departamento_LaPaz','PublicoController@Departamento_LaPaz');

Route::get('Departamento_SanVicente','PublicoController@Departamento_SanVicente');

Route::get('Departamento_Usulutan','PublicoController@Departamento_Usulutan');

Route::get('Departamento_SanMiguel','PublicoController@Departamento_SanMiguel');

Route::get('Departamento_LaUnion','PublicoController@Departamento_LaUnion');

Route::get('Departamento_Morazan','PublicoController@Departamento_Morazan');

Route::get('Consulta_General','PublicoController@Consulta_General');

Route::get('BUSC_DESC','PublicoController@BUSC_DESC');

