<?php

namespace Koen\AcademyBlogCore\Model\Blog\Resource\Collection;

use Koen\AcademyBlogCore\Model\Blog\Post;
use Koen\AcademyBlogCore\Model\Blog\Resource\PostResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class PostCollection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Post::class, PostResource::class);
    }
}
