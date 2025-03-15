<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Http\Resources\UserResource;
use App\Models\User;


class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "excerpt" => $this->excerpt,
            "content" => $this->content,
            "categories" => CategoryResource::collection($this->categories),
            "user" => new UserResource(User::findOrFail($this->user_id)),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
