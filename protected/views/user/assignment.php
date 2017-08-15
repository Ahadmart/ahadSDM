<?php

/* @var $this AssignmentController */
/* @var $model AuthAssignment */
//

$this->breadcrumbs = [
    'User' => ['index'],
    $user->nama => ['view', 'id' => $user->id],
    'Assignment',
];

$this->pageHeader['title'] = 'User';
$this->pageHeader['desc'] = 'Assignment';
$this->pageHeader['boxTitle'] = "User Assignment: {$user->nama}";

$this->pageTitle = Yii::app()->name . ' - ' . $this->pageHeader['desc'];
?>

<?php

$this->renderPartial('_assignment', [
    'user' => $user,
    'authItem' => $authItem
]);

$this->renderPartial('_list_assigned', [
    'user' => $user,
    'model' => $model
]);
?>


<?php

$this->menu = [
    [
        'submenuOptions' => ['class' => 'btn-group visible-sm-block visible-md-block visible-lg-block'],
        'label' => false,
        'items' => [
            [
                'label' => '<i class="fa fa-asterisk"></i> <span class="ak">I</span>ndex',
                'url' => $this->createUrl('index'),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-default',
                    'accesskey' => 'i'
                ]
            ]
        ],
    ],
    [
        'submenuOptions' => ['class' => 'btn-group visible-xs-block'],
        'label' => false,
        'items' => [
            [
                'label' => '<i class="fa fa-asterisk"></i>',
                'url' => $this->createUrl('index'),
                'linkOptions' => [
                    'class' => 'btn btn-sm btn-primary',
                ]
            ]
        ],
    ]
];
