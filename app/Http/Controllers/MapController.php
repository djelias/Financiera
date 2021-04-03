<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GMaps;
use GuzzleHttp\Client;

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

    public function bold(Request $taxon, $geo)
    {
        $taxonomia = $taxon;
        $geografia = $geo;
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://www.boldsystems.org/index.php/API_Public/combined?taxon='.$taxonomia.'&geo='.$geografia.'&format=json');
        $response = json_decode((string) $request->getBody());

        return view('control/bold')->with('response',$response);
    }

}
