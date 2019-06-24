<?php
/**
 * Created by PhpStorm.
 * User: root1
 * Date: 2019-06-20
 * Time: 21:22
 */

/**
 * Class Paginate
 * 分页类
 */
class Paginate {
    public $current_page; # 当前页面
    public $items_per_page; # 每页有多少个东西
    public $item_total_count; # 总共有多少个东西

    /**
     * Paginate constructor.
     * @param int $page
     * @param int $items_per_page
     * @param int $item_total_count
     * 初始化一个分页对象，需要提供他的属性的这些参数
     */
    public function __construct($page=1, $items_per_page=4, $item_total_count=0) {
        $this->current_page = (int)$page;
        $this->items_per_page = (int)$items_per_page;
        $this->item_total_count = (int)$item_total_count;
    }

    public function next() {
        return $this->current_page + 1; # 当前页面加一就是下一页
    }

    public function previous() {
        return $this->current_page - 1; # 减一就是上一页
    }

    public function page_total() {
        # 计算总共有多少页，就是用 总的东西数除以每页有多少东西
        return ceil($this->item_total_count / $this->items_per_page);
    }


    public function has_previous() {
        # 检查当前页面是否存在前一页（第一页没有前一页）
        return $this->previous() >= 1;
    }

    public function has_next() {
        # 最后一页没有下一页
        return $this->next() <= $this->page_total();
    }

    public function offset( ) {
        # 偏移：有多少东西
        return ($this->current_page - 1)  * $this->items_per_page;
    }


}