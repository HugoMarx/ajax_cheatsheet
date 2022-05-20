<?php

namespace App\Controller;

use App\Model\ArticleManager;

class AjaxController extends AbstractController
{

    public function __construct()
    {
        parent::__construct();

        header('Content-Type: application/json');
    }

    public function getArticles(): string
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->selectAll();

        return json_encode($articles);
    }

    public function getRandomArticle(): string
    {
        $articleManager = new ArticleManager();
        $randomArticle = $articleManager->selectRandomeOne();
        return json_encode($randomArticle);
    }

    public function searchArticles($search): string
    {
        $articleManager = new ArticleManager();
        $searchArticle = $articleManager->searchFor($search);
        return json_encode($searchArticle);
        
    }

    public function getArticleById(int $id): string
    {
        //TODO
        return "$id";
    }
}
