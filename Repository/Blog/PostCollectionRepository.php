<?php

namespace Koen\AcademyBlogCore\Repository\Blog;

use Koen\AcademyBlogCore\Api\Data\PostInterface;
use Koen\AcademyBlogCore\Model\Blog\Resource\Collection\PostCollection;
use Koen\AcademyBlogCore\Model\Blog\Resource\PostResource;

class PostCollectionRepository implements PostCollectionRepositoryInterface
{
    /** @var PostResource */
    protected $postResource;

    /** @var PostInterfaceFactory */
    protected $postFactory;

    /** @var PostCollection */
    protected $postCollection;

    /**
     * PostCollectionRepository constructor.
     * @param PostResource $postResource
     * @param PostInterfaceFactory $postFactory
     * @param PostCollection $postCollection
     */
    public function __construct(
        PostResource $postResource,
        PostInterfaceFactory $postFactory,
        PostCollection $postCollection
    ) {
        $this->postResource = $postResource;
        $this->postFactory = $postFactory;
        $this->postCollection = $postCollection;
    }

    /** @inheritDoc */
    public function getItems(): array
    {
        return $this->postCollection->getItems();
    }
}
