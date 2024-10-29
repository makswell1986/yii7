<?php
namespace app\components\log;

use Yii;
use yii\log\Logger;
use yii\helpers\Json;
use yii\helpers\VarDumper;
use yii\log\LogRuntimeException;



class MyDbTarget extends \yii\log\DbTarget
{
// Переопределяем, добавляем, изменяем
public function export()

    {
       $request_body=Json::encode(Yii::$app->request->bodyParams);
        
 
        if ($this->db->getTransaction()) {
            // create new database connection, if there is an open transaction
            // to ensure insert statement is not affected by a rollback
            $this->db = clone $this->db;
        }

        $tableName = $this->db->quoteTableName($this->logTable);
        $sql = "INSERT INTO $tableName ([[level]], [[category]], [[log_time]], [[prefix]], [[message]],[[request_body]])
                VALUES (:level, :category, :log_time, :prefix, :message,:request_body)";
        $command = $this->db->createCommand($sql);
   

 
        foreach ($this->messages as $message) {
            list($text, $level, $category, $timestamp) = $message;
            if (!is_string($text)) {
                // exceptions may not be serializable if in the call stack somewhere is a Closure
                if ($text instanceof \Exception || $text instanceof \Throwable) {
                    $text = (string) $text;
                } else {
                    $text = VarDumper::export($text);
                }
            }
            if (
                $command->bindValues([
                    ':level' => $level,
                    ':category' => $category,
                    ':log_time' => date("Y-m-d H:i:s"),
                    ':prefix' => $this->getMessagePrefix($message),
                    ':message' => $text,
                    ':request_body'=>base64_encode($request_body)
                ])->execute() > 0
            ) {
                continue;
            }
            throw new LogRuntimeException('Unable to export log through database!');
        }
    }

}