<?php

namespace Koen\AcademyBlogCore\Api;

use Koen\AcademyBlogCore\Api\Data\PostInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface PostRepositoryInterface
{
    /**
     * Create post
     *
     * @param PostInterface $post
     * @return bool
     */
    public function save(PostInterface $post): bool;

    /**
     * Get post by post id
     *
     * @param int $postId
     * @return PostInterface
     */
    public function get(int $postId): PostInterface;

    /**
     * Delete post
     *
     * @param PostInterface $post
     * @return bool
     */
    public function delete(PostInterface $post): bool;

    /**
     * @param int $postId
     * @return bool
     */
    public function deleteById(int $postId): bool;

    /**
     * Get product list
     *
     * @param SearchCriteriaInterface $searchCriteria
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
