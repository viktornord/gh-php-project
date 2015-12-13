<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 13/12/15
 * Time: 20:23
 */

/**
 * This widget allows you to show notes anywhere on your page
 * configurable options:
 * @param String $title - widget title
 * @param String[] $notes - notes which you want to display
 *
 * Also feel free to customize layout for your needs
 */

namespace frontend\widgets;


use yii\base\Widget;

class NotesWidget extends Widget
{
    public $title = 'Notes';
    public $notes;

    public function run() {
        return $this->render('notes', [
            'title' => $this->title,
            'notes' => $this->notes
        ]);
    }
}