<?php
//
// +---------------------------------------------------------------------+
// | CODE INC. SOURCE CODE                                               |
// +---------------------------------------------------------------------+
// | Copyright (c) 2017 - Code Inc. SAS - All Rights Reserved.           |
// | Visit https://www.codeinc.fr for more information about licensing.  |
// +---------------------------------------------------------------------+
// | NOTICE:  All information contained herein is, and remains the       |
// | property of Code Inc. SAS. The intellectual and technical concepts  |
// | contained herein are proprietary to Code Inc. SAS are protected by  |
// | trade secret or copyright law. Dissemination of this information or |
// | reproduction of this material  is strictly forbidden unless prior   |
// | written permission is obtained from Code Inc. SAS.                  |
// +---------------------------------------------------------------------+
//
// Author:   Joan Fabrégat <joan@codeinc.fr>
// Date:     23/02/2018
// Time:     17:52
// Project:  lib-psr7responses
//
declare(strict_types = 1);
namespace CodeInc\Psr7Responses;
use GuzzleHttp\Psr7\Response;


/**
 * Class JsonResponse
 *
 * @package CodeInc\Psr7Responses
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class JsonResponse extends Response {
	public const DEFAULT_CHARSET = "utf-8";

	/**
	 * TextResponse constructor.
	 *
	 * @param string|array|object $json
	 * @param string|null $charset
	 * @param int $status
	 * @param array $headers
	 * @param string $version
	 * @param null|string $reason
	 */
	public function __construct($json, ?string $charset = null, int $status = 200, array $headers = [],
		string $version = '1.1', ?string $reason = null)
	{
		if (!is_string($json)) {
			$json = json_encode($json);
		}
		$headers["Content-Type"] = "application/json; charset=".($charset ?? self::DEFAULT_CHARSET);
		parent::__construct($status, $headers, $json, $version, $reason);
	}
}