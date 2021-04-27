<h1 align="center">
    Coding Standard
</h1>

:1st_place_medal: Battle-tested coding standard configuration used at Mobizel.

Installation & usage
--------------------

1. Install this package:

    ```bash
    $ composer require --dev mobizel/coding-standard
    ```

2. Import the configuration file in your `ecs.php`:

    ```php
    $containerConfigurator->import('vendor/mobizel/coding-standard/ecs.php');
    ```

Example config (ecs.php)
------------------------

 ```php
<?php

use PhpCsFixer\Fixer\Comment\HeaderCommentFixer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import('vendor/mobizel/coding-standard/ecs.php');

    $header = <<<EOM
This file is part of <The Project>.

(c) Mobizel

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOM;

    $services = $containerConfigurator->services();
    $services
        ->set(HeaderCommentFixer::class)
        ->call('configure', [[
            'header' => $header,
            'location' => 'after_open',
        ]])
    ; 
};
 ```
