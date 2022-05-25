<?php
namespace App\Panther;

use Symfony\Component\Panther\PantherTestCase;

abstract class ArohaTestCase extends PantherTestCase
{

    private ?\Symfony\Component\Panther\Client $client = NULL;

    public function getBrowserClient(): \Symfony\Component\Panther\Client
    {
        if ($this->client) {
            return $this->client;
        }
        $this->client = static::createPantherClient();
        return $this->client;
    }

    public function isDisabledScreenshot() {
        if (getenv('DISABLED_SCREENSHOT') && (bool)getenv('DISABLED_SCREENSHOT')) {
            return true;
        }
        return false;
    }

    public function takeScreenshot($filename)
    {
        if ($this->isDisabledScreenshot()) {
            return;
        }
        $this->getBrowserClient()->takeScreenshot('./screenshots/'.$filename);
    }

}