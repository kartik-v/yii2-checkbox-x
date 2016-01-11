<?php

/**
 * @package   yii2-checkbox-x
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2016
 * @version   1.0.3
 */

namespace kartik\checkbox;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\base\InputWidget;

/**
 * An extended checkbox widget for Yii Framework 2 based on the bootstrap-checkbox-x plugin
 * by Krajee. This widget allows three checkbox states and includes additional styles.
 *
 * @see http://plugins.krajee.com/checkbox-x
 * @see http://github.com/kartik-v/bootstrap-checkbox-x
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class CheckboxX extends InputWidget
{
    const INPUT_TEXT = 'textInput';
    const INPUT_CHECKBOX = 'checkbox';
    const LABEL_LEFT = 'left';
    const LABEL_RIGHT = 'right';

    /**
     * @var string initialization input type. Note, the widget by default
     * uses a text input to initialize the plugin instead of checkbox for
     * better label styling, alignment and using templates within ActiveField.
     * Can be one of `CheckboxX::INPUT_TEXT` or `CheckboxX::INPUT_CHECKBOX`.
     */
    public $initInputType = self::INPUT_TEXT;

    /**
     * @var bool automatically generate, style, and position labels with respect to
     * the checkbox x. If this is `true`, the labels will automatically be positioned
     * and styled based on label settings. When this is set to `true` and you have set
     * the `model` and `attribute`, the label will be automatically generated. If you are
     * not using this with a model, then  you must set the property `labelSettings['label']`
     * for automatic label styling to work.
     * NOTE:
     * If this is `true`, and you are using the widget within yii ActiveField, then
     * you must disable the active field label generation to avoid duplicate labels.
     * For example:
     * ```
     * $form->field($model, 'attr')->widget(CheckboxX::classname(), [
     *      'autoLabel'=>true
     * ])->label(false);
     * ```
     */
    public $autoLabel = false;

    /**
     * @var array the settings for the label. The following properties are recognized
     * - `label`: string, the label to be used. When using with model, this will be automatically generated
     *   if not set.
     * - `position`: string, the position of the label with respect to the checkbox. Must be one of
     *   `CheckboxX::LABEL_LEFT` or `CheckboxX::LABEL_RIGHT`. Defaults to `CheckboxX::LABEL_RIGHT` if not set.
     * - `options`: array, the HTML attributes for the label.
     */
    public $labelSettings = [];

    /**
     * @inheritdoc
     */
    public $pluginName = 'checkboxX';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->registerAssets();
        if ($this->pluginLoading) {
            Html::addCssClass($this->options, 'cbx-loading');
        }
        if ($this->initInputType !== self::INPUT_TEXT && $this->initInputType !== self::INPUT_CHECKBOX) {
            throw new InvalidConfigException('The "initInputType" property must be one of "' . self::INPUT_TEXT . '" or "' . self::INPUT_CHECKBOX . '"');
        }
        $this->initMarkup();
    }

    /**
     * Initializes markup & styling for checkbox, label, and parses label positions
     */
    public function initMarkup()
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
     * Registers the needed assets
     *
     * @return void
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
