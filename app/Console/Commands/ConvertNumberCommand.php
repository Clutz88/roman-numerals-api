<?php

namespace App\Console\Commands;

use App\Services\IntegerConverterInterface;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;

use function Laravel\Prompts\info;
use function Laravel\Prompts\text;

class ConvertNumberCommand extends Command implements PromptsForMissingInput
{
    protected $signature = 'convert:number {number}';

    protected $description = 'Command description';

    public function __construct(private readonly IntegerConverterInterface $integerConverter)
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $number = $this->argument('number');

        $this->line(
            $this->integerConverter->convertInteger($number)
        );
    }

    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'number' => fn () => text(
                label: 'What number do you want to convert?',
                required: true,
                validate: ['name' => 'required|numeric'],
            ),
        ];
    }
}
