<?php

namespace Koen\AcademyBlogCore\Api\Data;

interface MutablePostInterface
{
    public function setTitle(string $title): void;

    public function setUrlKey(string $urlKey): void;

    public function setBody(string $body): void;
}
