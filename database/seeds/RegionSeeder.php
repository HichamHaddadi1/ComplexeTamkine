<?php

use App\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::query()->delete();
        // 02-L'insertion des Regions
        $type1 =new Region([
         'nom'=>"Tanger-Tétouan-Al Hoceïma",
         'description'=>"Tanger-Tétouan-Al Hoceïma"
       ]);
       $type1->save();
       $type2=new Region([
           'nom'=>"l'Oriental",
           'description'=>"l'Oriental"
       ]);
       $type2->save();
       $type3=new Region([
           'nom'=>"Fès-Meknès",
           'description'=>"Fès-Meknès"
       ]);
       $type3->save();
       $type4=new Region([
           'nom'=>"Rabat-Salé-Kénitra",
           'description'=>"Rabat-Salé-Kénitra"
       ]);
       $type4->save();
       $type5=new Region([
           'nom'=>"Béni Mellal-Khénifra",
           'description'=>"Béni Mellal-Khénifra"
       ]);
       $type5->save();
       $type6=new Region([
           'nom'=>"Casablanca-Settat",
           'description'=>"Casablanca-Settat"
         ]);
         $type6->save();
         $type7=new Region([
             'nom'=>"Marrakech-Safi",
             'description'=>"Marrakech-Safi"
         ]);
         $type7->save();
         $type8=new Region([
             'nom'=>"Drâa-Tafilalet",
             'description'=>"Drâa-Tafilalet"
         ]);
         $type8->save();
         $type9=new Region([
             'nom'=>"Souss-Massa",
             'description'=>"Souss-Massa"
         ]);
         $type9->save();
         $type10=new Region([
             'nom'=>"Guelmim-Oued Noun",
             'description'=>"Guelmim-Oued Noun"
         ]);
         $type10->save();
         $type11=new Region([
           'nom'=>"Laâyoune-Sakia El Hamra",
           'description'=>"Laâyoune-Sakia El Hamra"
          ]);
          $type11->save();
          $type12=new Region([
              'nom'=>"Dakhla-Oued Ed Dahab",
              'description'=>"Dakhla-Oued Ed Dahab"
          ]);
          $type12->save();
    }
}
