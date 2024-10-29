<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Sdmx2402;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\UploadcsvFile;
use app\models\Sdmx2402Search;
use ruskid\csvimporter\CSVReader;
use yii\web\NotFoundHttpException;
use ruskid\csvimporter\CSVImporter;
use ruskid\csvimporter\MultipleImportStrategy;

/**
 * Sdmx2402Controller implements the CRUD actions for Sdmx2402 model.
 */
class Sdmx2402Controller extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
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
     * Lists all Sdmx2402 models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new Sdmx2402Search();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sdmx2402 model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Sdmx2402 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Sdmx2402();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Sdmx2402 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sdmx2402 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sdmx2402 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Sdmx2402 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sdmx2402::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionExportFile()
    {
        $searchModel = new Sdmx2402Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('export-file', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionForm()
    {
        $model = new UploadcsvFile();

        if (Yii::$app->request->isPost) {

            $model->file = UploadedFile::getInstance($model, 'file');
     
            if ($model->upload()) {
                
        $importer = new CSVImporter;

   

        //Will read CSV file
        $importer->setData(new CSVReader([
        'filename' => $model->file->tempName,
        'fgetcsvOptions' => [
        'delimiter' => ';'
        ]
        ]));



        $numberRowsAffected = $importer->import(new MultipleImportStrategy([
            'tableName' => Sdmx2402::tableName(),
            'configs' => [
                [
                    'attribute' => 'Code',
                    'value' => function($line) {
                        return $line[0];
                    },
                    //'unique' => true, //Will filter and import unique values only. can by applied for 1+ attributes
                ],
                [
                    'attribute' => 'Klassifikator',
                    'value' => function($line) {
                        return $line[1];
                    },
                    //'unique' => true, //Will filter and import unique values only. can by applied for 1+ attributes
                ],
                [
                    'attribute' => 'Klassifikator_ru',
                    'value' => function($line) {
                        return $line[2];
                    },
                    //'unique' => true, //Will filter and import unique values only. can by applied for 1+ attributes
                ],
                [
                    'attribute' => 'Klassifikator_en',
                    'value' => function($line) {
                        return $line[3];
                    },
                    //'unique' => true, //Will filter and import unique values only. can by applied for 1+ attributes
                ],
                [
                    'attribute' => 'pokazatel',
                    'value' => function($line) {
                        return $line[4];
                    },
                    //'unique' => true, //Will filter and import unique values only. can by applied for 1+ attributes
                ],
                [
                    'attribute' => 'god',
                    'value' => function($line) {
                        return $line[5];
                    },
                    //'unique' => true, //Will filter and import unique values only. can by applied for 1+ attributes
                ]

            ],
        ]));



                

                
                return $this->render('_form', ['model' => $model]);
       
            }
        }

        return $this->render('_form', ['model' => $model]);
    }
}
