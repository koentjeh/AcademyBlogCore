<?php

namespace Koen\AcademyBlogCore\Repository\Blog;

use Koen\AcademyBlogCore\Api\Data\PostInterface;
use Koen\AcademyBlogCore\Model\Blog\Resource\Collection\PostCollection;
use Koen\AcademyBlogCore\Model\Blog\Resource\PostResource;

class PostRepository implements PostRepositoryInterface
{
    /*** @var PostResource */
    protected $postResource;

    /*** @var PostInterfaceFactory */
    protected $postFactory;

    /*** @var PostCollection */
    protected $postCollection;

    public function __construct(
        PostResource $postResource,
        PostInterfaceFactory $postFactory,
        PostCollection $postCollection
    ) {
        $this->postResource = $postResource;
        $this->postFactory = $postFactory;
        $this->postCollection = $postCollection;
    }

    public function getById(int $id): PostInterface
    {
        $post = $this->postFactory->create();
        $this->postResource->load($post, $id, 'post_id');

        return $post;
    }

    public function getByKey(PostInterface $key, $value): PostInterface
    {
        $post = $this->postFactory->create();
        $this->postResource->load($post, $value, $key);

        return $post;
    }

    public function save(PostInterface $post): void
    {
        $this->postResource->save($post);
    }

    public function delete(PostInterface $post): void
    {
        $this->postResource->delete($post);
    }
}
