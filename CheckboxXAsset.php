<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014
 * @package yii2-checkbox-x
 * @version 1.0.0
 */

namespace kartik\checkbox;

use Yii;

/**
 * Asset bundle for CheckboxX widget. Includes assets from
 * bootstrap-checkbox-x plugin by Krajee.
 *
 * @see http://plugins.krajee.com/checkbox-x
 * @see http://github.com/kartik-v/bootstrap-checkbox-x
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class CheckboxXAsset extends \kartik\base\AssetBundle
{

    public function init()
    {
        $this->setSourcePath('@vendor/kartik-v/bootstrap-checkbox-x');
        $this->setupAssets('css', ['css/checkbox-x']);
        $this->setupAssets('js', ['js/checkbox-x']);
        parent::init();
    }
}
