<?php declare(strict_types=1);

namespace Koen\AcademyBlogCore\Repository\Blog;

use Koen\AcademyBlogCore\Api\Data\PostInterface;
use Koen\AcademyBlogCore\Api\Data\PostInterfaceFactory;
use Koen\AcademyBlogCore\Api\PostRepositoryInterface;
use Koen\AcademyBlogCore\Model\Blog\Post;
use Koen\AcademyBlogCore\Model\Blog\Resource\Collection\PostCollection;
use Koen\AcademyBlogCore\Model\Blog\Resource\PostResource;
use Magento\Framework\Api\SearchCriteria;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchResults;
use Magento\Framework\Api\SearchResultsFactory;
use Magento\Framework\Exception\AlreadyExistsException;
use Psr\Log\LoggerInterface;

class PostRepository implements PostRepositoryInterface
{
    private $postResource;
    private $postFactory;
    private $postCollection;
    private $searchCriteriaBuilder;
    private $collectionProcessor;
    private $searchResultsFactory;
    private $logger;

    public function __construct(
        PostResource $postResource,
        PostInterfaceFactory $postFactory,
        PostCollection $postCollection,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        CollectionProcessorInterface $collectionProcessor,
        SearchResultsFactory $searchResultsFactory,
        LoggerInterface $logger
    ) {
        $this->postResource = $postResource;
        $this->postFactory = $postFactory;
        $this->postCollection = $postCollection;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->logger = $logger;
    }

    public function save(PostInterface $post): PostInterface
    {
        try {
            $this->postResource->save($post);
        } catch (\Exception $exception) {
            $this->logger->critical($exception->getMessage());
        }

        return $post;
    }

    public function create(array $data = []): PostInterface
    {
        return $this->postFactory->create($data);
    }

    public function get(int $postId): PostInterface
    {
        $post = $this->postFactory->create();
        $this->postResource->load($post, $postId, 'id');

        return $post;
    }

    public function delete(PostInterface $post): PostInterface
    {
        try {
            $this->postResource->delete($post);
        } catch (\Exception $exception) {
            $this->logger->critical($exception->getMessage());
        }

        return $post;
    }

    /**
     * @param SearchCriteria|null $searchCriteria
     * @return SearchResults
     */
    public function getList(?SearchCriteria $searchCriteria = null): SearchResults
    {
        if (!$searchCriteria) {
            $searchCriteria = $this->getSearchCriteriaBuilder()->create();
        }

        $collection = $this->postCollection;

        $this->collectionProcessor->process($searchCriteria, $collection);
        $collection->load();

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    public function getItems(?SearchCriteria $searchCriteria = null)
    {
        return $this->getList($searchCriteria)->getItems();
    }

    public function getSearchCriteriaBuilder(): SearchCriteriaBuilder
    {
        return $this->searchCriteriaBuilder;
    }
}
