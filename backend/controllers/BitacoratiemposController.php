<?php

namespace backend\controllers;

use backend\models\Bitacoratiempos;
use backend\models\search\BitacoratiemposSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii;

/**
 * BitacoratiemposController implements the CRUD actions for Bitacoratiempos model.
 */
class BitacoratiemposController extends Controller
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
     * Lists all Bitacoratiempos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BitacoratiemposSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bitacoratiempos model.
     * @param int $idBitacoraTiempo Id Bitacora Tiempo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idBitacoraTiempo)
    {
        return $this->render('view', [
            'model' => $this->findModel($idBitacoraTiempo),
        ]);
    }

    /**
     * Creates a new Bitacoratiempos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Bitacoratiempos();

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
     * Updates an existing Bitacoratiempos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idBitacoraTiempo Id Bitacora Tiempo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idBitacoraTiempo)
    {
        $model = $this->findModel($idBitacoraTiempo);

        $model->HoraInicio = date('g:i A',  strtotime($model->HoraInicio));
        $model->HoraFinal = date('g:i A', strtotime($model->HoraFinal));
        $model->Interrupcion = date('H:i', strtotime($model->Interrupcion));

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bitacoratiempos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idBitacoraTiempo Id Bitacora Tiempo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idBitacoraTiempo)
    {
        $this->findModel($idBitacoraTiempo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bitacoratiempos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idBitacoraTiempo Id Bitacora Tiempo
     * @return Bitacoratiempos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idBitacoraTiempo)
    {
        if (($model = Bitacoratiempos::findOne(['idBitacoraTiempo' => $idBitacoraTiempo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
