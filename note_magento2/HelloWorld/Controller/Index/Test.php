<?php
namespace Smartosc\HelloWorld\Controller\Index;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Encryption\EncryptorInterface;
use Magento\Framework\View\Result\PageFactory;

class Test extends \Magento\Framework\App\Action\Action
{
    const EFUSION_TOKEN_KEY = 'efusion_api/efusion_config/efusion_token_key';
    protected $_pageFactory;

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var EncryptorInterface
     */
    protected $encryptor;

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        \Magento\Framework\App\Action\Context $context,
        PageFactory $pageFactory,
        EncryptorInterface  $encryptor
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->encryptor = $encryptor;
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $tokenKey = $this->scopeConfig->getValue(self::EFUSION_TOKEN_KEY);
        $tokenKey = $this->encryptor->decrypt($tokenKey);

        $test = self::EFUSION_TOKEN_KEY;
        echo $tokenKey;

        echo $this->getRequest()->getParam("token_key");
        exit;
    }
}
