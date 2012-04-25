<?php

/**
 * Photo form.
 *
 * @package    photka
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PhotoForm extends BasePhotoForm
{
  public function configure() {
        unset($this['created_at'], $this['updated_at']);
        
        $this->widgetSchema['path'] = new sfWidgetFormInputFileEditable(
                        array(
                            'label' => 'Fotografia',
                            'file_src' => $this->getObject()->getPath(),
                            'is_image' => true,
                            'edit_mode' => !$this->isNew(),
                            'template' => '<div>%file%<br />%input%</div>'
                ));

        $this->validatorSchema['path'] = new sfValidatorFile(array(
                    'required' => false,
                    'path' => sfConfig::get('sf_upload_dir'),
                    'mime_types' => 'web_images',
                    'validated_file_class' => 'MainPhotoValidatedFile'
                ));
       
        
        $this->widgetSchema['category_values_list'] = new sfWidgetFormDoctrineChoice(
                array('multiple' => true, 'model' => 'CategoryValue', 'method' => 'getValue' ));
//        
//        $this->validatorSchema['category_values_list'] = new sfValidatorChoiceChain(array(
//                    'chain' => array('Category', 'CategoryValues')
//                ));

        
    }

    public function save($con = null) {

        if (!$this->isNew() && $this->getValue('path')) {
            $path = $this->getObject()->getPath();
            shell_exec('rm ' . sfConfig::get('sf_web_dir') . $path);
        }

        $item = parent::save($con);

        /* @var $image MainPhotoValidatedFile */
        $image = $this->getValue('path');

        if ($image) {
            $tmp_name = $item->getPath();
            $org_name = $image->getOriginalName();
            $org_ext = $image->getExtension();
            $org_name_wo_ext = preg_replace('/' . $org_ext . '$/i', '', $org_name);
            $file_name = Slug::slugify($org_name_wo_ext);

            if(!file_exists(sfConfig::get('sf_upload_dir') . '/images/photos')){
                shell_exec('mkdir ' . sfConfig::get('sf_upload_dir') . '/images/photos/');
            }
            $new_path_wo_ext = sfConfig::get('sf_upload_dir') . '/images/photos/' . $file_name;
            $new_path = $new_path_wo_ext . $org_ext;
            $image->save($new_path);

            $item->setPath('/uploads/images/photos/' . $file_name . $org_ext);
            $item->save();

            shell_exec('rm ' . sfConfig::get('sf_upload_dir') . '/' . $tmp_name);
        }
        return $item;
    }

}
