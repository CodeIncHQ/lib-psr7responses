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
 * Class TextResponse
 *
 * @package CodeInc\Psr7Responses
 * @author Joan Fabrégat <joan@codeinc.fr>
 * @license MIT <https://github.com/CodeIncHQ/Psr7Responses/blob/master/LICENSE>
 * @link https://github.com/CodeIncHQ/Psr7Responses
 * @version 2
 */
class TextResponse extends Response
{
    public const DEFAULT_HEADERS = [
        'Content-Type' => 'text/plain; charset=utf-8'
    ];

    /**
     * @var string
     */
	private $text;

    /**
     * TextResponse constructor.
     *
     * @param string $text
     * @param int $code
     * @param string $reasonPhrase
     * @param array $headers
     * @param string $version
     */
	public function __construct(string $text, int $code = 200, string $reasonPhrase = '',
        array $headers = self::DEFAULT_HEADERS, string $version = '1.1')
	{
		parent::__construct($code, $headers, $text, $version, $reasonPhrase);
	}

    /**
     * @return string
     */
    public function getText():string
    {
        return $this->text;
    }
}