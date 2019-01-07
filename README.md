yii2-kartikgii
==============

Gii CRUD Generator base on kartik-v extension. Save repeatitive works on every new CRUD generated. Below are some of the features:

- Data grid view are generated using kartik-v/yii2-grid, pjax are use for the grid
- Detail View are generated using kartik-v/yii2-detail-view, controllers are generated to support edit mode saving and delete in Detail View.
- _form are generated using kartik-v/yii2-builder, Date/Time/DateTime/TimeStamp column are automatically generated to use DateTimePicker Widget.
- Using kartik-v/yii2-datecontrol to globalize date format, so date will automatically convert for the display and also for save according to the format you set, for all CRUD generated using this extension.

By using this extension, you no longer have to change your CRUD to using kartik-v extension, everything will be auto generated for you, and you could customize it later if you need.

Thanks for the great kartik-v extension. 

For more information about kartik-v extension, please visit [kartik-v at Github](https://www.github.com/kartik-v).

> NOTE: This is the first extension i created, please kindly comment or suggest for better or correct me if im doing anything wrong. Thanks.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ composer require hmtvltk2/yii2-kartikgii "dev-master"
```

or add

```
"hmtvltk2/yii2-kartikgii": "dev-master"
```

to the ```require``` section of your `composer.json` file.

## Usage

```php
//Add this into backend/config/main-local.php
$config['modules']['gii']['generators'] = [
        'kartikgii-crud' => ['class' => 'warrence\kartikgii\crud\Generator'],
    ];
```

```php
//Add 'gridview' into your 'modules' section in backend/config/main.php
'modules' => [
        'gridview' => [
            'class' => 'kartik\grid\Module',
        ],

    ],
```

```php
//add modules 'datecontrol' into your 'modules' section in common/config/main 
'modules' => [
        'datecontrol' => 'kartik\datecontrol\Module',
    ],
```

```php
// Add formatter
'components' => [
  'formatter' => [
            'dateFormat' => 'dd/MM/yyyy',
            'timeFormat' => 'hh:mm:ss a',
            'datetimeFormat' => 'dd/MM/yyyy hh:mm:ss a'
   ],
   ...
]
```

## License

**yii2-kartikgii** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.
