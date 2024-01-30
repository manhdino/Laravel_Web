<?php

function isRole($RolesArr, $module, $roleName = 'view')
{
    if (!empty($RolesArr[$module])) {
        $roleArr = $RolesArr[$module];
        if (!empty($roleArr) && in_array($roleName, $roleArr)) {
            return true;
        }
    }
    return false;
}
