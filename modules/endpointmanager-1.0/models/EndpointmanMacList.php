<?php defined('SYSPATH') or die('No direct access allowed.');

class EndpointmanMacList extends Bluebox_Record
{
    const EXT_NOTASSIGNED = 'Not Assigned';

    public function setTableDefinition()
    {
        $this->hasColumn('id', 'integer', 4, array('unsigned' => TRUE, 'notnull' => TRUE, 'primary' => TRUE,'autoincrement' => FALSE));
        $this->hasColumn('mac', 'string', 12);
        $this->hasColumn('model_id', 'integer', 25, array('notnull' => TRUE, 'unsigned' => true));
        $this->hasColumn('ext', 'string', 15, array('default' => self::EXT_NOTASSIGNED, 'notnull' => TRUE));
        $this->hasColumn('description', 'string', 20, array('notnull' => TRUE));
        $this->hasColumn('custom_cfg_template', 'integer', 4, array('unsigned' => TRUE, 'notnull' => TRUE));
        $this->hasColumn('custom_cfg_data', 'blob', NULL, array('notnull' => TRUE));
        $this->hasColumn('user_cfg_data', 'blob', NULL, array('notnull' => TRUE));
        $this->hasColumn('config_files_override', 'string', NULL, array('notnull' => TRUE));

        $this->unique('mac');
    }

    public function setUp()
    {
        $this->hasOne('EndpointmanTemplateList', array('local' => 'custom_cfg_template', 'foreign' => 'id'));
        $this->hasOne('EndpointmanModelList', array('local' => 'model_id', 'foreign' => 'id'));

    }
}