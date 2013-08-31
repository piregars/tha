<?php

namespace Tha\StoreBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ThaStoreBundle extends Bundle
{
    public function getParent()
    {
        return 'MsiStoreBundle';
    }
}
