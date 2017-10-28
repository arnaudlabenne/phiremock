<?php
/**
 * This file is part of Phiremock.
 *
 * Phiremock is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Phiremock is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Phiremock.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Mcustiel\Phiremock\Domain;

use Mcustiel\SimpleRequest\Annotation\Filter as SRF;
use Mcustiel\SimpleRequest\Annotation\Validator as SRV;

class Response implements \JsonSerializable
{
    /**
     * @SRF\DefaultValue(200)
     * @SRV\OneOf({
     *      @SRV\Type("integer"),
     *      @SRV\Not(@SRV\NotNull)
     * })
     *
     * @var int
     */
    private $statusCode = 200;
    /**
     * @SRF\CustomFilter(class="\Mcustiel\Phiremock\Server\Http\ResponseFilters\JsonToString")
     * @SRV\OneOf({
     *      @SRV\Type("string"),
     *      @SRV\Not(@SRV\NotNull)
     * })
     *
     * @var string
     */
    private $body;
    /**
     * @SRV\OneOf({
     *      @SRV\Type("array"),
     *      @SRV\Not(@SRV\NotNull)
     * })
     *
     * @var array
     */
    private $headers;
    /**
     * @SRV\OneOf({
     *      @SRV\AllOf({
     *          @SRV\Type("integer"),
     *          @SRV\Minimum(0)
     *      }),
     *      @SRV\Not(@SRV\NotNull)
     * })
     *
     * @var int
     */
    private $delayMillis;

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    public function setHeaders($headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return int
     */
    public function getDelayMillis()
    {
        return $this->delayMillis;
    }

    public function setDelayMillis($delayMillis)
    {
        $this->delayMillis = $delayMillis;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'statusCode'  => $this->statusCode,
            'body'        => $this->body,
            'headers'     => $this->headers,
            'delayMillis' => $this->delayMillis,
        ];
    }
}
