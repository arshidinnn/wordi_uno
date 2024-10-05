<?php

namespace App\Console\Commands;

use App\Enums\KazakhLetters;
use App\Models\Letter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateKazakhLetters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:letters';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command adds all Kazakh letters to the database if they don\'t already exist';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        DB::transaction(function () {
            $letters = KazakhLetters::getLettersArray();

            $existingLetters = Letter::query()->pluck('value')->toArray();

            $newLetters = array_diff($letters, $existingLetters);

            foreach ($newLetters as $letter) {
                Letter::query()->create([
                    'value' => $letter
                ]);
            }

            $this->info('Letters added successfully');
        });
    }
}
