<?php

namespace ParseCsv\tests\properties;

use ParseCsv\Csv;
use PHPUnit\Framework\TestCase;

class BaseClass extends TestCase
{

    /**
     * CSV
     * The parseCSV object
     *
     * @var Csv
     */
    protected $csv;

    /**
     * Setup
     * Setup our test environment objects
     */
    protected function setUp(): void
    {
        $this->csv = new Csv();
    }

    /**
     * @param mixed $expected
     *
     * @returns void
     */
    protected function _compareWithExpected($expected): void
    {
        $this->csv->auto(__DIR__ . '/../../examples/_books.csv');
        $actual = array_map(
            static function ($row) {
                return $row['title'];
            },
            $this->csv->data
        );
        $this->assertEquals($expected, array_values($actual));
    }
}
