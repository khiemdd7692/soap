<?php

app()->router->get('fpt/{key}/server', [
    'as' => 'soap.server.wsdl',
    'uses' => '\KhiemDD\Soap\SoapController@server'
]);

app()->router->post('fpt/{key}/server', [
    'as' => 'soap.server',
    'uses' => '\KhiemDD\Soap\SoapController@server'
]);
