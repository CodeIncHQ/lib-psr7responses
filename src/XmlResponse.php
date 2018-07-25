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
// Project:  Psr7Responses
//
declare(strict_types = 1);
namespace CodeInc\Psr7Responses;
use GuzzleHttp\Psr7\Response;


/**
 * Class XmlResponse
 *
 * @package CodeInc\Psr7Responses
 * @author Joan Fabrégat <joan@codeinc.fr>
 * @license MIT <https://github.com/CodeIncHQ/Psr7Responses/blob/master/LICENSE>
 * @link https://github.com/CodeIncHQ/Psr7Responses
 */
class XmlResponse extends Response
{
	public const DEFAULT_CHARSET = "utf-8";

    /**
     * @var string
     */
	private $xml;

    /**
     * @var null|string
     */
	private $charset;

	/**
	 * TextResponse constructor.
	 *
	 * @param string $xml
	 * @param string|null $charset
	 * @param int $status
	 * @param array $headers
	 * @param string $version
	 * @param null|string $reason
	 */
	public function __construct(string $xml, ?string $charset = null, int $status = 200, array $headers = [],
		string $version = '1.1', ?string $reason = null)
	{
	    $this->xml = $xml;
	    $this->charset = $charset;
		$headers["Content-Type"] = "application/xml; charset=".($charset ?? self::DEFAULT_CHARSET);
		parent::__construct($status, $headers, $xml, $version, $reason);
	}

    /**
     * @return string
     */
    public function getXml():string
    {
        return $this->xml;
    }

    /**
     * @return null|string
     */
    public function getCharset():?string
    {
        return $this->charset;
    }
}