<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Contact;

class ContactController extends Controller
{
    /**
     * @var int How many contact messages are allowed
     */
    private const AMOUNT_OF_CONTACTS = 1;

    /**
     * Displays 'Contact page'.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        return $this->render('index');
    }

   /**
     * Store a new message from the 'Contact form'
     *
     * @return string
     */
    public function actionStore(): string
    {
        $request = Yii::$app->request;

        $message = new Contact();

        $message->name    = trim($request->post('name'));
        $message->email   = trim($request->post('email'));
        $message->subject = trim($request->post('subject'));
        $message->message = trim($request->post('message'));
        $message->contact_ip = $request->userIP;

        $error = 0;

        // If a user sent more than 'AMOUNT_OF_CONTACTS' > return 'many-messages ' and stop the script
        if ($this->amountOfValueInCurrentColumn($request->userIP, 'contact_ip')
            >= self::AMOUNT_OF_CONTACTS) {

            return "many-messages ";
        }

        # Check, if there are 'bad' characters
        if (! ValidatorController::checkName($message->name)) {
            $errorMsg[] = "bad-name ";
            $error++;
        }

        if (! ValidatorController::checkEmail($message->email)) {
            $errorMsg[] = "bad-email ";
            $error++;
        }

        if (! ValidatorController::checkSubject($message->subject)) {
            $errorMsg[] = "bad-subject ";
            $error++;
        }

        if (! ValidatorController::checkMessage($message->message)) {
            $errorMsg[] = "bad-message ";
            $error++;
        }

        # If there are no errors
        if (! $error) {

            $message->save();

            # Send the email to user (We confirm we've received user's message)
            # See the email template in: 'views\mail\email.php'
            self::sendTestEmail($message->name, $message->email);

            return 'ok';

        } else {
            $errorMsg = implode(' ', $errorMsg);
            return $errorMsg;
        }
    }

    /**
     * Find the amount of the same value in the current column
     *
     * @param $value
     * @param $columnName
     * @return int
     */
    public function amountOfValueInCurrentColumn($value, $columnName): int
    {
        $amount = Contact::find()->where([$columnName => $value])->all();
        return count($amount);
    }

    /**
     * Send the email to user (We confirm we've received user's message)
     * @param $userName
     * @param $email
     * @return void
     * @see the email template in: 'views\mail\email.php'
     */
    public static function sendTestEmail($userName, $email): void
    {
        Yii::$app->mailer->compose('/mail/email',
        [
            'name' => $userName,
            'company' => 'Yii Demo'
        ])
        ->setFrom('noreply@bestsmoothjazz.ru')
        ->setTo($email)
        ->setSubject('Your message received')
        // ->setTextBody('Plain text content')
        //->setHtmlBody('<b>HTML content</b>')
        ->send();
    }
}

