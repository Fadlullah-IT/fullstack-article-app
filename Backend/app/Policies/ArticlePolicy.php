<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{


    /**
     * making sure only owners of articles can update/delete their article.
     */
    public function modify(User $user, Article $article): Response
    {
        return $user->id === $article->user_id
            ? Response::allow()
            : Response::deny('You do not own this post');
    }
}
