<?php
App::uses('AppModel', 'Model');
/**
 * Tagged Model
 *
 * @property Opinion $Opinion
 * @property Tag $Tag
 */
class Tagged extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'tagged';
/**
 * Validation rules
 *
 * @var array
 */
var $entered = array(); 


	public $validate = array(
		'id' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'opinion_id' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tag_id' => array(
			//	'required'=>'notEmpty',
				'match'=>array(
						'rule' => 'validateTags',
						'message' => 'Тег повторяется',
						'allowEmpty' => true,
						'required' => false
										)
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Opinion' => array(
			'className' => 'Opinion',
			'foreignKey' => 'opinion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tag' => array(
			'className' => 'Tag',
			'foreignKey' => 'tag_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
 
 public function validateTags($data)
	{
		
		$this->entered[]=$this->data['Tagged']['tag_id'];
		 for ($i=0;$i<=count($this->entered)-1;$i++) 
    	  {
			for ($j=0;$j<=count($this->entered)-1;$j++)
	    	 {
		       if (($this->entered[$i] == $this->entered[$j] ) && ($i!=$j) && (($this->entered[$j]) or ($this->entered[$i]))) 
		      {
			   return false;
		      }
	      }
      }			
		return true;
	} 
}
