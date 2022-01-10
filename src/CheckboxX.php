<?php

/**
 * @package   yii2-checkbox-x
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2022
 * @version   1.0.7
 */

namespace kartik\checkbox;

use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\base\InputWidget;

/**
 * CheckboxX is an extended checkbox widget for Yii Framework 2 based on the
 * [bootstrap-checkbox-x](http://plugins.krajee.com/checkbox-x) plugin by Krajee.
 * This widget allows three checkbox states and includes additional styles.
 *
 * For example,
 *
 * ```php
 * use kartik\checkbox\CheckboxX;
 * echo CheckboxX::widget([
 *     'model' => $model,
 *     'attribute' => 'status',
 *     'pluginOptions' => [
 *         'threeState' => true,
 *         'size' => 'lg'
 *     ]
 * ]);
 * ```
 *
 * @see http://plugins.krajee.com/checkbox-x
 * @see http://github.com/kartik-v/bootstrap-checkbox-x
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 *
 */
class CheckboxX extends InputWidget
{
    /**
     * @var string text input type
     */
    const INPUT_TEXT = 'textInput';
    /**
     * @var string checkbox input type
     */
    const INPUT_CHECKBOX = 'checkbox';
    /**
     * @var string position label to the left of the checkbox
     */
    const LABEL_LEFT = 'left';
    /**
     * @var string position label to the right of the checkbox
     */
    const LABEL_RIGHT = 'right';

    /**
     * @var string initialization input type. Note, the widget by default uses a text input to initialize the plugin
     * instead of checkbox for better label styling, alignment and using templates within ActiveField. Can be one of
     * [[INPUT_TEXT]] or [[INPUT_CHECKBOX]]. Defaults to [[INPUT_TEXT]].
     */
    public $initInputType = self::INPUT_TEXT;

    /**
     * @var boolean whether to automatically generate, style, and position labels with respect to the checkbox x. If this is
     * `true`, the labels will automatically be positioned and styled based on label settings. When this is set to
     * `true` and you have set the `model` and `attribute`, the label will be automatically generated. If you are not
     * using this with a model, then  you must set the property `labelSettings['label']` for automatic label styling
     * to work.
     *
     * NOTE: If this is `true`, and you are using the widget within yii ActiveField, then you must disable the active
     * field label generation to avoid duplicate labels. For example:
     *
     * ```php
     * echo $form->field($model, 'attr')->widget(CheckboxX::classname(), [
     *      'autoLabel'=>true
     * ])->label(false);
     * ```
     */
    public $autoLabel = false;

    /**
     * @var array the settings for the label. The following properties are recognized
     * - `label`: _string_, the label to be used. When using with model, this will be automatically generated
     *   if not set.
     * - `position`: _string_, the position of the label with respect to the checkbox. Must be one of[[LABEL_LEFT]] or
     *   [[LABEL_RIGHT]]. Defaults to [[LABEL_RIGHT]] if not set.
     * - `options`: _array_, the HTML attributes for the label.
     */
    public $labelSettings = [];

    /**
     * @inheritdoc
     */
    public $pluginName = 'checkboxX';

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->initOptions();
        $this->registerAssets();
        $this->renderWidget();
    }

    /**
     * Initialize [[CheckboxX]] widget and the plugin options for
     * [bootstrap-checkbox-x](http://plugins.krajee.com/checkbox-x).
     *
     * @throws InvalidConfigException
     */
    protected function initOptions()
    {
        if ($this->pluginLoading) {
            Html::addCssClass($this->options, 'cbx-loading');
        }
        $txt = self::INPUT_TEXT;
        $cbx = self::INPUT_CHECKBOX;
        if ($this->initInputType !== $txt && $this->initInputType !== $cbx) {
            throw new InvalidConfigException("The 'initInputType' property must be one of '{$txt}' or '{$cbx}'.");
        }
        if (empty($this->pluginOptions['iconChecked'])) {
            $this->pluginOptions['iconChecked'] = $this->isBs4() ? '<i class="fas fa-check"></i>' :
                '<i class="glyphicon glyphicon-ok"></i>';
        }

    }

    /**
     * Initializes markup & styling for checkbox, label, and parses label positions.
     */
    public function renderWidget()
    {
        if (empty($this->labelSettings['label']) && !$this->autoLabel) {
            echo $this->getInput($this->initInputType);
            return;
        }
        $label = ArrayHelper::getValue($this->labelSettings, 'label', '');
        $options = ArrayHelper::getValue($this->labelSettings, 'options', []);
        $position = ArrayHelper::getValue($this->labelSettings, 'position', self::LABEL_RIGHT);
        Html::addCssClass($options, 'cbx-label');
        if ($this->disabled || $this->readonly ||
            ArrayHelper::getValue($this->options, 'disabled', false) ||
            ArrayHelper::getValue($this->options, 'readonly', false)
        ) {
            Html::addCssClass($options, 'disabled');
        }
        $label = $this->hasModel() && empty($label) ?
            Html::activeLabel($this->model, $this->attribute, $options) :
            Html::label($label, $this->options['id'], $options);
        if ($this->initInputType !== self::INPUT_TEXT) {
            $this->options['label'] = '';
        }
        $input = $this->getInput($this->initInputType);
        echo ($position === self::LABEL_RIGHT) ? $input . $label : $label . $input;
    }

    /**
     * Registers the client assets for the [[CheckboxX]] widget.
     */
    public function registerAssets()
    {
        $view = $this->getView();
        CheckboxXAsset::register($view);
        if (!empty($this->pluginOptions['theme']) && $this->pluginOptions['theme'] === 'krajee-flatblue') {
            KrajeeFlatBlueThemeAsset::register($view);
        }
        $this->registerPlugin($this->pluginName);
    }
}
