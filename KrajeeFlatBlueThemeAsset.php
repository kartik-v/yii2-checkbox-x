<?php

/**
 * @package   yii2-checkbox-x
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2016
 * @version   1.0.3
 */

namespace kartik\checkbox;

use Yii;
use kartik\base\AssetBundle;

/**
 * Asset bundle for CheckboxX Theme. Includes assets from
 * bootstrap-checkbox-x plugin by Krajee.
 *
 * @see http://plugins.krajee.com/checkbox-x
 * @see http://github.com/kartik-v/bootstrap-checkbox-x
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class KrajeeFlatBlueThemeAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $depends = [
        'kartik\checkbox\CheckboxXAsset'
    ];
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath('@vendor/kartik-v/bootstrap-checkbox-x');
        $this->setupAssets('css', ['css/theme-krajee-flatblue']);
        parent::init();
    }
}
