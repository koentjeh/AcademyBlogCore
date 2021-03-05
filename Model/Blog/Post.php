<?php declare(strict_types=1);

namespace Koen\AcademyBlogCore\Model\Blog;

use Koen\AcademyBlogCore\Api\Data\PostInterface;
use Koen\AcademyBlogCore\Model\Blog\Resource\PostResource;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Registry;
use Magento\Framework\UrlInterface;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource;

class Post extends AbstractModel implements PostInterface
{
    private $url;

    public function __construct(
        UrlInterface $url,
        Context $context,
        Registry $registry,
        AbstractResource $resource = null,
        AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
        $this->url = $url;
    }

    protected function _construct()
    {
        $this->_init(PostResource::class);
    }

    public function getTitle(): string
    {
        return $this->getData(PostInterface::TITLE);
    }

    public function getUrlKey(): string
    {
        return $this->getData(PostInterface::URL_KEY);
    }

    public function getBody(): string
    {
        return $this->getData(PostInterface::BODY);
    }

    public function getId()
    {
        return $this->getData('id');
    }

    public function setId($id): void
    {
        $this->setData('id', $id);
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

    public function getViewUrl(bool $seo = true): string
    {
        if (!$seo) {
            return $this->url->getUrl('blog/post/view', ['id' => $this->getId()]);
        }

        return $this->url->getUrl('blog/' . $this->getUrlKey());
    }
}
