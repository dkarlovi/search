<?php

declare(strict_types=1);

/*
 * This file is part of the RollerworksSearch package.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Rollerworks\Component\Search\Tests\Extension\Core\DataTransformer;

use PHPUnit\Framework\TestCase;
use Rollerworks\Component\Search\Extension\Core\DataTransformer\ChoiceToValueTransformer;

final class ChoiceToValueTransformerTest extends TestCase
{
    /**
     * @test
     */
    public function it_transforms_label_to_choice()
    {
        $choices = $this->prophesize('Rollerworks\Component\Search\Extension\Core\ChoiceList\ChoiceListInterface');
        $choices->getValueForChoice('active')->willReturn('1');
        $choices->getValueForChoice('removed')->willReturn('2');

        $transformer = new ChoiceToValueTransformer($choices->reveal());

        self::assertEquals('1', $transformer->transform('active'));
        self::assertEquals('2', $transformer->transform('removed'));
    }

    /**
     * @test
     */
    public function it_reverse_transforms_choice_to_label()
    {
        $choices = $this->prophesize('Rollerworks\Component\Search\Extension\Core\ChoiceList\ChoiceListInterface');
        $choices->getChoiceForValue('1')->willReturn('active');
        $choices->getChoiceForValue('2')->willReturn('removed');

        $transformer = new ChoiceToValueTransformer($choices->reveal());

        self::assertEquals('active', $transformer->reverseTransform('1'));
        self::assertEquals('removed', $transformer->reverseTransform('2'));
    }
}