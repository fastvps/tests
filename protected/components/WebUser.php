<?php

class WebUser extends CWebUser {

    // Store model to not repeat query.
    private $_model;

    public function getUsername()
    {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->name;
    }

    public function getisAdmin()
    {
        $user = $this->loadUser(Yii::app()->user->id);
        return ($user->admin) ? 1 : 0;
    }

    public function getDone()
    {
        $user = $this->loadUser(Yii::app()->user->id);
        return ($user->done) ? 1 : 0;
    }

    protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=User::model()->findByPk($id);
        }
        return $this->_model;
    }
}
?>