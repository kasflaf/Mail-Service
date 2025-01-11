<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $protocol = 'smtp';
    public string $SMTPHost = 'smtp.gmail.com'; // Empty, will be set by getenv()
    public string $SMTPUser = ''; // Empty, will be set by getenv()
    public string $SMTPPass = ''; // Empty, will be set by getenv()
    public string $mailType = 'html';  // Mail type (html)
    public string $charset = 'UTF-8'; // Charset for email content
    public string $fromEmail = '';  // Empty, will be set by getenv()
    public string $fromName = 'MAILSERVICE';   // Empty, will be set by getenv()
    public int $SMTPPort  = 587;
    public string $SMTPCrypto = 'tls';
    public bool $wordWrap  = true;

    // Constructor to initialize the SMTP settings from ENV variables
    public function __construct()
    {
        // Use getenv to retrieve values from the .env file
        $this->SMTPUser = getenv('SMTP_USER');
        $this->SMTPPass = getenv('SMTP_PASS');
        $this->fromEmail = getenv('SMTP_USER');
    }
}
