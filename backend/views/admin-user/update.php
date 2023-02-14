<?php
 /*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:46
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 17:52:07
 */
use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => Yii::t('app', 'Admin Users'), 'url' => Url::to(['index'])],
    ['label' => Yii::t('app', 'Update') . Yii::t('app', 'Admin Users')],
];
/**
 * @var $model common\models\AdminUser
 * @var $assignModel backend\models\form\AssignPermissionForm
 * @var $permissions []
 * @var $roles []
 */
?>
<?php
if (Yii::$app->controller->action->id == 'update') {
    echo $this->render('_form', [
        'model' => $model,
        'assignModel' => $assignModel,
        'permissions' => $permissions,
        'roles' => $roles,
    ]);
} else {
    echo $this->render('_form-update-self', [
        'model' => $model,
    ]);
}
?>
