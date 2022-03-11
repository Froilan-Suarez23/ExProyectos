<?php

namespace backend\controllers;

use yii;
use backend\models\Historias;
use backend\models\search\HistoriasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * HistoriasController implements the CRUD actions for Historias model.
 */
class HistoriasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access'=> [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'actions'=>['index', 'view', 'create', 'delete', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                        ],
                        
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Historias models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new HistoriasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Historias model.
     * @param int $idHistoria Id Historia
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idHistoria)
    {
        return $this->render('view', [
            'model' => $this->findModel($idHistoria),
        ]);
    }

    /**
     * Creates a new Historias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Historias();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Historias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idHistoria Id Historia
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idHistoria)
    {
        $model = $this->findModel($idHistoria);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Historias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idHistoria Id Historia
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idHistoria)
    {
        $this->findModel($idHistoria)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Historias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idHistoria Id Historia
     * @return Historias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idHistoria)
    {
        if (($model = Historias::findOne(['idHistoria' => $idHistoria])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
