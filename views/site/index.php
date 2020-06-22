<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?php
    // Example of data.
    $data = [
        ['title' => 'Node 1', 'key' => 1],
        ['title' => 'Folder 2', 'key' => '2', 'folder' => true, 'children' => [
            ['title' => 'Node 2.1', 'key' => '3'],
            ['title' => 'Node 2.2', 'key' => '4']
        ]]
    ];

    echo \wbraganca\fancytree\FancytreeWidget::widget([
        'options' =>[
            'source' => [
                    'url'=> \yii\helpers\Url::to('/site/get-nodes')
            ],
			 'lazyLoad' => new \yii\web\JsExpression('function(e, data) {
			 console.log(data);
				data.result = $.ajax({
					url: "'.\yii\helpers\Url::to('/site/get-nodes').'",
					dataType: "json",
					data: { 
                        parentId: data.node.data.id
                    }
				});
			}'),
            'extensions' => ['dnd'],
            'dnd' => [
                'preventVoidMoves' => true,
                'preventRecursiveMoves' => true,
                'autoExpandMS' => 400,
                'dragStart' => new \yii\web\JsExpression('function(node, data) {
				return true;
			}'),
            ],
        ]
    ]);
    ?>
</div>
