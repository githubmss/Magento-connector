<?php
namespace Mssbuilder\Connector\Block\Adminhtml\System\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Banktransfer extends Field
{
    /**
     * Remove scope label
     *
     * @param  AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element)
    {
        $form        = $element->getForm();
        $storeScope  = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $_objectData = \Magento\Framework\App\ObjectManager::getInstance();
        $scopeConfig = $_objectData->get('Magento\Framework\App\Config\ScopeConfigInterface');
        $html        = '';
        if (!$scopeConfig->getValue('payment/banktransfer/active')) {
            $html = "<div id='messages'><ul class='messages'>
            <li class='error-msg'>Bank transfer Payment method is Disabled,
            Kindly Enable method to make it work with mobile app.<span></span></li></ul></div>";
        }
        return $html;
    }
}
