<?php

declare(strict_types=1);

namespace Fschmtt\Keycloak\Resource;

use Fschmtt\Keycloak\Json\JsonDecoder;
use Fschmtt\Keycloak\Json\JsonEncoder;
use Fschmtt\Keycloak\Representation\Realm;

class Realms extends Resource
{
    private const BASE_PATH = '/auth/admin/realms';

    public function all(): array
    {
        /** @var Realm[] $realms */
        $realms = [];

        $response = (string) $this->httpClient->request(
            'GET',
            self::BASE_PATH
        )->getBody();

        $decoded = (new JsonDecoder())->decode($response);

        foreach ($decoded as $realm) {
            $realms[] = Realm::from($realm);
        }

        return $realms;
    }

    public function get(string $realm): Realm
    {
        return Realm::fromJson(
            (string) $this->httpClient->request(
                'GET',
                self::BASE_PATH . '/' . $realm
            )->getBody()
        );
    }

    public function import(Realm $realm): Realm
    {
        $body = (new JsonEncoder())->encode($realm->jsonSerialize());

        $this->httpClient->request(
            'POST',
            self::BASE_PATH,
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => $body
            ]
        );

        return $this->get($realm->getRealm());
    }

    public function update(Realm $realm): Realm
    {
        $body = (new JsonEncoder())->encode($realm->jsonSerialize());

        $this->httpClient->request(
            'PUT',
            self::BASE_PATH . '/' . $realm->getRealm(),
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => $body
            ]
        );

        return $this->get($realm->getRealm());
    }
}
