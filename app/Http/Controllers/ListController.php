<?php

namespace App\Http\Controllers;

use App\Models\Alkatresz;
use App\Models\Munkafolyamatok;
use Illuminate\Http\Request;
use App\Models\Munkalap; 
use App\Models\Gepjarmu;
use App\Models\Anyag;
use App\Models\Munkafolyamat;
use App\Models\MunkalapAlkatresz;
use App\Models\MunkalapAnyagok;
use App\Models\Tulajdonos;
use Illuminate\Support\Facades\Auth;
use Svg\Tag\Rect;

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
        $munkalapID = $request->id;

        $munkalapAnyagok = MunkalapAnyagok::query()->where('munkalap_id', $munkalapID)->get();
        $anyagok = Anyag::query()->whereIn('id', $munkalapAnyagok->pluck('anyag_id'))->get('nev');
        $munkafolyamat = Munkafolyamat::query()->where('munkalap_id', $munkalapID)->get();
        $munkaFolyamatok = Munkafolyamatok::query()->whereIn('id', $munkafolyamat->pluck('munkafolyamatok_id'))->get('nev');

        $alkatresz = MunkalapAlkatresz::query()->where('munkalap_id', $munkalapID)->get();
        $alkatreszek = Alkatresz::query()->whereIn('id', $alkatresz->pluck('alkatresz_id'))->get('nev');


        return view('szerelo.munkalapBovites', compact('munkalapID','munkalapAnyagok','anyagok','munkafolyamat', 'munkaFolyamatok', 'alkatresz' ,'alkatreszek'));
    }

    public function bovit(Request $request){
        $fajta = $request->fajta;
        $munkalapID = $request->munkalapID;
        if($fajta == 'anyag'){
            $cucc = Anyag::query()->get('nev');
        }else if($fajta == 'munka'){
            $cucc = Munkafolyamatok::query()->get('nev');
        }else{
            $cucc = Alkatresz::query()->get('nev');
        }
        return view('szerelo.Bovit', compact('fajta', 'munkalapID', "cucc"));
    }

    public function adas(Request $request){
        $request->validate([
            'cucc' => 'required|string',
            'mennyiseg' => 'required|string'
        ]);

        $munkalapID = $request->munkalapID;

        if($request->fajta == 'anyag'){
            $yes = Anyag::query()->where('nev', '=', $request->cucc)->pluck('id')->first();
            MunkalapAnyagok::query()->insert(['munkalap_id' => $munkalapID, 'anyag_id' => $yes, 'mennyiseg' => $request->mennyiseg, 'created_at'=> now(),'updated_at' =>now()]);
        }else if($request->fajta == 'munka'){
            $yes = Munkafolyamatok::query()->where('nev', '=', $request->cucc)->pluck('id')->first();
            Munkafolyamat::query()->insert(['munkalap_id' => $munkalapID, 'munkafolyamatok_id' => $yes, 'idotartam' => $request->mennyiseg, 'created_at'=> now(),'updated_at' =>now()]);
        }else{
            $yes = Alkatresz::query()->where('nev', '=', $request->cucc)->pluck('id')->first();
            MunkalapAlkatresz::query()->insert(['munkalap_id' => $munkalapID, 'alkatresz_id' => $yes, 'mennyiseg' => $request->mennyiseg, 'created_at'=> now(),'updated_at' =>now()]);
        }

        return redirect()->route('worklist', ['azonosito' => Auth::user()->azonosito]);


    }


    
    public function megtekint(Request $request){
        $id = $request->id;

        $munkalap = Munkalap::findOrFail($id);

        $munkalap = Munkalap::where('id', $id)->first(['id','munkafelvevo_azonosito', 'szerelo_azonosito', 'gepjarmu_rendszam', 'lezart', 'osszar', 'fizetesi_mod']);

        $gepjarmu = Gepjarmu::where('rendszam', $munkalap->gepjarmu_rendszam)->first(['gyartmany', 'tipus', 'tulaj_id']);

        $tulaj = Tulajdonos::where('id', $gepjarmu->tulaj_id)->first(['nev', 'cim']);

        return view('munkafelvevo.munkalapMegtekintes', compact('munkalap', 'gepjarmu', 'tulaj'));
    }



}
