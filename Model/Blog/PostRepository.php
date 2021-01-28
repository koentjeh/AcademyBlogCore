<?php

namespace Koen\AcademyBlogCore\Model\Blog;

use Koen\AcademyBlogCore\Api\Data\PostInterface;
use Koen\AcademyBlogCore\Api\PostRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

class PostRepository implements PostRepositoryInterface
{

    public function save(PostInterface $post): bool
    {
        // TODO: Implement save() method.
    }

    public function get(int $postId): PostInterface
    {
        // TODO: Implement get() method.
    }

    public function delete(PostInterface $post): bool
    {
        // TODO: Implement delete() method.
    }

    public function deleteById(int $postId): bool
    {
        // TODO: Implement deleteById() method.
    }

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        // TODO: Implement getList() method.
    }
}
