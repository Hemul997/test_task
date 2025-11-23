<?php

namespace App\Http\Resources;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin UserProfile */
class UserProfileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'user'       => UserResource::make($this->user),
            'gender'     => $this->gender->translate(),
            'birthday'   => $this->birthday?->toDateString() ?? '',
            'phone'      => $this->phone ?? '',
        ];
    }
}
