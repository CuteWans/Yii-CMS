<?php
/*
 * @Description: 奴才驾到CMS
 * @version: 1.0
 * @Author: lqx lsf dy
 * @Date: 2023-02-13 14:08:47
 * @LastEditors: lqx lsf dy
 * @LastEditTime: 2023-02-14 18:04:53
 */
 

namespace common\services;

interface AdminUserServiceInterface extends ServiceInterface
{
    const ServiceName = 'adminUserService';

    const scenarioCreate = "create";
    const scenarioUpdate = "update";
    const scenarioSelfUpdate = "self-update";

    public function selfUpdate($id, array $postData, array $options=[]);

    public function newPasswordResetRequestForm();

    public function sendResetPasswordLink($postData);

    public function newResetPasswordForm($token);

    public function resetPassword($token, $postData);
}