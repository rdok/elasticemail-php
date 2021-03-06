<?php

namespace ElasticEmail\ElasticEmail;

interface ClientInterface
{
    /** @return ClientInterface */
    public function handle(array $params = []);
}
