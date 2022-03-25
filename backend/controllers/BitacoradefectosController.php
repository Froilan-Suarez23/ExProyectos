<?php

namespace backend\controllers;

use backend\models\Bitacoradefectos;
use backend\models\search\BitacoradefectosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use yii\filters\AccessControl;

/**
 * BitacoradefectosController implements the CRUD actions for Bitacoradefectos model.
 */
class BitacoradefectosController extends Controller
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
                            'actions'=>['index', 'view', 'create', 'delete', 'update','create-con-proyecto', 'update-con-proyecto', 'delete-con-proyecto'],
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
     * Lists all Bitacoradefectos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BitacoradefectosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bitacoradefectos model.
     * @param int $idBitacoraDefecto Id Bitacora Defecto
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idBitacoraDefecto)
    {
        return $this->render('view', [
            'model' => $this->findModel($idBitacoraDefecto),
        ]);
    }

    /**
     * Creates a new Bitacoradefectos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Bitacoradefectos();

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
     * Updates an existing Bitacoradefectos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idBitacoraDefecto Id Bitacora Defecto
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idBitacoraDefecto)
    {
        $model = $this->findModel($idBitacoraDefecto);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index',]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bitacoradefectos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idBitacoraDefecto Id Bitacora Defecto
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idBitacoraDefecto)
    {
        $this->findModel($idBitacoraDefecto)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bitacoradefectos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idBitacoraDefecto Id Bitacora Defecto
     * @return Bitacoradefectos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idBitacoraDefecto)
    {
        if (($model = Bitacoradefectos::findOne(['idBitacoraDefecto' => $idBitacoraDefecto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
