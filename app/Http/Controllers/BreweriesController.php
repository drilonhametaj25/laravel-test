<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BreweriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request){
        $token = $request->get('token');

        return view('pages.breweries');
    }

    public function getData(Request $request){

        $per_page = $request->input('length');
        $start = $request->input('start');
        $search = $request-> input('search');
        $response = Http::get('https://api.openbrewerydb.org/v1/breweries?page='.$start.'&per_page='.$per_page.'&query='.$search);
        $breweries = $response->json();

        $response = Http::get('https://api.openbrewerydb.org/v1/breweries/meta');
        $metadata = $response->json();

        return response()->json(['status' => 'success','message' => 'Here your data', 'data' => $breweries, 'total' => $metadata['total'], 'recordsFiltered' => $metadata['total'], 'recordsTotal' => $metadata['total']]);
    }
}
