<?php


abstract class BaseWorktype extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $description;

	
	protected $collPersonalWorktypes;

	
	protected $lastPersonalWorktypeCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = WorktypePeer::ID;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = WorktypePeer::NAME;
		}

	} 
	
	public function setDescription($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = WorktypePeer::DESCRIPTION;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->description = $rs->getString($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Worktype object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(WorktypePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			WorktypePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(WorktypePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = WorktypePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += WorktypePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collPersonalWorktypes !== null) {
				foreach($this->collPersonalWorktypes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = WorktypePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPersonalWorktypes !== null) {
					foreach($this->collPersonalWorktypes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = WorktypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getName();
				break;
			case 2:
				return $this->getDescription();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = WorktypePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getDescription(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = WorktypePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setDescription($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = WorktypePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(WorktypePeer::DATABASE_NAME);

		if ($this->isColumnModified(WorktypePeer::ID)) $criteria->add(WorktypePeer::ID, $this->id);
		if ($this->isColumnModified(WorktypePeer::NAME)) $criteria->add(WorktypePeer::NAME, $this->name);
		if ($this->isColumnModified(WorktypePeer::DESCRIPTION)) $criteria->add(WorktypePeer::DESCRIPTION, $this->description);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(WorktypePeer::DATABASE_NAME);

		$criteria->add(WorktypePeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);

		$copyObj->setDescription($this->description);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getPersonalWorktypes() as $relObj) {
				$copyObj->addPersonalWorktype($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new WorktypePeer();
		}
		return self::$peer;
	}

	
	public function initPersonalWorktypes()
	{
		if ($this->collPersonalWorktypes === null) {
			$this->collPersonalWorktypes = array();
		}
	}

	
	public function getPersonalWorktypes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePersonalWorktypePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPersonalWorktypes === null) {
			if ($this->isNew()) {
			   $this->collPersonalWorktypes = array();
			} else {

				$criteria->add(PersonalWorktypePeer::WORKTYPE_ID, $this->getId());

				PersonalWorktypePeer::addSelectColumns($criteria);
				$this->collPersonalWorktypes = PersonalWorktypePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PersonalWorktypePeer::WORKTYPE_ID, $this->getId());

				PersonalWorktypePeer::addSelectColumns($criteria);
				if (!isset($this->lastPersonalWorktypeCriteria) || !$this->lastPersonalWorktypeCriteria->equals($criteria)) {
					$this->collPersonalWorktypes = PersonalWorktypePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPersonalWorktypeCriteria = $criteria;
		return $this->collPersonalWorktypes;
	}

	
	public function countPersonalWorktypes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasePersonalWorktypePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PersonalWorktypePeer::WORKTYPE_ID, $this->getId());

		return PersonalWorktypePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPersonalWorktype(PersonalWorktype $l)
	{
		$this->collPersonalWorktypes[] = $l;
		$l->setWorktype($this);
	}


	
	public function getPersonalWorktypesJoinPersonal($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePersonalWorktypePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPersonalWorktypes === null) {
			if ($this->isNew()) {
				$this->collPersonalWorktypes = array();
			} else {

				$criteria->add(PersonalWorktypePeer::WORKTYPE_ID, $this->getId());

				$this->collPersonalWorktypes = PersonalWorktypePeer::doSelectJoinPersonal($criteria, $con);
			}
		} else {
									
			$criteria->add(PersonalWorktypePeer::WORKTYPE_ID, $this->getId());

			if (!isset($this->lastPersonalWorktypeCriteria) || !$this->lastPersonalWorktypeCriteria->equals($criteria)) {
				$this->collPersonalWorktypes = PersonalWorktypePeer::doSelectJoinPersonal($criteria, $con);
			}
		}
		$this->lastPersonalWorktypeCriteria = $criteria;

		return $this->collPersonalWorktypes;
	}

} 