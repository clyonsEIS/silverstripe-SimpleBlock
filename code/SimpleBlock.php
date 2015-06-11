<?php

class SimpleBlock extends DataObject
{
	private static $db = array(
		'Title' => 'Varchar(255)',
		'Active' => 'Boolean',
		'Link' => 'Varchar(255)',
		'isLinkExternal' => 'Boolean'
	);

	private static $has_one = array(
		'Image' => 'Image'
	);

	private static $defaults = array('Active' => 1);

	private static $summary_fields = array('Title', 'Active');

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->dataFieldByName('Link')->setRightTitle('Fully qualified (http://www.google.com) or internal (section/page)');
		$fields->dataFieldByName('isLinkExternal')->setTitle('Open link in new window?');
		return $fields;
	}

	public function Target()
	{
		return $this->isLinkExternal ? '_blank' : '_self';
	}
}