<?php

declare(strict_types=1);

namespace Fschmtt\Keycloak\Representation;

use Fschmtt\Keycloak\Collection\ScopeCollection;
use Fschmtt\Keycloak\Type\Map;
use PHPUnit\Framework\Attributes\IgnoreClassForCodeCoverage;

#[IgnoreClassForCodeCoverage(self::class)]
class Resource extends Representation
{
    public function __construct(
        protected ?string $id,
        protected ?Map $attributes,
        protected ?string $displayName,
        protected ?string $icon_uri,
        protected ?string $name,
        protected ?bool $ownerManagedAccess,
        protected ?ScopeCollection $scopes,
        protected ?string $type,
        /** @var string[]|null */
        protected ?array $uris,
    ) {
    }
}
