<?php

namespace Tomodo531\MultiCheckbox;

use Laravel\Nova\Fields\Field;

class MultiCheckbox extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'multi-checkbox';


    public function __construct($name, $attribute = null)
    {
        parent::__construct($name, $attribute);
        $this->withMeta([
            'withLabels' => true
        ]);
    }


    public function withLabels(bool $withLabels = true)
    {
        return $this->withMeta([
            'withLabels' => $withLabels
        ]);
    }

    public function options(array $options)
    {
        return $this->withMeta([
            'options' => $options
        ]);
    }
}
