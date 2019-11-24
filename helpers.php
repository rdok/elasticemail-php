<?php
/**
 * @author  Rizart Dokollari
 * @since   12/24/17
 */
function dd($variable)
{
    var_dump($variable);
    exit;
}

function subject($functionName)
{
    return sprintf('ElasticEmail Test: %s', $functionName);
}
