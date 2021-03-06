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

namespace Rollerworks\Component\Search\Extension\Core\ChoiceList\View;

/**
 * Represents a group of choices in templates.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class ChoiceGroupView implements \IteratorAggregate
{
    /**
     * The label of the group.
     *
     * @var string
     */
    public $label;

    /**
     * The choice views in the group.
     *
     * @var ChoiceGroupView[]|ChoiceView[]
     */
    public $choices;

    /**
     * Creates a new choice group view.
     *
     * @param string                         $label   The label of the group
     * @param ChoiceGroupView[]|ChoiceView[] $choices the choice views in the
     *                                                group
     */
    public function __construct(string $label, array $choices = [])
    {
        $this->label = $label;
        $this->choices = $choices;
    }

    /**
     * {@inheritdoc}
     *
     * @return ChoiceGroupView[]|ChoiceView[]|\ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->choices);
    }
}
