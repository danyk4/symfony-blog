<?php

namespace App\Service;

use Symfony\Component\HttpKernel\KernelInterface;

class ExportCsv
{
    public function __construct(protected KernelInterface $kernel) {}

    public function run(array $data): string
    {
        $lines = [];
        foreach ($data as $row) {
            $lines[] = implode(";", $row);
        }
        $string = implode("\n", $lines);

        $filename = tempnam($this->kernel->getProjectDir().'/var/csv', 'export-csv-');
        file_put_contents($filename, $string);

        return $filename;
    }
}
