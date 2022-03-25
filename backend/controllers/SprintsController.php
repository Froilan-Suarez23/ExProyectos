<?php

namespace backend\controllers;

use yii;
use backend\models\Sprints;
use backend\models\search\SprintsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SprintsController implements the CRUD actions for Sprints model.
 */
class SprintsController extends Controller
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
                            'actions'=>['index', 'view', 'create', 'delete', 'update', 'create-con-proyecto', 'update-con-proyecto', 'delete-con-proyecto'],
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
     * Lists all Sprints models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SprintsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sprints model.
     * @param int $idSprints Id Sprints
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idSprints)
    {
        return $this->render('view', [
            'model' => $this->findModel($idSprints),
        ]);
    }

    /**
     * Creates a new Sprints model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Sprints();

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
     * Updates an existing Sprints model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idSprints Id Sprints
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idSprints)
    {
        $model = $this->findModel($idSprints);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sprints model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idSprints Id Sprints
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idSprints)
    {
        $this->findModel($idSprints)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sprints model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idSprints Id Sprints
     * @return Sprints the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idSprints)
    {
        if (($model = Sprints::findOne(['idSprints' => $idSprints])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
