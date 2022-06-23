<?php

namespace KhiemDD\Soap\API;


use SoapFault;
use KhiemDD\Soap\API\ApiProvider as Provider;


/**
 * An example of a class that is used as a SOAP gateway to application functions.
 */
class ApiService
{
    /*
    |--------------------------------------------------------------------------
    | Public Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Received SMS and push to Queue
     *
     * @param string $PhoneNumber
     * @param string $FullMsg
     * @param string $Brandname
     * @param string $Username
     * @param string $Password
     * @return \KhiemDD\Soap\API\Types\Service
     * @throws SoapFault
     */
    public function doMessageSend($PhoneNumber, $FullMsg, $Brandname, $Username = '', $Password = '')
    {

        if (! $PhoneNumber || ! $FullMsg || !$Brandname) {
            \Log::info('Please specify input');
            return Provider::FailResponse();
        }

        if (! Provider::authenticate($Username, $Password)) {
            \Log::info('Invalid User or Password');
            return Provider::FailResponse();
        }

        return Provider::SendSMS($PhoneNumber, $FullMsg, $Brandname);
    }

}
