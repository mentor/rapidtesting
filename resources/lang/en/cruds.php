<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Name',
            'name_helper'               => ' ',
            'email'                     => 'Email',
            'email_helper'              => ' ',
            'email_verified_at'         => 'Email verified at',
            'email_verified_at_helper'  => ' ',
            'password'                  => 'Password',
            'password_helper'           => ' ',
            'roles'                     => 'Roles',
            'roles_helper'              => ' ',
            'remember_token'            => 'Remember Token',
            'remember_token_helper'     => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'verified'                  => 'Verified',
            'verified_helper'           => ' ',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'laboratory' => [
        'title'          => 'Laboratory',
        'title_singular' => 'Laboratory',
    ],
    'centre' => [
        'title'          => 'Centre',
        'title_singular' => 'Centre',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => 'Name of the facility/centre',
            'street'            => 'Street',
            'street_helper'     => 'Street',
            'city'              => 'City',
            'city_helper'       => 'City',
            'postal'            => 'Postal',
            'postal_helper'     => 'Postal Code',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'test' => [
        'title'          => 'Tests',
        'title_singular' => 'Test',
        'fields'         => [
            'id'                              => 'ID',
            'id_helper'                       => ' ',
            'pinid'                           => 'Pin-ID',
            'pinid_helper'                    => 'Pin-ID',
            'pinrc'                           => 'Pin-RC',
            'pinrc_helper'                    => 'Pin-RC',
            'firstname'                       => 'First Name',
            'firstname_helper'                => 'First Name',
            'lastname'                        => 'Last Name',
            'lastname_helper'                 => 'Last Name',
            'email'                           => 'Email',
            'email_helper'                    => 'Email',
            'phone'                           => 'Phone',
            'phone_helper'                    => 'Mobile Phone Number',
            'dob'                             => 'Date of Birth',
            'dob_helper'                      => 'Date of Birth',
            'street'                          => 'Street',
            'street_helper'                   => 'Street',
            'city'                            => 'City',
            'city_helper'                     => 'City',
            'postal'                          => 'Postal',
            'postal_helper'                   => 'Postal',
            'country'                         => 'Country',
            'country_helper'                  => 'Country',
            'created_at'                      => 'Created at',
            'created_at_helper'               => ' ',
            'updated_at'                      => 'Updated at',
            'updated_at_helper'               => ' ',
            'deleted_at'                      => 'Deleted at',
            'deleted_at_helper'               => ' ',
            'symptoms'                        => 'Symptoms',
            'symptoms_helper'                 => 'Illness Symptoms',
            'result_type'                     => 'Test Type',
            'result_type_helper'              => 'Type of Test',
            'result_date'                     => 'Test Result Date',
            'result_date_helper'              => 'Test Result Date',
            'result_status'                   => 'Test Result Status',
            'result_status_helper'            => ' ',
            'result_test_name'                => 'Test Name',
            'result_test_name_helper'         => 'Name of Test',
            'result_test_manufacturer'        => 'Test Manufacturer',
            'result_test_manufacturer_helper' => 'Test Manufacturer',
            'result_diagnosis'                => 'Diagnosis',
            'result_diagnosis_helper'         => 'Diagnosis',
            'centre'                          => 'Centre',
            'centre_helper'                   => 'Centre',
        ],
    ],
];
