<?php

namespace App\Console\Commands;

use App\Actions\ConvertNumber;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Validator;

use function Laravel\Prompts\text;

class ConvertNumberCommand extends Command implements PromptsForMissingInput
{
    protected $signature = 'convert:number {number}';

    protected $description = 'Command description';

    protected array $validation_rule = ['number' => ['required', 'integer', 'min:1', 'max:3999']];

    public function __construct(private readonly ConvertNumber $converter)
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $roman_numeral = $this->converter->handle(
            data_get($this->validateArguments(), 'number')
        );

        $this->line($roman_numeral->numeral);
    }

    protected function validateArguments(): array
    {
        $validator = Validator::make(
            $this->arguments(),
            $this->validation_rule
        );

        if ($validator->fails()) {
            collect($validator->errors()->all())
                ->each(fn ($error) => $this->error($error));
            exit;
        }

        return $validator->validated();
    }

    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'number' => fn () => text(
                label: 'What number do you want to convert?',
                required: true,
                validate: $this->validation_rule,
            ),
        ];
    }
}
