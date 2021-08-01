<?php

namespace app\controllers;

use Yii;
use app\models\Advertisements;
use app\models\AdvertisementsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdvertisementsController implements the CRUD actions for Advertisements model.
 */
class AdvertisementsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Advertisements models.
     * @return mixed
     */
    public function actionIndex()
    {
        // if(!Yii::$app->user->can('adCreate')){
        //     if(!Yii::$app->user->can('adManage')){
        //         throw new NotFoundHttpException('Запрошенная страница не существует.');
        //     } else {
        //         // изменить датапровайдер под админа, чтобы все объявления показывались
        //     }
        //     // а тут дефолтный датапровайдер для обычного юзера 
        // }

        $searchModel = new AdvertisementsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Advertisements model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(!Yii::$app->user->can('adManage', ['ad' => $model])){
            throw new NotFoundHttpException('Запрошенная страница не существует.');
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Advertisements model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Advertisements();

        if(!Yii::$app->user->can('adCreate', ['ad' => $model])){
            throw new NotFoundHttpException('Запрошенная страница не существует.');
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Advertisements model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(!Yii::$app->user->can('adManage', ['ad' => $model])){
            throw new NotFoundHttpException('Запрошенная страница не существует.');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Advertisements model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if(!Yii::$app->user->can('adManage', ['ad' => $model])){
            throw new NotFoundHttpException('Запрошенная страница не существует.');
        }

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Advertisements model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advertisements the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advertisements::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрошенная страница не существует.');
    }
}
