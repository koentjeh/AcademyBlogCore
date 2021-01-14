<?php

namespace Koen\AcademyBlogCore\Api\Data;

interface ReadablePostInterface
{
    public function getTitle(): string;

    public function getUrlKey(): string;

    public function getBody(): string;
}
