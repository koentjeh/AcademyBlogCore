<?php

namespace Koen\AcademyBlogCore\Model\Blog;

use Koen\AcademyBlogCore\Api\Data\PostInterface;
use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel implements PostInterface
{
    protected function _construct()
    {
        $this->_init();
    }

    public function getTitle(): string
    {
        $this->getData(PostInterface::TITLE);
    }

    public function getUrlKey(): string
    {
        $this->getData(PostInterface::URL_KEY);
    }

    public function getBody(): string
    {
        $this->getData(PostInterface::BODY);
    }

    public function setTitle(string $title): void
    {
        $this->setData(PostInterface::TITLE, $title);
    }

    public function setUrlKey(string $urlKey): void
    {
        $urlKey = $this->sanitizeString($urlKey);

        $this->setData(PostInterface::URL_KEY, $urlKey);
    }

    public function setBody(string $body): void
    {
        $this->setData(PostInterface::BODY, $body);
    }

    private function sanitizeString(string $string): string
    {
        return strtolower(preg_replace('/([^a-zA-Z0-9]+)/', '-', $string));
    }
}
