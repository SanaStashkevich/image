Расширение для загрузки картинки по URL
=======================================
Расширение для загрузки картинки по URL (jpg, png, gif). 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist sana/yii2-image-by-url "*"
```

or add

```
"sana/yii2-image-by-url": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :
```
<?php

namespace app\commands;

use yii\console\Controller;
use sana\image\Loader;

class LoadController extends Controller
{

    public function actionLoad($from, $to)
    {
        $loader = new  Loader();
        $loader->load($from,$to);
    }
}
```