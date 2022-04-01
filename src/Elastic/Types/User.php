<?php

declare(strict_types=1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elastic\Types;

use JsonSerializable;

/**
 * Serializes to ECS Trace
 *
 * @version v1.x
 *
 * @see https://www.elastic.co/guide/en/ecs/current/ecs-user.html
 *
 * @author Philip Krauss <philip.krauss@elastic.co>
 */
class User extends BaseType implements JsonSerializable
{

    private array $data;

    /**
     * One or multiple unique identifiers of the user
     *
     * @internal core
     */
    final public function setId(string|int $id): void
    {
        $this->data['id'] = $id;
    }

    /**
     * Short name or login of the user
     *
     * @internal core
     */
    final public function setName(string $name) : void
    {
        $this->data['name'] = $name;
    }

    /**
     * Name of the directory the user is a member of
     */
    final public function setDomain(string $domain) : void
    {
        $this->data['domain'] = $domain;
    }

    /**
     * User's email address
     */
    final public function setEmail(string $email) : void
    {
        $this->data['email'] = $email;
    }

    /**
     * User’s full name, if available
     */
    final public function setFullName(string $fullName) : void
    {
        $this->data['full_name'] = $fullName;
    }

    /**
     * Unique user hash to correlate information for a user in anonymized form
     *
     * <em>Useful if user.id or user.name contain confidential information and cannot be used.</em>
     */
    final public function setHash(string $hash) : void
    {
        $this->data['hash'] = $hash;
    }

    public function jsonSerialize(): array
    {
        return ['user' => $this->data];
    }
}
