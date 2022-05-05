<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ControlStructure\TrailingCommaInMultilineFixer;
use PhpCsFixer\Fixer\ClassNotation\VisibilityRequiredFixer;
use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\Import\OrderedImportsFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocAlignFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitInternalClassFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitMethodCasingFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitTestClassRequiresCoversFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use PhpCsFixer\Fixer\Strict\StrictComparisonFixer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(SetList::SYMFONY);

    $services = $containerConfigurator->services();
    $services->set(DeclareStrictTypesFixer::class);
    $services->set(OrderedImportsFixer::class);
    $services->set(NoUnusedImportsFixer::class);
    $services->set(StrictComparisonFixer::class);

    $services->set(PhpdocAlignFixer::class)
        ->call('configure', [[
            'align' => 'left',
            'tags' => ['method', 'param', 'property', 'return', 'throws', 'type', 'var'],
        ]]);

    $services->set(TrailingCommaInMultilineFixer::class)
        ->call('configure', [['elements' => ['arrays', 'arguments', 'parameters']]]);

    $parameters = $containerConfigurator->parameters();
    $parameters->set('skip', [
        VisibilityRequiredFixer::class => ['*Spec.php'],
        PhpUnitTestClassRequiresCoversFixer::class => ['*Test.php'],
        PhpUnitInternalClassFixer::class => ['*Test.php'],
        PhpUnitMethodCasingFixer::class => ['*Test.php'],
    ]);
};
