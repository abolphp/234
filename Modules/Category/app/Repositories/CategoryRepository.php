<?php

namespace Modules\Category\app\Repositories;

use Modules\Category\app\Models\Category;

class CategoryRepository
{
    public function all() {
        $categories = Category::all()->toArray();

        return $this->buildTree($categories);
    }


    private function buildTree(array $categories, $parentId = null) {
        $tree = [];

        foreach ($categories as $category) {
            if ($category['parent_id'] == $parentId) {

                $children = $this->buildTree($categories, $category['id']);

                if (!empty($children)) {
                    $category['children'] = $children;
                } else {
                    $category['children'] = [];
                }

                $tree[] = $category;
            }
        }

        return $tree;
    }



    public function store($values){
       return Category::create([
            "name" => $values->get("name"),
            "slug" => $values->get("slug"),
            "parent_id" => (int)$values->get("parent_id"),
        ]);
    }

    public function FindById($id){
        return Category::find($id);
    }

    public function update($values, $id){
        $Category = $this->findById($id);
        $Category->update([
            "name" => $values->get("name"),
            "slug" => $values->get("slug"),
            "parent_id" => $values->get("parent_id"),
        ]);
    }
}
