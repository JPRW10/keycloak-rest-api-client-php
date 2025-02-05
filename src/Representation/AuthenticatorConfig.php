<?php

declare(strict_types=1);

namespace Fschmtt\Keycloak\Representation;

use Fschmtt\Keycloak\Type\Map;
use PHPUnit\Framework\Attributes\IgnoreClassForCodeCoverage;

/**
 * @method string|null getAlias()
 * @method Map|null getConfig()
 * @method string|null getId()
 * @method self withAlias(?string $alias)
 * @method self withConfig(?Map $config)
 * @method self withId(?string $id)
 */
#[IgnoreClassForCodeCoverage(self::class)]
class AuthenticatorConfig extends Representation
{
    public function __construct(
        protected ?string $alias = null,
        protected ?Map $config = null,
        protected ?string $id = null,
    ) {
    }
}
