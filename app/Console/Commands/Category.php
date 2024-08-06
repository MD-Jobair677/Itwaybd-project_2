<?php

namespace App\Console\Commands;

use App\Models\Categorie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Category extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $Categories = Categorie::where('time', '>', now())->get();



        foreach ($Categories as $Categorie) {

            foreach ($Categories as $Categorie) {
                $response = Http::post('http://127.0.0.1:8001/api/categories/project_1', [
                    'categorie_name' => $Categorie->name,
                    'slug' => $Categorie->slug,
                    'time' => $Categorie->time,
                ]);
            }
        }

        $this->info('success');
    }
}
