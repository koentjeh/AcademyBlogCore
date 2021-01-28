<?php

namespace Koen\AcademyBlogCore\Repository\Blog;

use Koen\AcademyBlogCore\Api\Data\PostInterface;

interface PostRepositoryInterface
{
    public function getById(int $id): PostInterface;

    public function getByKey(PostInterface $key, $value): PostInterface;

    public function save(PostInterface $post): void;

    public function delete(PostInterface $post): void;
}
