<?php

namespace App\Console\Commands;

use App\Http\Service\CurrencyService;
use App\Models\Currency;
use Illuminate\Console\Command;
use Stichoza\GoogleTranslate\GoogleTranslate;

class UpdateCourse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'course:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all currencies';

    public CurrencyService $service;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CurrencyService $service)
    {
        $this->service = $service;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->service->storeOrUpdate();

        $this->info('Currencies created!');
    }
}
