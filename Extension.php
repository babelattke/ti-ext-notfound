<?php namespace Babel\NotFound;

use System\Classes\BaseExtension;
use Babel\NotFound\Models\Page404Settings;
use System\Models\Themes_model;
use File;

/**
 * NotFound Extension Information File
 */
class Extension extends BaseExtension
{
    /**
     * Returns information about this extension.
     *
     * @return array
     */
    /*public function extensionMeta()
    {
        return [
            'name'        => 'NotFound',
            'author'      => 'Babel',
            'description' => 'No description provided yet...',
            'icon'        => 'fa-plug',
            'version'     => '1.0.0'
        ];
    }*/

    /**
     * Register method, called when the extension is first registered.
     *
     * @return void
     */
    public function register()
    {
        
    }    

    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()  
    {        
        $this->checkStatus();
    }
    
    public function checkStatus() {
        $isEnabled = Page404Settings::get('status');

        Themes_model::syncAll();
            $themes = Themes_model::all();
            $pagesAdded = [];

        if ($isEnabled){

            /** @var \System\Models\Themes_model */
            foreach ($themes as $theme) {
                $themeDirectory = theme_path($theme->themeClass->getDirName());

                $pagesPath = $themeDirectory . '/_pages/not_found.blade.php';
                
                File::copy(__DIR__.'/views/not_found.blade.php', $pagesPath);
                $pagesAdded[] = $pagesPath;

            }  
        }elseif (!$isEnabled){

            foreach ($themes as $theme) {
                $themeDirectory = theme_path($theme->themeClass->getDirName());                
                
                File::delete( $themeDirectory . '/_pages/not_found.blade.php' );
            }
        
        }
    }

    /**
     * Registers any front-end components implemented in this extension.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Babel\NotFound\Components\NotFoundPage' => [
                'code' => 'NotFoundPage',
                'name' => 'Page 404 Settings',
                'description' => 'Page 404 Settings Component',
            ], 

        ];
    }

    /**
     * Registers any admin permissions used by this extension.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [            
            'Babel.notFound.edit404Page' => [
                'description' => 'Modify 404 Error Page',
                'group' => 'module',
            ],            
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label' => '404 Error Page Settings',
                'description' => 'Modify 404 Error Page.',
                'icon' => 'fas fa-toilet-paper-slash',
                'model' => 'Babel\NotFound\Models\Page404Settings',
                'permissions' => ['Module.edit404Page'],
            ],
        ];
    }
}
