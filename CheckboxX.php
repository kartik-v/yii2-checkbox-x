<?php

/**
 * @package   yii2-checkbox-x
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014
 * @version   1.2.0
 */

namespace kartik\checkbox;

use Yii;
use yii\helpers\Html;

/**
 * An extended checkbox widget for Yii Framework 2 based on the bootstrap-checkbox-x plugin
 * by Krajee. This widget allows three checkbox states and includes additional styles.
 *
 * @see http://plugins.krajee.com/checkbox-x
 * @see http://github.com/kartik-v/bootstrap-checkbox-x
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class CheckboxX extends \kartik\base\InputWidget
{
    const INPUT_TEXT = 'textInput';
    const INPUT_CHECKBOX = 'checkbox';

    /**
     * @var string initialization input type. Note, the widget by default
     * uses a text input to initialize the plugin instead of checkbox for
     * better label styling, alignment and using templates within ActiveField.
     * Can be one of CheckboxX::INPUT_TEXT or CheckboxX::INPUT_CHECKBOX.
     */
    public $initInputType = self::INPUT_TEXT;
    
    /**
     * @inheritdoc
     */
    protected $_pluginName = 'checkboxX';
    
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
        echo $this->getInput($this->initInputType);
    }

    /**
     * Registers the needed assets
     *
     * @return void
     */
    public function registerAssets()
    {
        $id = 'jQuery("#' . $this->options['id'] . '")';
        $view = $this->getView();
        CheckboxXAsset::register($view);
        $this->registerPlugin($this->_pluginName);
    }

}
