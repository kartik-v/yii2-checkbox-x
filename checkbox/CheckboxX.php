<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014
 * @package yii2-checkbox-x
 * @version 1.0.0
 */

namespace kartik\checkbox;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\base\InvalidConfigException;
use yii\web\View;
use yii\web\JsExpression;

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

    /**
     * Initializes the widget
     *
     * @throw InvalidConfigException
     */
    public function init()
    {
        parent::init();
        $this->registerAssets();
        Html::addCssClass($this->options, 'cbx-loading');
        echo $this->getInput('textInput');
    }

    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        $id = '$("#' . $this->options['id'] . '")';
        $view = $this->getView();
        CheckboxXAsset::register($view);
        $this->registerPlugin('checkboxX');
    }

}