<?php
/**
 * Created by PhpStorm.
 * User: root1
 * Date: 2019-06-20
 * Time: 21:22
 */

class Paginate {
    public $current_page;
    public $items_per_page;
    public $item_total_count;

    public function __construct($page=1, $items_per_page=4, $item_total_count=0) {
        $this->current_page = (int)$page;
        $this->items_per_page = (int)$items_per_page;
        $this->item_total_count = (int)$item_total_count;
    }

    public function next() {
        return $this->current_page + 1;
    }

    public function previous() {
        return $this->current_page - 1;
    }

    public function page_total() {
        return ceil($this->item_total_count / $this->items_per_page);
    }

    public function has_previous() {
        return $this->previous() >= 1;
    }

    public function has_next() {
        return $this->next() <= $this->page_total();
    }

    public function offset( ) {
        return ($this->current_page - 1)  * $this->items_per_page;
    }


}