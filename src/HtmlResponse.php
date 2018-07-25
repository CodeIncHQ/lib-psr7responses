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
// Time:     17:53
// Project:  Psr7Responses
//
declare(strict_types = 1);
namespace CodeInc\Psr7Responses;
use GuzzleHttp\Psr7\Response;


/**
 * Class HtmlResponse
 *
 * @package CodeInc\Psr7Responses
 * @author Joan Fabrégat <joan@codeinc.fr>
 * @license MIT <https://github.com/CodeIncHQ/Psr7Responses/blob/master/LICENSE>
 * @link https://github.com/CodeIncHQ/Psr7Responses
 */
class HtmlResponse extends Response
{
	public const DEFAULT_CHARSET = "utf-8";

    /**
     * @var string
     */
	private $html;

    /**
     * @var null|string
     */
	private $charset;

	/**
	 * HtmlResponse constructor.
	 *
	 * @param string $html
	 * @param null|string $charset
	 * @param int $status
	 * @param array $headers
	 * @param string $version
	 * @param null|string $reason
	 */
	public function __construct(string $html, ?string $charset = null, int $status = 200, array $headers = [],
		string $version = '1.1', ?string $reason = null)
	{
		$headers["Content-Type"] = "text/html; charset=".($charset ?? self::DEFAULT_CHARSET);
		$this->html = $html;
		$this->charset = $charset;
		parent::__construct($status, $headers, $html, $version, $reason);
	}

    /**
     * Returns the HTML code.
     *
     * @return string
     */
    public function getHtml():string
    {
        return $this->html;
    }

    /**
     * @return null|string
     */
    public function getCharset():?string
    {
        return $this->charset;
    }
}