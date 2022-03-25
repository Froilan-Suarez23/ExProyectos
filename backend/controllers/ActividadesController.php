<?php

namespace backend\controllers;

use yii;
use backend\models\Actividades;
use backend\models\search\ActividadesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ActividadesController implements the CRUD actions for Actividades model.
 */
class ActividadesController extends Controller
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
     * Lists all Actividades models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ActividadesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Actividades model.
     * @param int $idActividad Id Actividad
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idActividad)
    {
        return $this->render('view', [
            'model' => $this->findModel($idActividad),
        ]);
    }

    /**
     * Creates a new Actividades model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Actividades();
        $bandera = true;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'bandera' => $bandera,
        ]);
    }

    /**
     * Updates an existing Actividades model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idActividad Id Actividad
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idActividad)
    {
        $model = $this->findModel($idActividad);
        $bandera = true;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'bandera' => $bandera,
        ]);
    }

    public function actionCreateConProyecto($idProyecto)
    {
        $model = new Actividades();
        $model->idProyecto = $idProyecto;
        $bandera = false;

        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/proyectos/update', 'idProyecto' =>$idProyecto]);
            
        } else {
            return $this->render('create', [
                'model' => $model,
                'bandera' => $bandera,
            ]);
        }

        
    }

    public function actionUpdateConProyecto($idProyecto)
    {
        $bandera =false;
        $model = $this->findModel($idProyecto);
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['/proyectos/update', 'idProyecto' => $model->idProyecto]);
        } 
        return $this->render('update', [
            'model' => $model,
            'bandera' => $bandera,
        ]);

        
    }

    /**
     * Deletes an existing Actividades model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idActividad Id Actividad
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idActividad)
    {
        $this->findModel($idActividad)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteConProyecto($idActividad)
    {
        $model = $this->findModel($idActividad);

        $idProyecto = $model->idProyecto;

        $model->delete();

        return $this->redirect(['/proyectos/update', 'idProyecto' => $idProyecto]);
    }

    /**
     * Finds the Actividades model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idActividad Id Actividad
     * @return Actividades the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idActividad)
    {
        if (($model = Actividades::findOne(['idActividad' => $idActividad])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
