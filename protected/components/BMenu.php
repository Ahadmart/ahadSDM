<?php

Yii::import('zii.widgets.CMenu');

class BMenu extends CMenu
{

    /**
     * Renders the menu items.
     * @param array $items menu items. Each menu item will be an array with at least two elements: 'label' and 'active'.
     * It may have three other optional elements: 'items', 'linkOptions' and 'itemOptions'.
     */
    protected function renderMenu($items)
    {
        if (count($items)) {
            $this->renderMenuRecursive($items);
        }
    }

}
