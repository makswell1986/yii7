<?
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadcsvFile extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;

  public function rules()
    {
        return [
            ['file','file','extensions' => ['csv'], 'skipOnEmpty' => false, 'maxSize' => 1024*1024,'checkExtensionByMimeType' => false],
        ];
    }

    public function upload()
    {

        if ($this->validate()) {
        
            $this->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension);
            $this->file->tempName='uploads/' . $this->file->baseName . '.' . $this->file->extension;
            return true;
        } else {
            return false;
        }
    }
}
?>