<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $model=new LoginForm;

		$this->render('index',array('model'=>$model));
	}

    public function actionAbout()
    {
        $this->render('about');
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionTest()
    {

        $question = Question::model()->findAll();
        $model = new Answer();
        if(Yii::app()->request->isAjaxRequest){
            $model->attributes= $_POST['Answer'];
            $model->user_id=Yii::app()->user->id;
            if ($model->save())
                echo 'Ответ сохранен';
            else
                echo 'Ошибка';
            Yii::app()->end();
        }
        else
        {
            if (!Yii::app()->user->done)
                Answer::model()->deleteAllByAttributes(array('user_id' => Yii::app()->user->id));
            $this->render('test', array('model'=>$model, 'question' => $question));
        }

    }

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

    public function actionResult($id = null)
    {
        if ($id != null)
        {
            $model = Answer::model()->findAllByAttributes(array('user_id'=>$id));
        }
        else
        {
            $model = Answer::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->id));
        }

        $this->render('result', array('model'=> $model, 'id' => $id));
    }

    public function actionStats()
    {
        $model = User::model()->findAll();
        $this->render('stats', array('model'=>$model));
    }

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='question-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}