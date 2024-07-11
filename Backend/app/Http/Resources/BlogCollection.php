<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BlogCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'data' => $this->collection->map(function ($data) {
                return [
                    'id' => $data->id,
                    'title' => $data->title,
                    'slug' => $data->slug,
                    'category_slug' => $data->category_slug,
                    'thumbnail_url' => isset($data->thumbnail) ? url($data->thumbnail) : null,
                    'thumbnail' => $data->thumbnail,
                    'banner_url' => isset($data->banner) ? url($data->banner) : null,
                    'banner' => $data->banner,
                    'status' => $data->status,
                    'is_feature' => $data->is_feature,
                    'author' => $data->author,
                    'short_description' => $data->short_description,
                    'description' => $data->description,
                    'created_at' => $data->created_at
                ];
            })
        ];
    }
}
