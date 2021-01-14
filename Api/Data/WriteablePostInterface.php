<?php

namespace Koen\AcademyBlogCore\Api\Data;

use Magento\Tests\NamingConvention\true\string;

interface WriteablePostInterface
{
    public function setTitle(string $title): void;

    public function setUrlKey(string $urlKey): void;

    public function setBody(string $body): void;
}
