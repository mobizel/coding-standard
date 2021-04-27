<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ClassNotation\VisibilityRequiredFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->set(DeclareStrictTypesFixer::class);

    $parameters = $containerConfigurator->parameters();

    $parameters->set(Option::SETS, [SetList::SYMFONY]);

    $parameters->set('skip', [VisibilityRequiredFixer::class => ['*Spec.php']]);
};
