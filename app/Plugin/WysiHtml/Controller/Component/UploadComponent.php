<?php 

App::uses('File', 'Utility');

/**
* UploadComponent
*/
class UploadComponent extends Component
{
    
    /**
     * simpleUpload digunakan untuk upload file tanpa resize, crop,
     * method ini sebaiknya digunakan pasca validasi jenis file dan ukuran
     * file oleh Html5 dan Javascript/JQuery 
     *
     * @param String $fileData
     * @return String $fileName
     */
    public function simpleUpload($fileData) 
    {

        if (!empty($fileData)) 
        {

            if (is_array($fileData)) 
            {
                $fileName = $fileData['name'];
                if (is_uploaded_file($fileData['tmp_name'])) 
                {
                    
                    $pathFolder = Configure::read('DestAdminLogo') . DS . $fileName;

                    if (!copy($fileData['tmp_name'], $pathFolder)) 
                    {
                        
                        print "Error Uploading Admin Logo!.";
                        exit();
                    }

                    return $fileName;
                }
            }
        }
    }
}