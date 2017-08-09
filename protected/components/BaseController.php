<?php

class BaseController extends CController
{

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = [];

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = [];

    public $pageHeader = [
        'title' => '',
        'desc' => '',
        'boxTitle' => ''
    ];

    public $box = [
        'type' => 'box-primary',
        'headerBorder' => true
    ];
    public $footer = '';

    public function getTheme()
    {
        if (!isset(Yii::app()->user->id)) {
            $themeId = Theme::model()->getCookies();
            if (is_null($themeId)) {
                return NULL;
            }
            $theme = Theme::model()->findByPk($themeId);
        } else {

            $user = User::model()->findByPk(Yii::app()->user->id);

            if (is_null($user) || is_null($user->theme_id)) {
                /* Jika input data benar, blok seharusnya ini tidak perlu
                 * Terjadi error ketika import dari database lain, dengan theme tidak diisi (null)
                 */
                $theme = NULL;
            } else {
                $theme = Theme::model()->findByPk($user->theme_id);
            }
        }
        return is_null($theme) ? NULL : $theme->nama;
    }

    /**
     * Return data to browser as JSON and end application.
     * @param array $data
     */
    protected function renderJSON($data)
    {
        header('Content-type: application/json');
        echo CJSON::encode($data);

        foreach (Yii::app()->log->routes as $route) {
            if ($route instanceof CWebLogRoute) {
                $route->enabled = false; // disable any weblogroutes
            }
        }
        Yii::app()->end();
    }

}
