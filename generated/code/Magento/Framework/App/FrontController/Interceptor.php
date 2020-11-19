<?php
namespace Magento\Framework\App\FrontController;

/**
 * Interceptor class for @see \Magento\Framework\App\FrontController
 */
class Interceptor extends \Magento\Framework\App\FrontController implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\RouterListInterface $routerList, \Magento\Framework\App\ResponseInterface $response, ?\Magento\Framework\App\Request\ValidatorInterface $requestValidator = null, ?\Magento\Framework\Message\ManagerInterface $messageManager = null, ?\Psr\Log\LoggerInterface $logger = null)
    {
        $this->___init();
        parent::__construct($routerList, $response, $requestValidator, $messageManager, $logger);
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        if (!$pluginInfo) {
            return parent::dispatch($request);
        } else {
            return $this->___callPlugins('dispatch', func_get_args(), $pluginInfo);
        }
    }
}
