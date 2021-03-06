<?php

namespace App\Controller;

use App\Core\Factory\PDOFactory;
use App\Manager\CommentManager;

class CommentController extends BaseController
{
    /**
     * @Route(path="/comment", name="commentPage")
     * @return void
     */
    public function getComment()
    {
        $manager = new CommentManager(PDOFactory::getInstance());

        $comments = $manager->findAllComments();

        $this->render('Comment/comments', ['comments' => $comments], 'Page Comments');
    }

    /**
     * @Route(path="/show/{id}-{truc}", name="showOne")
     * @param int $id
     * @param string $truc
     * @return void
     */
    public function getShow(int $id, string $truc)
    {
        $this->renderJSON(['message' => $truc, 'parametre' => $id]);
    }

    /**
     * @Route(path="/show")
     * @return void
     */
    public function getShowTest()
    {
        echo 'je suis bien la bonne méthode';
    }
}