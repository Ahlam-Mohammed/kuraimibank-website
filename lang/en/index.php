<?php

return [
    'country' => [
      'id'        => 'ID',
      'name'      => 'Name Country',
      'countries' => 'Countries',
      'country'   => 'Country'
    ],

    'city' => [
        'id'        => 'ID',
        'name'      => 'Name City',
        'cities'    => 'Cities',
        'city'      => 'City',
    ],

    'service_point' => [
        'id'            => 'ID',
        'name'          => 'Service Name',
        'address'       => 'Address',
        'phone'         => 'Phone',
        'second_phone'  => 'Second Phone',
        'working_hours' => 'Working Hours',
        'service_point' => 'Service Point',
        'category'      => 'Category',
        'type'          => 'Type'
    ],

    'category' => [
        'ATM'        => 'ATM',
        'center'     => 'Center',
        'branch'     => 'Branch',
        'office'     => 'Office',
    ],

    'service_category' => [
        'id'              => 'ID',
        'name'            => 'Category Name',
        'category'        => 'Category',
        'categories'      => 'Categories',
        'add_branch'      => 'Add Branch for Category',
        'parent'          => 'Parent',
        'type_category'   => 'Category',
        'type_branch'     => 'Branch',
    ],

    'sub_category' => [
        'id'         => 'ID',
        'name'       => 'Branch Name',
        'branch'     => 'Branch',
        'branches'   => 'Branches',
    ],

    'service' => [
        'name'              => 'Service Name',
        'id'                => 'Id',
        'desc'              => 'Service Description',
        'background'        => 'Service Background',
        'image'             => 'Service Image',
        'other_advantage'   => 'Other Advantage',
        'service_condition' => 'Service Condition',
        'service'           => 'Service',
        'services'          => 'Services',
        'category'          => 'Service Category',
        'branch'            => 'Branch'
    ],

    'rates' => [
        'name'           => 'Currency',
        'sale'           => 'Sale',
        'buy'            => 'Buy',
        'id'             => 'Currency ID',
        'Currency'       => 'Currency',
        'exchange_rates' => 'Exchange Rates'
    ],

    'news' => [
        'id'         => 'ID',
        'title'      => 'News Title',
        'desc'       => 'News Description',
        'image'      => 'News Image',
        'background' => 'News Background',
        'news'       => 'News'
    ],

    'partner' => [
        'id'         => 'ID',
        'name'       => 'Partner Name',
        'desc'       => 'Partner Description',
        'image'      => 'Partner Image',
        'partner'    => 'Partner'
    ],

    'job' => [
        'id'         => 'ID',
        'name'       => 'Job Name',
        'desc'       => 'Job Description',
        'job'       => 'Jobs'
    ],

    'report' => [
        'name' => 'Report Title',
        'file' => 'Report File'
    ],

    'contact' => [
        'tel'      => 'Tel',
        'tollFree' => 'Toll Free',
        'fax'      => 'Fax',
        'box'      => 'P.O.Box',
        'email'    => 'Email'
    ],

    'principle' => [
        'id'         => 'ID',
        'title'      => 'Title Principle',
        'desc'       => 'Description Principle',
        'principles' => 'Principles'
    ],

    'roles' => [
        'id'  => 'ID',
        'name' => 'Role Name',
        'roles' => 'Roles'
    ],

    'users' => [
        'id' => 'ID',
        'name' => 'Name User',
        'email' => 'Email User',
        'role'  => 'Role User',
        'users' => 'Users',
        'password' => 'Password',
        'confirm' => 'Confirm Password',
        'roles'   => 'Roles'
    ],


    'messages' => [
        'delete_message' => 'Are you sure to delete?'
    ]
];
