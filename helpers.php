<?php

function dd($variable)
{
    var_dump($variable);
    exit;
}

function subject($functionName)
{
    return sprintf('ElasticEmail Test: %s', $functionName);
}
