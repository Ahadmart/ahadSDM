<?php

Yii::import('zii.widgets.grid.CDataColumn');

class BDataColumn extends CDataColumn {

	public $accesskey = '';
	public $autoFocus = false;
        public $class = 'form-control';

	protected function renderFilterCellContent() {
		if (is_string($this->filter))
			echo $this->filter;
		elseif ($this->filter !== false && $this->grid->filter !== null && $this->name !== null && strpos($this->name, '.') === false) {
			if (is_array($this->filter))
				echo CHtml::activeDropDownList($this->grid->filter, $this->name, $this->filter, ['id' => false, 'prompt' => '']);
			elseif ($this->filter === null) {
				$hOptions = ['id' => false, 'accesskey' => $this->accesskey, 'class' => $this->class];
				if ($this->autoFocus) {
					$hOptions = array_merge($hOptions, ['autofocus' => 'autofocus']);
				}
				echo CHtml::activeTextField($this->grid->filter, $this->name, $hOptions); // 'placeholder' => '[Alt]+['.$this->accesskey.']'));
			}
		} else
			parent::renderFilterCellContent();
	}

}
