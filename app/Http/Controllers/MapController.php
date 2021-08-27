<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GMaps;
use App\User;
use App\Dominio;
use App\Clase;
use App\Coleccion;
use App\Genero;
use App\Especie;
use App\Especimen;
use App\Filum;
use App\Familia;
use App\EspecieAmenazada;
use App\Departamento;
use App\Zona;
use App\TipoInvestigacion;
use App\Taxonomia;
use App\Secuencia;
use App\Riesgo;
use App\Role;
use App\Reino;
use App\Orden;
use App\Municipio;
use App\Investigacion;
use GuzzleHttp\Client;
use Spatie\Activitylog\Models\Activity;

class MapController extends Controller
{
    public function index()
    {

        $config['center'] = '13.681872879287369, -88.99022359507697';
        $config['zoom'] = '9';
        $config['map_height'] = '500px';
        $config['scrollwheel'] = true;
        GMaps::initialize($config);

        $marker['position'] = '13.715228575719605, -89.21544332898092';
        $marker['infowindow_content'] = 'San Salvador';
        GMaps::add_marker($marker);
        $marker['position'] = '13.719316108332023, -89.20301969037855';
        $marker['infowindow_content'] = 'UES';
        GMaps::add_marker($marker);

        $map = GMaps::create_map();

        return view('control/map')->with('map',$map);
    
        
        /*********** Marker Setup 
        $marker = array();
        $marker['draggable'] = true;
        //Marker event dragend
        $marker['ondragend'] = '
        iw_'. $this->gmap->map_name .'.close();
        reverseGeocode(event.latLng, function(status, result, mark){
            if(status == 200){
                iw_'. $this->gmap->map_name .'.setContent(result);
                iw_'. $this->gmap->map_name .'.open('. $this->gmap->map_name .', mark);
            }
        }, this);
        ';
        $this->gmap->add_marker($marker);

        $map = $this->gmap->create_map(); // This object will render javascript files and map view; you can call JS by $map['js'] and map view by $map['html']

        return view('map', ['map' => $map]);
        */
    }

    public function consulta()
    {
        return view('control/consulta');
    }

    public function bold(Request $request, $taxon, $geo)
    {
        $taxonomia = $taxon;
        $geografia = $geo;
        $url = "http://www.boldsystems.org/index.php/API_Public/combined?taxon=vulpes vulpes&geo=Canada&format=json";
        $client = new \GuzzleHttp\Client();
        //$request = $client->get('http://www.boldsystems.org/index.php/API_Public/combined?taxon='.$taxon.'&geo='.$geo.'&format=json');
        $request = $client->get($url);
        $responses = json_decode((string) $request->getBody());
        $src = $responses->bold_records->records;

        //foreach ($src as $key => $value) {
          //  $otra = $value->collection_event->coordinates->lat;
        //}


        $config['center'] = '13.681872879287369, -88.99022359507697';
        $config['zoom'] = '5';
        $config['map_height'] = '500px';
        $config['scrollwheel'] = true;
        GMaps::initialize($config);

        return view('control/bold')->with('src',$src);
    }

    public function EspecimenUbicacion(Request $request,$id)
    {

        $config['center'] = '13.681872879287369, -88.99022359507697';
        $config['zoom'] = '9';
        $config['map_height'] = '500px';
        $config['scrollwheel'] = true;
        GMaps::initialize($config);

        $marker['position'] = '13.715228575719605, -89.21544332898092';
        $marker['infowindow_content'] = 'San Salvador';
        GMaps::add_marker($marker);
        $marker['position'] = '13.719316108332023, -89.20301969037855';
        $marker['infowindow_content'] = 'UES';
        GMaps::add_marker($marker);

        $map = GMaps::create_map();

        return view('control/map')->with('map',$map);
    
        
        /*********** Marker Setup 
        $marker = array();
        $marker['draggable'] = true;
        //Marker event dragend
        $marker['ondragend'] = '
        iw_'. $this->gmap->map_name .'.close();
        reverseGeocode(event.latLng, function(status, result, mark){
            if(status == 200){
                iw_'. $this->gmap->map_name .'.setContent(result);
                iw_'. $this->gmap->map_name .'.open('. $this->gmap->map_name .', mark);
            }
        }, this);
        ';
        $this->gmap->add_marker($marker);

        $map = $this->gmap->create_map(); // This object will render javascript files and map view; you can call JS by $map['js'] and map view by $map['html']

        return view('map', ['map' => $map]);
        */
    }

