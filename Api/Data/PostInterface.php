<?php

namespace Koen\AcademyBlogCore\Api\Data;

interface PostInterface
{
    public const TITLE = 'title';
    public const BODY = 'body';
    public const URL_KEY = 'url_key';

    public function getId();

    public function getTitle(): string;

    public function getUrlKey(): string;

    public function getBody(): string;

    public function getViewUrl(bool $seo = true): string;

    public function setId($id): void;

    public function setTitle(string $title): void;

    public function setUrlKey(string $urlKey): void;

    public function setBody(string $body): void;
}
