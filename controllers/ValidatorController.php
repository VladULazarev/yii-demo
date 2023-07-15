<?php

namespace app\controllers;

use yii\web\Controller;

class ValidatorController extends Controller
{
    /** @var string pattern for name */
    private static string $namePattern = '/^[\w. \-]{2,30}$/u';

    /** @var string pattern for email */
    private static string $emailPattern = '/^[\w.\-]{2,30}@[\w\-]{2,30}\.[A-Za-z]{2,8}$/';

    /** @var string pattern for subject */
    private static string $subjectPattern = '/^[\w.!?\, \-\']{2,50}$/u';

    /** @var string pattern for message */
    private static string $messagePattern = '/^[\w.!?\, \-\']{3,500}$/u';

    /**
     * Check user's name
     *
     * @return int '1' if no 'bad' characters was found, otherwise '0'
     */
    public static function checkName(string $name): int
    {
        return preg_match(self::$namePattern, $name);
    }

    /**
     * Check an email
     *
     * @return int '1' if no 'bad' characters was found, otherwise '0'
     */
    public static function checkEmail(string $email): int
    {
        return preg_match(self::$emailPattern, $email);
    }

    /**
     * Check the subject from 'Contact form'
     *
     * @return int '1' if no 'bad' characters was found, otherwise '0'
     */
    public static function checkSubject(string $subject): int
    {
        return preg_match(self::$subjectPattern, $subject);
    }

    /**
     * Checks user's message
     *
     * @return int '1' if no 'bad' characters was found, otherwise '0'
     */
    public static function checkMessage(string $message): int
    {
        return preg_match(self::$messagePattern, $message);
    }
}
