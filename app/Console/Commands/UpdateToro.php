<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Animal;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Carbon\Carbon;

class UpdateToro extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:toro';

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
        $fecha2=Carbon::now();
        $animal=Animal::where('animal_categoria','=',2)->get();

        foreach($animal as $ani)
        {
        $fecha=Carbon::parse($ani->animal_nacimiento);
       
        $diff=$fecha->diffInDays($fecha2,false);
        if($diff>600)
            { 
            $ani->animal_categoria=4;
            $ani->save();
            }    
        }
    }
}
