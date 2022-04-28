<?php

namespace App\Console\Commands;

use App\Http\Service\CurrencyService;
use Illuminate\Console\Command;
use Psr\Log\LoggerInterface;

class UpdateCourse extends Command
{
    private CurrencyService $service;

    private LoggerInterface $logger;

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

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CurrencyService $service, LoggerInterface $logger)
    {
        parent::__construct();
        $this->service = $service;
        $this->logger = $logger;
    }

    public function handle(): void
    {
        try {
            $this->service->insertOrUpdate();

            $this->info('Курсы валют обновлены');
        } catch (\Throwable $throwable) {
            $this->info('Ошибка обновления курса валют!');

            $this->logger->error($throwable->getMessage(), $throwable->getTrace());
        }
    }
}
