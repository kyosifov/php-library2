<?php
/*
Copyright 2013 Urban Airship and Contributors
*/

namespace UrbanAirship\Devices\DeviceLookup;


class APIDLookup
{

    const LOOKUP_URL = "/api/apids/";

    /**
     * @var object Device info for device id
     */
	private $deviceInfo;

    function __construct($airship, $deviceId)
	{
		$this->airship = $airship;
		$this->lookup_url = $airship->buildUrl(static::LOOKUP_URL.$deviceId);
	}

	function APIDInfo() {
		$url = $this->lookup_url;
		$response = $this->airship->request("GET", null, $url, null, 3);
        $this->deviceInfo = json_decode($response->raw_body);
        return $this->deviceInfo;
	}

}