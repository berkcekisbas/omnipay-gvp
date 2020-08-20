<?php
/**
 * Gvp Capture Response
 */

namespace Omnipay\Gvp\Messages;

class CaptureResponse extends AbstractResponse
{
    /**
     * @return boolean
     */
    public function isSuccessful(): bool
    {
        return $this->data["Transaction"]->Response->Code === '00';
    }
}
