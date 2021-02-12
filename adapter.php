<?php declare(strict_types=1);

/**
 * Interface Notification
 */
interface Notification
{
    public function send(string $title, string $message): void;
}

/**
 * Class EmailNotification
 */
class EmailNotification implements Notification
{
    private string $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function send(string $title, string $message): void
    {
        mail($this->email, $title, $message);
    }
}

/**
 * Class FacebookApi
 */
class FacebookApi
{
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function sendMessage(string $chatId, string $message): void
    {
        echo "Send message: '$message', on Facebook using '$this->apiKey' to chat with id '$chatId'";
    }
}

/**
 * Class FacebookNotification
 */
class FacebookNotification implements Notification
{
    private FacebookApi $facebookApi;
    private string $chatId;

    public function __construct(FacebookApi $facebookApi, string $chatId)
    {
        $this->facebookApi = $facebookApi;
        $this->chatId = $chatId;
    }

    public function send(string $title, string $message): void
    {
        $facebookMessage = "#" . $title . "#" . strip_tags($message);
        $this->facebookApi->sendMessage($this->chatId, $facebookMessage);
    }
}

/**
 * Class NotificationClient
 */
class NotificationClient
{
    public function send(Notification $notification)
    {
        echo $notification->send("Notification send", "This is example message");
    }
}

$client = new NotificationClient();
$emailNotification = new EmailNotification("admin@example.com");
$client->send($emailNotification);

$facebookApi = new FacebookApi("1234567");
$facebookNotification = new FacebookNotification($facebookApi, "1234");
$client->send($facebookNotification);
