<?php

/**
 * This file is part of the margusk/warbsorber package.
 *
 * @author  Margus Kaidja <margusk@gmail.com>
 * @link    https://github.com/marguskaidja/php-warbsorber
 * @license http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
 */

declare(strict_types=1);

namespace margusk\Warbsorber\Tests;

use margusk\Warbsorber\Entry;
use PHPUnit\Framework\TestCase;

class RemoveFunctionPrefixTest extends TestCase
{
    /**
     * @return string[][]
     */
    public function dataProviderForFopenPrefixRemover(): array
    {
        $message = 'Operation failed';

        return [
            [
                'fopen(): ' . $message,
                $message,
            ],
            [
                'fopen(with,some,parameters): ' . $message,
                $message,
            ],
            [
                'fopen(with,some,brac): ket(symbols,in,parameters): ' . $message,
                $message,
            ]
        ];
    }

    /** @dataProvider dataProviderForFopenPrefixRemover */
    public function testFopenPrefixMustBeRemovedFromEntry(string $input, string $expected): void
    {
        $entry = (new Entry(0, $input, '', 0))
            ->removeFunctionPrefix('fopen');

        $this->assertEquals($expected, $entry->errStr);
    }
}
