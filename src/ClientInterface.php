<?php
/**
 * @author  Rizart Dokollari <***REMOVED***>
 * @since   12/24/17
 */

namespace ElasticEmail\ElasticEmail;


interface ClientInterface
{
    /** @return ClientInterface */
    public function handle(array $params = []);
}