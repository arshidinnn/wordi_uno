<?php

namespace App\Console\Commands;

use App\Enums\Numbers;
use App\Models\Number;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateNecessaryNumbers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:numbers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        DB::transaction(function () {
            $numbers = Numbers::getNumbersArray();

            $existingNumbers = Number::query()->pluck('value')->toArray();

            $newNumbers = array_diff($numbers, $existingNumbers);

            foreach ($newNumbers as $number) {
                Number::query()->create([
                    'value' => $number
                ]);
            }

            $this->info('Numbers added successfully');
        });
    }
}
