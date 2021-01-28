<?php

namespace Koen\AcademyBlogCore\Api\Data;

interface PostSearchResultsInterface
{
    /**
     * Get attributes list.
     *
     * @return PostInterface[]
     */
    public function getItems(): array;
}
