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
            'approved'                  => 'Approved',
            'approved_helper'           => ' ',
            'verified'                  => 'Verified',
            'verified_helper'           => ' ',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => ' ',
        ],
    ],
    'menu' => [
        'title'          => 'Menu',
        'title_singular' => 'Menu',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nome',
            'name_helper'       => ' ',
            'link'              => 'Link',
            'link_helper'       => ' ',
            'position'          => 'Posição',
            'position_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'lang'              => 'Lang',
            'lang_helper'       => ' ',
        ],
    ],
    'hero' => [
        'title'          => 'Hero',
        'title_singular' => 'Hero',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'text'              => 'Text',
            'text_helper'       => ' ',
            'button'            => 'Button',
            'button_helper'     => ' ',
            'link'              => 'Link',
            'link_helper'       => ' ',
            'image'             => 'Image',
            'image_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'lang'              => 'Lang',
            'lang_helper'       => ' ',
            'button_2'          => 'Button 2',
            'button_2_helper'   => ' ',
            'link_2'            => 'Link 2',
            'link_2_helper'     => ' ',
        ],
    ],
    'brand' => [
        'title'          => 'Brand',
        'title_singular' => 'Brand',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nome',
            'name_helper'       => ' ',
            'logo'              => 'Logo',
            'logo_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'ctum' => [
        'title'          => 'Cta',
        'title_singular' => 'Ctum',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'text'              => 'Text',
            'text_helper'       => ' ',
            'button'            => 'Button',
            'button_helper'     => ' ',
            'link'              => 'Link',
            'link_helper'       => ' ',
            'image'             => 'Image',
            'image_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'lang'              => 'Lang',
            'lang_helper'       => ' ',
        ],
    ],
    'option' => [
        'title'          => 'Option',
        'title_singular' => 'Option',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'text'              => 'Text',
            'text_helper'       => ' ',
            'icon'              => 'Icon',
            'icon_helper'       => ' ',
            'image'             => 'Image',
            'image_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'lang'              => 'Lang',
            'lang_helper'       => ' ',
            'longtext'          => 'Longtext',
            'longtext_helper'   => ' ',
        ],
    ],
    'contact' => [
        'title'          => 'Contact',
        'title_singular' => 'Contact',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'google'            => 'Google',
            'google_helper'     => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'subtitle'          => 'Subtitle',
            'subtitle_helper'   => ' ',
            'location'          => 'Location',
            'location_helper'   => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'call'              => 'Call',
            'call_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'lang'              => 'Lang',
            'lang_helper'       => ' ',
            'whatsapp'          => 'Whatsapp',
            'whatsapp_helper'   => ' ',
        ],
    ],
    'lang' => [
        'title'          => 'Lang',
        'title_singular' => 'Lang',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'code'              => 'Code',
            'code_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'slide' => [
        'title'          => 'Slide',
        'title_singular' => 'Slide',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'lang'              => 'Lang',
            'lang_helper'       => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'subtitle'          => 'Subtitle',
            'subtitle_helper'   => ' ',
            'text'              => 'Text',
            'text_helper'       => ' ',
            'button'            => 'Button',
            'button_helper'     => ' ',
            'link'              => 'Link',
            'link_helper'       => ' ',
            'image'             => 'Image',
            'image_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'website' => [
        'title'          => 'Website',
        'title_singular' => 'Website',
    ],
    'about' => [
        'title'          => 'About',
        'title_singular' => 'About',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'lang'              => 'Lang',
            'lang_helper'       => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'subtitle'          => 'Subtitle',
            'subtitle_helper'   => ' ',
            'text'              => 'Text',
            'text_helper'       => ' ',
            'image'             => 'Image',
            'image_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'carsMenu' => [
        'title'          => 'Cars',
        'title_singular' => 'Car',
    ],
    'carBrand' => [
        'title'          => 'Brand',
        'title_singular' => 'Brand',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'carModel' => [
        'title'          => 'Model',
        'title_singular' => 'Model',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'carItem' => [
        'title'          => 'Car',
        'title_singular' => 'Car',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'car_brand'             => 'Brand',
            'car_brand_helper'      => ' ',
            'car_model'             => 'Model',
            'car_model_helper'      => ' ',
            'year'                  => 'Year',
            'year_helper'           => ' ',
            'license_plate'         => 'License Plate',
            'license_plate_helper'  => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'motorization'          => 'Motorization',
            'motorization_helper'   => ' ',
            'chassis_number'        => 'Chassis Number',
            'chassis_number_helper' => ' ',
            'internal_name'         => 'Internal Name',
            'internal_name_helper'  => ' ',
            'documents'             => 'Documents',
            'documents_helper'      => ' ',
            'cost_per_km'           => 'Cost Per Km',
            'cost_per_km_helper'    => ' ',
            'monthly_income'        => 'Monthly Income',
            'monthly_income_helper' => ' ',
        ],
    ],
    'tvdeMenu' => [
        'title'          => 'Tvde',
        'title_singular' => 'Tvde',
    ],
    'driver' => [
        'title'          => 'Driver',
        'title_singular' => 'Driver',
        'fields'         => [
            'id'                                   => 'ID',
            'id_helper'                            => ' ',
            'user'                                 => 'User',
            'user_helper'                          => ' ',
            'bolt_name'                            => 'Código Bolt',
            'bolt_name_helper'                     => ' ',
            'uber_uuid'                            => 'UUID da Uber',
            'uber_uuid_helper'                     => ' ',
            'start_date'                           => 'Data de início',
            'start_date_helper'                    => ' ',
            'end_date'                             => 'Data de fim',
            'end_date_helper'                      => ' ',
            'reason'                               => 'Motivo da saída',
            'reason_helper'                        => ' ',
            'phone'                                => 'Telefone',
            'phone_helper'                         => ' ',
            'payment_vat'                          => 'NIF para pagamento',
            'payment_vat_helper'                   => ' ',
            'iban'                                 => 'IBAN',
            'iban_helper'                          => ' ',
            'address'                              => 'Endereço',
            'address_helper'                       => ' ',
            'zip'                                  => 'Código postal',
            'zip_helper'                           => ' ',
            'city'                                 => 'Localidade',
            'city_helper'                          => ' ',
            'driver_license'                       => 'Carta de condução',
            'driver_license_helper'                => ' ',
            'driver_vat'                           => 'NIF do motorista',
            'driver_vat_helper'                    => ' ',
            'citizen_card'                         => 'Cartão de Cidadão',
            'citizen_card_helper'                  => ' ',
            'notes'                                => 'Notas',
            'notes_helper'                         => ' ',
            'documents'                            => 'Documents',
            'documents_helper'                     => ' ',
            'created_at'                           => 'Created at',
            'created_at_helper'                    => ' ',
            'updated_at'                           => 'Updated at',
            'updated_at_helper'                    => ' ',
            'deleted_at'                           => 'Deleted at',
            'deleted_at_helper'                    => ' ',
            'name'                                 => 'Name',
            'name_helper'                          => ' ',
            'weekly_rent_value_low_season'         => 'Weekly Rent Value Low Season',
            'weekly_rent_value_low_season_helper'  => ' ',
            'extra_km_value_low_season'            => 'Extra Km Value Low Season',
            'extra_km_value_low_season_helper'     => ' ',
            'weekly_rent_value_high_season'        => 'Weekly Rent Value High Season',
            'weekly_rent_value_high_season_helper' => ' ',
            'extra_km_value_high_season'           => 'Extra Km Value High Season',
            'extra_km_value_high_season_helper'    => ' ',
            'agreed_deposit'                       => 'Agreed Deposit',
            'agreed_deposit_helper'                => ' ',
            'driver_service_vat'                   => 'Driver Service Vat  (%)',
            'driver_service_vat_helper'            => ' ',
            'driver_withholding_tax'               => 'Driver Withholding Tax (%)',
            'driver_withholding_tax_helper'        => ' ',
            'fuel_cards'                           => 'Fuel Cards',
            'fuel_cards_helper'                    => ' ',
        ],
    ],
    'weekManagement' => [
        'title'          => 'Week Management',
        'title_singular' => 'Week Management',
    ],
    'year' => [
        'title'          => 'Year',
        'title_singular' => 'Year',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'number'            => 'Number',
            'number_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'month' => [
        'title'          => 'Month',
        'title_singular' => 'Month',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'year'              => 'Year',
            'year_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'week' => [
        'title'          => 'Week',
        'title_singular' => 'Week',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'from'              => 'From',
            'from_helper'       => ' ',
            'to'                => 'To',
            'to_helper'         => ' ',
            'month'             => 'Month',
            'month_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'carmanagement' => [
        'title'          => 'Car management',
        'title_singular' => 'Car management',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'car_item'          => 'License',
            'car_item_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'driver'            => 'Driver',
            'driver_helper'     => ' ',
            'start_date'        => 'Start Date',
            'start_date_helper' => ' ',
            'end_date'          => 'End Date',
            'end_date_helper'   => ' ',
        ],
    ],
    'damage' => [
        'title'          => 'Damage',
        'title_singular' => 'Damage',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'photos'             => 'Photos',
            'photos_helper'      => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'cost'               => 'Cost',
            'cost_helper'        => ' ',
        ],
    ],
    'contentManagement' => [
        'title'          => 'Content management',
        'title_singular' => 'Content management',
    ],
    'contentCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentPage' => [
        'title'          => 'Pages',
        'title_singular' => 'Page',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'title'                 => 'Title',
            'title_helper'          => ' ',
            'category'              => 'Categories',
            'category_helper'       => ' ',
            'tag'                   => 'Tags',
            'tag_helper'            => ' ',
            'page_text'             => 'Full Text',
            'page_text_helper'      => ' ',
            'excerpt'               => 'Excerpt',
            'excerpt_helper'        => ' ',
            'featured_image'        => 'Featured Image',
            'featured_image_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated At',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted At',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'vehicleExpense' => [
        'title'          => 'Vehicle Expenses',
        'title_singular' => 'Vehicle Expense',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'car_item'            => 'Car',
            'car_item_helper'     => ' ',
            'expense_type'        => 'Expense Type',
            'expense_type_helper' => ' ',
            'date'                => 'Date',
            'date_helper'         => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'files'               => 'Files',
            'files_helper'        => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'value'               => 'Value',
            'value_helper'        => ' ',
        ],
    ],
    'vehicleDocument' => [
        'title'          => 'Vehicle Documents',
        'title_singular' => 'Vehicle Document',
        'fields'         => [
            'id'                                => 'ID',
            'id_helper'                         => ' ',
            'car_item'                          => 'Car',
            'car_item_helper'                   => ' ',
            'documents'                         => 'Documents',
            'documents_helper'                  => ' ',
            'carta_verde'                       => 'Carta Verde',
            'carta_verde_helper'                => '(inserção da validade)',
            'condicoes_particulares'            => 'Condicoes Particulares',
            'condicoes_particulares_helper'     => '(inserção da validade)',
            'dua'                               => 'DUA (Validade)',
            'dua_helper'                        => 'DUA - Documento Único Automóvel ou Contrato de Aluguer',
            'inspecao_tecnica_periodica'        => 'Inspecao Tecnica Periodica',
            'inspecao_tecnica_periodica_helper' => '(inserção da validade)',
            'created_at'                        => 'Created at',
            'created_at_helper'                 => ' ',
            'updated_at'                        => 'Updated at',
            'updated_at_helper'                 => ' ',
            'deleted_at'                        => 'Deleted at',
            'deleted_at_helper'                 => ' ',
            'dav'                               => 'DAV (Validade)',
            'dav_helper'                        => ' ',
            'tvde_license'                      => 'Licensa TVDE',
            'tvde_license_helper'               => ' ',
        ],
    ],
    'setting' => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
    ],
    'season' => [
        'title'          => 'Season',
        'title_singular' => 'Season',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'season'            => 'Season',
            'season_helper'     => ' ',
            'start_date'        => 'Start Date',
            'start_date_helper' => ' ',
            'end_date'          => 'End Date',
            'end_date_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'driverMenu' => [
        'title'          => 'Driver',
        'title_singular' => 'Driver',
    ],
    'parkingTicket' => [
        'title'          => 'Parking Ticket',
        'title_singular' => 'Parking Ticket',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'driver'            => 'Driver',
            'driver_helper'     => ' ',
            'document'          => 'Document',
            'document_helper'   => ' ',
            'value'             => 'Value',
            'value_helper'      => ' ',
            'date_time'         => 'Date Time',
            'date_time_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'car_item'          => 'Car Item',
            'car_item_helper'   => ' ',
        ],
    ],
    'vehicleMaintenance' => [
        'title'          => 'Vehicle Maintenance',
        'title_singular' => 'Vehicle Maintenance',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'car_item'               => 'Car Item',
            'car_item_helper'        => ' ',
            'reason'                 => 'Reason',
            'reason_helper'          => ' ',
            'date_time_start'        => 'Date Time Start',
            'date_time_start_helper' => ' ',
            'date_time_end'          => 'Date Time End',
            'date_time_end_helper'   => ' ',
            'observations'           => 'Observations',
            'observations_helper'    => ' ',
            'documents'              => 'Documents',
            'documents_helper'       => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'fuelCard' => [
        'title'          => 'Fuel Cards',
        'title_singular' => 'Fuel Card',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'card_number'        => 'Card Number',
            'card_number_helper' => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'activity' => [
        'title'          => 'Activity',
        'title_singular' => 'Activity',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'operator_code'        => 'Operator Code',
            'operator_code_helper' => ' ',
            'week'                 => 'Week',
            'week_helper'          => ' ',
            'net'                  => 'Net',
            'net_helper'           => ' ',
            'gross'                => 'Gross',
            'gross_helper'         => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'rental' => [
        'title'          => 'Rental',
        'title_singular' => 'Rental',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'weekly_rental'        => 'Weekly Rental',
            'weekly_rental_helper' => ' ',
            'extra_km'             => 'Extra Km',
            'extra_km_helper'      => ' ',
            'driver'               => 'Driver',
            'driver_helper'        => ' ',
            'week'                 => 'Week',
            'week_helper'          => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'rental_type'          => 'Rental Type',
            'rental_type_helper'   => ' ',
        ],
    ],
    'maintenance' => [
        'title'          => 'Maintenance',
        'title_singular' => 'Maintenance',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'photos'             => 'Photos',
            'photos_helper'      => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'cost'               => 'Cost',
            'cost_helper'        => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'receipt' => [
        'title'          => 'Receipt',
        'title_singular' => 'Receipt',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'value'                     => 'Valor',
            'value_helper'              => ' ',
            'file'                      => 'Ficheiro',
            'file_helper'               => ' ',
            'paid'                      => 'Pago',
            'paid_helper'               => ' ',
            'balance'                   => 'Balance',
            'balance_helper'            => ' ',
            'verified'                  => 'Verified',
            'verified_helper'           => ' ',
            'verified_value'            => 'Verified Value',
            'verified_value_helper'     => ' ',
            'amount_transferred'        => 'Amount Transferred',
            'amount_transferred_helper' => ' ',
            'company'                   => 'Company',
            'company_helper'            => ' ',
            'iva'                       => 'Iva',
            'iva_helper'                => ' ',
            'retention'                 => 'Retention',
            'retention_helper'          => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
        ],
    ],

];
