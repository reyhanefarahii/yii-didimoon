<?php

namespace backend\controllers;
use Yii;
use common\models\User;
use yii\web\Controller;
class UserController extends Controller
{
    /**
     * Create
     */
//    public function actionCreate()
//    {
//        $model = new User();
//
//        // new record
//        if($model->load(Yii::$app->request->post()) && $model->save()){
//            return $this->redirect(['index']);
//        }
//
//        return $this->render('create', ['model' => $model]);
//    }
    /**
     * Read
     */
    public function actionIndex()
    {
        $user = User::find()->all();

        return $this->render('index', ['model' => $user]);
    }
    /**
     * Edit
     * @param integer $id
     */
    public function actionEdit($id)
    {
        $model = User::find()->where(['id' => $id])->one();

        // $id not found in database
        if($model === null)
            throw new NotFoundHttpException('The requested page does not exist.');

        // update record
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index']);
        }

        return $this->render('edit', ['model' => $model]);
    }
}