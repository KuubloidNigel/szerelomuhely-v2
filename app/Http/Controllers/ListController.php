<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Munkalap; 
use Illuminate\Validation\Rule;   

class ListController extends Controller
{
    public function lista(Request $request) 
        {
        $search = $request->input('search');
        $showZart = $request->input('zart', false);

        $munkalapok= Munkalap::query()
            ->when($search, function ($query, $search) {
                $query->where('id', 'like', "%{$search}%");
            })        ->when($showZart, function ($query) {
                $query->where('zart', 1);
            })
            ->orderBy('created_at', 'desc')->get();

        return view('munkafelvevo.munkalaplista', compact('munkalapok', 'search','showZart'));  
    }


    public function modosit(Request $request){
        $id = $request->id;

        $munkalap = Munkalap::where('id', '=', $id)->get(['szerelo_azonosito', 'lezart', 'osszar', 'fizetesi_mod']);

        return view('munkafelvevo.munkalapModositas', compact('munkalap'));
    }

    public function felvetel(Request $request){
        return view('munkafelvevo.munkalapFelvetel');
    }


    public function hozzaadas(Request $request){
        $request->validate([
            'felvevoNev' => ['required|string',Rule::exists('munkafelvevos', 'nev')],
            'szereloAzonosito' => ['required|string|size:6',Rule::exists('szerelos', 'azonosito')],
            ''
        ]);
    }
}
