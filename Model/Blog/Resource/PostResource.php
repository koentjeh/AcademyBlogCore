<?php declare(strict_types=1);

namespace Koen\AcademyBlogCore\Model\Blog\Resource;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class PostResource extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('academy_blog_post', 'post_id');
    }
}
