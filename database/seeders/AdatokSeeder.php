<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Szerelo;
use App\Models\Munkafelvevo;
use App\Models\Tulajdonos;
use App\Models\Gepjarmu;
use App\Models\Munkalap;
use App\Models\Alkatresz;
use App\Models\MunkalapAlkatresz;
use App\Models\Anyag;
use App\Models\MunkalapAnyagok;
use App\Models\Munkafolyamatok;
use App\Models\Munkafolyamat;





class AdatokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Szerelo
        Szerelo::create([
            'azonosito' => 'S97B32',
            'nev' => 'Lakatos Márk'
        ]);
        
        Szerelo::create([
            'azonosito' => 'S92B33',
            'nev' => 'Asztalos Attila'
        ]);
        
        Szerelo::create([
            'azonosito' => '9B7B45',
            'nev' => 'Szabó László'
        ]);
        
        //Munkafelvevo
        Munkafelvevo::create([
            'azonosito' => '3B2NH1',
            'nev' => 'Szabó Attila'
        ]);
        
        Munkafelvevo::create([
            'azonosito' => '3D5NH1',
            'nev' => 'Kerekes Gábor'
        ]);
        
        Munkafelvevo::create([
            'azonosito' => '3B3CH1',
            'nev' => 'Kovács János'
        ]);
        
        //Tulajdonos
        Tulajdonos::create([
            'nev' => 'Varga Bence',
            'cim' => 'Szombathely Skorpió utca 10'
        ]);
        
        Tulajdonos::create([
            'nev' => 'Kiss Botond',
            'cim' => 'Szombathely Orion utca 13'
        ]);
        
        Tulajdonos::create([
            'nev' => 'Vámos Bence',
            'cim' => 'Szombathely Oroszlán utca 2'
        ]);
        
        //Gepjarmu
        Gepjarmu::create([
            'rendszam' => 'ABC-123',
            'gyartmany' => '1993',
            'tipus' => 'Toyota Supra',
            'tulaj_id' => '1'
        ]);
        
        Gepjarmu::create([
            'rendszam' => 'ABC-132',
            'gyartmany' => '1990',
            'tipus' => 'Nissan 200sx',
            'tulaj_id' => '2'
        ]);
        
        Gepjarmu::create([
            'rendszam' => 'ABC-165',
            'gyartmany' => '1986',
            'tipus' => 'Toyota Mr2',
            'tulaj_id' => '3'
        ]);
        
        //Munkalap
        Munkalap::create([
            'szerelo_azonosito' => 'S92B33',
            'datum' => '2023.03.22',
            'munkafelvevo_azonosito' => '3D5NH1',
            'gepjarmu_rendszam' => 'ABC-165',
            'lezart' => '0',
            'osszar' => '134000',
            'fizetesi_mod' => 'kartya'
        ]);
        
        Munkalap::create([
            'szerelo_azonosito' => '9B7B45',
            'datum' => '2023.03.15',
            'munkafelvevo_azonosito' => '3B3CH1',
            'gepjarmu_rendszam' => 'ABC-132',
            'lezart' => '0',
            'osszar' => '254000',
            'fizetesi_mod' => 'kartya'
        ]);
        //Alkatreszek Model
        Alkatresz::create([
            'nev' => 'Légszűrő',
            'ar' => '5000'
        ]);
        
        Alkatresz::create([
            'nev' => 'Olajszűrő',
            'ar' => '3500'
        ]);
        
        Alkatresz::create([
            'nev' => 'Féktárcsa',
            'ar' => '15000'
        ]);
        
        Alkatresz::create([
            'nev' => 'Lámpa',
            'ar' => '13500'
        ]);
        
        Alkatresz::create([
            'nev' => 'Fékbetét',
            'ar' => '11500'
        ]);
        
        //Munkalap alkatresz
        MunkalapAlkatresz::create([
            'munkalap_id' => '1',
            'alkatresz_id' => '1',
            'mennyiseg' => '1'
        ]);
        
        MunkalapAlkatresz::create([
            'munkalap_id' => '2',
            'alkatresz_id' => '2',
            'mennyiseg' => '1'
        ]);
        
        MunkalapAlkatresz::create([
            'munkalap_id' => '2',
            'alkatresz_id' => '3',
            'mennyiseg' => '2'
        ]);
        
        MunkalapAlkatresz::create([
            'munkalap_id' => '1',
            'alkatresz_id' => '4',
            'mennyiseg' => '3'
        ]);
        
        MunkalapAlkatresz::create([
            'munkalap_id' => '1',
            'alkatresz_id' => '5',
            'mennyiseg' => '1'
        ]);
        
        //Anyagok
        Anyag::create([
            'nev' => 'Olaj',
            'ar' => '15000'
        ]);
        
        Anyag::create([
            'nev' => 'Fékfolyadék',
            'ar' => '3000'
        ]);
        
        Anyag::create([
            'nev' => 'Hűtőfolyadék',
            'ar' => '10000'
        ]);
        
        Anyag::create([
            'nev' => 'Ablakmosó',
            'ar' => '2500'
        ]);
        
        //Munkalap anyagok
        MunkalapAnyagok::create([
            'munkalap_id' => '1',
            'anyag_id' => '1',
            'mennyiseg' => '5'
        ]);
        
        MunkalapAnyagok::create([
            'munkalap_id' => '2',
            'anyag_id' => '2',
            'mennyiseg' => '3'
        ]);
        
        MunkalapAnyagok::create([
            'munkalap_id' => '2',
            'anyag_id' => '3',
            'mennyiseg' => '2'
        ]);
        
        MunkalapAnyagok::create([
            'munkalap_id' => '1',
            'anyag_id' => '1',
            'mennyiseg' => '4'
        ]);
        
        //Munkafolyamatok
        Munkafolyamatok::create(['nev' => 'Vizsgáztatás']);
        Munkafolyamatok::create(['nev' => 'Környezetvédelmi kártya kiállítás']);
        Munkafolyamatok::create(['nev' => 'Éves átvizsgálás']);
        Munkafolyamatok::create(['nev' => 'Rendkívüli átvizsgálás']);
        Munkafolyamatok::create(['nev' => 'Olajcsere']);
        
        //Munkafolyamat
        Munkafolyamat::create([
            'munkalap_id' => '1',
            'munkafolyamatok_id' => '1',
            'idotartam' => '60'
        ]);
        
        Munkafolyamat::create([
            'munkalap_id' => '1',
            'munkafolyamatok_id' => '5',
            'idotartam' => '30'
        ]);
        
        Munkafolyamat::create([
            'munkalap_id' => '1',
            'munkafolyamatok_id' => '2',
            'idotartam' => '120'
        ]);
        
        Munkafolyamat::create([
            'munkalap_id' => '2',
            'munkafolyamatok_id' => '3',
            'idotartam' => '60'
        ]);
        
        Munkafolyamat::create([
            'munkalap_id' => '1',
            'munkafolyamatok_id' => '4',
            'idotartam' => '60'
        ]);
    }
}
