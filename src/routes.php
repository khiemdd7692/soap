<?php

app()->router->get('zoap/{key}/server', [
    'as' => 'soap.server.wsdl',
    'uses' => '\KhiemDD\Soap\SoapController@server'
]);

app()->router->post('zoap/{key}/server', [
    'as' => 'soap.server',
    'uses' => '\KhiemDD\Soap\SoapController@server'
]);
