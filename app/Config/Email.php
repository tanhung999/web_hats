<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email extends BaseConfig
{
    // ... Các thuộc tính khác

    /**
     * The "user agent"
     */
    public string $userAgent = 'PHPMailer';

    /**
     * The mail sending protocol: mail, sendmail, smtp
     */
    public string $protocol = 'smtp';

    /**
     * SMTP Server Hostname
     */
    public string $SMTPHost = 'localhost';

    /**
     * SMTP Username
     */
    public string $SMTPUser = '';

    /**
     * SMTP Password
     */
    public string $SMTPPass = '';

    /**
     * SMTP Port
     */
    public int $SMTPPort = 587;

    /**
     * SMTP Timeout (in seconds)
     */
    public int $SMTPTimeout = 5;
    
    public $mailPath = '';
    /**
     * Enable persistent SMTP connections
     */
    public bool $SMTPKeepAlive = false;

    /**
     * SMTP Encryption.
     *
     * @var string '', 'tls' or 'ssl'. 'tls' will issue a STARTTLS command
     *             to the server. 'ssl' means implicit SSL. Connection on port
     *             465 should set this to ''.
     */
    public string $SMTPCrypto = '';

    /**
     * Enable notify message from server
     */
    public bool $DSN = false;

    /**
     * Initialize PHPMailer instance
     *
     * @return PHPMailer
     */
    public function initialize(): PHPMailer
    {
        $email = new PHPMailer(true);

        // Enable verbose debug output
        $email->SMTPDebug = SMTP::DEBUG_OFF;

        // Set mailer to use SMTP
        $email->isSMTP();

        // Specify main and backup SMTP servers
        $email->Host = $this->SMTPHost;

        // SMTP username
        $email->Username = $this->SMTPUser;

        // SMTP password
        $email->Password = $this->SMTPPass;

        // Enable TLS encryption, `ssl` also accepted
        $email->SMTPSecure = $this->SMTPCrypto;

        // TCP port to connect to
        $email->Port = $this->SMTPPort;

        // Timeout in seconds
        $email->Timeout = $this->SMTPTimeout;

        // Whether to enable persistent connections
        $email->SMTPKeepAlive = $this->SMTPKeepAlive;

        // Enable notify message from server
        $email->DSN = $this->DSN;

        // Set the CharSet
        $email->CharSet = $this->charset;

        // Set mail type to HTML or plain text
        $email->isHTML($this->mailType === 'html');

        return $email;
    }
}
