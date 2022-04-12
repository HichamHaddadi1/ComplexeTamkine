<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Salle;

class etatSalle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'etat:salle';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Le code qui parmet de retourner l'etat de la salle
        $salles=Salle::all();
        foreach($salles as $sal){
            if(\Bigbluebutton::isMeetingRunning($sal->id)){
                $sal->is_running=true;
                $sal->save();
            }
            else{
                $sal->is_running=false;
                $sal->save();
            }
        }
        $this->info('Bonjour!');

    }
}
