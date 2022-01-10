<?php

/**
 * @package   yii2-checkbox-x
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2022
 * @version   1.0.7
 */

namespace kartik\checkbox;

use kartik\base\AssetBundle;

/**
 * Asset bundle for [[CheckboxX]] widget. Includes assets from
 * [bootstrap-checkbox-x](http://plugins.krajee.com/checkbox-x) plugin by Krajee.
 *
 * @see http://plugins.krajee.com/checkbox-x
 * @see http://github.com/kartik-v/bootstrap-checkbox-x
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 */
class CheckboxXAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath('@vendor/kartik-v/bootstrap-checkbox-x');
        $this->setupAssets('css', ['css/checkbox-x']);
        $this->setupAssets('js', ['js/checkbox-x']);
        parent::init();
    }
}
