<?php

namespace App\Tests;

use App\Panther\ArohaTestCase;


class ArohaTest extends ArohaTestCase
{
    public function testSomething(): void
    {

        // objekt browser
        $client = $this->getBrowserClient();

        // nacitanie homepage
        $crawler = $client->request('GET', '');

        // $this->takeScreenshot('homepage.png');

        // overenie
        $this->assertPageTitleContains('Aroha');
        $this->assertSelectorTextContains('.footer-widgets-wrapper','Git repos');
        $this->assertSelectorTextContains('.footer-widgets-wrapper','Kontakt');
        $this->assertSelectorTextContains('.header-footer-group > div > aside > div > div.footer-widgets.column-two.grid-item > div > div > div > p:nth-child(1)','Matej');
        $this->assertSelectorTextContains('div.post-inner.thin > div','Konzultácie');

        // vypnutie browsera
        $client->quit();

    }

}
