<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Comment;

class CommentController extends Controller
{
   /**
     * Store a new message from the 'Comment form'
     * @see web\js\custom.js --- 4. Comment form
     *
     * @return string
     */
    public function actionStore()
    {
        $request = Yii::$app->request;

        $comment = new Comment();
        $comment->post_id      = trim($request->post('postId'));
        $comment->author_name  = trim($request->post('name'));
        $comment->comment_text = trim($request->post('comment'));
        $comment->comment_ip   = $request->userIP;

        $error = 0;

        # Check, if user already sent a comment about the post from the current 'ip'
        if ($this->test( 'post_id', $comment->post_id, 'comment_ip', $request->userIP) )
        {
           return "many-comments ";
        }

        # Check if there are 'bad' characters
        if (! ValidatorController::checkName($comment->author_name))
        {
            $errorMsg[] = "bad-name ";
            $error++;
        }

        if (! ValidatorController::checkMessage($comment->comment_text))
        {
            $errorMsg[] = "bad-comment ";
            $error++;
        }

        # If there are no errors
        if (! $error) {
            $comment->save();
            return 'ok';
        } else {
            $errorMsg = implode(' ', $errorMsg);
            return $errorMsg;
        }
    }

    /**
     * Find the amount of the same value in the current column
     *
     * @return int
     */
    public function test($columnName_1, $value_1,  $columnName_2, $value_2): int
    {
        $amount = Comment::find()->where([$columnName_1 => $value_1, $columnName_2 => $value_2])->all();
        return count($amount);
    }
}