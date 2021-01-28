<?php declare(strict_types=1);

namespace Koen\AcademyBlogCore\Repository\Blog;

use Koen\AcademyBlogCore\Api\Data\Post\ReadablePostInterface;

interface PostCollectionRepositoryInterface
{
    /**
     * Returns a collection of Posts
     * @return ReadablePostInterface[]
     */
    public function getItems(): array;
}
