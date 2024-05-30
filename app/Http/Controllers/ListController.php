<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Munkalap; 
use App\Models\Gepjarmu;
use App\Models\Munkafelvevo;
use App\Models\Tulajdonos;
use Illuminate\Support\Facades\Auth;


class ListController extends Controller
{
    public function lista(Request $request){
        $search = $request->input('search');
        $showZart = $request->input('zarte', false);

        $munkalapok= Munkalap::query()
            ->when($search, function ($query, $search) {
                $query->where('szerelo_azonosito', 'like', "%{$search}%");
            })        ->when($showZart, function ($query) {
                $query->where('lezart', 1);
            }) 
            ->orderBy('datum', 'desc')->get();

        return view('munkafelvevo.munkalaplista', compact('munkalapok', 'search','showZart'));  
    }


    public function modosit(Request $request){
        $id = $request->id;

        $munkalap = Munkalap::findOrFail($id);

        $munkalap = Munkalap::where('id', $id)->first(['id','munkafelvevo_azonosito', 'szerelo_azonosito', 'gepjarmu_rendszam', 'lezart', 'osszar', 'fizetesi_mod']);

        $gepjarmu = Gepjarmu::where('rendszam', $munkalap->gepjarmu_rendszam)->first(['gyartmany', 'tipus', 'tulaj_id']);

        $tulaj = Tulajdonos::where('id', $gepjarmu->tulaj_id)->first(['nev', 'cim']);

        return view('munkafelvevo.munkalapModositas', compact('munkalap', 'gepjarmu', 'tulaj'));
    
    }

    public function felvetel(Request $request){
        return view('munkafelvevo.munkalapFelvetel');
    }


    public function hozzaadas(Request $request){
        $request->validate([
            'felvevoAzonosito' => ['required', 'string'],
            'szereloAzonosito'=> ['required', 'string', 'min:6', 'max:6'],
            'jarmuRendszam' => 'required|string|min:7|max:7',
            'jarmuGyartmany' => 'required|string|max:30',
            'jarmuTipus' => 'required|string',
            'jarmuTulajNev' => 'required|string',
            'jarmuTulajCim' => 'required|string',
            'fizetesiMod' => 'required'
        ]);

        if(Tulajdonos::where('cim', $request->jarmuTulajCim)->count() < 1){
            Tulajdonos::create([
                'nev' => $request->jarmuTulajNev,
                'cim' => $request->jarmuTulajCim
            ]);
        }

        $tulajID = Tulajdonos::where('cim', $request->jarmuTulajCim)->get('id')->first();

        Gepjarmu::create([
            'rendszam' => $request->jarmuRendszam,
            'gyartmany' => $request->jarmuGyartmany,
            'tipus' => $request->jarmuTipus,
            "tulaj_id" =>$tulajID["id"]
        ]);

        Munkalap::query()->insert([
            "szerelo_azonosito" => $request->szereloAzonosito,
            "datum" => now()->format('Y-m-d'),
            "munkafelvevo_azonosito" => $request->felvevoAzonosito,
            "gepjarmu_rendszam" => $request->jarmuRendszam,
            "lezart" => 0,
            "osszar" => 0,
            "fizetesi_mod" => $request->fizetesiMod ,
            'created_at'=> now(),
            'updated_at' =>now()
        ]);


        return redirect()->route('dashboard')->withSuccess('Sikeres Létrehozás!');;
    }

    public function frissites(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'szereloAzonosito' => 'required|string|size:6|exists:szerelos,azonosito',
            'fizetesiMod' => 'required|in:kartya,keszpenz',
        ]);

        Munkalap::query()->where('id', $id)->update(['szerelo_azonosito' => $request->szereloAzonosito, 'fizetesi_mod'=> $request->fizetesiMod, 'lezart' => $request->lezar]);

        return redirect()->route('lista')->with('success', 'Munkalap sikeresen módosítva.');
    }


    public function worklist(Request $request){
        $azonosito = Auth::user()->azonosito;

        if($azonosito != "ADMIN!")
        $munkalapok = Munkalap::query()->where('szerelo_azonosito', $azonosito)->get();
        else
        $munkalapok = Munkalap::query()->get();


        return view('szerelo.munkaListazas', compact('munkalapok'));  
    } 

    public function bovito(Request $request){
        $id = $request->id;

        $munkalap = Munkalap::where('id', '=', $id)->get(['szerelo_azonosito', 'lezart', 'osszar', 'fizetesi_mod']);

        return view('szerelo.munkalapBovites', compact('munkalap'));
    }


}
