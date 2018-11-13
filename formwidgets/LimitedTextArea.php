<?php namespace AspenDigital\Utilities\FormWidgets;

use Backend\Classes\FormWidgetBase;

/**
 * LimitedTextArea Form Widget
 */
class LimitedTextArea extends FormWidgetBase
{
    public $size = 'large';
    public $limit = 100;

    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'limitedtextarea';

    /**
     * @inheritDoc
     */
    public function init()
    {
        $this->fillFromConfig([
            'size',
            'limit'
        ]);
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('limitedtextarea');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['model'] = $this->model;
        $this->vars['size'] = $this->size;
        $this->vars['limit'] = $this->limit;
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/limitedtextarea.css', 'AspenDigital.Utilities');
        $this->addJs('js/limitedtextarea.js', 'AspenDigital.Utilities');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return $value;
    }
}
