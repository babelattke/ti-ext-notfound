<?php

namespace Babel\NotFound\Models;

use Model;

/**
 * @method static instance()
 */
class Page404Settings extends Model
{ 
    public $implement = ['System\Actions\SettingsModel'];

    // A unique code
    public $settingsCode = 'babel_notfound_settings';

    // Reference to field configuration
    public $settingsFieldsConfig = 'page404settings';

}