    public function Bitacoras()
    {
        //$activity = Activity::all();
        $activitys = Activity::all();
        $users = User::all();

        foreach ($activitys as $key => $value) {
            if ($value->resgistroModificado == null) {
                $registros = $value->subject_type;
                $registro = strval($value->subject_type);
                switch ($registro) {
                case ('App\Dominio'):
                    $val = Dominio::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->nombreDominio;
                    $activity2->save();
                    break;

                case ('App\Clase'):
                    $val = Clase::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->nombreClase;
                    $activity2->save();
                    break;

                case ('App\Coleccion'):
                    $val = Coleccion::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->nombreColeccion;
                    $activity2->save();
                    break;
                
                case ('App\Departamento'):
                    $val = Departamento::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->nombreDepto;
                    $activity2->save();
                    break;

                case ('App\Especieamenazada'):
                    $val = EspecieAmenazada::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->nombreDepto;
                    $activity2->save();
                    break;

                case ('App\Familia'):
                    $val = Familia::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->nombreFamilia;
                    $activity2->save();
                    break;

                case ('App\Especie'):
                    $val = Especie::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->nombreEspecie;
                    $activity2->save();
                    break;

                case ('App\Especimen'):
                    $val = Especimen::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->codigoEspecimen;
                    $activity2->save();
                    break;

                    case ('App\Filum'):
                    $val = Filum::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->nombreFilum;
                    $activity2->save();
                    break;

                case ('App\Genero'):
                    $val = Genero::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->nombreGenero;
                    $activity2->save();
                    break;

                case ('App\Investigacion'):
                    $val = Investigacion::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->nombreInv;
                    $activity2->save();
                    break;

                case ('App\Municipio'):
                    $val = Municipio::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->nombreMunicipio;
                    $activity2->save();
                    break;

                case ('App\Orden'):
                    $val = Orden::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->nombreOrden;
                    $activity2->save();
                    break;

                case ('App\Reino'):
                    $val = Reino::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->nombreReino;
                    $activity2->save();
                    break;

                case ('App\genero'):
                    $val = Genero::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->nombreGenero;
                    $activity2->save();
                    break;

                case ('App\Riesgo'):
                    $val = Riesgo::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->catRiesgo;
                    $activity2->save();
                    break;

                case ('App\Role'):
                    $val = Role::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->name;
                    $activity2->save();
                    break;

                case ('App\Secuencia'):
                    $val = Secuencia::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->secuenciaObtenida;
                    $activity2->save();
                    break;

                case ('App\Taxonomia'):
                    $val = Taxonomia::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->nombreComun;
                    $activity2->save();
                    break;

                case ('App\TipoInvestigacion'):
                    $val = TipoInvestigacion::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->nombreTipo;
                    $activity2->save();
                    break;

                case ('App\User'):
                    $val = User::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->email;
                    $activity2->save();
                    break;

                case ('App\Zona'):
                    $val = Zona::find($value->subject_id);
                    $activity2 = Activity::find($value->id);
                    $activity2->registroModificado = $val->nombreZona;
                    $activity2->save();
                    break;


                default:
                    # code...
                    break;
                }
            }
            
        }

        $activity = Activity::orderBy('id','DESC')->paginate(10);

        return view('control/bitacoras')->with('activity',$activity)->with('users',$users)->with('registro',$registro);
    }

    public function publicaciones(){
        
    }

}
