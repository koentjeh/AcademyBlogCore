<?php

namespace Koen\AcademyBlogCore\Api;

use Koen\AcademyBlogCore\Api\Data\PostInterface;
use Magento\Framework\Api\SearchCriteria;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchResults;

interface PostRepositoryInterface
{
    /**
     * Create post
     *
     * @param PostInterface $post
     * @return bool
     */
    public function save(PostInterface $post): PostInterface;

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
    public function delete(PostInterface $post): PostInterface;

    /**
     * @param SearchCriteria|null $searchCriteria
     * @return PostInterface[]
     */
    public function getItems(?SearchCriteria $searchCriteria = null);

    /**
     * @param SearchCriteria|null $searchCriteria
     * @return SearchResults
     */
    public function getList(?SearchCriteria $searchCriteria = null): SearchResults;

    /**
     * @return SearchCriteriaBuilder
     */
    public function getSearchCriteriaBuilder(): SearchCriteriaBuilder;
}
