<?php

namespace Koen\AcademyBlogCore\Api\Data;

interface PostInterface extends ReadablePostInterface, MutablePostInterface
{
    // The Post
    public const TITLE = 'title';
    public const BODY = 'body';

    // Settings
    public const URL_KEY = 'url_key';
}
