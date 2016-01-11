yii2-checkbox-x
=================

[![Latest Stable Version](https://poser.pugx.org/kartik-v/yii2-checkbox-x/v/stable)](https://packagist.org/packages/kartik-v/yii2-checkbox-x)
[![License](https://poser.pugx.org/kartik-v/yii2-checkbox-x/license)](https://packagist.org/packages/kartik-v/yii2-checkbox-x)
[![Total Downloads](https://poser.pugx.org/kartik-v/yii2-checkbox-x/downloads)](https://packagist.org/packages/kartik-v/yii2-checkbox-x)
[![Monthly Downloads](https://poser.pugx.org/kartik-v/yii2-checkbox-x/d/monthly)](https://packagist.org/packages/kartik-v/yii2-checkbox-x)
[![Daily Downloads](https://poser.pugx.org/kartik-v/yii2-checkbox-x/d/daily)](https://packagist.org/packages/kartik-v/yii2-checkbox-x)

An extended checkbox widget for Yii Framework 2 based on the [bootstrap-checkbox-x jQuery plugin](http://plugins.krajee.com/checkbox-x) by Krajee. This widget 
allows three checkbox states and includes additional styles. The plugin uses Bootstrap markup, glyphs, and CSS 3 styling by default, but it can be overridden 
with any other markup.

> NOTE: The checkbox plugin stores the values as integer format (and not boolean format) for checked and unchecked states.

## Features  

- The plugin offers the following three states and values for the checkboxes (note the integer values):
   - `1`: Checkbox is checked.
   - `0`: Checkbox is unchecked.
   - `null`: Checkbox is indeterminate.
- You can set the plugin to allow **three states** or the default **two states** for the checkbox.
- Specifically uses Bootstrap 3.x styles & glyphs. One can configure the checked, unchecked, and indeterminate icons to be shown for the checkboxes.
- Special CSS 3 styling, to enhance the control to look like any Bootstrap 3 form control. Supports the `has-error`, `has-success`, `has-warning`
   styling states like other Bootstrap form-controls.
- Plugin CSS styling automatically defaults the checkboxes to inline display. You can also control the markup for block display like in checkbox lists.
- You can add a `label` before or after with a `for` attribute and click on the label to change the checkbox values. Alternatively you can enclose the 
   input within a `label` tag as well.
- Ability to navigate to the checkbox controls via keyboard, and modify the values using the `space` bar on the keyboard.
- Ability to size the checkbox control. Five prebuilt size templates are available `xl`, `lg`, `md`, `sm`, and `xs`.
- Triggers JQuery events for advanced development. The plugin automatically triggers the `change` event for the input, whenever the checkbox value is changed via clicking. Events currently available are `change` and  `reset`.
- Ability to access methods and refresh the input dynamically via javascript at runtime.
- Disabled and readonly checkbox input support.
- Size of the entire plugin (JS and CSS) is less than 2KB when minified and gzipped. Its about 6KB when minified without gzipping (about 3KB for the JS and 3KB for the CSS).

### Demo
You can see detailed [documentation and examples](http://demos.krajee.com/checkbox-x) on usage of the extension.

### Latest Release
The latest version of the extension is release v1.0.3. Refer the [CHANGE LOG](https://github.com/kartik-v/yii2-checkbox-x/blob/master/CHANGE.md) for details of various releases.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

> NOTE: Check the [composer.json](https://github.com/kartik-v/yii2-checkbox-x/blob/master/composer.json) for this extension's requirements and dependencies. Read this [web tip /wiki](http://webtips.krajee.com/setting-composer-minimum-stability-application/) on setting the `minimum-stability` settings for your application's composer.json.

Either run

```
$ php composer.phar require kartik-v/yii2-checkbox-x "@dev"
```

or add

```
"kartik-v/yii2-checkbox-x": "@dev"
```

to the ```require``` section of your `composer.json` file.

## Usage

### CheckboxX

```php
use kartik\checkbox\CheckboxX;
echo CheckboxX::widget([
    'model' => $model,
    'attribute' => 'status',
    'pluginOptions' => [
        'threeState' => true,
        'size' => 'lg'
    ]
]); 
```

## License

**yii2-checkbox-x** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.