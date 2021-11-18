<?php

return [
    'userManagement' => [
        'title'          => 'Správa užívateľov',
        'title_singular' => 'Správa užívateľov',
    ],
    'permission' => [
        'title'          => 'Povolenia',
        'title_singular' => 'Povolenie',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Položka',
            'title_helper'      => ' ',
            'created_at'        => 'Vytvorené',
            'created_at_helper' => ' ',
            'updated_at'        => 'Aktualizované',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Vymazané',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Role',
        'title_singular' => 'Rola',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Úroveň',
            'title_helper'       => ' ',
            'permissions'        => 'Povolenia',
            'permissions_helper' => ' ',
            'created_at'         => 'Vytvorené',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Aktualizované',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Vymazané',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Užívatelia',
        'title_singular' => 'Užívateľ',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Užívateľské meno',
            'name_helper'               => ' ',
            'email'                     => 'E-mail',
            'email_helper'              => ' ',
            'email_verified_at'         => 'E-mail potvrdený',
            'email_verified_at_helper'  => ' ',
            'password'                  => 'Heslo',
            'password_helper'           => ' ',
            'roles'                     => 'Užívateľské úrovne',
            'roles_helper'              => ' ',
            'remember_token'            => 'Remember Token',
            'remember_token_helper'     => ' ',
            'created_at'                => 'Vytvorené',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Aktualizované',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Vymazané',
            'deleted_at_helper'         => ' ',
            'verified'                  => 'Overený',
            'verified_helper'           => ' ',
            'verified_at'               => 'Overený',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'Overovací token',
            'verification_token_helper' => ' ',
            'centre'                    => 'Stredisko',
            'centre_helper'             => 'Centre',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logy',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Popis',
            'description_helper'  => ' ',
            'subject_id'          => 'ID subjektu',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Typ sujbektu',
            'subject_type_helper' => ' ',
            'user_id'             => 'ID uživateľa',
            'user_id_helper'      => ' ',
            'properties'          => 'Vlastnosti',
            'properties_helper'   => ' ',
            'host'                => 'IP',
            'host_helper'         => ' ',
            'created_at'          => 'Vytvorené',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Aktualizované',
            'updated_at_helper'   => ' ',
        ],
    ],
    'centre' => [
        'title'          => 'Odberové Centrum',
        'title_singular' => 'Odberové Centrá',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'name'                => 'Názov',
            'name_helper'         => 'Name of the facility/centre',
            'street'              => 'Ulica',
            'street_helper'       => 'Street',
            'city'                => 'Mesto',
            'city_helper'         => 'City',
            'postal'              => 'PSČ',
            'postal_helper'       => 'PSČ',
            'created_at'          => 'Vytvorené',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Aktualizované',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Vymazané',
            'deleted_at_helper'   => ' ',
            'place_id_ref'        => 'Place Id (REENIO)',
            'place_id_ref_helper' => 'Place Id (REENIO)',
            'country'             => 'Krajina',
            'country_helper'      => 'Country',
        ],
    ],
    'test' => [
        'title_edit_result'     => 'Zadanie výsledku testovania',
        'title_edit_user'       => 'Úprava údajov pacienta',
        'title'          => 'Testovanie',
        'title_singular' => 'Testovanie',
        'fields'         => [
            'id'                              => 'ID',
            'id_helper'                       => ' ',
            'pinid'                           => 'Číslo dokladu',
            'pinid_helper'                    => 'Pin-ID',
            'pinrc'                           => 'Rodné číslo',
            'pinrc_helper'                    => 'Pin-RC',
            'name'                            => 'Meno',
            'name_helper'                     => 'Meno',
            'firstname'                       => 'Meno',
            'firstname_helper'                => 'First Name',
            'lastname'                        => 'Priezvisko',
            'lastname_helper'                 => 'Last Name',
            'email'                           => 'E-mail',
            'email_helper'                    => 'Email',
            'phone'                           => 'Telefónne číslo',
            'phone_helper'                    => 'Mobile Phone Number',
            'dob'                             => 'Dátum Narodenia',
            'dob_helper'                      => 'Dátum Narodenia',
            'street'                          => 'Ulica',
            'street_helper'                   => 'Street',
            'city'                            => 'Mesto',
            'city_helper'                     => 'City',
            'postal'                          => 'PSČ',
            'postal_helper'                   => 'Postal',
            'country'                         => 'Krajina',
            'country_helper'                  => 'Country',
            'created_at'                      => 'Vytvorené',
            'created_at_helper'               => ' ',
            'updated_at'                      => 'Aktualizované',
            'updated_at_helper'               => ' ',
            'deleted_at'                      => 'Vymazané',
            'deleted_at_helper'               => ' ',
            'symptoms'                        => 'Príznaky',
            'symptoms_helper'                 => 'Illness Symptoms',
            'result_date'                     => 'Dátum výsledku testu',
            'result_date_helper'              => 'Test Result Date',
            'result_status'                   => 'Výsledok testu',
            'result_status_positive'          => 'Pozitívny',
            'result_status_negative'          => 'Negatívny',
            'result_status_helper'            => ' ',
            'result_test_name'                => 'Názov testu',
            'result_test_name_helper'         => 'Name of Test',
            'result_test_manufacturer'        => 'Výrobca testu',
            'result_test_manufacturer_helper' => 'Test Manufacturer',
            'result_diagnosis'                => 'Diagnóza',
            'result_diagnosis_helper'         => 'Diagnosis',
            'centre'                          => 'Odberové stredisko',
            'centre_tooltip'                  => 'V pripade požiadavku na zmenu odberového strediska kontaktujte prosim Administratora',
            'centre_helper'                   => 'Centre',
            'start'                           => 'Začiatok',
            'start_helper'                    => 'Start Date of Test',
            'end'                             => 'Koniec',
            'end_helper'                      => 'End Date of Test',
            'status'                          => 'Status',
            'status_helper'                   => 'Reservation Status',
            'service'                         => 'Typ testu',
            'service_helper'                  => 'Service',
            'note'                            => 'Poznámka',
            'note_helper'                     => 'Note',
            'reservation_id_ref'              => 'Číslo rezervácie',
            'reservation_id_ref_helper'       => 'Reservation Id',
            'code_ref'                        => 'Rezervačný kód',
            'code_ref_helper'                 => 'Reservation Code (e.g. ABC-DEF-GHI)',
            'insurance_company'               => 'Poisťovňa',
            'insurance_company_helper'        => 'Insurance Company',
            'presence'                        => 'Účasť',
            'presence_null'                   => 'Na ceste',
            'presence_false'                  => 'Neprišiel',
            'presence_true'                   => 'Prišiel',
        ],
    ],
    'service' => [
        'title'          => 'Služby',
        'title_singular' => 'Služba',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'name'                  => 'Názov',
            'name_helper'           => 'Name',
            'service_id_ref'        => 'Service Id (REENIO)',
            'service_id_ref_helper' => 'Service Id (REENIO)',
            'created_at'            => 'Vytvorené',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Aktualizované',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Vymazané',
            'deleted_at_helper'     => ' ',
        ],
    ],
];
