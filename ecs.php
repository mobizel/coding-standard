<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ClassNotation\VisibilityRequiredFixer;
use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\Import\OrderedImportsFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(SetList::PHP_CS_FIXER);

    $services = $containerConfigurator->services();
    $services->set(DeclareStrictTypesFixer::class);
    $services->set(OrderedImportsFixer::class);
    $services->set(NoUnusedImportsFixer::class);

    $parameters = $containerConfigurator->parameters();
    $parameters->set('skip', [VisibilityRequiredFixer::class => ['*Spec.php']]);
};
