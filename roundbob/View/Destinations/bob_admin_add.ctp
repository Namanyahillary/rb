<?php echo $this->Html->script(array('script_dynamic_content'));?>
<div class="flash-message"><?php echo $this->Session->flash(); ?></div>
<div class="destinations form">
<?php echo $this->Form->create('Destination',array('type'=>'file','id'=>'destination_add_form','class'=>'no-ajax')); ?>
	<fieldset>
		<legend><?php echo __('Add Destination'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('location');
		echo $this->Form->input('latitude');
		echo $this->Form->input('longitude');
		echo $this->Form->input('cost');
		echo $this->Form->input('country_id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('fileField',array('type'=>'file','label'=>'Image(png,jpg)','name'=>'fileField'));
		//echo $this->Form->input('Region');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
